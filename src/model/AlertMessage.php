<?php class AlertMessage
{
    private $type;
    private $name;
    private $location;
    public $message;

    private $alertMessage = 'assets/json/alertMessage.json';

    //<p id="$nameid_error" class="error mt-2 text-sm text-red-600"></p>
    //<p id="content_success" class="success mt-2 text-sm text-green-600"></p>

    public function getError($location, $error, $boolNavbar = null)
    {
        $this->type = 'errorMessage';
        $this->location = $location . '_error';
        $this->name = $error;

        $message = $this->getMessage();
        $this->message = $message;

        $test = [
            'successMessage' => 0,
            'location' => $this->location,
            'message' => $this->message,
        ];
        return $test;
    }
    public function getSuccess($success, $boolNavbar = null)
    {
        $this->type = 'successMessage';
        $this->location = 'content_succes';
        $this->name = $success;

        $message = $this->getMessage();

        $file_path = 'view/template/_succesMessage.php';
        $succesMessage = '';

        // Vérifie si le fichier existe
        if (file_exists($file_path)) {
            // Lit le contenu du fichier
            $succesMessage = file_get_contents($file_path);

            // Insère le message prédéfini dans l'élément avec l'ID "content_success"
            $succesMessage = str_replace(
                '<div id="content_success" class="ml-3 text-sm font-medium">',
                '<div id="content_success" class="ml-3 text-sm font-medium">' . $message,
                $succesMessage
            );

        } else {
            echo 'Le fichier n\'existe pas.';
        }



        $test = [
            'successMessage' => 1,
            'location' => $this->location,
            'message' => $succesMessage,
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