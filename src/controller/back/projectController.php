<?php


function allProjectsPagination()
{
    $jsonData = file_get_contents('php://input',true);
    $data = json_decode($jsonData);

    $projectRepo = new ProjectRepository ;

    $limitStart = $data->limitStart;
    $limitEnd = $data->limitEnd;
    $limit = "$limitStart,$limitEnd";

    $filter = empty($data->filter) ? null : $data->filter;
    $execute = empty($data->execute) ? null : $data->execute;

    $total = $projectRepo->getProjectsNumber();
    $filtered = $projectRepo->getFilteredProjectsNumber($filter,$execute);
    $projects = $projectRepo->getAllProjects($limit,$filter,$execute);

    $projectsHTML = [];
    foreach($projects as $project){
        ob_start();
            include('view/template/_project_card.php');
        $content = ob_get_clean();

        $projectsHTML[]= $content;
    }

    $response = array(
        "status" => "success",
        "message" => "Les projets ont bien été récupérés d'après les critères ci-dessous.",
        "total" => $total,
        "filtered" => $filtered,
        "query" => "WHERE $filter",
        "limit" => $limit,
        "projets" => $projectsHTML,
    );

    echo json_encode($response);

}
function projectPagination()
{
    $jsonData = file_get_contents('php://input',true);
    $data = json_decode($jsonData);

    $projectRepo = new ProjectRepository ;

    $limitStart = $data->limitStart;
    $limitEnd = $data->limitEnd;
    $limit = "$limitStart,$limitEnd";

    $filter = empty($data->filter) ? null : $data->filter;
    $execute = empty($data->execute) ? null : $data->execute;

    $total = $projectRepo->getProjectsNumber();
    $filtered = $projectRepo->getFilteredCrudProjectsNumber($filter,$execute);
    $projects = $projectRepo->getAllCrudProjects($limit,$filter,$execute);

    $projectsHTML = [];
    foreach($projects as $project){
        ob_start();
            include("view/admin/projet/table_row.php");
            include("view/admin/modal/modalDelete.php");
        $content = ob_get_clean();

        $projectsHTML[]= $content;
    }

    $response = array(
        "status" => "success",
        "message" => "Les projets ont bien été récupérés d'après les critères ci-dessous.",
        "total" => $total,
        "filtered" => $filtered,
        "query" => "WHERE $filter",
        "limit" => $limit,
        "projets" => $projectsHTML,
    );

    echo json_encode($response);

}


function deleteProject()
{
    $projectRepo = new ProjectRepository ;
    $projectRepo->deleteProject($_GET['id']);

    $response = array(
        "status" => "success",
        "message" => "Le projet a bien été supprimé.",
    );

    echo json_encode($response);
}

function assignProject()
{
    $projectRepo = new ProjectRepository ;
    $projectRepo->updateProjectStatus('accept',$_POST['project']);
    $projectRepo->assignProjectToPromo($_POST['project'],$_POST['promo']);

    $response = array(
        "status" => "success",
        "message" => "Le projet a bien été assigné.",
    );
 
    echo json_encode($response);
}

function validationProjectTreatment() 
{
    $projectRepository = new ProjectRepository;
    $projectId = $_POST['projectId'];
    if (isset($_POST['validation'])){
        $validation = $_POST['validation'];
        $promoId = $_POST['promo'];
        $projectRepository->assignProjectToPromo($projectId, $promoId);
    } else {
        $validation = "refused";
    }

    $bool = $projectRepository->updateProjectStatus($validation, $projectId);
    
    $response = array(
        "status" => "success",
        "message" => "Le statut a bien été modifié",
        "projets" => $bool,
    );
    echo json_encode($response);

}

function assignTeamToProject()
{
    $projectRepository = new ProjectRepository;
    if (isset($_POST) && isset($_POST['team']) && isset($_POST['projectId'])) {
        $projectId = $_POST['projectId'];
        $apprenants = $_POST['team'];
        $bools = $projectRepository->assignTeamToProject($projectId, $apprenants);

        $response = array(
            "status" => "success",
            "message" => "Le statut a bien été modifié.",
            "projets" => $bools,
        );
    } else {
        // header('Location:?action=projectGestionPage');
    }

}


function addProjectTraitement()
{
    $projectRepo = new ProjectRepository;
    $projectRepo->addProject($_POST,$_FILES);
}

function updateProjectTraitement()
{
    $projectRepo = new ProjectRepository;
    $projectRepo->updateProject($_POST,$_FILES);
}
function reSubmitProject()
{
    $id = $_GET['id'];
    $projectRepository = new ProjectRepository;
    $bool = $projectRepository->reSubmitProject($id);
    header('Location:?action=projectGestionPage');
    
}

function updateProjectElement()
{
    $projectRepository = new ProjectRepository;
    $alertMessage = new AlertMessage;
    $errorTable = [];
    if ((!isset($_POST['type']) && $_POST['type'] == null) && (!isset($_POST['id']) && $_POST['id'] == null)){

        // header('Location:?action=projectPage&id=3');
    } else if ((isset($_POST['type']) && $_POST['type'] !== null) && (isset($_POST['id']) && $_POST['id'] !== null)) {
        $type = htmlspecialchars($_POST['type'], ENT_QUOTES) ;
        $id = htmlspecialchars($_POST['id'], ENT_QUOTES) ;
    }
    if (isset($_POST) && !empty($_POST)) {
        $array = $_POST;
    }
    switch ($type) {
        case "title";
        $bool = $projectRepository->updateProjectTitle($id, $array);
        break; 
        case "apprenants": 
        $bool = $projectRepository->updateProjectUsers($id, $type, $array);
        break; 
        case "formateurs":
        $bool = $projectRepository->updateProjectUsers($id, $type, $array);
        break; 
        case "progress":
        $bool = $projectRepository->updateProjectProgress($id, $array);
        break;
        case "tags":
        $bool = $projectRepository->updateProjectTags($id, $array);
        break;
        case "image" :
        $files = $_FILES;
        $post = $_POST;
        $bool = $projectRepository->updateProjectImage($id, $files, $post);
        break;
        case "github":
        $bool = $projectRepository->updateProjectGithub($id, $array);
        break;
        case "pdf":
        $files = $_FILES;
        $bool = $projectRepository->updateProjectCharge($id, $files);
        break;
        case "link":
        $bool = $projectRepository->updateProjectLink($id, $array);
            break;
        case "companyNote":
        $bool = $projectRepository->updateCompanyNote($id, $array);
        break;
        case "studentsNote":
        $bool = $projectRepository->updateStudentsNote($id, $array);
        break;
    }
    // header("Location:?action=projectPage&id=". $_GET['id']);
    $response = array(
        "status" => "success",
        "message" => "La modification a été prise en compte",
        "projets" => $bool,
    );
    echo json_encode($response);

}


?>
