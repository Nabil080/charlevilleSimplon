<?php $title = $project->name; ?>

<?php ob_start(); ?>
<!-- header -->
<section class="text-center [&_h5]:italic [&_h5]:my-2">
    <!-- titre du projet  -->

    <h1 id="title" class="font-title text-2xl sm:text-3xl lg:text-[40px] font-semibold text-main-red uppercase">
        <?= $project->name; ?>

        <!-- bouton d'edit -->
        <?php if ($isMyProject == true) { ?>
        <i onclick="swapDivsById('title','title-update')" class="fa-solid fa-pen text-main-red cursor-pointer"></i>
        <?php } ?>
    </h1>

    <?php if ($isMyProject == true) { ?>
    <!-- formulaire d'edit -->
    <form id="title-update" method="POST" action="?action=updateProjectElement&id=<?= $project->id ?>&type=title"
        class="hidden space-x-4 font-title text-2xl sm:text-3xl lg:text-[40px] font-semibold text-main-red uppercase ">
        <input name="title" class="border-main-red border-2 p-2" placeholder="<?= $project->name; ?>">
        <input type="hidden" name="id" value="<?= $project->id; ?>">
        <input type="hidden" value="title" name="type"/>
        <button type="submit"><i class="fa-solid fa-check"></i></button>
        <i onclick="swapDivsById('title','title-update')" class="fa-solid fa-xmark cursor-pointer"></i>
    </form>
    <?php } ?>

    <!-- Apprenants du projet -->
    <div>
        <h5>Réalisé par :</h5>

        <div id="students"
            class="flex flex-wrap justify-center gap-2 text-sm md:text-base 2xl:text-lg text-main-white [&>a]:bg-main-gray [&>a]:py-0.5 [&>a]:px-3 [&>a]:rounded-full">
            <?php if (isset($team)) {
            foreach ($team as $user) { 
                if ($user->role_id !== 2) { ?>
            <a href="?action=profilePage&id=<?= $user->user_id ?>"
                class="border border-main-gray hover:text-main-gray hover:bg-main-white"><?= $user->user_surname ?> </a>
            <?php }} ?>
            <?php if ($isMyProject == true) { ?>
            <!-- bouton d'edit -->
            <i onclick="swapDivsById('students','students-update')"
                class="fa-solid fa-pen text-main-red cursor-pointer h-fit my-auto"></i>
            <?php }} else if (!isset($team)) {?>
            <p class="text-red-500 text-xl"> Pas d'apprenants assignés pour le moment</p>
            <?php } ?>

        </div>
        <?php if ($isMyProject == true) { ?>
        <!-- formulaire d'edit -->

        <form id="students-update" method="POST"
            action="?action=updateProjectElement&id=<?= $project->id ?>&type=apprenants"
            class="hidden space-x-4 text-main-red">
            <select name="students[]" multiple class="border-main-red border-2 p-2">
                <?php foreach ($promoUsers as $user) { 
                    if ($user->role_id !== 2) { ?>
                <option value="<?= $user->user_id ?>" <?php if (in_array($user, $team)) { echo "selected"; } ?>>
                    <?= $user->user_name ?> <?= $user->user_surname ?>
                </option>
                <?php }} 
                foreach ($team as $user) { 
                if ($user->role_id !== 2) { ?>
                <input type="hidden" name="actualTeam[]" value=<?= $user->user_id ?> />
                <?php }} ?>

            </select>
            <input type="hidden" name="id" value="<?= $project->id; ?>">
            <input type="hidden" value="apprenants" name="type"/>
            <button type="submit"><i class="fa-solid fa-check text-main-red"></i></button>
            <i onclick="swapDivsById('students','students-update')"
                class="fa-solid fa-xmark text-main-red cursor-pointer"></i>
        </form>
        <?php } ?>
    </div>
    <!-- Formateurs du projet -->
    <div>
        <h5>Supervisé par :</h5>

        <div id="formator"
            class="flex flex-wrap justify-center gap-2 text-sm md:text-base 2xl:text-lg text-main-white [&>a]:bg-main-gray [&>a]:py-0.5 [&>a]:px-3 [&>a]:rounded-full">
            <?php if (isset($team)) {?>
            <?php foreach ($team as $user) { 
                if ($user->role_id == 2) { ?>
            <a href="?action=profilePage&id=<?= $user->user_id ?>"
                class="border border-main-gray hover:text-main-gray hover:bg-main-white"><?= $user->user_surname ?> </a>
            <?php }} ?>

            <!-- bouton d'edit -->
            <?php if ($isMyProject == true) { ?>
            <i onclick="swapDivsById('formator','formator-update')"
                class="fa-solid fa-pen text-main-red cursor-pointer h-fit my-auto"></i>
            <?php } ?>
            <?php } else if (!isset($team)) {?>
            <p class="text-red-500 text-xl"> Pas de formateur assigné pour le moment</p>
            <?php } ?>
        </div>
        <?php if ($isMyProject == true) { ?>
        <!-- formulaire d'edit -->

        <form id="formator-update" action="?action=updateProjectElement&id=<?= $project->id ?>&type=formateurs"
            method="POST" class="hidden space-x-4 text-main-red">
            <select name="formators[]" multiple class="border-main-red border-2 p-2">
                <?php foreach ($promoFormateurs as $user) { 
                    if ($user->role_id == 2) { ?>
                <option value="<?= $user->user_id ?>" <?php if (in_array($user, $team)) { echo "selected"; } ?>>
                    <?= $user->user_name ?> <?= $user->user_surname ?>
                </option>
                <?php }} 
                foreach ($promoFormateurs as $user) { 
                    if ($user->role_id == 2) { ?>
                <input type="hidden" name="actualFormatorTeam[]" value=<?= $user->user_id ?> />
                <?php }
                } ?>
            </select>
            <input type="hidden" name="id" value="<?= $project->id; ?>">
        <input type="hidden" value="formateurs" name="type"/>
            <button type="submit"><i class="fa-solid fa-check text-main-red"></i>
            </button>
            <i onclick="swapDivsById('formator','formator-update')"
                class="fa-solid fa-xmark text-main-red cursor-pointer"></i>

        </form>
        <?php } ?>
    </div>
</section>

<!-- aperçu projet -->
<section
    class="text-center sm:text-start mx-4 mt-4 sm:grid grid-cols-2 gap-8 sm:gap-10 md:gap-12 lg:gap-20 xl:gap-40 max-w-[1200px] lg:mx-12 xl:mx-auto">
    <!-- maquette -->
    <article class="order-2">

        <?php if (isset($project->model_link)) { ?>

        <div class="font-title text-xl sm:text-2xl xl:text-3xl font-bold my-4 w-full"><a
                href="<?= $project->model_link ?>" target="_blank" class="underline">Maquette/Wireframe</a>
            <?php } else if (!isset($project->model_link)) { ?>
            <p class="text-red-500 text-xl"> Pas de lien pour le moment</p>
            <?php }
         if ($isMyProject == true) { ?>
            <i onclick="swapDivsById('maquette','maquette-update')"
                class="fa-solid fa-pen text-main-red cursor-pointer"></i>
        </div>
        <?php } ?>

        <div class="w-full max-h-[300px] sm:max-h-[350px] overflow-scroll">
            <img id="maquette" class="w-full" src="<?= $project->model_image ?>" alt="maquette du projet">
            <?php if ($isMyProject == true) { ?>
            <form id="maquette-update" enctype="multipart/form-data"
                action="?action=updateProjectElement&id=<?= $project->id ?>&type=image" method="POST" class="hidden">
                <input type="file" name="image">
                <div class="m-2">
                    <label for="lien" class="font-bold italic">Lien du projet :</label>
                    <input type="text" name="lien" placeholder="<?= $project->model_link ?>">
                </div>
                <div class="flex">
                <input type="hidden" name="id" value="<?= $project->id; ?>">
                <input type="hidden" value="image" name="type"/>
                    <button type="submit"
                        class="py-2 px-4 bg-main-red border-main-white border text-main-white my-4 mr-4">Modifier <i
                            class="fa-solid fa-check"></i></button>
                    <div class="w-fit h-fit py-2 px-4 bg-main-red border-main-white border text-main-white cursor-pointer my-4"
                        onclick="swapDivsById('maquette','maquette-update')">Annuler <i class="fa-solid fa-xmark"></i>
                    </div>
                </div>
            </form>
            <?php } ?>
        </div>
    </article>
    <!-- avancement -->
    <article class="flex-col flex">
        <?php if (isset($allProgress)) { ?>

        <div class="font-title text-xl sm:text-2xl xl:text-3xl font-bold my-4"><span class="underline">Avancement</span>
            <!-- boutons d'edit -->

            <?php if ($isMyProject == true) { ?>
                <i onclick="
                <?php foreach ($allProgress as $progress) { ?>
                    swapDivsById('progress<?=$progress->id?>','progress<?=$progress->id?>-update')
                <?php } ?>
                    " class="fa-solid fa-pen text-main-red cursor-pointer h-fit my-auto"></i></div>
            <?php } ?>

        <div class="grow flex !content-start h-fit flex-wrap mt-2  flex-col justify-center" style="justify-content: start;">
            <?php $i = 0;
            foreach ($allProgress as $progress) { ?>
                <!-- avancement 1 -->
            <div id="progress<?= $progress->id ?>" class="mb-1  text-md sm:text-xl xl:text-2xl  text-start italic"><?= $progress->name ?></div>
                <!-- formulaire d'edit 1 -->
                
                <div class="w-full bg-gray-200 rounded-full h-2.5 mb-4">
                    <div class="progressBar bg-green-600 h-2.5 rounded-full" data-width="<?= $progress->number ?>" style="width: <?= $progress->number ?>%"></div>
                </div>
            <?php if ($isMyProject == true) { ?>

            <form id="progress<?= $progress->id ?>-update"
                action="?action=updateProjectElement&id=<?= $project->id ?>&type=progress" method="POST"
                class="hidden my-2 gap-4 w-full flex place-items-center">
                <input name="name" type="text" class="min-w-[80px] grow" placeholder="<?= $progress->name ?>">
                <input name="number" type="number" class="w-1/5 min-w-[80px]" placeholder="<?= $progress->number ?>">
                <input name="progress_id" type="hidden" value="<?= $progress->id ?>">
                <input type="hidden" name="id" value="<?= $project->id; ?>">
                <input type="hidden" value="progress" name="type"/>
                <button type="submit"><i class="fa-solid fa-check text-main-red"></i></button>
                <i onclick="swapDivsById('progress1','progress1-update')"
                    class="fa-solid fa-xmark text-main-red cursor-pointer"></i>
            </form>
            <?php } ?>

            <?php $i++; } ?>
            <?php } else if (!isset($project->github)) {?>
                <p class="text-red-500 text-xl"> Pas de barre de progression pour le moment</p>
            <?php } ?>
            <div class="modify-skills flex items-center pt-2  lg:mt-5">
                <h3 class="font-title text-[24px] font-bold uppercase lg:mb-3">Compétences
                <i onclick="swapDivsById('skills','skills-update')" class="fa-solid fa-pen cursor-pointer text-main-red w-[20px] pl-3"></i></h3>
            </div>
            <div id="skills" class="flex gap-4 justify-center sm:justify-normal mx-auto sm:px-4 mt-2 lg:mt-7 mb-4 flex-wrap">
                <?php if(empty($project->tags)){ ?>
                    <p>Pas de compétences renseignées</p>
                    <?php } ?>


                <?php $tagsId = [];
                foreach ($project->tags as $tag) { ?>
                        <p class="bg-[#F2F2F3] px-4 py-1 border-main-gray border-2 text-[14px] lg:text-[16px] rounded-[50px] mb-2"><?= $tag->name ?></p>
                <?php 
                $tagsId[] = $tag->id;
                } ?>
            </div>

            <form id="skills-update" method="POST" action="?action=updateUserElements&type=skills&id=" class="hidden flex flex-col">
                <select multiple name="skills[]">
                    <option selected disabled>Sélectionner des compétences</option>
                    <?php 
                    foreach ($allTags as $eachTag){ ?>
                        <option value="<?= $eachTag['tag_id']?>" 
                        <?php if(in_array($eachTag['tag_id'],$tagsId)){echo "selected";}?>   >
                        <?= $eachTag['tag_name'] ?></option>
                    <?php } ?>
                </select>
                <input type="hidden" name="id" value="<?= $project->id; ?>">
                <input type="hidden" value="tags" name="type"/>
                <div class="flex justify-center">
                    <button type="submit" class="py-2 px-4 bg-main-red border-main-white border text-main-white my-4 mr-4">Modifier <i class="fa-solid fa-check"></i></button>
                    <span onclick="swapDivsById('skills','skills-update')" class="cursor-pointer border my-4 mr-4 py-2 px-4">Annuler <i class="fa-solid fa-xmark"></i></span>
                </div>
            </form>
                        
            <div class="uppercase space-x-4 mt-4 [&>tag]:bg-main-gray [&>tag]:bg-opacity-10 [&>tag]:py-2 [&>tag]:px-4 [&>tag]:rounded-full">
            <!-- <h4 class="text-xl italic mb-4">Compétences du projet :</h4>
            <?php foreach($project->tags as $tag){ ?>
                <tag><?=$tag->name?></tag>
            <?php } ?> -->
        </div>
        </div>
        

    </article>
</section>

<!-- boutons liens externes -->
<section class="my-12 lg:grid grid-cols-3 lg:max-w-[1150px] mx-auto [&_i]:text-[40px] [&_i]:w-10 [&_i]:text-center">
    <!-- bouton 1 github -->
    <div class="flex mx-4 my-4 gap-4 h-max">
        <?php if (isset($project->github)) { ?>

        <i class="fa-brands fa-github"></i>


        <a id="github" href="<?= $project->github ?>" target="_blank" class="text-main-white px-4 bg-main-red grow h-[40px] flex items-center justify-center">Voir le github du projet</a>

        <!-- formulaire d'edit github -->
        <?php if ($isMyProject == true) { ?>
        <form id="github-update" action="?action=updateProjectElement&id=<?= $project->id ?>&type=github" method="POST"
            class="hidden w-full flex flex-wrap">
            <input type="text" name="github" placeholder="<?= $project->github ?>"
                class="text-main-white bg-main-red w-1/2 grow h-[40px] flex items-center justify-center">
                <input type="hidden" name="id" value="<?= $project->id; ?>">
        <input type="hidden" value="github" name="type"/>
            <button type="submit"><i class="fa-solid fa-check text-main-red"></i></button>
            <i onclick="swapDivsById('github','github-update')"
                class="fa-solid fa-xmark text-main-red cursor-pointer"></i>
        </form>
        <?php }} else if (!isset($project->github)) {?>
        <p class="text-red-500 text-xl"> Pas de github pour le moment</p>
        <?php } ?>
    </div>
    <!-- bouton 2 -->
    <div class="flex mx-8 my-4 gap-4 h-max">
        <?php if (isset($project->file)) { ?>

        <i class="fa-solid fa-file-pdf"></i>


        <a id="pdf" href="<?= $project->file ?>" download class="text-main-white px-4 text-center whitespace-nowrap bg-main-red grow h-[40px] flex items-center justify-center">Télécharger le cahier des charges</a>

        <?php if ($isMyProject == true) { ?>
        <!-- formulaire d'edit cahier des charges -->
        <form id="pdf-update" enctype="multipart/form-data"
            action="?action=updateProjectElement&id=<?= $project->id ?>&type=pdf" method="POST"
            class="hidden w-full flex flex-wrap">
            <input type="file" name="pdf" placeholder="<?= $project->file ?>"
                class="text-main-white bg-main-red w-1/2 grow h-[40px] flex items-center justify-center" />
            <input type="hidden" name="id" value="<?= $project->id; ?>">
            <input type="hidden" value="pdf" name="type"/>
            <button type="submit"><i class="fa-solid fa-check text-main-red"></i></button>
            <i onclick="swapDivsById('pdf','pdf-update')" class="fa-solid fa-xmark text-main-red cursor-pointer"></i>
        </form>
        <?php }} else if (!isset($project->file)) {?>
        <p class="text-red-500 text-xl"> Pas de cahier des charges pour le moment</p>
        <?php } ?>
    </div>

    <!-- bouton 3 -->
    <div class="flex mx-4 my-4 gap-4 h-max">
        <?php if (isset($project->model_link)) { ?>
        <i class="fa-brands fa-chrome"></i>

        <a id="link" href="<?= $project->model_link ?>" target="_blank" class="<?php if (!isset($project->model_link)) { ?> disabled-button <?php } ?>
         text-main-white bg-main-red grow h-[40px] flex items-center px-4 justify-center">Lien vers le site</a>
        <!-- formulaire d'edit lien site -->
        <?php if ($isMyProject == true) { ?>
        <form id="link-update" action="?action=updateProjectElement&id=<?= $project->id ?>&type=link" method="POST"
            class="hidden w-full flex flex-wrap">
            <input type="text" name="link" placeholder="<?= $project->model_link ?>"
                class="text-main-white bg-main-red w-1/2 grow h-[40px] flex items-center justify-center">
                <input type="hidden" name="id" value="<?= $project->id; ?>">
                <input type="hidden" value="link" name="type"/>
            <button type="submit"><i class="fa-solid fa-check text-main-red"></i></button>
            <i onclick="swapDivsById('link','link-update')" class="fa-solid fa-xmark text-main-red cursor-pointer"></i>
        </form>
        <?php } ?>
        <?php } else if (!isset($project->model_link)) { ?>
        <p class="text-red-500 text-xl"> Pas de lien pour le moment</p>
        <?php } ?>
    </div>
</section>

<?php if ($isMyProject == true) { ?>
<!-- bouton d'edit liens externes -->
<div onclick="swapDivsById('github','github-update');swapDivsById('link','link-update');swapDivsById('pdf','pdf-update')"
    class="w-fit mx-auto relative -top-10 text-main-red cursor-pointer"><i class="fa-solid fa-pen cursor-pointer"></i>
    Modifier les liens</div>
<?php } ?>
<!-- tabulation entreprise/apprenants -->
<section class="max-w-[1200px] w-full mx-auto">
    <div class="flex w-full">
        <div onclick="changeTab(0)" class="tabChange cursor-pointer px-0 transition-all duration-[0.4s] !bg-main-red w-1/2 flex items-center justify-center text-main-white font-title text-lg md:text-xl lg:text-2xl font-bold py-2 md:py-4">
            <p class="select-none">Demandes de l'entreprise</p>
        </div>
        <div onclick="changeTab(1)"
            class="tabChange cursor-pointer px-0 transition-all duration-[0.4s] bg-main-gray w-1/2 text-center text-main-white font-title text-lg md:text-xl lg:text-2xl font-bold py-2  md:py-4">
            <p class="select-none">Notes des <br> apprenants</p>

        </div>
    </div>
</section>


<!-- CONTENU TAB -->
<section class="max-w-[1200px] mx-auto flex pb-5">
    <!-- CONTENU TAB ENTREPRISE -->
    <div class="sectionChange">
        <h2 class="text-center italic font-title text-xl lg:text-2xl font-semibold uppercase my-4">Demandes de
            l'entreprise
            <!-- bouton d'edit -->

            <?php if ($isMyProject == true) { ?>
            <i onclick="swapDivsById('company-notes','company-notes-update')"
                class="fa-solid fa-pen text-main-red cursor-pointer"></i>
            <?php } ?>
        </h2>
        <div class="mx-4 h-1 bg-main-red"></div>
        <div class="flex w-[98vw] max-w-[1200px] mx-auto">
            <div id="company-notes" class="m-4 lg:w-4/5">
                <?= $project->description ?>
            </div>
            <br>
            <?php if ($isMyProject == true) { ?>


            <!-- formulaire d'edit -->
            <form id="company-notes-update"
                action="?action=updateProjectElement&id=<?= $project->id ?>&type=companyNote" method="POST"
                class="hidden w-4/5 m-4" method="post">
                <textarea name="companyNotes" id="editor" class="w-full" rows="10">
                        <?= $project->description ?>
                        <br>
                    </textarea>
                    <input type="hidden" name="id" value="<?= $project->id; ?>">
                <input type="hidden" value="companyNote" name="type"/>
                <button type="submit"
                    class="py-2 px-4 bg-main-red border-main-white border text-main-white my-4 mr-4">Modifier <i
                        class="fa-solid fa-check"></i></button>
                <span onclick="swapDivsById('company-notes','company-notes-update')" class="cursor-pointer">Annuler <i
                        class="fa-solid fa-xmark"></i></span>
            </form>


            <?php } ?>
            <!-- ANIMATION ASIDE -->
            <div class="hidden lg:grid w-1/5 max-h-[400px] justify-start place-items-center">
                <img class="w-4/5" src="<?= $project->company_image ?>" alt="anim">
                <!-- <svg width="200" id="animation" class="h-[280px]" xmlns="http://www.w3.org/2000/svg">
                </svg> -->

            </div>
        </div>
    </div>
    <!-- CONTENU TAB APPRENANT -->
    <div class="sectionChange hidden">
        <h2 class="text-center italic font-title text-xl lg:text-2xl font-semibold uppercase my-4">Notes des apprenants

            <?php if ($isMyProject == true) { ?>
            <!-- bouton d'edit -->
            <i onclick="swapDivsById('notes','notes-update')" class="fa-solid fa-pen text-main-red cursor-pointer"></i>
            <?php } ?>
        </h2>
        <div class="mx-4 h-1 bg-main-red"></div>
        <div class="flex">
            <div id="notes" class="m-4 lg:w-4/5">
                <?= $project->notes ?>
            </div>
            <?php if ($isMyProject == true) { ?>

            <!-- formulaire d'edit -->
            <form id="notes-update"
                method="POST" class="hidden w-full m-4" method="post" action="">
                <textarea name="studentsNote" id="editor" class="w-full" rows="auto">
                    <?= $project->notes ?>
                </textarea>
                <input type="hidden" name="id" value="<?= $project->id; ?>">
                <input type="hidden" value="studentsNote" name="type"/>
                <button type="submit"
                    class="py-2 px-4 bg-main-red border-main-white border text-main-white my-4 mr-4">Modifier <i
                        class="fa-solid fa-check"></i></button>
                <span onclick="swapDivsById('notes','notes-update')" class="cursor-pointer">Annuler <i
                        class="fa-solid fa-xmark"></i></span>
            </form>
            <?php } ?>
            <!-- ANIMATION ASIDE -->
            <div class="hidden lg:grid w-1/5 place-items-center">
                <img class="w-4/5" src="assets/img/logo" alt="anim">
            </div>
        </div>
    </div>
</section>

<?php $content = ob_get_clean(); ?>
<?php ob_start(); ?>
<script src="assets/js/ajax_project.js"></script>

<script src="assets/js/tabs.js"></script>
<script src="assets/js/project.js"></script>
<script src="assets/js/editor_setup.js"></script>

<?php $script = ob_get_clean(); ?>

<?php require 'view/layout.php'; ?>