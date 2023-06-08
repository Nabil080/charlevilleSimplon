<?php $title = $formation_main->name; ?>

<?php ob_start(); ?>
<main class="pb-10 px-[10%]">

    <div class="flex flex-col lg:flex-row justify-center items-center lg:items-start gap-5 md:gap-10 lg:gap-10">
        <div class="w-full">
            <h2 class="pb-10 bg-white text-center text-[24px] md:text-[36px] lg:text-[42px] font-bold font-title text-main-red
    uppercase">
                <?= $formation_main->name ?>
            </h2>
            <!-- Affichage -->
            <div id="description"
                class="flex flex-col gap-3 max-h-[710px] overflow-hidden text-[16px] md:text-[20px] text-justify [&>ul]:list-disc [&_li]:pb-2">
                <!-- bouton d'edit -->
                <?php if ($CanModify == true) { ?>
                <i onclick="swapDivsById('description','description-update')"
                    class="fa-solid fa-pen text-main-red cursor-pointer order-0 self-end"></i>
                <?php } ?>
                <?= $formation_main->description ?>
            </div>
            <?php if ($CanModify == true) { ?>
            <!-- formulaire d'edit -->
            <form id="description-update"
                action="?action=updateFormationElement&id=<?= $formation_main->id ?>&type=description" method="POST"
                class="hidden w-full p-4" method="post" action="">
                <textarea name="description" class="w-full text-editor" rows="20">
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    <?= $formation_main->description ?>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                </textarea>
                <button type="submit"
                    class="py-2 px-4 bg-main-red border-main-white border text-main-white my-4 mr-4">Modifier <i
                        class="fa-solid fa-check"></i></button>
                <span onclick="swapDivsById('description','description-update')" class="cursor-pointer">Annuler
                    <i class="fa-solid fa-xmark"></i></span>
            </form>
            <?php } ?>
        </div>

        <aside class="md:w-4/5 lg:w-1/2 pb-5 border-2 border-main-gray rounded-lg ">
            <div class="lg:h-[180px] bg-center bg-cover" style= "background-image: url(<?= $formation_main->image ?>)">

            </div>

            <div class="mx-5 py-5 flex flex-col items-center gap-5">
                <h5 class="text-[28px] lg:text-[20px] text-main-red text-center font-bold font-title">Chiffres clés
                    du
                    secteur
                </h5>
                <div class="flex flex-col sm:flex-row lg:flex-col justify-center gap-5 text-center">
                    <?php foreach ($formation_stat as $key => $stat) { ?>
                    <div id="stat_<?= $key ?>" class="md:w-1/3 lg:w-full">
                        <div class="relative flex justify-center">
                            <!-- bouton d'edit -->
                            <?php if ($CanModify == true) { ?>
                            <i onclick="swapDivsById('stat_<?= $key ?>','stat-update-<?= $key ?>')"
                                class="fa-solid fa-pen text-main-red cursor-pointer order-2 absolute top-0 right-0"></i>
                            <?php } ?>
                            <!-- Affichage -->
                            <p class="text-[24px] text-main-red font-bold">
                                <?= $stat['stat_number'] ?>
                            </p>
                        </div>
                        <p class="text-[16px] font-medium">
                            <?= $stat['stat_name'] ?>
                        </p>
                    </div>
                    <!-- formulaire d'edit lien site -->
                    <?php if ($CanModify == true) { ?>
                    <form id="stat-update-<?= $key ?>"
                        action="?action=updateFormationElement&id=<?= $formation_main->id ?>&type=stat" method="POST"
                        class="hidden w-full flex flex-col items-center gap-2">
                        <input type="text" name="stat_number_<?= $key ?>" placeholder="<?= $stat['stat_number'] ?>"
                            class="w-1/2 h-[30px] flex items-center justify-center border border-main-red rounded-md">
                        <input type="text" name="stat_name_<?= $key ?>" placeholder="<?= $stat['stat_name'] ?>"
                            class="w-full h-[30px] flex items-center justify-center border border-main-red rounded-md">
                        <input type="hidden" name="stat_id" value="<?= $key ?>" />
                        <div class="flex justify-center items-center gap-5">
                            <button type="submit"><i class="fa-solid fa-check text-main-red"></i></button>
                            <i onclick="swapDivsById('stat_<?= $key ?>','stat-update-<?= $key ?>')"
                                class="fa-solid fa-xmark text-main-red cursor-pointer"></i>
                        </div>
                    </form>
                    <?php } ?>
                    <?php } ?>
                </div>
                <hr class="w-48 h-1 mx-auto bg-gray-100 border-0 rounded dark:bg-gray-700">
                <div class="flex items-center gap-3">
                    <h5 class="text-[28px] lg:text-[20px] text-main-red font-bold font-title">Métiers Visés</h5>
                    <!-- bouton d'edit -->
                    <?php if ($CanModify == true) { ?>
                    <i onclick="swapDivsById('jobContent','jobContent-update')"
                        class="text-main-red fa-solid fa-pen fa-sm cursor-pointer"></i>
                    <?php } ?>
                </div>
                <ul id="jobContent" class="grid grid-cols-1 gap-x-8 gap-y-2 sm:grid-cols-2 lg:sm:grid-cols-1 ">
                    <?php
                    foreach ($formation_job as $job) { ?>
                    <li>
                        <?= $job ?>
                    </li>
                    <?php } ?>
                </ul>
                <?php if ($CanModify == true) { ?>
                <form id="jobContent-update"
                    action="?action=updateFormationElement&id=<?= $formation_main->id ?>&type=job" method="POST"
                    class="hidden w-full p-4 flex flex-col" method="post" action="">
                    <div class="pb-5 flex justify-center items-center">
                        <div class="flex items-center mr-4">
                            <input id="search-radio" type="radio" value="job-search" name="radio-job" checked
                                value="job-search" checked
                                class="radio-job w-4 h-4 text-main-red bg-gray-100 border-gray-300 focus:ring-main-red">
                            <label for="search-radio" class="ml-2 text-sm font-medium text-gray-900">Rechercher</label>
                        </div>
                        <div class="flex items-center mr-4">
                            <input id="add-radio" type="radio" value="job-add" name="radio-job" value="job-add"
                                class="radio-job w-4 h-4 text-main-red bg-gray-100 border-gray-300 focus:ring-main-red">
                            <label for="add-radio" class="ml-2 text-sm font-medium text-gray-900">Ajouter</label>
                        </div>
                    </div>
                    <div id="select_job" class="flex flex-col gap-3">
                        <div id="job_selectContent">
                        </div>
                        <select class="scrollbar appearance-none border-main-red rounded-lg" multiple>
                            <?php foreach ($job_all as $key => $job) { ?>
                            <option value="<?= $key ?>">
                                <?= $job ?>
                            </option>
                            <?php } ?>
                        </select>
                    </div>
                    <div id="add_job" class="hidden">
                        <label for="addJob" class="font-medium text-sm">Ajouter un nouveau métier</label>
                        <input type="text" id="addJob" name="newJob" class="w-full border border-main-red rounded-lg" />
                    </div>
                    <div>
                        <button type="submit" id="job-btn"
                            class="py-2 px-4 bg-main-red border-main-white border text-main-white my-4 mr-4">Modifier
                            <i class="fa-solid fa-check"></i></button>
                        <span onclick="swapDivsById('jobContent','jobContent-update')" class="cursor-pointer">Annuler
                            <i class="fa-solid fa-xmark"></i></span>
                    </div>
                </form>
                <?php } ?>
            </div>

        </aside>
    </div>
    <?php
    if ($formation_main->status->id == 13) { ?>
        <div class="mt-20 pb-10 hidden md:block text-center">
            <a href="#"
                class="px-10 py-3 border-2  text-main-white font-bold cursor-default text-lg uppercase bg-green-700 rounded-lg">
                Prochaine session bientot</a>
        </div>
    <?php } else if ($formation_main->status->id == 12) { ?>
        <div class="mt-20 pb-10 hidden md:block text-center">
            <a href="#"
                class="px-10 py-3 border-2  text-main-white font-bold cursor-default text-lg uppercase bg-gray-700 rounded-lg">
                Session en cours</a>
        </div>
    <?php } else if ($formation_main->status->id == 14) { ?>
    <div class="mt-20 pb-10 hidden md:block text-center">
        <a href="index.php?action=registerPage&formation_id=<?= $formation_main->id ?>"
            class="px-10 py-3 border-2  border-main-red text-main-white font-bold text-lg uppercase bg-main-red rounded-lg hover:bg-main-white hover:text-main-red">
            Postuler à la formation</a>
    </div>
    <?php } ?>
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
        <div id="myTabContent" class="relative bg-white pb-10 px-8">
            <div class="sectionChange text-[16px] lg:text-[20px]">
                <div id="activityAllContent">
                    <!-- bouton d'edit -->
                    <?php if ($CanModify == true) { ?>
                    <i onclick="swapDivsById('activityAllContent','activityAllContent-update')"
                        class="absolute bottom-5 right-5 fa-solid fa-pen text-main-red fa-sm cursor-pointer">
                        Modifier</i>
                    <?php } ?>
                    <?php foreach ($formation_activity as $key => $activity) { ?>
                    <div id="activityContent_<?= $key ?>" class="py-4">
                        <div class="flex items-center gap-3">
                            <h3 class="text-main-red text-[20px] lg:text-[36px] font-bold">
                                <?= $activity['name'] ?>
                            </h3>
                            <!-- bouton d'edit -->
                            <?php if ($CanModify == true) { ?>
                            <i onclick="swapDivsById('activityContent_<?= $key ?>','activityContent-update_<?= $key ?>')"
                                class="text-main-red fa-solid fa-pen fa-sm cursor-pointer"></i>
                            <?php } ?>
                        </div>
                        <p class="pb-3 text-[16px] text-main-blue font-bold">
                            <?= $activity['ref'] ?>
                        </p>
                        <div class="[&>ul]:list-outside [&>ul]:list-disc [&>ul]:ml-5 [&>ul]:md:ml-10 [&_li]:pb-2">
                            <?= $activity['skill'] ?>
                        </div>
                    </div>
                    <!-- formulaire d'edit lien site -->
                    <?php if ($CanModify == true) { ?>
                    <form id="activityContent-update_<?= $key ?>"
                        action="?action=updateFormationElement&id=<?= $formation_main->id ?>&type=activity"
                        method="POST" class="hidden w-full p-4" method="post" action="">
                        <div class="flex flex-col md:flex-row">
                            <input type="text" name="name" placeholder="<?= $activity['name'] ?>"
                                class="w-full border-main-red" />
                            <input type="text" name="ref" placeholder="<?= $activity['ref'] ?>"
                                class="md:border-r-0 border-main-red" />
                        </div>
                        <textarea name="skill" class="text-editor border-t-0 border-main-red"
                            rows="5"><?= $activity['skill'] ?></textarea>
                        <input type="hidden" name="activity_id" value="<?= $key ?>" />
                        <button type="submit" +
                            class="py-2 px-4 bg-main-red border-main-white border text-main-white my-4 mr-4">Modifier <i
                                class="fa-solid fa-check"></i></button>
                        <span onclick="swapDivsById('activityContent_<?= $key ?>','activityContent-update_<?= $key ?>')"
                            class="cursor-pointer">Annuler
                            <i class="fa-solid fa-xmark"></i></span>
                    </form>
                    <?php } ?>
                    <?php } ?>
                </div>
                <!-- formulaire d'edit lien site -->
                <?php if ($CanModify == true) { ?>
                <form id="activityAllContent-update"
                    action="?action=updateFormationElement&id=<?= $formation_main->id ?>&type=formation_activity"
                    method="POST" class="hidden w-full p-4 flex flex-col" method="post" action="">
                    <div class="flex flex-col gap-3">
                        <div id="activity_selectContent">
                        </div>
                        <select id="select_activity" class="appearance-none border-main-red rounded-lg" multiple>
                            <?php foreach ($activity_all as $key => $activity) { ?>
                            <option value="<?= $key ?>">
                                <?= $activity['name'] ?>
                            </option>
                            <?php } ?>
                        </select>
                    </div>
                    <div>
                        <button type="submit"
                            class="py-2 px-4 bg-main-red border-main-white border text-main-white my-4 mr-4">Modifier
                            <i class="fa-solid fa-check"></i></button>
                        <span onclick="swapDivsById('activityAllContent','activityAllContent-update')"
                            class="cursor-pointer">Annuler
                            <i class="fa-solid fa-xmark"></i></span>
                    </div>
                </form>
                <?php } ?>
            </div>
            <div class="sectionChange hidden bg-white text-[16px] lg:text-[20px]">
                <div class="py-4">
                    <div class="pb-3 flex items-center gap-3">
                        <h3 class="text-main-red text-[20px] lg:text-[36px] font-bold">Conditions d'admission et prérequis :</h3>
                        <!-- bouton d'edit -->
                        <?php if ($CanModify == true) { ?>
                        <i onclick="swapDivsById('admissionContent','admissionContent-update')"
                            class="fa-solid fa-pen text-main-red fa-sm cursor-pointer">
                        </i>
                        <?php } ?>
                    </div>
                    <ul id="admissionContent" class="list-outside list-disc ml-5 md:ml-10 [&>li]:pb-2">
                        <?php foreach ($formation_admission as $require) { ?>
                        <li>
                            <?= $require ?>
                        </li>
                        <?php } ?>
                    </ul>
                    <!-- formulaire d'edit lien site -->
                    <?php if ($CanModify == true) { ?>
                    <form id="admissionContent-update"
                        action="?action=updateFormationElement&id=<?= $formation_main->id ?>&type=formation_requirement"
                        method="POST" class="hidden w-full p-4 flex flex-col" method="post" action="">
                        <div class="flex flex-col gap-3">
                            <div class="flex flex-col" id="admission_selectContent">
                            </div>
                            <select id="select_admission" class="appearance-none border-main-red rounded-lg" multiple>
                                <?php foreach ($admission_all as $key => $require) { ?>
                                <option value="<?= $key ?>">
                                    <?= $require ?>
                                </option>
                                <?php } ?>
                            </select>
                        </div>
                        <div>
                            <button type="submit"
                                class="py-2 px-4 bg-main-red border-main-white border text-main-white my-4 mr-4">Modifier
                                <i class="fa-solid fa-check"></i></button>
                            <span onclick="swapDivsById('admissionContent','admissionContent-update')"
                                class="cursor-pointer">Annuler
                                <i class="fa-solid fa-xmark"></i></span>
                        </div>
                    </form>
                    <?php } ?>
                </div>
            </div>
            <div class="sectionChange hidden bg-white text-[16px] lg:text-[20px]">
                <?php $allTitle = [];
                foreach ($formation_program as $key => $program) { ?>
                <div class="py">
                    <div class="pt-3 w-full flex flex-between items-center gap-3">
                        <?php if (!in_array($program['programme_layout_name'], $allTitle)) { ?>
                        <h3 class="text-main-red text-[20px] lg:text-[36px] font-bold">
                            <?= $program['programme_layout_name'] ?>
                            <?php $allTitle[] = $program['programme_layout_name']; ?>
                        </h3>
                        <?php } ?>
                        <!-- bouton d'edit -->
                        <?php if ($CanModify == true) { ?>
                        <i onclick="swapDivsById('program_name_<?= $key ?>','program_name-update_<?= $key ?>')"
                            class="fa-solid fa-pen text-main-red fa-sm cursor-pointer"></i>
                        <?php } ?>
                    </div>
                    <li id="program_name_<?= $key ?>"
                        class="[&>ul]:list-outside [&>ul]:list-disc [&>ul]:ml-5 [&>ul]:md:ml-10 [&_li]:pb-2">
                        <?= $program['programme_name'] ?>
                    </li>
                    <!-- formulaire d'edit lien site -->
                    <?php if ($CanModify == true) { ?>
                    <form id="program_name-update_<?= $key ?>"
                        action="?action=updateFormationElement&id=<?= $formation_main->id ?>&type=program" method="POST"
                        class="hidden w-full p-4" method="post" action="">
                        <textarea name="description" class="w-full text-editor"
                            rows="20"> <?= $program['programme_name'] ?></textarea>
                        <input type="hidden" name="programme_layout_id"
                            value="<?= $program['programme_layout_id'] ?>" />
                        <button type="submit"
                            class="py-2 px-4 bg-main-red border-main-white border text-main-white my-4 mr-4">Modifier <i
                                class="fa-solid fa-check"></i></button>
                        <span onclick="swapDivsById('program_name_<?= $key ?>','program_name-update_<?= $key ?>')"
                            class="cursor-pointer">Annuler
                            <i class="fa-solid fa-xmark"></i></span>
                    </form>
                    <?php } ?>
                </div>
                <?php } ?>
            </div>
            <div class="sectionChange hidden bg-white text-[16px] lg:text-[20px]">
                <div class="py-4">
                    <div class="pb-3 flex items-center gap-3">
                        <h3 class="text-main-red text-[20px] lg:text-[36px] font-bold">Frais de scolarité</h3>
                        <!-- bouton d'edit -->
                        <?php if ($CanModify == true) { ?>
                        <i onclick="swapDivsById('feeContent','feeContent-update')"
                            class="fa-solid fa-pen text-main-red fa-sm cursor-pointer"></i>
                        <?php } ?>
                    </div>
                    <ul id="feeContent" class="list-outside list-disc ml-5 md:ml-10 [&>li]:pb-2">
                        <?php
                        foreach ($formation_fee as $fee) { ?>
                            <?= $fee['fee_name'] ?> <!--Liste déja incluse -->
                        <?php } ?>
                    </ul>
                    <!-- formulaire d'edit lien site -->
                    <?php if ($CanModify == true) { ?>
                    <form id="feeContent-update"
                        action="?action=updateFormationElement&id=<?= $formation_main->id ?>&type=fee" method="POST"
                        class="hidden w-full p-4 flex flex-col" method="post" action="">
                        <div class="flex flex-col gap-3">
                            <div id="fee_selectContent">
                            </div>
                            <select id="select_fee" class="w-2/3 md:w-1/2 appearance-none border-main-red rounded-lg"
                                multiple>
                                <?php foreach ($fee_all as $fee) { ?>
                                <option value="<?= $fee['fee_id'] ?>">
                                    <?= $fee['fee_name'] ?>
                                </option>
                                <?php } ?>
                            </select>
                        </div>
                        <div>
                            <button type="submit"
                                class="py-2 px-4 bg-main-red border-main-white border text-main-white my-4 mr-4">Modifier
                                <i class="fa-solid fa-check"></i></button>
                            <span onclick="swapDivsById('feeContent','feeContent-update')"
                                class="cursor-pointer">Annuler
                                <i class="fa-solid fa-xmark"></i></span>
                        </div>
                    </form>
                    <?php } ?>
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
    <div class="flex items-center gap-3">
        <div class="pb-3 flex items-center gap-4 text-main-red">
            <i class="fa fa-sharp fa-solid fa-graduation-cap fa-2xl"></i>
            <h3 class="text-[30px] lg:text-[40px] font-bold">Certifications</h3>
        </div>
        <!-- bouton d'edit -->
        <?php if ($CanModify == true) { ?>
        <i onclick="swapDivsById('certificationAllContent','certificationAllContent-update')"
            class="fa-solid fa-pen text-main-red fa-sm cursor-pointer"></i>
        <?php } ?>
    </div>
    <div id="certificationAllContent">
        <?php foreach ($formation_certification as $key => $certification) { ?>
        <div id="certificationContent_<?= $key ?>" class="pb-5">
            <div class="pb-5 flex items-center gap-3 text-main-blue font-bold">
                <p>
                    <a href="<?= $certification['link'] ?>" target="_blank">
                        <?= $certification['ref'] ?> <span
                            class="h-[30px] mx-2 border-l-2 border-main-blue md:mx-8 md:border-0"></span>
                        <?= $certification['name'] ?>
                    </a>
                </p>
                <!-- bouton d'edit -->
                <?php if ($CanModify == true) { ?>
                <i onclick="swapDivsById('certificationContent_<?= $key ?>','certificationContent-update_<?= $key ?>')"
                    class="fa-solid fa-pen fa-sm cursor-pointer"></i>
                <?php } ?>
            </div>

            <div class="[&>ul]:ml-5 md:ml-10">
                <?= $certification['description'] ?>
            </div>
        </div>
        <!-- formulaire d'edit lien site -->
        <?php if ($CanModify == true) { ?>
        <form id="certificationContent-update_<?= $key ?>"
            action="?action=updateFormationElement&id=<?= $formation_main->id ?>&type=certification" method="POST"
            class="hidden w-full p-4" method="post" action="">
            <div class="flex flex-col md:flex-row">
                <input type="text" name="ref" placeholder="<?= $certification['ref'] ?>"
                    class="md:border-r-0 border-main-red" />
                <input type="text" name="name" placeholder="<?= $certification['name'] ?>"
                    class="w-full border-main-red" />
            </div>
            <input type="text" name="link" placeholder="<?= $certification['link'] ?>"
                class="w-full border-t-0 border-main-red" />
            <textarea name="description" class="w-full text-editor border-t-0 border-main-red"
                rows="5"><?= $certification['description'] ?></textarea>
            <input type="hidden" name="certification_id" value="<?= $key ?>" />
            <button type="submit" +
                class="py-2 px-4 bg-main-red border-main-white border text-main-white my-4 mr-4">Modifier <i
                    class="fa-solid fa-check"></i></button>
            <span onclick="swapDivsById('certificationContent_<?= $key ?>','certificationContent-update_<?= $key ?>')"
                class="cursor-pointer">Annuler
                <i class="fa-solid fa-xmark"></i></span>
        </form>
        <?php } ?>
        <?php } ?>
    </div>
    <!-- formulaire d'edit lien site -->
    <?php if ($CanModify == true) { ?>
    <form id="certificationAllContent-update"
        action="?action=updateFormationElement&id=<?= $formation_main->id ?>&type=formation_certification" method="POST"
        class="hidden w-full p-4 flex flex-col" method="post" action="">
        <div class="flex flex-col gap-3">
            <div id="certification_selectContent">
            </div>
            <select id="select_certification" class="appearance-none border-main-red rounded-lg" multiple>
                <?php foreach ($certification_all as $certification) { ?>
                <option value="<?= $certification['certification_id'] ?>">
                    <?= $certification['certification_name'] ?>
                </option>
                <?php } ?>
            </select>
        </div>
        <div>
            <button type="submit"
                class="py-2 px-4 bg-main-red border-main-white border text-main-white my-4 mr-4">Modifier
                <i class="fa-solid fa-check"></i></button>
            <span onclick="swapDivsById('certificationAllContent','certificationAllContent-update')"
                class="cursor-pointer">Annuler
                <i class="fa-solid fa-xmark"></i></span>
        </div>
    </form>
    <?php } ?>
</section>

<?php $content = ob_get_clean(); ?>



<?php ob_start(); ?>
<script src="assets/js/tabs.js"></script>
<script src="assets/js/event_formation.js"></script>
<?php $script = ob_get_clean(); ?>

<?php require 'view/layout.php'; ?>