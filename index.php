<?php
session_start();
require 'src/model/ConnectBdd.php';

$userRepository = new UsersRepository;
$_SESSION['user'] = $userRepository->getUserByid(6);
// var_dump($_SESSION);

if (isset($_GET['action']) && $_GET['action'] !== '' && !isset($_GET['admin'])) {
    $action = $_GET['action'];
    require 'public.php';

    if (isset($_SESSION['user'])) {
        if ($_SESSION['user']->role->id >=4) {
            switch ($action) {
                // Afficher son profil perso
                case 'myProfile':
                    myProfile();
                    break;
            }
        }
        else if ($_SESSION['user']->role->id <= 3) {
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

// $repo = new ProjectRepository;
// $data = $repo->getProjectsDate();
// var_dump($data);