<?php
require_once('src/model/ConnectBdd.php');
require_once('src/model/User.php');


class Promo {
    public $id;
    public $start;
    public $name;
    public $end;
    public $status;
    public $formation;
}

class PromoRepository extends ConnectBdd{
    public function __construct(){
        parent::__construct();
    }

    public function getPromoById($id):object
    {
        $Promo = new Promo;
        $promoRepository = new PromoRepository;
        $req = $this->bdd->prepare("SELECT * FROM `promo` WHERE `promo_id` = ?");
        $req->execute([$id]);
        $data = $req->fetch(PDO::FETCH_ASSOC);

        $Promo->id = $data['promo_id'];
        $Promo->name = $data['promo_name'];
        $Promo->start = $promoRepository->formateDate($data['promo_start']);
        $Promo->end = $promoRepository->formateDate($data['promo_end']);
        

        $Status = new Status;
        $statusRepo = new StatusRepository;
        $Status = $statusRepo->getStatusById($data['status_id']);
        $Promo->status = $Status;

        $Formation = new Formation;
        $formationRepo = new FormationRepository;
        $Formation = $formationRepo->getFormationById($data['formation_id']);
        $Promo->formation = $Formation;

        return $Promo;
    }

    public function formateDate($date):string
    {
        $mois = ['janvier', 'février', 'mars', 'avril', 'mai', 'juin', 'juillet', 'août', 'septembre', 'octobre', 'novembre', 'décembre'];
        $explode  = substr($date, '5', '2');
        $date = date('d-m-Y', strtotime($date));
        $findMois = $mois[($explode * 1) - 1];
        $date = str_replace($explode, $findMois, $date);
        $date = str_replace("-", " ", $date);
        return $date;
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


?>