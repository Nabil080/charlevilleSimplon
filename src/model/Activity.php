<?php
require_once('src/model/ConnectBdd.php');

class Activity {
    public $id;
    public $name;
    public $ref;
    public $link;
}

class ActivityRepository extends ConnectBdd{
    public function __construct(){
        parent::__construct();
    }

    public function getActivityById($id):object
    {
        $Activity = new Activity;
        $req = $this->bdd->prepare("SELECT * FROM `activity` WHERE `activity_id` = ?");
        $req->execute([$id]);
        $data = $req->fetch(PDO::FETCH_ASSOC);

        $Activity->id = $data['activity_id'];
        $Activity->name = $data['activity_name'];
        $Activity->ref = $data['activity_ref'];
        $Activity->link = $data['activity_link'];

        return $Activity;
    }
}


?>