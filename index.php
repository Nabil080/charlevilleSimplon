<?php
session_start();
// session_destroy();
require 'src/model/ConnectBdd.php';
// var_dump($_SESSION['user']);
// $_SESSION['user'] = (object) array(
//     'user_id' => 1,
//     'status_id' => 1,
//     'role_id' => 1,
// );

// var_dump($_SESSION);
// TEMP POUR TEST SANS CONNEXION
// $_SESSION['user'] = (object) array(
//     'user_id' => 1,
//     'role_id' => 5,
//     'status_id' => 2
// );

if (isset($_GET['action']) && $_GET['action'] !== '' && !isset($_GET['admin'])) {
    $action = $_GET['action'];
    require 'public.php';


    if (isset($_SESSION['user'])) {
        if ($_SESSION['user']->role_id == 2 || $_SESSION['user']->role_id > 3) {
            switch ($action) {
                // Afficher son profil perso
                case 'myProfile':
                    myProfile();
                    break;
            }

        }


            if ($_SESSION['user']->role_id <= 3) {
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

                    // Envoi du formulaire d'ajout de projet
                    case 'addProjectTraitement':
                        addProjectTraitement();
                        break;
                    // Envoi du formulaire de moficiation de projet
                    case 'updateProjectTraitement':
                        updateProjectTraitement();
                        break;
                }
            }
            if ($_SESSION['user']->role_id <= 2) {
                switch ($action) {
                    // Envoie du formulaire de modification de projet (version modal)
                    // Envoi de la demande de suppression de projet

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
    } else {
        // homepage();
    }
} else {
    homepage();
}

// $repo = new ProjectRepository;
// $data = $repo->getAllProjects();
// var_dump($data);

// $connect = new ConnectBdd;
// $req = $connect->bdd->prepare("INSERT INTO `project` (`project_id`, `project_name`, `project_description`, `project_file`, `project_notes`, `project_github`, `project_company_image`, `project_model_image`, `project_model_link`, `user_id`, `user_id_project_formator`, `status_id`, `promo_id`, `type_id`, `project_start`, `project_end`, `project_company_name`, `project_company_adress`, `project_company_link`, `formation_id`) VALUES (NULL, 'Un projet pour tester le chargement de la bdd', 'Je fous 20k projets dans la BDD pour voir combien de temps le fetch des data prends, blabla sinon vous ça va ? Moi ça va super bien cool de fou malade youhou eh ho matelot', 'upload/pdf/test.pdf', 'Salut les notes des apprenants', 'https://github.com/SirLauvel/charlevilleSimplon', 'upload/company_logo/test.jpg', 'upload/model/test.jpg', 'https://mockittapp.wondershare.com/proto/design/pb2lf6ool73aqhpc8', '3', '1', '9', '2', '1', '2023-06-01', '2023-06-30', 'Simplon', '8 rue des Caraïbes', 'simplon.co', '1');");
// for ($i = 0; $i < 100;$i++){
//     $req->execute();
// }