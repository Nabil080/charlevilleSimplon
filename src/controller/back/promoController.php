<?php 

function promosFilter()
{
    $PromoRepository = new PromoRepository;
    $promos = $PromoRepository->getPromos();

    foreach($promos as $promo){
        ob_start();
            include('view/template/_promotion_card.php');
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
