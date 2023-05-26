<?php
require_once('src/model/ConnectBdd.php');
require_once('src/model/Promo.php');


class Formation extends Promo
{
    public $description;
    public $duration;
    public $level;
    public $diploma;
    public $image;
    public $status;
    public $preview;
    public $job_name;

    public function __construct($id, $start, $end, $name, $status, $formation_id,$description, $duration, $level, $diploma, $preview) 
    {
        parent::__construct($id, $name, $start, $end, $status, $formation_id); 

        $this->description = $description;
        $this->duration = $duration;
        $this->level = $level;
        $this->diploma = $diploma;
        $this->preview = $preview;

        $jobRepo = new JobRepository;
        $job = $jobRepo->getjobName($formation_id);
        $this->job_name = $job;
    }

}
class FormationRepository extends ConnectBdd
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getFormationById($id):object
    {
        
        $req = $this->bdd->prepare("SELECT * FROM formation
        INNER JOIN promo ON promo.formation_id = formation.formation_id
        WHERE formation.formation_id = ?");
        $req->execute([$id]);
        $data = $req->fetch(PDO::FETCH_ASSOC);

        $Formation = new Formation (
            $data['promo_id'],
            $data['promo_start'],
            $data['promo_end'],
            $data['promo_name'],
            $data['status_id'],
            $data['formation_id'],
            $data['formation_description'],
            $data['formation_duration'],
            $data['formation_level'],
            $data['formation_diploma'],
            $data['formation_preview']
        );

        return $Formation;
    }

    public function getAllFormations():array
    {
        $formationRepository = new FormationRepository;
        $req = $this->bdd->prepare('SELECT formation_id FROM formation');
        $req->execute();
        $datas = $req->fetchAll(PDO::FETCH_COLUMN);
        $formations = [];

        foreach ($datas as $data) {
            $formation = $formationRepository->getFormationById($data);
            array_push($formations, $formation);
        }

        return $formations;
    }

    public function getFormationLevels()
    {
        $levels =  [];
        $req = $this->bdd->prepare("SELECT formation_level FROM formation WHERE formation_level IS NOT NULL");
        $req->execute();
        $data = $req->fetchAll(PDO::FETCH_COLUMN);

        foreach($data as $level){
            $levels[] = $level ;
        }
            
        $uniqueLevels = array_unique($levels);

        
        return $uniqueLevels;

    }
}

