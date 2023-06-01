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
    public $user_tags;
    public $user_highlight;
    public $user_cv;
    public $user_projects;

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
    public function InsertUser($account): void
    {
        $Mail = new Mail;
        $Mail->sendMailActivationAccount($account['email']);
        $token = $Mail->getToken();

        $pass = password_hash($account['password'], PASSWORD_BCRYPT);

        $req = "INSERT INTO `user`(`user_name`,`user_surname`, `user_email`, `user_password`, `user_token`,`user_place`,`user_phone`,`user_company`,`user_numero_pe`,`user_birth_place`,`user_birth_date`,`user_nationality`,`role_id`) VALUE(?,?,?,?,?,?,?,?,?,?,?,?,?)";
        $stmt = $this->bdd->prepare($req);
        $stmt->execute([$account['name'], $account['surname'], $account['email'], $pass, $token, $account['adress'], $account['phone'], $account['name_company'], $account['id_poleEmploi'], $account['birth_place'], $account['birth_date'], $account['nationality'], $account['role_id']]);

        if ($account['formation_id'] !== 0) {
            $req = "SELECT LAST_INSERT_ID();";
            $stmt = $this->bdd->prepare($req);
            $stmt->execute();
            $user_id = $stmt->fetch();

            $req = "INSERT INTO `promo_candidate`(`user_id`,`promo_id`) VALUE(?,?)";
            $stmt = $this->bdd->prepare($req);
            $stmt->execute([$user_id[0], $account['formation_id']]);
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
  
   public function getAllCandidates(): array
    {
        $candidates = [];
        $query = "SELECT `user_id` FROM `user` WHERE `role_id` = ?";
        $req = $this->bdd->prepare($query);
        $req->execute([5]);
        $data = $req->fetchAll(PDO::FETCH_ASSOC);

        foreach ($data as $candidate) {
            $candidates[] = $this->getUserById($candidate['user_id']);
        }

        return $candidates;
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
            $learners[] = $this->getUserById($learner['user_id']);
        }

        return $learners;
    }

    public function getAllCompanies(): array
    {
        $companies = [];
        $query = "SELECT `user_id` FROM `user` WHERE `role_id` = ? ";
        $req = $this->bdd->prepare($query);
        $req->execute([3]);
        $data = $req->fetchAll(PDO::FETCH_ASSOC);

        foreach ($data as $company) {
            $companies[] = $this->getUserById($company['user_id']);
        }

        return $companies;
    }

    public function getAllFormators(): array
    {
        $formators = [];
        $query = "SELECT `user_id` FROM `user` WHERE `role_id` = ? ";
        $req = $this->bdd->prepare($query);
        $req->execute([2]);
        $data = $req->fetchAll(PDO::FETCH_ASSOC);

        foreach ($data as $formator) {
            $formators[] = $this->getUserById($formator['user_id']);
        }

        return $formators;
    }


    public function getUserPromo($option,$userId):array
    {
        $promos = [];
        $promoRepo = new PromoRepository;

        if($option == 'candidature'){
            $req = $this->bdd->prepare("SELECT `promo_id` FROM promo_candidate WHERE user_id = ?");
            $req->execute([$userId]);
            $data = $req->fetchAll(PDO::FETCH_ASSOC);

            foreach($data as $key){
                $promos[] = $promoRepo->getPromoById($key['promo_id']);
            }
        }

        if($option == 'apprenant'){
            $req = $this->bdd->prepare("SELECT `promo_id` FROM promo_user WHERE user_id = ?");
            $req->execute([$userId]);
            $data = $req->fetchAll(PDO::FETCH_ASSOC);

            foreach($data as $key){
                $promos[] = $promoRepo->getPromoById($key['promo_id']);
            }
        }

        if($option == 'refusé'){
            $req = $this->bdd->prepare("SELECT `promo_id` FROM promo_refused WHERE user_id = ?");
            $req->execute([$userId]);
            $data = $req->fetchAll(PDO::FETCH_ASSOC);

            foreach($data as $key){
                $promos[] = $promoRepo->getPromoById($key['promo_id']);
            }
        }

        return $promos;
    }

    public function getUserSimplonProjects($id):array
    {
        $projects = [];
        $req = $this->bdd->prepare("SELECT project_id FROM project_team WHERE user_id = ?");
        $req->execute([$id]);
        $data = $req->fetchAll(PDO::FETCH_ASSOC);

        foreach($data as $key){
            $projectRepo = new ProjectRepository;
            $Project = $projectRepo->getProjectById($key['project_id']);

            if($Project->type->id != 2){
                $projects[] = $Project;
            }
        }


        return $projects;
    }

    public function getUserPersonnalProjects($id):array
    {
        $projects = [];
        $req = $this->bdd->prepare("SELECT project_id FROM project_team WHERE user_id = ?");
        $req->execute([$id]);
        $data = $req->fetchAll(PDO::FETCH_ASSOC);

        foreach($data as $key){
            $projectRepo = new ProjectRepository;
            $Project = $projectRepo->getProjectById($key['project_id']);

            if($Project->type->id == 2){
                $projects[] = $Project;
            }
        }


        return $projects;
    }

    public function getUserSubmittedProjects($id):array
    {
        $projects = [];
        $req = $this->bdd->prepare("SELECT project_id FROM project WHERE user_id = ?");
        $req->execute([$id]);
        $data = $req->fetchAll(PDO::FETCH_ASSOC);

        foreach($data as $key){
            $projectRepo = new ProjectRepository;
            $Project = $projectRepo->getProjectById($key['project_id']);
            $projects[] = $Project;
        }

        return $projects;
    }

    public function getUserMail($userId):string
    {
        $req = $this->bdd->prepare("SELECT `user_email` FROM `user` WHERE `user_id` = ?");
        $req->execute([$userId]);
        $data = $req->fetch();

        return $data['user_email'];
    }

    public function deleteUser($userId):void
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

    public function updateUserPersonnalInfos(array $post):void
    {
        var_dump($post);
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
        if($role === false){
            $error = true;
        }

        $user = securizeInteger($post['user']);
        if($user === false){
            $error = true;
        }


        // UPDATE GENERALE
        if($surname === false || $name === false || $adress === false || $email === false || $phone === false ){
            $error = true;
        }else{
            $query = "UPDATE `user` SET `user_surname` = ?, `user_name` = ?, `user_place` = ?, `user_email` = ?, `user_phone` = ?";
            $execute = [$surname,$name,$adress,$email,$phone];
        }



        // UPDATE PAS ENTREPRISE
        if($post['role'] != 3){
            // Sécurisation variables pas entreprise
            $birth_date = securizeString($post['birth_date']);
            $birth_place = securizeString($post['birth_place']);
            $nationality = securizeString($post['nationality']);

            if($birth_date === false || $birth_place === false || $nationality === false){
                $error = true;
            }else{
                $query .= ", `user_birth_date` = ?, `user_birth_place` = ?, `user_nationality` = ?";
                $push = [$birth_date,$birth_place,$nationality];
                $execute = array_merge($execute,$push);
            }
        }else{



        // UPDATE ENTREPRISE
        // Sécurisation variables entreprise
        $company = securizeString($post['company']);

            if($company === false){
                $error = true;
            }else{
                $query .= ", `user_company` = ?";
                $push = [$post['company']];
                $execute = array_merge($execute,$push);
            }
        }



        // UPDATE CANDIDAT/APPRENANT
        if($post['role'] == 5 || $post['role'] == 4){
            // Sécurisation variables candidat/apprenant
            $number = securizeString($post['number']);
                if($number === false){
                    $error = true;
                }else{
                $query .= ", `user_numero_pe` = ?";
                $push = [$number];
                $execute = array_merge($execute,$push);
            }
        }



        // FAIT LA REQUETE SI 0 ERREURS
        if($error === false){
            $query .= " WHERE `user_id` = ?";
            $push = [$user];
            $execute = array_merge($execute,$push);

            // var_dump($query);
            // var_dump($execute);
            $req = $this->bdd->prepare($query);
            $req->execute($execute);
        }
    }
}