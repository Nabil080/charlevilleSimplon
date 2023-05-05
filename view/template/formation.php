<?php $title = "Connexion"; ?>

<?php ob_start(); ?>

<main>
    <section class="px-5 py-10">
        <h2 class="text-center text-2xl md:text-4xl font-bold font-title text-main-red uppercase pb-5">Développeur Web
            et Web Mobile
        </h2>
        <div class="px-10 py-10 md:px-10 lg:px-15 lg:px-20 flex justify-center md:gap-10 lg:gap-20">
            <div
                class="md:w-3/5 lg:w-2/3 xl:w-2/5 md:p-5 md:bg-main-lightgray md:border-2 md:border-gray md:rounded-lg md:shadow-[2px_0_3px_2px_rgba(0,0,0,0.5)]">
                <div class="font-main text-md text-justify">
                    <p class="pb-3">
                        De l’analyse du besoin à la mise en ligne, en passant par l’interface et la base de données,
                        le·la
                        développeur·se web conçoit et programme des applications web.
                    </p>
                    <p class="pb-5">
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

                    <p class="pb-5 font-bold text-main-red">
                        Le métier de développeur Web s’articule alors autour de 2 activités principales :
                    </p>

                    <p class="pb-3">
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
                class="hidden md:flex md:w-1/4 lg:w-1/4 xl:w-1/6 md:p-5 md:border-2 md:border-main-gray md:rounded-lg text-center flex-col gap-10">
                <h5 class="text-lg font-bold">Chiffres clés du secteur</h5>
                <div>
                    <p class="text-4xl text-main-red font-bold pb-3">+ 3.6%</p>
                    <p class="text-sm font-medium">Croissance du secteur du numérique en 2018</p>
                </div>
                <div>
                    <p class="text-4xl text-main-red font-bold pb-3">232 000</p>
                    <p class="text-sm font-medium">postes seraient à pourvoir entre 2017 et 2027</p>
                </div>
                <div>
                    <p class="text-4xl text-main-red font-bold pb-3">49 015 €</p>
                    <p class="text-sm font-medium">revenu annuel brut moyen d'un $nom_de_la_formation</p>
                </div>
            </aside>
        </div>
        <div class="pt-5 pb-20 hidden md:block text-center">
            <a href="index.php?action=registerPage"
                class="px-10 py-5 text-main-white font-bold text-lg uppercase bg-main-red rounded-lg">
                Postuler à la formation</a>
        </div>
    </section>
    <section>
        <img src="assets/img/autres/campus.png" alt="mur du campus" class="w-full img-fluid" />
    </section>
    <section class="py-10 bg-main-lightgray">
        <div class="pt-5 lg:px-20">
            <ul class="grid grid-cols-2 lg:grid-cols-4 " id="myTab" data-tabs-toggle="#myTabContent" role="tablist">
                <li role="presentation" class="border border-white bg-main-gray ">
                    <button
                        class="w-full p-5 inline-flex justify-center items-center gap-5 text-lg md:text-2xl text-main-white aria-selected:bg-main-red aria-selected:text-main-white"
                        id="skill-tab" data-tabs-target="#skill" type="button" role="tab" aria-controls="skill"
                        aria-selected="false">
                        <i class="fa-sharp fa-solid fa-trophy fa-lg"></i>
                        Compétence
                    </button>
                </li>
                <li role="presentation" class="border border-white bg-main-gray">
                    <button
                        class="w-full p-5 inline-flex justify-center items-center gap-5 text-lg md:text-2xl text-main-white aria-selected:bg-main-red aria-selected:text-main-white"
                        id="admission-tab" data-tabs-target="#admission" type="button" role="tab"
                        aria-controls="admission" aria-selected="false">
                        <i class="fa-sharp fa-solid fa-handshake fa-lg"></i>
                        Admission
                    </button>
                </li>
                <li role="presentation" class="border border-white bg-main-gray">
                    <button
                        class="w-full p-5 inline-flex justify-center items-center gap-5 text-lg md:text-2xl text-main-white aria-selected:bg-main-red aria-selected:text-main-white"
                        id="program-tab" data-tabs-target="#program" type="button" role="tab" aria-controls="program"
                        aria-selected="false">
                        <i class="fa-sharp fa-solid fa-book fa-lg"></i>
                        Programme
                    </button>
                </li>
                <li role="presentation" class="border border-white bg-main-gray">
                    <button
                        class="w-full p-5 inline-flex justify-center items-center gap-5 text-lg md:text-2xl text-main-white aria-selected:bg-main-red aria-selected:text-main-white"
                        id="financing-tab" data-tabs-target="#financing" type="button" role="tab"
                        aria-controls="financing" aria-selected="false">
                        <i class="fa-sharp fa-solid fa-credit-card fa-lg"></i>
                        Financement
                    </button>
                </li>
            </ul>
            <div id="myTabContent">
                <div class="hidden px-4 bg-white text-md" id="skill" role="tabpanel" aria-labelledby="skill-tab">
                    <div class="py-4">
                        <div class="pb-2 flex gap-4 items-center text-main-red">
                            <i class="fa-sharp fa-solid fa-tv fa-xl"></i>
                            <h3 class="text-xl font-bold">Développer le back-end d'une application web</h3>
                        </div>
                        <p class="pb-3 text-xs underline">RNCP31114BC02</p>
                        <ul class="list-outside list-disc ml-10">
                            <li>Créer une base de données</li>
                            <li>Développer les composants d'accès aux données</li>
                            <li>Elaborer et mettre en oeuvre des composants dans une application de gestion de contenu
                                ou
                                e-commerce</li>
                        </ul>
                    </div>
                    <div class="py-4">
                        <div class="flex gap-4 items-center text-main-red">
                            <i class="fa-sharp fa-solid fa-paint-roller fa-xl"></i>
                            <h3 class="text-2xl font-bold">Développer le front-end d'une application web</h3>
                        </div>
                        <p class="pb-3 text-xs underline">RNCP31114BC01</p>
                        <ul class="list-outside list-disc ml-10">
                            <li>Maquetter une application</li>
                            <li>Réaliser une interface utilisateur web</li>
                            <li>Développer une interface utilisateur web dynamique</li>
                            <li>Réaliser une interface utilisateur avec une solution de gestion de contenu ou e-commerce
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="hidden px-4 bg-white text-md" id="admission" role="tabpanel"
                    aria-labelledby="admission-tab">
                    <div class="py-4">
                        <div class="pb-2 flex gap-4 items-center text-main-red">
                            <h3 class="text-xl font-bold">Pas de prérequis mais…</h3>
                        </div>
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
                <div class="hidden px-4 bg-white text-md" id="program" role="tabpanel" aria-labelledby="program-tab">

                    <div class="py-4">
                        <div class="pb-2 text-main-red">
                            <h3 class="text-xl font-bold">Phase d’immersion
                            </h3>
                        </div>
                        <ul class="list-outside list-disc ml-10">
                            <li>Les mains dans la tech : mise en place de son environnement de travail, première mise en
                                application de l’algorithmique et de la programmation
                            </li>
                            <li>Contractualisation du parcours entre le formateur et les apprenants
                            </li>
                        </ul>
                    </div>
                    <div class="py-4">
                        <div class="pb-2 text-main-red">
                            <h3 class="text-xl font-bold">Gestion de projet et qualité
                            </h3>
                        </div>
                        <ul class="list-outside list-disc ml-10">
                            <li>Méthodes agiles et Scrum
                            </li>
                            <li>Qualité web, accessibilité
                            </li>
                            <li>Sécurité et RGPD
                            </li>
                    </div>
                    <div class="py-4">
                        <div class="pb-2 text-main-red">
                            <h3 class="text-xl font-bold">Fondamentaux
                            </h3>
                        </div>
                        <ul class="list-outside list-disc ml-10">
                            <li>Conception et maquettage d’une application web
                            </li>
                            <li>Développement d’une interface web
                            </li>
                            <li>Développement de la partie back-end
                            </li>
                            <li>Développement de la partie back-end
                            </li>
                        </ul>
                    </div>
                    <div class="py-4">
                        <div class="pb-2 text-main-red">
                            <h3 class="text-xl font-bold">Approfondissement
                            </h3>
                        </div>
                        <ul class="list-outside list-disc ml-10">
                            <li>Interfaces dynamiques et responsives
                            </li>
                            <li>Patrons de conception et architecture
                            </li>
                            <li>Frameworks avancés
                            </li>
                            <li>L’esprit DevOps
                            </li>
                        </ul>
                    </div>
                    <div class="py-4">
                        <div class="pb-2 text-main-red">
                            <h3 class="text-xl font-bold">Une formation professionalisante
                            </h3>
                        </div>
                        <ul class="list-outside list-disc ml-10">
                            <li>Parrainage d'une entreprise pour chaque promotion
                            </li>
                            <li>Stage et alternance
                            </li>
                            <li>Simulation d’entretien, job dating
                            </li>
                            <li>Meet-up
                            </li>
                            <li>Participation aux jurys
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="hidden px-4 bg-white text-md" id="financing" role="tabpanel"
                    aria-labelledby="financing-tab">
                    <div class="py-4">
                        <div class="pb-2 flex gap-4 items-center text-main-red">
                            <i class="fa-sharp fa-solid fa-tv fa-xl"></i>
                            <h3 class="text-xl font-bold">Pas de prérequis mais…</h3>
                        </div>
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
            </div>
        </div>
    </section>
    <section class="px-10 md:px-20 pb-10 bg-main-lightgray">
        <div class="flex gap-4 items-center text-main-red">
            <i class="fa-sharp fa-solid fa-tv fa-xl"></i>
            <h3 class="text-2xl font-bold">Certifications</h3>
        </div>
        <div class="pb-5">
            <p class="text-lg font-bold">Formation certifiante délivrant une certification inscrite au Répertoire
                Spécifique</p>
            <p class="text-lg font-bold text-cyan-600 pb-4">RS5487 Gérer un projet en mobilisant les méthodes agiles
            </p>
            <ul class="list-outside list-disc ml-10">
                <li>Domaine : La certification concerne tous les secteurs car les besoins en gestion de projet agile
                    sont présents dans tous les domaines
                </li>
                <li>Possibilité de certification partielle : non</li>
                <li>Durée de validité des composantes acquises : Permanente</li>
                <li> Matérialisation officielle de la certification : Certificat de compétences</li>
            </ul>
        </div>
        <div>
            <p class="text-lg font-bold">Certification inscrite au Répertoire spécifique</p>
            <p class="text-lg font-bold text-cyan-600 pb-4">RS5599 Réaliser des applications web à l’aide d’un système
                de gestion de contenus</p>
            <p>La certification concerne les professionnels du secteur de la communication, du marketing et de la vente.
            </p>
        </div>
    </section>
</main>



<?php $content = ob_get_clean(); ?>



<?php ob_start(); ?>
<script src=""></script>
<?php $script = ob_get_clean(); ?>

<?php require 'view/layout.php'; ?>