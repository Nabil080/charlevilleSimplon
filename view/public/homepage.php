<?php
$title = "Accueil";
ob_start();
?>

<!-- background -->
<section class="w-screen h-[100dvh] bg-cover bg-center relative"
    style="background-image: url(assets/img/homepage_image_blur.jpg);">
    <video autoplay muted loop class="h-screen hidden lg:block blur-sm absolute w-screen object-cover">
        <source src="assets/img/homepage_video.mp4" type="video/mp4">
    </video>
    <!-- overlay -->
    <div id="homepage-overlay"
        class="absolute w-full h-full py-4 px-4 bg-main-gray bg-opacity-60 flex flex-col [&>div]:mx-auto text-center">
        <!-- HEADER -->
        <div class="h-1/3 lg:h-[48%] grid place-content-center">
            <img class="h-full mx-auto lg:mx-0 lg:absolute lg:top-0 lg:left-8 lg:h-1/4 " src="assets/img/logo.png"
                alt="logo simplon charleville-mézières">
            <div class="hidden lg:grid absolute top-0 right-8 h-1/4">
                <div class="w-fit mx-8 relative h-fit my-auto cursor-pointer" data-modal-target="login-modal"
                    data-modal-toggle="login-modal">
                    <i class="fa fa-user text-[80px] text-main-red"></i>
                    <p class="underline text-main-white whitespace-nowrap">Se connecter</p>
                    <!-- <button data-modal-target="login-modal" data-modal-toggle="login-modal" class="font-main absolute -bottom-6 -right-2 underline text-main-white whitespace-nowrap">Se connecter</button> -->
                </div>
            </div>
            <h1 class="hidden lg:block uppercase font-title h-full text-main-white text-[60px] font-bold text-center">
                Simplon <br> charleville-mézières</h1>
        </div>
        <!-- HOMEPAGE TITRE + BOUTONS -->
        <div id="homepage" class="h-2/3 lg:h-2/5 ease-in duration-300 w-full lg:flex lg:flex-col lg:grow lg:gap-6 ">
            <div class="h-1/5 font-title font-bold text-[5vh] lg:text-[7vh] text-main-white grid items-center">
                <p>Je suis</p>
            </div>
            <!-- BOUTONS -->
            <div class="h-3/4 mx-4 md:mx-12 lg:mb-14 flex flex-col justify-between text-[3.5vh] lg:text-[4vh] xl:text-[5vh] text-main-white font-title font-semibold
                [&>button]:h-1/4 [&>button]:bg-main-red [&>button]:uppercase [&>button]:px-6 [&>button]:border-main-white [&>button]:border-2 [&_button]:ease-linear [&_button]:duration-200
                lg:flex-row lg:justify-center lg:gap-10 [&>button]:lg:w-full [&>button]:lg:h-full [&>button]:lg:py-[0vh]
                [&>button]:xl:h-50 xl:mx-[8vw]">
                <button class="hover:bg-main-white hover:text-main-red hover:border-main-red hover:-translate-y-4"
                    onclick="companyHomepage()" class="whitespace-nowrap">
                    Une entreprise
                </button>
                <button class="hover:bg-main-white hover:text-main-red hover:border-main-red hover:-translate-y-4"
                    onclick="visitorHomepage()">
                    Un visiteur
                </button>
                <button class="hover:bg-main-white hover:text-main-red hover:border-main-red hover:-translate-y-4"
                    data-modal-target="login-modal" data-modal-toggle="login-modal">
                    Un apprenant
                </button>
            </div>
            <div class="lg:hidden w-full flex justify-center">
                <div data-modal-target="login-modal" data-modal-toggle="login-modal" class="underline font-main cursor-pointer font-semibold text-main-white">se connecter</div>
            </div>
        </div>
        <!-- ENTREPRISE TITRE + BOUTONS -->
        <div id="company-homepage" class="hidden h-2/3 lg:h-2/5 opacity-0 ease-in duration-300 w-full lg:hidden lg:flex lg:flex-col lg:grow lg:gap-6 ">
            <div class="h-1/5 font-title font-bold text-[5vh] lg:text-[7vh] text-main-white grid items-center">
                <p>Je souhaite</p>
            </div>
            <!-- BOUTONS -->
            <div class="h-3/4 mx-4 md:mx-12 lg:mb-14 flex flex-col justify-between text-[3.5vh] lg:text-[4vh] xl:text-[5vh] text-main-white font-title font-semibold
                [&>button]:h-1/4 [&>button]:bg-main-red [&>button]:uppercase [&>button]:px-6 [&>button]:border-main-white [&>button]:border-2 [&_button]:ease-linear [&_button]:duration-200
                lg:flex-row lg:justify-center lg:gap-10 [&>button]:lg:w-full [&>button]:lg:h-full [&>button]:lg:py-[0vh]
                [&>button]:xl:h-50 xl:mx-[8vw]">
                <button class="hover:bg-main-white hover:text-main-red hover:border-main-red hover:-translate-y-4"
                    data-modal-target="company-login-modal" data-modal-toggle="company-login-modal">
                    Gérer mes <br>projets
                </button>
                <button class="hover:bg-main-white hover:text-main-red hover:border-main-red hover:-translate-y-4"
                    data-modal-target="company-login-modal" data-modal-toggle="company-login-modal">
                    Soumettre un <br>projet
                </button>
                <button class="hover:bg-main-white hover:text-main-red hover:border-main-red hover:-translate-y-4"
                    onclick="window.location.href = '?action=allPromosPage'">
                    Chercher un <br>profil
                </button>
            </div>
            <div class="hidden lg:block absolute bottom-4 left-1/2 -translate-x-1/2">
                <div onclick="returnHomepage('company-homepage')" class="cursor-pointer font-semibold font-main text-main-white text-xl shadow-2xl">
                    <i class="fa-solid fa-angle-left"></i> Retour</div>
            </div>
            <div class="lg:hidden w-full flex justify-center">
                <div onclick="returnHomepage('company-homepage')" class="cursor-pointer font-main text-main-white text-lg font-semibold shadow-2xl">
                <i class="fa-solid fa-angle-left"></i> Retour</div>
            </div>
        </div>
        <!-- VISITEUR TITRE + BOUTONS -->
        <div id="visitor-homepage" class="hidden h-2/3 lg:h-2/5 opacity-0 ease-in duration-300 w-full lg:hidden lg:flex lg:flex-col lg:grow lg:gap-6 ">
            <div class="h-1/5 font-title font-bold text-[5vh] lg:text-[7vh] text-main-white grid items-center">
                <p>Je souhaite découvrir</p>
            </div>
            <!-- BOUTONS -->
            <div class="h-3/4 mx-4 md:mx-12 lg:mb-14 flex flex-col justify-center gap-12 text-[3.5vh] lg:text-[4vh] xl:text-[5vh] text-main-white font-title font-semibold
                [&>button]:h-1/4 [&>button]:bg-main-red [&>button]:uppercase [&>button]:px-6 [&>button]:border-main-white [&>button]:border-2 [&_button]:ease-linear [&_button]:duration-200
                lg:flex-row lg:justify-center lg:gap-10 [&>button]:lg:w-1/3 [&>button]:lg:h-full [&>button]:lg:py-[0vh]
                [&>button]:xl:h-50 xl:mx-[8vw]">
                <button class="hover:bg-main-white hover:text-main-red hover:border-main-red hover:-translate-y-4"
                    data-modal-target="visitor-login-modal" data-modal-toggle="company-login-modal">
                    Nos formations
                </button>
                <button class="hover:bg-main-white hover:text-main-red hover:border-main-red hover:-translate-y-4"
                    data-modal-target="company-login-modal" data-modal-toggle="company-login-modal">
                    Nos projets
                </button>
            </div>
            <div class="hidden lg:block absolute bottom-4 left-1/2 -translate-x-1/2">
                <div onclick="returnHomepage('visitor-homepage')" class="cursor-pointer font-semibold font-main text-main-white text-xl shadow-2xl">
                    <i class="fa-solid fa-angle-left"></i> Retour</div>
            </div>
            <div class="lg:hidden w-full flex justify-center">
                <div onclick="returnHomepage('visitor-homepage')" class="cursor-pointer font-main text-main-white text-lg font-semibold shadow-2xl">
                <i class="fa-solid fa-angle-left"></i> Retour</div>
            </div>
        </div>
    </div>
</section>

<?php include('view/include/login_modal.php') ?>
<?php include('view/include/company_login_modal.php') ?>


<?php
$content = ob_get_clean();
ob_start();
?>
<script src="assets/js/homepage.js"></script>
<?php
$script = ob_get_clean();

require('view/layout_home.php');

?>
