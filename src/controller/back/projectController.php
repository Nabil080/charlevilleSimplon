<?php


function projectsPagination()
{
    $json = file_get_contents('php://input');
    $data = json_decode($json, true);

    $projectRepo = new ProjectRepository ;
    $projects = $projectRepo->getAllProjects($data['request']);

    $projectsHTML = '';
    foreach($projects as $project){
        ob_start();
            include('view/template/_project_card.php');
        $content = ob_get_clean();

        $projectsHTML .= $content;
    }

    $response = array(
        "status" => "success",
        "message" => "La requête a été modifée comme tel",
        "projets" => $projectsHTML,
    );

    echo json_encode($response);

}

?>