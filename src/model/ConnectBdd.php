<?php
class ConnectBdd
{
    public $bdd;

    public function __construct()
    {
        $user = "dbu5557170";
        $pass = "p6V4yrM2";
        $host = "db5011786821.hosting-data.io";
        $port = '3306';
        $db = "dbs9928735";
        $this->bdd = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $pass, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    }
}