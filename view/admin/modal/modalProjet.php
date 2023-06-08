<?php if(isset($user)){?>

<!-- Extra Large Modal -->
<div id="modal-projet-<?=$user->user_id?>" tabindex="-1"
    class="fixed z-50 hidden w-full p-4 overflow-x-hidden bg-opacity-50 bg-black overflow-y-auto md:inset-0 max-h-3/5">
    <div class="relative w-full max-w-7xl max-h-full mx-auto">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow ">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-medium text-gray-900">
                    Projet
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 
                rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 
                dark:hover:text-white" data-modal-hide="modal-projet-<?=$user->user_id?>" data-modal-target="modal-projet-<?=$user->user_id?>">
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
                <div class="background bg-main-white overflow-x-hidden min-h-[100vh]">
                    <?php if($user->role_id > 3 ){?>
                    <div class="mx-auto w-11/12 lg:max-w-[800px] flex justify-between mb-8 lg:mb-16">
                        <div class="flex w-full">
                            <div onclick="swapDivsById('simplon_projects_<?=$user->user_id?>','perso_projects_<?=$user->user_id?>')" onclick="changeTab(0)" class="tabChange cursor-pointer px-0 transition-all duration-[0.4s] !bg-main-red w-1/2 text-center text-main-white font-title text-lg md:text-xl lg:text-2xl font-bold py-2 md:py-4">
                                <p class="select-none">Projets simplon</p>
                            </div>
                            <div onclick="swapDivsById('simplon_projects_<?=$user->user_id?>','perso_projects_<?=$user->user_id?>')" onclick="changeTab(1)" class="tabChange cursor-pointer px-0 transition-all duration-[0.4s] bg-main-gray w-1/2 text-center text-main-white font-title text-lg md:text-xl lg:text-2xl font-bold py-2 md:py-4">
                                <p class="select-none">Projets perso</p>
                            </div>
                        </div>
                    </div>
                    <section id="simplon_projects_<?=$user->user_id?>" class="sectionChange">
                        <?php
                            $projects = $UserRepo->getUserSimplonProjects($user->user_id);
                            foreach($projects as $project){
                                include('view/template/_project_card.php');
                            }
                        ?>
                    </section>
                    <section id="perso_projects_<?=$user->user_id?>" class="sectionChange hidden projet-cards w-11/12 mt-2 gap-6 mx-auto flex flex-col justify-center lg:flex-row lg:flex-wrap">
                    <?php
                            $projects = $UserRepo->getUserPersonnalProjects($user->user_id);
                            foreach($projects as $project){
                                include('view/template/_project_perso_card.php');
                            }
                        ?>
                    </section>
                    <?php }else{
                        $projects = $UserRepo->getUserSubmittedProjects($user->user_id);
                        foreach($projects as $project){
                            include('view/template/_project_card.php');
                        }
                    } ?>
                </div>


                <!-- Modal footer -->
                <div class="flex items-center p-6 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
                    <button data-modal-hide="modal-projet-<?=$user->user_id?>" data-modal-target="modal-projet-<?=$user->user_id?>" type="button" class="text-gray-500 bg-white hover:bg-gray-100 
                focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium
                px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500
                dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Fermer</button>
                </div>
            </div>
        </div>
    </div>
</div>

<?php } ?>

<?php if(isset($promo)){?>

<!-- Extra Large Modal -->
<div id="modal-projet-<?=$promo->id?>" tabindex="-1"
    class="fixed top-0 left-0 right-0 z-50 hidden w-full h-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 bg-opacity-50 bg-black">
    <div class="relative mx-auto w-full max-w-7xl max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow ">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-medium text-gray-900">
                    Projet
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 
                rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 
                dark:hover:text-white" data-modal-hide="modal-projet-<?=$promo->id?>" data-modal-target="modal-projet-<?=$promo->id?>">
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
                <div class="background bg-main-white overflow-x-hidden min-h-[100vh]">
                    <?php $projects = $PromoRepo->getPromoProjects($promo->id);
                        foreach($projects as $project){
                            include('view/template/_project_card.php');
                        }
                    ?>
                </div>

                <!-- Modal footer -->
                <div class="flex items-center p-6 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
                    <button data-modal-hide="modal-projet-<?=$promo->id?>" data-modal-target="modal-projet-<?=$promo->id?>" type="button" class="text-gray-500 bg-white hover:bg-gray-100 
                focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium 
                px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 
                dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Fermer</button>
                </div>
            </div>
        </div>
    </div>
</div>

<?php } ?>