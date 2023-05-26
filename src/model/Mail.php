<?php
require_once 'src/model/ConnectBdd.php';

class Mail
{
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

class MailRepository extends ConnectBdd
{

}