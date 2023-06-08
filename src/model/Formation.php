<?php
require_once('src/model/ConnectBdd.php');
require_once('src/model/Promo.php');


class Formation
{
    public $id;
    public $name;
    public $description;
    public $duration;
    public $level;
    public $diploma;
    public $image;
    public $status;
    public $preview;
    public array $jobs;

    public function __construct($id, $name, $description, $duration, $level, $diploma, $image, $preview, $status)
    {
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
        $this->duration = $duration;
        $this->level = $level;
        $this->diploma = $diploma;
        $this->image = $image;
        $this->preview = $preview;

        $statusRepo = new StatusRepository;
        $this->status = $statusRepo->getStatusById($status);

        $jobRepo = new JobRepository;
        $this->jobs = $jobRepo->getJobName($id);
    }

}
class FormationRepository extends ConnectBdd
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getFormationById($id): object
    {
        $req = $this->bdd->prepare("SELECT * FROM formation WHERE formation_id = ?");
        $req->execute([$id]);
        $data = $req->fetch(PDO::FETCH_ASSOC);

        $Formation = new Formation(
            $data['formation_id'],
            $data['formation_name'],
            $data['formation_description'],
            $data['formation_duration'],
            $data['formation_level'],
            $data['formation_diploma'],
            $data['formation_image'],
            $data['formation_preview'],
            $data['status_id'],
        );

        return $Formation;
    }

    public function getFormationLevel($id): string
    {
        $req = $this->bdd->prepare("SELECT formation_level FROM formation WHERE formation_id = ?");
        $req->execute([$id]);
        $data = $req->fetch(PDO::FETCH_ASSOC);

        return $data['formation_level'];
    }

    public function getFormationName($id): string
    {
        $req = $this->bdd->prepare("SELECT formation_name FROM formation WHERE formation_id = ?");
        $req->execute([$id]);
        $data = $req->fetch(PDO::FETCH_ASSOC);

        return $data['formation_name'];
    }

    public function getAllFormations(): array
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
        $levels = [];
        $req = $this->bdd->prepare("SELECT formation_level FROM formation WHERE formation_level IS NOT NULL");
        $req->execute();
        $data = $req->fetchAll(PDO::FETCH_COLUMN);

        foreach ($data as $level) {
            $levels[] = $level;
        }

        $uniqueLevels = array_unique($levels);


        return $uniqueLevels;

    }
    public function checkExistFormation($id): bool
    {
        $req = "SELECT formation_id FROM formation WHERE formation_id = ?";
        $stmt = $this->bdd->prepare($req);
        $stmt->execute([$id]);
        $data = $stmt->fetch(PDO::PARAM_BOOL);

        $bool = ($data != false) ? true : false;
        return $bool;
    }
    public function updateDescription($description, $id): void
    {
        $req = "UPDATE `formation` SET formation_description = ? WHERE formation_id = ?";
        $stmt = $this->bdd->prepare($req);
        $stmt->execute([$description, $id]);
        $stmt->fetch();
    }
}