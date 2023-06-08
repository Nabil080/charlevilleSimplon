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
        $req = $this->bdd->prepare("SELECT `requirement_name` FROM `requirement` AS r INNER JOIN `formation_requirement` AS fr ON r.requirement_id = fr.requirement_id WHERE fr.formation_id = ?");
        $req->execute([$formation_id]);
        $data = $req->fetchAll(PDO::FETCH_ASSOC);

        $requireTable = array();
        foreach ($data as $require) {
            $requireTable[] = $require['requirement_name'];
        }

        return $requireTable;
    }
    public function getAll(): array
    {
        $req = "SELECT * FROM `requirement` ORDER BY requirement_name";
        $stmt = $this->bdd->prepare($req);
        $stmt->execute();
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt->closeCursor();

        $requireTable = array();
        foreach ($data as $require) {
            $requireTable[$require['requirement_id']] = $require['requirement_name'];
        }

        return $requireTable;
    }
    public function addLink($formation_id, $id): void
    {
        $req = "INSERT INTO `formation_requirement` SET `formation_id`= ?, `requirement_id` = ?";
        $stmt = $this->bdd->prepare($req);
        $stmt->execute([$formation_id, $id]);
        $stmt->closeCursor();
    }
    public function deleteLink($formation_id): void
    {
        $req = "DELETE FROM `formation_requirement` WHERE `formation_id` = ?";
        $stmt = $this->bdd->prepare($req);
        $stmt->execute([$formation_id]);
        $stmt->closeCursor();
    }
}