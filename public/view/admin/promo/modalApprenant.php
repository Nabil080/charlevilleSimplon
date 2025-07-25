<!-- Extra Large Modal -->

<div id="modal-apprenant-<?= $promo->id ?>" tabindex="-1" class="fixed hidden bg-black bg-opacity-50 top-0 left-0 right-0 z-50 h-full w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0">
    <div class="relative w-full max-w-7xl mx-auto max-h-full ">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow ">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-medium text-gray-900">
                    Apprenants
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900
                rounded-lg text-sm p-1.5 ml-auto inline-flex items-center " data-modal-hide="modal-apprenant-<?= $promo->id ?>"  data-modal-target="modal-apprenant-<?= $promo->id ?>">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->

            <div class="background bg-main-white overflow-x-hidden p-6 space-y-6 min-h-[100vh]">
                <section>
                    <!-------------Titre----------->
                    <h2 class="text-center text-[24px] md:text-4xl font-bold font-title text-main-red uppercase pb-2"><?= $promo->name ?>
                    </h2>
                    <p class="text-center text-[24px] md:text-4xl font-title text-main-red pb-8"><?= "$promo->start - $promo->end" ?>
                    </p>
                </section>

                <div class="grid w-11/12 lg:w-[98%] grid-cols-1 lg:grid-cols-2 xl:w-11/12 gap-8 xl:gap-24 justify-center mx-auto">
                    <!------Apprenants------->
                    <h3 class="text-center lg:col-start-1 lg:col-end-3 font-main-title text-[22px] font-bold mt-4">Apprenants
                    </h3>


                                <?php foreach ($apprenants as $apprenant) {
                                    include ('view/template/_apprenant_card.php');
                                }; ?>


                </div>
                </section>
                <!-------------Fin de la section Apprenants----------->

            </div>
            <!-- Description profil apprenant -->

        </div>


        <!-- Modal footer -->
        <div class="flex items-center p-6 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
            <button data-modal-hide="modal-apprenant-<?= $promo->id ?>"  data-modal-target="modal-apprenant-<?= $promo->id ?>" type="button" class="text-gray-500 bg-white hover:bg-gray-100 
                focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium 
                px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 
                dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Fermer</button>
        </div>
    </div>
</div>
