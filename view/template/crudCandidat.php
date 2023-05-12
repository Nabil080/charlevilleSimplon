<?php $title = "Crud"; ?>

<?php ob_start(); ?>

<main >
    <?php include ("crudInclude/_navbarCrud.php"); ?>
  <!--TABLE-->
    <?php if (isset($candidatPage)) {
        include ("crudInclude/_modalCandidat.php");

        include ("crudInclude/_crudCandidat.php");

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