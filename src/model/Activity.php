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
        $req = "SELECT * FROM `activity` AS ac INNER JOIN `formation_activity` AS fa ON ac.activity_id = fa.activity_id WHERE fa.formation_id = ?";
        $stmt = $this->bdd->prepare($req);
        $stmt->execute([$formation_id]);
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt->closeCursor();

        $activityTable = array();
        foreach ($data as $activity) {
            $activityTable[$activity['activity_id']] = [
                'name' => $activity['activity_name'],
                'ref' => $activity['activity_ref'],
                'skill' => $activity['activity_skill']
            ];
        }
        return $activityTable;
    }

    public function updateName($id, $name): void
    {
        $req = "UPDATE `activity` SET activity_name = ? WHERE activity_id = ?";
        $stmt = $this->bdd->prepare($req);
        $stmt->execute([$name, $id]);
        $stmt->closeCursor();
    }
    public function updateRef($id, $ref): void
    {
        $req = "UPDATE `activity` SET activity_ref = ? WHERE activity_id = ?";
        $stmt = $this->bdd->prepare($req);
        $stmt->execute([$ref, $id]);
        $stmt->closeCursor();
    }
    public function updateSkill($id, $skill): void
    {
        $req = "UPDATE `activity` SET activity_skill = ? WHERE activity_id = ?";
        $stmt = $this->bdd->prepare($req);
        $stmt->execute([$skill, $id]);
        $stmt->closeCursor();
    }
    public function addLink($formation_id, $id): void
    {
        $req = "INSERT INTO `formation_activity` SET formation_id = ?, activity_id= ?";
        $stmt = $this->bdd->prepare($req);
        $stmt->execute([$formation_id, $id]);
        $stmt->closeCursor();
    }
    public function deleteLink($formation_id): void
    {
        $req = "DELETE FROM `formation_activity` WHERE formation_id = ?";
        $stmt = $this->bdd->prepare($req);
        $stmt->execute([$formation_id]);
        $stmt->closeCursor();
    }
    public function getAll()
    {
        $req = "SELECT `activity_id`, `activity_name` FROM `activity` ORDER BY activity_name";
        $stmt = $this->bdd->prepare($req);
        $stmt->execute();
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $activityTable = array();
        foreach ($data as $activity) {
            $activityTable[$activity['activity_id']] = [
                'name' => $activity['activity_name'],
            ];
        }
        return $activityTable;
    }
}