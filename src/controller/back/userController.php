<?php
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

        foreach ($_POST as $name => $value) {
            if (!empty($value) || $value != '') {
                if ($name == "email") {
                    if (!filter_var($value, FILTER_VALIDATE_EMAIL)) {
                        $errorTable[] = $AlertMessage->getError('emailIncorrect', false, $name);

                    } else if ($UserRepo->checkEmail($value)) {
                        $errorTable[] = $AlertMessage->getError('existingEmail', false, $name);
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
                    $errorTable[] = $AlertMessage->getError('emptyField', false, $name);
                }
            }
        }
        if (!empty($_POST['password']) && !empty($_POST['confirm_password'])) {
            if ($_POST['password'] !== $_POST['confirm_password']) {
                $errorTable[] = $AlertMessage->getError('passwordNotIdentical', false, 'password');
            }
            $pattern = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[^\da-zA-Z]).{6,}$/';
            if (!preg_match($pattern, $_POST['password'])) {
                $errorTable[] = $AlertMessage->getError('passwordNotSafe', false, 'password');
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
            $UserRepo->InsertUser($user);
            $succes = [$AlertMessage->getSuccess('register', true)];
            $succesJson = json_encode($succes);
            echo $succesJson;
        } else
            $errorTable[] = $AlertMessage->getError('errorForm', false, 'button');
    } else
        $errorTable[] = $AlertMessage->getError('notForm', false, 'button');

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
    $succes = array();

    if (isset($_POST) && !empty($_POST)) {
        $UserRepo = new UserRepository;

        $email = htmlspecialchars(strip_tags($_POST['email_login']));
        $password = htmlspecialchars(strip_tags($_POST['password_login']));

        foreach ($_POST as $name => $value) {

            if (!empty($value)) {
                if ($name == "email_login" && !filter_var($value, FILTER_VALIDATE_EMAIL)) {
                    $errorTable[] = $AlertMessage->getError('emailIncorrect', false, $name);
                }
            } else {
                $errorTable[] = $AlertMessage->getError('emptyField', false, $name);
            }
        }

        if (empty($errorTable)) {

            $user_id = $UserRepo->getIdByEmail($email);
            if (($user_id)) {
                $bool = $UserRepo->checkPassword($user_id, $password);
                if ($bool) {
                    $isUserActive = $UserRepo->checkActive($user_id);
                    if ($isUserActive) {
                        $userSession = $UserRepo->getUserSession($user_id);
                        $_SESSION['user'] = (object) array(
                            'user_id' => $userSession['user_id'],
                            'status_id' => $userSession['status_id'],
                            'role_id' => $userSession['role_id'],
                        );
                      
                        $succes[] = $AlertMessage->getSuccess('login', true, 'login');
                        //$role_id = $userSession['role_id'];
                        $json = json_encode($succes);
                        echo $json;

                    } else {
                        $UserRepo->sendMailActivationAccount($email);
                        $errorTable[] = $AlertMessage->getError('notActive', true);
                    }
                } else
                    $errorTable[] = $AlertMessage->getError('loginIncorrect', false, 'login');
            } else
                $errorTable[] = $AlertMessage->getError('loginIncorrect', false, 'login');
        } else
            $errorTable[] = $AlertMessage->getError('errorForm', false, 'login');

    } else
        $errorTable[] = $AlertMessage->getError('notForm', false, 'login');

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
            if (($user_id)) {
                // $Mail = new MailRepository;
                // $Mail->sendMailResetPassword($email);
                // $token = $Mail->getToken();

                $token = $UserRepo->sendMailResetPassword($email);

                $UserRepo->addToken($user_id, $token);
            }
            $success = [$AlertMessage->getSuccess('mailForgetPassword', false)];
            $successJson = json_encode($success);
            echo $successJson;
        } else
            $errorTable[] = $AlertMessage->getError('emailIncorrect', false, 'email_forget');
    } else
        $errorTable[] = $AlertMessage->getError('notForm', false, 'forgetContent');

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

    if (isset($_POST)) {
        $pass = htmlspecialchars(strip_tags($_POST['password']));
        $rePass = htmlspecialchars(strip_tags($_POST['confirmPassword']));
        $token = htmlspecialchars(strip_tags($_POST['token']));

        if (empty($pass))
            $errorTable[] = $AlertMessage->getError('emptyField', false, 'password');
        if (empty($rePass))
            $errorTable[] = $AlertMessage->getError('emptyField', false, 'confirmPassword');

        if (empty($errorTable)) {
            if ($pass == $rePass) {
                $UserRepo = new UserRepository;
                $email = $UserRepo->getMailByToken($token);
                $UserRepo->setPassword($email, $pass);

                $success = [$AlertMessage->getSuccess('resetPassword', true)];
                $successJson = json_encode($success);
                echo $successJson;
            } else
                $errorTable[] = $AlertMessage->getError('passwordNotIdentical', false, 'forget');
        } else
            $errorTable[] = $AlertMessage->getError('errorForm', false, 'forget');
    } else
        $errorTable[] = $AlertMessage->getError('notForm', false, 'forget');

    if (!empty($errorTable)) {
        $errorJson = json_encode($errorTable);
        echo $errorJson;
    }
}

function contactUsers()
{
    if (isset($_POST['message'])) {
        $send = trim(htmlspecialchars(strip_tags($_POST['send']), ENT_QUOTES));
        $objet = trim(htmlspecialchars(strip_tags($_POST['object']), ENT_QUOTES));
        $message = trim(htmlspecialchars(strip_tags($_POST['message']), ENT_QUOTES));

        $name = "Simplon Charleville";
        $email = "simplon.charleville@gmail.com";

        if (!empty($name) && !empty($email) && !empty($objet) && !empty($message)) {
            $to = $send;
            $email_subject = $objet;
            $bodyParagraphs = ["Name: {$name}", "Email: {$email}", "Message:", $message];
            $email_body = join(PHP_EOL, $bodyParagraphs);
            $headers = ['From' => $email, 'Reply-To' => $email, 'Content-type' => 'text/html; charset=utf-8'];
            if (mail($to, $email_subject, $email_body, $headers)) {
                // echo 'envoi réussi';
            } else {
                // echo 'envoi échoué';
            }
        } else {
            // echo 'éléments manquants';
        }
    }
}

function deleteCandidate()
{
    // Check si admin
    $userRepo = new UserRepository;
    $req = $userRepo->bdd->prepare("DELETE FROM `promo_candidate` WHERE `user_id` = ? AND `promo_id` = ?");
    $req->execute([$_POST['user_id'], $_POST['promo_id']]);
}

function deleteLearner()
{
    // Check si admin
    $userRepo = new UserRepository;
    $req = $userRepo->bdd->prepare("DELETE FROM `promo_user` WHERE `user_id` = ? AND `promo_id` = ?");
    $req->execute([$_POST['user_id'], $_POST['promo_id']]);

}

function deleteUser()
{
    // Check si admin
    $userRepo = new UserRepository;
    $userRepo->deleteUser($_POST['user_id']);
}

function assignFormator()
{
    // Check si admin
    $userRepo = new UserRepository;
    $req = $userRepo->bdd->prepare("UPDATE user SET `role_id` = ? WHERE `user_id` = ?");
    $req->execute([2, $_POST['user_id']]);
}

function updateUserPersonnalInfos()
{
    // Check si admin
    $userRepo = new UserRepository;
    $userRepo->updateUserPersonnalInfos($_POST);
}

function logOut()
{
    unset($_SESSION['user']);
    header('Location: index.php');
}

function candidatePagination()
{
    $jsonData = file_get_contents('php://input', true);
    $data = json_decode($jsonData);

    $UserRepo = new UserRepository;

    $limitStart = $data->limitStart;
    $limitEnd = $data->limitEnd;
    $limit = "$limitStart,$limitEnd";

    $filter = empty($data->filter) ? null : $data->filter;
    $execute = empty($data->execute) ? null : $data->execute;

    $total = $UserRepo->getCandidatesNumber();
    $filtered = $UserRepo->getFilteredCandidatesNumber($filter, $execute);
    $users = $UserRepo->getAllCandidates($limit, $filter, $execute);

    $usersHTML = [];
    $modalsHTML = [];
    foreach ($users as $candidate) {
        ob_start();
        include('view/admin/candidate/table_row.php');
        include("view/admin/candidate/modalCandidature.php");
        $content = ob_get_clean();
        $usersHTML[] = $content;

        ob_start();
        include("view/admin/modal/modalUpdateUser.php");
        $content = ob_get_clean();
        $modalsHTML[] = $content;
    }

    $response = array(
        "status" => "success",
        "message" => "Les candidats ont bien été récupérés d'après les critères ci dessous.",
        "total" => $total,
        "filtered" => $filtered,
        "query" => "WHERE $filter",
        "limit" => $limit,
        "candidates" => $usersHTML,
        "modals" => $modalsHTML,
    );
    echo json_encode($response);

}
function learnerPagination()
{
    $jsonData = file_get_contents('php://input', true);
    $data = json_decode($jsonData);

    $UserRepo = new UserRepository;
    $PromoRepo = new PromoRepository;

    $limitStart = $data->limitStart;
    $limitEnd = $data->limitEnd;
    $limit = "$limitStart,$limitEnd";

    $filter = empty($data->filter) ? null : $data->filter;
    $execute = empty($data->execute) ? null : $data->execute;

    $total = $UserRepo->getLearnersAndFormatorsNumber();
    $filtered = $UserRepo->getFilteredLearnersAndFormatorsNumber($filter, $execute);
    $users = $UserRepo->getLearnersAndFormators($limit, $filter, $execute);
    $usersHTML = [];
    $modalsHTML = [];
    foreach ($users as $user) {
        ob_start();
        include("view/admin/apprenant/table_row.php");
        include("view/admin/modal/modalInfos.php");
        include("view/admin/modal/modalProjet.php");
        $content = ob_get_clean();
        $usersHTML[] = $content;

        ob_start();
        include("view/admin/modal/modalUpdateUser.php");
        $content = ob_get_clean();
        $modalsHTML[] = $content;
    }

    $response = array(
        "status" => "success",
        "message" => "Les utilisateurs ont bien été récupérés d'après les critères ci dessous.",
        "total" => $total,
        "filtered" => $filtered,
        "query" => "WHERE $filter",
        "limit" => $limit,
        "candidates" => $usersHTML,
        "modals" => $modalsHTML,
    );
    echo json_encode($response);

}
function companyPagination()
{
    $jsonData = file_get_contents('php://input', true);
    $data = json_decode($jsonData);

    $UserRepo = new UserRepository;
    $PromoRepo = new PromoRepository;

    $limitStart = $data->limitStart;
    $limitEnd = $data->limitEnd;
    $limit = "$limitStart,$limitEnd";

    $filter = empty($data->filter) ? null : $data->filter;
    $execute = empty($data->execute) ? null : $data->execute;

    $total = $UserRepo->getCompaniesNumber();
    $filtered = $UserRepo->getFilteredCompaniesNumber($filter, $execute);
    $users = $UserRepo->getAllCompanies($limit, $filter, $execute);

    $usersHTML = [];
    $modalsHTML = [];
    foreach ($users as $user) {
        ob_start();
        include('view/admin/entreprise/table_row.php');
        include("view/admin/modal/modalInfos.php");
        include("view/admin/modal/modalProjet.php");
        $content = ob_get_clean();
        $usersHTML[] = $content;

        ob_start();
        include("view/admin/modal/modalUpdateUser.php");
        $content = ob_get_clean();
        $modalsHTML[] = $content;
    }

    $response = array(
        "status" => "success",
        "message" => "Les utilisateurs ont bien été récupérés d'après les critères ci dessous.",
        "total" => $total,
        "filtered" => $filtered,
        "query" => "WHERE $filter",
        "limit" => $limit,
        "candidates" => $usersHTML,
        "modals" => $modalsHTML,
    );
    echo json_encode($response);

}

function updateUserElements()
{
    if ((!isset($_GET['id']) || $_GET['id'] == null) && (!isset($_GET['type']) || $_GET['type'] == null)) {
        // erreur 404 page not found : Vous devez renseigner un id utilisateur et un type de modification
    } elseif ((isset($_GET['id']) && $_GET['id'] == $_SESSION['user']->user_id) && (isset($_GET['type']) && $_GET['type'] !== null) || $_SESSION['user']->role_id == 1) {
        $type = $_GET['type'];
        $id = $_GET['id'];
        $userRepository = new UserRepository();
        if (isset($_POST) && empty($_FILES)) {
            $array = $_POST;

            if (!empty($array)) {
                if ($type == 'status') {
                    $bools = $userRepository->updateUserStatus($id, $array);
                    header('Location:?action=profilePage&id=' . $_GET['id']);
                } elseif ($type == 'links') {
                    $bools = $userRepository->updateUserLinks($id, $array);
                    header('Location:?action=profilePage&id=' . $_GET['id']);
                } elseif ($type == 'skills') {
                    $bools = $userRepository->updateUserSkills($id, $array);
                    header('Location:?action=profilePage&id=' . $_GET['id']);
                } elseif ($type == 'datas') {
                    if (isset($array['password']) && !empty($array['password'])) {
                        $password = $array['password'];
                        $UserRepo = new UserRepository();
                        $bool = $UserRepo->checkPassword($id, $password);
                        if ($bool) {
                            $bools = $userRepository->updateUserDatas($id, $array);
                            header('Location:?action=profilePage&id=' . $_GET['id']);
                        } else {
                            // erreur : Votre mot de passe est incorrect
                        }
                    } else {
                        // erreur : Vous devez entrer votre mot de passe pour valider les modifications
                    }
                } elseif ($type == 'description') {
                    $bools = $userRepository->updateUserDescription($id, $array);
                    header('Location:?action=profilePage&id=' . $_GET['id']);
                }
                // TRAITEMENTS AUTORISÉS MALGRÉ POST VIDE aka suppression
            } elseif ($type == 'links') {
                $bools = $userRepository->updateUserLinks($id, $array);
                header('Location:?action=profilePage&id=' . $_GET['id']);
            } elseif ($type == 'skills') {
                $bools = $userRepository->updateUserSkills($id, $array);
                header('Location:?action=profilePage&id=' . $_GET['id']);
            }
        } elseif (isset($_FILES) && !empty($_FILES) && isset($_POST) && !empty($_POST)) {
            $array = $_POST;
            if ($type == 'highlight') {
                if ($array['modifyInput'] == 'modify' || $array['modifyInput'] == 'add') {
                    $bools = $userRepository->updateUserHighlight($id, $array);
                    header('Location:?action=profilePage&id=' . $_GET['id']);
                } else {
                    // erreur : Vous devez choisir si vous souhaitez ajouter ou modifier le projet phare
                }
            } elseif ($type == 'addMyProject') {
                $bools = $userRepository->addMyProject($id, $array);
                header('Location:?action=profilePage&id=' . $_GET['id']);
            } elseif ($type == 'modifyMyProject') {
                if (isset($_GET['projectID']) && $_GET['projectID'] !== null) {
                    $projectID = $_GET['projectID'];
                    $bools = $userRepository->modifyMyProject($id, $array, $projectID);
                    header('Location:?action=profilePage&id=' . $_GET['id']);
                } else {
                    // erreur : l'ID du projet doit être défini
                }
            }
        } elseif (isset($_FILES) && !empty($_FILES)) {
            if ($type == 'avatar') {
                $array = $_FILES['avatar'];
                $bools = $userRepository->updateUserAvatar($id, $array);
                header('Location:?action=profilePage&id=' . $_GET['id']);
            } elseif ($type == 'cv') {
                $array = $_FILES['cv'];
                $bools = $userRepository->updateUserCV($id, $array);
                header('Location:?action=profilePage&id=' . $_GET['id']);
            } else {
                header('Location:?action=profilePage&id=' . $_GET['id']);
            }
        } else {
            // erreur : vous n'êtes pas autorisé à modifier les données de cet utilisateur
        }
    }
}

function deleteMyProject()
{
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