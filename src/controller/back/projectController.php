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

    echo json_encode($response);

}

?>