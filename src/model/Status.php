<?php
require_once('src/model/ConnectBdd.php');

class Status {
    public $id;
    public $name;
}

class StatusRepository extends ConnectBdd{
    public function __construct(){
        parent::__construct();
    }

    public function getStatusById($id):object
    {
        $Status = new Status;
        $req = $this->bdd->prepare("SELECT * FROM `status` WHERE `status_id` = ?");
        $req->execute([$id]);
        $data = $req->fetch(PDO::FETCH_ASSOC);

        $Status->id = $data['status_id'];
        $Status->name = $data['status_name'];

        return $Status;
    }

    public function getAllStatus()
    {
        $req = $this->bdd->prepare("SELECT * FROM status");
        $req->execute();
        $allStatus = $req->fetchAll(PDO::FETCH_ASSOC);

        return $allStatus;
    }
}