<?php $title = ""; ?>

<?php ob_start(); ?>


<?php $content = ob_get_clean(); ?>



<?php ob_start(); ?>
<script src="assets/js/ajax_register.js"></script>
<?php $script = ob_get_clean(); ?>

<?php require 'view/layout.php'; ?>