<?php

class Ability
{
    private $admin = 1;
    private $former = 2;
    private $company = 3;
    private $leaner = 4;
    private $prospect = 5;
    public $file_Permission = 'assets/json/permission.json';
    public function authorizationRequest($page, $action, $id_author = null, $group = null)
    {
        $id_role = (isset($_SESSION['user'])) ? (int) $_SESSION['user']->role_id : null;

        if (file_exists($this->file_Permission)) {
            $data_permission = json_decode(file_get_contents($this->file_Permission), true);

            $req = $data_permission[$page][$action];

            switch ($req) {
                case 'public':
                    return true;
                case 'author':
                    return ($id_role = $id_author) ? true : false;
                case 'admin':
                    return ($id_role == $this->admin) ? true : false;
                default:
                    return false;
            }
        }
    }
}