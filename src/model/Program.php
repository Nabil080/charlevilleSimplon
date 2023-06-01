<?php
require_once('src/model/ConnectBdd.php');

class Program
{
    public $id;
    public $name;
    public $formation;
    public $layout;
}

class ProgramRepository extends ConnectBdd
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getProgramByFormation($formation_id): array
    {
        $Program = new Program;
        $req = $this->bdd->prepare("SELECT `programme_name`,`programme_layout_name` FROM `programme` as pr INNER JOIN `programme_layout` as pl ON pr.programme_layout_id = pl.programme_layout_id WHERE pr.formation_id = ?");
        $req->execute([$formation_id]);
        $data = $req->fetchAll(PDO::FETCH_ASSOC);

        return $data;

    }
}


?>