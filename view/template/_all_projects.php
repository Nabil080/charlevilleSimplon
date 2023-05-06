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
    <div class="flex justify-between text-sm [&>button]:px-4 [&>button]:py-2 [&>button]:border-main-red [&>button]:border [&>button]:rounded-lg">
        <button><i class="fa fa-filter text-xs"></i> Formation</button>
        <button><i class="fa fa-filter text-xs"></i> Année</button>
        <button><i class="fa fa-filter text-xs"></i> Niveau</button>
    </div>
    <span onclick="resetProjectFilters()" class="text-main-red text-xs py-0.5 cursor-pointer underline hover:text-red-700">Réinitialiser les filtres</span>

    <h3 class="my-4 text-main-red">10 projets affichés sur 72</h3>

    <!-- card projet 1 -->
    <article id="projet-card-1" class="project-card border-2 border-black rounded-lg py-4 px-2">
    Salut

    </article>




















     <!-- card projet 2 -->
    <article id="projet-card-2" class="project-card">

    <h2>Apprenants : Nabil, Alexandre</h2>
    </article>

     <!-- card projet 3 -->
     <article id="projet-card-3" class="project-card">

         <h2>Apprenants : Bryan, Alexandre</h2>
    </article>


    <!-- card projet 4 -->
    <article id="projet-card-4" class="project-card">

    <h2>Apprenants : Nabil</h2>
    </article>
    <article id="projet-card-5" class="project-card">

    <h2>Apprenants : Florian, Alexandre</h2>
    </article>

    <article id="projet-card-6" class="project-card">

    <h2>Apprenants : Alexandre, Florian, Bryan</h2>
    </article>

</section>








<?php $content = ob_get_clean(); ?>



<?php ob_start(); ?>
<script src="assets/js/all_projects.js"></script>
<?php $script = ob_get_clean(); ?>

<?php require 'view/layout.php'; ?>