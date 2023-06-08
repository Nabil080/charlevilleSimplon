<!-- Extra Large Modal -->
<div id="modal-candidature-<?=$candidate->user_id?>" tabindex="-1"
    class="fixed z-50 hidden w-full h-full p-4 overflow-x-hidden bg-opacity-50 bg-black overflow-y-auto md:inset-0 max-h-full">
    <div class="relative w-full max-w-7xl mx-auto">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow ">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-medium text-gray-900">
                    Candidature
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 
                rounded-lg text-sm p-1.5 ml-auto inline-flex items-center "
                    data-modal-hide="modal-candidature-<?=$candidate->user_id?>" data-modal-target="modal-candidature-<?=$candidate->user_id?>">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-6 space-y-6">
                <div class="background bg-main-white overflow-x-hidden">

                    <div class="picture_desc grid grid-cols-1 lg:grid-cols-[40%_60%] items-center  px-[8%] 2xl:px-[5%]">
                        <!-- Image de profil -->
                        <div class="picture max-h-screen md:mr-5">
                            <img class=" md:h-[300px] xl:h-[500px] mx-auto rounded-t-lg" src="<?=$candidate->user_avatar?>" alt="Image de profil">
                        </div>
                        <!-- Description profil Prospect -->
                        <div class="description md:ml-5 h-[100%] flex flex-col">
                            <h1
                                class="text-main-red font-title text-[28px] md:text-[48px] font-semibold pt-5 text-center md:text-left">
                                <span class="uppercase"><?=$candidate->user_name?></span> <?=$candidate->user_surname?></h1>
                            <div
                                class="text-desc rounded-[5px] border-[1px] border-main-border mt-8 grow md:flex md:flex-col md:justify-center gap-2 content-start">
                                <p class="text-[20px] text-justify pt-5 pb-2 px-3">Mes informations</p>
                                <div class="h-0 border-[2px] border-main-red w-1/2"></div>
                                <ul class="text-justify px-3 pb-3 text-[16px] md:text-[18px] leading-loose ml-8">
                                    <?php if (isset($candidate->user_name)) { ?>
                                    <li class="list-disc">Nom : <?=$candidate->user_name?></li>
                                    <?php } ?>
                                    <?php if (isset($candidate->user_surname)) { ?>
                                    <li class="list-disc">Prénom : <?=$candidate->user_surname?></li>
                                    <?php } ?>
                                    <?php if (isset($candidate->user_adress)) { ?>
                                    <li class="list-disc">Adresse : <?=$candidate->user_adress?></li>
                                    <?php } ?>
                                    <?php if (isset($candidate->user_email)) { ?>
                                    <li class="list-disc">Email : <?=$candidate->user_email?></li>
                                    <?php } ?>
                                    <?php if (isset($candidate->user_phone)) { ?>
                                    <li class="list-disc">Téléphone : <?=$candidate->user_phone?></li>
                                    <?php } ?>
                                    <?php if (isset($candidate->user_birth_place)) { ?>
                                    <li class="list-disc">Date de naissance : <?=$candidate->user_birth_date?></li>
                                    <?php } ?>
                                    <?php if (isset($candidate->user_birth_place)) { ?>
                                    <li class="list-disc">Lieu de naissance : <?=$candidate->user_birth_place?></li>
                                    <?php } ?>
                                    <?php if (isset($candidate->user_nationality)) { ?>
                                    <li class="list-disc">Nationalité : <?=$candidate->user_nationality?></li>
                                    <?php } ?>
                                    <?php if (isset($candidate->user_id_poleEmploi)) { ?>
                                    <li class="list-disc">Numéro Pôle Emploi : <?=$candidate->user_id_poleEmploi?></li>
                                    <?php } ?>
                                    <?php if (isset($candidate->user_company)) { ?>
                                    <li class="list-disc">Gérant de l'entreprise : <?=$candidate->user_company?></li>
                                    <?php } ?>
                                </ul>
                                <button
                                    class="bg-main-red w-full md:w-3/5 text-main-white text-[18px] uppercase py-3 rounded-b-lg md:rounded-none md:mb-4 md:flex md:justify-center md:mx-auto">Editer
                                    les infos</button>
                            </div>
                        </div>
                    </div>
                    <!-- Modal footer -->
                    <div
                        class="flex items-center p-6 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
                        <button data-modal-hide="modal-candidature-<?=$candidate->user_id?>" data-modal-target="modal-candidature-<?=$candidate->user_id?>" type="button" class="text-gray-500 bg-white hover:bg-gray-100 
                        focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium 
                        px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 
                        dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Fermer</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>