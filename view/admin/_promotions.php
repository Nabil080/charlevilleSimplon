<?php $title = "Promotions"; ?>

<?php ob_start();

include("view/admin/crudPromotion.php");
include("view/admin/modalApprenant.php");
include("view/admin/modalFormateur.php");
include("view/admin/modalValidationPromo.php");
include("view/admin/modalProjet.php");
include("view/admin/modalContact.php");

$content = ob_get_clean(); ?>

<?php include 'view/layout_admin.php'; ?>
