<?php
require_once('src/model/ConnectBdd.php');

class Job {
    public $id;
    public $name;
    public $formation;
}

class JobRepository extends ConnectBdd{
    public function __construct(){
        parent::__construct();
    }

    public function getJobById($id):object
    {
        $Job = new Job;
        $req = $this->bdd->prepare("SELECT * FROM `job` WHERE `job_id` = ?");
        $req->execute([$id]);
        $data = $req->fetch(PDO::FETCH_ASSOC);

        $Job->id = $data['job_id'];
        $Job->name = $data['job_name'];

        $Formation = new Formation;
        $formationRepo = new FormationRepository;
        $Formation = $formationRepo->getFormationById($data['formation_id']);
        $Job->formation = $Formation;


        return $Job;
    }

    public function getJobName($id) {
        $req = $this->bdd->prepare("SELECT `job_name` FROM `job` WHERE `formation_id` = ?");
        $req->execute([$id]);
        $data = $req->fetch(PDO::FETCH_COLUMN);
        return $data;
    }
}


?>