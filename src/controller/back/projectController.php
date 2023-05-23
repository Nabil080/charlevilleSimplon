<?php


function projectsPagination()
{
    $json = file_get_contents('php://input');
    $data = json_decode($json, true);

    $projectRepo = new ProjectRepository ;
    $projects = $projectRepo->getAllProjects($data['request']);


    $response = array(
        "status" => "success",
        "message" => "La requête a été modifée comme tel",
        "projets" => $projects,
    );

    echo json_encode($response);

}

?>