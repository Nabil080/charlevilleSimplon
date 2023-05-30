<?php
session_start();
require_once 'src/controller/frontController.php';
require 'src/controller/back/UserController.php';
require 'src/model/ConnectBdd.php';

// TEMP POUR TEST SANS CONNEXION
$user = new UsersRepository();
$_SESSION['user'] = $user->getUserById(2);

if (isset($_GET['action']) && $_GET['action'] !== '' && !isset($_GET['admin'])) {
    $action = $_GET['action'];
    require 'public.php';

    if (isset($_SESSION['user'])) {
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
                if ($_SESSION['user']->role->id == 1) {
                    require 'admin.php';
                }
            }
        }
    }
} else {
    homepage();
}

