<?php
$title = "Accueil";
ob_start();
?>

<!-- background -->
<section id="homepage-background" class="relative w-screen h-screen bg-cover bg-center" style="background-image: url(assets/img/homepage_image_blur.jpg);">
    <!-- overlay -->
    <div id="homepage-overlay" class="absolute w-screen h-screen bg-main-white bg-opacity-60">
        <!-- div image logo -->
        <div class="flex justify-center my-6">
            <img class="w-2/3" src="assets/img/logo.png" alt="logo simplon charleville-mézières"><h1 class="hidden">Simplon Charleville-Mézières, formations numérique</h1>
        </div>
        <!-- div accueil -->
        <div class="w-full [&>*]:mx-auto relative
        [&>button]:block [&>button]:bg-main-red [&>button]:w-3/4 [&>button]:py-8 [&>button]:my-12 [&>button]:border-main-white [&>button]:border-2 [&>button]:text-main-white [&>button]:font-title [&>button]:font-bold [&>button]:uppercase [&>button]:text-xl [&>button]:ease-linear [&>button]:duration-200 [&>button]:">
            <h2 class="w-fit font-title font-bold text-3xl text-main-white">Je suis</h2>
            <button type="button" class="hover:bg-main-white hover:text-main-red hover:border-main-red hover:-translate-y-4 focus:scale-110 focus:bg-red-800">Une entreprise</button>
            <button type="button" class="hover:bg-main-white hover:text-main-red hover:border-main-red hover:-translate-y-4 focus:scale-110 focus:bg-red-800">Un apprenant</button>
            <button type="button" class="hover:bg-main-white hover:text-main-red hover:border-main-red hover:-translate-y-4 focus:scale-110 focus:bg-red-800">Un visiteur</button>
            <div class="absolute -bottom-12 w-full flex justify-center"><a href="#" class="underline font-semibold">se connecter</a></div>
        </div>
    </div>
</section>

<?php
$content = ob_get_clean();
require ('view/layout_home.php');
?>

