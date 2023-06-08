<?php
require_once('src/model/ConnectBdd.php');

class Type {
    public $id;
    public $name;
}

class TypeRepository extends ConnectBdd{
    public function __construct(){
        parent::__construct();
    }

    public function getTypeById($id):object
    {
        $Type = new Type;
        $req = $this->bdd->prepare("SELECT * FROM `type` WHERE `type_id` = ?");
        $req->execute([$id]);
        $data = $req->fetch(PDO::FETCH_ASSOC);

        $Type->id = $data['type_id'];
        $Type->name = $data['type_name'];

        return $Type;
    }
}