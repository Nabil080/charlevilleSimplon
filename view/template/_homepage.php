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
                <button class="" data-modal-target="login-modal" data-modal-toggle="login-modal">
                    Un visiteur
                </button>
                <button onclick="visitorHomepage()" class="">
                    Un apprenant
                </button>
            </div>
            <div class="w-full flex justify-center"><div data-modal-target="login-modal" data-modal-toggle="login-modal" class="underline font-main cursor-pointer font-semibold">se connecter</div></div>
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
            <div class="h-3/4 mx-4 flex flex-col justify-center gap-8 text-[3.5vh] text-main-white font-title font-semibold
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

<!-- Modal de connexion -->
<section id="login-modal" data-modal-placement="center" tabindex="-1" aria-hidden="true" class="backdrop:brightness-50 fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] md:h-full">
    <div class="relative w-full h-fit max-w-md md:h-auto">
        <div class="relative bg-main-white border-main-red border-2 rounded-md text-main-red">
            <button type="button" class="absolute top-3 right-2.5 text-main-red bg-transparent rounded-md text-sm p-1.5 ml-auto inline-flex items-center hover: hover:border border-main-red" data-modal-hide="login-modal">
                <svg data-modal-hide="login-modal" aria-hidden="true" class="w-5 h-5 text-main-light" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                <span class="sr-only">Close modal</span>
            </button>
            <!-- Partie CONNEXION -->
            <div id="co" class="px-6 py-6 lg:px-8">
                <h3 class="mb-4 text-xl uppercase w-fit mx-auto font-bold font-title text-main-red">Connexion</h3>
                <form class="space-y-6" action="/portfolio/allosimplon/traitements/connexion/login.php" method="post">
                    <div>
                        <label for="email" class="block mb-2 text-sm font-medium  text-main-red">E-mail</label>
                        <input type="email" name="email" id="email" class=" border text-sm rounded-md block w-full p-2.5 border-main-red text-main-red" placeholder="Exemple@mail.com" required>
                    </div>
                    <div>
                        <label for="password" class="block mb-2 text-sm font-medium  text-main-red">Mot de passe</label>
                        <input type="password" name="password" id="password" placeholder="*********" class=" border text-sm rounded-md block w-full p-2.5 border-main-red text-main-red" required>
                    </div>
                    <button type="submit" class="w-full uppercase font-title text-main-white bg-main-red hover:bg-red-800 font-medium rounded-md text-sm px-5 py-2.5 text-center ">Se connecter</button>
                    <div class="text-sm font-bold text-main-gray">
                        Mot de passe oublié ? <a onclick="switchDiv('co','paco')" class="hover:underline text-main-red cursor-pointer">Le réinitialiser</a>
                    </div>
                </form>
            </div>
            <!-- Partie MDP OUBLIÉ -->
            <div id="paco" class="hidden px-6 py-6 lg:px-8">
                <h3 class="mb-4 text-xl uppercase w-fit mx-auto font-bold font-title text-main-red">Mot de passe oublié</h3>
                <form class="space-y-6" action="/portfolio/allosimplon/traitements/connexion/sign.php" method="post">
                    <div>
                        <label for="email" class="block mb-2 text-sm font-medium  text-main-red">Votre adresse mail</label>
                        <input type="email" name="email" id="email" class=" border text-sm rounded-md block w-full p-2.5 border-main-red text-main-red" placeholder="Exemple@mail.com" required>
                    </div>
                    <button type="submit" class="w-full font-title text-main-white bg-main-red hover:bg-red-800 font-medium rounded-md text-sm px-5 py-2.5 text-center ">Réinitialiser le mot de passe</button>
                    <div class="text-sm font-bold text-main-gray">
                        Vous avez votre mot de passe ? <a onclick="switchDiv('co','paco')" class="hover:underline text-main-red cursor-pointer">Se connecter</a>
                    </div>
                </form>
            </div>
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

