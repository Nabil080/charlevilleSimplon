<?php
switch ($action) {
    case 'allFormationsPage':
        allFormationsPage();
        break;
    // Aficher la formation choisie
    case 'formationPage':
        formationPage();
        break;
    // Afficher le formulaire de pré-inscription.

    // Afficher toutes les promos
    // Afficher la promo choisi
    // Afficher profil de l'apprennant

    // Afficher tous les projets
    // Afficher du projet choisi

    // Envoie du traitement du formulaire d'inscription
    case 'registerTreatment':
        registerTreatment();
        break;
    // Envoie du traitement d'activation de compte
    // Envoie du traitement du formulaire de connexion
}