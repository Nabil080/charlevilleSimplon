<!-- Extra Large Modal -->
<div id="modal-apprenant<?php "" ?>" tabindex="-1" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative w-full max-w-7xl max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow ">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-medium text-gray-900">
                    Apprenants
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 
                rounded-lg text-sm p-1.5 ml-auto inline-flex items-center " 
                data-modal-hide="modal-apprenant<?php '' ?>">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            
            <div class="background bg-main-white overflow-x-hidden p-6 space-y-6 min-h-[100vh]">
                <section>
                    <!-------------Titre----------->
                    <h2 class="text-center text-[24px] md:text-4xl font-bold font-title text-main-red uppercase pb-2">$nom de la promo
                    </h2>
                    <p class="text-center text-[24px] md:text-4xl font-title text-main-red pb-8">Janvier 2023-Septembre 2023 $date
                    </p>
                </section>
                
                    <div class="grid w-11/12 lg:w-[98%] grid-cols-1 lg:grid-cols-2 xl:w-11/12 gap-8 xl:gap-24 justify-center mx-auto">
                        <!------Apprenants------->
                        <h3 class="text-center lg:col-start-1 lg:col-end-3 font-main-title text-[22px] font-bold mt-4">Apprenants
                        </h3>


                        <?php for ($i = 0; $i < 6; $i++) { ?>
                        <!-----Card Apprenants------->
                            <div class="rounded-[5px] h-auto w-full bg-white border-2">
                                <div class="flex p-2 mb-[5%] items-center justify-center z-10">
                                    <img src="upload/promotion/devWeb2023/efz.png"
                                        class="bg-right grayscale rounded-full w-[50%] object-cover aspect-[1/1] z-10" 
                                        alt="photo de l'apprenant $nom">
                                </div>
                                <div class=" mx-auto text-center">
                                    <p class="text-[22px] font-main-title text-left font-bold pt-4 leading-1 inline">
                                        $prenom<span class="uppercase">$nom</span>
                                    </p>
                                    <div class=" mx-auto border-2 border-main-red text-left w-10/12"></div>
                                    <p class="text-[16px] md:text-[18px]  leading-[1px] sm:whitespace-nowrap">
                                        <i class="fa-solid fa-circle 
                                        <?php if (isset($statut) && $statut == 1) { echo("text-red-500"); } ?>
                                        text-red-500
                                        animate-pulse duration-[2s] mb-6 mt-4 mr-1"></i>
                                        En recherche d'emploi depuis 1987 $statut
                                    </p>
                                    <div class="hidden sm:flex gap-1 justify-center  mx-auto">
                                        <?php if (isset($tags)) {
                                            $y = 0;
                                            foreach ($tags as $tag) {
                                            
                                            if ($y == 3) {
                                                break;
                                            }
                                            ?>
                                        
                                            <p
                                                class="bg-[#F2F2F3] px-4 py-1 border-main-gray border-2 text-[14px] rounded-[50px] mb-2">
                                                $tagscompétences</p>
                                        
                                        
                                            <p
                                                class="bg-[#F2F2F3] px-4 py-1 border-main-gray border-2 text-[14px] rounded-[50px] mb-2">
                                                $tagscompétences</p>
                                        
                                        
                                            <p
                                                class="bg-[#F2F2F3] px-4 py-1 border-main-gray border-2 text-[14px] rounded-[50px] mb-2">
                                                $tagscompétences</p>
                                            <?php 
                                            $y++;
                                            }}
                                            ?>
                                        
                                    </div>
                                    <div class=" mb-3">
                                        <p class="font-bold my-3">Projets de l'apprenant :</p>
                                        <div class="flex gap-3 px-4 justify-center">
                                            <?php if (isset($projets)) {
                                                $p = 0;
                                                foreach ($projets as $projet) {
                                                    if ($p == 2) {
                                                        break;
                                                    }
                                            ?>
                                            <a href="">
                                                <p class="bg-main-gray text-main-white px-4 py-1 text-[14px] rounded-[50px] mb-2">Un
                                                    projet génial</p>
                                            </a>
                                            <?php   $p++; }
                                            } ?>
                                            
                                        </div>
                                    </div>
                                    <a href="">
                                        <button
                                            class="clipper2 h-[10%] py-4 bg-main-red block text-white z-10 relative text-[20px] text-[22px] font-bold font-main-title w-full">Voir
                                            le profil
                                        </button>
                                    </a>
                                </div>
                            </div>
                        <!-------------Fin de la Card Apprenants----------->
                        <?php } 
                        ?>
                        

                    </div>
                </section>
    <!-------------Fin de la section Apprenants----------->
           
           </div>
        <!-- Description profil apprenant -->

        </div>


            <!-- Modal footer -->
            <div class="flex items-center p-6 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
                <button data-modal-hide="modal-apprenant<?php "" ?>" type="button" class="text-gray-500 bg-white hover:bg-gray-100 
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