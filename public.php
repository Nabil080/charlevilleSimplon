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

    // Afficher toutes les promos
    // Afficher la promo choisi
    // Afficher profil de l'apprennant

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
    // Envoie du traitement du formulaire de connexion
}