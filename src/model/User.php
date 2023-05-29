<?php
require_once 'src/model/ConnectBdd.php';
require_once 'src/model/Mail.php';

class User
{
    private $user_id;
    private $user_name;
    private $user_surname;
    private $user_email;
    private $user_password;
    private $user_avatar;
    private $user_company;
    private $user_description;
    private $user_linkedin;
    private $user_github;
    private $user_token;
    private $user_id_poleEmploi;
    private $user_phone;
    private $user_adress;
    private $user_birth_date;
    private $user_birth_place;
    private $user_nationality;
    private $user_status;
    private $role_id;

    public function __construct($id)
    {
        $UserRepo = new UserRepository;
        $user = $UserRepo->getUserById($id);
        $this->setUser($user);
    }
    public function getUser()
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

        /* Propesct */
        $this->user_id_poleEmploi = $account['user_numero_pe'];
        $this->user_birth_date = $account['user_birth_date'];
        $this->user_birth_place = $account['user_birth_place'];
        $this->user_nationality = $account['user_nationality'];

        /* Utility */
        $this->user_token = $account['user_token'];
        $this->user_status = $account['status_name'];
        $this->role_id = $account['role_id'];
    }


}

class UserRepository extends ConnectBdd
{
    public function InsertUser($account): void
    {
        $Mail = new Mail;
        $token = $Mail->tokenMail('activateUser', $account['email']);
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
    public function getUserById($id)
    {
        $req = "SELECT * FROM `user` AS u LEFT JOIN `status` AS s ON u.status_id = s.status_id WHERE user_id= ?";
        $stmt = $this->bdd->prepare($req);
        $stmt->execute([$id]);
        $account = $stmt->fetch();
        $stmt->closeCursor();
        return $account;
    }
    public function getIdByEmail($email)
    {
        $req = "SELECT user_id FROM `user` AS u LEFT JOIN `status` AS s ON u.status_id = s.status_id WHERE user_email= ?";
        $stmt = $this->bdd->prepare($req);
        $stmt->execute([$email]);
        $user_id = $stmt->fetch();
        $stmt->closeCursor();

        return ($user_id != false) ? $user_id['user_id'] : false;
    }

    public function getUserSession($id)
    {
        $req = "SELECT user_id,id_status,id_role FROM `user` WHERE user_id= ?";
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
        var_dump($mdpuser, $id);
        $mdpuser = $mdpuser->user_password;
        //var_dump($mdpuser);

        $mdpval = password_verify($mdp, $mdpuser);
        return $mdpval;
    }
    public function checkToken($token)
    {
        $req = "SELECT user_email FROM user WHERE user_token = ?";
        $stmt = $this->bdd->prepare($req);
        $stmt->execute([$token]);
        $results = $stmt->fetch();
        $stmt->closeCursor();

        return (isset($results['user_email']) && is_string($results['user_email'])) ? $results['user_email'] : false;
    }
    /* Utility */
    public function addToken($email, $token): void
    {
        $req = "UPDATE `user` SET `user_token` = ? WHERE user_email = ?";
        $stmt = $this->bdd->prepare($req);
        $stmt->execute([$token, $email]);
        $stmt->closeCursor();
    }
    public function activateUsers($email, $token): void
    {
        $req = "UPDATE `user` SET `status_id`= ?, `user_token` = ? WHERE user_token = ? AND user_email = ?";
        $stmt = $this->bdd->prepare($req);
        $stmt->execute([2, '', $token, $email]);
        $stmt->closeCursor();
    }


}