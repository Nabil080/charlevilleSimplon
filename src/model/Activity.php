<?php
require_once('src/model/ConnectBdd.php');

class Activity
{
    public $id;
    public $name;
    public $ref;
    public $link;
}

class ActivityRepository extends ConnectBdd
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getActivityByFormation($formation_id): array
    {
        $Activity = new Activity;
        $req = $this->bdd->prepare("SELECT * FROM `activity` AS ac INNER JOIN `formation_activity` AS fa ON ac.activity_id = fa.activity_id WHERE fa.formation_id = ?");
        $req->execute([$formation_id]);
        $data = $req->fetchAll(PDO::FETCH_ASSOC);

        $activityTable = array();
        foreach ($data as $activity) {
            $Skill = new SkillRepository;

            $activityTable[] = [
                'name' => $activity['activity_name'],
                'ref' => $activity['activity_ref'],
                'skill' => $Skill->getSkillByActivity($activity['activity_id'])
            ];
        }
        return $activityTable;
    }
}


?>