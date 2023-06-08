<?php
require_once('src/model/ConnectBdd.php');

class Stat
{
    private $id;
    private $name;
    private $number;

    public function __construct($data)
    {
        $this->id = $data['stat_id'];
        $this->name = $data['stat_name'];
        $this->number = $data['stat_number'];
    }

    public function getName()
    {
        return $this->name;
    }

    public function getNumber()
    {
        return $this->number;
    }
}

class StatRepository extends ConnectBdd
{
    public function getStats($formation_id): array
    {
        $req = $this->bdd->prepare("SELECT * FROM `stat` WHERE `formation_id` = ?");
        $req->execute([$formation_id]);
        $data = $req->fetchAll(PDO::FETCH_ASSOC);

        $statTable = array();
        foreach ($data as $stat) {
            $statTable[$stat['stat_id']] = [
                'stat_number' => $stat['stat_number'],
                'stat_name' => $stat['stat_name']
            ];
        }

        return $statTable;
    }
    public function udpdateNumber($stat_id, $stat_number): void
    {
        $req = "UPDATE `stat` SET stat_number = ? WHERE stat_id";
        $stmt = $this->bdd->prepare($req);
        $stmt->execute([$stat_number, $stat_id]);
    }
    public function udpdateName($stat_id, $stat_name): void
    {
        $req = "UPDATE `stat` SET stat_name = ? WHERE stat_id";
        $stmt = $this->bdd->prepare($req);
        $stmt->execute([$stat_name, $stat_id]);
    }
}