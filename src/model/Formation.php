<?php
require_once('src/model/ConnectBdd.php');

class Formation
{
    public $id;
    public $name;
    public $description;
    public $duration;
    public $level;
    public $diploma;
    public $preview;
    public $job_name;
    public $promo_start;
    public $status;

}
class FormationRepository extends ConnectBdd
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getFormationById($id):object
    {
        $Formation = new Formation;
        $req = $this->bdd->prepare("SELECT * FROM `formation` WHERE `formation_id` = ?");
        $req->execute([$id]);
        $data = $req->fetch(PDO::FETCH_ASSOC);

        $Formation->id = $data['formation_id'];
        $Formation->name = $data['formation_name'];
        $Formation->description = $data['formation_description'];
        $Formation->duration = $data['formation_duration'];
        $Formation->level = $data['formation_level'];
        $Formation->diploma = $data['formation_diploma'];
        $Formation->preview = $data['formation_preview'];

        $Status = new Status;
        $statusRepo = new StatusRepository;
        $Status = $statusRepo->getStatusById($data['status_id']);
        $Formation->status = $Status;

        $jobRepo = new JobRepository;
        $job = $jobRepo->getjobName($data['formation_id']);
        $Formation->job_name = $job;

        $promoRepo = new PromoRepository;
        $promo_start = $promoRepo->formateDate($promoRepo->getPromoStart($data['formation_id'])) ;
        $Formation->promo_start = $promo_start;

        return $Formation;
    }

    public function getFormations()
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
}

