<?php $title = "Candidature"; ?>

<?php ob_start();

include("view/admin/crudCandidat.php");

$content = ob_get_clean(); ?>

<?php include 'view/layout_admin.php'; ?>