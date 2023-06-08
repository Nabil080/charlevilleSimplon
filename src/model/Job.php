<?php
require_once('src/model/ConnectBdd.php');

class Job
{
    public $id;
    public $name;
    public $formation;
}

class JobRepository extends ConnectBdd
{
    public function __construct()
    {
        parent::__construct();
    }
    public function getJobById($id): object
    {
        $Job = new Job;
        $req = $this->bdd->prepare("SELECT * FROM `job` WHERE `job_id` = ?");
        $req->execute([$id]);
        $data = $req->fetch(PDO::FETCH_ASSOC);

        $Job->id = $data['job_id'];
        $Job->name = $data['job_name'];

        $Formation = new FormationRepository;
        $formationRepo = new FormationRepository;
        $Formation = $formationRepo->getFormationById($data['formation_id']);
        $Job->formation = $Formation;

        return $Job;
    }


    public function getJobName($formation_id): array
    {
        $req = $this->bdd->prepare("SELECT job.job_id,`job_name` FROM `job` INNER JOIN `formation_job`AS fj ON job.job_id = fj.job_id WHERE fj.formation_id = ?");
        $req->execute([$formation_id]);
        $data = $req->fetchAll(PDO::FETCH_ASSOC);

        $jobTable = array();
        foreach ($data as $job) {
            $jobTable[$job['job_id']] = $job['job_name'];
        }
        return $jobTable;
    }

    public function getAll(): array
    {
        $req = "SELECT `job_id`,`job_name` FROM `job`";
        $stmt = $this->bdd->prepare($req);
        $stmt->execute();
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $jobTable = array();
        foreach ($data as $job) {
            $jobTable[$job['job_id']] = $job['job_name'];
        }
        return $jobTable;
    }

    public function addLink($formation_id, $job_id): void
    {
        $req = "INSERT INTO `formation_job` SET `formation_id` = ?, `job_id` = ?";
        $stmt = $this->bdd->prepare($req);
        $stmt->execute([$formation_id, $job_id]);
        $stmt->closeCursor();
    }
    public function deleteLink($formation_id): void
    {
        $req = "DELETE FROM `formation_job` WHERE `formation_id` = ?";
        $stmt = $this->bdd->prepare($req);
        $stmt->execute([$formation_id]);
        $stmt->closeCursor();
    }
    public function addJob($job): void
    {
        $req = "INSERT INTO `job` SET `job_name` = ?";
        $stmt = $this->bdd->prepare($req);
        $stmt->execute([$job]);
        $stmt->closeCursor();
    }

}