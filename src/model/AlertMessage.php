<?php class AlertMessage
{
    public $type;
    public $error;
    public $location;
    public $message;

    public function getError($name, $error)
    {
        $this->type = 'errorMessage';
        $this->location = $name;
        $this->error = $error;

        $message = $this->errorAlert();
        $this->message = $message;

        $test = [
            'location' => $this->location,
            'message' => $this->message,
        ];
        return $test;
    }

    private function errorAlert()
    {
        $message = $this->getMessage();
        $location = $this->location;

        $alert = '<p id="' . $location . '_error" class="mt-2 text-sm text-red-600 dark:text-red-500">' . $message . '</p>';
        return $alert;

    }
    private function getMessage()
    {
        $messageData = file_get_contents('assets/json/alertMessage.json');
        $data = json_decode($messageData, true);

        foreach ($data[$this->type] as $row) {
            if ($row['name'] == $this->error) {
                return $row['message'];
            }
        }
        return 'erreur Inconnue';
    }

}