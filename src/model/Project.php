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
    public $type;
    public $tags;
    public $start;
    public $end;
    public $team;

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
        if (is_bool($data)) {
            header('Location:?action=homepage');  
        }
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
        $User = new User($data['user_id']);
        $project->user = $User;

        if(isset($data['user_id_project_formator'])){
            $Formator = new User($data['user_id_project_formator']);
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
        if ($data['status_id'] == 12) {
            $projectDateStart = new PromoRepository;
            $project->start = $projectDateStart->formateDate($data['project_start']);
            $project->end = 'En cours';
        }
        if ($data['status_id'] == 13) {
            $projectDateStart = new PromoRepository;
            $project->start = $projectDateStart->formateDate($data['project_start']);
            $projectDateEnd = new PromoRepository;
            $project->end = $projectDateEnd->formateDate($data['project_end']);
        }

        return $project;
    }

    public function getAllCrudProjects($limitRequest = null, $filters = null, $execute = null, $order = null):array
    {
        $projects = [];
        $filters = $filters === null ? "" : "WHERE $filters";
        $execute = $execute === null ? [] : explode(",",$execute);
        $order = $order === null ? "ORDER BY project.status_id ASC" : "ORDER BY $order";
        $limit = $limitRequest === null ? "" : "LIMIT $limitRequest";

        $query =
        "SELECT project.project_id FROM project $filters $order $limit";
        $req = $this->bdd->prepare($query);
        $req->execute($execute);
        $data = $req->fetchAll(PDO::FETCH_ASSOC);


        foreach ($data as $key) {
            $Project = new Project;
            $projectRepo = new ProjectRepository;
            $Project = $projectRepo->getProjectById($key['project_id']);

            $projects[] = $Project;
        }

        return $projects;
    }


    public function getFilteredCrudProjectsNumber($filters = null,$execute = null):int
    {
        $filters = $filters === null ? "" : "WHERE $filters";
        $execute = $execute === null ? [] : explode(",",$execute);
        $query =
        "SELECT COUNT(*) FROM project $filters";
        $req = $this->bdd->prepare($query);
        $req->execute($execute);
        $data = $req->fetch(PDO::FETCH_COLUMN);

        return $data;
    }


    public function getAllProjects($limitRequest = null, $filters = null, $execute = null, $order = null):array
    {
        $projects = [];
        $filters = $filters === null ? "" : "AND $filters";
        $execute = $execute === null ? [] : explode(",",$execute);
        $order = $order === null ? "ORDER BY project.status_id DESC" : "ORDER BY $order";
        $limit = $limitRequest === null ? "" : "LIMIT $limitRequest";

        $query =
        "SELECT project.project_id FROM project
        JOIN promo ON promo.promo_id = project.promo_id
        JOIN formation ON promo.formation_id = formation.formation_id
        WHERE type_id != 2 $filters $order $limit";
        $req = $this->bdd->prepare($query);
        $req->execute($execute);
        $data = $req->fetchAll(PDO::FETCH_ASSOC);


        foreach ($data as $key) {
            $Project = new Project;
            $projectRepo = new ProjectRepository;
            $Project = $projectRepo->getProjectById($key['project_id']);

            $projects[] = $Project;
        }

        return $projects;
    }

    public function getProjectsNumber():int
    {
        $req = $this->bdd->prepare("SELECT COUNT(*) FROM project WHERE type_id != 2");
        $req->execute();
        $data = $req->fetch(PDO::FETCH_COLUMN);

        return $data;
    }

    public function getFilteredProjectsNumber($filters = null,$execute = null):int
    {
        $filters = $filters === null ? "" : "AND $filters";
        $execute = $execute === null ? [] : explode(",",$execute);
        $query =
        "SELECT COUNT(*) FROM project
        JOIN promo ON promo.promo_id = project.promo_id
        JOIN formation ON promo.formation_id = formation.formation_id
        WHERE type_id != 2 $filters";
        $req = $this->bdd->prepare($query);
        $req->execute($execute);
        $data = $req->fetch(PDO::FETCH_COLUMN);

        return $data;
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

    public function getProjectImage(int $id): array
    {
        $req = $this->bdd->prepare("SELECT project_model_image FROM project WHERE project_id =?");
        $req->execute(array($id));
        $image = $req->fetch(PDO::FETCH_ASSOC);

        return $image;
    }

    public function getProjectUsers($id): array
    {
        $team = [];
        $req = $this->bdd->prepare("SELECT `user_id` FROM `project_team` WHERE `project_id` = ? ");
        $req->execute([$id]);
        $data = $req->fetchAll(PDO::FETCH_ASSOC);

        foreach($data as $key){
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
            $projectRepo = new ProjectRepository;
            $project = $projectRepo->getProjectById($data);
            array_push($projects, $project);
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

    public function updateProjectStatus(string $validation, int $id): bool
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
                $bool = $req->execute([$projectId]);
                $req = $this->bdd->prepare("UPDATE project SET project_start = CURRENT_TIMESTAMP() WHERE project_id = ?");
                $bool = $req->execute([$projectId]);
                array_push($bools, $bool);
                return $bools;
            }
            return $bools;
        }
        return $bools;

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

        if(isset($post['link']) && !empty($post['link'])){
            $link = securizeString($post['link']);
            if($link === false){
                    // message d'erreurs dans securizeString
                    $error = true;
                }
        }else{
            $link = null;
        }


        $query = "UPDATE project SET project_name = ?, project_description = ?, project_company_link = ?, user_id = ?";
        $execute = [$project,$description,$link,3];

        // traitment fichier pdf
        if($files['pdf']['error'] == 0){
            $path = "assets/upload/project/";
            $pdf = securizePdf($files['pdf'], $path);
            if($pdf === false){
                // message d'erreurs dans securizePdf
                $error = true;
            }
            $query .= ", project_file = ?";
            $execute[] = $pdf;
        }

        // traitment image
        if($files['image']['error'] == 0){
            $path = "assets/upload/project/";
            $image = securizeImage($files['image'], $path);
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
        // TODO: $AlertMessage = new AlertMessage;
        // TODO:$errorTable = [];
        $error = false;
        // traitement company name
        $company = isset($post['company']) ? $post['company'] : 'Simplon';
        $adress = isset($post['adress']) ? $post['adress'] : 'Pôle Formation UIMM 8 rue Claude Chrétien 08000 Charleville-Mézières';

        // traitment fichier pdf
        $path = "assets/upload/project/";
        $pdf = securizePdf($_FILES['pdf'], $path);
        if($pdf === false){
            // message d'erreurs dans securizePdf
             // TODO:$errorTable = $AlertMessage->getError("noPDF",false,"pdf");
            $error = true;
        }

        // traitment image
        $image = securizeImage($files['image'], $path);
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

        $link = empty($link) ? "" : securizeUrl($post['link']);
        if($link === false){
            // message d'erreurs dans securizeString
            $error = true;
        }

        $status = $_SESSION['user']->role_id == 3 ? 9 : 10;
        $type = $_SESSION['user']->role_id == 3 ? 3 : 1;

        if($error === false){
            $req = $this->bdd->prepare("INSERT INTO project (project_name,project_description,project_company_name,project_company_link,user_id, project_file, project_company_image, project_company_adress,status_id,type_id) VALUES (?,?,?,?,?,?,?,?,?,?)");
            $req->execute([$project,$description,$company,$link,$_SESSION['user']->user_id, $pdf, $image, $adress,$status,$type]);
            // REMPLACE 3 PAR SESSION USER
            $lastId = $this->bdd->lastInsertId();
            for($i = 0; $i < 3; $i++){
                $req = $this->bdd->prepare("INSERT INTO progress (project_id) VALUES (?)");
                $req->execute([$lastId]);
            }


            $response = array(
                "status" => "success",
                "message" => "Le projet a bien été ajouté.",
            );

            echo json_encode($response);
        }else{
            $response = array(
                "status" => "failure",
                "message" => "Le projet n'a pas été ajouté.",
            );

            echo json_encode($response);   
        }
    }

    public function reSubmitProject(int $id): bool
    {
        $req = $this->bdd->prepare("UPDATE project SET status_id = 9 WHERE project_id = ?");
        $bool = $req->execute([$id]);
        return $bool;
    }

    public function updateProjectTitle(int $id, array $post):bool

    {
        $req = $this->bdd->prepare("UPDATE project SET project_name = ? WHERE project_id = ?");
        $bool = $req->execute([$post['title'], $id]);
        return $bool;
    }

    public function updateProjectUsers(int $id, string $type, array $post):bool | array
    {
        $bools = [];

        if ($type == "apprenants") {
            $users = $post['students'];
            $actualTeam = $post['actualTeam'];
        } else if ($type == "formateurs") {
            $users = $post['formators'];
            $actualTeam = $post['actualFormatorTeam'];
        }
        if (is_array($users) && !empty($users)) {
            foreach ($actualTeam as $student) {
            $req = $this->bdd->prepare('DELETE FROM project_team WHERE project_id = ? AND user_id = ?');
            $bool = $req->execute([$id, $student]);
            }
        } else { 
            $req = $this->bdd->prepare('DELETE FROM project_team WHERE project_id = ? AND user_id =');
            $bool = $req->execute([$id, $users]);
        }
        
        if (is_array($users) && !empty($users)) {
            foreach ($users as $apprenant) {
            $req = $this->bdd->prepare('INSERT INTO project_team (project_id, user_id) VALUES (?,?)');
            $bool = $req->execute([$id, (int)$apprenant]);
            array_push($bools, $bool);
            }
        } else {
            $req = $this->bdd->prepare('INSERT INTO project_team (project_id, user_id) VALUES (?,?)');
            $bool = $req->execute([$id, (int)$users]);
            array_push($bools, $bool);

        }

        return $bools;
    }
        // PROGRESS 
    public function updateProjectProgress(int $id, array $post):bool
    {
        $name = htmlspecialchars($post['name'], ENT_QUOTES);
        $number = htmlspecialchars($post['number'], ENT_QUOTES);
        $progressId = htmlspecialchars($post['progress_id'], ENT_QUOTES);

            if (!empty($name) && !empty($number)) {
                $req = $this->bdd->prepare("UPDATE progress SET progress_name = ?, progress_number = ? WHERE project_id = ? AND progress_id = ?");
                $bool = $req->execute([$name, $number, $id, $progressId]);
            } else if(empty($name)) {
                $req = $this->bdd->prepare("UPDATE progress SET progress_number = ? WHERE project_id = ? AND progress_id = ?");
                $bool = $req->execute([$number, $id, $progressId]);
            } else {
                $req = $this->bdd->prepare("UPDATE progress SET progress_name = ? WHERE project_id = ? AND progress_id = ?");
                $bool = $req->execute([$name, $id, $progressId]);
            }
        
        return $number;
    }

    public function updateProjectTags (int $id, array $post)
    {
        $skills = $post['skills'];
        $bools = [];

        $req = $this->bdd->prepare('DELETE FROM project_tag WHERE project_id = ?');
        $bool = $req->execute([$id]);
        $bools[] = $bool;
        foreach ($skills as $skill) {

            $req = $this->bdd->prepare('INSERT INTO project_tag (project_id, tag_id) VALUES (?,?)');
            $bool = $req->execute([$id, (int)$skill]);
            $bools[] = $bool;
        }
        if (in_array(false, $bools)) {
            return false;
        } else {
            return true;
        }

    }

    public function updateProjectImage(int $id, array $files, array $post): bool
    {
        $path = 'assets/upload/project/maquette/';
        $image = securizeImage($files['image'], $path);
        if (isset($post['lien'])) {
            $lien = htmlspecialchars($post['lien'], ENT_QUOTES);
            $req = $this->bdd->prepare("UPDATE project SET project_model_link = ? WHERE project_id = ?");
            $bool = $req->execute([$lien, $id]);
        }
        if($image === false){
            $error = true;
            die;
        }
        if (!empty($image)) { 
            $req = $this->bdd->prepare("UPDATE project SET project_model_image = ? WHERE project_id = ?");
            $bool = $req->execute([$image, $id]);
        }
        return $bool;
    }

    
    public function updateProjectGithub(int $id, array $post):bool
    {
        $github = htmlspecialchars($post['github'], ENT_QUOTES);
        $req = $this->bdd->prepare('UPDATE project SET project_github = ? WHERE project_id = ?');
        $bool = $req->execute([$github, $id]);
        return $bool;
    }

    public function updateProjectCharge(int $id, array $files):bool
    {
        $path = 'assets/upload/project/charges/';
        $pdf = securizePdf($files['pdf'], $path);
        if($pdf === false){
            $error = true;
            die;
        }
        if (!empty($pdf)) { 
            $req = $this->bdd->prepare("UPDATE project SET project_file = ? WHERE project_id = ?");
            $bool = $req->execute([$pdf, $id]);
        }
        return $bool;
    }

    public function updateProjectLink(int $id, array $post)
    {
        $link = htmlspecialchars($post['link'], ENT_QUOTES);
        $req = $this->bdd->prepare('UPDATE project SET project_model_link = ? WHERE project_id = ?');
        $bool = $req->execute([$link, $id]);
        return $bool;
    }

    public function updateCompanyNote(int $id, array $post)
    {
        $isSafe = securizeText($post['companyNotes']);
        if ($isSafe == true) {
            $req = $this->bdd->prepare('UPDATE project SET project_description = ? WHERE project_id = ?');
            $bool = $req->execute([$post['companyNotes'], $id]);
            return $bool;
        } else {
            return $isSafe;
        }
    }

    public function updateStudentsNote(int $id, array $post)
    {
        $isSafe = securizeText($post['studentsNote']);
        if ($isSafe == true) {
            $req = $this->bdd->prepare('UPDATE project SET project_notes = ? WHERE project_id = ?');
            $bool = $req->execute([$post['studentsNote'], $id]);
            return $bool;
        } else {

            return $isSafe;
        }
    }
}