<?php
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