<?php
require_once('src/model/ConnectBdd.php');

class Project
{
    public $id;
    public $name;
    public $description;
    public $file;
    public $notes;
    public $github;
    public $company_name;
    public $company_link;
    public $company_image;
    public $company_adress;
    public $model_image;
    public $model_link;
    public $user;
    public $formator;
    public $status;
    public $promo;
    // public $formation;
    public $type;
    public $tags;
    public $start;
    public $end;
    public $team;

    // public function createToInsert(array $projectForm):bool{


    //     return true
    // }

    public function getProjectLevel()
    {
        $formationRepo = new FormationRepository();

        $level = $formationRepo->getFormationLevel($this->promo->formation_id);

        return $level;
    }

}

class ProjectRepository extends ConnectBdd
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getProjectById($projectId)
    {
        $project = new Project;

        $req = $this->bdd->prepare("SELECT * FROM project WHERE project_id = ?");
        $req->execute([$projectId]);
        $data = $req->fetch(PDO::FETCH_ASSOC);

        $project->id = $data['project_id'];
        $project->name = $data['project_name'];
        $project->description = $data['project_description'];
        $project->file = $data['project_file'];
        $project->notes = $data['project_notes'];
        $project->github = $data['project_github'];
        $project->company_image = $data['project_company_image'];
        $project->company_name = $data['project_company_name'];
        $project->company_link = $data['project_company_link'];
        $project->company_adress = $data['project_company_adress'];
        $project->model_image = $data['project_model_image'];
        $project->model_link = $data['project_model_link'];

        $User = new User($data['user_id']);
        $project->user = $User;

        $Formator = new User($data['user_id_project_formator']);
        $project->formator = $Formator;

        $Status = new Status;
        $statusRepo = new StatusRepository;
        $Status = $statusRepo->getStatusById($data['status_id']);
        $project->status = $Status;

        // $Promo = new Promo;
        $promoRepo = new PromoRepository;
        $Promo = $promoRepo->getPromoById($data['promo_id']);
        $project->promo = $Promo;

        // $formationRepo = new FormationRepository;
        // $Formation = $formationRepo->getFormationById($data['formation_id']);
        // $project->formation = $Formation;

        $Type = new Type;
        $typeRepo = new TypeRepository;
        $Type = $typeRepo->getTypeById($data['type_id']);
        $project->type = $Type;

        $tagRepo = new TagRepository;
        $tags = $tagRepo->getProjectTags($data['project_id']);
        $project->tags = $tags;

        $project->team = $this->getProjectUsers($data['project_id']);

        $project->start = null;
        $project->end = null;
        if($data['status_id'] == 12){
            $projectDateStart = new PromoRepository;
            $project->start = $projectDateStart->formateDate($data['project_start']);
            $project->end = 'En cours';
        }
        if($data['status_id'] == 12){
            $projectDateStart = new PromoRepository;
            $project->start = $projectDateStart->formateDate($data['project_start']);
            $project->end = 'En cours';
        }
        if($data['status_id'] == 13){
            $projectDateStart = new PromoRepository;
            $project->start = $projectDateStart->formateDate($data['project_start']);
            $projectDateEnd = new PromoRepository;
            $project->end = $projectDateEnd->formateDate($data['project_end']);
        }
        return $project;
    }

    public function getAllProjects($limitRequest = null): array
    {
        $projects = [];
        $limit = $limitRequest == null ? "" : "LIMIT " . $limitRequest;

        $req = $this->bdd->prepare("SELECT project_id FROM project $limit");
        $req->execute();
        $data = $req->fetchAll(PDO::FETCH_ASSOC);


        foreach ($data as $key) {
            $Project = new Project;
            $projectRepo = new ProjectRepository;
            $Project = $projectRepo->getProjectById($key['project_id']);

            $projects[] = $Project;
        }

        return $projects;
    }

    public function getProjectsDate()
    {
        $dates = [];
        $req = $this->bdd->prepare("SELECT project_start FROM project WHERE project_start IS NOT NULL");
        $req->execute();
        $data = $req->fetchAll(PDO::FETCH_COLUMN);

        foreach ($data as $key) {
            $start = date_create($key);
            $year = date_format($start, "Y");

            $dates[] = $year;
        }

        $uniqueDates = array_unique($dates);
        return $uniqueDates;
    }

    public function getProjectUsers($id): array
    {
        $team = [];
        $req = $this->bdd->prepare("SELECT `user_id` FROM `project_team` WHERE `project_id` = ? ");
        $req->execute([$id]);
        $data = $req->fetchAll(PDO::FETCH_ASSOC);

        foreach ($data as $key) {
            $User = new User($key['user_id']);

            $team[] = $User;
        }

        return $team;
    }

    public function getUserProjects($id): array
    {
        $projects = [];
        $req = $this->bdd->prepare("SELECT project_id FROM project_team WHERE user_id = ?");
        $req->execute([$id]);
        $datas = $req->fetchAll(PDO::FETCH_COLUMN);

        foreach ($datas as $data) {
            $project = new Project;

            $req = $this->bdd->prepare("SELECT project_id, project_name FROM project WHERE project_id = ?");
            $req->execute([$data]);
            $data = $req->fetch(PDO::FETCH_ASSOC);

            $project->id = $data['project_id'];
            $project->name = $data['project_name'];

        }

        return $projects;
    }

    public function getEntrepriseProjects(int $id):array 
    {
        $req = $this->bdd->prepare("SELECT project_id FROM project WHERE user_id = ?");
        $req->execute([$id]);
        $datas = $req->fetchAll(PDO::FETCH_COLUMN);
        $projectRepository = new ProjectRepository;
        $projects = [];

        foreach($datas as $data){
            $project = $projectRepository->getProjectById($data);
            array_push($projects, $project);
        }   
        return $projects;
    }

    public function updateProjectStatus(string $validation, int $id):bool
    {
        if ($validation == "accept") {
            $status_id = 10;
        } else if ($validation == "refused") {
            $status_id = 11;
        }
        $req = $this->bdd->prepare("UPDATE project SET status_id = ? WHERE project_id = ?");
        $bool = $req->execute([$status_id, $id]);
        return $bool;
    }

    public function assignProjectToPromo(int $projectId ,int $promoId):bool
    {
        $req = $this->bdd->prepare("UPDATE project SET promo_id = ? WHERE project_id = ?");
        $bool = $req->execute([$promoId, $projectId]);
        return $bool;
    }

    public function assignTeamToProject(int $projectId, array $apprenants):array
    {
        $bools = [];
        if (is_array($apprenants)) {
            foreach ($apprenants as $apprenant) {
                $req = $this->bdd->prepare("INSERT INTO project_team (project_id, user_id) VALUES (?, ?)");
                $bool = $req->execute([$projectId, $apprenant]);
                array_push($bools, $bool);
            }
            if ($bool == true) {
                $req = $this->bdd->prepare("UPDATE project SET status_id = 12 WHERE project_id = ?");
                $req->execute([$projectId]);
                $req = $this->bdd->prepare("UPDATE project SET project_start = CURRENT_TIMESTAMP() WHERE project_id = ?");
                $req->execute([$projectId]);
            }
            return $bools;
        }
    }

    public function getWaitingProjects(): array
    {
        $projectRepository = new ProjectRepository;
        $req = $this->bdd->prepare("SELECT project_id FROM project WHERE status_id = 9");
        $req->execute();
        $projectsId = $req->fetchAll(PDO::FETCH_COLUMN);
        $projects = [];

        foreach ($projectsId as $projectId) {
            $project = $projectRepository->getProjectById($projectId);
            array_push($projects, $project);
        }
        return $projects;
    }

    public function getFormateurProjects($id): array
    {
        $promoRepository = new PromoRepository;
        $req = $this->bdd->prepare("SELECT promo_id from promo_user WHERE user_id = ?");
        $req->execute([$id]);
        $promoIds = $req->fetchAll(PDO::FETCH_COLUMN);
        $projects = [];
        foreach ($promoIds as $promoId) {
            $project = $promoRepository->getPromoProjects($promoId);
            array_push($projects, $project);
        }
        return $projects;
    }

    public function reSubmitProject(int $id):bool
    {
        $req = $this->bdd->prepare("UPDATE project SET status_id = 9 WHERE project_id = ?");
        $bool = $req->execute([$id]);
        return $bool;
    }

    public function getUserProjects($id):array
    {
        $projects = [];
        $req = $this->bdd->prepare("SELECT project_id FROM project_team WHERE user_id = ?");
        $req->execute([$id]);
        $datas = $req->fetchAll(PDO::FETCH_COLUMN);

        foreach($datas as $data){
            $project = new Project;
            $projectRepo = new ProjectRepository;
            $project = $projectRepo->getProjectById($data);
            array_push($projects, $project);
        }

        return $projects;
    }
}

?>