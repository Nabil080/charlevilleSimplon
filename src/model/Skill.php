<?php
require_once('src/model/ConnectBdd.php');

class Skill
{
    public $id;
    public $name;
    public $activity;
}

class SkillRepository extends ConnectBdd
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getSkillByActivity($activity_id): array
    {
        $req = $this->bdd->prepare("SELECT * FROM `skill` WHERE `activity_id` = ?");
        $req->execute([$activity_id]);
        $data = $req->fetchAll(PDO::FETCH_ASSOC);

        $skillTable = array();
        foreach ($data as $skillName) {
            $skillTable[$skillName['skill_id']] = $skillName['skill_name'];
        }

        return $skillTable;
    }
    public function getAll()
    {
        $req = "SELECT * FROM `skill` ORDER BY skill_name";
        $stmt = $this->bdd->prepare($req);
        $stmt->execute();
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt->closeCursor();

        $skillTable = array();
        foreach ($data as $skillName) {
            $skillTable[$skillName['skill_id']] = $skillName['skill_name'];
        }

        return $skillTable;
    }
}