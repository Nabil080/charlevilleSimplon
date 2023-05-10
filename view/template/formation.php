<?php $title = "Développeur Web et Web Mobile"; ?>

<?php ob_start(); ?>

<main>
    <h2
        class="py-5 bg-white text-center text-[24px] md:text-[36px] lg:text-[48px] font-bold font-title text-main-red uppercase">
        Développeur Web
        et Web Mobile
    </h2>
    <div class="bg-white px-[10%] xl:px-[15%]">
        <div class="flex justify-center md:gap-10 lg:gap-20">
            <div
                class="w-full p-5 lg:bg-main-lightgray lg:border-2 lg:border-gray lg:rounded-lg lg:shadow-[2px_0_3px_2px_rgba(0,0,0,0.5)]">
                <div class="text-[16px] md:text-[20px] text-justify flex flex-col gap-5">
                    <p>
                        De l’analyse du besoin à la mise en ligne, en passant par l’interface et la base de données,
                        le·la
                        développeur·se web conçoit et programme des applications web.
                    </p>
                    <p>
                        Le⋅a développeur·se web réalise l’ensemble des fonctionnalités d’un site ou d’une application
                        web.
                        Le⋅a
                        développeur·se web analyse les besoins des clients consignés au préalable dans un cahier des
                        charges
                        par
                        le
                        chef de projet. Il·elle préconise et met en œuvre une solution technique pour concevoir des
                        sites
                        sur
                        mesure
                        ou
                        adapter des solutions techniques existantes.
                    </p>

                    <p class="font-bold text-main-red">
                        Le métier de développeur Web s’articule alors autour de 2 activités principales :
                    </p>

                    <p>
                        Développer la partie front-end d’une application web ou web mobile en intégrant les
                        recommandations
                        de
                        sécurité
                    </p>
                    <p>
                        Développer la partie back-end d’une application web ou web mobile en intégrant les
                        recommandations
                        de
                        sécurité
                    </p>
                </div>
            </div>

            <aside
                class="hidden max-w-[300px] p-5 lg:flex border-2 border-main-gray rounded-lg text-center flex-col gap-10">
                <h5 class="text-[20px] font-bold">Chiffres clés du secteur</h5>
                <div>
                    <p class="text-[48px] text-main-red font-bold pb-3">+ 3.6%</p>
                    <p class="text-[16px] font-medium">Croissance du secteur du numérique en 2018</p>
                </div>
                <div>
                    <p class="text-[48px] text-main-red font-bold pb-3">232 000</p>
                    <p class="text-[16px] font-medium">postes seraient à pourvoir entre 2017 et 2027</p>
                </div>
                <div>
                    <p class="text-[48px] text-main-red font-bold pb-3">49 015 €</p>
                    <p class="text-[16px] font-medium">revenu annuel brut moyen d'un $nom_de_la_formation</p>
                </div>
            </aside>
        </div>
        <div class="mt-20 pb-20 hidden md:block text-center">
            <a href="index.php?action=registerPage"
                class="px-10 py-3 text-main-white font-bold text-lg uppercase bg-main-red rounded-lg">
                Postuler à la formation</a>
        </div>
    </div>
</main>

<section class="pb-10">
    <img src="assets/img/autres/campus.png" alt="mur du campus" class="w-full img-fluid" />
</section>
<section class="py-10 lg:px-[10%] xl:px-[15%] bg-main-lightgray">
    <div class="border">
        <ul class="grid grid-cols-2 lg:grid-cols-4 " id="myTab" data-tabs-toggle="#myTabContent" role="tablist">
            <li class="border border-white">
                <button onclick="changeTab(0);"
                    class="tabChange transition-all duration-[0.4s] bg-main-red w-full p-5 inline-flex justify-center items-center gap-3 text-[16px] md:text-[28px] text-white aria-selected:bg-main-red aria-selected:text-white aria-selected:hover:text-white">
                    <i class="fa-sharp fa-solid fa-trophy fa-lg"></i>
                    Compétence
                </button>
            </li>
            <li class="border border-white">
                <button onclick="changeTab(1);"
                    class="tabChange transition-all duration-[0.4s] bg-main-gray w-full p-5 inline-flex justify-center items-center gap-3 text-[16px] md:text-[28px] text-white aria-selected:bg-main-red aria-selected:text-main-white">
                    <i class="fa-sharp fa-solid fa-handshake fa-lg"></i>
                    Admission
                </button>
            </li>
            <li class="border border-white">
                <button onclick="changeTab(2);"
                    class="tabChange transition-all duration-[0.4s] bg-main-gray w-full p-5 inline-flex justify-center items-center gap-3 text-[16px] md:text-[28px] text-main-white aria-selected:bg-main-red aria-selected:text-main-white">
                    <i class="fa-sharp fa-solid fa-book fa-lg"></i>
                    Programme
                </button>
            </li>
            <li class="border border-white">
                <button onclick="changeTab(3);"
                    class="tabChange transition-all duration-[0.4s] bg-main-gray w-full p-5 inline-flex justify-center items-center gap-3 text-[16px] md:text-[28px] text-main-white aria-selected:bg-main-red aria-selected:text-main-white">
                    <i class="fa-sharp fa-solid fa-credit-card fa-lg"></i>
                    Financement
                </button>
            </li>
        </ul>
        <div id="myTabContent" class="bg-white pb-10 px-4">
            <div class="sectionChange text-[16px] lg:text-[20px]">
                <div class="py-4">
                    <h3 class="text-main-red text-[20px] lg:text-[36px] font-bold">Développer le back-end d'une
                        application web</h3>
                    <p class="pb-3 text-[16px] text-main-blue font-bold">RNCP31114BC02</p>
                    <ul class="list-outside list-disc ml-10">
                        <li>Créer une base de données</li>
                        <li>Développer les composants d'accès aux données</li>
                        <li>Elaborer et mettre en oeuvre des composants dans une application de gestion de contenu
                            ou
                            e-commerce</li>
                    </ul>
                </div>
                <div class="py-4">
                    <h3 class="text-main-red text-[20px] lg:text-[36px] font-bold">Développer le front-end d'une
                        application web</h3>
                    <p class="pb-3 text-[16px] text-main-blue font-bold">RNCP31114BC01</p>
                    <ul class="list-outside list-disc ml-10">
                        <li>Maquetter une application</li>
                        <li>Réaliser une interface utilisateur web</li>
                        <li>Développer une interface utilisateur web dynamique</li>
                        <li>Réaliser une interface utilisateur avec une solution de gestion de contenu ou e-commerce
                        </li>
                    </ul>
                </div>
            </div>
            <div class="sectionChange hidden px-4 bg-white text-[16px] lg:text-[20px]">
                <div class="py-4">
                    <h3 class="pb-3 text-main-red text-[20px] lg:text-[36px] font-bold">Pas de prérequis mais…</h3>
                    <ul class="list-outside list-disc ml-10">
                        <li>Très forte motivation, à prouver !</li>
                        <li>Découvrir le code soi-même (plateformes d'apprentissage en ligne)</li>
                        <li>Explorer les principaux métiers du numérique, ce qu’ils font, à quoi ils servent</li>
                        <li>Vouloir travailler en équipe</li>
                        <li>Ce que nous cherchons ? De la curiosité, de la créativité, une bonne expression à l’oral
                            et à l’écrit, une représentation claire du métier… et bien sûr, l’envie de s’engager
                            dans une formation intense !</li>
                    </ul>
                </div>
            </div>
            <div class="sectionChange hidden px-4 bg-white text-[16px] lg:text-[20px]">

                <div class="py-4">
                    <h3 class="pb-3 text-main-red text-[20px] lg:text-[36px] font-bold">Phase d’immersion</h3>
                    <ul class="list-outside list-disc ml-10">
                        <li>Les mains dans la tech : mise en place de son environnement de travail, première
                            mise en
                            application de l’algorithmique et de la programmation</li>
                        <li>Contractualisation du parcours entre le formateur et les apprenants</li>
                    </ul>
                </div>
                <div class="py-4">
                    <h3 class="pb-3 text-main-red text-[20px] lg:text-[36px] font-bold">Gestion de projet et qualité
                    </h3>
                    <ul class="list-outside list-disc ml-10">
                        <li>Méthodes agiles et Scrum</li>
                        <li>Qualité web, accessibilité</li>
                        <li>Sécurité et RGPD</li>
                </div>
                <div class="py-4">
                    <h3 class="pb-3 text-main-red text-[20px] lg:text-[36px] font-bold">Fondamentaux
                </div>
                <ul class="list-outside list-disc ml-10">
                    <li>Conception et maquettage d’une application web</li>
                    <li>Développement d’une interface web</li>
                    <li>Développement de la partie back-end</li>
                    <li>Développement de la partie back-end</li>
                </ul>
                <div class="py-4">
                    <h3 class="pb-3 text-main-red text-[20px] lg:text-[36px] font-bold">Approfondissement </h3>
                    <ul class="list-outside list-disc ml-10">
                        <li>Interfaces dynamiques et responsives</li>
                        <li>Patrons de conception et architecture</li>
                        <li>Frameworks avancés</li>
                        <li>L’esprit DevOps</li>
                    </ul>
                </div>
                <div class="py-4">
                    <h3 class="pb-3 text-main-red text-[20px] lg:text-[36px] font-bold">Une formation
                        professionalisante</h3>
                    <ul class="list-outside list-disc ml-10">
                        <li>Parrainage d'une entreprise pour chaque promotion </li>
                        <li>Stage et alternance </li>
                        <li>Simulation d’entretien, job dating </li>
                        <li>Meet-up</li>
                        <li>Participation aux jurys</li>
                    </ul>
                </div>
            </div>
            <div class="sectionChange hidden px-4 bg-white text-[16px] lg:text-[20px]">
                <div class="py-4">
                    <h3 class="pb-3 text-main-red text-[20px] lg:text-[36px] font-bold">Frais de scolarité</h3>
                    <ul class="list-outside list-disc ml-10">
                        <li>Pris en charge par la région Grand Est</li>
                        <li>Rémunération pour l'apprenant (ASP)</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="md:hidden pb-10 text-center">
    <a href="index.php?action=registerPage"
        class="px-10 py-3 text-main-white font-bold text-lg uppercase bg-main-red rounded-lg">
        Postuler à la formation
    </a>
</div>
<section class="bg-main-lightgray pb-5 px-[10%] xl:px-[15%]">
    <div class="pb-3 flex items-center gap-4 text-main-red items-center">
        <i class="fa-sharp fa-solid fa-briefcase fa-2xl"></i>
        <h3 class="text-[30px] lg:text-[40px] font-bold">Métier ciblé</h3>
    </div>
    <div class="pb-5">
        <ul class="ml-10 list-disc text-[16px] lg:text-[20px]">
            <li>Développeur Web et Mobile</li>
            <li>Développeur d'application</li>
            <li>Développeur front</li>
            <li>Développeur backend</li>
        </ul>
    </div>
</section>
<section class="bg-main-lightgray pb-20 px-[10%] xl:px-[15%]">
    <div class="pb-3 flex items-center gap-4 text-main-red">
        <i class="fa fa-sharp fa-solid fa-graduation-cap fa-2xl"></i>
        <h3 class="text-[30px] lg:text-[40px] font-bold">Certifications</h3>
    </div>
    <div class="pb-5">
        <p class="text-[16px] lg:text-[20px] font-bold">Formation certifiante délivrant une certification inscrite
            au Répertoire Spécifique</p>
        <div class="pb-5 flex gap-10 text-[16px] lg:text-[20px] text-main-blue font-bold">
            <p>RS5487</p>
            <p>Gérer un projet en mobilisant les méthodes agiles</p>
        </div>
        <ul class="ml-10 list-disc text-[16px] lg:text-[20px]">
            <li>Domaine : La certification concerne tous les secteurs car les besoins en gestion de projet agile
                sont présents dans tous les domaines</li>
            <li>Possibilité de certification partielle : non</li>
            <li>Durée de validité des composantes acquises : Permanente</li>
            <li>Matérialisation officielle de la certification : Certificat de compétences</li>
        </ul>
    </div>
    <div>
        <p class="text-[16px] lg:text-[20px] text-[16px] lg:text-[20px] font-bold">Certification inscrite au
            Répertoire spécifique</p>
        <div class="pb-5 flex gap-10 text-main-blue font-bold">
            <p>RS5599</p>
            <p>Réaliser des applications web à l’aide d’un système de gestion de contenus</p>
        </div>
        <p class="ml-10 text-[16px] lg:text-[20px]">La certification concerne les professionnels du secteur de la
            communication, du marketing et de la vente.</p>
    </div>
</section>



<?php $content = ob_get_clean(); ?>



<?php ob_start(); ?>
<script src="assets/js/tabs.js"></script>
<?php $script = ob_get_clean(); ?>

<?php require 'view/layout.php'; ?>