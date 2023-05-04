<?php
require_once 'src/model/User.php';
require_once 'src/model/AlertMessage.php';

function registerTreatment()
{
    if (isset($_GET['action']) && $_GET['action'] == "registerTreatment") {
        //var_dump($_POST);
        $AlertMessage = new AlertMessage;
        $errorTable = array();

        foreach ($_POST as $name => $value) {
            if (!empty($value)) {
                if ($name == "email" && !filter_var($value, FILTER_VALIDATE_EMAIL)) {
                    $errorTable[] = $AlertMessage->getError($name, 'emailIncorrect');
                }
            } else {
                $errorTable[] = $AlertMessage->getError($name, 'emptyField');
            }
        }

        if (!empty($_POST['password']) && !empty($_POST['confirm_password'])) {
            if ($_POST['password'] !== $_POST['confirm_password']) {
                $errorTable[] = $AlertMessage->getError('password', 'passwordNotIdentical');
            }
        }

        //var_dump($errorTable);
        $errorJson = json_encode($errorTable);
        echo $errorJson;
    }
}