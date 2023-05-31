<?php
session_start();
//session_destroy();
require 'src/model/ConnectBdd.php';
// var_dump($_SESSION);

if (isset($_GET['action']) && $_GET['action'] !== '' && !isset($_GET['admin'])) {
    $action = $_GET['action'];
    require 'public.php';
    if (isset($_SESSION['user'])) {
        if ($_SESSION['user']->role_id >= 4) {
            switch ($action) {
                // Afficher son profil perso
                case 'myProfile':
                    myProfile();
                    break;
            }
            if ($_SESSION['user']->role->id <= 3) {
            switch ($action) {
                // Afficher le CRUD de projet (Gestion de projet)
                case 'projectGestionPage':
                    projectGestionPage();
                    break;

                // Afficher le formulaire d'ajout de projet
                case 'addProject':
                    projectFormPage();
                    break;
                // Afficher le formulaire de modification du projet

                // Envoi du formulaire d'ajoute de projet
                // Envoi du formulaire de moficiation de projet
            }
            if ($_SESSION['user']->role->id <= 2) {

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
