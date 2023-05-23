<?php
require_once('src/model/ConnectBdd.php');

class Progress {
    public $id;
    public $name;
    public $number;
    public $project;
}

class ProgressRepository extends ConnectBdd{
    public function __construct(){
        parent::__construct();
    }

    public function getProgressById($id):object
    {
        $Progress = new Progress;
        $req = $this->bdd->prepare("SELECT * FROM `progress` WHERE `progress_id` = ?");
        $req->execute([$id]);
        $data = $req->fetch(PDO::FETCH_ASSOC);

        $Progress->id = $data['progress_id'];
        $Progress->name = $data['progress_name'];
        $Progress->number = $data['progress_number'];

        $Project = new Project;
        $projectRepo = new ProjectRepository;
        $Project = $projectRepo->getProjectById($data['Project_id']);
        $Progress->project = $Project;

        return $Progress;
    }
}


?>