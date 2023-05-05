<?php $title = "Connexion"; ?>

<?php ob_start(); ?>

<main>
    <section class="px-5 py-10">
        <h2 class="text-center text-2xl md:text-4xl font-bold font-title text-main-red uppercase pb-5">Développeur Web
            et Web Mobile
        </h2>
        <div class="py-10 md:px-10 lg:px-15 lg:px-20 flex justify-center md:gap-10 lg:gap-20">
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
                            <li>Maquetter une application</li>
                            <li>Maquetter une application</li>

                        </ul>
                    </div>
                </div>
                <div class="hidden px-4 bg-white text-md" id="admission" role="tabpanel"
                    aria-labelledby="admission-tab">

                    <p class="text-sm text-gray-500 dark:text-gray-400">This is some placeholder content the <strong
                            class="font-medium text-gray-800 dark:text-white">Dashboard tab's associated
                            content</strong>.
                        Clicking another tab will toggle the visibility of this one for the next. The tab JavaScript
                        swaps
                        classes to control the content visibility and styling.</p>
                </div>
                <div class="hidden px-4 bg-white text-md" id="program" role="tabpanel" aria-labelledby="program-tab">

                    <p class="text-sm text-gray-500 dark:text-gray-400">This is some placeholder content the <strong
                            class="font-medium text-gray-800 dark:text-white">Settings tab's associated
                            content</strong>.
                        Clicking another tab will toggle the visibility of this one for the next. The tab JavaScript
                        swaps
                        classes to control the content visibility and styling.</p>
                </div>
                <div class="hidden px-4 bg-white text-md" id="financing" role="tabpanel"
                    aria-labelledby="financing-tab">
                    <p class="text-sm text-gray-500 dark:text-gray-400">This is some placeholder content the <strong
                            class="font-medium text-gray-800 dark:text-white">Contacts tab's associated
                            content</strong>.
                        Clicking another tab will toggle the visibility of this one for the next. The tab JavaScript
                        swaps
                        classes to control the content visibility and styling.</p>
                </div>
            </div>
        </div>
    </section>
</main>



<?php $content = ob_get_clean(); ?>



<?php ob_start(); ?>
<script src=""></script>
<?php $script = ob_get_clean(); ?>

<?php require 'view/layout.php'; ?>