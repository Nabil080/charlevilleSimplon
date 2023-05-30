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

function validatePromotion(){
    $jsonData = file_get_contents('php://input',true);
    $data = json_decode($jsonData);

    $promo = $data->promo;
    $accepted = $data->accepted;
    $rejected = $data->rejected;

    $promoRepo = new PromoRepository ;
    $promoRepo->validatePromo($promo,$accepted,$rejected);

    var_dump($promo);
    var_dump($accepted);
    var_dump($rejected);
}