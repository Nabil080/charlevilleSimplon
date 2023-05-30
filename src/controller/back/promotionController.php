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

function addPromotion(){
    if(isset($_POST)){
        $promoRepo = new PromoRepository;
        $promoRepo->addPromo($_POST);

        $response = array(
            "status" => "success",
            "message" => "La promotion a bien été ajouté.",
        );
    
        echo json_encode($response);
    }else{
        $response = array(
            "status" => "failure",
            "message" => "La promotion n'a pas été ajouté.",
        );
    
        echo json_encode($response);
    }
}

function updatePromotion(){
    if(isset($_POST)){
        $promoRepo = new PromoRepository;
        $promoRepo->updatePromo($_POST);
    }else{
        echo 'erreur';
    }
}


function validatePromotion(){
    $jsonData = file_get_contents('php://input',true);
    $data = json_decode($jsonData);

    $promo = $data->promo;
    $accepted = $data->accepted;
    $rejected = $data->rejected;

    $promoRepo = new PromoRepository ;
    $promoRepo->validatePromo($promo,$accepted,$rejected);

    $response = array(
        "status" => "success",
        "message" => "Les candidats ont été informés",
        "accepted" => $accepted,
        "rejected" => $rejected,
    );

    echo json_encode($response);
}