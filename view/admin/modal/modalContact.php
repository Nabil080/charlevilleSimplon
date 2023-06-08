<!-- Extra Large Modal -->
<div id="modal-contact" tabindex="-1" class="fixed z-50 hidden w-full h-full p-4 overflow-x-hidden bg-opacity-50 bg-black overflow-y-auto md:inset-0 max-h-full">
    <div class="relative w-full max-w-7xl max-h-full mx-auto">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow ">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-medium text-gray-900">
                    Informations
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 
                rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 
                dark:hover:text-white" data-modal-hide="modal-contact">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-2 space-y-6">
                <div class="background bg-main-lightgray overflow-x-hidden min-h-[70vh]">

                    <section class="bg-main-lightgray ">
                        <div class="py-4 lg:py-8 px-4 mx-auto max-w-screen-md">
                            <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-center text-gray-900 ">Votre message</h2>
                            <p class="mb-8 lg:mb-16 font-light text-center text-gray-500 sm:text-xl"></p>
                            <form action="?action=contactUsers" method="post" class="space-y-4">
                                <div>
                                    <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Vos destinataire(s)</label>
                                    <input type="text" id="emailContact" name="send" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 " placeholder="Voici les destinataires" required>
                                </div>
                                <div>
                                    <label for="subject" class="block mb-2 text-sm font-medium text-gray-900">Le sujet de votre mail</label>
                                    <input type="text" id="subject" name="object" class="block p-3 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 shadow-sm focus:ring-primary-500 focus:border-primary-500 " placeholder="Sujet du mail" required>
                                </div>
                                <div class="sm:col-span-2">
                                    <label for="message" class="block mb-2 text-sm font-medium text-gray-900">Votre message</label>
                                    <textarea id="message" rows="6" name="message" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg shadow-sm border border-gray-300" placeholder="Votre message ici"></textarea>
                                </div>
                                <button type="submit" class="py-3 mt-5 px-5 text-sm font-medium text-center text-white rounded-lg bg-primary-700 bg-main-red">Send message</button>
                            </form>
                        </div>
                    </section>

                </div>


                <!-- Modal footer -->
                <div class="flex items-center p-6 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
                    <button data-modal-hide="modal-contact" type="button" class="text-gray-500 bg-white hover:bg-gray-100 
                focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium 
                px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 
                dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Fermer</button>
                </div>
            </div>
        </div>
    </div>
</div>