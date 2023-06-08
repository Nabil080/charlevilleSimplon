<?php
require_once('src/model/ConnectBdd.php');

class Role {
    public $id;
    public $name;
}

class RoleRepository extends ConnectBdd{
    public function __construct(){
        parent::__construct();
    }

    public function getRoleById($id):object
    {
        $Role = new Role;
        $req = $this->bdd->prepare("SELECT * FROM `role` WHERE `role_id` = ?");
        $req->execute([$id]);
        $data = $req->fetch(PDO::FETCH_ASSOC);

        $Role->id = $data['role_id'];
        $Role->name = $data['role_name'];

        return $Role;
    }
}