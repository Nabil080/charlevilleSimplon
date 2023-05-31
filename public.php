<?php
switch ($action) {
    case 'allFormationsPage':
        allFormationsPage();
        break;
    // Aficher la formation choisie
    case 'formationPage':
        formationPage();
        break;
    case 'promotionPage':
        promotionPage();
        break;
    // Afficher le formulaire de pré-inscription.
    case 'registerPage':
        if (!isset($_SESSION['user']))
            registerPage();
        if (isset($_SESSION['user']) && $_SESSION['user']->role_id == 5)
            CandidatePromo();
        else
            homepage();
        break;
    //afficher la page d'activation de compte
    case 'accountActivationPage':
        accountActivationPage();
        break;
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

    // Envoie du traitement du formulaire d'inscription
    case 'registerTreatment':
        registerTreatment();
        break;
    // Envoie du traitement d'activation de compte
    case 'accountActivation':
        activationAccountTreatment();
        break;
    // Envoie du traitement du formulaire de connexion
    case 'loginTreatment':
        loginTreatment();
        break;
    // Envoie du traitement pagination tous les projets
    case 'projectsPagination':
        projectsPagination();
        break;
    // Déconnexion
    case 'logOut':
        logOut();
        break;
}