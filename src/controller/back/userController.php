<?php

function registerTreatment()
{
    //var_dump($_POST);

    if ((isset($_POST) && !empty($_POST))) {
        $AlertMessage = new AlertMessage;
        $UserRepo = new UsersRepository;
        $errorTable = array();

        $candidate = ['id_poleEmploi', 'birth_place', 'birth_date', 'nationality'];
        $company = 'company';

        foreach ($_POST as $name => $value) {

            if (!empty($value)) {
                if ($name == "email") {
                    if (!filter_var($value, FILTER_VALIDATE_EMAIL)) {
                        $errorTable[] = $AlertMessage->getError($name, 'emailIncorrect');

                    } elseif ($UserRepo->checkEmail($value)) {
                        $errorTable[] = $AlertMessage->getError($name, 'existingEmail');
                    }
                }
            } else {
                if (
                    ($name == $company && !isset($_POST['company_register'])) ||
                    (array_search($name, $candidate) && isset($_POST['company_register']))
                ) {
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
        if (!empty($errorTable)) {
            $errorJson = json_encode($errorTable);
            echo $errorJson;
        } else {

            $adress = htmlspecialchars(strip_tags($_POST['adress'])) . ',<br>' . htmlspecialchars(strip_tags($_POST['postal'])) . htmlspecialchars(strip_tags($_POST['ville']));
            $user = [
                'name' => htmlspecialchars(strip_tags($_POST['name'])),
                'surname' => htmlspecialchars(strip_tags($_POST['surname'])),
                'email' => htmlspecialchars(strip_tags($_POST['email'])),
                'password' => htmlspecialchars(strip_tags($_POST['password'])),
                'adress' => htmlspecialchars($adress),
                'phone' => htmlspecialchars(strip_tags($_POST['phone'])),
                'company' => '',
                'id_poleEmploi' => '',
                'birth_place' => '',
                'birth_date' => '',
                'nationality' => ''
            ];

            if (isset($_POST['company_register'])) {
                $user['company'] = htmlspecialchars(strip_tags($_POST['company']));
            } else {
                $user['id_poleEmploi'] = htmlspecialchars(strip_tags($_POST['id_poleEmploi']));
                $user['birth_place'] = htmlspecialchars(strip_tags($_POST['birth_place']));
                $user['birth_date'] = htmlspecialchars(strip_tags($_POST['birth_date']));
                $user['nationality'] = htmlspecialchars(strip_tags($_POST['nationality']));
            }

            $UserRepo = new UsersRepository;
            $UserRepo->InsertUser($user);

            $success = [$AlertMessage->getSuccess('register', 'register')];
            $successJson = json_encode($success);
            echo $successJson;
        }
    }
}

function login()
{
    if ((isset($_POST) && !empty($_POST))) {
        $AlertMessage = new AlertMessage;
        $UserRepo = new UsersRepository;

        $email = htmlspecialchars(strip_tags($_POST['email']));
        $password = htmlspecialchars(strip_tags($_POST['password']));
        $error = "";
        $succes = "";

        $user = $UserRepo->getUser($email);
        if ($user) {
            $bool = $UserRepo->checkPassword($user['user_id'], $password);
            if ($bool) {
                $_SESSION['user'] = $user;
                $error = $AlertMessage->getSuccess('content', 'login');
            } else
                $error = $AlertMessage->getError('content', 'loginIncorrect');
        } else
            $error = $AlertMessage->getError('content', 'loginIncorrect');


        if ($error != '') {
            $errorJson = json_encode($error);
            echo $errorJson;
        } elseif ($succes != '') {
            $succesJson = json_encode($succes);
            echo $succesJson;
        }
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
    $userRepo = new UsersRepository;
    $req = $userRepo->bdd->prepare("DELETE FROM `promo_candidate` WHERE `user_id` = ? AND `promo_id` = ?");
    $req->execute([$_POST['user_id'], $_POST['promo_id']]);
}

function deleteLearner()
{
    // Check si admin
    var_dump($_POST);
    $userRepo = new UsersRepository;
    $req = $userRepo->bdd->prepare("DELETE FROM `promo_user` WHERE `user_id` = ? AND `promo_id` = ?");
    $req->execute([$_POST['user_id'], $_POST['promo_id']]);

}

function assignFormator()
{
    // Check si admin
    var_dump($_POST);
    $userRepo = new UsersRepository;
    $req = $userRepo->bdd->prepare("UPDATE user SET `role_id` = ? WHERE `user_id` = ?");
    $req->execute([2, $_POST['user_id']]);
}