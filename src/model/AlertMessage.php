<?php class AlertMessage
{
    private $type;
    private $name;
    private $location;
    public $message;
    private $alertMessage = 'assets/json/alertMessage.json';
    private $styleSucces = "mb-2 p-2 border-2 border-green-700 rounded-lg bg-green-200 text-green-500";
    private $styleError = "mb-2 p-2 border-2 border-red-700 rounded-lg bg-red-200 text-red-500";
    private $file_errorMessage = 'view/template/_errorMessage.php';
    private $file_succesMessage = 'view/template/_succesMessage.php';


    // <p id="{ID_input}_error" class="errorAlert"></p>

    // $error correspond au "name" dans alertMessage.json
    // $boolNavbar correspond à un boolean si c'est dans la navbar ou pas
    // $location correspond à la localisation : 'login', 'forget, 'nom de l'input' 
    // Si $location = null, alors il sera au dessus du bouton du formulaire


    public function getError($error, $boolNavbar, $location = null)
    {
        $redirection = null;

        // Récupérer Message
        $this->type = 'errorMessage';
        $this->name = $error;
        $where = 'button';

        // Récupérer le lieu du message
        if ($boolNavbar == false) {
            switch ($location) {
                case 'login':
                    $this->location = ".login_alertMessage";
                    break;
                case 'forget':
                    $this->location = ".forget_alertMessage";
                    break;
                case null:
                    $this->location = '.alertButton';
                    break;
                default:
                    $where = 'input';
                    $this->location = "#" . $location . "_error";
            }

        }


        // Création du message
        $this->message = $this->getMessage();
        if ($boolNavbar == true) {
            if (file_exists($this->file_errorMessage)) {
                // Lit le contenu du fichier
                $succesMessage = file_get_contents($this->file_errorMessage);

                // Insère le message prédéfini dans l'élément avec l'ID "content_success"
                $succesMessage = str_replace(
                    '<div id="content_error" class="ml-3 text-sm font-medium">',
                    '<div id="content_error" class="ml-3 text-sm font-medium"><span class="font-bold">Erreur</span><br>' . $this->message,
                    $succesMessage
                );
                $this->message = $succesMessage;
                $_SESSION['alertMessage'] = $this->message;
            }
        } else {
            $this->message = "<p class='alertMessage " . $this->styleError . "'>" . $this->message . "<p>";
        }
        //Envoyer l'alert
        $alert = [
            'successMessage' => 0,
            'location' => $this->location,
            'message' => $this->message,
            'navbar' => $boolNavbar,
            'where' => $where,
            'redirection' => $redirection
        ];
        return $alert;
    }

    public function getSuccess($success, $boolNavbar, $location = null)
    {
        $redirection = null;
        // Récupérer Message
        $this->type = 'successMessage';
        $this->name = $success;
        $this->message = $this->getMessage();

        // Récupérer le lieu du message
        if ($boolNavbar == false) {
            // Au dessus du bouton

            switch ($location) {
                case 'login':
                    $this->location = ".login_alertMessage";
                    break;
                case 'forget':
                    $this->location = ".forget_alertMessage";
                    break;
                default:
                    $this->location = '.alertButton';
            }
        } else if ($location == 'login') {
            $redirection = 'login';
        }

        // Création du message
        $this->message = $this->getMessage();

        if ($boolNavbar == true) {
            if (file_exists($this->file_succesMessage)) {
                // Lit le contenu du fichier
                $errorMessage = file_get_contents($this->file_succesMessage);

                // Insère le message prédéfini dans l'élément avec l'ID "content_success"
                $errorMessage = str_replace(
                    '<div id="content_success" class="ml-3 text-sm font-medium">',
                    '<div id="content_success" class="ml-3 text-sm font-medium"><span class="font-bold">Succès</span><br>' . $this->message,
                    $errorMessage
                );
                $this->message = $errorMessage;
                $_SESSION['alertMessage'] = $this->message;
            }
        } else {
            $this->message = "<p class='" . $this->styleSucces . "'>" . $this->message . "<p>";
        }

        //Envoyer
        $alert = [
            'successMessage' => 1,
            'location' => $this->location,
            'message' => $this->message,
            'navbar' => $boolNavbar,
            'redirection' => $redirection
        ];
        return $alert;

    }

    private function getMessage()
    {
        $data = json_decode(file_get_contents($this->alertMessage), true);

        foreach ($data[$this->type] as $row) {
            if ($row['name'] == $this->name) {
                return $row['message'];
            }
        }
        return 'erreur Inconnue';
    }
}