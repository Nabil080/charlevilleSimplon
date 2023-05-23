<?php
require_once('src/model/ConnectBdd.php');

class Program {
    public $id;
    public $name;
    public $formation;
}

class ProgramRepository extends ConnectBdd{
    public function __construct(){
        parent::__construct();
    }

    public function getProgramById($id):object
    {
        $Program = new Program;
        $req = $this->bdd->prepare("SELECT * FROM `programme` WHERE `programme_id` = ?");
        $req->execute([$id]);
        $data = $req->fetch(PDO::FETCH_ASSOC);

        $Program->id = $data['programme_id'];
        $Program->name = $data['programme_name'];

        $Formation = new Formation;
        $formationRepo = new FormationRepository;
        $Formation = $formationRepo->getFormationById($data['formation_id']);
        $Program->formation = $Formation;

        $ProgramLayout = new ProgramLayout;
        $ProgramLayoutRepo = new ProgramLayoutRepository;
        $ProgramLayout = $ProgramLayoutRepo->getProgramLayoutById($data['programme_layout_id']);
        $Program->ProgramLayout = $ProgramLayout;


        return $Program;
    }
}


?>