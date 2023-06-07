<?php $title = "Apprenant"; ?>

<?php ob_start();

include("view/admin/apprenant/crudApprenant.php");
include("view/admin/modal/modalContact.php");

$content = ob_get_clean(); ?>

<?php ob_start();?>
    <script src="assets/js/crudAjax/learner.js"></script>
<?php $script = ob_get_clean(); ?>

<?php include 'view/layout_admin.php'; ?>