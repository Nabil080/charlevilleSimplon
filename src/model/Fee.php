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

    public function getFeeByFormation($formation_id): array
    {
        $Fee = new Fee;
        $req = $this->bdd->prepare("SELECT `fee_name` FROM `fee` INNER JOIN `formation_fee` as ff ON fee.fee_id = ff.fee_id WHERE `formation_id` = ?");
        $req->execute([$formation_id]);
        $data = $req->fetchAll(PDO::FETCH_ASSOC);

        $feeTable = array();
        foreach ($data as $fee) {
            $feeTable[] = $fee['fee_name'];
        }
        return $feeTable;
    }
}


?>