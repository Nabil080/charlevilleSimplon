<?php

function deletePromotion(){
    $promoRepo = new PromoRepository ;
    $promoRepo->deletePromo($_GET['id']);

    $response = array(
        "status" => "success",
        "message" => "La promotion a bien été supprimé.",
    );

    echo json_encode($response);
}