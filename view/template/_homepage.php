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
        <!-- header logo + titre -->
        <div class="flex justify-center my-6 lg:my-0 sm:justify-between">
            <img class="h-60 sm:h-auto sm:w-40 sm:mx-8" src="assets/img/logo.png" alt="logo simplon charleville-mézières"><h1 class="hidden">Simplon Charleville-Mézières, formations numérique</h1>
            <div class="hidden sm:block w-fit mx-8 my-auto relative"><i class="fa fa-user text-[80px] text-main-red"></i><button data-modal-target="login-modal" data-modal-toggle="login-modal" class="font-main absolute -bottom-6 -right-2 underline text-main-white whitespace-nowrap">Se connecter</button></div>
        </div>
        <!-- div cards accueil -->
        <h1 class="hidden lg:block uppercase font-title text-main-white w-fit mx-auto -translate-y-8 text-[60px] font-bold text-center">Simplon <br> charleville-mézières</h1>
        <section id="homepage" class="ease-in duration-300 lg:mt-20 2xl:mt-36 w-full [&_*]:mx-auto relative
        [&_button]:block [&_button]:max-w-[410px] [&_button]:bg-main-red [&_button]:w-3/4 [&_button]:py-8 [&_button]:lg:py-20 [&_button]:xl:py-24  [&_button]:my-12 [&_button]:border-main-white [&_button]:border-2 [&_button]:text-main-white [&_button]:font-title [&_button]:font-bold [&_button]:uppercase [&_button]:text-xl [&_button]:lg:text-3xl [&_button]:xl:text-[40px] [&_button]:ease-linear [&_button]:duration-200">
            <h2 class="w-fit font-title font-bold text-3xl text-main-white xl:text-[46px]">Je suis</h2>
            <div class="lg:flex gap-8 px-8">
                <button onclick="companyHomepage()" type="button" class="hover:bg-main-white hover:text-main-red hover:border-main-red hover:-translate-y-4">Une entreprise</button>
                <button data-modal-target="login-modal" data-modal-toggle="login-modal" type="button" class="hover:bg-main-white hover:text-main-red hover:border-main-red hover:-translate-y-4 ">Un apprenant</button>
                <button onclick="visitorHomepage()" type="button" class="hover:bg-main-white hover:text-main-red hover:border-main-red hover:-translate-y-4 ">Un visiteur</button>
            </div>
            <div class="sm:hidden absolute -bottom-12 w-full flex justify-center"><div data-modal-target="login-modal" data-modal-toggle="login-modal" class="underline font-main cursor-pointer font-semibold">se connecter</div></div>
        </section>
        <!-- div cards entreprise -->
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
        <!-- div cards visiteur -->
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

