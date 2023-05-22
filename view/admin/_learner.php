<?php $title = "Apprenant"; ?>

<?php ob_start();

include("view/admin/crudApprenant.php");
include("view/admin/modalInfos.php");
include("view/admin/modalProjet.php");
include("view/admin/modalContact.php");

$content = ob_get_clean(); ?>

<?php include 'view/layout_admin.php'; ?>