<?php $title = $promo->name; ?>

<?php ob_start(); ?>
<p id="seeProjects" data-view="<?= $seeProjects;?>" class="hidden"></p>
<main class="w-[100vw] overflow-x-hidden bg-main-white">
    <section>
        <!-------------Titre----------->
        <h2 class="text-center text-[24px] md:text-4xl font-bold font-title text-main-red uppercase pb-2">
            <?= $promo->name; ?>
        </h2>
        <?php 
            

        ?>
        <p class="text-center text-[24px] md:text-4xl font-title text-main-red pb-8"><?= $promo->start; ?> - 
        <?= $promo->end; ?>
        </p>
    </section>
    <section>
        <!-------------TAB----------->
        <div class="flex w-full cursor-pointer">
            <div onclick="changeTab(0)"
                class="tabChange px-0 transition-all duration-[0.4s] !bg-main-red w-1/2 text-center text-main-white font-title text-[20px] font-bold py-5">
                <p>Promotions</p>
            </div>
            <div onclick="changeTab(1)"
                class="tabChange px-0 transition-all duration-[0.4s] bg-main-gray w-1/2 text-center text-main-white font-title text-[20px] font-bold py-5">
                <p>Projets</p>
            </div>
        </div>
    </section>
    <section class="sectionChange mb-8">
        <!-------------PROMOTIONS----------->
        <div class="grid w-5/6 lg:grid-cols-2 md:w-4/6 gap-8 justify-center mx-auto">
            <!------Formateurs------->
            <h3 class="text-center lg:col-start-1 lg:col-end-3 font-main-title text-[22px] font-bold mt-4">Formateurs
            </h3>
            <!-----Card Formateur------->
            <?php foreach ($formateurs as $formateur) { 
                include('view/template/_formateur_card.php');
            } ?>
        </div>

        <div class="grid w-11/12 justify-center mx-auto xl:w-[100%] grid-cols-1 xl:grid-cols-2 gap-8 xl:gap-12"> <!------Apprenants------->
            <h3 class="text-center xl:col-start-1 xl:col-end-3 font-main-title text-[22px] font-bold mt-4">Apprenants</h3>
            <!-----Cards Apprenants------->
            <?php foreach ($apprenants as $apprenant) { 
            include('view/template/_apprenant_card.php');
            }; ?>
            
        </div>
    </section>
    <!-------------Fin de la section Apprenants----------->

    <!-------------PROJETS----------->
    <section class="sectionChange hidden w-11/12 mt-8  md:mt-20 grid gap-6 lg:gap-16 xl:grid-cols-2 mx-auto">
        <?php 
        foreach($allProjects as $project) {
        include('view/template/_project_card.php');
        } ?>

    </section>
</main>



<?php $content = ob_get_clean(); ?>

<?php ob_start(); ?>
<link href="assets/css/promotion.css" rel="stylesheet" />
<?php $link = ob_get_clean(); ?>

<?php ob_start(); ?>
<script src="assets/js/promotion.js"></script>
<?php $script = ob_get_clean(); ?>

<?php require 'view/layout.php'; ?>
