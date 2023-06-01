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

function CandidatePromo()
{
    if ($_GET) {
        if ((int) $_GET['formation_id']) {
            $alertMessage = new AlertMessage;
            $alert = '';

            $formation_id = (int) $_GET['formation_id'];
            $user_id = $_SESSION['user']->user_id;

            $Promo = new PromoRepository();
            $promo_id = $Promo->getIdOpenPromoByFormationId($formation_id);

            if ($Promo->CheckDuplicateCandidate($user_id, $promo_id)) {
                $Promo->InsertCandidateInPromo($user_id, $promo_id);
                //$alert = $alertMessage->getSuccess('succesCandidate', true);
            } else {
                //$alert = $alertMessage->getError('', 'duplicateCandidate', true);
            }
        }
    }
    header('Location: ' . $_SERVER['HTTP_REFERER']);
}