<?php
require_once('src/model/ConnectBdd.php');

class ProgramLayout {
    public $id;
    public $name;
}

class ProgramLayoutRepository extends ConnectBdd{
    public function __construct(){
        parent::__construct();
    }

    public function getProgramLayoutById($id):object
    {
        $ProgramLayout = new ProgramLayout;
        $req = $this->bdd->prepare("SELECT * FROM `programme_layout` WHERE `programme_layout_id` = ?");
        $req->execute([$id]);
        $data = $req->fetch(PDO::FETCH_ASSOC);

        $ProgramLayout->id = $data['programme_layout_id'];
        $ProgramLayout->name = $data['programme_layout_name'];

        return $ProgramLayout;
    }
}


?>