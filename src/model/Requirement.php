<?php
require_once('src/model/ConnectBdd.php');

class Requirement {
    public $id;
    public $name;
    public $name;
}

class RequirementRepository extends ConnectBdd{
    public function __construct(){
        parent::__construct();
    }

    public function getRequirementById($id):object
    {
        $Requirement = new Requirement;
        $req = $this->bdd->prepare("SELECT * FROM `requirement` WHERE `requirement_id` = ?");
        $req->execute([$id]);
        $data = $req->fetch(PDO::FETCH_ASSOC);

        $Requirement->id = $data['requirement_id'];
        $Requirement->name = $data['requirement_name'];
        

        return $Requirement;
    }
}


?>