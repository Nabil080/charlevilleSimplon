<?php
require_once 'src/model/ConnectBdd.php';
class User
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
    public $numero_pe;
    public $phone;
    public $adress;
    public $birth_date;
    public $birth_place;
    public $nationality;
    public $tags;
    public $status;
    public $status_date;
    public $role;
    public $highlight;
    public $company;
    public $cv;
    public $projects;

    public function getNameAndPseudo($account)
    {
        $this->id = $account['id_users'];
        $this->role = $account['id_role'];
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

    public function getUserById($id):object
    {
        $req = "SELECT * FROM user WHERE user_id = ?";
        $stmt = $this->bdd->prepare($req);
        $stmt->execute([$id]);
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        $stmt->closeCursor();

        $User = new User;

        $User->id = $data['user_id'];
        $User->name = $data['user_name'];
        $User->surname = $data['user_surname'];
        $User->email = $data['user_email'];
        $User->password = $data['user_password'];
        $User->avatar = $data['user_avatar'];
        $User->description = $data['user_description'];
        $User->token = $data['user_token'];
        $User->phone = $data['user_phone'];
        $User->adress =  $data['user_place'];

        $User->linkedin = isset($data['user_linkedin']) ? $data['user_linkedin'] : null;
        $User->github = isset($data['user_github']) ? $data['user_github'] : null;
        $User->numero_pe = isset($data['user_numero_pe']) ? $data['user_numero_pe'] : null;
        $User->birth_date = isset($data['user_birth_date']) ? $data['user_birth_date'] : null;
        $User->birth_place = isset($data['user_birth_place']) ? $data['user_birth_place'] : null;
        $User->nationality = isset($data['user_nationality']) ? $data['user_nationality'] : null;
        $User->highlight = isset($data['user_highlight']) ? $data['user_highlight'] : null;
        $User->status_date = isset($data['user_status_date']) ? $data['user_status_date'] : null;
        $User->cv = isset($data['user_cv']) ? $data['user_cv'] : null;


        $Tags = new Tag;
        $tagRepo = new TagRepository;
        $Tags = $tagRepo->getUserTags($data['user_id']);
        $User->tags = $Tags;

        $Status = new Status;
        $statusRepo = new StatusRepository;
        $Status = $statusRepo->getStatusById($data['status_id']);
        $User->status = $Status;

        $Role = new Role;
        $roleRepo = new RoleRepository;
        $Role = $roleRepo->getRoleById($data['role_id']);
        $User->role = $Role;

        return $User;
    }

    public function checkEmail($email): bool
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
        $User = new User;
        $token = $User->tokenMail('activateUser', $account['email']);
        $pass = password_hash($account['password'], PASSWORD_BCRYPT);

        $req = "INSERT INTO `user`(`user_name`,`user_surname`, `user_email`, `user_password`, `user_token`,`user_place`,`user_phone`,`user_company`,`user_numero_pe`,`user_birth_place`,`user_birth_date`,`user_nationality`) VALUE(?,?,?,?,?,?,?,?,?,?,?,?)";
        $stmt = $this->bdd->prepare($req);
        $stmt->execute([$account['name'], $account['surname'], $account['email'], $pass, $token, $account['adress'], $account['phone'], $account['company'], $account['id_poleEmploi'], $account['birth_place'], $account['birth_date'], $account['nationality']]);
        $stmt->closeCursor();

    }
    public function getUser($email): object
    {
        $req = "SELECT * FROM `user` AS u LEFT JOIN `status` AS s ON u.status_id = s.status_id WHERE  user_email= ?";
        $stmt = $this->bdd->prepare($req);
        $stmt->execute([$email]);
        $account = $stmt->fetch(PDO::FETCH_OBJ);
        $stmt->closeCursor();

        $User = new User;

        $User->id = $account['user_id'];
        $User->name = $account['user_name'];
        $User->surname = $account['user_surname'];
        $User->email = $account['user_email'];
        $User->password = $account['user_password'];
        $User->avatar = $account['user_avatar'];
        $User->description = $account['user_description'];
        $User->linkedin = $account['user_linkedin'];
        $User->github = $account['user_github'];
        $User->token = $account['user_token'];
        $User->numero_pe = $account['user_numero_pe'];
        $User->phone = $account['user_phone'];
        $User->adress = $account['user_place'];
        $User->birth_date = $account['user_birth_date'];
        $User->birth_place = $account['user_birth_place'];
        $User->nationality = $account['user_nationality'];
        $User->status = $account['status_name'];
        $User->role = $account['role_id'];
        $User->highlight = $account['user_highlight'];
        $User->company = $account['user_company'];
        $User->cv = $account['user_cv'];

        return $User;
    }
    public function checkPassword($id, $mdp): bool
    {
        $req = "SELECT password_users FROM `user` WHERE  user_id= ?";
        $stmt = $this->bdd->prepare($req);
        $stmt->execute([$id]);
        $mdpuser = $stmt->fetch(PDO::FETCH_OBJ);
        $stmt->closeCursor();

        $mdpuser = $mdpuser->password_users;
        $mdpval = password_verify($mdp, $mdpuser);
        return $mdpval;
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