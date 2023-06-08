<?php
require_once 'src/controller/frontController.php';
require_once 'src/controller/back/userController.php';
require_once 'src/controller/back/promotionController.php';
require_once 'src/controller/back/projectController.php';
require_once 'src/controller/back/contactController.php';
require_once 'src/controller/back/formationController.php';
require_once 'assets/php/function.php';
class ConnectBdd
{
    public $bdd;

    public function __construct()
    {
        $user = "root";
        $pass = "";
        $host = "localhost";
        $db = "simplon_charleville";
        // $user = "dbu5557170";
        // $pass = "p6V4yrM2";
        // $host = "db5011786821.hosting-data.io";
        // $db = "dbs9928735";
        $this->bdd = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $pass, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    }
}
require_once('src/model/Activity.php');
require_once('src/model/AlertMessage.php');
require_once('src/model/Certification.php');
require_once('src/model/Fee.php');
require_once('src/model/Formation.php');
require_once('src/model/Job.php');
require_once('src/model/Program.php');
require_once('src/model/ProgramLayout.php');
require_once('src/model/Progress.php');
require_once('src/model/Project.php');
require_once('src/model/Promo.php');
require_once('src/model/Requirement.php');
require_once('src/model/Role.php');
require_once('src/model/Skill.php');
require_once('src/model/Stat.php');
require_once('src/model/Status.php');
require_once('src/model/Tag.php');
require_once('src/model/Type.php');
require_once('src/model/User.php');