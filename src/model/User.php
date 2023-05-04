<?php
require_once 'src/model/ConnectBdd.php';
class Users
{
    public $id;
    public $name;
    public $surname;
    public $email;
    public $password;
    public $avatar;
    public $description;
    public $linkedin;
    public $github;
    public $token;
    public $id__poleEmploi;
    public $phone;
    public $adress;
    public $birth_date;
    public $birth_place;
    public $nationality;
    public $status;
    public $id_role;

    public function getNameAndPseudo($account)
    {
        $this->id = $account['id_users'];
        $this->id_role = $account['id_role'];
        $this->name = $account['name_users'];
        $this->email = $account['email_users'];
        $this->status = $account['email_users'];
        return $this;

    }

    public function generateToken($length = 32)
    {
        return bin2hex(random_bytes($length));
    }
    public function tokenMail($action, $email)
    {
        $token = $this->generateToken();
        $to = $email;
        $subject = "Confirmation de votre inscription";
        $message = "Bonjour,\r\n\r\n
            Pour activer votre compte, veuillez cliquer sur le lien ci-dessous : \r\n\r\n
            http://localhost/projet_dev_v2/index.php?action=$action&token=$token\r\n\r\n
            Cordialement,\r\n
            L'équipe de Example.com";
        $headers = "From: webmaster@example.com\r\n";
        $headers .= "Reply-To: webmaster@example.com\r\n";
        $headers .= "Content-Type: text/plain; charset=utf-8\r\n";
        //mail($to, $subject, $message, $headers);
        return $token;
    }

}

class UsersRepository extends ConnectBdd
{

    public function checkEmail($email)
    {
        $req = "SELECT user_email FROM user WHERE user_email = ?";
        $stmt = $this->bdd->prepare($req);
        $stmt->execute([$email]);
        $account = $stmt->fetch();
        $stmt->closeCursor();


        if ($account) {
            return true;
        } else {
            return false;
        }
    }
    public function InsertUser($account)
    {
        $User = new Users;
        $token = $User->tokenMail('activateUser', $account['email']);
        $pass = password_hash($account['password'], PASSWORD_BCRYPT);

        $req = "INSERT INTO `user`(`user_name`,`user_surname`, `user_email`, `user_password`, `user_token`,`user_place`,`user_phone`,`user_company`,`user_numero_pe`,`user_birth_place`,`user_birth_date`,`user_nationality`) VALUE(?,?,?,?,?,?,?,?,?,?,?,?)";
        $stmt = $this->bdd->prepare($req);
        $stmt->execute([$account['name'], $account['surname'], $account['email'], $pass, $token, $account['adress'], $account['phone'], $account['company'], $account['id_poleEmploi'], $account['birth_place'], $account['birth_date'], $account['nationality']]);
        $stmt->closeCursor();

    }

/*
public function activateUsers($email, $token)
{
$req = "UPDATE `users` SET `activate_users`= 1, `token_users` = '' WHERE token_users = ? AND email_users = ?";
$stmt = $this->bdd->prepare($req);
$stmt->execute([$token, $email]);
}
public function addToken($email, $token)
{
$req = "UPDATE `users` SET `token_users` = ? WHERE email_users = ?";
$stmt = $this->bdd->prepare($req);
$stmt->execute([$token, $email]);
}
public function checkPassword($id, $mdp)
{
$reqmdp = $this->bdd->prepare("SELECT password_users FROM users WHERE  id_users= ?");
$reqmdp->execute([$id]);
$mdpuser = $reqmdp->fetch(PDO::FETCH_OBJ);
$mdpuser = $mdpuser->password_users;
$mdpval = password_verify($mdp, $mdpuser);
return $mdpval;
}
public function checkToken($token)
{
$req = "SELECT email_users FROM users WHERE token_users = ?";
$stmt = $this->bdd->prepare($req);
$stmt->execute([$token]);
$results = $stmt->fetch();
if ($email = $results['email_users']) {
return $email;
} else {
return false;
}
}
public function updatePassword($email, $password)
{
$pass = password_hash($password, PASSWORD_BCRYPT);
$req = "UPDATE `users` SET `token_users` = '', `password_users` = ? WHERE email_users = ?";
$stmt = $this->bdd->prepare($req);
$stmt->execute([$pass, $email]);
}
*/
}