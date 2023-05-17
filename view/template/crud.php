<?php $title = "Crud"; ?>

<?php ob_start(); ?>

<main >
    <?php include ("crudInclude/_navbarCrud.php"); ?>
  <!--TABLE-->
    <?php 
    if (isset($candidatPage) && $candidatPage == 1) {
        include ("crudInclude/_crudCandidat.php");
        include ("crudInclude/_modalInfos.php");
        include ("crudInclude/_modalCandidature.php");

    }

    if (isset($apprenantPage)  && $apprenantPage == 1) {

      include ("crudInclude/_crudApprenant.php");
      include ("crudInclude/_modalInfos.php");
      include ("crudInclude/_modalProjet.php");
    }

    if (isset($entreprisePage)  && $entreprisePage == 1) {

      include ("crudInclude/_crudEntreprise.php");
      include ("crudInclude/_modalInfos.php");
      include ("crudInclude/_modalProjet.php");
    }
    
    if (isset($promotionPage)  && $promotionPage == 1) {

      include ("crudInclude/_crudPromotion.php");
      include ("crudInclude/_modalApprenant.php");
      include ("crudInclude/_modalFormateur.php");
      include ("crudInclude/_modalProjet.php");
    }

    if (isset($projetPage)  && $projetPage == 1) {

      include ("crudInclude/_crudProjet.php");

    }
    ?> 


</main>

<?php $content = ob_get_clean(); ?>

<?php ob_start(); ?>
<?php $link = ob_get_clean(); ?>

<?php ob_start(); ?>
<script src="assets/js/crud.js"></script>
<?php $script = ob_get_clean(); ?>

<?php require 'view/layout.php'; ?>