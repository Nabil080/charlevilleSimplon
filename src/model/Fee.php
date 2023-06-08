<?php
require_once('src/model/ConnectBdd.php');

class Fee
{
    public $id;
    public $name;
}

class FeeRepository extends ConnectBdd
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getAll()
    {
        $req = $this->bdd->prepare("SELECT * FROM `fee` ORDER BY fee_name");
        $req->execute();
        $data = $req->fetchAll(PDO::FETCH_ASSOC);
        $req->closeCursor();
        return $data;
    }
    public function getFeeByFormation($formation_id): array
    {
        $req = $this->bdd->prepare("SELECT `fee_name`,fee.fee_id FROM `fee` INNER JOIN `formation_fee` as ff ON fee.fee_id = ff.fee_id WHERE `formation_id` = ?");
        $req->execute([$formation_id]);
        $data = $req->fetchAll(PDO::FETCH_ASSOC);
        $req->closeCursor();

        return $data;
    }
    public function addLink($formation_id, $id_fee): void
    {
        $req = "INSERT INTO `formation_fee` SET formation_id = ?, fee_id = ?";
        $stmt = $this->bdd->prepare($req);
        $stmt->execute([$formation_id, $id_fee]);
        $stmt->closeCursor();
    }
    public function deleteLink($formation_id): void
    {
        $req = "DELETE FROM `formation_fee` WHERE formation_id =?";
        $stmt = $this->bdd->prepare($req);
        $stmt->execute([$formation_id]);
        $stmt->closeCursor();
    }
}