<?php
$title = "Accueil";
ob_start();
?>

<!-- background -->
<section id="homepage-background" class="relative w-screen h-screen bg-cover bg-center" style="background-image: url(assets/img/homepage_image_blur.jpg);">
    <!-- overlay -->
    <div id="homepage-overlay" class="absolute w-screen h-screen bg-main-white bg-opacity-60">
        <!-- div image logo -->
        <div class="flex justify-center my-12">
            <img class="w-2/3" src="assets/img/logo.png" alt="logo simplon charleville-mézières"><h1 class="hidden">Simplon Charleville-Mézières, formations numérique</h1>
        </div>
        <!-- div titre accueil -->
        <div>
            <h2 class="w-fit mx-auto font-title font-extrabold text-3xl text-main-white">Je suis</h2>
        </div>
    </div>
</section>

<?php
$content = ob_get_clean();
require ('view/layout_home.php');
?>

