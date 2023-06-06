<?php
require_once('src/model/ConnectBdd.php');

class Requirement
{
    public $id;
    public $name;
    public $formation;
}

class RequirementRepository extends ConnectBdd
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getRequirementByFormation($formation_id): array
    {
        $Requirement = new Requirement;
        $req = $this->bdd->prepare("SELECT `requirement_name` FROM `requirement` WHERE `formation_id` = ?");
        $req->execute([$formation_id]);
        $data = $req->fetchAll(PDO::FETCH_ASSOC);

        $requireTable = array();
        foreach ($data as $require) {
            $requireTable[] = $require['requirement_name'];
        }

        return $requireTable;
    }
}


?>