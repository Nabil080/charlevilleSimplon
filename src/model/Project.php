<?php
require_once('src/model/ConnectBdd.php');

class Project {
    public $id;
    public $name;
    public $description;
    public $file;
    public $notes;
    public $github;
    public $company_image;
    public $model_image;
    public $model_link;
    public $user_id;
    public $formator_id;
    public $status_id;
    public $promo_id;
    public $type_id;

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

        $req = $this->bdd->prepare("SELECT * FROM projects WHERE id_project = ?");
        $req->execute($projectId);
        $data = $req->fetch();

        $article->name

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
}

?>