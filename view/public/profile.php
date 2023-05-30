<?php
$title = "Espace personnel";
?>

<?php ob_start();
var_dump($userDatas);
var_dump($userProjects);
?>
<!-- Section photo et description -->
<div class="background bg-main-white overflow-x-hidden min-h-[100vh]">

    
    <?php
    if($isMyProfile == false)
    {
        $notMyProfile = 'style="display:none"';
    } else {
        $notMyProfile = '';
    }
    if ($userDatas->role->id == 5) {?>
        <!-- PROFIL PROSPECT -->
        <section class="prospect_profil">
            <!-- Image de profil -->
            <div class="picture_desc grid grid-cols-1 lg:grid-cols-2 items-center py-[50px] px-[8%] 2xl:px-[5%]">
                <div class="picture max-h-screen lg:mr-5">
                    <img class="w-full rounded-t-lg" src="assets/img/avatar/<?= $userDatas->avatar ?>" alt="Image de profil">
                    <button class="bg-main-red w-full text-main-white text-[16px] lg:text-[28px] py-3 rounded-b-lg" <?= $notMyProfile; ?>>Changer ma photo de profil</button>
                </div>
                <div class="description lg:ml-5 h-[100%] flex flex-col">
                    <h1 class="text-main-red font-title text-[28px] lg:text-[48px] font-semibold pt-5 text-center lg:text-left"><span class="uppercase"><?= $userDatas->name ?></span> <?= $userDatas->surname ?></h1>
                    <div class="text-desc rounded-[5px] border-[1px] border-main-border mt-2 grow lg:flex lg:flex-col lg:justify-between">
                        <p class="text-[20px] text-justify pt-4 px-3 pb-2 lg:pb-0">Candidature pour la formation <?= $userPromo->name ?></p>
                        <div class="formation_status flex justify-center items-center px-3">
                            <span class="text-[28px] flex justify-center pt-1 pb-2 italic">Statut : <?= $userDatas->status->name ?></span>
                            <span class="w-6 h-6 border-[1px rounded-full ml-2 
                                <?php if ($userDatas->status->id == 7){?> bg-main-red<?php }?>
                                <?php if ($userDatas->status->id == 6){?> bg-main-green<?php }?>
                                <?php if ($userDatas->status->id == 2){?> bg-main-orange<?php }?>"></span>
                        </div>
                        <div class="h-0 border-[2px] border-main-red w-1/2 mb-5"></div>
                        <ul class="text-justify px-3 pb-3 text-[16px] lg:text-[18px] leading-loose ml-8">
                            <li class="list-disc">Nom : <?= $userDatas->name ?></li>
                            <li class="list-disc">Prénom : <?= $userDatas->surname ?> </li>
                            <li class="list-disc">Adresse : <?= $userDatas->adress ?></li>
                            <li class="list-disc">Email : <?= $userDatas->email ?></li>
                            <li class="list-disc">Téléphone : <?= $userDatas->phone ?></li>
                            <li class="list-disc">Date de naissance : <?= $userDatas->birth_date ?></li>
                            <li class="list-disc">Lieu de naissance : <?= $userDatas->birth_place ?></li>
                            <li class="list-disc">Nationalité : <?= $userDatas->nationality ?></li>
                            <li class="list-disc">Numéro Pôle Emploi : <?= $userDatas->numero_pe ?></li>
                        </ul>
                        <button data-modal-target="modify-prospect_data-modal" data-modal-toggle="modify-prospect_data-modal" class="bg-main-red w-full lg:w-3/5 text-main-white text-[18px] uppercase py-3 rounded-b-lg lg:rounded-none lg:mb-4 lg:flex lg:justify-center lg:mx-auto" <?= $notMyProfile; ?>>Editer ma candidature</button>
                        <!-- Modal de modification des informations persos -->
                        <section id="modify-prospect_data-modal" data-modal-placement="center" tabindex="-1" aria-hidden="true" class="backdrop:brightness-50 fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto lg:inset-0 h-[calc(100%-1rem)] lg:h-full">
                            <div class="relative w-full h-fit max-w-lg lg:h-auto">
                                <div class="relative bg-main-white border-main-red border-2 rounded-lg text-main-red">
                                    <button type="button" class="absolute top-3 right-2.5 text-main-red bg-transparent rounded-lg text-sm p-1.5 ml-auto inline-flex items-center hover: hover:border border-main-red" data-modal-hide="modify-prospect_data-modal">
                                        <svg data-modal-hide="modify-prospect_data-modal" aria-hidden="true" class="w-5 h-5 text-main-light" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                        <span class="sr-only">Close modal</span>
                                    </button>
                                    <!-- Partie MODIFICATION -->
                                    <div id="co" class="px-6 py-6 lg:px-8">
                                        <h3 class="mb-4 text-medium uppercase w-fit mx-auto font-bold font-title text-main-red">Modifier mes informations personnelles</h3>
                                        <form class="space-y-6" action="" method="post">
                                            <div>
                                                <label for="email" class="block mb-1 text-sm font-medium  text-main-red">E-mail</label>
                                                <input type="email" name="email" id="email" class=" border text-sm rounded-lg block w-full p-1.5 border-main-red text-main-red" placeholder="<?= $userDatas->email ?>">
                                            </div>
                                            <div>
                                                <label for="phone" class="block mb-1 text-sm font-medium  text-main-red">Téléphone</label>
                                                <input type="phone" name="phone" id="phone" class=" border text-sm rounded-lg block w-full p-1.5 border-main-red text-main-red" placeholder="<?= $userDatas->phone ?>">
                                            </div>
                                            <div>
                                                <label for="adress" class="block mb-1 text-sm font-medium  text-main-red">Adresse</label>
                                                <input type="adress" name="adress" id="adress" class=" border text-sm rounded-lg block w-full p-1.5 border-main-red text-main-red" placeholder="<?= $userDatas->adress ?>">
                                            </div>
                                            <div>
                                                <label for="numero_pe" class="block mb-1 text-sm font-medium  text-main-red">Numéro Pôle Emploi</label>
                                                <input type="numero_pe" name="numero_pe" id="numero_pe" class=" border text-sm rounded-lg block w-full p-1.5 border-main-red text-main-red" placeholder="<?= $userDatas->numero_pe ?>">
                                            </div>
                                            <div>
                                                <label for="nationality" class="block mb-1 text-sm font-medium  text-main-red">Nationalité</label>
                                                <input type="nationality" name="nationality" id="nationality" class=" border text-sm rounded-lg block w-full p-1.5 border-main-red text-main-red" placeholder="<?= $userDatas->nationality ?>">
                                            </div>
                                            <div>
                                                <label for="new_password" class="block mb-1 text-sm font-medium text-main-red">Choisir un nouveau mot de passe</label>
                                                <input type="new_password" name="new_password" id="new_password" class=" border text-sm rounded-lg block w-full p-1.5 border-main-red text-main-red" placeholder="">
                                            </div>
                                            <div>
                                                <label for="password" class="block mb-1 text-sm font-medium  text-main-red">Veuillez confirmer vos modifications en entrant votre (ancien) mot de passe.</label>
                                                <input type="password" name="password" id="password" placeholder="*********" class=" border text-sm rounded-lg block w-full p-1.5 border-main-red text-main-red" required>
                                            </div>
                                            <button type="submit" class="w-full uppercase font-title text-main-white bg-main-red hover:bg-red-800 font-medium rounded-lg text-sm px-5 py-1.5 text-center ">Se connecter</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </section>
    <?php } ?>

    <?php if ($userDatas->role->id == 4 || $userDatas->role->id == 2) { ?>
        <!-- PROFIL APPRENANT -->
        <section class="apprenant_profil">
            <!-- Image de profil et description -->
            <div class="picture_description grid grid-cols-1 lg:grid-cols-2 items-center px-[8%] lg:px-[3%]">
                <!-- Image de profil -->
                <div class="picture max-h-screen mx-auto">
                    <img class="max-w-full max-h-[600px] overflow-scroll rounded-t-lg" src="assets/img/avatar/<?= $userDatas->avatar ?>" alt="Image de profil">
                    <button class="bg-main-red w-full text-main-white text-[16px] lg:text-[28px] py-3 rounded-b-lg" <?= $notMyProfile; ?>>Changer ma photo de profil</button>
                </div>
                <!-- Description -->
                <div class="description lg:ml-5 h-[100%] flex flex-col">
                    <div class="edit_profil flex justify-center lg:justify-normal items-center pt-5">
                        <h1 id="title" class="text-main-red font-title text-[28px] lg:text-[48px] font-semibold text-center pr-5"><span class="uppercase"><?= $userDatas->name ?></span> <?= $userDatas->surname ?></h1>
                    </div>
                    <!-- Statut -->
                    <div class="formation_status flex justify-center lg:justify-normal items-center px-3 mt-2">
                        <form id="user-status-update" class="hidden space-x-4">
                            <select name="user_status" class="border-main-red px-4 py-2">
                                <option selected disabled>Votre statut</option>
                                <?php foreach ($allStatus as $eachStatus){ ?>
                                    <option value="<?= $eachStatus['status_id']?>"><?= $eachStatus['status_name'] ?></option>
                                <?php } ?>
                            </select>
                            <button type="submit"><i class="fa-solid fa-check text-main-red"></i></button>
                            <i onclick="swapDivsById('user-status','user-status-update')" class="fa-solid fa-xmark text-main-red cursor-pointer"></i>
                        </form>

                        <div id="user-status" class="flex items-center pt-1 pb-2">
                            <span class="w-6 h-6 border-[1px] rounded-full mr-2 animate-pulse
                                <?php if ($userDatas->status->id == 7){?> bg-main-red<?php }?>
                                <?php if ($userDatas->status->id == 6){?> bg-main-green<?php }?>
                                <?php if ($userDatas->status->id == 2){?> bg-main-orange<?php }?>">
                            </span>
                            <span class="text-[16px] flex justify-center italic"><?= $userDatas->status->name ?> depuis <?=  substr($userDatas->status_date, 0,-6) ?></span>
                            <div onclick="swapDivsById('user-status','user-status-update')" class="cursor-pointer" <?= $notMyProfile; ?>>
                                <i class="fa-solid fa-pen text-main-red w-[20px] ml-3"></i>
                                <span class="sm:inline-block text-[10px] lg:text-base text-main-red"> Modifier</span>
                            </div>
                        </div>
                    </div>
                    <!-- Texte de description -->
                    <div class="text_description rounded-[5px] border-[1px] border-main-border bg-main-lightgray mt-5 grow lg:flex lg:flex-col lg:justify-between">
                        <div id="description" class="lg:p-4 flex flex-col ">
                            <p class="text-[18px] text-justify pt-4 px-3 pb-2 lg:pb-0"><?= $userDatas->description ?></p>
                        </div>
                        <form id="description-update" class="hidden h-full">
                            <textarea name="description" id="editor" class="h-full overflow-scroll">
                            <?= $userDatas->description ?>
                            </textarea>
                            <button type="submit" class="py-2 px-4 bg-main-red border-main-white border text-main-white my-4 mr-4">Modifier <i class="fa-solid fa-check"></i></button>
                            <span onclick="swapDivsById('description','description-update')" class="cursor-pointer">Annuler <i class="fa-solid fa-xmark"></i></span>
                        </form>
                        <button onclick="swapDivsById('description','description-update')" class="bg-main-red w-full text-main-white text-[14px] lg:text-[20px] lg:mt-2 py-2 rounded-b-lg" <?= $notMyProfile; ?>>Editer ma description</button>
                    </div>


                    <div class="flex flex-col lg:flex-row justify-center my-3 lg:my-0 lg:mt-4">
                        <div id="cv" class="flex items-center justify-center lg:flex-row flex-col my-4 lg:my-0 lg:mx-auto">
                            <a href="upload/cv/<?= $userDatas->cv ?>" class="bg-main-red text-main-white text-[16px] rounded-[5px] mx-auto py-3 lg:py-1 px-2 lg:px-4" target="_blank">Voir le C.V.</a>
                            <div onclick="swapDivsById('cv','cv-update')" class="modify-cv cursor-pointer flex items-center pt-2 pl-3" <?= $notMyProfile; ?>>
                                <i class="fa-solid fa-download text-main-red w-[20px]"></i>
                                <span class="text-[10px] text-main-red">Modifier mon C.V.</span>
                            </div>
                        </div>
                        <form id="cv-update" class="hidden space-x-4">
                            <input type="file" name="cv">
                            <button type="submit"><i class="fa-solid fa-check text-main-red"></i></button>
                            <i onclick="swapDivsById('cv','cv-update')" class="fa-solid fa-xmark text-main-red cursor-pointer"></i>
                        </form>
                        <a href="mailto:<?= $userDatas->email ?>" class="flex items-center my-4 bg-main-red text-main-white text-[16px] rounded-[5px] mx-auto py-3 lg:py-1 px-2 lg:px-4">Contacter</a>
                    </div>
                </div>
            </div>

            <div class="liens_modal_projets lg:flex lg:flex-row lg:mt-20 lg:px-[3%] lg:mb-8">
                <div class="liens_modal lg:w-1/3">
                    <!-- Sites web et compétences -->
                    <section class="sites_skills my-5 px-[8%] lg:px-[3%] lg:ml-10">
                        <div class="modify-cv flex items-center pt-2 lg:mb-5">
                            <h3 class="font-title text-[24px] font-bold uppercase lg:mb-3">Sites web
                            <i onclick="swapDivsById('links','links-update')" class="fa-solid fa-pen cursor-pointer text-main-red w-[20px] pl-3" <?= $notMyProfile; ?>></i></h3>
                        </div>
                        <div id="links">
                            <div class="sites flex items-center px-3 mt-2 mb-4 lg:mb-5">
                                <span class="w-6 h-6 border-[1px] bg-main-red rounded-full mr-2"></span>
                                <a href="<?= $userDatas->linkedin ?>"><?= $userDatas->linkedin ?></a>
                            </div>
                            <div class="sites flex items-center px-3 mt-2 mb-4 lg:mb-8">
                                <span class="w-6 h-6 border-[1px] bg-main-red rounded-full mr-2"></span>
                                <a href="<?= $userDatas->github ?>"><?= $userDatas->github ?></a>
                            </div>
                        </div>
                        <form id="links-update" class="hidden space-y-2">
                            <div class="space-x-4">
                                <input type="text" value="<?= $userDatas->linkedin ?>" placeholder="lien linkedin">
                                <button type="submit"><i class="fa-solid fa-check text-main-red"></i></button>
                                <i onclick="swapDivsById('cv','cv-update')" class="fa-solid fa-xmark text-main-red cursor-pointer"></i>
                            </div>
                            <div class="space-x-4">
                                <input type="text" value="<?= $userDatas->github ?>" placeholder="lien github">
                                <button type="submit"><i class="fa-solid fa-check text-main-red"></i></button>
                                <i onclick="swapDivsById('cv','cv-update')" class="fa-solid fa-xmark text-main-red cursor-pointer"></i>
                            </div>
                        </form>
                        <div class="modify-cv flex items-center pt-2  lg:mt-5">
                            <h3 class="font-title text-[24px] font-bold uppercase lg:mb-3">Compétences
                            <i onclick="swapDivsById('skills','skills-update')" class="fa-solid fa-pen cursor-pointer text-main-red w-[20px] pl-3" <?= $notMyProfile; ?>></i></h3>
                        </div>
                        <form id="skills-update" class="hidden">
                            <select multiple name="skills">
                                <option disabled selected>Sélectionner des compétences</option>
                                <?php foreach ($allTags as $eachTag){ ?>
                                    <option value="<?= $eachTag['tag_id']?>"><?= $eachTag['tag_name'] ?></option>
                                <?php } ?>
                            </select>
                            <button type="submit" class="py-2 px-4 bg-main-red border-main-white border text-main-white my-4 mr-4">Modifier <i class="fa-solid fa-check"></i></button>
                            <span onclick="swapDivsById('description','description-update')" class="cursor-pointer">Annuler <i class="fa-solid fa-xmark"></i></span>
                        </form>
                        <div id="skills" class="flex gap-4 justify-center sm:justify-normal mx-auto sm:px-4 mt-2 lg:mt-7 mb-4 flex-wrap">
                            <?php foreach ($userDatas->tags as $tag) { ?>
                                <a href="">
                                    <p class="bg-[#F2F2F3] px-4 py-1 border-main-gray border-2 text-[14px] lg:text-[16px] rounded-[50px] mb-2"><?= $tag->name ?></p>
                                </a>
                            <?php } ?>
                        </div>
                        <!-- Modifier ses infos persos -->
                        <div class="modify-infos flex items-center pt-2 lg:mt-10 lg:mb-10" <?= $notMyProfile; ?>>
                            <button data-modal-target="modify-data-modal" data-modal-toggle="modify-data-modal" class="bg-main-red text-main-white text-[16px] rounded-[5px] mx-auto py-3 px-2">Modifier mes informations personnelles</button>
                        </div>
                    </section>

                    <!-- Modal de modification des informations persos -->
                    <section id="modify-data-modal" data-modal-placement="center" tabindex="-1" aria-hidden="true" class="backdrop:brightness-50 fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto lg:inset-0 h-[calc(100%-1rem)] lg:h-full">
                        <div class="relative w-full h-fit max-w-lg lg:h-auto">
                            <div class="relative bg-main-white border-main-red border-2 rounded-lg text-main-red">
                                <button type="button" class="absolute top-3 right-2.5 text-main-red bg-transparent rounded-lg text-sm p-1.5 ml-auto inline-flex items-center hover: hover:border border-main-red" data-modal-hide="modify-data-modal">
                                    <svg data-modal-hide="modify-data-modal" aria-hidden="true" class="w-5 h-5 text-main-light" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                    <span class="sr-only">Close modal</span>
                                </button>
                                <!-- Partie MODIFICATION -->
                                <div id="co" class="px-6 py-6 lg:px-8">
                                    <h3 class="mb-4 text-medium uppercase w-fit mx-auto font-bold font-title text-main-red">Modifier mes informations personnelles</h3>
                                    <form class="space-y-6" action="" method="post">
                                        <div>
                                            <label for="email" class="block mb-1 text-sm font-medium  text-main-red">E-mail</label>
                                            <input type="email" name="email" id="email" class=" border text-sm rounded-lg block w-full p-1.5 border-main-red text-main-red" placeholder="<?= $userDatas->email ?>">
                                        </div>
                                        <div>
                                            <label for="phone" class="block mb-1 text-sm font-medium  text-main-red">Téléphone</label>
                                            <input type="phone" name="phone" id="phone" class=" border text-sm rounded-lg block w-full p-1.5 border-main-red text-main-red" placeholder="<?= $userDatas->phone ?>">
                                        </div>
                                        <div>
                                            <label for="adress" class="block mb-1 text-sm font-medium  text-main-red">Adresse</label>
                                            <input type="adress" name="adress" id="adress" class=" border text-sm rounded-lg block w-full p-1.5 border-main-red text-main-red" placeholder="<?= $userDatas->adress ?>">
                                        </div>
                                        <div>
                                            <label for="numero_pe" class="block mb-1 text-sm font-medium  text-main-red">Numéro Pôle Emploi</label>
                                            <input type="numero_pe" name="numero_pe" id="numero_pe" class=" border text-sm rounded-lg block w-full p-1.5 border-main-red text-main-red" placeholder="<?= $userDatas->numero_pe ?>">
                                        </div>
                                        <div>
                                            <label for="nationality" class="block mb-1 text-sm font-medium  text-main-red">Nationalité</label>
                                            <input type="nationality" name="nationality" id="nationality" class=" border text-sm rounded-lg block w-full p-1.5 border-main-red text-main-red" placeholder="<?= $userDatas->nationality ?>">
                                        </div>
                                        <div>
                                            <label for="new_password" class="block mb-1 text-sm font-medium text-main-red">Choisir un nouveau mot de passe</label>
                                            <input type="new_password" name="new_password" id="new_password" class=" border text-sm rounded-lg block w-full p-1.5 border-main-red text-main-red" placeholder="">
                                        </div>
                                        <div>
                                            <label for="password" class="block mb-1 text-sm font-medium  text-main-red">Veuillez confirmer vos modifications en entrant votre (ancien) mot de passe.</label>
                                            <input type="password" name="password" id="password" placeholder="*********" class=" border text-sm rounded-lg block w-full p-1.5 border-main-red text-main-red" required>
                                        </div>
                                        <button type="submit" class="w-full uppercase font-title text-main-white bg-main-red hover:bg-red-800 font-medium rounded-lg text-sm px-5 py-1.5 text-center ">Se connecter</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>

                <div class="tab_projets lg:flex lg:flex-col lg:w-2/3">
                    <!-- Section TAB : projets -->
                    <section>
                        <div class="flex w-full cursor-pointer items-center">
                            <div onclick="changeTab(0)" class="tabChange px-0 transition-all duration-[0.4s] bg-main-red w-1/2 text-center text-main-white font-title text-[16px] font-bold py-5">
                                <p>Mon projet phare</p>
                            </div>
                            <div onclick="changeTab(1)" class="tabChange px-0 transition-all duration-[0.4s] bg-main-gray w-1/2 text-center text-main-white font-title text-[16px] font-bold py-5">
                                <p>Mes projets perso</p>
                            </div>
                        </div>
                    </section>

                    <!-- Section : projet phare -->
                    <section class="sectionChange">
                        <iframe class="w-full min-h-[300px] lg:min-h-[500px]" src="<?= $userDatas->highlight ?>" title="iframe du projet phare"></iframe>
                        <!-- Boutons modifier/supprimer le projet -->
                        <div class="boutons lg:flex lg:flex-row lg:justify-between" <?= $notMyProfile; ?>>
                            <div id="main-project" class="flex justify-between mt-5 mx-5 mb-2">
                                <div data-modal-target="main-project-update" data-modal-toggle="main-project-update" class="flex items-center pt-2 lg:mr-10 cursor-pointer">
                                    <i class="fa-solid fa-pen fa-xl text-main-red "></i>
                                    <span class="hidden lg:block text-[15px] ml-3 text-main-red">Modifier</span>
                                </div>
                                <div onclick="deleteUserHighlight($userid)" class="flex items-center pt-2 cursor-pointer">
                                    <i class="fa-solid fa-trash-can fa-xl text-main-red "></i>
                                    <span class="hidden lg:block text-[15px] ml-3 text-main-red">Supprimer</span>
                                </div>
                            </div>
                            <!-- Bouton ajouter un projet perso -->
                            <div data-modal-target="main-project-update" data-modal-toggle="main-project-update" class="flex items-center justify-end mt-5 mb-2 cursor-pointer" <?= $notMyProfile; ?>>
                                <span class="w-[40px] h-[40px] border bg-main-red rounded-full mr-2 flex items-center justify-center"><i class="fa-solid fa-plus text-main-white text-[25px] font-bold"></i></span>
                                <p class="text-main-red italic text-[18px] font-semibold mr-4">Ajouter mon projet phare</p>
                            </div>
                        </div>
                    </section>
                    <!-- Fin de la section : projet phare -->

                    <!-- Section : mes projets persos -->
                    <section class="sectionChange hidden border">
                        <div class="projet-cards w-11/12 mt-2 gap-6 mx-auto flex flex-col justify-center lg:flex-row lg:flex-wrap">
                            <!-- card projet 1 -->
                            <article id="projet-card-1" class="project-card max-w-[400px] border-2 border-black rounded-lg p-4 2xl:flex gap-6 2xl:p-6">
                                <!-- partie info projet -->
                                <div class="flex-col text-[12px] flex">
                                    <!-- titre projet -->
                                    <h2 class="font-title text-main-red italic font-bold text-[30px] my-2 text-center"><a href="lien du projet">Mon super projet</a></h2>
                                    <div class=" flex w-full justify-between italic border-b border-main-red"><span>Débuté le 25/03/2002</span></div>
                                    <!-- contenu projet -->
                                    <div class="text-base flex-grow flex-col">
                                        <p class="pl-[20%] line-clamp-5 mt-4 mb-4 text-[14px] font-medium text-end">The best kept secret of The Bahamas is the country’s sheer size and diversity. With 16 major islands, The Bahamas is an unmatched destination The best kept secret of The Bahamas is the country’s sheer size and diversity. With 16 major islands, The Bahamas is an unmatched destination The best kept secret of The Bahamas is the country’s sheer size and diversity. With 16 major islands, The Bahamas is an unmatched destination The best kept secret of The Bahamas is the country’s sheer size and diversity. With 16 major islands, The Bahamas is an unmatched destination The best kept secret of The Bahamas is the country’s sheer size and diversity. With 16 major islands, The Bahamas is an unmatched destination</p>
                                        <div class="my-2 grow"><img class="w-2/3 flex mx-auto" src="assets/img/maquette.png" alt="image du projet"></div>
                                        <div id="end" class="mt-auto">
                                            <!-- tags projet -->
                                            <div class="uppercase space-x-4 my-4 [&>tag]:bg-main-gray [&>tag]:bg-opacity-10 [&>tag]:py-2 [&>tag]:px-4 [&>tag]:rounded-full flex justify-around">
                                                <tag> html</tag>
                                                <tag> css</tag>
                                                <tag> react</tag>
                                            </div>
                                        </div>
                                    </div>
                                    <a href="https://wikipedia.com" class="bg-main-red py-2 px-4 rounded-full text-main-white text-center text-[16px] mx-auto my-2 hover:bg-main-white hover:text-main-red hover:border border-main-red">Voir le projet </a>
                                    <!-- Boutons modifier/supprimer le projet -->
                                    <div class="flex justify-between" <?= $notMyProfile; ?>>
                                        <div class="flex items-center pt-2">
                                            <i class="fa-solid fa-pen fa-xl text-main-red "></i>
                                            <span class="hidden lg:block text-[10px] text-main-red">Modifier</span>
                                        </div>
                                        <div data-modal-target="confirm_delete_project" data-modal-toggle="confirm_delete_project" class="flex items-center pt-2 cursor-pointer">
                                            <i class="fa-solid fa-trash-can fa-xl text-main-red "></i>
                                            <span class="hidden lg:block text-[10px] text-main-red">Supprimer</span>
                                        </div>
                                    </div>
                                </div>
                            </article>
                            <!-- card projet 2 -->
                            <article id="projet-card-2" class="project-card max-w-[400px] border-2 border-black rounded-lg p-4 2xl:flex gap-6 2xl:p-6">
                                <!-- partie info projet -->
                                <div class="flex-col text-[12px] flex">
                                    <!-- titre projet -->
                                    <h2 class="font-title text-main-red italic font-bold text-[30px] my-2 text-center"><a href="lien du projet">Mon super projet</a></h2>
                                    <div class=" flex w-full justify-between italic border-b border-main-red"><span>Débuté le 25/03/2002</span></div>
                                    <!-- contenu projet -->
                                    <div class="text-base flex-grow flex-col">
                                        <p class="pl-[20%] line-clamp-5 mt-4 mb-4 text-[14px] font-medium text-end">The best kept secret of The Bahamas is the country’s sheer size and diversity. With 16 major islands, The Bahamas is an unmatched destination The best kept secret of The Bahamas is the country’s sheer size and diversity. With 16 major islands, The Bahamas is an unmatched destination The best kept secret of The Bahamas is the country’s sheer size and diversity. With 16 major islands, The Bahamas is an unmatched destination The best kept secret of The Bahamas is the country’s sheer size and diversity. With 16 major islands, The Bahamas is an unmatched destination The best kept secret of The Bahamas is the country’s sheer size and diversity. With 16 major islands, The Bahamas is an unmatched destination</p>
                                        <div class="my-2 grow"><img class="w-2/3 flex mx-auto" src="assets/img/maquette.png" alt="image du projet"></div>
                                        <div id="end" class="mt-auto">
                                            <!-- tags projet -->
                                            <div class="uppercase space-x-4 my-4 [&>tag]:bg-main-gray [&>tag]:bg-opacity-10 [&>tag]:py-2 [&>tag]:px-4 [&>tag]:rounded-full flex justify-around">
                                                <tag> html</tag>
                                                <tag> css</tag>
                                                <tag> react</tag>
                                            </div>
                                        </div>
                                    </div>
                                    <a href="https://wikipedia.com" class="bg-main-red py-2 px-4 rounded-full text-main-white text-center text-[16px] mx-auto my-2 hover:bg-main-white hover:text-main-red hover:border border-main-red">Voir le projet </a>
                                    <!-- Boutons modifier/supprimer le projet -->
                                    <div class="flex justify-between" <?= $notMyProfile; ?>>
                                        <div class="flex items-center pt-2">
                                            <i class="fa-solid fa-pen fa-xl text-main-red "></i>
                                            <span class="hidden lg:block text-[10px] text-main-red">Modifier</span>
                                        </div>
                                        <div class="flex items-center pt-2">
                                            <i class="fa-solid fa-trash-can fa-xl text-main-red "></i>
                                            <span class="hidden lg:block text-[10px] text-main-red">Supprimer</span>
                                        </div>
                                    </div>
                                </div>
                            </article>
                            <!-- card projet 3 -->
                            <article id="projet-card-3" class="project-card max-w-[400px] border-2 border-black rounded-lg p-4 2xl:flex gap-6 2xl:p-6">
                                <!-- partie info projet -->
                                <div class="flex-col text-[12px] flex">
                                    <!-- titre projet -->
                                    <h2 class="font-title text-main-red italic font-bold text-[30px] my-2 text-center"><a href="lien du projet">Mon super projet</a></h2>
                                    <div class=" flex w-full justify-between italic border-b border-main-red"><span>Débuté le 25/03/2002</span></div>
                                    <!-- contenu projet -->
                                    <div class="text-base flex-grow flex-col">
                                        <p class="pl-[20%] line-clamp-5 mt-4 mb-4 text-[14px] font-medium text-end">The best kept secret of The Bahamas is the country’s sheer size and diversity. With 16 major islands, The Bahamas is an unmatched destination The best kept secret of The Bahamas is the country’s sheer size and diversity. With 16 major islands, The Bahamas is an unmatched destination The best kept secret of The Bahamas is the country’s sheer size and diversity. With 16 major islands, The Bahamas is an unmatched destination The best kept secret of The Bahamas is the country’s sheer size and diversity. With 16 major islands, The Bahamas is an unmatched destination The best kept secret of The Bahamas is the country’s sheer size and diversity. With 16 major islands, The Bahamas is an unmatched destination</p>
                                        <div class="my-2 grow"><img class="w-2/3 flex mx-auto" src="assets/img/maquette.png" alt="image du projet"></div>
                                        <div id="end" class="mt-auto">
                                            <!-- tags projet -->
                                            <div class="uppercase space-x-4 my-4 [&>tag]:bg-main-gray [&>tag]:bg-opacity-10 [&>tag]:py-2 [&>tag]:px-4 [&>tag]:rounded-full flex justify-around">
                                                <tag> html</tag>
                                                <tag> css</tag>
                                                <tag> react</tag>
                                            </div>
                                        </div>
                                    </div>
                                    <a href="https://wikipedia.com" class="bg-main-red py-2 px-4 rounded-full text-main-white text-center text-[16px] mx-auto my-2 hover:bg-main-white hover:text-main-red hover:border border-main-red">Voir le projet </a>
                                    <!-- Boutons modifier/supprimer le projet -->
                                    <div class="flex justify-between" <?= $notMyProfile; ?>>
                                        <div class="flex items-center pt-2">
                                            <i class="fa-solid fa-pen fa-xl text-main-red "></i>
                                            <span class="hidden lg:block text-[10px] text-main-red">Modifier</span>
                                        </div>
                                        <div class="flex items-center pt-2">
                                            <i class="fa-solid fa-trash-can fa-xl text-main-red "></i>
                                            <span class="hidden lg:block text-[10px] text-main-red">Supprimer</span>
                                        </div>
                                    </div>
                                </div>
                            </article>
                        </div>
                        <!-- Bouton ajouter un projet perso -->
                        <div class="flex items-center justify-end mb-5 mt-2 mr-3">
                            <span class="w-[40px] h-[40px] border bg-main-red rounded-full mr-2 flex items-center justify-center"><i class="fa-solid fa-plus text-main-white text-[25px] font-bold"></i></span>
                            <p class="text-main-red italic text-[18px] font-semibold">Ajouter un projet perso</p>
                        </div>
                    </section>
                    <!-- Fin de la section : mes projets perso -->
                </div>
            </div>


            <!-- Modal modification de projet phare -->
            <section id="main-project-update" data-modal-placement="center" tabindex="-1" aria-hidden="true" class="backdrop:brightness-50 fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto lg:inset-0 h-[calc(100%-1rem)] lg:h-full">
                <div class="relative w-full h-fit max-w-lg lg:h-auto">
                    <div class="relative bg-main-white border-main-red border-2 rounded-lg text-main-red">
                        <button type="button" class="absolute top-3 right-2.5 text-main-red bg-transparent rounded-lg text-sm p-1.5 ml-auto inline-flex items-center hover: hover:border border-main-red" data-modal-hide="modify-data-modal">
                            <svg data-modal-hide="modify-data-modal" aria-hidden="true" class="w-5 h-5 text-main-light" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                        <!-- Partie MODIFICATION -->
                        <div id="co" class="px-6 py-6 lg:px-8">
                            <h3 class="mb-4 text-medium uppercase w-fit mx-auto font-bold font-title text-main-red">Modifier mon projet phare</h3>
                            <form class="space-y-6" action="" method="post">
                                <div>
                                    <label for="type" class="block mb-1 text-sm font-medium  text-main-red">Type de fichier</label>
                                    <select onchange="changeUserHighlight()" name="text" id="file_type" class="border text-sm rounded-lg block w-full p-1.5 border-main-red text-main-red">
                                        <option selected disabled>Type de fichier à mettre en avant</option>
                                        <option value="website">Mettre en avant un site</option>
                                        <option value="pdf">Mettre en avant un pdf</option>
                                        <option value="image">Mettre en avant une image</option>
                                    </select>
                                </div>
                                <div id="website_input" class="hidden">
                                    <label for="website" class="block mb-1 text-sm font-medium text-main-red">Lien du site à mettre en avant</label>
                                    <input type="text" name="website" id="website" class=" border text-sm rounded-lg block w-full p-1.5 border-main-red text-main-red">
                                </div>
                                <div id="pdf_input" class="hidden">
                                    <label for="pdf" class="block mb-1 text-sm font-medium text-main-red">PDF à mettre en avant</label>
                                    <input type="file" name="pdf" id="pdf" class=" border text-sm rounded-lg block w-full p-1.5 border-main-red text-main-red">
                                </div>
                                <div id="image_input" class="hidden">
                                    <label for="image" class="block mb-1 text-sm font-medium text-main-red">Image à mettre en avant</label>
                                    <input type="file" name="image" id="image" class=" border text-sm rounded-lg block w-full p-1.5 border-main-red text-main-red">
                                </div>
                                <button type="submit" class="w-full uppercase font-title text-main-white bg-main-red hover:bg-red-800 font-medium rounded-lg text-sm px-5 py-1.5 text-center ">Modifier</button>
                            </form>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Modal suppression de projet perso -->
            <section id="confirm_delete_project" data-modal-placement="center" tabindex="-1" aria-hidden="true" class="backdrop:brightness-50 fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto lg:inset-0 h-[calc(100%-1rem)] lg:h-full">
                <div class="relative w-full h-fit max-w-lg lg:h-auto">
                    <div class="relative bg-main-white border-main-red border-2 rounded-lg text-main-red">
                        <button type="button" class="absolute top-3 right-2.5 text-main-red bg-transparent rounded-lg text-sm p-1.5 ml-auto inline-flex items-center hover: hover:border border-main-red" data-modal-hide="modify-data-modal">
                            <svg data-modal-hide="modify-data-modal" aria-hidden="true" class="w-5 h-5 text-main-light" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                        <!-- Partie MODIFICATION -->
                        <div id="co" class="px-6 py-6 lg:px-8">
                            <h3 class="mb-4 text-medium uppercase w-fit mx-auto font-bold font-title text-main-red">Modifier mon projet phare</h3>
                                <p class="mb-2">Supprimer $nom du projet ?</p>
                                <button type="submit" class="w-full uppercase font-title text-main-white bg-main-red hover:bg-red-800 font-medium rounded-lg text-sm px-5 py-1.5 text-center ">Valider</button>
                            </form>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Section : Mes projets Simplon -->
            <section class="px-[8%] 2xl:px-[5%] bg-main-lightgray py-8">
                <h2 class="font-bold font-title text-main-red italic text-[30px] mb-4">Mes projets Simplon</h2>
                <div class="projets-simplon flex justify-center flex-wrap gap-6">

                    <?php foreach ($userProjects as $project){
                        var_dump($project)?>
                    <!-- card projet -->
                    <article id="projet-card-1" class="project-card max-w-[500px] border-2 bg-main-white border-black rounded-lg p-4 mb-8 2xl:flex gap-6 2xl:p-6">
                        <!-- partie entreprise desktop -->
                        <div class="hidden 2xl:block w-1/3 border-r-2 border-main-gray pr-6">
                            <div class="my-2 flex-col">
                                <div class="flex flex-wrap"><p class="font-title font-bold mr-2">Projet fourni par : </p><p><a href="<?= $project->company_link ?>" class="text-main-red underline font-bold text-sm"><?= $project->company_name ?></a></p></div>
                                <div class="my-4 grow"><img class="" src="assets/img/logo" alt="logo de l'entreprise"></div>
                                <div class="flex flex-wrap"><p class="font-title font-bold mr-2">Adresse :</p><p class="text-sm pt-0.5 text-left font-light">33 rue de la gare, 08000 Charleville-Mézières</p></div>
                            </div>
                        </div>
                        <!-- partie info projet -->
                        <div class="flex-col text-[12px] flex text-end 2xl:w-2/3">
                            <!-- tags projet -->
                            <div class="uppercase space-x-4 my-4 [&>tag]:bg-main-gray [&>tag]:bg-opacity-10 [&>tag]:py-2 [&>tag]:px-4 [&>tag]:rounded-full">
                                <tag> html</tag>
                                <tag> css</tag>
                                <tag> react</tag>
                            </div>
                            <!-- titre projet -->
                            <h2 class="font-title text-main-red italic font-bold text-3xl my-2"><a href="lien du projet"><?= $project->name ?></a></h2>
                            <div class="self-end flex w-3/4 justify-between italic border-b border-main-red"><span>Débuté le <?= $project->start ?></span><span>Fini le <?= $project->end ?></span></div>
                            <!-- contenu projet -->
                            <div class="text-base flex-grow flex-col">
                                <p class="pl-[20%] line-clamp-5 mt-2 mb-4"><?= $project->description ?></p>
                                <div id="end" class="mt-auto">
                                    <a href="page de la promo" class="bg-main-red py-2 px-4 rounded-full text-main-white my-2 hover:bg-main-white hover:text-main-red hover:border border-main-red"><?= $project->promo ?></a>
                                    <div class="space-x-4 mt-4 mb-2 text-sm text-main-white [&>a]:bg-main-gray [&>a]:py-1 [&>a]:px-3 [&>a]:rounded-full">
                                        <a href="profil de l'apprenant" class="hover:border border-main-gray hover:text-main-gray hover:bg-main-white">Nabil</a>
                                        <a href="profil de l'apprenant" class="hover:border border-main-gray hover:text-main-gray hover:bg-main-white">Alexandre</a>
                                        <a href="profil de l'apprenant" class="hover:border border-main-gray hover:text-main-gray hover:bg-main-white">Bryan</a>
                                    </div>
                                    <a href="lien du projet" class="block float-left text-xs">Voir le projet <i class="fa fa-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                        <!-- séparateur mobile-->
                        <div class="2xl:hidden w-4/5 mx-auto bg-main-gray bg-opacity-50 h-0.5 my-4"></div>
                        <!-- partie info entreprise mobile-->
                        <div class="2xl:hidden my-2">
                            <div class="flex flex-wrap"><p class="font-title font-bold mr-2">Projet fourni par : </p><p><a href="lien vers la société" class="text-main-red underline font-bold text-sm">Pole formation CCI Ardennes</a></p></div>
                            <div class="flex flex-wrap"><p class="font-title font-bold mr-2">Adresse :</p><p class="text-sm pt-0.5 text-left font-light">33 rue de la gare, 08000 Charleville-Mézières</p></div>
                        </div>
                    </article>
                    <?php } ?>
                </div>
            </section>

        </section>
        <!-- Fin de la section profil apprenant -->
    <?php } ?>
    </div>
</div>

<?php $content = ob_get_clean(); ?>

<?php ob_start(); ?>
<script src="assets/js/editor_setup.js"></script>
<script src="assets/js/tabs.js"></script>
<?php $script = ob_get_clean(); ?>

<?php require 'view/layout.php'; ?>