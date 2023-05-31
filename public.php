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
        registerPage();
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
    // Envoie du traitement d'activation de compte
    // Envoie du traitement du formulaire de connexion

    // Envoie du traitement pagination tous les projets
    case 'projectsPagination':
        projectsPagination();
        break;
}