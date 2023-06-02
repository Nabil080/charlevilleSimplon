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
        $Skill = new Skill;
        $req = $this->bdd->prepare("SELECT skill_Name FROM `skill` WHERE `activity_id` = ?");
        $req->execute([$activity_id]);
        $data = $req->fetchAll(PDO::FETCH_ASSOC);

        $skillTable = array();
        foreach ($data as $skillName) {
            $skillTable[] = $skillName['skill_Name'];
        }

        return $skillTable;
    }
}
?>