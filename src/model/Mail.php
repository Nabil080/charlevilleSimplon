<?php
require_once 'src/model/ConnectBdd.php';

class Mail
{
    private $sender = "Simplon.co@charleville-mezieres.com";
    private $emailSupport = "ducret.bryan@gmail.com";
    private $to;
    private $subject = 'Message envoyé depuis contact';
    private $message;
    private $signature = "Cordialement,\r\n L'équipe de Simplon.Co";

    public function __construct($message, $to, $email = null, $name = null, $surname = null)
    {
        $this->$to = $to;

        //contact 
        if ($email !== null) {
            $this->sender = $email;
            $this->to = $this->emailSupport;
        }
        // Message d'activation & reset
        if ($name !== null && $surname !== null) {
            $this->signature = "\r\n\r\nCordialement,\r\n" . $name . " " . $surname;
        }
        $this->$message = $message . $this->signature;
    }

    public function getSender()
    {
        return $this->sender;
    }
    public function getTo()
    {
        return $this->to;
    }
    public function getSubject()
    {
        return $this->subject;
    }
    public function getMessage()
    {
        return $this->message;
    }
    public function getSignature()
    {
        return $this->signature;
    }
}

class MailRepository extends ConnectBdd
{

    private $token;

    private function generateToken($length = 32): void
    {
        $this->token = bin2hex(random_bytes($length));
    }
    public function getToken(): string
    {
        return $this->token;
    }


    public function sendMail(Mail $Mail): void
    {
        $to = $Mail->getTo();
        $sender = $Mail->getSender();
        $subject = $Mail->getSubject();
        $message = $Mail->getMessage();

        $headers = "From: $sender()\r\n";
        $headers .= "Reply-To: $sender\r\n";
        $headers .= "Content-Type: text/plain; charset=utf-8\r\n";
        mail($to, $subject, $message, $headers);
    }


    public function sendMailActivationAccount($email): void
    {
        $Mail = new Mail('', $email);
        $sender = $Mail->getSender();
        $signature = $Mail->getSignature();
        $this->generateToken();

        $to = $Mail->getTo();
        $subject = "Confirmation de votre inscription";
        $message = "Bonjour,\r\n\r\n
            Pour activer votre compte, veuillez cliquer sur le lien ci-dessous : \r\n\r\n
            http://localhost/projet_dev_v2/index.php?action=registerPage&token=$this->token\r\n\r\n
            " . $signature;
        $headers = "From: $sender\r\n";
        $headers .= "Reply-To: $sender\r\n";
        $headers .= "Content-Type: text/plain; charset=utf-8\r\n";
        mail($to, $subject, $message, $headers);
    }
    public function sendMailResetPassword($email): void
    {
        $Mail = new Mail('', $email);
        $sender = $Mail->getSender();
        $signature = $Mail->getSignature();
        $this->generateToken();

        $to = $Mail->getTo();
        $subject = "Demande de changement de mot de passe";
        $message = "Bonjour,\r\n\r\n

            Pour changer votre mot de passe, veuillez cliquer sur le lien ci-dessous : \r\n\r\n
            http://localhost/projet_dev_v2/index.php?action=resetPasswordForm&token=$this->token\r\n\r\n
            Si vous n'êtes pas à l'origine de cette demande, il vous suffit d'ignorer ce message. \r\n\r\n
            " . $signature;
        $headers = "From: $sender\r\n";
        $headers .= "Reply-To: $sender\r\n";
        $headers .= "Content-Type: text/plain; charset=utf-8\r\n";
        mail($to, $subject, $message, $headers);
    }
}