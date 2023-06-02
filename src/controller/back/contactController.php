<?php
function contactTreatment()
{
    $AlertMessage = new AlertMessage;
    $errorTable = array();

    if (isset($_POST)) {
        foreach ($_POST as $name => $value) {

            if (!empty($value)) {
                if ($name == "email" && !filter_var($value, FILTER_VALIDATE_EMAIL)) {
                    $errorTable[] = $AlertMessage->getError($name, 'emailIncorrect');
                }
            } else {
                $errorTable[] = $AlertMessage->getError($name, 'emptyField');
            }
        }

        if (empty($errorTable)) {
            $name = htmlspecialchars(strip_tags($_POST['name']));
            $surname = htmlspecialchars(strip_tags($_POST['surname']));
            $email = htmlspecialchars(strip_tags($_POST['email']));
            $message = htmlspecialchars(strip_tags($_POST['message']));

            $Mail = new Mail($message, false, $email, $name, $surname);
            $MailRepo = new MailRepository;
            //$MailRepo->sendMail($Mail);

            $succes = $AlertMessage->getSuccess('sendMail', false);
            $succesJson = json_encode($succes);
            echo $succesJson;
        } else
            $errorTable = $AlertMessage->getError('contact_errorContent', 'errorForm', false);
    } else
        $errorTable = $AlertMessage->getError('contact_errorContent', 'notForm', false);

    if (!empty($errorTable)) {
        $errorJson = json_encode($errorTable);
        echo $errorJson;
    }
}