<?php
require_once('src/model/ConnectBdd.php');

class Skill {
    public $id;
    public $name;
    public $activity;
}

class SkillRepository extends ConnectBdd{
    public function __construct(){
        parent::__construct();
    }

    public function getSkillById($id):object
    {
        $Skill = new Skill;
        $req = $this->bdd->prepare("SELECT * FROM `skill` WHERE `skill_id` = ?");
        $req->execute([$id]);
        $data = $req->fetch(PDO::FETCH_ASSOC);

        $Skill->id = $data['skill_id'];
        $Skill->name = $data['skill_name'];

        $Activity = new Activity;
        $activityRepo = new ActivityRepository;
        $Activity = $activityRepo->getActivityById($data['activity_id']);
        $Skill->activity = $Activity;

        return $Skill;
    }
}


?>