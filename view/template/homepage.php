    <?php
    $title = "Accueil";
    ob_start();
    ?>

    <!-- background -->
    <section class="w-screen h-screen bg-cover bg-center relative"  style="background-image: url(assets/img/homepage_image_blur.jpg);">
        <video autoplay muted loop class="h-screen hidden lg:block blur-sm absolute w-screen object-cover">
            <source src="assets/img/homepage_video.mp4" type="video/mp4">
        </video>
    <!-- overlay -->
        <div id="homepage-overlay" class="absolute w-full h-full py-4 px-4 bg-main-gray bg-opacity-60 flex flex-col [&>div]:mx-auto text-center">
            <!-- HEADER -->
            <div class="h-1/3 lg:h-[48%] grid place-content-center">
                <img class="h-full mx-auto lg:mx-0 lg:absolute lg:top-0 lg:left-8 lg:h-1/4 " src="assets/img/logo.png" alt="logo simplon charleville-mézières">
                <div class="hidden lg:grid absolute top-0 right-8 h-1/4 place-items-center">
                    <div class="w-fit mx-8 my-auto relative"><i class="fa fa-user text-[80px] text-main-red"></i><button data-modal-target="login-modal" data-modal-toggle="login-modal" class="font-main absolute -bottom-6 -right-2 underline text-main-white whitespace-nowrap">Se connecter</button></div>
                </div>
                <h1 class="hidden lg:block uppercase font-title h-full text-main-white text-[60px] font-bold text-center">Simplon <br> charleville-mézières</h1>
            </div>
            <!-- HOMEPAGE TITRE + BOUTONS -->
            <div id="homepage" class="h-2/3 lg:h-2/5 ease-in duration-300 w-full lg:flex lg:flex-col lg:grow lg:gap-6 ">
                <div class="h-1/5 font-title font-bold text-[5vh] lg:text-[7vh] text-main-white grid items-center">
                    <p>Je suis</p>
                </div>
                <!-- BOUTONS -->
                <div class="h-3/4 mx-4 lg:mb-14 flex flex-col justify-between text-[3.5vh] lg:text-[4vh] xl:text-[5vh] text-main-white font-title font-semibold
                [&>button]:h-1/4 [&>button]:bg-main-red [&>button]:uppercase [&>button]:px-6 [&>button]:border-main-white [&>button]:border-2 [&_button]:ease-linear [&_button]:duration-200
                lg:flex-row lg:justify-center lg:gap-10 [&>button]:lg:w-full [&>button]:lg:h-full [&>button]:lg:py-[0vh]
                [&>button]:xl:h-50 xl:mx-[8vw]">
                    <button class="hover:bg-main-white hover:text-main-red hover:border-main-red hover:-translate-y-4" onclick="companyHomepage()" class="whitespace-nowrap">
                        Une entreprise
                    </button>
                    <button class="hover:bg-main-white hover:text-main-red hover:border-main-red hover:-translate-y-4" onclick="visitorHomepage()" >
                        Un visiteur
                    </button>
                    <button class="hover:bg-main-white hover:text-main-red hover:border-main-red hover:-translate-y-4" data-modal-target="login-modal" data-modal-toggle="login-modal">
                        Un apprenant
                    </button>
                </div>
                <div class="lg:hidden w-full flex justify-center"><div data-modal-target="login-modal" data-modal-toggle="login-modal" class="underline font-main cursor-pointer font-semibold">se connecter</div></div>
            </div>
            <!-- ENTREPRISE TITRE + BOUTONS -->
            <div id="company-homepage" class="hidden opacity-0 h-2/3 lg:h-2/5 ease-in duration-300 w-full lg:flex-col lg:grow lg:gap-6 ">
                <div class="h-1/5 font-title font-bold text-[5vh] lg:text-[7vh] text-main-white grid items-center">
                    <p>Je souhaite</p>
                </div>
                <!-- BOUTONS -->
                <div class="h-3/4 mx-4 flex flex-col justify-between text-[3.5vh] lg:text-[4vh] xl:text-[5vh] text-main-white font-title font-semibold
                [&>button]:h-1/4 [&>button]:bg-main-red [&>button]:uppercase [&>button]:px-6 [&>button]:border-main-white [&>button]:border-2 [&_button]:ease-linear [&_button]:duration-200
                lg:flex-row lg:justify-center lg:gap-10 [&>button]:lg:w-full [&>button]:lg:h-[210px] [&>button]:lg:py-[0vh]
                [&>button]:xl:h-[210px] xl:mx-[8vw]">
                    <button class="hover:bg-main-white hover:text-main-red hover:border-main-red hover:-translate-y-4" onclick="companyHomepage()">
                        Gérer mes <br>projets
                    </button>
                    <button class="hover:bg-main-white hover:text-main-red hover:border-main-red hover:-translate-y-4" data-modal-target="login-modal" data-modal-toggle="login-modal">
                        Soumettre un <br>projet
                    </button>
                    <button class="hover:bg-main-white hover:text-main-red hover:border-main-red hover:-translate-y-4" onclick="window.location.href = '?action=allPromosPage'" >
                        Chercher un <br>profil
                    </button>
                </div>
                <div class="my-auto w-full flex justify-center"><div onclick="returnHomepage('company-homepage')" class="cursor-pointer font-semibold font-main text-main-white text-xl shadow-2xl"><i class="fa-solid fa-angle-left"></i> Retour</div></div>
            </div>
            <!-- VISITEUR TITRE + BOUTONS -->
            <div id="visitor-homepage" class="hidden opacity-0 h-2/3 lg:h-2/5 ease-in duration-300 w-full lg:flex-col lg:grow lg:gap-6 ">
                <div class="h-1/5 font-title font-bold text-[5vh] lg:text-[7vh] text-main-white grid items-center">
                    <p>Je souhaite découvrir</p>
                </div>
                <!-- BOUTONS -->
                <div class="h-3/4 mx-4 flex flex-col justify-between text-[3.5vh] lg:text-[4vh] xl:text-[5vh] text-main-white font-title font-semibold
                [&>button]:h-1/4 [&>button]:bg-main-red [&>button]:uppercase [&>button]:px-6 [&>button]:border-main-white [&>button]:border-2 [&_button]:ease-linear [&_button]:duration-200
                lg:flex-row lg:justify-center lg:gap-10 [&>button]:lg:w-[340px] [&>button]:lg:h-[180px] [&>button]:lg:py-[0vh]
                [&>button]:xl:h-[210px] [&>button]:xl:w-[410px]">
                    <button class="hover:bg-main-white hover:text-main-red hover:border-main-red hover:-translate-y-4" onclick="window.location.href ='?action=allFormationsPage'">
                        Les formations
                    </button>
                    <button class="hover:bg-main-white hover:text-main-red hover:border-main-red hover:-translate-y-4" onclick="window.location.href ='?action=allProjectsPage'">
                        Les projets
                    </button>
                </div>
                <div class="my-auto w-full flex justify-center"><div onclick="returnHomepage('visitor-homepage')" class="cursor-pointer font-semibold font-main text-main-white text-xl shadow-2xl"><i class="fa-solid fa-angle-left"></i> Retour</div></div>
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

