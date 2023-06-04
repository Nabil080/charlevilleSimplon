<?php


function projectsPagination()
{
    $jsonData = file_get_contents('php://input',true);
    $data = json_decode($jsonData);

    $projectRepo = new ProjectRepository ;



    $limitStart = $data->limitStart;
    $limitEnd = $data->limitEnd;
    $limit = "$limitStart,$limitEnd";

    $filter = empty($data->filter) ? null : $data->filter;

    $total = $projectRepo->getProjectsNumber();
    $filtered = $projectRepo->getFilteredProjectsNumber($filter);
    $projects = $projectRepo->getAllProjects($limit,$filter);

    $projectsHTML = [];
    foreach($projects as $project){
        ob_start();
            include('view/template/_project_card.php');
        $content = ob_get_clean();

        $projectsHTML[]= $content;
    }

    $response = array(
        "status" => "success",
        "message" => "La requête a été modifée comme tel",
        "total" => $total,
        "filtered" => $filtered,
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
        "message" => "Le statut a été modifée comme tel",
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
    } else {
        header('Location:?action=projectGestionPage');
    }
    $bools = $projectRepository->assignTeamToProject($projectId, $apprenants);

    $response = array(
        "status" => "success",
        "message" => "Le statut a été modifée comme tel",
        "projets" => $bools,
    );
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

    if ((!isset($_GET['id']) && $_GET['id'] == null) && (!isset($_GET['type']) && $_GET['type'] == null)){

        // header('Location:?action=projectPage&id=3');
    } else if ((isset($_GET['id']) && $_GET['id'] !== null) && (isset($_GET['type']) && $_GET['type'] !== null)) {
        $type = $_GET['type'];
        $id = $_GET['id'];
    }
    if (isset($_POST) && !empty($_POST)) {
        $array = $_POST;
    } else {
        // header('Location:?action=projectPage&id='.$_GET['id']);
    }
    if ($type == "title") {
        $bool = $projectRepository->updateProjectTitle($id, $array);
    }
    if ($type == "apprenants" || $type == "formateurs") { 
        $bool = $projectRepository->updateProjectUsers($id, $type, $array);
    }
    if ($type == "progress") {
        $bool = $projectRepository->updateProjectProgress($id, $array);
    }
    if ($type == "image") {
        $files = $_FILES;
        $post = $_POST;
        $bool = $projectRepository->updateProjectImage($id, $files, $post);
    }
    if ($type == "github") {
        $bool = $projectRepository->updateProjectGithub($id, $array);
    }
    if ($type == "pdf") {
        $files = $_FILES;
        $bool = $projectRepository->updateProjectCharge($id, $files);
    }
    if ($type == "link") {
        $bool = $projectRepository->updateProjectLink($id, $array);
    }
    if ($type == "companyNote") {
        $bool = $projectRepository->updateCompanyNote($id, $array);
    }
    if ($type == "studentsNote") {
        $bool = $projectRepository->updateStudentsNote($id, $array);
    }
    // header("Location:?action=projectPage&id=". $_GET['id']);
}


?>