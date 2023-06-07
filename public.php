<?php

// // TEMP POUR TEST SANS CONNEXION
// $user = new UserRepository();
// $_SESSION['user'] = $user->getUserById(2);

switch ($action) {
    case 'allFormationsPage':
        allFormationsPage();
        break;
    // Afficher la formation choisie
    case 'formationPage':
        formationPage();
        break;
    case 'promotionPage':
        promotionPage();
        break;
    // Afficher le formulaire de pré-inscription.
    case 'registerPage':
        if (!isset($_SESSION['user'])) {
            registerPage();
            break;
        } elseif (isset($_SESSION['user']) && $_SESSION['user']->role_id == 5) {
            CandidatePromo();
            break;
        } else {
            homepage();
            break;
        }

    // Afficher toutes les promos
    case 'allPromotionsPage':
        allPromotionsPage();
        break;
    // Afficher la promo choisi
    // Afficher profil de l'apprennant
    case 'profilePage':
        profilePage();
        break;
    // Afficher tous les projets
    case 'allProjectsPage':
        allProjectsPage();
        break;
    // Afficher le projet choisi
    case 'projectPage':
        projectPage();
        break;
    // Afficher la page contact
    case 'contactPage':
        contactPage();
        break;
    //afficher la page d'activation de compte
    case 'accountActivationPage':
        accountActivationPage();
        break;
    case 'resetPasswordForm':
        resetPasswordForm();
        break;

    // Traitement de la partie Compte
    case 'registerTreatment':
        registerTreatment();
        break;

    // Gestions projet
    case 'validationProjectTreatment':
        validationProjectTreatment();
        break;
    case 'assignTeamToProject':
        assignTeamToProject();
        break;
    case 'reSubmitProject':
        reSubmitProject();
        break;
    // Gestion projet personnel
    case 'updateProjectElement':
        updateProjectElement();
        break;
    // Envoie du traitement d'activation de compte
    // Envoie du traitement du formulaire de connexion
    // Envoie du traitement des filtres toutes les promos par années
    case 'promosFilter':
        promosFilter();
        break;

    case 'accountActivation':
        activationAccountTreatment();
        break;
    case 'sendMailResetPasswordTreatment':
        sendMailResetPasswordTreatment();
        break;
    case 'resetPasswordTreatment':
        resetPasswordTreatment();
        break;
    case 'loginTreatment':
        loginTreatment();
        break;
    case 'logOut':
        logOut();
        break;
    // Envoie du traitement pagination tous les projets
    case 'allProjectsPagination':
        allProjectsPagination();
        break;
    //Traitement d'envoie de message
    case 'contactTreatment':
        contactTreatment();
        break;
}