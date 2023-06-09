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
    public  $status;
    public $year;
    public $status_id;
    public $formation_id;



    public function __construct (int $id, $name, $start, $end, $year,$formation_id, $status_id) 
    {
        $this->id = $id;
        $this->start = $start;
        $this->name = $name;
        $this->end = $end;
        $this->year = $year;
        $this->formation_id = $formation_id;

        $statusRepo = new StatusRepository;
        $Status = $statusRepo->getStatusById($status_id);
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
        $data['promo_year'],
        $data['formation_id'],
        $data['status_id']
        );

        return $Promo;
    }

    public function getPromosNumber():int
    {
        $req = $this->bdd->prepare("SELECT COUNT(*) FROM promo");
        $req->execute();
        $data = $req->fetch(PDO::FETCH_COLUMN);

        return $data;
    }

    public function getFilteredPromosNumber($filters = null,$execute = null):int
    {
        $filters = $filters === null ? "" : "WHERE $filters";
        $execute = $execute === null ? [] : explode(",",$execute);
        $query = "SELECT COUNT(*) FROM promo $filters"; 
        // var_dump($query);
        // var_dump($execute);
        $req = $this->bdd->prepare($query);
        $req->execute($execute);
        $data = $req->fetch(PDO::FETCH_COLUMN);

        return $data;
    }
    public function getPromos($limitRequest = null, $filters = null, $execute = null, $order = null): array
    {

        $filters = $filters === null ? "" : "WHERE $filters";
        $execute = $execute === null ? [] : explode(",",$execute);
        $order = $order === null ? "ORDER BY promo.status_id DESC" : "ORDER BY $order";
        $limit = $limitRequest === null ? "" : "LIMIT $limitRequest";

        $query = "SELECT * FROM `promo` $filters $order $limit";

        $promoRepository = new PromoRepository;
        $req = $this->bdd->prepare($query);
        $req->execute($execute);
        $datas = $req->fetchAll(PDO::FETCH_ASSOC);
        $promos = [];


        foreach ($datas as $data)
        {
            // Update automatiquement le statut de la promo aux dates requises
            $promoRepository->updatePromoStatus($data['promo_start'], $data['promo_end'], $data['promo_id']);

            $Promo = new Promo(
                $data['promo_id'],
                $data['promo_name'],
                $promoRepository->formateDate($data['promo_start']),
                $promoRepository->formateDate($data['promo_end']),
                $data['promo_year'],
                $data['formation_id'],
                $data['status_id']
                );

            array_push($promos, $Promo);

        }
        return $promos;
    }


    public function getPromoDate($id):array
    {
        $dates = [];

        $req = $this->bdd->prepare("SELECT promo_start, promo_end FROM promo WHERE promo_id = ?");
        $req->execute([$id]);
        $data = $req->fetch();

        $dates['start'] = $data['promo_start'] ;
        $dates['end'] = $data['promo_end'] ;


        return $dates;
    }

    public function getAllApprenants($id):array

    {
        $req = $this->bdd->prepare("SELECT user_id FROM promo_user WHERE promo_id = ?");
        $req->execute([$id]);
        $datas = $req->fetchAll(PDO::FETCH_COLUMN);

        $UsersRepository = new UserRepository;
        $users = [];

        foreach ($datas as $data) {
            $user = new User($data);
            if ($user->role_id == 4) {
                array_push($users, $user);
            }
        }
        return $users;
    }

    public function getAllFormateurs($id): array
    {
        $req = $this->bdd->prepare("SELECT user_id FROM promo_user 
        WHERE promo_id = ?");
        $req->execute([$id]);
        $datas = $req->fetchAll(PDO::FETCH_COLUMN);

        $UsersRepository = new UserRepository;

        $users = [];

        foreach ($datas as $data) {
            $user = new User($data);

            if ($user->role_id == 2) {
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

    public function getPromoStart($id) 

    {
        $req = $this->bdd->prepare("SELECT `promo_start` FROM `promo` WHERE `promo_id` = ?");
        $req->execute([$id]);
        $data = $req->fetch(PDO::FETCH_COLUMN);
        return $data;
    }

    public function getPromoEnd($id) 
    {
        $req = $this->bdd->prepare("SELECT `promo_end` FROM `promo` WHERE `promo_id` = ?");
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
    }

    public function getActivePromos():array

    {
        $req = $this->bdd->prepare("SELECT * FROM promo WHERE status_id = ?");
        $req->execute([12]);
        $data = $req->fetchAll(PDO::FETCH_ASSOC);

        $promos = [];

        foreach ($data as $key) {
            $promos[] = $this->getPromoById($key['promo_id']);
        }

        return $promos;
    }

    public function getPromoByUserID($id)
    {
        $Promo_datas = [];
        $candidate_datas = [];
        $req = $this->bdd->prepare("SELECT * FROM `promo_candidate` WHERE `user_id` = ?");
        $req->execute([$id]);
        $datas = $req->fetchAll(PDO::FETCH_ASSOC);
        foreach($datas as $data){
            $data_candidate = $this->getPromoById($data['promo_id']);
            array_push($candidate_datas, $data_candidate);
        }
        array_push($Promo_datas, $candidate_datas);

        $refused_datas = [];
        $req = $this->bdd->prepare("SELECT * FROM `promo_refused` WHERE `user_id` = ?");
        $req->execute([$id]);
        $datas = $req->fetchAll(PDO::FETCH_ASSOC);
        foreach($datas as $data){
            $data_refused = $this->getPromoById($data['promo_id']);
            array_push($refused_datas, $data_refused);
        }
        array_push($Promo_datas, $refused_datas);

        $user_datas = [];
        $req = $this->bdd->prepare("SELECT * FROM `promo_user` WHERE `user_id` = ?");
        $req->execute([$id]);
        $datas = $req->fetchAll(PDO::FETCH_ASSOC);
        foreach($datas as $data){
            $data_user = $this->getPromoById($data['promo_id']);
            array_push($user_datas, $data_user);
        }
        array_push($Promo_datas, $user_datas);

        if (empty($Promo_datas))
        {
            return "Cet utilisateur n'appartient à aucune promotion en cours ou ayant existé.";
        } else {
            return $Promo_datas;
        }
    }

    public function formateDate($date): string
    {
        setlocale(LC_TIME, 'fr_FR', 'french', 'French_France.1252', 'fr_FR.ISO8859-1', 'fra');
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
        $UsersRepository = new UserRepository;
        $users = [];
        
        foreach ($datas as $data) {
            $User = new User($data['user_id']);
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
        $UserRepo = new UserRepository;
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

        $req = $this->bdd->prepare("UPDATE user SET role_id = 4 WHERE user_id = ?");
        $req->execute([$userId]);
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

        $promoName = getPromoName($formation,$POST['start']);
        $promoyear = explode("-",$POST['start'])[0];

        $req = $this->bdd->prepare("INSERT INTO promo (promo_name,promo_start,promo_end,formation_id,status_id,promo_year) VALUES (?,?,?,?,?,?)");
        $req->execute([$promoName,$POST['start'],$POST['end'],$POST['formation'],9,$promoyear]);

        var_dump($POST);

        $lastId = $this->bdd->lastInsertId();
        if(isset($POST['formators'])){
            foreach($POST['formators'] as $formator){
                $req = $this->bdd->prepare("INSERT INTO promo_user (user_id,promo_id) VALUES (?,?)");
                $req->execute([$formator,$lastId]);
            }
        }
    }

    public function updatePromo(array $POST):void
    {
        var_dump($POST);
        $FormationRepo = new FormationRepository;
        $formation = $FormationRepo->getFormationById($POST['formation'])->name;

        $promoName = getPromoName($formation,$POST['start']);

        $req = $this->bdd->prepare("UPDATE promo SET promo_name = ?, promo_start = ?, promo_end = ?, formation_id = ? WHERE promo_id = ?");
        $req->execute([$promoName,$POST['start'],$POST['end'],$POST['formation'],$POST['promo']]);


        if(isset($POST['formators'])){

            $formators = $this->getAllFormateurs($POST['promo']);
            var_dump($formators);
            if(is_array($formators)){
                foreach($formators as $formator){
                    $req = $this->bdd->prepare("DELETE FROM promo_user WHERE user_id = ? AND promo_id = ?");
                    $req->execute([$formator->user_id, $POST['promo']]);
                }
            }

            foreach($POST['formators'] as $formator){
                $req = $this->bdd->prepare("INSERT INTO promo_user (user_id,promo_id) VALUES (?,?)");
                $req->execute([$formator,$POST['promo']]);
            }
        }
    }

    
    public function updatePromoStatus(string $starting_date, string $ending_date, int $promo_id)
    {
        $today = date('Y-m-d');
        $origin = new DateTimeImmutable($today);
        $start = new DateTimeImmutable($starting_date);
        $end = new DateTimeImmutable($ending_date);
        $interval_start = $origin->diff($start);
        $interval_end = $end->diff($origin);

        // $interval_end->invert == 1 lorsque la promo n'est pas encore terminée
        // $interval_end->invert == 0 correspond à une date dépassée
        // => "promo terminée"
        if ($interval_end->invert == 0 && $interval_end->days > 1)
        {
            $req = $this->bdd->prepare("UPDATE promo SET status_id =? WHERE promo_id=?");
            $req->execute([13, $promo_id]);
        }
        // $interval_end->invert == 1 la promo n'est pas terminée
        // mais elle n'est pas commencée $interval_start->invert == 0
        //  && elle commence dans moins de 90 jours
        // => "promo débute le"
        elseif($interval_end->invert == 1 && $interval_start->invert == 0 && $interval_start->days <= 90)
        {
            $req = $this->bdd->prepare("UPDATE promo SET status_id =? WHERE promo_id= ?");
            $req->execute([14, $promo_id]);
        }
        // $interval_end->invert == 1 la promo n'est pas terminée mais elle est commencée $interval_start->invert == 1 => "promo en cours"
        elseif ($interval_end->invert == 1 && $interval_start->invert == 1)
        {
            $req = $this->bdd->prepare("UPDATE promo SET status_id =? WHERE promo_id= ?");
            $req->execute([12, $promo_id]);
        }
    }

    public function getPromoStartByFormationID($id) 

    {
    $req = $this->bdd->prepare("SELECT `promo_id` FROM `promo` WHERE `formation_id` = ?");
    $req->execute([$id]);
    $data = $req->fetch(PDO::FETCH_COLUMN);
    $req = $this->bdd->prepare("SELECT `promo_start` FROM `promo` WHERE `promo_id` = ?");
    $req->execute([$data]);
    $data = $req->fetch(PDO::FETCH_COLUMN);
    $promoRepo = new PromoRepository();
    $data = $promoRepo->formateDate($data);
    return $data;
    }
    
    public function getPromoEndByFormationID($id) 
    {
        $req = $this->bdd->prepare("SELECT `promo_id` FROM `promo` WHERE `formation_id` = ?");
        $req->execute([$id]);
        $data = $req->fetch(PDO::FETCH_COLUMN);
        $req = $this->bdd->prepare("SELECT `promo_end` FROM `promo` WHERE `promo_id` = ?");
        $req->execute([$data]);
        $data = $req->fetch(PDO::FETCH_COLUMN);
        $promoRepo = new PromoRepository;
        $data = $promoRepo->formateDate($data);
        return $data;
    }

    public function getPromoImage($id)
    {
        $req = $this->bdd->prepare("SELECT `formation_image` FROM `formation` WHERE `formation_id` = ?");
        $req->execute([$id]);
        $data = $req->fetch(PDO::FETCH_COLUMN);
        return $data;
    }


}
