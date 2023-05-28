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

?>