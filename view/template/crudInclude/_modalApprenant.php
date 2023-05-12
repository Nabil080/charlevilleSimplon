<!-- Extra Large Modal -->
<div id="modal-apprenant<?php "" ?>" tabindex="-1" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative w-full max-w-7xl max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow ">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-medium text-gray-900">
                    apprenant
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 
                rounded-lg text-sm p-1.5 ml-auto inline-flex items-center " 
                data-modal-hide="modal-apprenant<?php '' ?>">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-6 space-y-6">
            <div class="background bg-main-white overflow-x-hidden min-h-[100vh]">
            <section>
                    <!-------------Titre----------->
                    <h2 class="text-center text-[24px] md:text-4xl font-bold font-title text-main-red uppercase pb-2">Développeur
                        Web
                        et Web Mobile
                    </h2>
                    <p class="text-center text-[24px] md:text-4xl font-title text-main-red pb-8">Janvier 2023-Septembre 2023
                    </p>
                </section>
                <section>
                    <!-------------TAB----------->
                    <div class="flex w-full cursor-pointer">
                        <div onclick="changeTab(0)"
                            class="tabChange px-0 transition-all duration-[0.4s] bg-main-red w-1/2 text-center text-main-white font-title text-[20px] font-bold py-5">
                            <p>Promotions</p>
                        </div>
                        <div onclick="changeTab(1)"
                            class="tabChange px-0 transition-all duration-[0.4s] bg-main-gray w-1/2 text-center text-main-white font-title text-[20px] font-bold py-5">
                            <p>Projets</p>
                        </div>
                    </div>
                </section>
                <section class="sectionChange mb-8">
                    <!-------------PROMOTIONS----------->
                    <div class="grid w-5/6 lg:grid-cols-2 md:w-4/6 gap-8 justify-center mx-auto">
                        <!------Formateurs------->
                        <h3 class="text-center lg:col-start-1 lg:col-end-3 font-main-title text-[22px] font-bold mt-4">Formateurs
                        </h3>
                        <!-----Card Formateur------->
                        <div
                            class="grid grid-cols-auto rounded-[5px] place-items-center  justify-center items-center border-2 border-main-gray mx-auto">
                            <div class="rounded-full flex place-items-center w-[130px] h-[130px] bg-main-lightred grayscale z-10">
                                <img src="upload\promotion\devWeb2023\efz.png" class="w-[78px] z-20 grayscale mx-auto my-auto">
                            </div>
                            <p class="text-[18px] font-main-title font-bold pt-4">Steven <span class="uppercase">Blombou</span></p>
                            <div class="border-2 border-main-red w-full mt-1"></div>
                            <p class="text-main-white bg-main-gray px-4 py-1 text-[10px] rounded-[50px] mt-4 mb-4">Développeur Web
                                et Web mobile</p>
                            <div class="flex gap-3 px-4">
                                <a href="">
                                    <p class="text-main-white bg-main-gray px-4 py-1 text-[10px] rounded-[50px] mb-4">PHP</p>
                                </a>
                                <a href="">
                                    <p class="text-main-white bg-main-gray px-4 py-1 text-[10px] rounded-[50px] mb-4">Symfony</p>
                                </a>
                                <a href="">
                                    <p class="text-main-white bg-main-gray px-4 py-1 text-[10px] rounded-[50px] mb-4">HTML</p>
                                </a>
                                <a href="">
                                    <p class="text-main-white bg-main-gray px-4 py-1 text-[10px] rounded-[50px] mb-4">CSS</p>
                                </a>
                            </div>
                            <button class="bg-main-red text-white text-[20px] font-bold font-main-title w-full py-4">Voir le
                                profil</button>
                        </div>
                        <!-------------Fin de la Card Formateur----------->

                        <!-----Card Formateur------->
                        <div
                            class="grid grid-cols-auto rounded-[5px] place-items-center justify-center items-center border-2 border-main-gray mx-auto">
                            <div class="rounded-full flex place-items-center w-[130px] h-[130px] bg-main-lightred grayscale z-10">
                                <img src="upload\promotion\devWeb2023\efz.png" class="w-[78px] z-20 grayscale mx-auto my-auto">
                            </div>
                            <p class="text-[18px] font-main-title font-bold pt-4">Steven <span class="uppercase">Blombou</span></p>
                            <div class="border-2 border-main-red w-full mt-1"></div>
                            <p class="text-main-white bg-main-gray px-4 py-1 text-[10px] rounded-[50px] mt-4 mb-4">Développeur Web
                                et Web mobile</p>
                            <div class="flex gap-3 px-4">
                                <a href="">
                                    <p class="text-main-white bg-main-gray px-4 py-1 text-[10px] rounded-[50px] mb-4">PHP</p>
                                </a>
                                <a href="">
                                    <p class="text-main-white bg-main-gray px-4 py-1 text-[10px] rounded-[50px] mb-4">Symfony</p>
                                </a>
                                <a href="">
                                    <p class="text-main-white bg-main-gray px-4 py-1 text-[10px] rounded-[50px] mb-4">HTML</p>
                                </a>
                                <a href="">
                                    <p class="text-main-white bg-main-gray px-4 py-1 text-[10px] rounded-[50px] mb-4">CSS</p>
                                </a>
                            </div>
                            <button class="bg-main-red text-white text-[20px] font-bold font-main-title w-full py-4">Voir le
                                profil</button>
                        </div>
                        <!-------------Fin de la Card Formateur----------->

                    </div>
                    <div
                        class="grid w-11/12 lg:w-[98%] grid-cols-1 lg:grid-cols-2 xl:w-11/12 gap-8 xl:gap-24 justify-center mx-auto">
                        <!------Apprenants------->
                        <h3 class="text-center lg:col-start-1 lg:col-end-3 font-main-title text-[22px] font-bold mt-4">Apprenants
                        </h3>



                        <!-----Card Apprenants------->
                        <div class="grid grid-cols-1 grid-rows-[1fr] rounded-[5px] w-full min-[500px]:w-3/4 justify-self-center 
                            bg-white   md:justify-self-center md:w-3/4 
                            relative border-2">
                            <div class="h-auto sm:h-[100%]">
                                <div class="flex h-[60%] mb-[5%] items-center sm:hidden justify-center relative z-10">
                                    <img src="upload/promotion/devWeb2023/efz.png"
                                        class="bg-right grayscale relative rounded-full h-full object-cover aspect-[1/1] lg:object-cover z-10">
                                </div>
                                <div
                                    class=" w-[98%] mx-auto h-[30%] md:pl-2 md:pt-2  text-center sm:text-left sm:h-[75%] lg:h-[80%] sm:w-11/12 lg:w-[98%] sm:ml-auto">
                                    <p class="text-[22px] md:text-[24px] font-main-title text-left font-bold pt-4 leading-1 inline">
                                        Steven <span class="uppercase">Blombou</span></p>
                                    <div class=" mx-auto border-2 border-main-red text-left w-10/12 sm:ml-0 sm:mt-1"></div>
                                    <p class="text-[16px] md:text-[18px]  leading-[1px] sm:whitespace-nowrap">
                                        <i class="fa-solid fa-circle 
                                        <?php if (isset($statut) && $statut == 1) { echo("text-red-500"); } ?>
                                        text-red-500
                                        animate-pulse duration-[2s] mb-6 mt-4 mr-1"></i>
                                        En recherche d'emploi depuis 1987
                                    </p>
                                    <div
                                        class="flex gap-1 justify-center sm:justify-normal mx-auto sm:gap-1 xl:gap-3 sm:px-4  lg:px-1 xl:px-4">
                                        <a href="">
                                            <p
                                                class="bg-[#F2F2F3] px-4 py-1 border-main-gray border-2 text-[14px] md:text-[16px] rounded-[50px] mb-2">
                                                REACT</p>
                                        </a>
                                        <a href="">
                                            <p
                                                class="bg-[#F2F2F3] px-4 py-1 border-main-gray border-2 text-[14px] md:text-[16px] rounded-[50px] mb-2">
                                                Symfony</p>
                                        </a>
                                        <a href="">
                                            <p
                                                class="bg-[#F2F2F3] px-4 py-1 border-main-gray border-2 text-[14px] md:text-[16px] rounded-[50px] mb-2">
                                                TypeScript</p>
                                        </a>
                                    </div>
                                    <div class="hidden mb-3">
                                        <p class="font-bold my-3">Projets de l'apprenant :</p>
                                        <div class="flex gap-3 px-4">
                                            <a href="">
                                                <p class="bg-main-gray text-main-white px-4 py-1 text-[14px] rounded-[50px] mb-2">Un
                                                    projet génial</p>
                                            </a>
                                            <a href="">
                                                <p class="bg-main-gray text-main-white px-4 py-1 text-[14px] rounded-[50px] mb-2">
                                                    Projet absolum..</p>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <button
                                    class="clipper2 h-[10%] sm:h-[25%] lg:h-[20%] bg-main-red block text-white z-10 relative text-[20px] text-[22px] font-bold font-main-title w-full">Voir
                                    le profil</button>
                            </div>
                            <div class="clipper h-full hidden sm:flex relative z-10">
                                <img src="upload/promotion/devWeb2023/efz.png"
                                    class="rounded-[5px] bg-right grayscale relative  h-full object-cover aspect-[1/1] lg:object-cover z-10">
                            </div>
                        </div>
                        <!-------------Fin de la Card Apprenants----------->

                        <!-----Card Apprenants------->
                        <div class="grid grid-cols-1 grid-rows-[1fr] rounded-[5px] w-full min-[500px]:w-3/4 sm:w-[100%] justify-self-center sm:grid-cols-[60%_40%] 
                        bg-white sm:grid-rows-[250px] xl:grid-rows-[300px] md:justify-self-center md:w-3/4 
                        lg:w-full lg:grid-rows-[200px] xl:grid-rows-[300px] relative border-2">

                            <div class="h-auto sm:h-[100%] ">
                                <div class="flex h-[60%]  mb-[5%] items-center sm:hidden justify-center relative z-10">
                                    <img src="upload/promotion/devWeb2023/profil.jpg"
                                        class="bg-right grayscale relative rounded-full h-full object-cover aspect-[1/1] lg:object-cover z-10">
                                </div>
                                <div
                                    class=" w-[98%] mx-auto h-[30%] md:pl-2 md:pt-2  text-center sm:text-left sm:h-[75%] lg:h-[80%] sm:w-11/12 lg:w-[98%] sm:ml-auto">
                                    <p class="text-[22px] md:text-[24px] font-main-title text-left font-bold pt-4 leading-1 inline">
                                        Guillaume <span class="uppercase">Poucet</span></p>
                                    <div class=" mx-auto border-2 border-main-red text-left w-10/12 sm:ml-0 sm:mt-1"></div>
                                    <p class="text-[16px] md:text-[18px]  leading-[1px] sm:whitespace-nowrap">
                                        <i class="fa-solid fa-circle 
                                        <?php if (isset($statut) && $statut == 1) { echo("text-red-500"); } ?>
                                        text-green-500
                                         animate-pulse duration-[2s] mb-6 mt-4 mr-1"></i>
                                        En alternance depuis 2013
                                    </p>
                                    <div
                                        class="flex gap-1 justify-center sm:justify-normal mx-auto sm:gap-1 xl:gap-3 sm:px-4  lg:px-1 xl:px-4">
                                        <a href="">
                                            <p
                                                class="bg-[#F2F2F3] px-4 py-1 border-main-gray border-2 text-[14px] md:text-[16px] rounded-[50px] mb-2">
                                                REACT</p>
                                        </a>
                                        <a href="">
                                            <p
                                                class="bg-[#F2F2F3] px-4 py-1 border-main-gray border-2 text-[14px] md:text-[16px] rounded-[50px] mb-2">
                                                Symfony</p>
                                        </a>
                                        <a href="">
                                            <p
                                                class="bg-[#F2F2F3] px-4 py-1 border-main-gray border-2 text-[14px] md:text-[16px] rounded-[50px] mb-2">
                                                TypeScript</p>
                                        </a>
                                    </div>
                                    <div class="hidden xl:grid mb-3">
                                        <p class="font-bold my-3">Projets de l'apprenant :</p>
                                        <div class="flex gap-3 px-4">
                                            <a href="">
                                                <p class="bg-main-gray text-main-white px-4 py-1 text-[14px] rounded-[50px] mb-2">Un
                                                    projet génial</p>
                                            </a>
                                            <a href="">
                                                <p class="bg-main-gray text-main-white px-4 py-1 text-[14px] rounded-[50px] mb-2">
                                                    Projet absolum..</p>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <button
                                    class="clipper2 h-[10%] sm:h-[25%] lg:h-[20%] bg-main-red block text-white z-10 relative text-[20px] text-[22px] font-bold font-main-title w-full">Voir
                                    le profil</button>
                            </div>
                            <div class="clipper h-full hidden sm:flex relative z-10">
                                <img src="upload/promotion/devWeb2023/profil.jpg"
                                    class=" rounded-[5px] bg-right grayscale relative  h-full object-cover aspect-[1/1] lg:object-cover z-10">
                            </div>
                        </div>
                        <!-------------Fin de la Card Apprenants----------->

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