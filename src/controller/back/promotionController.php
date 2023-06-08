<?php

function deletePromotion()
{
    $promoRepo = new PromoRepository;
    $promoRepo->deletePromo($_GET['id']);

    $response = array(
        "status" => "success",
        "message" => "La promotion a bien été supprimée.",
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
            "message" => "La promotion a bien été ajoutée.",
        );

        echo json_encode($response);
    } else {
        $response = array(
            "status" => "failure",
            "message" => "La promotion n'a pas été ajoutée.",
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
        "message" => "La requête a bien été modifiée",
        "projets" => $projectsHTML,
    );
    echo json_encode($response);

}

function promotionPagination()
{
    $jsonData = file_get_contents('php://input', true);
    $data = json_decode($jsonData);

    $PromoRepo = new PromoRepository;

    $limitStart = $data->limitStart;
    $limitEnd = $data->limitEnd;
    $limit = "$limitStart,$limitEnd";

    $filter = empty($data->filter) ? null : $data->filter;
    $execute = empty($data->execute) ? null : $data->execute;

    $total = $PromoRepo->getPromosNumber();
    $filtered = $PromoRepo->getFilteredPromosNumber($filter, $execute);
    $promotions = $PromoRepo->getPromos($limit, $filter, $execute);

    $projectsHTML = [];
    $modalsHTML = [];
    foreach ($promotions as $promo) {
        ob_start();
        $mailList = $PromoRepo->getPromoMailList($promo->id);
        include("view/admin/promo/table_row.php");
        if ($promo->status->id != 9) {
            $apprenants = $PromoRepo->getAllApprenants($promo->id);
            include("view/admin/promo/modalApprenant.php");
        }

        $promoFormators = $PromoRepo->getAllFormateurs($promo->id);
        $promoFormatorsId = [];
        foreach ($promoFormators as $formator) {
            $promoFormatorsId[] = $formator->user_id;
        }
        $promoFormatorsString = join(",", $promoFormatorsId);
        include("view/admin/promo/modalFormateur.php");
        include("view/admin/modal/modalProjet.php");
        include("view/admin/modal/modalDelete.php");
        $content = ob_get_clean();
        $projectsHTML[] = $content;

        ob_start();
        if ($promo->status->id == 9) {
            $candidates = $PromoRepo->getPromoCandidates($promo->id);
            include("view/admin/promo/modalValidationPromo.php");
        }
        include("view/admin/promo/modalUpdatePromotion.php");
        $content = ob_get_clean();
        $modalsHTML[] = $content;

    }

    $response = array(
        "status" => "success",
        "message" => "Les projets ont bien été récupérés d'après les critères ci dessous.",
        "total" => $total,
        "filtered" => $filtered,
        "query" => "WHERE $filter",
        "limit" => $limit,
        "projets" => $projectsHTML,
        "modals" => $modalsHTML,
    );

    echo json_encode($response);

}