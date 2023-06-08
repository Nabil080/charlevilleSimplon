<?php
$title = "Toutes nos formations";
?>

<?php ob_start(); ?>

<!-- background -->
<section class="w-screen h-[90dvh] lg:h-[100dvh] bg-cover bg-center relative"
    style="background-image: url(assets/img/homepage_image_blur.jpg);">
    <video autoplay muted loop class="h-screen hidden lg:block blur-sm absolute w-screen object-cover">
        <source src="assets/img/homepage_video.mp4" type="video/mp4">
    </video>
    <!-- overlay -->
    <div id="homepage-overlay"
        class="absolute w-full h-full py-4 px-4 bg-main-gray bg-opacity-60 flex flex-col [&>div]:mx-auto text-center">
        <!-- HEADER -->
    <a href="#allFormationsTitle" id="cta-scroll" class="hidden lg:block text-main-white animate-bounce curs text-2xl fixed bottom-5 inset-x-0"><i class="fa-solid fa-chevron-down"></i></a>

        <div class="h-1/4 lg:h-[48%] grid place-content-center">
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
                <div data-modal-target="login-modal" data-modal-toggle="login-modal"
                    class="underline font-main cursor-pointer font-semibold text-main-white">Se connecter</div>
            </div>
        </div>
        <!-- ENTREPRISE TITRE + BOUTONS -->
        <div id="company-homepage"
            class="hidden h-2/3 lg:h-2/5 opacity-0 ease-in duration-300 w-full lg:hidden lg:flex lg:flex-col lg:grow lg:gap-6 ">
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
                    onclick="window.location.href = '?action=allPromotionsPage'">
                    Chercher un <br>profil
                </button>
            </div>
            <div class="hidden lg:block absolute bottom-4 left-1/2 -translate-x-1/2">
                <div onclick="returnHomepage('company-homepage')"
                    class="cursor-pointer font-semibold font-main text-main-white text-xl shadow-2xl">
                    <i class="fa-solid fa-angle-left"></i> Retour
                </div>
            </div>
            <div class="lg:hidden w-full flex justify-center">
                <div onclick="returnHomepage('company-homepage')"
                    class="cursor-pointer font-main text-main-white text-lg font-semibold shadow-2xl">
                    <i class="fa-solid fa-angle-left"></i> Retour
                </div>
            </div>
        </div>
        <!-- VISITEUR TITRE + BOUTONS -->
        <div id="visitor-homepage"
            class="hidden h-2/3 lg:h-2/5 opacity-0 ease-in duration-300 w-full lg:hidden lg:flex lg:flex-col lg:grow lg:gap-6 ">
            <div class="h-1/5 font-title font-bold text-[5vh] lg:text-[7vh] text-main-white grid items-center">
                <p>Je souhaite découvrir</p>
            </div>
            <!-- BOUTONS -->
            <div class="h-3/4 mx-4 md:mx-12 lg:mb-14 flex flex-col justify-center gap-12 text-[3.5vh] lg:text-[4vh] xl:text-[5vh] text-main-white font-title font-semibold
                [&>button]:h-1/4 [&>button]:bg-main-red [&>button]:uppercase [&>button]:px-6 [&>button]:border-main-white [&>button]:border-2 [&_button]:ease-linear [&_button]:duration-200
                lg:flex-row lg:justify-center lg:gap-10 [&>button]:lg:w-1/3 [&>button]:lg:h-full [&>button]:lg:py-[0vh]
                [&>button]:xl:h-50 xl:mx-[8vw]">
                <button class="hover:bg-main-white hover:text-main-red hover:border-main-red hover:-translate-y-4"
                    onclick="window.location.href = '#allFormationsTitle'">
                    Nos formations
                </button>
                <button class="hover:bg-main-white hover:text-main-red hover:border-main-red hover:-translate-y-4"
                    onclick="window.location.href = '?action=allProjectsPage'">
                    Nos projets
                </button>
            </div>
            <div class="hidden lg:block absolute bottom-4 left-1/2 -translate-x-1/2">
                <div onclick="returnHomepage('visitor-homepage')"
                    class="cursor-pointer font-semibold font-main text-main-white text-xl shadow-2xl">
                    <i class="fa-solid fa-angle-left"></i> Retour
                </div>
            </div>
            <div class="lg:hidden w-full flex justify-center">
                <div onclick="returnHomepage('visitor-homepage')"
                    class="cursor-pointer font-main text-main-white text-lg font-semibold shadow-2xl">
                    <i class="fa-solid fa-angle-left"></i> Retour
                </div>
            </div>
        </div>
    </div>
</section>

<div id="allFormationsTitle"  class="background bg-main-white pt-4 md:pt-12">
    <!-- Chiffres clés, invisibles en mobile -->
    <div class="key_numbers hidden md:flex md:justify-center border-t-[4px] border-b-[4px] border-main-red py-5 w-full">
        <div class="numbers_container px-5 flex w-full">
            <div class="number1 flex w-1/3 items-center ">
                <span
                    class="bg-main-red rounded-[5px] text-main-white border border-main-white   text-xl xl:text-3xl p-4 aspect-square flex items-center justify-center">142</span>
                <p class="font-title text-lg lg:text-xl italic pl-2">Simplonien.ne.s depuis la création</p>
            </div>
            <div class="number2 flex w-1/3 items-center">
                <span
                    class="bg-main-gray rounded-[5px] text-main-white text-xl xl:text-3xl p-4 aspect-square flex items-center justify-center">99%</span>
                <p class="font-title text-lg lg:text-xl font-semibold pl-2">Taux de réussite au diplôme front-end</p>
            </div>
            <div class="number3 flex w-1/3 items-center">
                <span
                    class="bg-main-red rounded-[5px] text-main-white border border-main-white text-xl xl:text-3xl p-4 aspect-square flex items-center justify-center">80%</span>
                <p class="font-title text-lg lg:text-xl italic pl-2">Taux de réussite au diplôme back-end</p>
            </div>
        </div>

    </div>

    <h1 id="formations" class="text-main-red font-title text-center text-2xl sm:text-3xl md:text-4xl lg:text-5xl font-semibold pt-4 md:py-8">Nos formations</h1>

    <div class="large_screen md:mx-2">

        <div class="section-cards grid  place-content-center md:flex md:flex-wrap md:justify-between md:w-11/12 md:mx-auto lg:justify-around">

            <?php foreach ($formations as $formation) {
                include('view/template/_formation_card.php');
            } ?>
            
        </div>
    </div>

    <!-- Section Apprendre à Simplon -->
    <div class="section_learn bg-main-white pb-5 mx-2 md:mx-[5%] lg:mx-[10%]">
        <h2
            class="text-main-red font-title text-center text-[24px] font-semibold pt-4 mb-8 italic lg:text-[42px] lg:text-left">
            Apprendre à Simplon</h2>
        <div class="block lg:grid lg:grid-cols-[10%_90%] items-center justify-center">
            <i class="fa-solid text-center w-full fa-user-group text-[32px] my-2 text-main-red lg:text-[55px]"></i>
            <p class="mx-7 py-5 font-main text-[16px] tracking-wide">La méthode d’apprentissage
                <span class="italic">Simplon.co</span>, <strong>c’est une pédagogie active et par projets</strong> où
                l’apprenant est confronté
                à des mises en situation concrètes via des projets individuels et en groupe. Les thèmes des projets sont
                directement issus
                de cas réels, pour permettre aux apprenants d’appréhender le terrain dès la formation. Le collectif est
                un élément central de
                l’apprentissage car <strong>le travail en équipe est constant</strong>, et les apprenants s’entraident
                et s’évaluent
                régulièrement.
            </p>
            <i class="fa-solid fa-briefcase text-center w-full text-[32px] my-2 text-main-red lg:text-[55px]"></i>
            <p class="mx-7 py-5  font-main text-[16px] tracking-wide">Pour garantir une
                <strong>insertion professionnelle réussie</strong>, l’apprenant est accompagné par des formateurs
                experts du métier visé et
                des équipes en lien avec les entreprises du territoire. Il est immergé dans le monde de l’entreprise
                tout au long de sa
                formation : parrainage de la promotion par une entreprise, simulations d’entretiens, meet-ups...
            </p>
            <i class="fa-solid text-center w-full fa-graduation-cap text-[32px] my-2 text-main-red lg:text-[55px]"></i>
            <p class="mx-7 py-5  font-main text-[16px] tracking-wide">Quasiment toutes nos formations
                débouchent sur la
                <strong>délivrance de certifications reconnues</strong>, soit un Titre RNCP reconnu par le ministère du
                travail
                (équivalent diplôme), soit une ou plusieurs certifications Simplon reconnues par l'État ou par les
                professionnels.
            </p>
        </div>
        <div class="flex justify-center mt-4 lg:mt-8">
            <a href="?action=allProjectsPage"
                class="bg-main-red rounded-[5px] text-main-white border border-main-white hover:bg-main-white hover:text-main-red hover:border-main-red  font-semibold text-[16px] lg:text-[22px] font-main py-5 px-3 inline">Projets
                réalisés par nos formations</a>
        </div>
    </div>
    <!-- Section Banniere et notre histoire -->
    <section class="pb-4 md:pb-10 my-4 md:my-8 relative min-h-[350px] ">
        <h3 id="commentTitle" class="text-main-gray font-title text-center text-[20px] lg:text-[32px] italic lg:w-3/4 lg:mx-auto 
        font-semibold pt-10 md:py-5 mt-4 mb-4 md:mb-8">
            Nos apprenant.e.s témoignent 
        </h3>
        <div id="commentSection" class="grid lg:grid-cols-2 w-10/12 mx-auto justify-items-center">
        </div>
    </section>



    <div class="section_history relative overflow-x-hidden">
        <h2
            class="text-main-red font-title text-center text-[24px] lg:text-[42px] italic lg:text-left lg:w-3/4 lg:mx-auto font-semibold py-5 mt-4 mb-8">
            Notre histoire</h2>
        <!-- Timeline -->
        <ol id="translateList" class="flex w-[300%] sm:w-full lg:w-3/4 sm:animate-none
         sm:translate-x-0 sm:opacity-100 sm:relative sm:flex-row sm:mx-auto lg:relative
          transition-all duration-[0.5s]  sm:overflow-x-clip lg:flex md:justify-around md:gap-6">
            <div class="border-2 hidden sm:block border-main-red w-[300vw] absolute z-0 h-0 top-1/2 -left-full"></div>
            <li class="z-10 w-2/3 cursor-pointer">
                <div onclick="changeDateTab(0)"
                    class="tabDateChange rounded-[5px] text-main-white !bg-main-red p-2 grid items-center justify-center">
                    <span class="lg:text-xl text-md font-semibold">2013</span>
                </div>
            </li>
            <li class="z-10 w-2/3 cursor-pointer">
                <div onclick="changeDateTab(1)"
                    class="tabDateChange bg-main-gray rounded-[5px] animate-pulse sm:animate-none text-main-white p-2 grid items-center justify-center">
                    <span class="lg:text-xl text-md font-semibold">2014-2015</span>
                </div>
            </li>
            <li class="z-10 w-2/3 cursor-pointer">
                <div onclick="changeDateTab(2)"
                    class="tabDateChange bg-main-gray rounded-[5px] text-main-white p-2 grid items-center justify-center">
                    <span class="lg:text-xl text-md font-semibold">2016-2017</span>
                </div>
            </li>
            <li class="z-10 w-2/3 cursor-pointer">
                <div onclick="changeDateTab(3)"
                    class="tabDateChange bg-main-gray rounded-[5px] text-main-white p-2 grid items-center justify-center">
                    <span class="lg:text-xl text-md font-semibold">2018-2019</span>
                </div>
            </li>
            <li class="z-10 w-2/3 cursor-pointer">
                <div onclick="changeDateTab(4)"
                    class="tabDateChange bg-main-gray rounded-[5px] text-main-white p-2 grid items-center justify-center">
                    <span class="lg:text-xl text-md font-semibold">2020-2021</span>
                </div>
            </li>
            <li class="z-10 w-2/3 cursor-pointer sm:hidden">
                <div onclick="changeDateTab('back')"
                    class="tabDateChange  bg-main-gray rounded-[5px] text-main-white p-2 grid items-center justify-center">
                    <span class="lg:text-xl text-md font-semibold">Début de Simplon</span>
                </div>
            </li>
        </ol>

        <div class="mx-7 lg:mx-[15%] lg:mt-16 my-8">
            <div class="sectionDateChange transition-all duration-[1.5s]">
                <h3 class="text-[20px] md:text-[32px] font-bold font-title">2013</h3>
                <p class="text-[16px]"> L’aventure de Simplon débute en 2013 avec Frédéric Bardeau, Andrei Vladescu-Olt
                    et Erwan Kezzar.
                    Inspirés par les premiers bootcamps qui fleurissent un peu partout dans la Silicon Valley,
                    ils rêvent d’une version française plus inclusive et gratuite avec plus de femmes, et plus de
                    recrues de milieux
                    et de territoires différents. Le local de Montreuil est trouvé, loué et rapidement rafraîchi pour
                    accueillir en octobre
                    la première promotion de Simplon sur Ruby On Rails : 30 personnes ayant un projet d'application ou
                    d'entreprise dont 50% de
                    femmes de 18 à 52 ans, de Bac-15 à Bac+15 et des personnes provenant de 17 nationalités différentes.
                </p>
            </div>
            <div class="hidden sectionDateChange transition-all duration-[1.5s]">
                <h3 class="text-[20px] md:text-[32px] font-bold font-title">2014 - 2015</h3>
                <p class="text-[16px]"> Simplon se développe rapidement en dehors de Montreuil via un mécanisme de
                    "franchise sociale" et des fabriques commencent à
                    pousser dans les quartiers prioritaires et ruraux de France et à l'étranger (Roumanie, Afrique du
                    Sud). Une première levée de
                    fonds consolide le modèle et Simplon est autorisé à délivrer le Certificat de Qualification
                    Professionnelle (CQP)
                    « Développeur nouvelles technologies ». À la même époque, Simplon développe ses activités avec la
                    création de Simplon Prod,
                    l’atelier solidaire de fabrication digitale, à destination des acteurs de l’ESS, et la Fondation
                    Simplon, sa branche
                    philanthropique abritée par Face reconnue d'utilité publique nait. Simplon est lauréat de la France
                    s'Engage en 2014,
                    fellow Ashoka et sélectionnée par EPIC en 2015.</p>
            </div>
            <div class="hidden sectionDateChange transition-all duration-[1.5s]">
                <h3 class="text-[20px] md:text-[32px] font-bold font-title">2016 - 2017</h3>
                <p class="text-[16px]"> Simplon devient le premier réseau de formation labellisées par l'Etat en France
                    "Grande Ecole du Numérique" et se développe à l’international :
                    la Belgique, le Liban, la Côte d’Ivoire. Simplon voit grand et organise une seconde levée de fonds.
                    France Active
                    (via France Active Investissement), la Caisse des Dépôts et Consignations (CDC en direct), Phitrust,
                    INCO (Comptoir de l’innovation),
                    Aviva, Crédit Coopératif (via ESFIN), Amundi et Mirova entrent au capital de Simplon. Simplon prend
                    un nouvel élan et double ses
                    effectifs tous les ans, et son impact. Simplon Corp, sa division spécialisée dans la formation des
                    salariés dont les métiers et les
                    compétences sont fortement impactées par la transformation numérique, déploie ses projets dans les
                    grands comptes. DigitESS nait à ce
                    moment-là pour accompagner la transition numérique des acteurs à impact positif.</p>
            </div>
            <div class="hidden sectionDateChange transition-all duration-[1.5s]">
                <h3 class="text-[20px] md:text-[32px] font-bold font-title">2018 - 2019</h3>
                <p class="text-[16px]"> Au moment de fêter ses 6 ans, Simplon.co lève 12 millions d’euros auprès de son
                    pool d’investisseurs de l’Économie sociale
                    et solidaire (ESS) afin de poursuivre la croissance de son impact social en France et à
                    l’international. Ces deux dernières années,
                    porté par le maintien d’un niveau très élevé des besoins en compétences dans le domaine du
                    numérique, Simplon.co a multiplié par quatre
                    son impact social et formé aux métiers du numérique plus de 5 600 personnes dans le monde avec un
                    taux de sorties positives de 75%
                    (6 mois après la formation). Le développement à l’international se poursuit. En 2019, Simplon.co
                    compte 78 Fabriques dont 24 à l’étranger.
                    Simplon Prod dépasse les 150 projets ESS réalisés et Simplon Corp le millier de salarié formé.</p>
            </div>
            <div class="hidden sectionDateChange transition-all duration-[1.5s]">
                <h3 class="text-[20px] md:text-[32px] font-bold font-title">2020 - 2021</h3>
                <p class="text-[16px]"> En 2020, Simplon poursuit le développement de son impact social dans un contexte
                    de crise sanitaire inédit.
                    Durant le confinement, les formations passent à distance, ce qui oblige à en repenser les modalités
                    tout en maintenant
                    une approche pédagogique active et inclusive, et un univers bienveillant pour minimiser les impacts
                    de cette crise sur
                    les activités de Simplon. Malgré un contexte difficile, Simplon dépasse en octobre 2020 la barre des
                    10 000 apprenants
                    formés dans le monde, et fête ses 7 ans et demi entouré de ses partenaires et amis en décembre. </p>
            </div>
        </div>
    </div>
</div>

<?php ob_start(); ?>
<script src="assets/js/allFormations.js"></script>
<script src="assets/js/homepage.js"></script>
<?php $script = ob_get_clean(); ?>


<?php $content = ob_get_clean(); ?>

<?php require 'view/layout_home.php'; ?>
