<?php $title = $formation_main->name; ?>

<?php ob_start(); ?>
<main class="pb-10 px-[10%]">

    <div class="flex flex-col lg:flex-row justify-center items-center lg:items-start gap-5 md:gap-10 lg:gap-10">
        <div class="w-full">
            <h2 class="pb-10 bg-white text-center text-[24px] md:text-[36px] lg:text-[42px] font-bold font-title text-main-red
    uppercase">
                <?= $formation_main->name ?>
            </h2>
            <div class="text-[16px] md:text-[20px] text-justify flex flex-col gap-5">
                <?= $formation_main->description ?>
            </div>
        </div>

        <aside class="md:w-4/5 lg:w-1/2 pb-5 border-2 border-main-gray rounded-lg ">
            <div class="lg:h-[180px]">
                <img class="w-full h-auto rounded-t-lg lg:h-full bg-cover" src="assets/img/formations/devweb"
                    alt="Formation">
            </div>

            <div class="mx-5 py-5 flex flex-col items-center gap-5">
                <h5 class="text-[28px] lg:text-[20px] text-main-red text-center font-bold font-title">Chiffres clés
                    du
                    secteur
                </h5>
                <div class="flex flex-col sm:flex-row lg:flex-col justify-center gap-5 text-center">
                    <?php foreach ($formation_stat as $stat) { ?>
                    <div class="md:w-1/3 lg:w-full">
                        <p class="text-[24px] text-main-red font-bold">
                            <?= $stat['stat_number'] ?>
                        </p>
                        <p class="text-[16px] font-medium">
                            <?= $stat['stat_name'] ?>
                        </p>
                    </div>
                    <?php } ?>
                </div>
                <hr class="w-48 h-1 mx-auto bg-gray-100 border-0 rounded dark:bg-gray-700">
                <h5 class="text-[28px] lg:text-[20px] text-main-red font-bold font-title">Métiers Visée</h5>
                <ul class="grid grid-cols-1 gap-x-8 gap-y-2 sm:grid-cols-2 lg:sm:grid-cols-1 ">
                    <?php foreach ($formation_job as $job) { ?>
                    <li>
                        <?= $job['job_name'] ?>
                    </li>
                    <?php } ?>

                </ul>
            </div>

        </aside>
    </div>
    <div class="mt-20 pb-10 hidden md:block text-center">
        <a href="index.php?action=registerPage&formation_id=<?= $formation_main->id ?>"
            class="px-10 py-3 border-2  border-main-red text-main-white font-bold text-lg uppercase bg-main-red rounded-lg hover:bg-main-white hover:text-main-red">
            Postuler à la formation</a>
    </div>
</main>

<section>
    <img src="assets/img/autres/campus.png" alt="mur du campus" class="w-full img-fluid" />
</section>
<section class="py-10 lg:px-[10%] xl:px-[15%] bg-main-lightgray">
    <div class="border">
        <ul class="grid grid-cols-2 lg:grid-cols-4 " id="myTab" data-tabs-toggle="#myTabContent" role="tablist">
            <li class="border border-white">
                <button onclick="changeTab(0);"
                    class="tabChange transition-all duration-[0.4s] cursor-pointer !bg-main-red w-full p-5 inline-flex justify-center items-center gap-3 text-[16px] md:text-[28px] text-white aria-selected:bg-main-red aria-selected:text-white aria-selected:hover:text-white">
                    <i class="fa-sharp fa-solid fa-trophy fa-lg"></i>
                    Compétence
                </button>
            </li>
            <li class="border border-white">
                <button onclick="changeTab(1);"
                    class="tabChange transition-all duration-[0.4s] cursor-pointer bg-main-gray w-full p-5 inline-flex justify-center items-center gap-3 text-[16px] md:text-[28px] text-white aria-selected:bg-main-red aria-selected:text-main-white">
                    <i class="fa-sharp fa-solid fa-handshake fa-lg"></i>
                    Admission
                </button>
            </li>
            <li class="border border-white">
                <button onclick="changeTab(2);"
                    class="tabChange transition-all duration-[0.4s] cursor-pointer bg-main-gray w-full p-5 inline-flex justify-center items-center gap-3 text-[16px] md:text-[28px] text-main-white aria-selected:bg-main-red aria-selected:text-main-white">
                    <i class="fa-sharp fa-solid fa-book fa-lg"></i>
                    Programme
                </button>
            </li>
            <li class="border border-white">
                <button onclick="changeTab(3);"
                    class="tabChange transition-all duration-[0.4s] cursor-pointer bg-main-gray w-full p-5 inline-flex justify-center items-center gap-3 text-[16px] md:text-[28px] text-main-white aria-selected:bg-main-red aria-selected:text-main-white">
                    <i class="fa-sharp fa-solid fa-credit-card fa-lg"></i>
                    Financement
                </button>
            </li>
        </ul>
        <div id="myTabContent" class="bg-white pb-10 px-8">
            <div class="sectionChange text-[16px] lg:text-[20px]">
                <?php foreach ($formation_activity as $activity) { ?>
                <div class="py-4">
                    <h3 class="text-main-red text-[20px] lg:text-[36px] font-bold">
                        <?= $activity['name'] ?>
                    </h3>
                    <p class="pb-3 text-[16px] text-main-blue font-bold">
                        <?= $activity['ref'] ?>
                    </p>
                    <ul class="list-outside list-disc ml-5 md:ml-10 [&>li]:pb-2">
                        <?php foreach ($activity['skill'] as $skill) { ?>
                        <li>
                            <?= $skill ?>
                        </li>
                        <?php } ?>

                    </ul>
                </div>
                <?php } ?>
            </div>
            <div class="sectionChange hidden bg-white text-[16px] lg:text-[20px]">
                <div class="py-4">
                    <h3 class="pb-3 text-main-red text-[20px] lg:text-[36px] font-bold">Pas de prérequis mais…</h3>
                    <ul class="list-outside list-disc ml-5 md:ml-10 [&>li]:pb-2">
                        <?php foreach ($formation_admission as $require) { ?>
                        <li>
                            <?= $require ?>
                        </li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
            <div class="sectionChange hidden bg-white text-[16px] lg:text-[20px]">
                <?php foreach ($formation_program as $program) { ?>
                <div class="py-4">
                    <h3 class="pb-3 text-main-red text-[20px] lg:text-[36px] font-bold">
                        <?= $program['programme_layout_name'] ?>
                    </h3>
                    <ul class="list-outside list-disc ml-5 md:ml-10 [&>li]:pb-2">
                        <?= $program['programme_name'] ?>
                    </ul>
                </div>
                <?php } ?>
            </div>
            <div class="sectionChange hidden bg-white text-[16px] lg:text-[20px]">
                <div class="py-4">
                    <h3 class="pb-3 text-main-red text-[20px] lg:text-[36px] font-bold">Frais de scolarité</h3>
                    <ul class="list-outside list-disc ml-5 md:ml-10 [&>li]:pb-2">
                        <?php foreach ($formation_fee as $fee) { ?>
                        <li>
                            <?= $fee ?>
                        </li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="bg-main-lightgray md:hidden pb-10 text-center">
    <a href="index.php?action=registerPage&formation_id=<?= $formation_main->id ?>"
        class="px-10 py-3 border-2 border-main-red text-main-white font-bold text-lg uppercase bg-main-red rounded-lg hover:bg-main-white hover:text-main-red">
        Postuler à la formation
    </a>
</div>

<section class="bg-main-lightgray pb-20 px-[10%] xl:px-[15%]">
    <div class="pb-3 flex items-center gap-4 text-main-red">
        <i class="fa fa-sharp fa-solid fa-graduation-cap fa-2xl"></i>
        <h3 class="text-[30px] lg:text-[40px] font-bold">Certifications</h3>
    </div>
    <?php foreach ($formation_certification as $certification) { ?>
    <div class="pb-5">
        <h6 class="font-bold font-title">
            <?= $certification['certification_name'] ?>
        </h6>
        <a href="<?= $certification['certification_link'] ?>" target="_blank">
            <div class="pb-5 flex md:gap-10 items-center text-main-blue font-bold">
                <p>
                    <?= $certification['certification_ref'] ?>
                </p>
                <p class="md:hidden h-[30px] mx-2 border-l-2 border-main-blue"></p>
                <p>
                    <?= $certification['certification_refName'] ?>
                </p>
            </div>
        </a>
        <div class="[&>ul]:ml-5 md:ml-10">
            <?= $certification['certification_description'] ?>
        </div>
    </div>
    <?php } ?>
</section>

<?php $content = ob_get_clean(); ?>



<?php ob_start(); ?>
<script src="assets/js/tabs.js"></script>
<?php $script = ob_get_clean(); ?>

<?php require 'view/layout.php'; ?>