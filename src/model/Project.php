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

    public function getProjectById(int $projectId): object
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
        $project->user = $User;

        $User = new User($data['user_id_project_formator']);
        $project->user = $User;

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

        $project->start = $project->start = $data['project_start'];;
        $project->end = $project->end = $data['project_end'];

        // if($data['status_id'] == 12){
        //     $project->start = $data['project_start'];
        //     $project->end = 'En cours';
        // }
        //  if($data['status_id'] == 13){
        //      $project->start = $data['project_start'];
        //      $project->end = $data['project_end'];
        //  }



        return $project;
    }

      public function getAllProjects($limitRequest = null):array
    {
        $projects = [];
        $limit = $limitRequest == null ? "" : "LIMIT ".$limitRequest;

        $req = $this->bdd->prepare("SELECT project_id FROM project $limit");
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
            $User = new User($key['user_id']);
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

    public function reSubmitProject(int $id):bool
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
        $progressId = htmlspecialchars($post['id'], ENT_QUOTES);

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
        
        return $bool;
    }

    public function updateProjectImage(int $id, array $files, array $post): bool
    {
        $path = 'upload/project/maquette/';
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
        $path = 'upload/project/charges/';
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

?>