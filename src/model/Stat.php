<?php
require_once('src/model/ConnectBdd.php');

class Stat {
    public $id;
    public $name;
    public $number;
    public $formation;
}

class StatRepository extends ConnectBdd{
    public function __construct(){
        parent::__construct();
    }

    public function getStatById($id):object
    {
        $Stat = new Stat;
        $req = $this->bdd->prepare("SELECT * FROM `stat` WHERE `stat_id` = ?");
        $req->execute([$id]);
        $data = $req->fetch(PDO::FETCH_ASSOC);

        $Stat->id = $data['stat_id'];
        $Stat->name = $data['stat_name'];
        $Stat->number = $data['stat_number'];

        $Formation = new Formation;
        $formationRepo = new FormationRepository;
        $Formation = $formationRepo->getFormationById($data['formation_id']);
        $Stat->formation = $Formation;

        return $Stat;
    }
}


?>