<?php $title = "Promotions"; ?>

<?php ob_start();

include("view/admin/crudPromotion.php");
include("view/admin/modalContact.php");

$content = ob_get_clean(); ?>

<?php include 'view/layout_admin.php'; ?>
