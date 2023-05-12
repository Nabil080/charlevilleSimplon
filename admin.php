<?php

switch ($admin) {
    // Afficher le tableau de bord prospects
    case 'crudCandidatPage':
        crudCandidatPage();
        break;
    // Afficher le tableau de bord Apprenants
    case 'crudApprenantPage':
        crudApprenantPage();
        break;
    // Afficher le tableau de bord Entreprises
    case 'crudEntreprisePage':
        crudEntreprisePage();
        break;
    // Afficher le tableau de bord Promotions
    case 'crudPromotionPage':
        crudPromoPage();
        break;
    // Afficher le tableau de bord Projets
    case 'crudProjetPage':
        crudProjetsPage();
        break;
    // Afficher le CRUD users choisie
    // Afficher le CRUD des formations
    // Afficher le CRUD des promos(candidature apprennant)
}