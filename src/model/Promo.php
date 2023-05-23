<?php
require_once('src/model/ConnectBdd.php');
require_once('src/model/User.php');


class Promo {
    public $id;
    public $start;
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
        $req = $this->bdd->prepare("SELECT * FROM `promo` WHERE `promo_id` = ?");
        $req->execute([$id]);
        $data = $req->fetch(PDO::FETCH_ASSOC);

        $Promo->id = $data['promo_id'];
        $Promo->start = $data['promo_start'];
        $Promo->end = $data['promo_end'];

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
    
}


?>