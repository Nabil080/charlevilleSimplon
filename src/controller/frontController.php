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
