<?php
require_once('src/model/ConnectBdd.php');
require_once('src/model/User.php');
require_once('src/model/Status.php');



class Promo {
    public int $id;
    public string $name;
    public $start;
    public $end;

    public $status;
    public $formation_id;



    public function __construct ($id, $name, $start, $end, $status, $formation_id)
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

class PromoRepository extends ConnectBdd{
    public function __construct(){
        parent::__construct();
    }

    public function getPromoById(int $id):object
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

        foreach ($datas as $data)
        {
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

    public function formateDate($date):string
    {
        // $mois = ['janvier', 'février', 'mars', 'avril', 'mai', 'juin', 'juillet', 'août', 'septembre', 'octobre', 'novembre', 'décembre'];
        // $explode  = substr($date, '5', '2');
        // $date = date('d-m-Y', strtotime($date));
        // $findMois = $mois[((int)$explode) - 1];
        // $date = str_replace($explode, $findMois, $date);
        // $date = str_replace("-", " ", $date);
        return $date;
    }

    public function getPromoDate($id):array
    {
        $dates = [];

        $req = $this->bdd->prepare("SELECT promo_start, promo_end FROM promo WHERE promo_id = ?");
        $req->execute([$id]);
        $data = $req->fetch();

        $dates['start'] = $data['promo_start'] ;
        $dates['end'] = $data['promo_end'] ;



    }

    public function getAllApprenants($id):array 
    {
        $req = $this->bdd->prepare("SELECT user_id FROM promo_user WHERE promo_id = ?");
        $req->execute([$id]);
        $datas = $req->fetchAll(PDO::FETCH_COLUMN);
        $UsersRepository = new UsersRepository;
        $users = [];
        
        foreach ($datas as $data) {
            $user = $UsersRepository->getUserById($data);
            array_push($users, $user);
        }
        return $users;
    }

    public function getAllFormateurs($id):array 
    {
        $req = $this->bdd->prepare("SELECT user_id FROM promo_user 
        WHERE promo_id = ?");
        $req->execute([$id]);
        $datas = $req->fetchAll(PDO::FETCH_COLUMN);
        $UsersRepository = new UsersRepository;
        $users = [];
        
        foreach ($datas as $data) {
            $user = $UsersRepository->getUserById($data);
            if ($user->role->name == "Formateur") {
                array_push($users, $user);
            }
        }
        return $users;
    }

    public function getPromoUsersId($id):array
    {
        $usersId = [];

        if($this->getPromoById($id)->status->id == 9){
            $req = $this->bdd->prepare("SELECT user_id FROM promo_candidate WHERE promo_id = ?");
        }else{
            $req = $this->bdd->prepare("SELECT user_id FROM promo_user WHERE promo_id = ?");
        }
        $req->execute([$id]);
        $datas = $req->fetchAll(PDO::FETCH_ASSOC);
        
        foreach ($datas as $data) {
            $usersId[] = $data['user_id'];
        }

        return $usersId;
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

    public function getPromoStart($id) {
        $req = $this->bdd->prepare("SELECT `promo_start` FROM `promo` WHERE `formation_id` = ?");
        $req->execute([$id]);
        $data = $req->fetch(PDO::FETCH_COLUMN);
        return $data;
    }

    public function getActivePromos():array
    {
        $req = $this->bdd->prepare("SELECT * FROM `promo` WHERE status_id = ?");
        $req->execute([12]);
        $data = $req->fetchAll(PDO::FETCH_ASSOC);

        foreach($data as $key){
            $promos[] = $this->getPromoById($key['promo_id']);
        }

        return $promos;
    }

    public function getPromoMailList($id):array
    {
        $mailList = [];
        $usersId = $this->getPromoUsersId($id);

        foreach($usersId as $userId){
            $req = $this->bdd->prepare("SELECT user_email FROM `user` WHERE user_id = ?");
            $req->execute([$userId]);
            $data = $req->fetch();

            $mailList[] = $data['user_email'];
        }

        return $mailList;
    }

    public function getPromoCandidates($id):array
    {
        $req = $this->bdd->prepare("SELECT user_id FROM promo_candidate WHERE promo_id = ?");
        $req->execute([$id]);
        $datas = $req->fetchAll(PDO::FETCH_ASSOC);
        $UsersRepository = new UsersRepository;
        $users = [];
        
        foreach ($datas as $data) {
            $User = $UsersRepository->getUserById($data['user_id']);
            $users[] = $User;
        }

        return $users;
    }

    public function deletePromo($id):void
    {
        $req = $this->bdd->prepare("DELETE FROM promo_candidate WHERE promo_id =?");
        $req->execute([$id]);
        $req->closeCursor();

        $req = $this->bdd->prepare("DELETE FROM promo_user WHERE promo_id =?");
        $req->execute([$id]);
        $req->closeCursor();

        $req = $this->bdd->prepare("DELETE FROM promo_refused WHERE promo_id =?");
        $req->execute([$id]);
        $req->closeCursor();

        $projects = $this->getPromoProjects($id);
        $projectRepo = new ProjectRepository;
        foreach ($projects as $project) {
            $projectRepo->deleteProject($project->id);
        }

        $req = $this->bdd->prepare("DELETE FROM promo WHERE promo_id =?");
        $req->execute([$id]);
        $req->closeCursor();

    }

    public function validatePromo($promoId, array $accepted, array $rejected):void
    {
        $UserRepo = new UsersRepository;
        $acceptedMails = [];
        $refusedMails = [];
        $headers = "From: simplon@mail.com\r\n";
        $headers .= "Reply-To: simplon@mail.com\r\n";
        $headers .= "Content-Type: text/plain; charset=utf-8\r\n";
        
        $req = $this->bdd->prepare("UPDATE promo SET status_id = ? WHERE promo_id = ?");
        $req->execute([12,$promoId]);
        $req->closeCursor();

        foreach($accepted as $userId){
            $this->validatePromoUser($promoId,$userId);
            $acceptedMails[] = $UserRepo->getUserMail($userId);
        }

        $Promo = $this->getPromoById($promoId);

        $to = join(",",$acceptedMails);
        $subject = "Vous avez été accepté pour votre formation $Promo->name";
        $message = "Bonjour,\r\n\r\n
            Vous avez été accepté pour la formation de : $Promo->name  \r\n\r\n
            Bienvenue à Simplon ! La formation débute le $Promo->start et se termine le $Promo->end. \r\n\r\n
            Cordialement,\r\n
            Jordan Kunys";
        mail($to, $subject, $message, $headers);

        foreach($rejected as $userId){
            $this->rejectPromoUser($promoId,$userId);
            $refusedMails[] = $UserRepo->getUserMail($userId);
        }

        $to = join(",",$refusedMails);
        $subject = "Vous avez malheureusement été refusé pour votre formation $Promo->name";
        $message = "Bonjour,\r\n\r\n
            Vous avez été refusé pour la formation de : $Promo->name  \r\n\r\n
            Mais n'abandonnez pas ! Formez vous via notre plateforme en ligne ! \r\n\r\n
            Cordialement,\r\n
            Jordan Kunys";
        mail($to, $subject, $message, $headers);
    }

    public function validatePromoUser($promoId, $userId):void
    {
        $req = $this->bdd->prepare("INSERT INTO promo_user (promo_id, user_id) VALUES (?,?)");
        $req->execute([$promoId,$userId]);
        $req->closeCursor();

        $req = $this->bdd->prepare("DELETE FROM promo_candidate WHERE promo_id = ? AND user_id = ?");
        $req->execute([$promoId,$userId]);
        $req->closeCursor();
    }

    public function rejectPromoUser($promoId, $userId):void
    {
        $req = $this->bdd->prepare("INSERT INTO promo_refused (promo_id, user_id) VALUES (?,?)");
        $req->execute([$promoId,$userId]);
        $req->closeCursor();

        $req = $this->bdd->prepare("DELETE FROM promo_candidate WHERE promo_id = ? AND user_id = ?");
        $req->execute([$promoId,$userId]);
        $req->closeCursor();
    }

    public function addPromo(array $POST):void
    {
        $FormationRepo = new FormationRepository;
        $formation = $FormationRepo->getFormationById($POST['formation'])->name;

        $req = $this->bdd->prepare("INSERT INTO promo (promo_name,promo_start,promo_end,formation_id) VALUES (?,?,?,?)");
        $req->execute([$formation,$POST['start'],$POST['end'],$POST['formation']]);

        var_dump($POST);

        if(isset($POST['formators'])){
            foreach($POST['formators'] as $formator){
                $req = $this->bdd->prepare("INSERT INTO promo_user (user_id,promo_id) VALUES (?,?)");
                $req->execute([$formator,$POST['promo']]);
            }
        }
    }

    public function updatePromo(array $POST):void
    {
        var_dump($POST);
        $FormationRepo = new FormationRepository;
        $formation = $FormationRepo->getFormationById($POST['formation'])->name;
        var_dump($formation);

        $req = $this->bdd->prepare("UPDATE promo SET promo_name = ?, promo_start = ?, promo_end = ?, formation_id = ? WHERE promo_id = ?");
        $req->execute([$formation,$POST['start'],$POST['end'],$POST['formation']],$POST['promo']);
    }
}


?>