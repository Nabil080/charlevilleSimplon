<?php
$title = "Accueil";
ob_start();
?>

<!-- background -->
<section class="w-screen h-screen bg-cover bg-center" style="background-image: url(assets/img/homepage_image_blur.jpg);">
<!-- overlay -->
    <div id="homepage-overlay" class="w-full h-full py-4 px-4 bg-main-white bg-opacity-60 flex flex-col [&>div]:mx-auto text-center">
        <!-- HEADER -->
        <div class="h-1/3">
            <img class="h-full" src="assets/img/logo.png" alt="logo simplon charleville-mézières">
        </div>
        <!-- HOMEPAGE TITRE + BOUTONS -->
        <div id="homepage" class="h-2/3 ease-in duration-300">
            <div class="h-1/5 font-title font-bold text-[3.5vh] text-main-white grid items-center">
                <p>Je suis</p>
            </div>
            <!-- BOUTONS -->
            <div class="h-3/4 mx-4 flex flex-col justify-between text-[3.5vh] text-main-white font-title font-semibold
            [&>button]:h-1/4 [&>button]:bg-main-red [&>button]:uppercase [&>button]:px-6 [&>button]:border-main-white [&>button]:border-2 [&_button]:ease-linear [&_button]:duration-200 ">
                <button onclick="companyHomepage()" class="">
                    Une entreprise
                </button>
                <button class="">
                    Un visiteur
                </button>
                <button onclick="visitorHomepage()" class="">
                    Un apprenant
                </button>
            </div>
            <div class="sm:hidden w-full flex justify-center"><div data-modal-target="login-modal" data-modal-toggle="login-modal" class="underline font-main cursor-pointer font-semibold">se connecter</div></div>
        </div>
        <!-- ENTREPRISE TITRE + BOUTONS -->
        <div id="company-homepage" class="h-2/3 opacity-0 hidden ease-in duration-300">
            <div class="h-1/5 font-title font-bold text-[3.5vh] text-main-white grid items-center">
                <p>Je suis une entreprise <br> Je souhaite</p>
            </div>
            <!-- BOUTONS -->
            <div class="h-3/4 mx-4 flex flex-col justify-between text-[3.5vh] text-main-white font-title font-semibold
            [&>button]:h-1/4 [&>button]:bg-main-red [&>button]:uppercase [&>button]:px-6 [&>button]:border-main-white [&>button]:border-2 [&_button]:ease-linear [&_button]:duration-200 ">
                <button class="">
                    Chercher un profil
                </button>
                <button class="">
                    Soumettre un projet
                </button>
                <button class="">
                    Gérer mes projets
                </button>
            </div>
            <div class="grow my-auto w-full flex justify-center"><div onclick="returnHomepage('company-homepage')" class="cursor-pointer font-semibold font-main text-main-white text-xl shadow-2xl"><i class="fa-solid fa-angle-left"></i> Retour</div></div>
        </div>
        <!-- VISITEUR TITRE + BOUTONS -->
        <div id="visitor-homepage" class="h-2/3 opacity-0 hidden ease-in duration-300">
            <div class="h-1/5 font-title font-bold text-[3.5vh] text-main-white grid items-center">
                <p>Je suis un visiteur <br> Je souhaite découvrir </p>
            </div>
            <!-- BOUTONS -->
            <div class="h-3/4 mx-4 flex flex-col text-[3.5vh] text-main-white font-title font-semibold
            [&>button]:h-1/4 [&>button]:bg-main-red [&>button]:uppercase [&>button]:px-6 [&>button]:border-main-white [&>button]:border-2 [&_button]:ease-linear [&_button]:duration-200 ">
                <button class="">
                    Les formations
                </button>
                <button class="">
                    Les projets
                </button>
            </div>
            <div class="grow my-auto w-full flex justify-center"><div onclick="returnHomepage('visitor-homepage')" class="cursor-pointer font-semibold font-main text-main-white text-xl shadow-2xl"><i class="fa-solid fa-angle-left"></i> Retour</div></div>
        </div>
    </div>
</section>


<?php
$content = ob_get_clean();
ob_start();
?>
<script src="assets/js/homepage.js"></script>
<?php
$script = ob_get_clean();
require ('view/layout_home.php');


?>

