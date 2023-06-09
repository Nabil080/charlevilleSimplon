<?php
$title = "Espace personnel";
?>
<?php ob_start() ?>

<main class="prospect_profil">
    <!-- Image de profil -->
    <div class="border-2 picture_desc grid grid-cols-1 lg:grid-cols-2 items-center py-[50px] px-[8%] 2xl:px-[5%]">
        <div class="picture max-h-screen lg:mr-5">
            <img class="w-full rounded-t-lg" src="<?= $userDatas->user_avatar ?>" alt="Image de profil">
            <div id="avatar">
                <?php if ($edit_profil == true) { ?>
                <div onclick="swapDivsById('avatar','avatar-update')">
                    <button type="submit"
                        class="bg-main-red w-full text-main-white text-[16px] lg:text-[28px] py-3 rounded-b-lg">Changer
                        ma photo de profil</button>
                </div>
                <?php } ?>
            </div>
            <?php if ($edit_profil == true) { ?>
            <form id="avatar-update" class="hidden space-x-4 pt-2" enctype="multipart/form-data">
                <input type="file" name="avatar">
                <button type="submit"><i class="fa-solid fa-check text-main-red"></i></button>
                <i onclick="swapDivsById('avatar','avatar-update')"
                    class="fa-solid fa-xmark text-main-red cursor-pointer"></i>
                <p class="italic font-semibold text-center">Format portrait recommandé. Taille max: 4 Mo</p>
            </form>
            <?php } ?>
        </div>
        <div class="description lg:ml-5 h-[100%] flex flex-col">
            <h1 class="text-main-red font-title text-[28px] lg:text-[48px] font-semibold pt-5 text-center lg:text-left">
                <span class="uppercase">
                    <?= $userDatas->user_name ?>
                </span>
                <?= $userDatas->user_surname ?>
            </h1>
            <div
                class="text-desc rounded-[5px] border-[1px] border-main-border mt-2 grow lg:flex lg:flex-col lg:justify-between">
                <p class="text-[20px] text-justify pt-4 px-3 pb-2 lg:pb-0">Candidature pour les formations :
                    <?php foreach ($userPromo[0] as $promo) {
                        echo "<a class='text-main-red underline' href='?action=formationPage&id=$promo->id'>$promo->name</a> <br>";
                    } ?>
                </p>

                <div class="h-0 border-[2px] border-main-red w-1/2 mb-5"></div>
                <ul class="text-justify px-3 pb-3 text-[16px] lg:text-[18px] leading-loose ml-8">
                    <li class="list-disc">Nom :
                        <?= $userDatas->user_name ?>
                    </li>
                    <li class="list-disc">Prénom :
                        <?= $userDatas->user_surname ?>
                    </li>
                    <li class="list-disc">Adresse :
                        <?= $userDatas->user_adress ?>
                    </li>
                    <li class="list-disc">Email :
                        <?= $userDatas->user_email ?>
                    </li>
                    <li class="list-disc">Téléphone :
                        <?= $userDatas->user_phone ?>
                    </li>
                    <li class="list-disc">Date de naissance :
                        <?= $userDatas->user_birth_date ?>
                    </li>
                    <li class="list-disc">Lieu de naissance :
                        <?= $userDatas->user_birth_place ?>
                    </li>
                    <li class="list-disc">Nationalité :
                        <?= $userDatas->user_nationality ?>
                    </li>
                    <li class="list-disc">Numéro Pôle Emploi :
                        <?= $userDatas->user_id_poleEmploi ?>
                    </li>
                </ul>
                <?php if ($edit_profil == true) { ?>

                <button data-modal-target="modify-prospect_data-modal" data-modal-toggle="modify-prospect_data-modal"
                    class="bg-main-red w-full lg:w-3/5 text-main-white text-[18px] uppercase py-3 rounded-b-lg lg:rounded-none lg:mb-4 lg:flex lg:justify-center lg:mx-auto">Editer
                    ma candidature</button>
                <?php } ?>

                <!-- Modal de modification des informations persos -->
                <?php if ($edit_profil == true) { ?>
                <section id="modify-prospect_data-modal" data-modal-placement="center" tabindex="-1" aria-hidden="true"
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
                                <h3 class="mb-4 text-medium uppercase w-fit mx-auto font-bold font-title text-main-red">
                                    Modifier mes informations personnelles</h3>
                                <form id="user-form" class="space-y-6 [&_input]:text-black">
                                    <div>
                                        <label for="email"
                                            class="block mb-1 text-sm font-medium  text-main-red">E-mail</label>
                                        <input type="email" name="email" id="email"
                                            class=" border text-sm rounded-lg block w-full p-1.5 border-main-red text-main-red"
                                            value="<?= $userDatas->user_email ?>">
                                        <p id="email_error" class="errorAlert"></p>
                                    </div>
                                    <div>
                                        <label for="phone"
                                            class="block mb-1 text-sm font-medium  text-main-red">Téléphone</label>
                                        <input type="phone" name="phone" id="phone" pattern="[0][0-9]{9}"
                                            class=" border text-sm rounded-lg block w-full p-1.5 border-main-red text-main-red"
                                            value="<?= $userDatas->user_phone ?>">
                                        <p id="phone_error" class="errorAlert"></p>
                                    </div>
                                    <div>
                                        <label for="adress"
                                            class="block mb-1 text-sm font-medium  text-main-red">Adresse</label>
                                        <input type="text" name="adress" id="adress"
                                            class=" border text-sm rounded-lg block w-full p-1.5 border-main-red text-main-red"
                                            value="<?= $userDatas->user_adress ?>">
                                        <p id="adress_error" class="errorAlert"></p>
                                    </div>
                                    <div>
                                        <label for="numero_pe"
                                            class="block mb-1 text-sm font-medium  text-main-red">Numéro Pôle
                                            Emploi</label>
                                        <input type="text" name="numero_pe" id="numero_pe"
                                            class=" border text-sm rounded-lg block w-full p-1.5 border-main-red text-main-red"
                                            value="<?= $userDatas->user_id_poleEmploi ?>">
                                        <p id="numero_pe_error" class="errorAlert"></p>
                                    </div>
                                    <div>
                                        <label for="nationality"
                                            class="block mb-1 text-sm font-medium  text-main-red">Nationalité</label>
                                        <input type="text" name="nationality" id="nationality"
                                            class=" border text-sm rounded-lg block w-full p-1.5 border-main-red text-main-red"
                                            value="<?= $userDatas->user_nationality ?>">
                                        <p id="nationality_error" class="errorAlert"></p>
                                    </div>
                                    <div>
                                        <label for="new_password"
                                            class="block mb-1 text-sm font-medium text-main-red">Choisir un nouveau
                                            mot de passe* <span class="text-main-gray italic">Optionnel</span></label>
                                        <input type="password" name="new_password" id="new_password"
                                            class=" border text-sm rounded-lg block w-full p-1.5 border-main-red text-main-red"
                                            placeholder="Nouveau mot de passe">
                                        <p id="new_password_error" class="errorAlert"></p>
                                    </div>
                                    <div>
                                        <label for="confirm_new_password"
                                            class="block mb-1 text-sm font-medium text-main-red">Confirmez votre
                                            nouveau mot de passe</label>
                                        <input type="password" name="confirm_new_password" id="confirm_new_password"
                                            class=" border text-sm rounded-lg block w-full p-1.5 border-main-red text-main-red"
                                            placeholder="Répétez le nouveau mot de passe">
                                        <p id="confirm_new_password_error" class="errorAlert"></p>
                                    </div>
                                    <div>
                                        <label for="password"
                                            class="block mb-1 text-sm font-medium  text-main-red">Veuillez confirmer
                                            vos modifications en entrant votre (ancien) mot de passe.</label>
                                        <input type="password" name="password" id="password"
                                            placeholder="Ancien mot de passe"
                                            class=" border text-sm rounded-lg block w-full p-1.5 border-main-red text-main-red"
                                            required>
                                        <p id="password_error" class="errorAlert"></p>
                                    </div>
                                    <button type="submit"
                                        class="w-full uppercase font-title text-main-white bg-main-red hover:bg-red-800 font-medium rounded-lg text-sm px-5 py-1.5 text-center ">Modifier</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </section>
                <?php } ?>
            </div>
        </div>
    </div>
</main>

<?php $content = ob_get_clean(); ?>

<?php ob_start(); ?>
<script src="assets/js/tabs.js"></script>
<script src="assets/js/profile.js"></script>
<script>
handleFormSubmission('#avatar-update', '?action=updateUserElements&type=avatar&id=<?= $userDatas->user_id ?>');
handleFormSubmission('#user-form', '?action=updateUserElements&type=datas&id=<?= $userDatas->user_id ?>');
</script>

<?php $script = ob_get_clean(); ?>

<?php require 'view/layout.php'; ?>