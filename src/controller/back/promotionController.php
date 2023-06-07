<?php

function deletePromotion()
{
    $promoRepo = new PromoRepository;
    $promoRepo->deletePromo($_GET['id']);

    $response = array(
        "status" => "success",
        "message" => "La promotion a bien été supprimé.",
    );

    echo json_encode($response);
}

function addPromotion()
{
    if (isset($_POST)) {
        $promoRepo = new PromoRepository;
        $promoRepo->addPromo($_POST);

        $response = array(
            "status" => "success",
            "message" => "La promotion a bien été ajouté.",
        );

        echo json_encode($response);
    } else {
        $response = array(
            "status" => "failure",
            "message" => "La promotion n'a pas été ajouté.",
        );

        echo json_encode($response);
    }
}

function updatePromotion()
{
    if (isset($_POST)) {
        $promoRepo = new PromoRepository;
        $promoRepo->updatePromo($_POST);
    } else {
        echo 'erreur';
    }
}


function validatePromotion()
{
    $jsonData = file_get_contents('php://input', true);
    $data = json_decode($jsonData);

    $promo = $data->promo;
    $accepted = $data->accepted;
    $rejected = $data->rejected;

    $promoRepo = new PromoRepository;
    $promoRepo->validatePromo($promo, $accepted, $rejected);

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
        if (isset($_GET['id']) && (int) $_GET['id']) {
            $alertMessage = new AlertMessage;
            $alert = '';

            $formation_id = (int) $_GET['id'];
            $user_id = $_SESSION['user']->user_id;

            $Promo = new PromoRepository();
            $promo_id = $Promo->getIdOpenPromoByFormationId($formation_id);

            if ($Promo->CheckDuplicateCandidate($user_id, $promo_id)) {
                $Promo->InsertCandidateInPromo($user_id, $promo_id);
                //$alert = $alertMessage->getSuccess('succesCandidate', true);
            } else {
                //$alert = $alertMessage->getError('', 'duplicateCandidate', true);
            }
        } else {
            throw new Exception('error_404');
        }
    }
    header('Location: ' . $_SERVER['HTTP_REFERER']);
}


function promosFilter()
{
    $PromoRepository = new PromoRepository;
    $promos = $PromoRepository->getPromos();

    foreach ($promos as $promo) {
        ob_start();
        include('view/template/_promotion_card.php');
        $content = ob_get_clean();

        $projectsHTML[] = $content;
    }

    $response = array(
        "status" => "success",
        "message" => "La requête a été modifée comme tel",
        "projets" => $projectsHTML,
    );
    echo json_encode($response);

}

function promotionPagination()
{
    $jsonData = file_get_contents('php://input', true);
    $data = json_decode($jsonData);

    $PromoRepo = new PromoRepository;

    // var_dump($data);
    $limitStart = $data->limitStart;
    $limitEnd = $data->limitEnd;
    $limit = "$limitStart,$limitEnd";

    $filter = empty($data->filter) ? null : $data->filter;
    $execute = empty($data->execute) ? null : $data->execute;

    $total = $PromoRepo->getPromosNumber();
    $filtered = $PromoRepo->getFilteredPromosNumber($filter, $execute);
    $promotions = $PromoRepo->getPromos($limit, $filter, $execute);

    $projectsHTML = [];
    foreach ($promotions as $promo) {
        ob_start();
        $mailList = $PromoRepo->getPromoMailList($promo->id);
        include("view/admin/promo/table_row.php");
        if ($promo->status->id != 9) {
            $apprenants = $PromoRepo->getAllApprenants($promo->id);
            include("view/admin/modalApprenant.php");
        } else {
            $candidates = $PromoRepo->getPromoCandidates($promo->id);
            include("view/admin/promo/modalValidationPromo.php");
        }

        $promoFormators = $PromoRepo->getAllFormateurs($promo->id);
        // include("view/admin/modalFormateur.php");
        // include("view/admin/modalProjet.php");
        // include("view/admin/promo/modalUpdatePromotion.php");
        // include("view/admin/modalDelete.php");
        $content = ob_get_clean();

        $projectsHTML[] = $content;
    }

    $response = array(
        "status" => "success",
        "message" => "Les projets ont bien été récupérés d'après les critères ci dessous.",
        "total" => $total,
        "filtered" => $filtered,
        "query" => "WHERE $filter",
        "limit" => $limit,
        "projets" => $projectsHTML,
    );

    echo json_encode($response);

}