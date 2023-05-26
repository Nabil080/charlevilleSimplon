<?php
require_once 'src/model/User.php';
require_once 'src/model/AlertMessage.php';

function registerTreatment()
{
    $AlertMessage = new AlertMessage;
    $errorTable = array();
    $boolCompany = $_POST['boolCompany'];


    if (isset($_POST) && !empty($_POST)) {
        $UserRepo = new UserRepository;
        $candidate = ['id_poleEmploi', 'birth_place', 'birth_date', 'nationality'];
        $company = 'name_company';
        $id_poleEmploi = '';
        //var_dump($_POST);

        foreach ($_POST as $name => $value) {
            if (!empty($value)) {
                if ($name == "email") {
                    if (!filter_var($value, FILTER_VALIDATE_EMAIL)) {
                        $errorTable[] = $AlertMessage->getError($name, 'emailIncorrect');

                    } else if ($UserRepo->checkEmail($value)) {
                        $errorTable[] = $AlertMessage->getError($name, 'existingEmail');
                    }
                }
            } else {
                if (
                    ($name == $company && !$boolCompany) ||
                    (array_search($name, $candidate) && $boolCompany ||
                        $name == 'boolCompany')
                ) {
                } elseif ($name == "id_poleEmploi" && isset($_POST['id_poleEmploi_checkbox'])) {
                    $id_poleEmploi = 'En attente.';
                } else {
                    $errorTable[] = $AlertMessage->getError($name, 'emptyField');
                }
            }
        }

        if (!empty($_POST['password']) && !empty($_POST['confirm_password'])) {
            if ($_POST['password'] !== $_POST['confirm_password']) {
                $errorTable[] = $AlertMessage->getError('password', 'passwordNotIdentical');
            }
        }
        if (empty($errorTable)) {
            $role_id = ($boolCompany) ? 3 : 5;
            $adress = htmlspecialchars(strip_tags($_POST['adress'])) . ',<br>' . htmlspecialchars(strip_tags($_POST['postal'])) . ' ' . htmlspecialchars(strip_tags($_POST['city']));

            $user = [
                'name' => htmlspecialchars(strip_tags($_POST['name'])),
                'surname' => htmlspecialchars(strip_tags($_POST['surname'])),
                'email' => htmlspecialchars(strip_tags($_POST['email'])),
                'password' => htmlspecialchars(strip_tags($_POST['password'])),
                'adress' => htmlspecialchars($adress),
                'phone' => htmlspecialchars(strip_tags($_POST['phone'])),
                'name_company' => '',
                'id_poleEmploi' => '',
                'birth_place' => '',
                'birth_date' => '',
                'nationality' => '',
                'role_id' => $role_id,
            ];

            if ($boolCompany) {
                $user['name_company'] = htmlspecialchars(strip_tags($_POST['name_company']));
            } else {
                if (!empty($_POST['id_poleEmploi'])) {
                    $user['id_poleEmploi'] = htmlspecialchars(strip_tags($_POST['id_poleEmploi']));
                } else {
                    $user['id_poleEmploi'] = $id_poleEmploi;
                }
                $user['birth_place'] = htmlspecialchars(strip_tags($_POST['birth_place']));
                $user['birth_date'] = htmlspecialchars(strip_tags($_POST['birth_date']));
                $user['nationality'] = htmlspecialchars(strip_tags($_POST['nationality']));
            }

            $UserRepo = new UserRepository;
            $UserRepo->InsertUser($user);

            $success = [$AlertMessage->getSuccess('register')];
            $successJson = json_encode($success);
            echo $successJson;
        } else
            $errorTable[] = $AlertMessage->getError('registerContent', 'errorForm');
    } else
        $errorTable[] = $AlertMessage->getError('registerContent', 'notForm');

    if (!empty($errorTable)) {
        $errorJson = json_encode($errorTable);
        echo $errorJson;
    }
}
function activationAccountTreatment()
{
    $UserRepo = new UserRepository;
    $token = '';
    (isset($_GET['token'])) ? $token = htmlspecialchars(strip_tags($_GET['token'])) : $token = '';

    if ($token != '') {
        $email = $UserRepo->checkToken($token);
        if ($email != false) {
            $UserRepo->activateUsers($email, $token);
            return 'activationSucces';
        }
    }
    return 'tokenError';
}
function loginTreatment()
{
    $AlertMessage = new AlertMessage;
    $errorTable = array();

    if (isset($_POST) && !empty($_POST)) {
        $UserRepo = new UserRepository;

        $email = htmlspecialchars(strip_tags($_POST['email_login']));
        $password = htmlspecialchars(strip_tags($_POST['password_login']));

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

            $user = $UserRepo->getUserByEmail($email);
            if (is_array($user)) {
                $bool = $UserRepo->checkPassword($user['user_id'], $password);
                var_dump($bool);
                if ($bool) {
                    $_SESSION['user'] = $user;
                    $alertSucces = $AlertMessage->getSuccess('login');
                    $succesJson = json_encode($alertSucces);
                    echo $succesJson;

                } else
                    $errorTable[] = $AlertMessage->getError('loginContent', 'loginIncorrect');
            } else
                $errorTable[] = $AlertMessage->getError('loginContent', 'loginIncorrect');

        } else
            $errorTable[] = $AlertMessage->getError('loginContent', 'errorForm');

    } else
        $errorTable[] = $AlertMessage->getError('loginContent', 'notForm');

    if (!empty($errorTable)) {
        $errorJson = json_encode($errorTable);
        echo $errorJson;
    }
}