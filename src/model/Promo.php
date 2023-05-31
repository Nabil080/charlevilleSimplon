<?php
require_once('src/model/ConnectBdd.php');
require_once('src/model/User.php');
require_once('src/model/Status.php');



class Promo
{
    public int $id;
    public string $name;
    public $start;
    public $end;

    public $status;
    public $formation_id;



    public function __construct($id, $name, $start, $end, $status, $formation_id)
    {
        $this->id = $id;
        $this->start = $start;
        $this->name = $name;
        $this->end = $end;
        $this->formation_id = $formation_id;

        $statusRepo = new StatusRepository;
        $Status = $statusRepo->getStatusById($status);
        $this->status = $Status;
    }
}

class PromoRepository extends ConnectBdd
{
    public function __construct()
    {
        parent::__construct();
    }
    public function InsertCandidateInPromo($user_id, $promo_id): void
    {
        $req = "INSERT INTO `promo_candidate`(`user_id`,`promo_id`) VALUE (?,?)";
        $stmt = $this->bdd->prepare($req);
        $stmt->execute([$user_id, $promo_id]);
        $stmt->closeCursor();
    }
    public function getPromoById(int $id): object
    {
        $promoRepository = new PromoRepository;
        $req = $this->bdd->prepare("SELECT * FROM `promo` WHERE `promo_id` = ?");
        $req->execute([$id]);
        $data = $req->fetch(PDO::FETCH_ASSOC);

        $Promo = new Promo(
            $data['promo_id'],
            $data['promo_name'],
            $promoRepository->formateDate($data['promo_start']),
            $promoRepository->formateDate($data['promo_end']),
            $data['status_id'],
            $data['formation_id']
        );

        return $Promo;
    }

    public function getPromos(): array
    {

        $promoRepository = new PromoRepository;
        $req = $this->bdd->prepare("SELECT * FROM `promo`");
        $req->execute();
        $datas = $req->fetchAll(PDO::FETCH_ASSOC);
        $promos = [];

        foreach ($datas as $data) {
            $Promo = new Promo(
                $data['promo_id'],
                $data['promo_name'],
                $promoRepository->formateDate($data['promo_start']),
                $promoRepository->formateDate($data['promo_end']),
                $data['status_id'],
                $data['formation_id']
            );

            array_push($promos, $Promo);

        }
        return $promos;
    }
  
    public function getAllApprenants($id):array 
    {
        $req = $this->bdd->prepare("SELECT user_id FROM promo_user WHERE promo_id = ?");
        $req->execute([$id]);
        $datas = $req->fetchAll(PDO::FETCH_COLUMN);
        $UsersRepository = new UserRepository;
        $users = [];

        foreach ($datas as $data) {
            $user = $UsersRepository->getUserById($data);
            array_push($users, $user);
        }
        return $users;
    }

    public function getAllFormateurs($id): array
    {
        $req = $this->bdd->prepare("SELECT user_id FROM promo_user 
        WHERE promo_id = ?");
        $req->execute([$id]);
        $datas = $req->fetchAll(PDO::FETCH_COLUMN);
        $users = [];

        foreach ($datas as $user_id) {
            $User = new User($user_id);
            $user = $User->getUser();
            if ($user->role_name == "Formateur") {
                array_push($users, $user);
            }
        }
        return $users;
    }

    public function getPromoProjects($id): array
    {
        $req = $this->bdd->prepare("SELECT project_id FROM project 
        WHERE promo_id = ?");
        $req->execute([$id]);
        $datas = $req->fetchAll(PDO::FETCH_COLUMN);
        $ProjectRepository = new ProjectRepository;
        $projects = [];

        foreach ($datas as $data) {
            $project = $ProjectRepository->getProjectById($data);
            array_push($projects, $project);
        }
        return $projects;
    }


    public function getPromoStart($id) 
    {
        $req = $this->bdd->prepare("SELECT `promo_start` FROM `promo` WHERE `formation_id` = ?");
        $req->execute([$id]);
        $data = $req->fetch(PDO::FETCH_COLUMN);
        return $data;
    }

    public function getIdOpenPromoByFormationId($formation_id)
    {
        $req = $this->bdd->prepare("SELECT `promo_id` FROM `promo` WHERE `formation_id` = ? AND `status_id` = ?");
        $req->execute([$formation_id, 14]);
        $data = $req->fetch(PDO::FETCH_COLUMN);
        return $data;
    }
    public function CheckDuplicateCandidate($user_id, $promo_id)
    {
        $req = $this->bdd->prepare("SELECT * FROM `promo_candidate` WHERE `user_id` = ? AND `promo_id` = ?");
        $req->execute([$user_id, $promo_id]);
        $data = $req->fetch();
        return (empty($data) && $data == false) ? true : false;

      public function getActivePromos():array
    {
        $req = $this->bdd->prepare("SELECT * FROM promo WHERE status_id = ?");
        $req->execute([12]);
        $data = $req->fetchAll(PDO::FETCH_ASSOC);

        foreach($data as $key){
            $promos[] = $this->getPromoById($key['promo_id']);
        }

        return $promos;
    }
}

    public function getPromoByUserID($id)
    {
        $req = $this->bdd->prepare("SELECT * FROM `promo_candidate` WHERE `user_id` = ?");
        $req->execute([$id]);
        $data = $req->fetch(PDO::FETCH_ASSOC);

        if (empty($data))
        {
            $req = $this->bdd->prepare("SELECT * FROM `promo_refused` WHERE `user_id` = ?");
            $req->execute([$id]);
            $data = $req->fetch(PDO::FETCH_ASSOC);

            if (empty($data))
            {
                $req = $this->bdd->prepare("SELECT * FROM `promo_user` WHERE `user_id` = ?");
                $req->execute([$id]);
                $data = $req->fetch(PDO::FETCH_ASSOC);

                if (empty($data))
                {
                    return "Cet utilisateur n'appartient à aucune promotion en cours ou ayant existé.";
                }
                else
                {
                $Promo_datas = $this->getPromoById($data['user_id']);
                return $Promo_datas;
                }
            }
            else
            {
            $Promo_datas = $this->getPromoById($data['user_id']);
            return $Promo_datas;
            }
        }
        else
        {
        $Promo_datas = $this->getPromoById($data['user_id']);
        return $Promo_datas;
        }
    }
    
    public function formateDate($date):string
    {
        setlocale(LC_TIME,'fr_FR','french','French_France.1252','fr_FR.ISO8859-1','fra');
        $datefmt = new IntlDateFormatter('fr_FR', 0, 0, NULL, NULL, 'dd MMMM yyyy');
        $formatedDate = $datefmt->format(date_create($date));
        return $formatedDate;
    }

    public function getPromoProjects($id):array
    {
        $req = $this->bdd->prepare("SELECT project_id FROM project 
        WHERE promo_id = ?");
        $req->execute([$id]);
        $datas = $req->fetchAll(PDO::FETCH_COLUMN);
        $ProjectRepository = new ProjectRepository;
        $projects = [];

        foreach ($datas as $data) {
            $project = $ProjectRepository->getProjectById($data);
            array_push($projects, $project);
            }
        return $projects;
    }
}