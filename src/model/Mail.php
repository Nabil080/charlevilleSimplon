<?php
require_once 'src/model/ConnectBdd.php';

class Mail
{
    private $sender = "Simplon.co@charleville-mezieres.com";
    private $to;
    private $subject;
    private $message;
    private $signature = "Cordialement,\r\n L'équipe de Simplon.Co";
    private $token;


    private function generateToken($length = 32): void
    {
        $this->token = bin2hex(random_bytes($length));
    }


    public function setMail($to, $subject, $message): void
    {
        $this->$to = $to;
        $this->subject = $subject;
        $this->$message = $message;
    }
    public function sendMail($to, $subject, $message): void
    {
        $headers = "From: $this->sender\r\n";
        $headers .= "Reply-To: $this->sender\r\n";
        $headers .= "Content-Type: text/plain; charset=utf-8\r\n";
        //mail($to, $subject, $message, $headers);
    }

    public function getToken(): string
    {
        return $this->token;
    }
    public function sendMailActivationAccount($email): void
    {
        $this->generateToken();
        $to = $email;
        $subject = "Confirmation de votre inscription";
        $message = "Bonjour,\r\n\r\n
            Pour activer votre compte, veuillez cliquer sur le lien ci-dessous : \r\n\r\n
            http://localhost/projet_dev_v2/index.php?action=registerPage&token=$this->token\r\n\r\n
            " . $this->signature;
        $headers = "From: $this->sender\r\n";
        $headers .= "Reply-To: $this->sender\r\n";
        $headers .= "Content-Type: text/plain; charset=utf-8\r\n";
        //mail($to, $subject, $message, $headers);
    }
    public function sendMailResetPassword($email): void
    {
        $this->generateToken();
        $to = $email;
        $subject = "Confirmation de votre inscription";
        $message = "Bonjour,\r\n\r\n

            Pour changer votre mot de passe, veuillez cliquer sur le lien ci-dessous : \r\n\r\n
            http://localhost/projet_dev_v2/index.php?action=resetPasswordForm&token=$this->token\r\n\r\n
            " . $this->signature;
        $headers = "From: $this->sender\r\n";
        $headers .= "Reply-To: $this->sender\r\n";
        $headers .= "Content-Type: text/plain; charset=utf-8\r\n";
        //mail($to, $subject, $message, $headers);
    }

}