<?php
require_once('src/model/ConnectBdd.php');

class Project {
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
    public $type;
    public $tags;
    public $start;
    public $end;
    public $team;

    // public function createToInsert(array $projectForm):bool{


    //     return true
    // }

}

class ProjectRepository extends ConnectBdd{
    public function __construct(){
        parent::__construct ();
    }

    public function getProjectById($projectId){
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

        $User = new User;
        $userRepo = new UsersRepository;
        $User = $userRepo->getUserById($data['user_id']);
        $project->user = $User;

        $Formator = new User;
        $userRepo = new UsersRepository;
        $Formator = $userRepo->getUserById($data['user_id_project_formator']);
        $project->formator = $Formator;

        $Status = new Status;
        $statusRepo = new StatusRepository;
        $Status = $statusRepo->getStatusById($data['status_id']);
        $project->status = $Status;

        $Promo = new Promo;
        $promoRepo = new PromoRepository;
        $Promo = $promoRepo->getPromoById($data['promo_id']);
        $project->promo = $Promo;

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
            $project->start = $data['project_start'];
            $project->end = 'En cours';
        }
        if($data['status_id'] == 12){
            $project->start = $data['project_start'];
            $project->end = 'En cours';
        }
        if($data['status_id'] == 13){
            $project->start = $data['project_start'];
            $project->end = $data['project_end'];
        }


        return $project;
    }

    public function getProjectUsers($id):array
    {
        $team = [];
        $req = $this->bdd->prepare("SELECT `user_id` FROM `project_team` WHERE `project_id` = ? ");
        $req->execute([$id]);
        $data = $req->fetchAll(PDO::FETCH_ASSOC);

        foreach($data as $key){
            $User = new User;
            $userRepo = new UsersRepository;
            $User = $userRepo->getUserById($key['user_id']);

            $team[] = $User;
        }

        return $team;
    }

    public function getAllProjects(){
        $req = $this->bdd->prepare("SELECT * FROM projects");
        $req->execute();
        $data = $req->fetchAll(PDO::FETCH_ASSOC);

        foreach($data as $key){
            $project = new Project;
            $projectRepo = new ProjectRepository;
            $project = $projectRepo->getProjectById($key['project_id']);
        }
    }

    public function getUserProjects($id):array
    {
        $projects = [];
        $req = $this->bdd->prepare("SELECT project_id FROM project_team WHERE user_id = ?");
        $req->execute([$id]);
        $datas = $req->fetchAll(PDO::FETCH_COLUMN);

        foreach($datas as $data){
            $project = new Project;

            $req = $this->bdd->prepare("SELECT project_id, project_name FROM project WHERE project_id = ?");
            $req->execute([$data]);
            $data = $req->fetch(PDO::FETCH_ASSOC);

            $project->id = $data['project_id'];
            $project->name = $data['project_name'];

        }


        return $projects;
    }
}

?>