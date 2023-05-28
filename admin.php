<?php

switch ($action) {
    // Afficher le tableau de bord prospects
    case 'crudCandidatePage':
        crudCandidatePage();
        break;
    case 'crudLearnerPage':
        crudLearnerPage();
        break;
    // Afficher le tableau de bord Entreprises
    case 'crudCompanyPage':
        crudCompanyPage();
        break;
    // Afficher le tableau de bord Promotions
    case 'crudPromotionPage':
        crudPromotionPage();
        break;
    // Afficher le tableau de bord Projets
    case 'crudProjetPage':
        crudProjetPage();
        break;
    // Afficher le CRUD users choisie
    // Afficher le CRUD des formations
    // Afficher le CRUD des promos(candidature apprennant)


    // Traitement formulaire de CONTACT
    case 'contactUsers':
        contactUsers();
        break;
}