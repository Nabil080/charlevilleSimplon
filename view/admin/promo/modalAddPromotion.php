<!-- Modal de connexion -->
<section id="modal-add" data-modal-placement="center" tabindex="-1" aria-hidden="true" class="backdrop:brightness-50 fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] md:h-full">
    <div class="relative w-full h-fit max-w-md md:h-auto">
        <div class="relative bg-main-white border-main-red border-2 rounded-md text-main-red">
            <button type="button" class="absolute top-3 right-2.5 text-main-red bg-transparent rounded-md text-sm p-1.5 ml-auto inline-flex items-center hover: hover:border border-main-red" data-modal-hide="modal-add">
                <svg data-modal-hide="modal-add" data-modal-target="modal-add" aria-hidden="true" class="w-5 h-5 text-main-light" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                <span class="sr-only">Close modal</span>
            </button>
            <!-- Partie CONNEXION -->
            <div id="co" class="px-6 py-6 lg:px-8">
                <h3 class="mb-4 text-xl uppercase w-fit mx-auto font-bold font-title text-main-red">Ajout de promo</h3>
                <form class="space-y-6" action="?action=addPromotion" method="post" target="_blank">
                    <div>
                        <label for="formation" class="block mb-2 text-sm font-medium  text-main-red">Formation</label>
                        <select name="formation" id="formation" class=" border text-sm rounded-md block w-full p-2.5 border-main-red text-main-red" required>
                        <?php foreach($formations as $formation){?>
                            <option value="<?=$formation->id?>"><?=$formation->name?></option>
                        <?php } ?>
                        </select>
                    </div>
                    <div>
                        <label for="formators" class="block mb-2 text-sm font-medium  text-main-red">Formateurs</label>
                        <select name="formators[]" multiple id="formators" class=" border text-sm rounded-md block w-full p-2.5 border-main-red text-main-red">
                            <option disabled selected value> Formateurs(non obligatoire) </option>
                            <?php foreach($formators as $formator){?>
                                <option value="<?=$formator->user_id?>"><?=$formator->user_name?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div>
                        <label for="start" class="block mb-2 text-sm font-medium  text-main-red">Date de début</label>
                        <input type="date" name="start" id="start" class=" border text-sm rounded-md block w-full p-2.5 border-main-red text-main-red" required>
                    </div>
                    <div>
                        <label for="end" class="block mb-2 text-sm font-medium  text-main-red">Date de fin</label>
                        <input type="date" name="end" id="end" class=" border text-sm rounded-md block w-full p-2.5 border-main-red text-main-red" required>
                    </div>
                    <button type="submit" class="w-full uppercase font-title text-main-white bg-main-red hover:bg-red-800 font-medium rounded-md text-sm px-5 py-2.5 text-center ">Valider</button>
                </form>
            </div>
        </div>
    </div>
</section>