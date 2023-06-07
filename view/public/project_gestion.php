<?php $title = "Gestion de Projet"; ?>

<?php ob_start(); ?>

<main>
<h2 class="pt-5 bg-white text-center text-[24px] md:text-[36px] lg:text-[48px] font-semibold font-title text-main-red uppercase">
    Gestion de projet
</h2>
<!-- <h3 class="pb-5 bg-white text-center text-[18px] md:text-[30px] lg:text-[42px] font-semibold font-title">
    Projets non assignés
</h3> -->

<!-- bouton ajouter un projet -->
<div class="fixed bottom-6 right-6 flex gap-2">
    <p class="h-fit my-auto lg:text-xl">Soumettre un projet</p>
    <a href="?action=addProject" class="animate-pulse rounded-full w-12 h-12 lg:!w-24 lg:!h-24 border-4 text-main-white bg-main-gray border-main-white hover:text-main-gray hover:bg-main-white hover:border-main-gray grid place-content-center">
        <i class="fa fa-plus lg:text-3xl"></i>
    </a>
</div>

<!-- cards projets -->
<section id="project-cards" class="px-4 grid w-fit mx-auto">
<div class="w-4/5 h-1 border-b-2 mb-12 mx-auto"></div>
    <?php if (empty($projects)) { ?>
        <h3 class="text-main-gray underline decoration-main-red text-2xl italic font-bold">Pas de Projets pour le moment</h3>';
        <?php  } else if (!empty($projects)) {
            $i = 0;
            $x = 0;
            $y = 0;
            if ($_SESSION['user']->role_id == 2) {
                foreach ($projects as $projets) { 
                    foreach ($projets as $project) {
                        if ($project->status->id == 10) {
                            include('view/template/_gestion_project_card.php');
                            $x ++;
                        }
                    }
                }
            } else {
            foreach ($projects as $project) {
                include('view/template/_gestion_project_card.php');
                $x ++;
                }
            }
        } ?>


</section>
</main>
<?php $content = ob_get_clean(); ?>



<?php ob_start(); ?>
<script src="assets/js/ajax_gestion_project.js"></script>
<?php $script = ob_get_clean(); ?>

<?php require 'view/layout.php'; ?>