<!-- Extra Large Modal -->
<div id="modal-promotion-<?= $promo->id ?>" tabindex="-1" class="fixed top-0 left-0 right-0 z-50 hidden w-full h-full bg-opacity-50 bg-black p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative mx-auto w-full max-w-7xl max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow ">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl md:text-3xl font-medium italic">
                    Validation des candidatures pour la promotion <?= $promo->name ?>
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 
                rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 
                dark:hover:text-white" 
                data-modal-hide="modal-promotion-<?= $promo->id ?>"
                data-modal-target="modal-promotion-<?= $promo->id ?>">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
                <form data-promo="<?= $promo->id ?>" class="validationForm grid grid-rows-[50%_35%_15%] md:grid-cols-2 md:grid-rows-[70%_30%] p-2 overflow-x-hidden min-h-[80vh] md:min-h-[70vh]">
                    <div class="border-2 relative md:row-start-1 md:row-end-3 overflow-y-scroll">
                        <h3 class="text-main-red font-bold text-xl md:text-3xl p-4 italic">Liste des candidats</h3>
                        <div  class="validationDiv pl-4 p-2 text-md">
                            <?php $y = 0;
                            foreach ($candidates as $candidate) { ?>
                                <input type="checkbox" data-name="<?= $candidate->user_name ?>" value="<?= $candidate->user_id ?>">
                                <a href="?action=profilePage&id=<?= $candidate->user_id ?>" target="_blank">
                                    <p class="inline ml-4"><?= $candidate->user_name ?></p>
                                </a>
                                <br>
                            <?php $y++;
                            } ?>
                            <p class="absolute right-8 font-bold bottom-2 italic"><?= $y ?> candidats</p>
                        </div>
                    </div>
                    <div class="showValidation border-2 relative transition-all duration-[3s] max-h-[50vh] overflow-y-scroll">
                            <h3 class="text-green-700 font-bold text-xl md:text-3xl p-4 italic">Candidats Acceptés</h3>
                            <p class="absolute right-8 font-bold bottom-2 italic"><span class="numberChecked"></span> candidats</p>
                    </div>
                    <button type="submit" class="block w-full md:w-auto h-1/3 text-white bg-main-red hover:bg-red-800 focus:ring-4 focus:outline-none 
                                    font-medium rounded-lg text-sm px-5 my-auto mx-auto py-2.5 text-center transition-all duration-[1s] hover:scale-105 hover:bg-green-600">
                            Valider les candidatures
                        </button>
                </form>


            <!-- Modal footer -->
            <div class="flex items-center p-6 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
                <button data-modal-hide="modal-promotion-<?= $promo->id ?>" data-modal-target="modal-promotion-<?= $promo->id ?>" type="button" class="text-gray-500 bg-white hover:bg-gray-100 
                focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium 
                px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 
                dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Fermer</button>
            </div>
</div>
</div>
</div>
</div>

    </div>
</div>
