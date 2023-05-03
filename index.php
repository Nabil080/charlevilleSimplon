<?php
session_start();
require_once 'src/controller/frontController.php';
require 'src/controller/back/UsersController.php';

if (isset($_GET['action']) && $_GET['action'] !== '' && !isset($_GET['admin'])) {
    $action = $_GET['action'];
    require 'public.php';

    if (isset($_SESSION['user'])) {
        if ($_SESSION['user']['role'] <= 4) {
            switch ($action) {
                // Afficher le CRUD de projet (Gestion de projet)

                // Afficher le formulaire d'ajout de projet
                // Afficher le formulaire de modification du projet

                // Envoi du formulaire d'ajoute de projet
                // Envoi du formulaire de moficiation de projet
            }
            if ($_SESSION['user']['role'] <= 2) {
                switch ($action) {
                    // Envoie du formulaire de modification de projet (version modal)
                    // Envoi de la demande de suppression de projet
                }
                if ($_SESSION['user']['role'] == 1) {
                    $admin = $_GET['admin'];
                }
            }
        }
    }
} else {
    registrationForm();
}