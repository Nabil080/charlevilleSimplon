<?php $title = "Promotions"; ?>

<?php ob_start();

include("view/admin/promo/crudPromotion.php");
include("view/admin/modal/modalContact.php");
include("view/admin/promo/modalAddPromotion.php");

$content = ob_get_clean(); ?>

<?php ob_start();?>
    <script src="assets/js/promo_validation.js"></script>
    <script src="assets/js/crudAjax/promo.js"></script>
<?php $script = ob_get_clean(); ?>

<?php include 'view/layout_admin.php'; ?>
