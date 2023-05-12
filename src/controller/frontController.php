<?php
require_once('src/model/Formation.php');


function homepage()
{
    include 'view/template/homepage.php';
}

function seeLayout()
{
    include 'view/layout.php';
}
function allFormationsPage()
{
    include 'view/template/allFormation.php';
}
function formationPage()
{
    include 'view/template/formation.php';
}

function projectPage()
{
    include 'view/template/project.php';
}

function allProjectsPage()
{
    include 'view/template/all_projects.php';
}

function allPromotionsPage()
{
    include 'view/template/all_promotions.php';
}
function promotionPage()
{
    include 'view/template/promotion.php';
}

function contactPage()
{
    include 'view/template/contact.php';
}

function crudCandidatPage()
{
    $candidatPage = 1;
    include 'view/template/crud.php';

}

function crudApprenantPage() 
{
    $apprenantPage = 1;
    include 'view/template/crud.php';
}

function crudEntreprisePage() 
{
    $entreprisePage = 1;
    include 'view/template/crud.php';
}

function crudPromotionPage() 
{
    $promotionPage = 1;
    include 'view/template/crud.php';
}

function crudProjetPage() 
{
    $projetPage = 1;
    include 'view/template/crud.php';
}