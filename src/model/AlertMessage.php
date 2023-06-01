<?php class AlertMessage
{
    private $type;
    private $name;
    private $location;
    public $message;

    private $alertMessage = 'assets/json/alertMessage.json';
    private $styleSucces = "p-2 border-2 border-green-700 rounded-lg bg-green-200 text-green-500";
    private $styleError = "p-2 border-2 border-red-700 rounded-lg bg-red-200 text-red-500";


    public function getError($location, $error, $boolNavbar = null)
    {
        $this->type = 'errorMessage';
        $this->name = $error;
        $this->message = $this->getMessage();

        if (!stristr($location, '_errorContent')) {
            $this->location = $location . '_error';
        } else {
            $this->location = $location;
            $this->message = "<p class='" . $this->styleError . "'>" . $this->message . "<p>";
        }

        $test = [
            'successMessage' => 0,
            'location' => $this->location,
            'message' => $this->message,
        ];
        return $test;
    }
  
    public function getSuccess($success, $navbarBool = null)
    {
        $file_path = 'view/template/_succesMessage.php';
        $this->type = 'successMessage';
        $this->name = $success;
        $this->message = $this->getMessage();


        // $navbarBool correspond à vérifier si on le met sur le content de 
        // la page (false) ou en général sur le navbar (true)
        if ($navbarBool) {
            $this->location = 'navbar_succesContent';
            if (file_exists($file_path)) {
                // Lit le contenu du fichier
                $succesMessage = file_get_contents($file_path);

                // Insère le message prédéfini dans l'élément avec l'ID "content_success"
                $succesMessage = str_replace(
                    '<div id="content_success" class="ml-3 text-sm font-medium">',
                    '<div id="content_success" class="ml-3 text-sm font-medium">' . $this->message,
                    $succesMessage
                );

            } else {
                var_dump('Le ficher n\'est pas trouvée.');
            }

        } else {
            $this->location = ($success == 'mailForgetPassword') ? 'forget_succesContent' : 'succesContent';

            $this->message = "<p class='" . $this->styleSucces . "'>" . $this->message . "<p>";
        }

        $test = [
            'successMessage' => 1,
            'location' => $this->location,
            'message' => $this->message,
        ];
        return $test;
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