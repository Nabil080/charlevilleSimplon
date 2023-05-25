<?php
require_once('src/model/ConnectBdd.php');

class Formation
{
    public $id;
    public $name;
    public $description;
    public $duration;
    public $level;
    public $diploma;
    public $image;
    public $status;
}
class FormationRepository extends ConnectBdd
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getFormationById($id):object
    {
        $Formation = new Formation;
        $req = $this->bdd->prepare("SELECT * FROM `formation` WHERE `formation_id` = ?");
        $req->execute([$id]);
        $data = $req->fetch(PDO::FETCH_ASSOC);

        $Formation->id = $data['formation_id'];
        $Formation->name = $data['formation_name'];
        $Formation->description = $data['formation_description'];
        $Formation->duration = $data['formation_duration'];
        $Formation->level = $data['formation_level'];
        $Formation->diploma = $data['formation_diploma'];
        $Formation->image = $data['formation_image'];

        $Status = new Status;
        $statusRepo = new StatusRepository;
        $Status = $statusRepo->getStatusById($data['status_id']);
        $Formation->status = $Status;

        return $Formation;
    }

    public function getAllFormations():array
    {
        $formations = [];

        $req = $this->bdd->prepare('SELECT * FROM formation');
        $req->execute();
        $data = $req->fetchAll();

        foreach($data as $key){
            $Formation = $this->getFormationById($key['formation_id']);
            $formations[] = $Formation;
        }

        return $formations;
    }
}

