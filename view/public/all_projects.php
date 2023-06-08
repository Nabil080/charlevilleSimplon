<?php $title = "Les projets"; ?>

<?php
        $formationRepo = new FormationRepository;
        $formations = $formationRepo->getAllFormations();
        $formationsLevel = $formationRepo->getFormationLevels();

        $projectRepo = new ProjectRepository;
        $projectsDate = $projectRepo->getProjectsDate();

?>

<?php ob_start(); ?>

<h1 class="px-4 text-main-red font-title font-semibold text-center text-2xl sm:text-3xl lg:text-[40px]">Les projets réalisés à <span class="italic">Simplon Charleville</span></h1>

<!-- section tous les projets -->
<section id="all-projects" class="px-4 2xl:mx-6">
    <!-- barre de recherche -->
    <div class="relative w-full 2xl:w-4/5 mx-auto mt-4">
        <input id="project-search" class="border-main-red rounded-lg w-full pl-10 py-4 placeholder:text-black focus:border-green-50" placeholder="Votre recherche" type="search">
        <i class="fa fa-search absolute top-0 left-0 w-10 text-center text-xl py-4"></i>
    </div>
    <!-- boutons de filtre -->
    <span class="text-main-red text-xs py-0.5 2xl:mx-[10%]">Filtrer par :</span>
    <div class="2xl:mx-[10%] flex justify-start text-xs sm:text-sm gap-x-4 sm:[&>button]:w-1/4 [&>button]:px-2 sm:[&>button]:px-4 [&>button]:py-2 [&>button]:border-main-red [&>button]:border [&>button]:rounded-lg">
        <div id="formation-dropdown" class="dropdown-toggle w-1/4 border-main-red border rounded-t-lg rounded-b-lg sm:relative">
        <button onclick="toggleDropdown('formation-dropdown')" class="relative w-full py-2"><i class="fa fa-filter text-xs"></i> Formation</button>
        <!-- dropdown formations -->
            <div class="filter-dropdown dropdown hidden absolute box-content -translate-x-[1px] z-20 w-[calc(100%-2rem)] sm:w-full -translate-y-1 border rounded-b-lg rounded-tr-lg sm:rounded-tr-none text-start bg-main-white sm:border-t-transparent border-main-red">
                <?php foreach($formations as $formation){ ?>
                    <div class="flex gap-2 text-xs my-2 px-2"><input class="my-auto" id="formation-<?=$formation->id?>" type="checkbox" data-formation-id="<?=$formation->id?>"><label for="formation-<?=$formation->id?>"><?=$formation->name?></label></div>
                <?php } ?>
            </div>
        </div>
        <div id="year-dropdown" class="dropdown-toggle w-1/4 border-main-red border rounded-t-lg rounded-b-lg relative">
        <button onclick="toggleDropdown('year-dropdown')" class="relative w-full py-2"><i class="fa fa-filter text-xs"></i> Années</button>
        <!-- dropdown yearss -->
            <div class="filter-dropdown dropdown hidden absolute box-content -translate-x-[1px] z-10 w-full sm:w-full -translate-y-1 border rounded-b-lg text-start bg-main-white border-t-transparent border-main-red">
                <?php foreach($projectsDate as $year){?>
                    <div class="flex gap-2 text-xs my-2 px-2"><input class="my-auto" id="<?=$year?>" type="checkbox" data-year="<?=$year?>"><label for="<?=$year?>"><?=$year?></label></div>
                <?php } ?>
            </div>
        </div>
        <div id="level-dropdown" class="dropdown-toggle w-1/4 border-main-red border rounded-t-lg rounded-b-lg relative">
        <button onclick="toggleDropdown('level-dropdown')" class="relative w-full py-2"><i class="fa fa-filter text-xs"></i> Niveau</button>
        <!-- dropdown levels -->
            <div class="filter-dropdown dropdown hidden absolute box-content -translate-x-[1px] z-10 w-full sm:w-full -translate-y-1 border rounded-b-lg text-start bg-main-white border-t-transparent border-main-red">
                <?php foreach($formationsLevel as $level){?>
                    <div class="flex gap-2 text-xs my-2 px-2"><input class="my-auto" id="<?=$level?>" type="checkbox" data-level="<?=$level?>"><label for="<?=$level?>"><?=$level?></label></div>
                <?php } ?>
            </div>
        </div>
    </div>
    <span id="filter-reset" class="text-main-red text-xs py-0.5 cursor-pointer underline hover:text-red-700 2xl:mx-[10%]">Réinitialiser les filtres</span>


    <section id="project-cards" class="mt-2 grid min-h-[65vh] gap-6 xl:grid-cols-2 w-fit mx-auto">
                <!-- INCLUDE DES CARDS DEPUIS LE JS -->
    </section>

    <!-- pagination -->
    <section id="pagination-section" class="flex justify-center text-md ">
    <button id="first-page" class="fa fa-angles-left my-auto mx-3 px-3"></button>
    <button id="prev-page" class="fa fa-chevron-left my-auto mx-3 px-3"></button>
    <div id="pagination" class="flex gap-x-0.5 [&>button]:px-4 [&>button]:py-0.5 [&>button]:rounded-md"></div>
    <button id="next-page" class="fa fa-chevron-right my-auto mx-3 px-3"></button>
    <button id="last-page" class="fa fa-angles-right my-auto mx-3 px-3"></button>
    </section>

</section>

<?php $content = ob_get_clean(); ?>



<?php ob_start(); ?>
<script src="assets/js/all_projects.js"></script>
<?php $script = ob_get_clean(); ?>

<?php require 'view/layout.php'; ?>