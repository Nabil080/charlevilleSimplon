<?php $title = "Les projets"; ?>

<?php ob_start(); ?>

<div class="h-20">Séparation nav bar</div>

<h1 class="px-4 text-main-red font-title font-semibold text-center text-2xl">Les projets réalisés à <span class="italic">Simplon Charleville</span></h1>

<!-- section tous les projets -->
<section id="all-projects" class="px-4">
    <!-- barre de recherche -->
    <div class="relative w-full mt-4">
        <input id="project-search" class="border-main-red rounded-lg w-full pl-10 py-4 placeholder:text-black focus:border-green-50" placeholder="Votre recherche" type="search" oninput="searchByInputAndClassName(this,'project-card')">
        <i class="fa fa-search absolute top-0 left-0 w-10 text-center text-xl py-4"></i>
    </div>
    <!-- boutons de filtre -->
    <span class="text-main-red text-xs py-0.5">Filtrer par :</span>
    <div class="flex justify-start text-sm gap-x-4 sm:[&>button]:w-1/4 [&>button]:px-4 [&>button]:py-2 [&>button]:border-main-red [&>button]:border [&>button]:rounded-lg">
        <button data-dropdown-toggle="dropdown-formation" data-dropdown-offset-distance="0" class="relative"><i class="fa fa-filter text-xs"></i> Formation</button>
        <!-- dropdown formations -->
            <div id="dropdown-formation" class="hidden w-[113.33px] sm:w-[24.5%] text-start bg-main-white border-t-transparent border-main-red border">
                <div class="flex gap-2 text-xs my-2 px-2"><input class="my-auto" id="dev" type="checkbox" value="dev"><label for="dev">Développeur Web et Web Mobile</label></div>
                <div class="flex gap-2 text-xs my-2 px-2"><input class="my-auto" id="cda" type="checkbox" value="cda"><label for="cda">Concepteur développeur d'applications</label></div>
                <div class="flex gap-2 text-xs my-2 px-2"><input class="my-auto" id="tssr" type="checkbox" value="tssr"><label for="tssr">Technicien supérieur système et réseaux</label></div>
                <div class="flex gap-2 text-xs my-2 px-2"><input class="my-auto" id="ref-dig" type="checkbox" value="ref-dig"><label for="ref-dig">Référent digital</label></div>
            </div>
        <button data-dropdown-toggle="dropdown-years" data-dropdown-offset-distance="0" class="relative"><i class="fa fa-filter text-xs"></i> Années</button>
         <!-- dropdown années -->
            <div id="dropdown-years" class="hidden w-[96.08px] sm:w-[24.5%] text-start bg-main-white border-t-transparent border-main-red border">
                <div class="flex gap-2 text-xs my-2 px-2"><input class="my-auto" id="2023" type="checkbox" value="2023"><label for="2023">2023</label></div>
                <div class="flex gap-2 text-xs my-2 px-2"><input class="my-auto" id="2022" type="checkbox" value="2022"><label for="2022">2022</label></div>
                <div class="flex gap-2 text-xs my-2 px-2"><input class="my-auto" id="2021" type="checkbox" value="2021"><label for="2021">2021</label></div>
                <div class="flex gap-2 text-xs my-2 px-2"><input class="my-auto" id="2020" type="checkbox" value="2020"><label for="2020">2020</label></div>
            </div>
            <button data-dropdown-toggle="dropdown-level" data-dropdown-offset-distance="0" class="relative"><i class="fa fa-filter text-xs"></i> Niveau</button>
            <!-- dropdown niveau -->
            <div id="dropdown-level" class="hidden w-[92.3px] sm:w-[24.5%] text-start bg-main-white border-t-transparent border-main-red border">
                <div class="flex gap-2 text-xs my-2 px-2"><input class="my-auto" id="bac+1" type="checkbox" value="bac+1"><label for="bac+1">Bac+1</label></div>
                <div class="flex gap-2 text-xs my-2 px-2"><input class="my-auto" id="bac+2" type="checkbox" value="bac+2"><label for="bac+2">Bac+2</label></div>
                <div class="flex gap-2 text-xs my-2 px-2"><input class="my-auto" id="bac+3" type="checkbox" value="bac+3"><label for="bac+3">Bac+3</label></div>
                <div class="flex gap-2 text-xs my-2 px-2"><input class="my-auto" id="bac+4" type="checkbox" value="bac+4"><label for="bac+4">Bac+4</label></div>
                <div class="flex gap-2 text-xs my-2 px-2"><input class="my-auto" id="bac+5" type="checkbox" value="bac+5"><label for="bac+5">Bac+5</label></div>
            </div>
    </div>
    <span onclick="resetProjectFilters()" class="text-main-red text-xs py-0.5 cursor-pointer underline hover:text-red-700">Réinitialiser les filtres</span>

    <h3 class="my-4 text-main-red">10 projets affichés sur 72</h3>

    <!-- card projet 1 -->
    <article id="projet-card-1" class="project-card border-2 border-black rounded-lg p-4 mb-8">
        <!-- partie info projet -->
        <div class="flex-col text-[12px] flex justify-end text-end">
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
            <div class="text-base">
                <p class="pl-[20%] line-clamp-5 mt-2 mb-4">The best kept secret of The Bahamas is the country’s sheer size and diversity. With 16 major islands, The Bahamas is an unmatched destination...</p>
                <a href="page de la promo" class="bg-main-red py-2 px-4 rounded-full text-main-white my-2 hover:bg-main-white hover:text-main-red hover:border border-main-red">Développeurs Web 2023</a>
                <div class="space-x-4 mt-4 mb-2 text-sm text-main-white [&>a]:bg-main-gray [&>a]:py-1 [&>a]:px-3 [&>a]:rounded-full">
                    <a href="profil de l'apprenant" class="hover:border border-main-gray hover:text-main-gray hover:bg-main-white">Nabil</a>
                    <a href="profil de l'apprenant" class="hover:border border-main-gray hover:text-main-gray hover:bg-main-white">Alexandre</a>
                    <a href="profil de l'apprenant" class="hover:border border-main-gray hover:text-main-gray hover:bg-main-white">Bryan</a>
                </div>
                <a href="lien du projet" class="block float-left text-xs">Voir le projet <i class="fa fa-arrow-right"></i></a>
            </div>
        </div>
        <!-- séparateur -->
        <div class="w-4/5 mx-auto bg-main-gray bg-opacity-50 h-0.5 my-4"></div>
        <!-- partie info entreprise -->
        <div class="my-2">
            <div class="flex flex-wrap"><p class="font-title font-bold mr-2">Projet fourni par : </p><p><a href="lien vers la société" class="text-main-red underline font-bold text-sm">Pole formation CCI Ardennes</a></p></div>
            <div class="flex flex-wrap"><p class="font-title font-bold mr-2">Adresse :</p><p class="text-sm pt-0.5 text-left font-light">33 rue de la gare, 08000 Charleville-Mézières</p></div>
        </div>
    </article>


    <!-- card projet 2 -->
    <article id="projet-card-2" class="project-card border-2 border-black rounded-lg p-4 mb-8">
        <!-- partie info projet -->
        <div class="flex-col text-[12px] flex justify-end text-end">
            <!-- tags projet -->
            <div class="uppercase space-x-4 my-4 [&>tag]:bg-main-gray [&>tag]:bg-opacity-10 [&>tag]:py-2 [&>tag]:px-4 [&>tag]:rounded-full">
                <tag> php</tag>
                <tag> oop</tag>
                <tag> symfony</tag>
            </div>
            <!-- titre projet -->
            <h2 class="font-title text-main-red italic font-bold text-3xl my-2"><a href="lien du projet">Projet McDo</a></h2>
            <div class="self-end flex w-3/4 justify-between italic border-b border-main-red"><span>Débuté le 25/03/2002</span><span>Fini le 25/03/2002</span></div>
            <!-- contenu projet -->
            <div class="text-base">
                <p class="pl-[20%] line-clamp-5 mt-2 mb-4">The best kept secret of The Bahamas is the country’s sheer size and diversity. With 16 major islands, The Bahamas is an unmatched destination...</p>
                <a href="page de la promo" class="bg-main-red py-2 px-4 rounded-full text-main-white my-2 hover:bg-main-white hover:text-main-red hover:border border-main-red">Référents digitals 2023</a>
                <div class="space-x-4 mt-4 mb-2 text-sm text-main-white [&>a]:bg-main-gray [&>a]:py-1 [&>a]:px-3 [&>a]:rounded-full">
                    <a href="profil de l'apprenant" class="hover:border border-main-gray hover:text-main-gray hover:bg-main-white">Florian</a>
                </div>
                <a href="lien du projet" class="block float-left text-xs">Voir le projet <i class="fa fa-arrow-right"></i></a>
            </div>
        </div>
        <!-- séparateur -->
        <div class="w-4/5 mx-auto bg-main-gray bg-opacity-50 h-0.5 my-4"></div>
        <!-- partie info entreprise -->
        <div class="my-2">
            <div class="flex flex-wrap"><p class="font-title font-bold mr-2">Projet fourni par : </p><p><a href="lien vers la société" class="text-main-red underline font-bold text-sm">McDonald's Charleville</a></p></div>
            <div class="flex flex-wrap"><p class="font-title font-bold mr-2">Adresse :</p><p class="text-sm pt-0.5 text-left font-light">1 Allée de la Cardamine 08000 LA FRANCHEVILLE</p></div>
        </div>
    </article>


    <!-- card projet 3 -->
    <article id="projet-card-3" class="project-card border-2 border-black rounded-lg p-4 mb-8">
        <!-- partie info projet -->
        <div class="flex-col text-[12px] flex justify-end text-end">
            <!-- tags projet -->
            <div class="uppercase space-x-4 my-4 [&>tag]:bg-main-gray [&>tag]:bg-opacity-10 [&>tag]:py-2 [&>tag]:px-4 [&>tag]:rounded-full">
                <tag> html</tag>
                <tag> css</tag>
                <tag> react</tag>
            </div>
            <!-- titre projet -->
            <h2 class="font-title text-main-red italic font-bold text-3xl my-2"><a href="lien du projet">TEMA LE PROJET</a></h2>
            <div class="self-end flex w-3/4 justify-between italic border-b border-main-red"><span>Débuté le 25/03/2002</span><span>Fini le 25/03/2002</span></div>
            <!-- contenu projet -->
            <div class="text-base">
                <p class="pl-[20%] line-clamp-5 mt-2 mb-4">The best kept secret of The Bahamas is the country’s sheer size and diversity. With 16 major islands, The Bahamas is an unmatched destination...</p>
                <a href="page de la promo" class="bg-main-red py-2 px-4 rounded-full text-main-white my-2 hover:bg-main-white hover:text-main-red hover:border border-main-red">Concepteurs développeurs d'applications 2023</a>
                <div class="space-x-4 mt-4 mb-2 text-sm text-main-white [&>a]:bg-main-gray [&>a]:py-1 [&>a]:px-3 [&>a]:rounded-full">
                    <a href="profil de l'apprenant" class="hover:border border-main-gray hover:text-main-gray hover:bg-main-white">Alexandre</a>
                    <a href="profil de l'apprenant" class="hover:border border-main-gray hover:text-main-gray hover:bg-main-white">Florian</a>
                </div>
                <a href="lien du projet" class="block float-left text-xs">Voir le projet <i class="fa fa-arrow-right"></i></a>
            </div>
        </div>
        <!-- séparateur -->
        <div class="w-4/5 mx-auto bg-main-gray bg-opacity-50 h-0.5 my-4"></div>
        <!-- partie info entreprise -->
        <div class="my-2">
            <div class="flex flex-wrap"><p class="font-title font-bold mr-2">Projet fourni par : </p><p><a href="lien vers la société" class="text-main-red underline font-bold text-sm">Pole formation CCI Ardennes</a></p></div>
            <div class="flex flex-wrap"><p class="font-title font-bold mr-2">Adresse :</p><p class="text-sm pt-0.5 text-left font-light">33 rue de la gare, 08000 Charleville-Mézières</p></div>
        </div>
    </article>


    <!-- card projet 4 -->
    <article id="projet-card-4" class="project-card border-2 border-black rounded-lg p-4 mb-8">
        <!-- partie info projet -->
        <div class="flex-col text-[12px] flex justify-end text-end">
            <!-- tags projet -->
            <div class="uppercase space-x-4 my-4 [&>tag]:bg-main-gray [&>tag]:bg-opacity-10 [&>tag]:py-2 [&>tag]:px-4 [&>tag]:rounded-full">
                <tag> php</tag>
                <tag> oop</tag>
                <tag> symfony</tag>
            </div>
            <!-- titre projet -->
            <h2 class="font-title text-main-red italic font-bold text-3xl my-2"><a href="lien du projet">Projet McDo</a></h2>
            <div class="self-end flex w-3/4 justify-between italic border-b border-main-red"><span>Débuté le 25/03/2002</span><span>Fini le 25/03/2002</span></div>
            <!-- contenu projet -->
            <div class="text-base">
                <p class="pl-[20%] line-clamp-5 mt-2 mb-4">The best kept secret of The Bahamas is the country’s sheer size and diversity. With 16 major islands, The Bahamas is an unmatched destination...</p>
                <a href="page de la promo" class="bg-main-red py-2 px-4 rounded-full text-main-white my-2 hover:bg-main-white hover:text-main-red hover:border border-main-red">Référents digitals 2023</a>
                <div class="space-x-4 mt-4 mb-2 text-sm text-main-white [&>a]:bg-main-gray [&>a]:py-1 [&>a]:px-3 [&>a]:rounded-full">
                    <a href="profil de l'apprenant" class="hover:border border-main-gray hover:text-main-gray hover:bg-main-white">Florian</a>
                </div>
                <a href="lien du projet" class="block float-left text-xs">Voir le projet <i class="fa fa-arrow-right"></i></a>
            </div>
        </div>
        <!-- séparateur -->
        <div class="w-4/5 mx-auto bg-main-gray bg-opacity-50 h-0.5 my-4"></div>
        <!-- partie info entreprise -->
        <div class="my-2">
            <div class="flex flex-wrap"><p class="font-title font-bold mr-2">Projet fourni par : </p><p><a href="lien vers la société" class="text-main-red underline font-bold text-sm">McDonald's Charleville</a></p></div>
            <div class="flex flex-wrap"><p class="font-title font-bold mr-2">Adresse :</p><p class="text-sm pt-0.5 text-left font-light">1 Allée de la Cardamine 08000 LA FRANCHEVILLE</p></div>
        </div>
    </article>


    <!-- card projet 5 -->
    <article id="projet-card-5" class="project-card border-2 border-black rounded-lg p-4 mb-8">
        <!-- partie info projet -->
        <div class="flex-col text-[12px] flex justify-end text-end">
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
            <div class="text-base">
                <p class="pl-[20%] line-clamp-5 mt-2 mb-4">The best kept secret of The Bahamas is the country’s sheer size and diversity. With 16 major islands, The Bahamas is an unmatched destination...</p>
                <a href="page de la promo" class="bg-main-red py-2 px-4 rounded-full text-main-white my-2 hover:bg-main-white hover:text-main-red hover:border border-main-red">Développeurs Web 2023</a>
                <div class="space-x-4 mt-4 mb-2 text-sm text-main-white [&>a]:bg-main-gray [&>a]:py-1 [&>a]:px-3 [&>a]:rounded-full">
                    <a href="profil de l'apprenant" class="hover:border border-main-gray hover:text-main-gray hover:bg-main-white">Nabil</a>
                    <a href="profil de l'apprenant" class="hover:border border-main-gray hover:text-main-gray hover:bg-main-white">Alexandre</a>
                    <a href="profil de l'apprenant" class="hover:border border-main-gray hover:text-main-gray hover:bg-main-white">Bryan</a>
                    <a href="profil de l'apprenant" class="hover:border border-main-gray hover:text-main-gray hover:bg-main-white">Florian</a>
                </div>
                <a href="lien du projet" class="block float-left text-xs">Voir le projet <i class="fa fa-arrow-right"></i></a>
            </div>
        </div>
        <!-- séparateur -->
        <div class="w-4/5 mx-auto bg-main-gray bg-opacity-50 h-0.5 my-4"></div>
        <!-- partie info entreprise -->
        <div class="my-2">
            <div class="flex flex-wrap"><p class="font-title font-bold mr-2">Projet fourni par : </p><p><a href="lien vers la société" class="text-main-red underline font-bold text-sm">Pole formation CCI Ardennes</a></p></div>
            <div class="flex flex-wrap"><p class="font-title font-bold mr-2">Adresse :</p><p class="text-sm pt-0.5 text-left font-light">33 rue de la gare, 08000 Charleville-Mézières</p></div>
        </div>
    </article>


    <!-- card projet 6 -->
    <article id="projet-card-6" class="project-card border-2 border-black rounded-lg p-4 mb-8">
        <!-- partie info projet -->
        <div class="flex-col text-[12px] flex justify-end text-end">
            <!-- tags projet -->
            <div class="uppercase space-x-4 my-4 [&>tag]:bg-main-gray [&>tag]:bg-opacity-10 [&>tag]:py-2 [&>tag]:px-4 [&>tag]:rounded-full">
                <tag> php</tag>
                <tag> oop</tag>
                <tag> symfony</tag>
            </div>
            <!-- titre projet -->
            <h2 class="font-title text-main-red italic font-bold text-3xl my-2"><a href="lien du projet">Projet McDo</a></h2>
            <div class="self-end flex w-3/4 justify-between italic border-b border-main-red"><span>Débuté le 25/03/2002</span><span>Fini le 25/03/2002</span></div>
            <!-- contenu projet -->
            <div class="text-base">
                <p class="pl-[20%] line-clamp-5 mt-2 mb-4">The best kept secret of The Bahamas is the country’s sheer size and diversity. With 16 major islands, The Bahamas is an unmatched destination...</p>
                <a href="page de la promo" class="bg-main-red py-2 px-4 rounded-full text-main-white my-2 hover:bg-main-white hover:text-main-red hover:border border-main-red">Référents digitals 2023</a>
                <div class="space-x-4 mt-4 mb-2 text-sm text-main-white [&>a]:bg-main-gray [&>a]:py-1 [&>a]:px-3 [&>a]:rounded-full">
                    <a href="profil de l'apprenant" class="hover:border border-main-gray hover:text-main-gray hover:bg-main-white">Florian</a>
                </div>
                <a href="lien du projet" class="block float-left text-xs">Voir le projet <i class="fa fa-arrow-right"></i></a>
            </div>
        </div>
        <!-- séparateur -->
        <div class="w-4/5 mx-auto bg-main-gray bg-opacity-50 h-0.5 my-4"></div>
        <!-- partie info entreprise -->
        <div class="my-2">
            <div class="flex flex-wrap"><p class="font-title font-bold mr-2">Projet fourni par : </p><p><a href="lien vers la société" class="text-main-red underline font-bold text-sm">McDonald's Charleville</a></p></div>
            <div class="flex flex-wrap"><p class="font-title font-bold mr-2">Adresse :</p><p class="text-sm pt-0.5 text-left font-light">1 Allée de la Cardamine 08000 LA FRANCHEVILLE</p></div>
        </div>
    </article>

<!-- pagination -->

<div class="flex justify-center text-md">
<a href="lien vers page" class="fa fa-chevron-left my-auto mx-3 px-3 opacity-30"></a>
<div class="flex gap-x-0.5 [&>a]:px-4 [&>a]:py-0.5 [&>a]:rounded-md">
    <a href="lien vers page" class="hover:bg-main-red hover:text-main-white PAGEACTIVE= bg-main-red text-main-white">1</a>
    <a href="lien vers page" class="hover:bg-main-red hover:text-main-white">2</a>
    <a href="lien vers page" class="hover:bg-main-red hover:text-main-white">3</a>
    <a href="lien vers page" class="hover:bg-main-red hover:text-main-white">4</a>
    <a href="lien vers page" class="hover:bg-main-red hover:text-main-white">5</a>
</div>
<a href="lien vers page" class="fa fa-chevron-right my-auto mx-3 px-3"></a>
</div>

</section>








<?php $content = ob_get_clean(); ?>



<?php ob_start(); ?>
<script src="assets/js/all_projects.js"></script>
<?php $script = ob_get_clean(); ?>

<?php require 'view/layout.php'; ?>