<?php $title = ""; ?>

<?php ob_start(); ?>


<?php $content = ob_get_clean(); ?>

<h2 class="pt-5 bg-white text-center text-[24px] md:text-[36px] lg:text-[48px] font-semibold font-title text-main-red uppercase">
    Gestion de projet
</h2>
<!-- <h3 class="pb-5 bg-white text-center text-[18px] md:text-[30px] lg:text-[42px] font-semibold font-title">
    Projets non assignés
</h3> -->

<!-- bouton ajouter un projet -->
<a href="?action=addProjectTreatment" class="fixed bottom-6 right-6 rounded-full w-12 h-12 lg:w-24 lg:h-24 border text-main-white bg-main-red border-main-white hover:text-main-red hover:bg-main-white hover:border-main-red grid place-content-center">
    <i class="fa fa-plus"></i>
</a>

<!-- cards projets -->
<section id="project-cards" class="mt-6 px-4 grid gap-6 w-fit mx-auto">

    <!-- projet 1 -->
    <article id="project-1" class="">
        <!-- card projet -->
        <div id="projet-card-1" class="project-card max-w-[1000px] border-2 border-black rounded-lg p-4 md:flex gap-6  md:p-6">
            <!-- partie entreprise desktop -->
            <div class="hidden md:block w-1/3 border-r-2 border-main-gray pr-6">
                <div class="my-2 flex-col">
                    <div class="flex flex-wrap"><p class="font-title font-bold mr-2">Projet fourni par : </p><p><a href="lien vers la société" class="text-main-red underline font-bold text-sm">Pole formation CCI Ardennes</a></p></div>
                    <div class="my-4 grow"><img class="" src="assets/img/logo" alt="logo de l'entreprise"></div>
                    <div class="flex flex-wrap"><p class="font-title font-bold mr-2">Adresse :</p><p class="text-sm pt-0.5 text-left font-light">33 rue de la gare, 08000 Charleville-Mézières</p></div>
                </div>
            </div>
            <!-- partie info projet -->
            <div class="flex-col text-[12px] flex text-end md:w-full">
                <!-- tags projet -->
                <div class="uppercase space-x-4 my-4 [&>tag]:bg-main-gray [&>tag]:bg-opacity-10 [&>tag]:py-2 [&>tag]:px-4 [&>tag]:rounded-full">
                    <tag> html</tag>
                    <tag> css</tag>
                    <tag> react</tag>
                </div>
                <!-- titre projet -->
                <h2 class="font-title text-main-red italic font-bold text-3xl my-2"><a href="lien du projet">Super projet de fou</a></h2>
                <div class="self-end flex w-3/4 justify-between italic border-b border-main-red"><span>Débuté le 25/03/2002</span><span>Fini le 25/03/2002</span></div>
                <!-- contenu projet -->
                <div class="text-base lg:text-xl flex-grow flex-col">
                    <p class="pl-[20%] line-clamp-5 mt-2 mb-4">The best kept secret of The Bahamas is the country’s sheer size and diversity. With 16 major islands, The Bahamas is an unmatched destination The best kept secret of The Bahamas is the country’s sheer size and diversity. With 16 major islands, The Bahamas is an unmatched destination The best kept secret of The Bahamas is the country’s sheer size and diversity. With 16 major islands, The Bahamas is an unmatched destination The best kept secret of The Bahamas is the country’s sheer size and diversity. With 16 major islands, The Bahamas is an unmatched destination The best kept secret of The Bahamas is the country’s sheer size and diversity. With 16 major islands, The Bahamas is an unmatched destination</p>
                    <div id="end" class="mt-auto">
                        <a href="page de la promo" class="bg-main-red py-2 px-4 rounded-full text-main-white my-2 hover:bg-main-white hover:text-main-red hover:border border-main-red">Développeurs Web 2023</a>
                        <div class="space-x-4 mt-4 mb-2 text-sm text-main-white [&>a]:bg-main-gray [&>a]:py-1 [&>a]:px-3 [&>a]:rounded-full">
                            <a href="profil de l'apprenant" class="hover:border border-main-gray hover:text-main-gray hover:bg-main-white">Nabil</a>
                            <a href="profil de l'apprenant" class="hover:border border-main-gray hover:text-main-gray hover:bg-main-white">Alexandre</a>
                            <a href="profil de l'apprenant" class="hover:border border-main-gray hover:text-main-gray hover:bg-main-white">Bryan</a>
                        </div>
                        <a href="lien du projet" class="block float-left text-xs">Voir le projet <i class="fa fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>
            <!-- séparateur mobile-->
            <div class="md:hidden w-4/5 mx-auto bg-main-gray bg-opacity-50 h-0.5 my-4"></div>
            <!-- partie info entreprise mobile-->
            <div class="md:hidden my-2">
                <div class="flex flex-wrap"><p class="font-title font-bold mr-2">Projet fourni par : </p><p><a href="lien vers la société" class="text-main-red underline font-bold text-sm">Pole formation CCI Ardennes</a></p></div>
                <div class="flex flex-wrap"><p class="font-title font-bold mr-2">Adresse :</p><p class="text-sm pt-0.5 text-left font-light">33 rue de la gare, 08000 Charleville-Mézières</p></div>
            </div>
        </div>
        <!-- boutons projet -->
        <form class="mt-6 flex lg:text-lg [&>div]:grid [&>div]:place-content-center">
            <!-- refuser -->
            <div class="w-14  hover:text-main-red cursor-pointer" onclick="deleteProject('project-1')">
                <i class="fa-solid fa-xmark"></i>
            </div>
            <!-- select promo -->
            <div class="grow">
                <select class="w-full" name="promo" id="">
                    <option value="1">Développeurs Web et Web Mobile 2023</option><option value="2">Concepteurs développeurs d'application 2023</option>
                </select>
            </div>
            <!-- accepter -->
            <button type="submit" class="w-14 hover:text-main-red cursor-pointer" onclick="acceptProject('project-1')">
                <i class="fa-solid fa-check"></i>
            </button>
        </form>
    </article>

    <!-- projet 2 -->
    <article id="project-2" class="">
        <!-- card projet -->
        <div id="projet-card-2" class="project-card max-w-[1000px] border-2 border-black rounded-lg p-4 md:flex gap-6  md:p-6">
            <!-- partie entreprise desktop -->
            <div class="hidden md:block w-1/3 border-r-2 border-main-gray pr-6">
                <div class="my-2 flex-col">
                    <div class="flex flex-wrap"><p class="font-title font-bold mr-2">Projet fourni par : </p><p><a href="lien vers la société" class="text-main-red underline font-bold text-sm">Pole formation CCI Ardennes</a></p></div>
                    <div class="my-4 grow"><img class="" src="assets/img/logo" alt="logo de l'entreprise"></div>
                    <div class="flex flex-wrap"><p class="font-title font-bold mr-2">Adresse :</p><p class="text-sm pt-0.5 text-left font-light">33 rue de la gare, 08000 Charleville-Mézières</p></div>
                </div>
            </div>
            <!-- partie info projet -->
            <div class="flex-col text-[12px] flex text-end md:w-full">
                <!-- tags projet -->
                <div class="uppercase space-x-4 my-4 [&>tag]:bg-main-gray [&>tag]:bg-opacity-10 [&>tag]:py-2 [&>tag]:px-4 [&>tag]:rounded-full">
                    <tag>html</tag>
                    <tag>css</tag>
                    <tag>react</tag>
                </div>
                <!-- titre projet -->
                <h2 class="font-title text-main-red italic font-bold text-3xl my-2"><a href="lien du projet">Super projet de fou</a></h2>
                <div class="self-end flex w-3/4 justify-between italic border-b border-main-red"><span>Débuté le 25/03/2002</span><span>Fini le 25/03/2002</span></div>
                <!-- contenu projet -->
                <div class="text-base flex-grow flex-col">
                    <p class="pl-[20%] line-clamp-5 mt-2 mb-4">The best kept secret of The Bahamas is the country’s sheer size and diversity. With 16 major islands, The Bahamas is an unmatched destination The best kept secret of The Bahamas is the country’s sheer size and diversity. With 16 major islands, The Bahamas is an unmatched destination The best kept secret of The Bahamas is the country’s sheer size and diversity. With 16 major islands, The Bahamas is an unmatched destination The best kept secret of The Bahamas is the country’s sheer size and diversity. With 16 major islands, The Bahamas is an unmatched destination The best kept secret of The Bahamas is the country’s sheer size and diversity. With 16 major islands, The Bahamas is an unmatched destination</p>
                    <div id="end" class="mt-auto">
                        <a href="page de la promo" class="bg-main-red py-2 px-4 rounded-full text-main-white my-2 hover:bg-main-white hover:text-main-red hover:border border-main-red">Développeurs Web 2023</a>
                        <div class="space-x-4 mt-4 mb-2 text-sm text-main-white [&>a]:bg-main-gray [&>a]:py-1 [&>a]:px-3 [&>a]:rounded-full">
                            <a href="profil de l'apprenant" class="hover:border border-main-gray hover:text-main-gray hover:bg-main-white">Nabil</a>
                            <a href="profil de l'apprenant" class="hover:border border-main-gray hover:text-main-gray hover:bg-main-white">Alexandre</a>
                            <a href="profil de l'apprenant" class="hover:border border-main-gray hover:text-main-gray hover:bg-main-white">Bryan</a>
                        </div>
                        <a href="lien du projet" class="block float-left text-xs">Voir le projet <i class="fa fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>
            <!-- séparateur mobile-->
            <div class="md:hidden w-4/5 mx-auto bg-main-gray bg-opacity-50 h-0.5 my-4"></div>
            <!-- partie info entreprise mobile-->
            <div class="md:hidden my-2">
                <div class="flex flex-wrap"><p class="font-title font-bold mr-2">Projet fourni par : </p><p><a href="lien vers la société" class="text-main-red underline font-bold text-sm">Pole formation CCI Ardennes</a></p></div>
                <div class="flex flex-wrap"><p class="font-title font-bold mr-2">Adresse :</p><p class="text-sm pt-0.5 text-left font-light">33 rue de la gare, 08000 Charleville-Mézières</p></div>
            </div>
        </div>
        <!-- boutons projet -->
        <form class="mt-6 flex lg:text-lg [&>div]:grid [&>div]:place-content-center">
            <!-- supprimer -->
            <div class="w-14  hover:text-main-red cursor-pointer" onclick="deleteProject('project-2')">
                <i class="fa-solid fa-trash"></i>
            </div>
            <!-- select promo -->
            <div class="grow">
                <select class="w-full" name="user[]" id="">
                    <option value="1">Nabil</option><option value="2">Alexandre</option><option value="2">Bryan</option><option value="2">Florian</option>
                </select>
            </div>
            <!-- accepter -->
            <button type="submit" class="w-14 hover:text-main-red cursor-pointer" onclick="assignProject('project-2')">
                <i class="fa-solid fa-check"></i>
            </button>
        </form>
    </article>

    <!-- projet 3 -->
    <article id="project-3" class="relative mt-2">
        <!-- statut projet -->
        <div class="absolute -top-8">Statut du projet : En attente <i class="fa fa-circle text-orange-400"></i></div>
        <!-- card projet -->
        <div id="projet-card-3" class="project-card max-w-[1000px] border-2 border-black rounded-lg p-4 md:flex gap-6  md:p-6">
            <!-- partie entreprise desktop -->
            <div class="hidden md:block w-1/3 border-r-2 border-main-gray pr-6">
                <div class="my-2 flex-col">
                    <div class="flex flex-wrap"><p class="font-title font-bold mr-2">Projet fourni par : </p><p><a href="lien vers la société" class="text-main-red underline font-bold text-sm">Pole formation CCI Ardennes</a></p></div>
                    <div class="my-4 grow"><img class="" src="assets/img/logo" alt="logo de l'entreprise"></div>
                    <div class="flex flex-wrap"><p class="font-title font-bold mr-2">Adresse :</p><p class="text-sm pt-0.5 text-left font-light">33 rue de la gare, 08000 Charleville-Mézières</p></div>
                </div>
            </div>
            <!-- partie info projet -->
            <div class="flex-col text-[12px] flex text-end md:w-full">
                <!-- tags projet -->
                <div class="uppercase space-x-4 my-4 [&>tag]:bg-main-gray [&>tag]:bg-opacity-10 [&>tag]:py-2 [&>tag]:px-4 [&>tag]:rounded-full">
                    <tag> html</tag>
                    <tag> css</tag>
                    <tag> react</tag>
                </div>
                <!-- titre projet -->
                <h2 class="font-title text-main-red italic font-bold text-3xl my-2"><a href="lien du projet">Super projet de fou</a></h2>
                <div class="self-end flex w-3/4 justify-between italic border-b border-main-red"><span>Débuté le 25/03/2002</span><span>Fini le 25/03/2002</span></div>
                <!-- contenu projet -->
                <div class="text-base flex-grow flex-col">
                    <p class="pl-[20%] line-clamp-5 mt-2 mb-4">The best kept secret of The Bahamas is the country’s sheer size and diversity. With 16 major islands, The Bahamas is an unmatched destination The best kept secret of The Bahamas is the country’s sheer size and diversity. With 16 major islands, The Bahamas is an unmatched destination The best kept secret of The Bahamas is the country’s sheer size and diversity. With 16 major islands, The Bahamas is an unmatched destination The best kept secret of The Bahamas is the country’s sheer size and diversity. With 16 major islands, The Bahamas is an unmatched destination The best kept secret of The Bahamas is the country’s sheer size and diversity. With 16 major islands, The Bahamas is an unmatched destination</p>
                    <div id="end" class="mt-auto">
                        <a href="page de la promo" class="bg-main-red py-2 px-4 rounded-full text-main-white my-2 hover:bg-main-white hover:text-main-red hover:border border-main-red">Développeurs Web 2023</a>
                        <div class="space-x-4 mt-4 mb-2 text-sm text-main-white [&>a]:bg-main-gray [&>a]:py-1 [&>a]:px-3 [&>a]:rounded-full">
                            <a href="profil de l'apprenant" class="hover:border border-main-gray hover:text-main-gray hover:bg-main-white">Nabil</a>
                            <a href="profil de l'apprenant" class="hover:border border-main-gray hover:text-main-gray hover:bg-main-white">Alexandre</a>
                            <a href="profil de l'apprenant" class="hover:border border-main-gray hover:text-main-gray hover:bg-main-white">Bryan</a>
                        </div>
                        <a href="lien du projet" class="block float-left text-xs">Voir le projet <i class="fa fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>
            <!-- séparateur mobile-->
            <div class="md:hidden w-4/5 mx-auto bg-main-gray bg-opacity-50 h-0.5 my-4"></div>
            <!-- partie info entreprise mobile-->
            <div class="md:hidden my-2">
                <div class="flex flex-wrap"><p class="font-title font-bold mr-2">Projet fourni par : </p><p><a href="lien vers la société" class="text-main-red underline font-bold text-sm">Pole formation CCI Ardennes</a></p></div>
                <div class="flex flex-wrap"><p class="font-title font-bold mr-2">Adresse :</p><p class="text-sm pt-0.5 text-left font-light">33 rue de la gare, 08000 Charleville-Mézières</p></div>
            </div>
        </div>
        <!-- boutons projet -->
        <form class="mt-6 flex justify-between [&>div]:grid [&>div]:place-content-center">
            <!-- supprimer -->
            <div class=" flex hover:text-main-red cursor-pointer" onclick="deleteProject('project-3')">
                <p><i class="fa-solid fa-trash"></i> Supprimer</p>
            </div>
            <!-- Modifier-->
            <div type="submit" class="whitespace-nowrap hover:text-main-red cursor-pointer" onclick="updateProject('project-3')">
                <p>Modifier <i class="fa-solid fa-pen-to-square"></i></p>
            </div>
        </form>
    </article>


</section>

<?php ob_start(); ?>
<script src="assets/js/ajax_register.js"></script>
<?php $script = ob_get_clean(); ?>

<?php require 'view/layout.php'; ?>