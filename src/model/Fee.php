<?php
require_once('src/model/ConnectBdd.php');

class Fee {
    public $id;
    public $name;
}

class FeeRepository extends ConnectBdd{
    public function __construct(){
        parent::__construct();
    }

    public function getFeeById($id):object
    {
        $Fee = new Fee;
        $req = $this->bdd->prepare("SELECT * FROM `fee` WHERE `fee_id` = ?");
        $req->execute([$id]);
        $data = $req->fetch(PDO::FETCH_ASSOC);

        $Fee->id = $data['fee_id'];
        $Fee->name = $data['fee_name'];

        return $Fee;
    }
}


?>