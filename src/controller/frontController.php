<?php
require_once('src/model/Formation.php');


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
    include 'view/public/all_projects.php';
}

function projectGestionPage()
{
    include 'view/public/project_gestion.php';
}

// Promotion
function allPromotionsPage()
{
    include 'view/public/all_promotions.php';
}
function promotionPage()
{
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
    include 'view/admin/_candidate.php';
}

function crudLearnerPage()
{
    include 'view/admin/_learner.php';
}

function crudCompanyPage()
{
    include 'view/admin/_company.php';
}

function crudPromotionPage()
{
    include 'view/admin/_promotions.php';
}

function crudProjetPage()
{
    include 'view/admin/_projects.php';
}