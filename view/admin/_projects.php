<?php $title = "Projets"; ?>

<?php ob_start();

include("view/admin/crudProjet.php");
include("view/admin/modalContact.php");

$content = ob_get_clean(); ?>

<?php include 'view/layout_admin.php'; ?>