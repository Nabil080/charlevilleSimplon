<?php
require_once("src/model/Promo.php");
require_once("src/model/Formation.php");

function homepage()
{
    include 'view/public/homepage.php';
}
function contactPage()
{
    include 'view/public/contact.php';
}

// Formation 
function allFormationsPage()
{
    $formationRepository = new FormationRepository;
    $formations = $formationRepository->getAllFormations();
    include 'view/public/allFormations.php';
}

function formationPage()
{
    include 'view/public/formation.php';
}

// Project 

function projectPage()
{
    include 'view/public/project.php';
}

function allProjectsPage()
{
    $formationRepo = new FormationRepository;
    $formations = $formationRepo->getAllFormations();
    $formationsLevel = $formationRepo->getFormationLevels();

    $projectRepo = new ProjectRepository;
    $projectsDate = $projectRepo->getProjectsDate();
    include 'view/public/all_projects.php';
}

function projectGestionPage()
{
    include 'view/public/project_gestion.php';
}

// Profile
function profilePage()
{
    include 'view/public/profile.php';
}

// Promotion
function allPromotionsPage()
{
    $PromoRepository = new PromoRepository;
    $promos = $PromoRepository->getPromos();
    include 'view/public/all_promotions.php';
}
function promotionPage()
{
    if (isset($_GET['id_promo'])) {
        $id = $_GET['id_promo'];
    } else {
        $id = 1;
    }
    $PromoRepository = new PromoRepository;
    $promo = $PromoRepository->getPromoById($id);
    $apprenants = $PromoRepository->getAllApprenants($id);
    $formateurs = $PromoRepository->getAllFormateurs($id);
    $allProjects = $PromoRepository->getPromoProjects($id);
    include 'view/public/promotion.php';
}

// Register
function registerPage()
{
    include 'view/public/register.php';
}


// ==================  Admin  ======================

function crudCandidatePage()
{
    $UserRepo = new UsersRepository;
    $candidates = $UserRepo->getAllCandidates();

    include 'view/admin/_candidate.php';
}

function crudLearnerPage()
{
    $UserRepo = new UsersRepository;
    $learners = $UserRepo->getAllLearners();
    $formators = $UserRepo->getAllFormators();
    $PromoRepo = new PromoRepository;
    $promos = $PromoRepo->getActivePromos();

    include 'view/admin/_learner.php';
}

function crudCompanyPage()
{
    $UserRepo = new UsersRepository;
    $companies = $UserRepo->getAllCompanies();
    include 'view/admin/_company.php';
}

function crudPromotionPage()
{
    $PromoRepo = new PromoRepository;
    $promos = $PromoRepo->getPromos();

    $UserRepo = new UsersRepository;
    $FormationRepo = new FormationRepository;
    $formators = $UserRepo->getAllFormators();
    $formations = $FormationRepo->getAllFormations();

    include 'view/admin/_promotions.php';
}

function crudProjetPage()
{
    $ProjectRepo = new ProjectRepository;
    $projects = $ProjectRepo->getAllProjects();
    $PromoRepo = new PromoRepository;
    $promos = $PromoRepo->getActivePromos();
    include 'view/admin/_projects.php';
}

function projectFormPage() {
    include 'view/admin/projectAddForm.php';
}