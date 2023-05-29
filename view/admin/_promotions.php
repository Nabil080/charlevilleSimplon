<?php $title = "Promotions"; ?>

<?php ob_start();

include("view/admin/crudPromotion.php");
include("view/admin/modalContact.php");

$content = ob_get_clean(); ?>

<?php ob_start();?>

<script src="assets/js/promo_validation.js"></script>

<?php $script = ob_get_clean(); ?>
<?php include 'view/layout_admin.php'; ?>
