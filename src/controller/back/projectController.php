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
        "message" => "Un string des cards a été retourné",
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
    var_dump($_POST);
    $projectRepo->updateProjectStatus('accept',$_POST['project']);
    $projectRepo->assignProjectToPromo($_POST['project'],$_POST['promo']);
}
?>