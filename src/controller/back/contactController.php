<?php
/*
function contactTreatment()
{
    $AlertMessage = new AlertMessage;
    $errorTable = array();

    if (isset($_POST)) {
        foreach ($_POST as $name => $value) {

            if (!empty($value)) {
                if ($name == "email_login" && !filter_var($value, FILTER_VALIDATE_EMAIL)) {
                    $errorTable[] = $AlertMessage->getError($name, 'emailIncorrect');
                }
            } else {
                $errorTable[] = $AlertMessage->getError($name, 'emptyField');
            }
        }

        if (empty($errorTable)) {
            $Mail = new Mail
        } else
            $errorTable = $AlertMessage->getError('contact_errorContent', 'errorForm', false);
    } else
        $errorTable = $AlertMessage->getError('contact_errorContent', 'notForm', false);

    if (!empty($errorTable)) {
        $errorJson = json_encode($errorTable);
        echo $errorJson;
    }
}
?>
*/