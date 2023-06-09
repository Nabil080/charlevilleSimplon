<?php
$title = "Espace personnel";
?>

<?php ob_start(); ?>
<!-- Section photo et description -->
<div class="background bg-main-white overflow-x-hidden min-h-[100vh]">

    <?php
    // Gestion page visite de profil ou page MON profil
    if(isset($_SESSION['user']) && $_SESSION['user']->role_id == 1){
        $notMyProfile = '';
    } elseif (!isset($isMyProfile) || $isMyProfile == false)
    {
        $notMyProfile = 'style="display:none"';
    } else {
        $notMyProfile = '';
    }

    // Gestion page profil prospect
    if ($userDatas->role_id == 5) { ?>

    <!-- PROFIL PROSPECT -->
    <section class="prospect_profil">
        <!-- Image de profil -->
        <div class="border-2 picture_desc grid grid-cols-1 lg:grid-cols-2 items-center py-[50px] px-[8%] 2xl:px-[5%]">
            <div class="picture max-h-screen lg:mr-5">
                <img class="w-full rounded-t-lg" src="<?= $userDatas->user_avatar ?>" alt="Image de profil">
                <button class="bg-main-red w-full text-main-white text-[16px] lg:text-[28px] py-3 rounded-b-lg"
                    <?= $notMyProfile; ?>>Changer ma photo de profil</button>
            </div>
            <div class="description lg:ml-5 h-[100%] flex flex-col">
                <h1
                    class="text-main-red font-title text-[28px] lg:text-[48px] font-semibold pt-5 text-center lg:text-left">
                    <span class="uppercase"><?= $userDatas->user_name ?></span> <?= $userDatas->user_surname ?>
                </h1>
                <div
                    class="text-desc rounded-[5px] border-[1px] border-main-border mt-2 grow lg:flex lg:flex-col lg:justify-between">
                    <p class="text-[20px] text-justify pt-4 px-3 pb-2 lg:pb-0">Candidature pour les formations :
                        <?php foreach($userPromo[0] as $promo){ echo "<a class='text-main-red underline' href='?action=formationPage&id=$promo->id'>$promo->name</a> <br>";} ?>
                    </p>

                    <div class="h-0 border-[2px] border-main-red w-1/2 mb-5"></div>
                    <ul class="text-justify px-3 pb-3 text-[16px] lg:text-[18px] leading-loose ml-8">
                        <li class="list-disc">Nom : <?= $userDatas->user_name ?></li>
                        <li class="list-disc">Prénom : <?= $userDatas->user_surname ?> </li>
                        <li class="list-disc">Adresse : <?= $userDatas->user_adress ?></li>
                        <li class="list-disc">Email : <?= $userDatas->user_email ?></li>
                        <li class="list-disc">Téléphone : <?= $userDatas->user_phone ?></li>
                        <li class="list-disc">Date de naissance : <?= $userDatas->user_birth_date ?></li>
                        <li class="list-disc">Lieu de naissance : <?= $userDatas->user_birth_place ?></li>
                        <li class="list-disc">Nationalité : <?= $userDatas->user_nationality ?></li>
                        <li class="list-disc">Numéro Pôle Emploi : <?= $userDatas->user_id_poleEmploi ?></li>
                    </ul>
                    <button data-modal-target="modify-prospect_data-modal"
                        data-modal-toggle="modify-prospect_data-modal"
                        class="bg-main-red w-full lg:w-3/5 text-main-white text-[18px] uppercase py-3 rounded-b-lg lg:rounded-none lg:mb-4 lg:flex lg:justify-center lg:mx-auto"
                        <?= $notMyProfile; ?>>Editer ma candidature</button>
                    <!-- Modal de modification des informations persos -->
                    <section id="modify-prospect_data-modal" data-modal-placement="center" tabindex="-1"
                        aria-hidden="true"
                        class="backdrop:brightness-50 fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto lg:inset-0 h-[calc(100%-1rem)] lg:h-full">
                        <div class="relative w-full h-fit max-w-lg lg:h-auto">
                            <div class="relative bg-main-white border-main-red border-2 rounded-lg text-main-red">
                                <button type="button"
                                    class="absolute top-3 right-2.5 text-main-red bg-transparent rounded-lg text-sm p-1.5 ml-auto inline-flex items-center hover: hover:border border-main-red"
                                    data-modal-hide="modify-prospect_data-modal">
                                    <svg data-modal-hide="modify-prospect_data-modal" aria-hidden="true"
                                        class="w-5 h-5 text-main-light" fill="currentColor" viewBox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                    <span class="sr-only">Close modal</span>
                                </button>
                                <!-- Partie MODIFICATION -->
                                <div id="co" class="px-6 py-6 lg:px-8">
                                    <h3
                                        class="mb-4 text-medium uppercase w-fit mx-auto font-bold font-title text-main-red">
                                        Modifier mes informations personnelles</h3>
                                    <form class="space-y-6 [&_input]:text-black"
                                        action="?action=updateUserElements&type=datas&id=<?=$userDatas->user_id?>"
                                        method="post">
                                        <div>
                                            <label for="email"
                                                class="block mb-1 text-sm font-medium  text-main-red">E-mail</label>
                                            <input type="email" name="email" id="email"
                                                class=" border text-sm rounded-lg block w-full p-1.5 border-main-red text-main-red"
                                                value="<?= $userDatas->user_email ?>">
                                        </div>
                                        <div>
                                            <label for="phone"
                                                class="block mb-1 text-sm font-medium  text-main-red">Téléphone</label>
                                            <input type="phone" name="phone" id="phone" pattern="[0][0-9]{9}"
                                                class=" border text-sm rounded-lg block w-full p-1.5 border-main-red text-main-red"
                                                value="<?= $userDatas->user_phone ?>">
                                        </div>
                                        <div>
                                            <label for="adress"
                                                class="block mb-1 text-sm font-medium  text-main-red">Adresse</label>
                                            <input type="text" name="adress" id="adress"
                                                class=" border text-sm rounded-lg block w-full p-1.5 border-main-red text-main-red"
                                                value="<?= $userDatas->user_adress ?>">
                                        </div>
                                        <div>
                                            <label for="numero_pe"
                                                class="block mb-1 text-sm font-medium  text-main-red">Numéro Pôle
                                                Emploi</label>
                                            <input type="text" name="numero_pe" id="numero_pe"
                                                class=" border text-sm rounded-lg block w-full p-1.5 border-main-red text-main-red"
                                                value="<?= $userDatas->user_id_poleEmploi ?>">
                                        </div>
                                        <div>
                                            <label for="nationality"
                                                class="block mb-1 text-sm font-medium  text-main-red">Nationalité</label>
                                            <input type="text" name="nationality" id="nationality"
                                                class=" border text-sm rounded-lg block w-full p-1.5 border-main-red text-main-red"
                                                value="<?= $userDatas->user_nationality ?>">
                                        </div>
                                        <div>
                                            <label for="new_password"
                                                class="block mb-1 text-sm font-medium text-main-red">Choisir un nouveau
                                                mot de passe* <span
                                                    class="text-main-gray italic">Optionnel</span></label>
                                            <input type="password" name="new_password" id="new_password"
                                                class=" border text-sm rounded-lg block w-full p-1.5 border-main-red text-main-red"
                                                placeholder="Nouveau mot de passe">
                                        </div>
                                        <div>
                                            <label for="confirm_new_password"
                                                class="block mb-1 text-sm font-medium text-main-red">Confirmez votre
                                                nouveau mot de passe</label>
                                            <input type="password" name="confirm_new_password" id="confirm_new_password"
                                                class=" border text-sm rounded-lg block w-full p-1.5 border-main-red text-main-red"
                                                placeholder="Répétez le nouveau mot de passe">
                                        </div>
                                        <div>
                                            <label for="password"
                                                class="block mb-1 text-sm font-medium  text-main-red">Veuillez confirmer
                                                vos modifications en entrant votre (ancien) mot de passe.</label>
                                            <input type="password" name="password" id="password"
                                                placeholder="Ancien mot de passe"
                                                class=" border text-sm rounded-lg block w-full p-1.5 border-main-red text-main-red"
                                                required>
                                        </div>
                                        <button type="submit"
                                            class="w-full uppercase font-title text-main-white bg-main-red hover:bg-red-800 font-medium rounded-lg text-sm px-5 py-1.5 text-center ">Modifier</button>
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

    <?php
    // Gestion page profil apprenant/formateur/admin
    if ($userDatas->role_id == 4 || $userDatas->role_id == 2 || $_SESSION['user']->role_id == 1) { ?>

    <!-- PROFIL APPRENANT -->
    <section class="apprenant_profil">
        <!-- Image de profil et description -->
        <div class="picture_description grid grid-cols-1 lg:grid-cols-2 items-center px-[8%] lg:px-[3%]">
            <!-- Image de profil -->
            <div class="border-2 picture max-h-screen mx-auto">
                <img class="max-w-full max-h-[600px] overflow-scroll rounded-t-lg" src="<?= $userDatas->user_avatar ?>"
                    alt="Image de profil">
                <div id="avatar" <?= $notMyProfile; ?>>
                    <div onclick="swapDivsById('avatar','avatar-update')">
                        <button type="submit"
                            class="bg-main-red w-full text-main-white text-[16px] lg:text-[28px] py-3 rounded-b-lg"
                            <?= $notMyProfile; ?>>Changer ma photo de profil</button>
                    </div>
                </div>
                <form id="avatar-update" method="POST"
                    action="?action=updateUserElements&type=avatar&id=<?=$userDatas->user_id?>"
                    class="hidden space-x-4 pt-2" enctype="multipart/form-data">
                    <input type="file" name="avatar">
                    <button type="submit"><i class="fa-solid fa-check text-main-red"></i></button>
                    <i onclick="swapDivsById('avatar','avatar-update')"
                        class="fa-solid fa-xmark text-main-red cursor-pointer"></i>
                    <p class="italic font-semibold text-center">Format portrait recommandé. Taille max: 4 Mo</p>
                </form>
            </div>

            <!-- Description -->
            <div class="description lg:ml-5 h-[100%] flex flex-col">
                <div class="edit_profil flex flex-col lg:justify-normal items-start pt-5">
                    <h1 id="title"
                        class="text-main-red font-title text-[28px] lg:text-[48px] font-semibold text-center pr-5"><span
                            class="uppercase"><?= $userDatas->user_name ?></span> <?= $userDatas->user_surname ?></h1>
                    <h2 class="font-title text-[14px] lg:text-[24px] font-semibold pr-5">
                        <?php if($userDatas->role_id == 4) { ?>
                        <a href="?action=promotionPage&id=<?= $userPromo[2][0]->id ?>"
                            class="font-title text-[10px] lg:text-[18px] my-5 bg-main-red py-2 px-4 rounded-full text-main-white hover:bg-main-white hover:text-main-red hover:border border-main-red"><?= $userPromo[2][0]->name ?></a>
                        <?php } ?>
                        <?php if ($userDatas->role_id == 2) { ?>
                        <p class="font-title text-[10px] lg:text-[18px] pb-4">Ce formateur est actuellement en charge
                            des promotions :</p>
                        <ul>
                            <?php foreach ($userPromo[2] as $promo) { ?>
                            <li class="font-title text-[10px] lg:text-[18px] mb-4">
                                <a href="?action=promotionPage&id=<?= $promo->id ?>"
                                    class="bg-main-red py-2 px-4 rounded-full text-main-white my-2 hover:bg-main-white hover:text-main-red hover:border border-main-red"><?= $promo->name ?></a>
                            </li>
                            <?php } ?>
                        </ul>
                        <?php } ?>
                    </h2>
                </div>
                <!-- Statut -->
                <div class="formation_status flex justify-center lg:justify-normal items-center px-3 mt-2">
                    <form id="user-status-update" method="POST"
                        action="?action=updateUserElements&type=status&id=<?=$userDatas->user_id?>"
                        class="hidden space-x-4">
                        <select name="user_status" class="border-main-red px-4 py-2">
                            <option selected disabled>Votre statut</option>
                            <?php foreach ($allStatus as $eachStatus){ ?>
                            <option value="<?= $eachStatus['status_id']?>"
                                <?php if($eachStatus['status_id'] == $userDatas->user_status_id){echo "selected";} ?>>
                                <?= $eachStatus['status_name'] ?>
                            </option>
                            <?php } ?>
                        </select>
                        <span>Depuis le :</span>
                        <input type="date" id="user_status_date" name="user_status_date"
                            value="<?=$userDatas->user_status_date?>" class="border-main-red px-4 py-2">
                        <button type="submit"><i class="fa-solid fa-check text-main-red"></i></button>
                        <i onclick="swapDivsById('user-status','user-status-update')"
                            class="fa-solid fa-xmark text-main-red cursor-pointer"></i>
                    </form>

                    <div id="user-status" class="flex items-center pt-1 pb-2">
                        <i class="fa-solid fa-circle 
                                <?php if (isset($userDatas->user_status_id) && $userDatas->user_status_id < 6) { 
                                    echo("text-red-500"); 
                                } 
                                else if (isset($userDatas->user_status_id) && $userDatas->user_status_id >= 6) {
                                    echo("text-green-500");
                                }?>
                                animate-pulse duration-[2s] mr-1"></i>
                        <span class="text-[16px] flex justify-center italic"><?= $userDatas->user_status ?> depuis
                            <?= "le ".formateDate($userDatas->user_status_date) ?></span>
                        <div onclick="swapDivsById('user-status','user-status-update')" class="cursor-pointer"
                            <?= $notMyProfile; ?>>
                            <i class="fa-solid fa-pen text-main-red w-[20px] ml-3"></i>
                            <span class="sm:inline-block text-[10px] lg:text-base text-main-red"> Modifier</span>
                        </div>
                    </div>
                </div>
                <!-- Texte de description -->
                <div
                    class="text_description rounded-[5px] border-[1px] border-main-border bg-main-lightgray mt-5 grow lg:flex lg:flex-col lg:justify-between">
                    <div id="description" class="lg:p-4 flex flex-col ">
                        <p class="text-[18px] text-justify pt-4 px-3 pb-2 lg:pb-0"><?php if(isset($userDatas->user_description) && !empty($userDatas->user_description)){ echo $userDatas->user_description;}else{
                                echo "Pas de description renseignée";
                            } ?></p>
                    </div>
                    <form method="POST" action="?action=updateUserElements&type=description&id=<?=$userDatas->user_id?>"
                        id="description-update" class="hidden h-full">
                        <textarea name="description" id="editor" class="text-editor h-full overflow-scroll">
                            <?= $userDatas->user_description ?>
                            </textarea>
                        <button type="submit"
                            class="py-2 px-4 bg-main-red border-main-white border text-main-white my-4 mr-4">Modifier <i
                                class="fa-solid fa-check"></i></button>
                        <span onclick="swapDivsById('description','description-update')" class="cursor-pointer">Annuler
                            <i class="fa-solid fa-xmark"></i></span>
                    </form>
                    <button onclick="swapDivsById('description','description-update')"
                        class="bg-main-red w-full text-main-white text-[14px] lg:text-[20px] lg:mt-2 py-2 rounded-b-lg"
                        <?= $notMyProfile; ?>>Editer ma description</button>
                </div>


                <div class="flex flex-col lg:flex-row justify-center my-3 lg:my-0 lg:mt-4">
                    <div id="cv" class="flex items-center justify-center lg:flex-row flex-col my-4 lg:my-0 lg:mx-auto">
                        <a href="<?=$userDatas->user_cv?>" download
                            class="bg-main-red text-main-white text-[16px] rounded-[5px] mx-auto py-3 lg:py-1 px-2 lg:px-4"
                            target="_blank">Voir le C.V.</a>
                        <div onclick="swapDivsById('cv','cv-update')"
                            class="modify-cv cursor-pointer flex items-center pt-2 pl-3" <?= $notMyProfile; ?>>
                            <i class="fa-solid fa-download text-main-red w-[20px]"></i>
                            <span class="text-[10px] text-main-red">Modifier mon C.V.</span>
                        </div>
                    </div>
                    <form id="cv-update" method="POST"
                        action="?action=updateUserElements&type=cv&id=<?=$userDatas->user_id?>" class="hidden space-x-4"
                        enctype="multipart/form-data">
                        <input type="file" name="cv">
                        <button type="submit"><i class="fa-solid fa-check text-main-red"></i></button>
                        <i onclick="swapDivsById('cv','cv-update')"
                            class="fa-solid fa-xmark text-main-red cursor-pointer"></i>
                    </form>
                    <a href="mailto:<?= $userDatas->user_email ?>"
                        class="flex items-center my-4 bg-main-red text-main-white text-[16px] rounded-[5px] mx-auto py-3 lg:py-1 px-2 lg:px-4">Contacter</a>
                </div>
            </div>
        </div>

        <div class="h-1 w-1/2 bg-main-red mx-auto my-8"></div>

        <div class="liens_modal_projets lg:flex lg:flex-row lg:mt-20 lg:px-[3%] lg:mb-8">
            <div class="liens_modal lg:w-1/3">
                <!-- Sites web et compétences -->
                <section class="sites_skills my-5 px-[8%] lg:px-[3%] lg:ml-10">
                    <div class="modify-cv flex items-center pt-2 lg:mb-5">
                        <h3 class="font-title text-[24px] font-bold uppercase lg:mb-3">Sites web
                            <i onclick="swapDivsById('links','links-update')"
                                class="fa-solid fa-pen cursor-pointer text-main-red w-[20px] pl-3"
                                <?= $notMyProfile; ?>></i>
                        </h3>
                    </div>
                    <form id="links-form" method="POST"
                        action="?action=updateUserElements&type=links&id=<?=$userDatas->user_id?>">
                        <div id="links">
                            <?php if(!isset($userDatas->user_linkedin) || !isset($userDatas->user_github) && empty($userDatas->user_linkedin && empty($userDatas->user_github))){ ?>
                            <p class="px-4">Pas de site web renseigné.</p>
                            <?php } ?>
                            <?php if(isset($userDatas->user_linkedin) && !empty($userDatas->user_linkedin)){ ?>
                            <div class="sites flex items-center px-3 mt-2 mb-4 lg:mb-5">
                                <span class="w-6 h-6 border-[1px] bg-main-red rounded-full mr-2"></span>
                                <a href="<?= $userDatas->user_linkedin ?>"><?= $userDatas->user_linkedin ?></a>
                                <p id="linkedin_error" class="errorAlert mt-2 text-sm text-red-600 dark:text-red-500">
                                </p>
                            </div>
                            <?php } ?>
                            <?php if(isset($userDatas->user_github) && !empty($userDatas->user_github)){ ?>
                            <div class="sites flex items-center px-3 mt-2 mb-4 lg:mb-8">
                                <span class="w-6 h-6 border-[1px] bg-main-red rounded-full mr-2"></span>
                                <a href="<?= $userDatas->user_github ?>"
                                    class="line-clamp-1"><?= $userDatas->user_github ?></a>
                                <p id="github_error" class="errorAlert mt-2 text-sm text-red-600 dark:text-red-500"></p>
                            </div>
                            <?php } ?>
                        </div>
                        <div id="links-update" class="hidden space-y-2">
                            <input name="user_linkedin" type="url" value="<?= $userDatas->user_linkedin ?>"
                                placeholder="lien linkedin" class="space-x-4">
                            <input name="user_github" type="url" value="<?= $userDatas->user_github ?>"
                                placeholder="lien github" class="space-x-4">
                            <div class="flex justify-center">
                                <button type="submit"
                                    class="py-2 px-4 bg-main-red border-main-white border text-main-white my-4 mr-4">Modifier
                                    <i class="fa-solid fa-check"></i></button>
                                <span onclick="swapDivsById('links','links-update')"
                                    class="cursor-pointer border my-4 mr-4 py-2 px-4">Annuler <i
                                        class="fa-solid fa-xmark"></i></span>
                            </div>
                        </div>
                    </form>

                    <div class="modify-skills flex items-center pt-2  lg:mt-5">
                        <h3 class="font-title text-[24px] font-bold uppercase lg:mb-3">Compétences
                            <i onclick="swapDivsById('skills','skills-update')"
                                class="fa-solid fa-pen cursor-pointer text-main-red w-[20px] pl-3"
                                <?= $notMyProfile; ?>></i>
                        </h3>
                    </div>
                    <form id="skills-update" method="POST"
                        action="?action=updateUserElements&type=skills&id=<?=$userDatas->user_id?>"
                        class="hidden flex flex-col">
                        <select multiple name="skills[]">
                            <option selected disabled>Sélectionner des compétences</option>
                            <?php foreach ($allTags as $eachTag){ ?>
                            <option value="<?= $eachTag['tag_id']?>"
                                <?php if(in_array($eachTag['tag_id'],$userTags)){echo "selected";}?>>
                                <?= $eachTag['tag_name'] ?></option>
                            <?php } ?>
                        </select>
                        <div class="flex justify-center">
                            <button type="submit"
                                class="py-2 px-4 bg-main-red border-main-white border text-main-white my-4 mr-4">Modifier
                                <i class="fa-solid fa-check"></i></button>
                            <span onclick="swapDivsById('skills','skills-update')"
                                class="cursor-pointer border my-4 mr-4 py-2 px-4">Annuler <i
                                    class="fa-solid fa-xmark"></i></span>
                        </div>
                    </form>
                    <div id="skills"
                        class="flex gap-4 justify-center sm:justify-normal mx-auto sm:px-4 mt-2 lg:mt-7 mb-4 flex-wrap">
                        <?php if(empty($userTags)){ ?>
                        <p>Pas de compétences renseignées</p>
                        <?php } ?>


                        <?php foreach ($userTags as $tag) { ?>
                        <p
                            class="bg-[#F2F2F3] px-4 py-1 border-main-gray border-2 text-[14px] lg:text-[16px] rounded-[50px] mb-2">
                            <?= $tag->name ?></p>
                        <?php } ?>
                    </div>
                    <!-- Modifier ses infos persos -->
                    <div class="modify-infos flex items-center pt-2 lg:mt-10 lg:mb-10" <?= $notMyProfile; ?>>
                        <button data-modal-target="modify-data-modal" data-modal-toggle="modify-data-modal"
                            class="bg-main-red text-main-white text-[16px] rounded-[5px] mx-auto py-3 px-2">Modifier mes
                            informations personnelles</button>
                    </div>
                </section>

                <!-- Modal de modification des informations persos -->
                <section id="modify-data-modal" data-modal-placement="center" tabindex="-1" aria-hidden="true"
                    class="backdrop:brightness-50 fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto lg:inset-0 h-[calc(100%-1rem)] lg:h-full">
                    <div class="relative w-full h-fit max-w-lg lg:h-auto">
                        <div class="relative bg-main-white border-main-red border-2 rounded-lg text-main-red">
                            <button type="button"
                                class="absolute top-3 right-2.5 text-main-red bg-transparent rounded-lg text-sm p-1.5 ml-auto inline-flex items-center hover: hover:border border-main-red"
                                data-modal-hide="modify-data-modal">
                                <svg data-modal-hide="modify-data-modal" aria-hidden="true"
                                    class="w-5 h-5 text-main-light" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                <span class="sr-only">Close modal</span>
                            </button>
                            <!-- Partie MODIFICATION -->
                            <div id="co" class="px-6 py-6 lg:px-8">
                                <h3 class="mb-4 text-medium uppercase w-fit mx-auto font-bold font-title text-main-red">
                                    Modifier mes informations personnelles</h3>
                                <form method="POST"
                                    action="?action=updateUserElements&type=datas&id=<?=$userDatas->user_id?>"
                                    class="space-y-6">
                                    <div>
                                        <label for="email"
                                            class="block mb-1 text-sm font-medium  text-main-red">E-mail</label>
                                        <input type="email" name="email" id="email"
                                            class=" border text-sm rounded-lg block w-full p-1.5 border-main-red text-main-red"
                                            placeholder="exemple@exemple.com" value="<?= $userDatas->user_email ?>">
                                    </div>
                                    <div>
                                        <label for="phone"
                                            class="block mb-1 text-sm font-medium  text-main-red">Téléphone</label>
                                        <input type="tel" name="phone" id="phone" pattern="[0][0-9]{9}"
                                            class=" border text-sm rounded-lg block w-full p-1.5 border-main-red text-main-red"
                                            placeholder="06 xx xx xx xx" value="<?= $userDatas->user_phone ?>">
                                    </div>
                                    <div>
                                        <label for="adress"
                                            class="block mb-1 text-sm font-medium  text-main-red">Adresse</label>
                                        <input type="text" name="adress" id="adress"
                                            class=" border text-sm rounded-lg block w-full p-1.5 border-main-red text-main-red"
                                            placeholder="Votre adresse" value="<?= $userDatas->user_adress ?>">
                                    </div>
                                    <div>
                                        <label for="numero_pe"
                                            class="block mb-1 text-sm font-medium  text-main-red">Numéro Pôle
                                            Emploi</label>
                                        <input type="text" name="numero_pe" id="numero_pe"
                                            class=" border text-sm rounded-lg block w-full p-1.5 border-main-red text-main-red"
                                            placeholder="Votre numéro pole emploi"
                                            value="<?= $userDatas->user_id_poleEmploi ?>">
                                    </div>
                                    <div>
                                        <label for="nationality"
                                            class="block mb-1 text-sm font-medium  text-main-red">Nationalité</label>
                                        <input type="text" name="nationality" id="nationality"
                                            class=" border text-sm rounded-lg block w-full p-1.5 border-main-red text-main-red"
                                            placeholder="Votre nationalité" value="<?= $userDatas->user_nationality ?>">
                                    </div>
                                    <div>
                                        <label for="new_password"
                                            class="block mb-1 text-sm font-medium text-main-red">Choisir un nouveau mot
                                            de passe* <span class="text-main-gray italic">Optionnel</span></label>
                                        <input type="password" name="new_password" id="new_password"
                                            class=" border text-sm rounded-lg block w-full p-1.5 border-main-red text-main-red"
                                            placeholder="Votre nouveau mot de passe">
                                    </div>
                                    <div>
                                        <label for="confirm_new_password"
                                            class="block mb-1 text-sm font-medium text-main-red">Confirmez votre nouveau
                                            mot de passe</label>
                                        <input type="password" name="confirm_new_password" id="confirm_new_password"
                                            class=" border text-sm rounded-lg block w-full p-1.5 border-main-red text-main-red"
                                            placeholder="Répétez le mot de passe">
                                    </div>
                                    <div>
                                        <label for="password"
                                            class="block mb-1 text-sm font-medium  text-main-red">Veuillez confirmer vos
                                            modifications en entrant votre (ancien) mot de passe.</label>
                                        <input type="password" name="password" id="password"
                                            placeholder="Votre ancien mot de passe"
                                            class=" border text-sm rounded-lg block w-full p-1.5 border-main-red text-main-red"
                                            required>
                                    </div>
                                    <button type="submit"
                                        class="w-full uppercase font-title text-main-white bg-main-red hover:bg-red-800 font-medium rounded-lg text-sm px-5 py-1.5 text-center ">Modifier
                                        mes informations</button>
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
                        <div onclick="changeTab(0)"
                            class="tabChange px-0 transition-all duration-[0.4s] !bg-main-red w-1/2 text-center text-main-white font-title text-[16px] font-bold py-5">
                            <p>Mon projet phare</p>
                        </div>
                        <div onclick="changeTab(1)"
                            class="tabChange px-0 transition-all duration-[0.4s] bg-main-gray w-1/2 text-center text-main-white font-title text-[16px] font-bold py-5">
                            <p>Mes projets perso</p>
                        </div>
                    </div>
                </section>

                <!-- SECTION PROJET PHARE -->
                <section class="sectionChange border h-[480px] lg:h-[580px]">
                    <div class="projet-phare">
                        <?php if (empty($userDatas->user_highlight)){?>
                        <div class="w-full h-full text-main-black font-title font-bold pt-6 pl-6">
                            <p>Cet utilisateur n'a pas encore de projet phare</p>
                        </div>
                        <?php }else{
                                $info = pathinfo($userDatas->user_highlight);
                                if (isset ($info['extension']) && $info["extension"] == "pdf") { ?>
                        <div
                            class="md:hidden flex flex-col items-center text-main-black font-title font-bold py-5 px-5">
                            <p class="mb-5">Vous ne pouvez pas afficher ce fichier pdf sur mobile, mais vous pouvez
                                toutefois le consulter en ouvrant la page suivante :</p>
                            <a href="<?= $userDatas->user_highlight?>"
                                class="bg-main-red text-main-white text-[16px] rounded-[5px] mx-auto py-3 lg:py-1 px-2 lg:px-4"
                                target="_blank">Voir le projet phare</a>
                        </div>
                        <iframe class="hidden md:block w-full min-h-[400px] lg:min-h-[500px]"
                            src="<?= $userDatas->user_highlight ?>" title="iframe du projet phare"></iframe>
                        <?php } else {?>
                        <iframe class="w-full min-h-[400px] lg:min-h-[500px]" src="<?= $userDatas->user_highlight ?>"
                            title="iframe du projet phare"></iframe>
                        <?php }}?>
                        <!-- Boutons modifier/supprimer le projet phare -->
                        <div class="boutons lg:flex lg:flex-row lg:justify-between" <?= $notMyProfile; ?>>
                            <?php if (!empty($userDatas->user_highlight)){?>
                            <div id="main-project" class="flex justify-between mt-5 mx-5 mb-2">
                                <div id="modif-modal-button" data-modal-target="main-project-update"
                                    data-modal-toggle="main-project-update"
                                    class="flex items-center pt-2 lg:mr-10 cursor-pointer">
                                    <i class="fa-solid fa-pen fa-xl text-main-red "></i>
                                    <span class="block text-[15px] ml-3 text-main-red">Modifier mon projet phare</span>
                                </div>
                                <!--
                                        <div onclick="deleteUserHighlight($userid)" class="flex items-center pt-2 cursor-pointer">
                                            <i class="fa-solid fa-trash-can fa-xl text-main-red "></i>
                                            <span class="hidden lg:block text-[15px] ml-3 text-main-red">Supprimer</span>
                                        </div>
                                        -->
                            </div>
                            <?php }?>
                            <!-- Bouton ajouter un projet phare -->
                            <?php
                                    if (empty($userDatas->user_highlight)){?>
                            <div data-modal-target="main-project-update" data-modal-toggle="main-project-update"
                                class="flex items-center mt-5 ml-6 mb-2 cursor-pointer" <?= $notMyProfile; ?>>
                                <span
                                    class="w-[40px] h-[40px] border bg-main-red rounded-full mr-2 flex items-center justify-center"><i
                                        class="fa-solid fa-plus text-main-white text-[25px] font-bold"></i></span>
                                <p class="text-main-red italic text-[18px] font-semibold mr-4">Ajouter mon projet phare
                                </p>
                            </div>
                            <?php }?>
                        </div>
                    </div>
                </section>

                <!-- Modal modification/ajout de projet phare -->
                <section id="main-project-update" data-modal-placement="center" tabindex="-1" aria-hidden="true"
                    class="backdrop:brightness-50 fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto lg:inset-0 h-[calc(100%-1rem)] lg:h-full">
                    <div class="relative w-full h-fit max-w-lg lg:h-auto">
                        <div class="relative bg-main-white border-main-red border-2 rounded-lg text-main-red">
                            <button type="button"
                                class="absolute top-3 right-2.5 text-main-red bg-transparent rounded-lg text-sm p-1.5 ml-auto inline-flex items-center hover: hover:border border-main-red"
                                data-modal-hide="modify-data-modal">
                                <svg data-modal-hide="main-project-update" aria-hidden="true"
                                    class="w-5 h-5 text-main-light" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                <span class="sr-only">Close modal</span>
                            </button>
                            <!-- Partie MODIFICATION -->
                            <div id="co" class="px-6 py-6 lg:px-8">
                                <h3 class="mb-4 text-medium uppercase w-fit mx-auto font-bold font-title text-main-red">
                                    Modifier mon projet phare</h3>
                                <form id="highlight_form" class="space-y-6"
                                    action="?action=updateUserElements&type=highlight&id=<?=$userDatas->user_id?>"
                                    method="post" enctype="multipart/form-data">
                                    <div>
                                        <input id="modifyInput" type="hidden" name="modifyInput" value="add" />
                                        <label for="type" class="block mb-1 text-sm font-medium  text-main-red">Type de
                                            fichier</label>
                                        <select name="text" id="file_type"
                                            class="border text-sm rounded-lg block w-full p-1.5 border-main-red text-main-red">
                                            <option selected disabled>Type de fichier à mettre en avant</option>
                                            <option value="website">Mettre en avant un site</option>
                                            <option value="pdf">Mettre en avant un pdf</option>
                                            <option value="image">Mettre en avant une image</option>
                                        </select>
                                    </div>
                                    <div id="website_input" class="hidden">
                                        <label for="website" class="block mb-1 text-sm font-medium text-main-red">Lien
                                            du site à mettre en avant</label>
                                        <input type="url" name="website" id="website"
                                            class=" border text-sm rounded-lg block w-full p-1.5 border-main-red text-main-red">
                                    </div>
                                    <div id="pdf_input" class="hidden">
                                        <label for="pdf" class="block mb-1 text-sm font-medium text-main-red">PDF à
                                            mettre en avant</label>
                                        <input type="file" name="pdf" id="pdf"
                                            class=" border text-sm rounded-lg block w-full p-1.5 border-main-red text-main-red">
                                    </div>
                                    <div id="image_input" class="hidden">
                                        <label for="image" class="block mb-1 text-sm font-medium text-main-red">Image à
                                            mettre en avant</label>
                                        <input type="file" name="image" id="image"
                                            class=" border text-sm rounded-lg block w-full p-1.5 border-main-red text-main-red">
                                    </div>
                                    <button id="highlight-button" type="submit"
                                        class="w-full uppercase font-title text-main-white bg-main-red hover:bg-red-800 font-medium rounded-lg text-sm px-5 py-1.5 text-center disabled-button ">Modifier</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- Fin de la section : projet phare -->

                <!-- SECTION PROJETS PERSO -->
                <section class="sectionChange hidden border h-[480px] lg:h-[580px] overflow-y-scroll">
                    <div id="delete-my-project"
                        class="projet-cards mt-6 gap-6 mx-6 flex flex-col items-center justify-center lg:flex-row lg:flex-wrap">
                        <!-- card projet -->
                        <?php foreach ($userProjects as $project){
                                if($project->type->id == 2) {
                                    $userPersonnalProjects = [];
                                    array_push($userPersonnalProjects, $project);?>
                        <article id="project-card<?= $project->id ?>"
                            class="project-card w-[300px] lg:w-[400px] h-[700px] transition-opacity ease-linear duration-1000 border-2 border-black rounded-lg p-4 2xl:flex gap-6 2xl:p-6">
                            <!-- partie info projet -->
                            <div class="flex-col text-[12px] flex w-full">
                                <!-- titre projet -->
                                <h2 class="font-title text-main-red italic font-bold text-[30px] my-2 text-center"><a
                                        href="lien du projet"><?= $project->name ?></a></h2>
                                <div class=" flex w-full justify-between italic border-b border-main-red"><span>Publié
                                        le <?= $project->start ?></span></div>
                                <!-- contenu projet -->
                                <div class="text-base flex-grow flex-col">
                                    <p
                                        class="pl-[20%] line-clamp-5 mt-4 mb-4 text-[14px] font-medium text-end overflow-y-scroll">
                                        <?= $project->description ?></p>
                                    <br>
                                    <div class="my-2 grow h-[200px] overflow-y-scroll"><img class="w-full flex mx-auto"
                                            src="<?= $project->model_image ?>" alt="image du projet"></div>
                                    <div id="end" class="mt-auto">
                                        <!-- tags projet -->
                                        <div
                                            class="uppercase space-x-4 my-4 [&>tag]:bg-main-gray [&>tag]:bg-opacity-10 [&>tag]:py-2 [&>tag]:px-4 [&>tag]:rounded-full flex justify-around">
                                            <?php for ($i = 0; $i < count($project->tags); $i++) { ?>
                                            <tag><?= $project->tags[$i]->name ?></tag>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                                <a href="<?= $project->model_link ?>"
                                    class="bg-main-red py-2 px-4 rounded-full text-main-white text-center text-[16px] mx-auto my-2 hover:bg-main-white hover:text-main-red hover:border border-main-red"
                                    target="_blank">Voir le projet </a>
                                <!-- Boutons modifier/supprimer le projet -->
                                <div class="flex justify-between " <?= $notMyProfile; ?>>
                                    <div data-modal-target="modify_my_project<?= $project->id ?>"
                                        data-modal-toggle="modify_my_project<?= $project->id ?>"
                                        class="flex items-center pt-2 cursor-pointer">
                                        <i class="fa-solid fa-pen fa-xl text-main-red "></i>
                                        <span class="hidden lg:block text-[10px] text-main-red">Modifier</span>
                                    </div>
                                    <div data-modal-target="confirm_delete_project<?= $project->id ?>"
                                        data-modal-toggle="confirm_delete_project<?= $project->id ?>"
                                        class="flex items-center pt-2 cursor-pointer">
                                        <i class="fa-solid fa-trash-can fa-xl text-main-red "></i>
                                        <span class="hidden lg:block text-[10px] text-main-red">Supprimer</span>
                                    </div>
                                </div>
                            </div>
                        </article>

                        <!-- Modal modifier projet perso -->
                        <section id="modify_my_project<?= $project->id ?>" data-modal-placement="center" tabindex="-1"
                            aria-hidden="true"
                            class="backdrop:brightness-50 fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto lg:inset-0 h-[calc(100%-1rem)] lg:h-full">
                            <div class="relative w-full h-fit max-w-lg lg:h-auto">
                                <div class="relative bg-main-white border-main-red border-2 rounded-lg text-main-red">
                                    <button type="button"
                                        class="absolute top-3 right-2.5 text-main-red bg-transparent rounded-lg text-sm p-1.5 ml-auto inline-flex items-center hover: hover:border border-main-red"
                                        data-modal-hide="modify_my_project<?= $project->id ?>">
                                        <svg data-modal-hide="modify_my_project<?= $project->id ?>" aria-hidden="true"
                                            class="w-5 h-5 text-main-light" fill="currentColor" viewBox="0 0 20 20"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                        <span class="sr-only">Close modal</span>
                                    </button>
                                    <div id="co" class="px-6 py-6 lg:px-8">
                                        <h3
                                            class="mb-4 text-medium uppercase w-fit mx-auto font-bold font-title text-main-red">
                                            Modifier mon projet perso</h3>
                                        <form method="POST"
                                            action="?action=updateUserElements&type=modifyMyProject&id=<?=$userDatas->user_id?>&projectID=<?= $project->id ?>"
                                            class="space-y-6" enctype="multipart/form-data">
                                            <div>
                                                <label for="modif_title"
                                                    class="block mb-1 text-sm font-medium text-main-red">Titre de votre
                                                    projet</label>
                                                <input type="text" name="title" id="modif_title"
                                                    class=" border text-sm rounded-lg block w-full p-1.5 border-main-red text-main-red"
                                                    placeholder="Titre de mon projet" value="<?= $project->name ?>">
                                            </div>
                                            <div>
                                                <label for="modif_description"
                                                    class="block mb-1 text-sm font-medium text-main-red">Description de
                                                    votre projet</label>
                                                <textarea name="description" id="modif_description" rows="6" cols="50"
                                                    class="border text-sm rounded-lg block w-full p-1.5 border-main-red text-main-red"
                                                    placeholder=""><?= $project->description ?></textarea>
                                            </div>
                                            <div>
                                                <label for="modif_image"
                                                    class="block mb-1 text-sm font-medium text-main-red">Ajouter une
                                                    image à votre projet perso</label>
                                                <input type="file" name="image" id="modif_image"
                                                    class=" border text-sm rounded-lg block w-full p-1.5 border-main-red text-main-red"
                                                    placeholder="" value="<?= $project->model_image ?>">
                                            </div>
                                            <div>
                                                <label for="modif_tags"
                                                    class="block mb-1 text-sm font-medium  text-main-red">Sélectionner
                                                    les technos utilisées</label>
                                                <select multiple name="skills[]" id="modif_tags">
                                                    <option disabled selected>Sélectionner des compétences</option>
                                                    <?php foreach ($allTags as $eachTag){ ?>
                                                    <option value="<?= $eachTag['tag_id']?>"><?= $eachTag['tag_name'] ?>
                                                    </option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                            <div>
                                                <label for="modif_url"
                                                    class="block mb-1 text-sm font-medium  text-main-red">Ajouter un
                                                    lien direct vers le projet</label>
                                                <input type="url" name="url" id="modif_url"
                                                    class=" border text-sm rounded-lg block w-full p-1.5 border-main-red text-main-red"
                                                    placeholder="http://..." value="<?= $project->model_link ?>">
                                            </div>
                                            <button type="submit"
                                                class="w-full uppercase font-title text-main-white bg-main-red hover:bg-red-800 font-medium rounded-lg text-sm px-5 py-1.5 text-center ">Valider
                                                les modifications</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </section>

                        <!-- Modal suppression de projet perso -->
                        <section id="confirm_delete_project<?= $project->id ?>" data-modal-placement="center"
                            tabindex="-1" aria-hidden="true"
                            class="backdrop:brightness-50 fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto lg:inset-0 h-[calc(100%-1rem)] lg:h-full">
                            <div class="relative w-full h-fit max-w-lg lg:h-auto">
                                <div class="relative bg-main-white border-main-red border-2 rounded-lg text-main-red">
                                    <button type="button"
                                        class="absolute top-3 right-2.5 text-main-red bg-transparent rounded-lg text-sm p-1.5 ml-auto inline-flex items-center hover: hover:border border-main-red"
                                        data-modal-hide="confirm_delete_project<?= $project->id ?>">
                                        <svg data-modal-hide="confirm_delete_project<?= $project->id ?>"
                                            aria-hidden="true" class="w-5 h-5 text-main-light" fill="currentColor"
                                            viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                        <span class="sr-only">Close modal</span>
                                    </button>
                                    <form class="delete-form px-6 py-6 lg:px-8">
                                        <input type="hidden" name="project_id" value="<?= $project->id?>">
                                        <h3
                                            class="mb-4 text-medium uppercase w-fit mx-auto font-bold font-title text-main-red">
                                            Supprimer mon projet perso</h3>
                                        <p class="mb-2">Supprimer définitivement le projet : <?= $project->name ?> ?</p>
                                        <button type="submit"
                                            data-modal-hide="confirm_delete_project<?= $project->id ?>"
                                            class="w-full uppercase font-title text-main-white bg-main-red hover:bg-red-800 font-medium rounded-lg text-sm px-5 py-1.5 text-center ">Valider</button>
                                    </form>
                                </div>
                            </div>
                        </section>
                        <?php }}
                                    if (empty($userPersonnalProjects)) {?>
                        <div class="w-full h-full text-main-black font-title font-bold ">
                            <p>Cet utilisateur n'a pas encore publié de projet personnel</p>
                        </div>
                        <?php } ?>
                    </div>
                    <!-- Bouton ajouter un projet perso -->
                    <div data-modal-target="my-project-add" data-modal-toggle="my-project-add"
                        class="flex items-center justify-end mb-5 mt-2 mr-3 cursor-pointer" <?= $notMyProfile; ?>>
                        <span
                            class="w-[40px] h-[40px] border bg-main-red rounded-full mr-2 flex items-center justify-center"><i
                                class="fa-solid fa-plus text-main-white text-[25px] font-bold"></i></span>
                        <p class="text-main-red italic text-[18px] font-semibold">Ajouter un projet perso</p>
                    </div>
                </section>

                <!-- Modal ajout de projet perso -->
                <section id="my-project-add" data-modal-placement="center" tabindex="-1" aria-hidden="true"
                    class="backdrop:brightness-50 fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto lg:inset-0 h-[calc(100%-1rem)] lg:h-full">
                    <div class="relative w-full h-fit max-w-lg lg:h-auto">
                        <div class="relative bg-main-white border-main-red border-2 rounded-lg text-main-red">
                            <button type="button"
                                class="absolute top-3 right-2.5 text-main-red bg-transparent rounded-lg text-sm p-1.5 ml-auto inline-flex items-center hover: hover:border border-main-red"
                                data-modal-hide="modify-data-modal">
                                <svg data-modal-hide="my-project-add" aria-hidden="true" class="w-5 h-5 text-main-light"
                                    fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                <span class="sr-only">Close modal</span>
                            </button>
                            <!-- Formulaire d'ajout -->
                            <div id="co" class="px-6 py-6 lg:px-8">
                                <h3 class="mb-4 text-medium uppercase w-fit mx-auto font-bold font-title text-main-red">
                                    Ajouter un projet perso</h3>
                                <form method="POST"
                                    action="?action=updateUserElements&type=addMyProject&id=<?=$userDatas->user_id?>"
                                    class="space-y-6" enctype="multipart/form-data">
                                    <div>
                                        <label for="add_title"
                                            class="block mb-1 text-sm font-medium text-main-red">Titre de votre
                                            projet</label>
                                        <input type="text" name="title" id="add_title"
                                            class=" border text-sm rounded-lg block w-full p-1.5 border-main-red text-main-red"
                                            placeholder="Titre de mon projet" required>
                                    </div>
                                    <div>
                                        <label for="add_description"
                                            class="block mb-1 text-sm font-medium text-main-red">Description de votre
                                            projet</label>
                                        <textarea name="description" id="add_description" rows="6" cols="50"
                                            class="border text-sm rounded-lg block w-full p-1.5 border-main-red text-main-red"
                                            placeholder="" required></textarea>
                                    </div>
                                    <div>
                                        <label for="add_image"
                                            class="block mb-1 text-sm font-medium text-main-red">Ajouter une image à
                                            votre projet perso</label>
                                        <input type="file" name="image" id="add_image"
                                            class=" border text-sm rounded-lg block w-full p-1.5 border-main-red text-main-red"
                                            placeholder="" required>
                                    </div>
                                    <div>
                                        <label for="add_tags"
                                            class="block mb-1 text-sm font-medium  text-main-red">Sélectionner les
                                            technos utilisées</label>
                                        <select multiple name="skills[]">
                                            <option disabled selected>Sélectionner des compétences</option>
                                            <?php foreach ($allTags as $eachTag){ ?>
                                            <option value="<?= $eachTag['tag_id']?>"><?= $eachTag['tag_name'] ?>
                                            </option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div>
                                        <label for="add_url"
                                            class="block mb-1 text-sm font-medium  text-main-red">Ajouter un lien direct
                                            vers le projet</label>
                                        <input type="url" name="url" id="add_url"
                                            class=" border text-sm rounded-lg block w-full p-1.5 border-main-red text-main-red"
                                            placeholder="http://...">
                                    </div>
                                    <button type="submit"
                                        class="w-full uppercase font-title text-main-white bg-main-red hover:bg-red-800 font-medium rounded-lg text-sm px-5 py-1.5 text-center ">Ajouter
                                        ce projet aux projets persos</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- Fin de la section : mes projets perso -->
            </div>
        </div>

        <!-- Section : Mes projets Simplon -->
        <section class="px-[8%] 2xl:px-[5%] bg-main-lightgray py-8">
            <h2 class="font-bold font-title text-main-red italic text-[30px] mb-4">Mes projets Simplon</h2>
            <div class="projets-simplon flex justify-center flex-wrap gap-6">

                <?php if(empty($userProjects)){?>
                <p>Aucun projet simplon pour l'instant :(</p>
                <?php } ?>

                <?php foreach ($userProjects as $project){
                        if($project->type->id == 1) { ?>
                <!-- card projet -->
                <article id="projet-card-1"
                    class="project-card max-w-[500px] border-2 bg-main-white border-black rounded-lg p-4 mb-8 2xl:flex gap-6 2xl:p-6">
                    <!-- partie entreprise desktop -->
                    <div class="hidden 2xl:block w-1/3 border-r-2 border-main-gray pr-6">
                        <div class="my-2 flex-col">
                            <div class="flex flex-wrap">
                                <p class="font-title font-bold mr-2">Projet fourni par : </p>
                                <p><a href="<?= $project->company_link ?>"
                                        class="text-main-red underline font-bold text-sm"
                                        target="_blank"><?= $project->company_name ?></a></p>
                            </div>
                            <div class="my-4 grow"><img class="" src="<?= $project->company_image ?>"
                                    alt="logo de l'entreprise"></div>
                            <div class="flex flex-wrap">
                                <p class="font-title font-bold mr-2">Adresse :</p>
                                <p class="text-sm pt-0.5 text-left font-light"><?= $project->company_adress ?></p>
                            </div>
                        </div>
                    </div>
                    <!-- partie info projet -->
                    <div class="flex-col text-[12px] flex text-end 2xl:w-2/3">
                        <!-- tags projet -->
                        <div
                            class="uppercase space-x-4 my-4 [&>tag]:bg-main-gray [&>tag]:bg-opacity-10 [&>tag]:py-2 [&>tag]:px-4 [&>tag]:rounded-full">
                            <?php for ($i = 0; $i < count($project->tags); $i++) { ?>
                            <tag><?= $project->tags[$i]->name ?></tag>
                            <?php } ?>
                        </div>
                        <!-- titre projet -->
                        <h2 class="font-title text-main-red italic font-bold text-3xl my-2"><a
                                href="index.php?action=projectPage&id=<?= $project->id ?>"><?= $project->name ?></a>
                        </h2>
                        <div class="self-end flex w-3/4 justify-between italic border-b border-main-red"><span>Débuté le
                                <?= $project->start ?></span><span>Fini le <?= $project->end ?></span></div>
                        <!-- contenu projet -->
                        <div class="text-base flex-grow flex-col">
                            <p class="pl-[20%] line-clamp-5 mt-2 mb-4"><?= $project->description ?></p>
                            <div id="end" class="mt-auto">
                                <a href="index.php?action=promotionPage&id=<?= $project->promo->id ?>"
                                    class="bg-main-red py-2 px-4 rounded-full text-main-white my-2 hover:bg-main-white hover:text-main-red hover:border border-main-red"><?= $project->promo->name ?></a>
                                <div
                                    class="space-x-4 mt-4 mb-2 text-sm text-main-white [&>a]:bg-main-gray [&>a]:py-1 [&>a]:px-3 [&>a]:rounded-full">
                                    <?php for ($i = 0; $i < count($project->team); $i++) { ?>
                                    <a href="index.php?action=profilePage&id=<?= $project->team[$i]->user_id ?>"
                                        class="hover:border border-main-gray hover:text-main-gray hover:bg-main-white"><?= $project->team[$i]->user_surname ?>
                                        <?= $project->team[$i]->user_name ?></a>
                                    <?php } ?>
                                </div>
                                <a href="index.php?action=projectPage&id=<?= $project->id ?>"
                                    class="block float-left text-xs">Voir le projet <i
                                        class="fa fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <!-- séparateur mobile-->
                    <div class="2xl:hidden w-4/5 mx-auto bg-main-gray bg-opacity-50 h-0.5 my-4"></div>
                    <!-- partie info entreprise mobile-->
                    <div class="2xl:hidden my-2">
                        <div class="flex flex-wrap">
                            <p class="font-title font-bold mr-2">Projet fourni par : </p>
                            <p><a href="<?= $project->company_link ?>" class="text-main-red underline font-bold text-sm"
                                    target="_blank"><?= $project->company_name ?></a></p>
                        </div>
                        <div class="flex flex-wrap">
                            <p class="font-title font-bold mr-2">Adresse :</p>
                            <p class="text-sm pt-0.5 text-left font-light"><?= $project->company_adress ?></p>
                        </div>
                    </div>
                </article>
                <?php }} ?>
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
<script src="assets/js/profile.js"></script>
<?php $script = ob_get_clean(); ?>

<?php require 'view/layout.php'; ?>