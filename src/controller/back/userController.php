<?php
try {

    function registerTreatment()
    {
        $AlertMessage = new AlertMessage;
        $errorTable = array();

        if (isset($_POST) && !empty($_POST)) {
            $UserRepo = new UserRepository;
            $candidate = ['formation_id', 'id_poleEmploi', 'birth_place', 'birth_date', 'nationality'];
            $company = ['boolCompany', 'name_company'];

            $id_poleEmploi = '';
            $boolCompany = $_POST['boolCompany'];
            $formation_id = $_POST['formation_id'];
            //var_dump($_POST);

            if ($boolCompany == 1 && $formation_id > 0)
                $errorTable[] = $AlertMessage->getError('registerContent', 'ErrorCompanyRegister');
            if ($boolCompany == 0 && $formation_id == 0)
                $errorTable[] = $AlertMessage->getError('registerContent', 'NoTrainingChosen');

            foreach ($_POST as $name => $value) {
                if (!empty($value) || $value != '') {
                    if ($name == "email") {
                        if (!filter_var($value, FILTER_VALIDATE_EMAIL)) {
                            $errorTable[] = $AlertMessage->getError($name, 'emailIncorrect');

                        } else if ($UserRepo->checkEmail($value)) {
                            $errorTable[] = $AlertMessage->getError($name, 'existingEmail');
                        }
                    }
                } else {
                    if (
                        (array_search($name, $company, true) && !$boolCompany) ||
                        (array_search($name, $candidate, true) && $boolCompany)
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
                    'formation_id' => (int) $_POST['formation_id']
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
                //$UserRepo->InsertUser($user);

                $success = [$AlertMessage->getSuccess('register', true)];
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
            $email = $UserRepo->getMailByToken($token);
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

                $user_id = $UserRepo->getIdByEmail($email);
                if (is_string($user_id)) {
                    $bool = $UserRepo->checkPassword($user_id, $password);
                    if ($bool) {
                        $userSession = $UserRepo->getUserSession($user_id);
                        $_SESSION['user'] = (object) array(
                            'user_id' => $userSession['user_id'],
                            'status_id' => $userSession['status_id'],
                            'role_id' => $userSession['role_id'],
                        );
                        $succes = $AlertMessage->getSuccess('login', true);
                        $_SESSION['succes'] = $succes;

                        $succesTable[] = ['role_id' => $userSession['role_id']];
                        $succesJson = json_encode($succesTable);
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
    function sendMailResetPasswordTreatment()
    {
        $AlertMessage = new AlertMessage;
        if (isset($_POST)) {
            $UserRepo = new UserRepository;
            $email = htmlspecialchars(strip_tags($_POST['email_forget']));

            if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $user_id = $UserRepo->getIdByEmail($email);
                if (is_string($user_id)) {
                    $Mail = new Mail;
                    $Mail->sendMailResetPassword($email);

                    $token = $Mail->getToken();
                    $UserRepo->addToken($user_id, $token);
                }
                $success = [$AlertMessage->getSuccess('mailForgetPassword', false)];
                $successJson = json_encode($success);
                echo $successJson;
            } else
                $errorTable[] = $AlertMessage->getError('email_forget', 'emailIncorrect');
        } else
            $errorTable[] = $AlertMessage->getError('forgetContent', 'notForm');

        if (!empty($errorTable)) {
            $errorJson = json_encode($errorTable);
            echo $errorJson;

        }
    }
    function checkToken()
    {
        $UserRepo = new UserRepository;
        $token = '';
        (isset($_GET['token'])) ? $token = htmlspecialchars(strip_tags($_GET['token'])) : $token = '';

        if ($token != '') {
            $email = $UserRepo->getMailByToken($token);
            if ($email != false) {
                return true;
            } else
                return [false, 'incorectToken'];
        }
        return [false, 'notToken'];
    }
    function resetPasswordTreatment()
    {
        $AlertMessage = new AlertMessage;
        $errorTable = array();
        //var_dump($_POST);

        if (isset($_POST)) {
            $pass = htmlspecialchars(strip_tags($_POST['password']));
            $rePass = htmlspecialchars(strip_tags($_POST['confirmPassword']));
            $token = htmlspecialchars(strip_tags($_POST['token']));

            if (empty($pass))
                $errorTable[] = $AlertMessage->getError('password', 'emptyField');
            if (empty($rePass))
                $errorTable[] = $AlertMessage->getError('confirmPassword', 'emptyField');

            if (empty($errorTable)) {
                if ($pass == $rePass) {
                    $UserRepo = new UserRepository;
                    $email = $UserRepo->getMailByToken($token);
                    $UserRepo->setPassword($email, $pass);

                    $success = [$AlertMessage->getSuccess('resetPassword', true)];
                    $successJson = json_encode($success);
                    echo $successJson;
                } else
                    $errorTable[] = $AlertMessage->getError('forget_errorContent', 'passwordNotIdentical');
            } else
                $errorTable[] = $AlertMessage->getError('forget_errorContent', 'errorForm');
        } else
            $errorTable[] = $AlertMessage->getError('forget_errorContent', 'notForm');

        if (!empty($errorTable)) {
            $errorJson = json_encode($errorTable);
            echo $errorJson;
        }
    }

function contactUsers()
{
    var_dump($_POST);

    if(isset($_POST['message'])){
        $send=trim(htmlspecialchars(strip_tags($_POST['send']),ENT_QUOTES));
        $objet=trim(htmlspecialchars(strip_tags($_POST['object']),ENT_QUOTES));
        $message=trim(htmlspecialchars(strip_tags($_POST['message']),ENT_QUOTES));

        $name = "Simplon Charleville";
        $email = "simplon.charleville@gmail.com";
    
    
        if(!empty($name)&&!empty($email)&&!empty($objet)&&!empty($message)){
            $to = $send;
            $email_subject = $objet;
            $bodyParagraphs = ["Name: {$name}", "Email: {$email}", "Message:", $message];
            $email_body = join(PHP_EOL, $bodyParagraphs);
            $headers = ['From' => $email, 'Reply-To' => $email, 'Content-type' => 'text/html; charset=utf-8'];
            if (mail($to, $email_subject, $email_body, $headers)){
                echo 'envoi réussi';
            }else{
                echo 'envoi échoué';
            }
        }else{
            echo 'éléments manquants';
        }
    
    }
}

function deleteCandidate()
{
    // Check si admin
    var_dump($_POST);
    $userRepo = new UserRepository;
    $req = $userRepo->bdd->prepare("DELETE FROM `promo_candidate` WHERE `user_id` = ? AND `promo_id` = ?");
    $req->execute([$_POST['user_id'], $_POST['promo_id']]);
}

function deleteLearner()
{
    // Check si admin
    var_dump($_POST);
    $userRepo = new UserRepository;
    $req = $userRepo->bdd->prepare("DELETE FROM `promo_user` WHERE `user_id` = ? AND `promo_id` = ?");
    $req->execute([$_POST['user_id'], $_POST['promo_id']]);

}

function deleteUser()
{
    // Check si admin
    var_dump($_POST);
    $userRepo = new UserRepository;
    $userRepo->deleteUser($_POST['user_id']);
}

function assignFormator()
{
    // Check si admin
    var_dump($_POST);
    $userRepo = new UserRepository;
    $req = $userRepo->bdd->prepare("UPDATE user SET `role_id` = ? WHERE `user_id` = ?");
    $req->execute([2, $_POST['user_id']]);
}

function updateUserPersonnalInfos()
{
    // Check si admin
    // var_dump($_POST);
    $userRepo = new UserRepository;
    $userRepo->updateUserPersonnalInfos($_POST);
}

function logOut()
    {
        unset($_SESSION['user']);
        header('Location: index.php');
    }

} catch (Exception $error) {
    echo 'Exception reçue : ', $e->getMessage(), "\n";

}