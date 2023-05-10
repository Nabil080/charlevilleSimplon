<?php
require_once('src/model/Formation.php');

function allFormationsPage()
{
    // $formation = new FormationsRepository();
    // $formations = $formation->getFormations();
    include 'view/template/allFormations.php';
}
function formationPage()
{
    include 'view/template/formation.php';
}