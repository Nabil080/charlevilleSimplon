<?php class AlertMessage
{
    public $type;
    public $name;
    public $location;
    public $message;

    public function getError($location, $error)
    {
        $this->type = 'errorMessage';
        $this->location = $location;
        $this->name = $error;

        $message = $this->createAlert();
        $this->message = $message;

        $test = [
            'successMessage' => 0,
            'location' => $location,
            'message' => $this->message,
        ];
        return $test;
    }
    public function getSuccess($location, $success)
    {
        $this->type = 'successMessage';
        $this->location = $location;
        $this->name = $success;

        $message = $this->createAlert();
        $this->message = $message;

        $test = [
            'successMessage' => 1,
            'location' => $this->location,
            'message' => $this->message,
        ];
        return $test;
    }



    private function createAlert()
    {
        $message = $this->getMessage();
        $location = $this->location;
        $alert = "";

        if ($this->type == "errorMessage") {
            $alert = '<p id="' . $location . '_error" class="error mt-2 text-sm text-red-600 dark:text-red-500">' . $message . '</p>';
        } elseif ($this->type == "successMessage") {
            $alert = '<p id="' . $location . '_success" class="success mt-2 text-sm text-green-600 dark:text-green-500">' . $message . '</p>';
        }
        return $alert;

    }
    private function getMessage()
    {
        $messageData = file_get_contents('assets/json/alertMessage.json');
        $data = json_decode($messageData, true);

        foreach ($data[$this->type] as $row) {
            if ($row['name'] == $this->name) {
                return $row['message'];
            }
        }
        return 'erreur Inconnue';
    }

}