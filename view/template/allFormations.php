<?php
$title = "Toutes nos formations";
?>

<?php ob_start(); ?>

<div class="section-cards bg-main-white"></div>
    <div class="key_numbers">

    </div>
    <h1 class="text-main-red font-main text-center text-[24px]">Les formations de <span class="italic">Simplon Charleville</span></h1>


<?php $content = ob_get_clean(); ?>

<?php require 'view/layout.php'; ?>