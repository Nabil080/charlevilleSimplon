<?php $title = "Projets"; ?>

<?php ob_start();

include("view/admin/projet/crudProjet.php");
include("view/admin/modal/modalContact.php");

$content = ob_get_clean(); ?>

<?php ob_start();?>
    <script src="assets/js/crudAjax/project.js"></script>
<?php $script = ob_get_clean(); ?>

<?php include 'view/layout_admin.php'; ?>