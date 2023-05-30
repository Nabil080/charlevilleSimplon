<?php $title = ""; ?>

<?php ob_start(); ?>

<h2 class="pt-5 bg-white text-center text-[24px] md:text-[36px] lg:text-[48px] font-semibold font-title text-main-red uppercase">
    Gestion de projet
</h2>
<!-- <h3 class="pb-5 bg-white text-center text-[18px] md:text-[30px] lg:text-[42px] font-semibold font-title">
    Projets non assignés
</h3> -->

<!-- bouton ajouter un projet -->
<div class="fixed bottom-6 right-6 flex gap-2">
    <p class="h-fit my-auto lg:text-xl">Soumettre un projet</p>
    <a href="?action=addProjectTreatment" class="animate-pulse rounded-full w-12 h-12 lg:!w-24 lg:!h-24 border-4 text-main-white bg-main-gray border-main-white hover:text-main-gray hover:bg-main-white hover:border-main-gray grid place-content-center">
        <i class="fa fa-plus lg:text-3xl"></i>
    </a>
</div>

<!-- cards projets -->
<section id="project-cards" class="px-4 grid w-fit mx-auto">
<div class="w-4/5 h-1 border-b-2 mb-12 mx-auto"></div>
    <?php $i = 0;
        $x = 0;
        $y = 0;
        if ($_SESSION['user']->role->id == 2) {
            foreach ($projects as $projets) { 
                foreach ($projets as $project) {
                include('view/template/_gestion_project_card.php');
                $x ++;
            }
        }} else {
        foreach ($projects as $project) { 
            include('view/template/_gestion_project_card.php');
            $x ++;
        }} ?>
    <!-- projet 2 -->
    <article id="project-2" class="">
        <!-- card projet -->
                <!-- card projet -->
                <div id="projet-card-2" class="project-card max-w-[1000px] border-2 border-black rounded-lg p-4 md:flex gap-6  md:p-6">
            <!-- partie entreprise desktop -->
            <div class="hidden md:block w-2/5 border-r-2 border-main-gray pr-4">
                <div class="my-2 flex-col text-lg lg:text-xl">
                    <div class="flex flex-wrap"><p class="font-title font-bold mr-2">Projet fourni par : </p><p><a href="lien vers la société" class="text-main-red underline font-bold text-base lg:!text-lg xl:!text-xl">Pole formation CCI Ardennes</a></p></div>
                    <div class="my-4 grow"><img class="" src="assets/img/logo" alt="logo de l'entreprise"></div>
                    <div class="flex flex-wrap"><p class="font-title font-bold mr-2">Adresse :</p><p class="text-sm lg:!text-base xl:!text-lg pt-0.5 text-left font-light">33 rue de la gare, 08000 Charleville-Mézières</p></div>
                </div>
            </div>
            <!-- partie info projet -->
            <div class="flex-col text-[12px] lg:text-base flex text-end md:w-full">
                <!-- tags projet -->
                <div class="uppercase space-x-4 my-4 [&>tag]:bg-main-gray [&>tag]:bg-opacity-10 [&>tag]:py-2 [&>tag]:px-4 [&>tag]:rounded-full">
                    <tag> html</tag>
                    <tag> css</tag>
                    <tag> react</tag>
                </div>
                <!-- titre projet -->
                <h2 class="font-title text-main-red italic font-bold text-3xl md:!text-[40px] lg:!text-[46px] my-2 lg:!my-6"><a href="lien du projet">Super projet de fou</a></h2>
                <div class="self-end flex w-3/4 justify-between italic border-b border-main-red"><span>Débuté le 25/03/2002</span><span>Fini le 25/03/2002</span></div>
                <!-- contenu projet -->
                <div class="text-base md:text-lg lg:text-xl flex-grow flex-col">
                    <p class="pl-[10%] line-clamp-5 lg:line-clamp-6 mt-2 mb-4">The best kept secret of The Bahamas is the country’s sheer size and diversity. With 16 major islands, The Bahamas is an unmatched destination The best kept secret of The Bahamas is the country’s sheer size and diversity. With 16 major islands, The Bahamas is an unmatched destination The best kept secret of The Bahamas is the country’s sheer size and diversity. With 16 major islands, The Bahamas is an unmatched destination The best kept secret of The Bahamas is the country’s sheer size and diversity. With 16 major islands, The Bahamas is an unmatched destination The best kept secret of The Bahamas is the country’s sheer size and diversity. With 16 major islands, The Bahamas is an unmatched destination</p>
                    <div id="end" class="mt-auto lg:mt-8">
                        <a href="page de la promo" class="bg-main-red py-2 px-4 rounded-full text-main-white my-2 hover:bg-main-white hover:text-main-red hover:border border-main-red">Développeurs Web 2023</a>
                        <div class="space-x-4 mt-4 mb-2 text-sm md:!text-base lg:!text-lg text-main-white [&>a]:bg-main-gray [&>a]:py-1 [&>a]:px-3 [&>a]:rounded-full">
                            <a href="profil de l'apprenant" class="hover:border border-main-gray hover:text-main-gray hover:bg-main-white">Nabil</a>
                            <a href="profil de l'apprenant" class="hover:border border-main-gray hover:text-main-gray hover:bg-main-white">Alexandre</a>
                            <a href="profil de l'apprenant" class="hover:border border-main-gray hover:text-main-gray hover:bg-main-white">Bryan</a>
                        </div>
                        <a href="lien du projet" class="block float-left text-xs md:!text-base lg:!text-lg ">Voir le projet <i class="fa fa-arrow-right"></i></a>
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
            <div class="w-fit px-6 md:!flex gap-2 md:items-center hover:text-main-red cursor-pointer" onclick="deleteProject('project-2')">
                <i class="fa-solid fa-trash"></i><p class="hidden md:block"> Supprimer </p>
            </div>
            <!-- select promo -->
            <div class="grow">
                <div data-dropdown-toggle="user-dropdown" class="text-center w-full cursor-pointer">Sélectionner les apprenants <i class="fa fa-chevron-down"></i></div>
                <select id="user-dropdown" multiple class="hidden z-20 w-fit" name="user[]" id="">
                    <option value="1">Nabil</option><option value="2">Alexandre</option><option value="2">Bryan</option><option value="2">Florian</option>
                </select>
            </div>
            <!-- accepter -->
            <button type="submit" class="w-fit px-6 md:flex md:items-center gap-2 hover:text-main-red cursor-pointer" onclick="acceptProject('project-2')">
                <p class="hidden md:block"> Attribuer</p><i class="fa-solid fa-check"></i>
            </button>
        </form>
        <div class="w-4/5 h-1 border-b-2 my-12 mx-auto"></div>
    </article>

    <!-- projet 3 -->
    <article id="project-3" class="relative mt-2">
        <!-- statut projet -->
        <div class="absolute -top-8 italic font-bold text-xl">Statut du projet : En attente <i class="fa fa-circle text-orange-400 animate-pulse"></i></div>
        <!-- card projet -->
                <!-- card projet -->
                <div id="projet-card-3" class="project-card max-w-[1000px] border-2 border-black rounded-lg p-4 md:flex gap-6  md:p-6">
            <!-- partie entreprise desktop -->
            <div class="hidden md:block w-2/5 border-r-2 border-main-gray pr-4">
                <div class="my-2 flex-col text-lg lg:text-xl">
                    <div class="flex flex-wrap"><p class="font-title font-bold mr-2">Projet fourni par : </p><p><a href="lien vers la société" class="text-main-red underline font-bold text-base lg:!text-lg xl:!text-xl">Pole formation CCI Ardennes</a></p></div>
                    <div class="my-4 grow"><img class="" src="assets/img/logo" alt="logo de l'entreprise"></div>
                    <div class="flex flex-wrap"><p class="font-title font-bold mr-2">Adresse :</p><p class="text-sm lg:!text-base xl:!text-lg pt-0.5 text-left font-light">33 rue de la gare, 08000 Charleville-Mézières</p></div>
                </div>
            </div>
            <!-- partie info projet -->
            <div class="flex-col text-[12px] lg:text-base flex text-end md:w-full">
                <!-- tags projet -->
                <div class="uppercase space-x-4 my-4 [&>tag]:bg-main-gray [&>tag]:bg-opacity-10 [&>tag]:py-2 [&>tag]:px-4 [&>tag]:rounded-full">
                    <tag> html</tag>
                    <tag> css</tag>
                    <tag> react</tag>
                </div>
                <!-- titre projet -->
                <h2 class="font-title text-main-red italic font-bold text-3xl md:!text-[40px] lg:!text-[46px] my-2 lg:!my-6"><a href="lien du projet">Super projet de fou</a></h2>
                <div class="self-end flex w-3/4 justify-between italic border-b border-main-red"><span>Débuté le 25/03/2002</span><span>Fini le 25/03/2002</span></div>
                <!-- contenu projet -->
                <div class="text-base md:text-lg lg:text-xl flex-grow flex-col">
                    <p class="pl-[10%] line-clamp-5 lg:line-clamp-6 mt-2 mb-4">The best kept secret of The Bahamas is the country’s sheer size and diversity. With 16 major islands, The Bahamas is an unmatched destination The best kept secret of The Bahamas is the country’s sheer size and diversity. With 16 major islands, The Bahamas is an unmatched destination The best kept secret of The Bahamas is the country’s sheer size and diversity. With 16 major islands, The Bahamas is an unmatched destination The best kept secret of The Bahamas is the country’s sheer size and diversity. With 16 major islands, The Bahamas is an unmatched destination The best kept secret of The Bahamas is the country’s sheer size and diversity. With 16 major islands, The Bahamas is an unmatched destination</p>
                    <div id="end" class="mt-auto lg:mt-8">
                        <a href="page de la promo" class="bg-main-red py-2 px-4 rounded-full text-main-white my-2 hover:bg-main-white hover:text-main-red hover:border border-main-red">Développeurs Web 2023</a>
                        <div class="space-x-4 mt-4 mb-2 text-sm md:!text-base lg:!text-lg text-main-white [&>a]:bg-main-gray [&>a]:py-1 [&>a]:px-3 [&>a]:rounded-full">
                            <a href="profil de l'apprenant" class="hover:border border-main-gray hover:text-main-gray hover:bg-main-white">Nabil</a>
                            <a href="profil de l'apprenant" class="hover:border border-main-gray hover:text-main-gray hover:bg-main-white">Alexandre</a>
                            <a href="profil de l'apprenant" class="hover:border border-main-gray hover:text-main-gray hover:bg-main-white">Bryan</a>
                        </div>
                        <a href="lien du projet" class="block float-left text-xs md:!text-base lg:!text-lg ">Voir le projet <i class="fa fa-arrow-right"></i></a>
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
        <div class="w-4/5 h-1 border-b-2 my-12 mx-auto"></div>
    </article>

        <!-- projet 4 -->
        <article id="project-4" class="relative mt-2">
        <!-- statut projet -->
        <div class="absolute -top-8 italic font-bold text-xl">Statut du projet : En cours <i class="fa fa-circle text-green-400 animate-pulse"></i></div>
        <!-- card projet -->
                <!-- card projet -->
                <div id="projet-card-4" class="project-card max-w-[1000px] border-2 border-black rounded-lg p-4 md:flex gap-6  md:p-6">
            <!-- partie entreprise desktop -->
            <div class="hidden md:block w-2/5 border-r-2 border-main-gray pr-4">
                <div class="my-2 flex-col text-lg lg:text-xl">
                    <div class="flex flex-wrap"><p class="font-title font-bold mr-2">Projet fourni par : </p><p><a href="lien vers la société" class="text-main-red underline font-bold text-base lg:!text-lg xl:!text-xl">Pole formation CCI Ardennes</a></p></div>
                    <div class="my-4 grow"><img class="" src="assets/img/logo" alt="logo de l'entreprise"></div>
                    <div class="flex flex-wrap"><p class="font-title font-bold mr-2">Adresse :</p><p class="text-sm lg:!text-base xl:!text-lg pt-0.5 text-left font-light">33 rue de la gare, 08000 Charleville-Mézières</p></div>
                </div>
            </div>
            <!-- partie info projet -->
            <div class="flex-col text-[12px] lg:text-base flex text-end md:w-full">
                <!-- tags projet -->
                <div class="uppercase space-x-4 my-4 [&>tag]:bg-main-gray [&>tag]:bg-opacity-10 [&>tag]:py-2 [&>tag]:px-4 [&>tag]:rounded-full">
                    <tag> html</tag>
                    <tag> css</tag>
                    <tag> react</tag>
                </div>
                <!-- titre projet -->
                <h2 class="font-title text-main-red italic font-bold text-3xl md:!text-[40px] lg:!text-[46px] my-2 lg:!my-6"><a href="lien du projet">Super projet de fou</a></h2>
                <div class="self-end flex w-3/4 justify-between italic border-b border-main-red"><span>Débuté le 25/03/2002</span><span>Fini le 25/03/2002</span></div>
                <!-- contenu projet -->
                <div class="text-base md:text-lg lg:text-xl flex-grow flex-col">
                    <p class="pl-[10%] line-clamp-5 lg:line-clamp-6 mt-2 mb-4">The best kept secret of The Bahamas is the country’s sheer size and diversity. With 16 major islands, The Bahamas is an unmatched destination The best kept secret of The Bahamas is the country’s sheer size and diversity. With 16 major islands, The Bahamas is an unmatched destination The best kept secret of The Bahamas is the country’s sheer size and diversity. With 16 major islands, The Bahamas is an unmatched destination The best kept secret of The Bahamas is the country’s sheer size and diversity. With 16 major islands, The Bahamas is an unmatched destination The best kept secret of The Bahamas is the country’s sheer size and diversity. With 16 major islands, The Bahamas is an unmatched destination</p>
                    <div id="end" class="mt-auto lg:mt-8">
                        <a href="page de la promo" class="bg-main-red py-2 px-4 rounded-full text-main-white my-2 hover:bg-main-white hover:text-main-red hover:border border-main-red">Développeurs Web 2023</a>
                        <div class="space-x-4 mt-4 mb-2 text-sm md:!text-base lg:!text-lg text-main-white [&>a]:bg-main-gray [&>a]:py-1 [&>a]:px-3 [&>a]:rounded-full">
                            <a href="profil de l'apprenant" class="hover:border border-main-gray hover:text-main-gray hover:bg-main-white">Nabil</a>
                            <a href="profil de l'apprenant" class="hover:border border-main-gray hover:text-main-gray hover:bg-main-white">Alexandre</a>
                            <a href="profil de l'apprenant" class="hover:border border-main-gray hover:text-main-gray hover:bg-main-white">Bryan</a>
                        </div>
                        <a href="lien du projet" class="block float-left text-xs md:!text-base lg:!text-lg ">Voir le projet <i class="fa fa-arrow-right"></i></a>
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
            <div class=" flex hover:text-main-red cursor-pointer" onclick="deleteProject('project-4')">
                <p><i class="fa-solid fa-trash"></i> Supprimer</p>
            </div>
            <!-- Modifier-->
            <div type="submit" class="whitespace-nowrap hover:text-main-red cursor-pointer" onclick="updateProject('project-4')">
                <p>Modifier <i class="fa-solid fa-pen-to-square"></i></p>
            </div>
        </form>
        <div class="w-4/5 h-1 border-b-2 my-12 mx-auto"></div>
    </article>

</section>

<?php $content = ob_get_clean(); ?>



<?php ob_start(); ?>
<script src="assets/js/ajax_gestion_project.js"></script>
<?php $script = ob_get_clean(); ?>

<?php require 'view/layout.php'; ?>