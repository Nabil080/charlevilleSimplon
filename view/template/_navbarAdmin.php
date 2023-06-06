<?php

$promoRepo = new PromoRepository;
$promos = $promoRepo->getActivePromos();
$userRepo = new UserRepository;
$companies = $userRepo->getAllCompanies();
$companyMails = [];
foreach($companies as $company){
    $companyMails[] = $company->user_email;
}
?>

<div>
    <!-- Navigation -->
    <button data-drawer-target="sidebar-multi-level-sidebar" data-drawer-toggle="sidebar-multi-level-sidebar"
        aria-controls="sidebar-multi-level-sidebar" type="button"
        class="fixed inset-x-0 bottom-0 mx-auto h-24 w-52 text-center bg-main-red text-main-white text-2xl uppercase items-center z-50 p-2 rounded-lg md:hidden focus:outline-none">
        <span class="sr-only">Open sidebar</span>
        Navigation admin
    </button>

    <nav id="sidebar-multi-level-sidebar"
        class="fixed transition-all duration-[0.5s] md:top-16 left-0 z-30 w-full md:w-64 h-screen transition-transform -translate-x-full md:translate-x-0"
        aria-label="Sidebar">
        <div class="h-full px-3 py-4 overflow-y-auto bg-gray-50 dark:bg-main-white shadow-md shadow-gray-800">
            <ul class="space-y-2 font-medium">
                <li>
                    <a href="?action=crudCandidatePage" class="flex items-center p-2 rounded-lg ">
                        <i class="fa-solid fa-user text-3xl md:text-xl text-main-red"></i>
                        <span class="ml-3 text-3xl md:text-xl">Candidat</span>
                    </a>
                </li>

                <li>
                    <a href="?action=crudLearnerPage" class="flex items-center p-2 rounded-lg ">
                        <i class="fa-solid fa-graduation-cap text-3xl md:text-xl text-main-red"></i>
                        <span class="flex-1 ml-3 text-3xl md:text-xl whitespace-nowrap">Apprenant</span>
                    </a>
                </li>
                <li>
                    <a href="?action=crudCompanyPage" class="flex items-center p-2  rounded-lg ">
                        <i class="fa-solid fa-industry text-3xl md:text-xl text-main-red"></i>
                        <span class="flex-1 ml-3 text-3xl md:text-xl whitespace-nowrap">Entreprise</span>
                    </a>
                </li>
                <li>
                    <a href="?action=crudPromotionPage" class="flex items-center p-2  rounded-lg ">
                        <i class="fa-solid fa-user-group text-3xl md:text-xl text-main-red"></i>
                        <span class="flex-1 ml-3 text-3xl md:text-xl whitespace-nowrap">Promotions</span>
                    </a>
                </li>
                <li>
                    <a href="?action=crudProjetPage" class="flex items-center p-2  rounded-lg ">
                        <i class="fa-solid fa-file-pen text-3xl md:text-xl text-main-red    "></i>
                        <span class="flex-1 ml-3 text-3xl md:text-xl whitespace-nowrap">Projets</span>
                    </a>
                </li>
                <li>
                    <button type="button" class="flex items-center w-full p-2  transition duration-75 rounded-lg group "
                        aria-controls="dropdown-contact" data-collapse-toggle="dropdown-contact">
                        <i class="fa-solid fa-graduation-cap text-3xl md:text-xl text-main-red"></i>
                        <span class="flex-1 ml-3 text-3xl md:text-xl text-left whitespace-nowrap"
                            sidebar-toggle-item>Contact</span>
                        <svg sidebar-toggle-item class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </button>
                    <!-- <form> -->
                    <ul id="dropdown-contact" class="hidden py-2 space-y-2">
                        <li>
                            <a href="#"
                                class="flex items-center w-full p-2 text-2xl md:text-xl transition duration-75 rounded-lg pl-11 group "
                                aria-controls="dropdown-dev" data-collapse-toggle="dropdown-dev">Promotions
                                <svg sidebar-toggle-item class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </a>
                        </li>
                        <ul id="dropdown-dev" class="hidden py-2 text-2xl md:text-xl space-y-2">
                            <!-- <?php foreach ($promos as $promo) {
                                $mailList = $promoRepo->getPromoMailList($promo->id)?> -->
                            <li class="flex items-center">
                                <input type="checkbox" name="<?=join(",", $mailList)?>">
                                <a href="?action=promotionPage&id=<?=$promo->id?>"
                                    class="flex items-center w-full p-2 transition duration-75 rounded-lg pl-11 group "><?=$promo->name?></a>
                            </li>
                            <!-- <?php } ?> -->
                        </ul>
                        <li class="flex items-center">
                            <input type="checkbox" name="<?=join(",",$companyMails)?>">
                            <a
                                class="flex items-center w-full p-2 text-2xl md:text-xl transition duration-75 rounded-lg pl-11 group ">Entreprise</a>
                        </li>
                    </ul>
                    <button data-modal-target="modal-contact" data-modal-toggle="modal-contact" id="contactValidation"
                        class="hidden bg-main-red w-1/2 text-center block text-white mx-auto md:w-auto rounded-[5px] mt-4 p-2 px-4">
                        Envoyer
                        <button>
                            <!-- </form> -->

                </li>
            </ul>
        </div>
    </nav>

</div>