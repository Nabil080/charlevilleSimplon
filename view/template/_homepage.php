<?php
$title = "Accueil";
ob_start();
?>

<!-- background -->

<section id="homepage-background" class="relative w-screen h-screen bg-cover bg-center" style="background-image: url(assets/img/homepage_image_blur.jpg);">
<video autoplay muted loop class="h-screen hidden lg:block blur-sm absolute w-screen object-cover">
    <source src="assets/img/homepage_video.mp4" type="video/mp4">
</video>
    <!-- overlay -->
    <div id="homepage-overlay" class="absolute w-screen 2xl:px-[15%] h-screen bg-main-white bg-opacity-60">
        <!-- div image logo -->
        <div class="flex justify-center my-6 lg:my-0 sm:justify-between">
            <img class="h-60 sm:h-auto sm:w-40 sm:mx-8" src="assets/img/logo.png" alt="logo simplon charleville-mézières"><h1 class="hidden">Simplon Charleville-Mézières, formations numérique</h1>
            <div class="hidden sm:block w-fit mx-8 my-auto relative"><i class="fa fa-user text-[80px] text-main-red"></i><button class="font-main absolute -bottom-6 -right-2 underline text-main-white whitespace-nowrap">Se connecter</button></div>
        </div>
        <!-- div accueil -->
        <h1 class="hidden lg:block uppercase font-title text-main-white w-fit mx-auto -translate-y-8 text-[60px] font-bold text-center">Simplon <br> charleville-mézières</h1>
        <section id="homepage" class="ease-in duration-300 lg:mt-20 2xl:mt-36 w-full [&_*]:mx-auto relative
        [&_button]:block [&_button]:max-w-[410px] [&_button]:bg-main-red [&_button]:w-3/4 [&_button]:py-8 [&_button]:lg:py-20 [&_button]:xl:py-24  [&_button]:my-12 [&_button]:border-main-white [&_button]:border-2 [&_button]:text-main-white [&_button]:font-title [&_button]:font-bold [&_button]:uppercase [&_button]:text-xl [&_button]:lg:text-3xl [&_button]:xl:text-[40px] [&_button]:ease-linear [&_button]:duration-200">
            <h2 class="w-fit font-title font-bold text-3xl text-main-white xl:text-[46px]">Je suis</h2>
            <div class="lg:flex gap-8 px-8">
                <button onclick="companyHomepage()" type="button" class="hover:bg-main-white hover:text-main-red hover:border-main-red hover:-translate-y-4">Une entreprise</button>
                <button onclick="loginModal()" type="button" class="hover:bg-main-white hover:text-main-red hover:border-main-red hover:-translate-y-4 ">Un apprenant</button>
                <button onclick="visitorHomepage()" type="button" class="hover:bg-main-white hover:text-main-red hover:border-main-red hover:-translate-y-4 ">Un visiteur</button>
            </div>
            <div class="sm:hidden absolute -bottom-12 w-full flex justify-center"><div onclick="loginModal()" class="underline font-main cursor-pointer font-semibold">se connecter</div></div>
        </section>
        <!-- div entreprise -->
        <section id="company-homepage" class="opacity-0 hidden lg:mt-20 2xl:mt-36 ease-in duration-300 w-full [&>*]:mx-auto relative
        [&_button]:block [&_button]:max-w-[410px] [&_button]:bg-main-red [&_button]:w-3/4 [&_button]:py-8 [&_button]:lg:py-20 [&_button]:xl:py-24  [&_button]:my-12 [&_button]:border-main-white [&_button]:border-2 [&_button]:text-main-white [&_button]:font-title [&_button]:font-bold [&_button]:uppercase [&_button]:text-xl [&_button]:lg:text-3xl [&_button]:xl:text-[40px] [&_button]:ease-linear [&_button]:duration-200">
            <h2 class="absolute -top-12 w-full text-center font-title font-bold text-3xl text-main-white xl:text-[46px]">Je suis une entreprise</h2>
            <h2 class="w-fit font-title font-bold text-3xl text-main-white xl:text-[46px]">Je souhaite</h2>
            <div class="lg:flex gap-8 px-8 [&>button]:mx-auto [&>button]:xl:mx-0">
                <button onclick="companyPromo()" type="button" class="hover:bg-main-white hover:text-main-red hover:border-main-red hover:-translate-y-4 ">Chercher un profil</button>
                <button onclick="companyProject()" type="button" class="hover:bg-main-white hover:text-main-red hover:border-main-red hover:-translate-y-4 ">Soumettre un projet</button>
                <button onclick="companyProject()" type="button" class="hover:bg-main-white hover:text-main-red hover:border-main-red hover:-translate-y-4 ">Gérer mes projets</button>
            </div>
            <div class="absolute -bottom-12 w-full flex justify-center"><div onclick="returnHomepage('company-homepage')" class="cursor-pointer font-semibold font-main text-main-white text-xl shadow-2xl"><i class="fa-solid fa-angle-left"></i> Retour</div></div>
        </section>
        <!-- div visiteur -->
        <section id="visitor-homepage" class="opacity-0 hidden lg:mt-20 2xl:mt-36 ease-in duration-300 w-full [&>*]:mx-auto relative
        [&_button]:block [&_button]:max-w-[410px] [&_button]:bg-main-red [&_button]:w-3/4 [&_button]:py-8 [&_button]:lg:py-20 [&_button]:xl:py-24  [&_button]:my-12 [&_button]:border-main-white [&_button]:border-2 [&_button]:text-main-white [&_button]:font-title [&_button]:font-bold [&_button]:uppercase [&_button]:text-xl [&_button]:lg:text-3xl [&_button]:xl:text-[40px] [&_button]:ease-linear [&_button]:duration-200">
            <h2 class="absolute -top-12 w-full text-center font-title font-bold text-3xl text-main-white xl:text-[46px]">Je suis un visiteur</h2>
            <h2 class="w-fit font-title font-bold text-3xl text-main-white xl:text-[46px]">Je souhaite découvrir</h2>
            <div class="lg:flex gap-8 px-8 [&>button]:mx-auto [&>button]:xl:mx-0 justify-center">
                <button onclick="visitorFormation()" type="button" class="hover:bg-main-white hover:text-main-red hover:border-main-red hover:-translate-y-4 ">Les formations</button>
                <button onclick="visitorProject()" type="button" class="hover:bg-main-white hover:text-main-red hover:border-main-red hover:-translate-y-4 ">Les projets</button>
            </div>
                <div class="absolute -bottom-12 w-full flex justify-center"><div onclick="returnHomepage('visitor-homepage')" class="cursor-pointer font-semibold font-main text-main-white text-xl shadow-2xl"><i class="fa-solid fa-angle-left"></i> Retour</div></div>
        </section>
    </div>
</section>

<dialog id="login-modal">FORMULAIRE DE CONNEXION</dialog>


<?php
$content = ob_get_clean();
ob_start();
?>
<script src="assets/js/homepage.js"></script>
<?php
$script = ob_get_clean();
require ('view/layout_home.php');


?>

