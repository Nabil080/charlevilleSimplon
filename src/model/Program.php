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
        $req = $this->bdd->prepare("SELECT `programme_name`,`programme_layout_name`,pr.programme_layout_id FROM `programme` as pr INNER JOIN `programme_layout` as pl ON pr.programme_layout_id = pl.programme_layout_id WHERE pr.formation_id = ?");
        $req->execute([$formation_id]);
        $data = $req->fetchAll(PDO::FETCH_ASSOC);

        return $data;

    }
    public function updateDescription($formation_id, $program_layout_id, $program_description): void
    {

        $req = "UPDATE `programme` SET `programme_name` = ? WHERE `formation_id`= ? AND `programme_layout_id` = ?";
        $stmt = $this->bdd->prepare($req);
        $stmt->execute([$program_description, $formation_id, $program_layout_id]);
    }
}