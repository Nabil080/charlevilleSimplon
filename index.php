<?php
session_start();
//session_destroy();
//require_once 'src/helper/autoloader.php';
require_once 'src/controller/frontController.php';
require 'src/controller/back/UserController.php';

// require 'src/model/ConnectBdd.php';
// var_dump($_SESSION);

if (isset($_GET['action']) && $_GET['action'] !== '' && !isset($_GET['admin'])) {
    $action = $_GET['action'];
    require 'public.php';
    if (isset($_SESSION['user'])) {
        if ($_SESSION['user']->role_id <= 4) {
            switch ($action) {
                // Afficher son profil perso
            }
        } else if ($_SESSION['user']->role_id <= 3) {
            switch ($action) {
                // Afficher le CRUD de projet (Gestion de projet)
                case 'projectGestionPage':
                    projectGestionPage();
                    break;

                // Afficher le formulaire d'ajout de projet
                // Afficher le formulaire de modification du projet

                // Envoi du formulaire d'ajoute de projet
                // Envoi du formulaire de moficiation de projet
            }
            if ($_SESSION['user']->role_id <= 2) {
                switch ($action) {
                    // Envoie du formulaire de modification de projet (version modal)
                    // Envoi de la demande de suppression de projet
                }
                if ($_SESSION['user']->role_id == 1) {

                    require 'admin.php';
                }
            }
        }
    }
} else {
    homepage();
}