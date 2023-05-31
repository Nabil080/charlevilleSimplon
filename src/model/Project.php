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
    // public $formation;
    public $type;
    public $tags;
    public $start;
    public $end;
    public $team;

    // public function createToInsert(array $projectForm):bool{


    //     return true
    // }

    public function getProjectLevel(){
        $formationRepo = new FormationRepository();
        
        $level = $formationRepo->getFormationLevel($this->promo->formation_id);

        return $level;
    }

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

        if(isset($data['user_id_project_formator'])){
            $Formator = new User;
            $userRepo = new UsersRepository;
            $Formator = $userRepo->getUserById($data['user_id_project_formator']);
            $project->formator = $Formator;
        }

        $Status = new Status;
        $statusRepo = new StatusRepository;
        $Status = $statusRepo->getStatusById($data['status_id']);
        $project->status = $Status;

        if(isset($data['promo_id'])){
            $promoRepo = new PromoRepository;
            $Promo = $promoRepo->getPromoById($data['promo_id']);
            $project->promo = $Promo;
        }

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

        $project->start = $project->start = $data['project_start'];;
        $project->end = $project->end = $data['project_end'];;

        if($data['status_id'] == 12){
            $project->start = $data['project_start'];
            $project->end = 'En cours';
        }


        return $project;
    }

      public function getAllProjects($limitRequest = null):array
    {
        $projects = [];
        $limit = $limitRequest == null ? "" : "LIMIT ".$limitRequest;

        $req = $this->bdd->prepare("SELECT project_id FROM project $limit ORDER BY status_id ASC");
        $req->execute();
        $data = $req->fetchAll(PDO::FETCH_ASSOC);


        foreach($data as $key){
            $Project = new Project;
            $projectRepo = new ProjectRepository;
            $Project = $projectRepo->getProjectById($key['project_id']);

            $projects[] = $Project;
        }

        return $projects;
    }

    public function getProjectsDate()
    {
        $dates =  [];
        $req = $this->bdd->prepare("SELECT project_start FROM project WHERE project_start IS NOT NULL");
        $req->execute();
        $data = $req->fetchAll(PDO::FETCH_COLUMN);

        foreach($data as $key){
            $start = date_create($key);
            $year = date_format($start,"Y");

            $dates[] = $year ;
        }
            
        $uniqueDates = array_unique($dates);
        return $uniqueDates;
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

            $projects[] = $project;

        }


        return $projects;
    }
    
    public function deleteProject($id):void
    {
        $req = $this->bdd->prepare("DELETE FROM progress WHERE project_id =?");
        $req->execute([$id]);
        $req->closeCursor();

        $req = $this->bdd->prepare("DELETE FROM project_tag WHERE project_id =?");
        $req->execute([$id]);
        $req->closeCursor();

        $req = $this->bdd->prepare("DELETE FROM project_team WHERE project_id =?");
        $req->execute([$id]);
        $req->closeCursor();

        $req = $this->bdd->prepare("DELETE FROM project WHERE project_id =?");
        $req->execute([$id]);
        $req->closeCursor();
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

    public function updateProject($post,$files):void
    {
        $error = false;

        $project = securizeString($post['project']);
        if($project === false){
            // message d'erreurs dans securizeString
            $error = true;
        }
        
        $description = securizeString($post['description']);
        if($description === false){
            // message d'erreurs dans securizeString
            $error = true;
        }

        $link = securizeString($post['link']);
        if($link === false){
            // message d'erreurs dans securizeString
            $error = true;
        }


        $query = "UPDATE project SET project_name = ?, project_description = ?, project_company_link = ?, user_id = ?";
        $execute = [$project,$description,$link,3];

        // traitment fichier pdf
        if($files['pdf']['error'] == 0){
            $pdf = securizePdf($files['pdf']);
            if($pdf === false){
                // message d'erreurs dans securizePdf
                $error = true;
            }
            $query .= ", project_file = ?";
            $execute[] = $pdf;
        }

        // traitment image
        if($files['image']['error'] == 0){
            $image = securizeImage($files['image']);
            if($image === false){
                // message d'erreurs dans securizePdf
                $error = true;
            }
            $query .= ", project_company_image = ?";
            $execute[] = $image;
        }
        
        $execute[] = $_POST['project_id'];
        if($error === false){
            $req = $this->bdd->prepare($query."WHERE project_id = ?");
            $req->execute($execute);
            // REMPLACE 3 PAR SESSION USER ID

            $response = array(
                "status" => "success",
                "message" => "Le projet a bien été modifié.",
            );
        
            echo json_encode($response);
        }
    }

    public function addProject($post,$files):void
    {
        $error = false;
        // traitement company name
        $company = isset($post['company']) ? $post['company'] : 'Simplon';
        $adress = isset($post['adress']) ? $post['adress'] : '17 rue de la grande mare lool';

        // traitment fichier pdf
        $pdf = securizePdf($_FILES['pdf']);
        if($pdf === false){
            // message d'erreurs dans securizePdf
            $error = true;
        }

        // traitment image
        $image = securizeImage($files['image']);
        if($image === false){
            // message d'erreurs dans securizePdf
            $error = true;
        }
        
        $project = securizeString($post['project']);
        if($project === false){
            // message d'erreurs dans securizeString
            $error = true;
        }
        
        $description = securizeString($post['description']);
        if($description === false){
            // message d'erreurs dans securizeString
            $error = true;
        }

        $link = securizeString($post['link']);
        if($link === false){
            // message d'erreurs dans securizeString
            $error = true;
        }

        if($error === false){
            $req = $this->bdd->prepare("INSERT INTO project (project_name,project_description,project_company_name,project_company_link,user_id, project_file, project_company_image, project_company_adress) VALUES (?,?,?,?,?,?,?,?)");
            $req->execute([$project,$description,$company,$link,3, $pdf, $image, $adress]);
            // REMPLACE 3 PAR SESSION USER ID

            $response = array(
                "status" => "success",
                "message" => "Le projet a bien été ajouté.",
            );
        
            echo json_encode($response);
        }
    }
}

?>