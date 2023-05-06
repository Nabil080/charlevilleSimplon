<?php $title = "Les projets"; ?>

<?php ob_start(); ?>

<div class="h-20">Séparation nav bar</div>

<section id="all-projects" class="px-4">
    <h1 class="text-main-red font-title font-semibold text-center text-2xl">Les projets réalisés à <span class="italic">Simplon Charleville</span></h1>

<input id="project-search" type="search">
<button onclick="searchProject()">Rechercher</button>

<div class="project-card">
    <h2>Apprenants : Nabil, Alexandre</h2>
</div>
<div class="project-card">
    <h2>Apprenants : Bryan, Alexandre</h2>
</div>
<div class="project-card">
    <h2>Apprenants : Nabil</h2>
</div>
<div class="project-card">
    <h2>Apprenants : Florian, Alexandre</h2>
</div>
<div class="project-card">
    <h2>Apprenants :Alexandre, Florian, Bryan</h2>
</div>
<div class="project-card">
    <div>
        <div>
            <div>
                Nabil
            </div>
        </div>
    </div>
</div>



</section>








<?php $content = ob_get_clean(); ?>



<?php ob_start(); ?>
<script src="assets/js/all_projects.js"></script>
<?php $script = ob_get_clean(); ?>

<?php require 'view/layout.php'; ?>