<?php
require_once 'src/model/ConnectBdd.php';
require_once 'src/model/Mail.php';
require_once 'src/model/Tag.php';

class User
{
    public $user_id;
    public $user_name;
    public $user_surname;
    public $user_email;
    public $user_password;
    public $user_avatar;
    public $user_company;
    public $user_phone;
    public $user_adress;
    public $user_description;
    public $user_linkedin;
    public $user_github;
    public $user_token;
    public $user_id_poleEmploi;
    public $user_birth_date;
    public $user_birth_place;
    public $user_nationality;
    public $user_status_id;
    public $user_status;
    public $user_status_date;
    public $role_id;
    public $role_name;
    public $user_tags;
    public $user_highlight;
    public $user_cv;

    public function __construct($id)
    {
        $UserRepo = new UserRepository;
        $user = $UserRepo->getUserById($id);
        $this->setUser($user);
    }
    public function getUser(): object
    {
        return $this;
    }

    public function setUser($account): void
    {
        /* base */
        $this->user_id = $account['user_id'];
        $this->user_name = $account['user_name'];
        $this->user_surname = $account['user_surname'];
        $this->user_email = $account['user_email'];
        $this->user_password = $account['user_password'];
        $this->user_avatar = $account['user_avatar'];

        /* Company */
        $this->user_company = $account['user_company'];

        /* Profil */
        $this->user_phone = $account['user_phone'];
        $this->user_adress = $account['user_place'];
        $this->user_description = $account['user_description'];
        $this->user_linkedin = (!null) ? $account['user_linkedin'] : '';
        $this->user_github = (!null) ? $account['user_github'] : '';
        $this->user_highlight = (!null) ? $account['user_highlight'] : '';
        $this->user_cv = (!null) ? $account['user_cv'] : '';

        /* Prospect */
        $this->user_id_poleEmploi = $account['user_numero_pe'];
        $this->user_birth_date = $account['user_birth_date'];
        $this->user_birth_place = $account['user_birth_place'];
        $this->user_nationality = $account['user_nationality'];

        /* Utility */
        $this->user_token = $account['user_token'];
        $this->user_status_id = $account['status_id'];
        $this->user_status = $account['status_name'];
        $this->user_status_date = $account['user_status_date'];
        $this->role_id = $account['role_id'];
    }
}

class UserRepository extends ConnectBdd
{
    public function sendMailActivationAccount($email){
        $token = bin2hex(random_bytes(32));
        
        if ($email) {
            $send = $email;
            $objet = 'Veuillez activer votre compte Simplon Charleville !';
            $message = "Bonjour,\r\n\r\n
            Bienvenue à Simplon ! Dernière étape pour votre candidature !   \r\n\r\n
            Veuillez cliquer sur ce lien pour valider votre compte : http://localhost/projet_dev_v2/index.php?action=registerPage&token=$token \r\n\r\n
            Cordialement,\r\n
            Jordan Kunys";
            
    
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

                    return $token;
                } else {
                    // echo 'envoi échoué';

                    return false;
                }
            } else {
                // echo 'éléments manquants';

                return false;
            }
        }
    }

    public function sendMailValidationCandidature($user_id,$promo_id){
        
        $user = new User($user_id);
        $promoRepo = New PromoRepository;
        $promo = $promoRepo->getPromoById($promo_id);
        if (isset($user) && !empty($user)) {
            $send = $user->user_email;
            $objet = "Votre candidature pour $promo->name!";
            $message = "Bonjour $user->user_surname,\r\n\r\n
            Votre candidature pour la promotion $promo->name a bien été prise en compte ! Pour rappel, elle début le $promo->start.   \r\n\r\n
            Voici les informations de votre candidature, n'hésitez pas à les modifier sur votre profil s'ils sont incorrects : \r\n
            Nom : $user->user_name \r\n
            Prénom : $user->user_surname \r\n
            Email : $user->user_email \r\n
            Numéro de téléphone : $user->user_phone \r\n
            Adresse : $user->user_adress \r\n
            Numéro pôle Emploi : $user->user_id_poleEmploi \r\n\r\n
            Cordialement,\r\n
            Jordan Kunys";
            
    
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

                    return true;
                } else {
                    // echo 'envoi échoué';

                    return false;
                }
            } else {
                // echo 'éléments manquants';

                return false;
            }
        }
    }

    public function sendMailResetPassword($email){
        $token = bin2hex(random_bytes(32));
        
        if ($email) {
            $send = $email;
            $objet = "Demande de changement de mot de passe";
            $message = "Bonjour,\r\n\r\n
    
                Pour changer votre mot de passe, veuillez cliquer sur le lien ci-dessous : \r\n\r\n
                http://localhost/projet_dev_v2/index.php?action=resetPasswordForm&token=$token \r\n\r\n
                Si vous n'êtes pas à l'origine de cette demande, il vous suffit d'ignorer ce message. \r\n\r\n
                " ;
            
    
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

                    return $token;
                } else {
                    // echo 'envoi échoué';

                    return false;
                }
            } else {
                // echo 'éléments manquants';

                return false;
            }
        }
    }

    public function InsertUser($account): void
    {
        $Mail = new MailRepository();
        // $Mail->sendMailActivationAccount($account['email']);
        // $token = $Mail->getToken();
        $token = $this->sendMailActivationAccount($account['email']);

        $pass = password_hash($account['password'], PASSWORD_BCRYPT);

        $req = "INSERT INTO `user`(`user_name`,`user_surname`, `user_email`, `user_password`, `user_token`,`user_place`,`user_phone`,`user_company`,`user_numero_pe`,`user_birth_place`,`user_birth_date`,`user_nationality`,`role_id`) VALUE(?,?,?,?,?,?,?,?,?,?,?,?,?)";
        $stmt = $this->bdd->prepare($req);
        $stmt->execute([$account['name'], $account['surname'], $account['email'], $pass, $token, $account['adress'], $account['phone'], $account['name_company'], $account['id_poleEmploi'], $account['birth_place'], $account['birth_date'], $account['nationality'], $account['role_id']]);

        if ($account['formation_id'] !== 0) {
            $req = "SELECT LAST_INSERT_ID();";
            $stmt = $this->bdd->prepare($req);
            $stmt->execute();
            $user_id = $stmt->fetch();

            $promo_id = $account['formation_id'];
            $promo_id = 2;

            $req = "INSERT INTO `promo_candidate`(`user_id`,`promo_id`) VALUE(?,?)";
            $stmt = $this->bdd->prepare($req);
            $stmt->execute([$user_id[0], $promo_id]);

            $this->sendMailValidationCandidature($user_id,$promo_id);
        }
        $stmt->closeCursor();
    }

    /* Set */
    public function setPassword($email, $password): void
    {
        $pass = password_hash($password, PASSWORD_BCRYPT);
        $req = "UPDATE `user` SET `user_token` = ?, `user_password` = ? WHERE user_email = ?";
        $stmt = $this->bdd->prepare($req);
        $stmt->execute(['', $pass, $email]);
        $stmt->closeCursor();
    }

    /* Get */
    public function getUserById($id): array
    {
        $req = "SELECT * FROM `user` AS u LEFT JOIN `status` AS s ON u.status_id = s.status_id LEFT JOIN `role` AS r ON u.role_id = r.role_id WHERE `user_id` = ?";
        $stmt = $this->bdd->prepare($req);
        $stmt->execute([$id]);
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        return $data;
    }
    public function getIdByEmail($email)
    {
        $req = "SELECT user_id FROM `user` WHERE user_email= ?";
        $stmt = $this->bdd->prepare($req);
        $stmt->execute([$email]);
        $user_id = $stmt->fetch();
        $stmt->closeCursor();

        return ($user_id != false) ? $user_id['user_id'] : false;
    }
    public function getMailByToken($token)
    {
        $req = "SELECT user_email FROM user WHERE user_token = ?";
        $stmt = $this->bdd->prepare($req);
        $stmt->execute([$token]);
        $results = $stmt->fetch();
        $stmt->closeCursor();

        return (isset($results['user_email']) && is_string($results['user_email'])) ? $results['user_email'] : false;
    }

    public function getUserSession($id)
    {
        $req = "SELECT user_id,status_id,role_id FROM `user` WHERE user_id= ?";
        $stmt = $this->bdd->prepare($req);
        $stmt->execute([$id]);
        $userSession = $stmt->fetch();
        $stmt->closeCursor();

        return $userSession;
    }

    /* Check */
    public function checkEmail($email): bool
    {
        $req = "SELECT user_email FROM user WHERE user_email = ?";
        $stmt = $this->bdd->prepare($req);
        $stmt->execute([$email]);
        $account = $stmt->fetch();
        $stmt->closeCursor();

        return ($account) ? true : false;
    }
    public function checkActive($id): bool
    {
        $req = $this->bdd->prepare("SELECT status_id FROM `user` WHERE user_id = ?");
        $req->execute([$id]);
        $status_id = $req->fetch(PDO::FETCH_COLUMN);
        $req->closeCursor();

        $isUserActive = $status_id != 1 ? true : false ;
        return $isUserActive;
        
    }
    public function checkPassword($id, $mdp): bool
    {
        $req = "SELECT user_password FROM `user` WHERE  user_id= ?";
        $stmt = $this->bdd->prepare($req);
        $stmt->execute([$id]);
        $mdpuser = $stmt->fetch(PDO::FETCH_OBJ);
        $stmt->closeCursor();
        $mdpuser = $mdpuser->user_password;

        $bool = (password_verify($mdp, $mdpuser) || $mdp === $mdpuser) ? true : false;
        return $bool;
    }

    /* Utility */
    public function addToken($user_id, $token): void
    {
        $req = "UPDATE `user` SET `user_token` = ? WHERE user_id = ?";
        $stmt = $this->bdd->prepare($req);
        $stmt->execute([$token, $user_id]);
        $stmt->closeCursor();
    }
    public function activateUsers($email, $token): void
    {
        $req = "UPDATE `user` SET `status_id`= ?, `user_token` = ? WHERE user_token = ? AND user_email = ?";
        $stmt = $this->bdd->prepare($req);
        $stmt->execute([2, '', $token, $email]);
        $stmt->closeCursor();
    }

    /* Update */
    public function updateUserAvatar(int $id, array $array): bool|array
    {
        // traitement image
        $path = "assets/upload/avatar/";
        $image = securizeImage($array, $path);
        if ($image === false) {
            // message d'erreurs dans securizeImage
            return $image;
        }
        if (!empty($image)) {
            $req = $this->bdd->prepare("UPDATE user SET user_avatar = ? WHERE user_id = ?");
            $bool = $req->execute([$image, $id]);
            return $bool;
        }
    }

    public function updateUserCV(int $id, array $array): bool|array
    {
        // traitement pdf
        $bool = [];
        $path = 'assets/upload/profile/cv/';
        $pdf = securizePdf($_FILES['cv'], $path);
        if ($pdf === false) {
            $error = true;
        }
        if (!empty($pdf)) {
            $req = $this->bdd->prepare("UPDATE user SET user_cv = ? WHERE user_id = ?");
            $bool = $req->execute([$pdf, $id]);
        }
        return $bool;
    }

    public function updateUserStatus(int $id, array $array): bool|array
    {
        $user_status = $_POST['user_status'];
        $user_status_date = $_POST['user_status_date'];
        $req = $this->bdd->prepare("UPDATE user SET status_id = ?, user_status_date = ? WHERE user_id = ?");
        $bool = $req->execute([$user_status, $user_status_date, $id]);
        return $bool;
    }

    public function updateUserDescription(int $id, array $array): bool|array
    {
        $user_description = $array['description'];
        $checkText = securizeText($user_description);
        if ($checkText === false) {
            header('HTTP/1.0 400 Bad Request');
            echo '<br><p>Le texte envoyé est invalide ou contient des balises non acceptées</p>';
            exit();
        } else {
            $req = $this->bdd->prepare("UPDATE user SET user_description =? WHERE user_id =?");
            $bool = $req->execute([$user_description, $id]);
            return $bool;
        }
    }

    public function updateUserLinks(int $id, array $array): bool|array
    {
        $bools = [];
        $AlertMessage = new AlertMessage;
        $errorTable = array();
        if (isset($array['user_linkedin']) && !empty($array['user_linkedin'])) {
            if (str_contains($array['user_linkedin'], 'linkedin.com')) {
                $user_linkedin = $array['user_linkedin'];
                $req = $this->bdd->prepare("UPDATE user SET user_linkedin = ? WHERE user_id = ?");
                $bool = $req->execute([$user_linkedin, $id]);
                array_push($bools, $bool);
            } else {
                $errorTable[] = $AlertMessage->getError('linkedin_error', 'ErrorLinkedinLink');
            }
        } elseif (isset($array['user_linkedin']) && empty($array['user_linkedin'])) {
            $user_linkedin = $array['user_linkedin'];
            $req = $this->bdd->prepare("UPDATE user SET user_linkedin = ? WHERE user_id = ?");
            $bool = $req->execute([$user_linkedin, $id]);
            array_push($bools, $bool);
        }

        if (isset($array['user_github']) && !empty($array['user_github'])) {
            if (str_contains($array['user_github'], 'github.com')) {
                $user_github = $array['user_github'];
                $req = $this->bdd->prepare("UPDATE user SET user_github = ? WHERE user_id = ?");
                $bool = $req->execute([$user_github, $id]);
                array_push($bools, $bool);
            } else {
                $errorTable[] = $AlertMessage->getError('github_error', 'ErrorGithubLink');
            }
        } elseif (isset($array['user_github']) && empty($array['user_github'])) {
            $user_github = $array['user_github'];
            $req = $this->bdd->prepare("UPDATE user SET user_github = ? WHERE user_id = ?");
            $bool = $req->execute([$user_github, $id]);
            array_push($bools, $bool);
        }
        if (!empty($errorTable)) {
            $errorJson = json_encode($errorTable);
            header('HTTP/1.0 400 Bad Request');
            echo $errorJson . '<br><p>Veuillez vérifier le(s) lien(s) envoyé(s).</p>';
            exit();
        } else {
            return $bools;
        }
    }

    public function updateUserSkills(int $id, array $array): bool|array
    {
        $bools = [];
        $delete_skills = $this->bdd->prepare("DELETE FROM user_tag WHERE user_id = ?");
        $deleted = $delete_skills->execute([$id]);
        if (isset($array['skills'])) {
            $user_skills = $array['skills'];
            if (is_array($user_skills)) {
                foreach ($user_skills as $user_skill) {
                    $req = $this->bdd->prepare("INSERT INTO user_tag (user_id, tag_id) VALUES (?, ?)");
                    $bool = $req->execute([$id, $user_skill]);
                    array_push($bools, $bool);
                }
            }
        }
        return $bools;
    }

    public function updateUserDatas(int $id, array $array): bool|array
    {
        $bools = [];
        $email = securizeMail($array['email']);
        $phone = securizePhone($array['phone']);
        $adress = securizeString($array['adress']);
        $numero_pe = securizeInteger($array['numero_pe']);
        $nationality = securizeString($array['nationality']);
        $new_password = $array['new_password'];
        $confirm_new_password = $array['confirm_new_password'];
        if (isset($new_password) && !empty($new_password) && isset($confirm_new_password) && !empty($confirm_new_password)) {
            $checkNewPassword = securizePassword($new_password, $confirm_new_password);
            if ($checkNewPassword) {
                $hashedPassword = $checkNewPassword;
                $req = $this->bdd->prepare("UPDATE user SET user_password = ? WHERE user_id = ?");
                $bool = $req->execute([$hashedPassword, $id]);
                array_push($bools, $bool);
            }
        }
        $req = $this->bdd->prepare("UPDATE user SET user_email = ?, user_numero_pe = ?, user_phone = ?, user_place = ?, user_nationality = ? WHERE user_id = ?");
        $bool = $req->execute([$email, $numero_pe, $phone, $adress, $nationality, $id]);
        array_push($bools, $bool);

        return $bools;
    }

    public function updateUserHighlight(int $id, array $array): bool|array
    {

        $request = "UPDATE user SET user_highlight = ? WHERE user_id = ?";
        $bools = [];
        // Envoi d'un projet phare URL
        if ($array['text'] == 'website') {
            $website = $array['website'];
            $checkWebsite = securizeUrl($website);
            if ($checkWebsite) {
                $req = $this->bdd->prepare($request);
                $bool = $req->execute([$website, $id]);
                array_push($bools, $bool);
            } else {
                // erreur
            }

            // Envoi d'un projet phare PDF
        } elseif ($array['text'] == 'pdf') {
            $pdf = $_FILES['pdf']['name'];
            $path = 'assets/upload/profile/highlight/';
            $checkPdf = securizePdf($_FILES['pdf'], $path);
            if ($checkPdf && !empty($pdf)) {
                $req = $this->bdd->prepare($request);
                $bool = $req->execute([$checkPdf, $id]);
                array_push($bools, $bool);
            } else {
                // erreur : vous devez envoyer un fichier pdf valide
            }

            // Envoi d'un projet phare IMAGE
        } elseif ($array['text'] == 'image') {
            $image = $_FILES['image']['name'];
            $path = 'assets/upload/profile/highlight/';
            $checkImage = securizeImage($_FILES['image'], $path);
            if ($checkImage && !empty($image)) {
                $req = $this->bdd->prepare($request);
                $bool = $req->execute([$checkImage, $id]);
                array_push($bools, $bool);
            } else {
                // erreur : vous devez envoyer un fichier image valide
            }
        }
        return $bools;
    }

    public function addMyProject(int $id, array $array): bool|array
    {
        $bools = [];
        $title = securizeString($array['title']);
        $description = securizeString($array['description']);
        $url = securizeString($array['url']);
        $skills = isset($array['skills']) ? $array['skills'] : [];
        $image = $_FILES['image']['name'];
        $path = 'assets/upload/profile/highlight/';
        $checkImage = securizeImage($_FILES['image'], $path);
        if ($checkImage && !empty($image)) {
            $req = $this->bdd->prepare("INSERT INTO project (project_name, project_description, project_model_image, project_model_link, user_id, status_id, type_id, project_start) VALUES (?, ?, ?, ?, ?, 12, 2, CURRENT_TIMESTAMP())");
            $bool = $req->execute([$title, $description, $checkImage, $url, $id]);
            array_push($bools, $bool);
            $lastID = $this->bdd->lastInsertID();
            $request = $this->bdd->prepare("INSERT INTO project_team (project_id, user_id) VALUES (?, ?)");
            $bool2 = $request->execute([(int) $lastID, $id]);
            array_push($bools, $bool2);
            foreach ($skills as $skill) {
                $req = $this->bdd->prepare("INSERT INTO project_tag (project_id, tag_id) VALUES (?, ?)");
                $bool3 = $req->execute([$lastID, $skill]);
                array_push($bools, $bool3);
            }
        } else {
            // erreur : vous devez envoyer un fichier image valide
        }
        return $bools;
    }

    public function modifyMyProject(int $id, array $array, int $projectID): bool|array
    {
        $bools = [];
        $title = securizeString($array['title']);
        $description = securizeString($array['description']);
        $url = securizeString($array['url']);
        if (isset($array['skills'])) {
            $skills = $array['skills'];
        } else {
            $tagRepo = new TagRepository;
            $tags = $tagRepo->getProjectTags($projectID);
            $skills = $tags;
        }
        if (isset($array['image'])) {
            $image = $_FILES['image']['name'];
            $path = 'assets/upload/profile/highlight/';
            $checkImage = securizeImage($_FILES['image'], $path);
        } else {
            $projectRepo = new ProjectRepository;
            $image = $projectRepo->getProjectImage($projectID);
            $checkImage = $image['project_model_image'];
        }
        if ($checkImage && !empty($checkImage)) {
            $req = $this->bdd->prepare("UPDATE project SET project_name = ?, project_description = ?, project_model_image = ?, project_model_link = ?, user_id = ?, status_id = 12, type_id = 2, project_start = CURRENT_TIMESTAMP() WHERE project_id = ?");
            $bool = $req->execute([$title, $description, $checkImage, $url, $id, $projectID]);
            array_push($bools, $bool);
            $removeSkills = $this->bdd->prepare("DELETE FROM project_tag WHERE project_id =?");
            $clearSkills = $removeSkills->execute([$projectID]);
            foreach ($skills as $skill) {
                $req = $this->bdd->prepare("INSERT INTO project_tag (project_id, tag_id) VALUES (?, ?)");
                $bool2 = $req->execute([$projectID, $skill->id]);
                array_push($bools, $bool2);
            }
        } else {
            // erreur : vous devez envoyer un fichier image valide
        }

        return $bools;
    }
    public function getLearnersAndFormators($limitRequest = null, $filters = null, $execute = null, $order = null): array
    {
        $filters = $filters === null ? "" : "AND $filters";
        $execute = $execute === null ? [] : explode(",", $execute);
        $order = $order === null ? "ORDER BY user.role_id ASC" : "ORDER BY $order";
        $limit = $limitRequest === null ? "" : "LIMIT $limitRequest";

        $query = "SELECT `user_id` FROM `user` WHERE (`role_id` = 4 OR `role_id` = 2) $filters $order $limit";
        $req = $this->bdd->prepare($query);
        $req->execute($execute);
        $data = $req->fetchAll(PDO::FETCH_ASSOC);

        $users = [];
        foreach ($data as $key) {
            $users[] = new User($key['user_id']);
        }

        return $users;
    }

    public function getFilteredLearnersAndFormatorsNumber($filters = null, $execute = null, ): int
    {
        $filters = $filters === null ? "" : "AND $filters";
        $execute = $execute === null ? [] : explode(",", $execute);
        $query = "SELECT COUNT(*) FROM `user` WHERE (`role_id` = 4 OR `role_id` = 2) $filters";
        $req = $this->bdd->prepare($query);
        $req->execute($execute);
        $data = $req->fetch(PDO::FETCH_COLUMN);

        return $data;
    }

    public function getLearnersAndFormatorsNumber(): int
    {
        $req = $this->bdd->prepare("SELECT COUNT(*) FROM user WHERE (role_id = ? OR role_id = ?)");
        $req->execute([4, 2]);
        $data = $req->fetch(PDO::FETCH_COLUMN);

        return $data;
    }

    public function getAllCandidates($limitRequest = null, $filters = null, $execute = null, $order = null): array
    {
        $filters = $filters === null ? "" : "AND $filters";
        $execute = $execute === null ? [] : explode(",", $execute);
        $order = $order === null ? "ORDER BY user.role_id ASC" : "ORDER BY $order";
        $limit = $limitRequest === null ? "" : "LIMIT $limitRequest";

        $candidates = [];
        $query = "SELECT `user_id` FROM `user` WHERE `role_id` = 5 $filters $order $limit";
        $req = $this->bdd->prepare($query);
        $req->execute($execute);
        $data = $req->fetchAll(PDO::FETCH_ASSOC);

        foreach ($data as $candidate) {
            $candidates[] = new User($candidate['user_id']);
        }

        return $candidates;
    }

    public function getFilteredCandidatesNumber($filters = null, $execute = null, ): int
    {
        $filters = $filters === null ? "" : "AND $filters";
        $execute = $execute === null ? [] : explode(",", $execute);
        $query = "SELECT COUNT(*) FROM `user` WHERE `role_id` = 5 $filters";
        $req = $this->bdd->prepare($query);
        $req->execute($execute);
        $data = $req->fetch(PDO::FETCH_COLUMN);

        return $data;
    }

    public function getCandidatesNumber(): int
    {
        $req = $this->bdd->prepare("SELECT COUNT(*) FROM user WHERE role_id = ?");
        $req->execute([5]);
        $data = $req->fetch(PDO::FETCH_COLUMN);

        return $data;
    }

    public function getAllLearners(): array
    {
        $learners = [];
        $formators = [];
        $query = "SELECT `user_id` FROM `user` WHERE `role_id` = ? ";
        $req = $this->bdd->prepare($query);
        $req->execute([4]);
        $data = $req->fetchAll(PDO::FETCH_ASSOC);

        foreach ($data as $learner) {
            $learners[] = new User($learner['user_id']);
        }

        return $learners;
    }

    public function getAllCompanies($limitRequest = null, $filters = null, $execute = null, $order = null): array
    {
        $filters = $filters === null ? "" : "AND $filters";
        $execute = $execute === null ? [] : explode(",", $execute);
        $order = $order === null ? "ORDER BY user.role_id ASC" : "ORDER BY $order";
        $limit = $limitRequest === null ? "" : "LIMIT $limitRequest";

        $companies = [];
        $query = "SELECT `user_id` FROM `user` WHERE `role_id` = 3 $filters $order $limit";
        $req = $this->bdd->prepare($query);
        $req->execute($execute);
        $data = $req->fetchAll(PDO::FETCH_ASSOC);

        foreach ($data as $company) {
            $companies[] = new User($company['user_id']);
        }

        return $companies;
    }

    public function getFilteredCompaniesNumber($filters = null, $execute = null, ): int
    {
        $filters = $filters === null ? "" : "AND $filters";
        $execute = $execute === null ? [] : explode(",", $execute);
        $query = "SELECT COUNT(*) FROM `user` WHERE `role_id` = 3 $filters";
        $req = $this->bdd->prepare($query);
        $req->execute($execute);
        $data = $req->fetch(PDO::FETCH_COLUMN);

        return $data;
    }

    public function getCompaniesNumber(): int
    {
        $req = $this->bdd->prepare("SELECT COUNT(*) FROM user WHERE role_id = ?");
        $req->execute([3]);
        $data = $req->fetch(PDO::FETCH_COLUMN);

        return $data;
    }

    public function getAllFormators(): array
    {
        $formators = [];
        $query = "SELECT `user_id` FROM `user` WHERE `role_id` = ? ";
        $req = $this->bdd->prepare($query);
        $req->execute([2]);
        $data = $req->fetchAll(PDO::FETCH_ASSOC);

        foreach ($data as $formator) {
            $formators[] = new User($formator['user_id']);
        }

        return $formators;
    }

    public function getUserPromo($option, $userId): array
    {
        $promos = [];
        $promoRepo = new PromoRepository;

        if ($option == 'candidature') {
            $req = $this->bdd->prepare("SELECT `promo_id` FROM promo_candidate WHERE user_id = ?");
            $req->execute([$userId]);
            $data = $req->fetchAll(PDO::FETCH_ASSOC);

            foreach ($data as $key) {
                $promos[] = $promoRepo->getPromoById($key['promo_id']);
            }
        }

        if ($option == 'apprenant') {
            $req = $this->bdd->prepare("SELECT `promo_id` FROM promo_user WHERE user_id = ?");
            $req->execute([$userId]);
            $data = $req->fetchAll(PDO::FETCH_ASSOC);

            foreach ($data as $key) {
                $promos[] = $promoRepo->getPromoById($key['promo_id']);
            }
        }

        if ($option == 'refusé') {
            $req = $this->bdd->prepare("SELECT `promo_id` FROM promo_refused WHERE user_id = ?");
            $req->execute([$userId]);
            $data = $req->fetchAll(PDO::FETCH_ASSOC);

            foreach ($data as $key) {
                $promos[] = $promoRepo->getPromoById($key['promo_id']);
            }
        }

        return $promos;
    }

    public function getUserSimplonProjects($id): array
    {
        $projects = [];
        $req = $this->bdd->prepare("SELECT project_id FROM project_team WHERE user_id = ?");
        $req->execute([$id]);
        $data = $req->fetchAll(PDO::FETCH_ASSOC);

        foreach ($data as $key) {
            $projectRepo = new ProjectRepository;
            $Project = $projectRepo->getProjectById($key['project_id']);

            if ($Project->type->id != 2) {
                $projects[] = $Project;
            }
        }

        return $projects;
    }

    public function getUserPersonnalProjects($id): array
    {
        $projects = [];
        $req = $this->bdd->prepare("SELECT project_id FROM project_team WHERE user_id = ?");
        $req->execute([$id]);
        $data = $req->fetchAll(PDO::FETCH_ASSOC);

        foreach ($data as $key) {
            $projectRepo = new ProjectRepository;
            $Project = $projectRepo->getProjectById($key['project_id']);

            if ($Project->type->id == 2) {
                $projects[] = $Project;
            }
        }

        return $projects;
    }

    public function getUserSubmittedProjects($id): array
    {
        $projects = [];
        $req = $this->bdd->prepare("SELECT project_id FROM project WHERE user_id = ?");
        $req->execute([$id]);
        $data = $req->fetchAll(PDO::FETCH_ASSOC);

        foreach ($data as $key) {
            $projectRepo = new ProjectRepository;
            $Project = $projectRepo->getProjectById($key['project_id']);
            $projects[] = $Project;
        }

        return $projects;
    }

    public function getUserMail($userId): string
    {
        $req = $this->bdd->prepare("SELECT `user_email` FROM `user` WHERE `user_id` = ?");
        $req->execute([$userId]);
        $data = $req->fetch();

        return $data['user_email'];
    }

    public function deleteUser($userId): void
    {
        $req = $this->bdd->prepare("DELETE FROM `user_tag` WHERE `user_id` = ?");
        $req->execute([$_POST['user_id']]);

        $req = $this->bdd->prepare("DELETE FROM `promo_user` WHERE `user_id` = ?");
        $req->execute([$_POST['user_id']]);

        $req = $this->bdd->prepare("DELETE FROM `promo_refused` WHERE `user_id` = ?");
        $req->execute([$_POST['user_id']]);

        $req = $this->bdd->prepare("DELETE FROM `promo_candidate` WHERE `user_id` = ?");
        $req->execute([$_POST['user_id']]);

        $req = $this->bdd->prepare("DELETE FROM `project_team` WHERE `user_id` = ?");
        $req->execute([$_POST['user_id']]);

        $req = $this->bdd->prepare("DELETE FROM `project` WHERE `user_id` = ?");
        $req->execute([$_POST['user_id']]);

        $req = $this->bdd->prepare("DELETE FROM `user` WHERE `user_id` = ?");
        $req->execute([$_POST['user_id']]);
    }

    public function updateUserPersonnalInfos(array $post): void
    {
        $query = "";
        $execute = [];
        $error = false;

        // Sécurisation variables générales
        $surname = securizeString($post['surname']);
        $name = securizeString($post['name']);
        $adress = securizeString($post['adress']);
        $email = securizeMail($post['email']);
        $phone = securizePhone($post['phone']);

        $role = securizeInteger($post['role']);
        if ($role === false) {
            $error = true;
        }

        $user = securizeInteger($post['user']);
        if ($user === false) {
            $error = true;
        }

        // UPDATE GENERALE
        if ($surname === false || $name === false || $adress === false || $email === false || $phone === false) {
            $error = true;
        } else {
            $query = "UPDATE `user` SET `user_surname` = ?, `user_name` = ?, `user_place` = ?, `user_email` = ?, `user_phone` = ?";
            $execute = [$surname, $name, $adress, $email, $phone];
        }

        // UPDATE PAS ENTREPRISE
        if ($post['role'] != 3) {
            // Sécurisation variables pas entreprise
            $birth_date = securizeString($post['birth_date']);
            $birth_place = securizeString($post['birth_place']);
            $nationality = securizeString($post['nationality']);

            if ($birth_date === false || $birth_place === false || $nationality === false) {
                $error = true;
            } else {
                $query .= ", `user_birth_date` = ?, `user_birth_place` = ?, `user_nationality` = ?";
                $push = [$birth_date, $birth_place, $nationality];
                $execute = array_merge($execute, $push);
            }
        } else {

            // UPDATE ENTREPRISE
            // Sécurisation variables entreprise
            $company = securizeString($post['company']);

            if ($company === false) {
                $error = true;
            } else {
                $query .= ", `user_company` = ?";
                $push = [$post['company']];
                $execute = array_merge($execute, $push);
            }
        }

        // UPDATE CANDIDAT/APPRENANT
        if ($post['role'] == 5 || $post['role'] == 4) {
            // Sécurisation variables candidat/apprenant
            $number = securizeString($post['number']);
            if ($number === false) {
                $error = true;
            } else {
                $query .= ", `user_numero_pe` = ?";
                $push = [$number];
                $execute = array_merge($execute, $push);
            }
        }

        // FAIT LA REQUETE SI 0 ERREURS
        if ($error === false) {
            $query .= " WHERE `user_id` = ?";
            $push = [$user];
            $execute = array_merge($execute, $push);

            $req = $this->bdd->prepare($query);
            $req->execute($execute);
        }
    }
}