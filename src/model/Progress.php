<?php
require_once('src/model/ConnectBdd.php');

class Promo {
    public $id;
    public $name;
    public $number;
    public $status;
    public $formation;
}

class PromoRepository extnumbers ConnectBdd{
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
        $Promo->name = $data['promo_name'];
        $Promo->number = $data['promo_number'];

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
}


?>