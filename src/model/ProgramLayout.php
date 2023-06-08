<?php
require_once('src/model/ConnectBdd.php');

class ProgramLayout
{
    public $id;
    public $name;
}

class ProgramLayoutRepository extends ConnectBdd
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getProgramLayoutAll(): array
    {
        $ProgramLayout = new ProgramLayout;
        $req = $this->bdd->prepare("SELECT * FROM `programme_layout`");
        $req->execute();
        $data = $req->fetchAll(PDO::FETCH_ASSOC);

        return $data;
    }
}