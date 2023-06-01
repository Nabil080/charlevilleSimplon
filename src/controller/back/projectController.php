<?php


function projectsPagination()
{
    $projectRepo = new ProjectRepository ;
    $projects = $projectRepo->getAllProjects();

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

?>