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
    function logOut()
    {
        unset($_SESSION['user']);
        header('Location: index.php');
    }

    function updateUserElements()
    {
        // var_dump($_POST);
        // var_dump($_FILES);
        if ((!isset($_GET['id']) || $_GET['id'] == null) && (!isset($_GET['type']) || $_GET['type'] == null)) {
            // erreur 404 page not found : Vous devez renseigner un id utilisateur et un type de modification
        } elseif ((isset($_GET['id']) && $_GET['id'] == $_SESSION['user']['user_id']) && (isset($_GET['type']) && $_GET['type'] !== null)) {
            $type = $_GET['type'];
            $id = $_GET['id'];
            $userRepository = new UserRepository();
            if (isset($_POST) && empty($_FILES)) {
                $array = $_POST;
                // var_dump($array);

                if(!empty($array)){
                    if ($type == 'status') {
                        $bools = $userRepository->updateUserStatus($id, $array);
                        header('Location:?action=profilePage&id='.$_GET['id']);
                    }elseif ($type == 'links') {
                        $bools = $userRepository->updateUserLinks($id, $array);
                        header('Location:?action=profilePage&id='.$_GET['id']);
                    } elseif ($type == 'skills') {
                        $bools = $userRepository->updateUserSkills($id, $array);
                        header('Location:?action=profilePage&id='.$_GET['id']);
                    }elseif ($type == 'datas') {
                            if (isset($array['password']) && !empty($array['password'])) {
                                $password = $array['password'];
                                $UserRepo = new UserRepository();
                                $bool = $UserRepo->checkPassword($id, $password);
                                if ($bool) {
                                    $bools = $userRepository->updateUserDatas($id, $array);
                                    header('Location:?action=profilePage&id='.$_GET['id']);
                                } else {
                                    // erreur : Votre mot de passe est incorrect
                                }
                            } else {
                                // erreur : Vous devez entrer votre mot de passe pour valider les modifications
                            }
                    }elseif ($type == 'description') {
                        $bools = $userRepository->updateUserDescription($id, $array);
                        header('Location:?action=profilePage&id='.$_GET['id']);
                    }
                // TRAITEMENTS AUTORISÉS MALGRÉ POST VIDE aka suppression
                }elseif ($type == 'links') {
                    $bools = $userRepository->updateUserLinks($id, $array);
                    header('Location:?action=profilePage&id='.$_GET['id']);
                } elseif ($type == 'skills') {
                    $bools = $userRepository->updateUserSkills($id, $array);
                    header('Location:?action=profilePage&id='.$_GET['id']);
                }
            }elseif(isset($_FILES) && !empty($_FILES) && isset($_POST) && !empty($_POST)){
                $array = $_POST;
                if ($type == 'highlight') {
                    if ($array['modifyInput'] == 'modify' || $array['modifyInput'] == 'add') {
                        $bools = $userRepository->updateUserHighlight($id, $array);
                        header('Location:?action=profilePage&id='.$_GET['id']);
                    } else {
                        // erreur : Vous devez choisir si vous souhaitez ajouter ou modifier le projet phare
                    }
                } elseif ($type == 'addMyProject') {
                    $bools = $userRepository->addMyProject($id, $array);
                    header('Location:?action=profilePage&id='.$_GET['id']);
                } elseif ($type == 'modifyMyProject') {
                    if (isset($_GET['projectID']) && $_GET['projectID'] !== null){
                        $projectID = $_GET['projectID'];
                        $bools = $userRepository->modifyMyProject($id, $array, $projectID);
                        header('Location:?action=profilePage&id='.$_GET['id']);
                    } else {
                        // erreur : l'ID du projet doit être défini
                    }
                }
            }elseif (isset($_FILES) && !empty($_FILES)) {
                if ($type == 'avatar') {
                    $array = $_FILES['avatar'];
                    $bools = $userRepository->updateUserAvatar($id, $array);
                    header('Location:?action=profilePage&id='.$_GET['id']);
                } elseif ($type == 'cv') {
                    $array = $_FILES['cv'];
                    $bools = $userRepository->updateUserCV($id, $array);
                    header('Location:?action=profilePage&id='.$_GET['id']);
                } else {
                    header('Location:?action=profilePage&id='.$_GET['id']);
                }
            } else {
                // erreur : vous n'êtes pas autorisé à modifier les données de cet utilisateur
            }
        }
    }

    function deleteMyProject() {
        if (isset($_POST['project_id'])) {
            $id = $_POST['project_id'];
            $projectRepo = new ProjectRepository();
            $bools = $projectRepo->deleteProject($id);
            $response = array(
                        "status" => "success",
                        "message" => "Le projet a bien été supprimé.",
                        "project_id" => $id,
                    );
                    echo json_encode($response);
        }
    }

} catch (Exception $error) {
    echo 'Exception reçue : ', $e->getMessage(), "\n";

}