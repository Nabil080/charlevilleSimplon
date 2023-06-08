<?php
require_once('src/model/ConnectBdd.php');

class Progress {
    public $id;
    public $name;
    public $number;

    public function __construct($id, $name, $number)
    {
        $this->id = $id;
        $this->name = $name;
        $this->number = $number;
    }
}

class ProgressRepository extends ConnectBdd{
    public function __construct(){
        parent::__construct();
    }

    public function getProgressByProjectId($id):array
    {
        $req = $this->bdd->prepare("SELECT * FROM `progress` WHERE `project_id` = ?");
        $req->execute([$id]);
        $datas = $req->fetchAll(PDO::FETCH_ASSOC);
        $allProgress = [];
        foreach ($datas as $data) {
            $Progress = new Progress($data['progress_id'], $data['progress_name'], $data['progress_number']);
            array_push($allProgress, $Progress);
        }
    
        return $allProgress;
    }
}