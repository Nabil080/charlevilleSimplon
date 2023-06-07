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
    // Afficher le CRUD des formations
    // Afficher le CRUD des promos(candidature apprennant)

    // Traitement udpdate FORMATION
    case 'updateFormationElement':
        updateFormation();
        break;
    // Envoie du traitement pagination crud candidat
    case 'candidatePagination':
        candidatePagination();
        break;
    // Envoie du traitement pagination crud candidat
    case 'learnerPagination':
        learnerPagination();
        break;
    // Envoie du traitement pagination crud candidat
    case 'companyPagination':
        companyPagination();
        break;
    // Envoie du traitement pagination crud candidat
    case 'projectPagination':
        projectPagination();
        break;
    // Envoie du traitement pagination crud candidat
    case 'promotionPagination':
        promotionPagination();
        break;
    // Traitement formulaire de CONTACT
    case 'contactUsers':
        contactUsers();
        break;

    // Traitement suppression CANDIDAT
    case 'deleteCandidate':
        deleteCandidate();
        break;

    // Traitement suppression APPRENANT
    case 'deleteLearner':
        deleteLearner();
        break;

    // Traitement modification USER
    case 'updateUserPersonnalInfos':
        updateUserPersonnalInfos();
        break;

    // Traitement suppression totale USER
    case 'deleteUser':
        deleteUser();
        break;

    // Traitement suppression PROJET
    case 'deleteProject':
        deleteProject();
        break;

    // Traitement suppression PROMOTION
    case 'deletePromotion':
        deletePromotion();
        break;

    // Traitement assigner un FORMATEUR
    case 'assignFormator':
        assignFormator();
        break;

    // Traitement valider une PROMOTION
    case 'validatePromotion':
        validatePromotion();
        break;

    // Traitement ajout de PROMOTION
    case 'addPromotion':
        addPromotion();
        break;

    // Traitement update de PROMOTION
    case 'updatePromotion';
        updatePromotion();
        break;

    // Traitment assignation de PROJET
    case 'assignProject':
        assignProject();
        break;
    // Validation projet

}