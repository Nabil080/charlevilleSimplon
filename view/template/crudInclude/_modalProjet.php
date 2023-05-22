<!-- Extra Large Modal -->
<div id="modal-projet<?php '' ?>" tabindex="-1" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative w-full max-w-7xl max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow ">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-medium text-gray-900">
                    Projet
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 
                rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 
                dark:hover:text-white" 
                data-modal-hide="modal-projet<?php '' ?>">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-6 space-y-6">
            <div class="background bg-main-white overflow-x-hidden min-h-[100vh]">
                <div class="mx-auto w-11/12 lg:max-w-[800px] flex justify-between mb-8 lg:mb-16">
                <select
                    class="w-1/2 md:w-[320px] text-main-red text-center border border-4 border-main-red rounded-[10px] font-bold">
                    <option selected value="promotion_2023">Projets d'entreprise</option>
                    <option value="promotion_2022">Promotion 2022</option>
                    <option value="promotion_2021">Promotion 2021</option>
                    <option value="promotion_2020">Promotion 2020</option>
                    <option value="promotion_2019">Promotion 2019</option>
                </select>
                <? if (isset($projetPerso)) {}?>
                <select
                    class="w-1/2 md:w-[320px] text-main-red text-center border border-4 border-main-red rounded-[10px] font-bold">
                    <option selected value="promotion_2023">Projets perso</option>
                    <option value="promotion_2022">Promotion 2022</option>
                    <option value="promotion_2021">Promotion 2021</option>
                    <option value="promotion_2020">Promotion 2020</option>
                    <option value="promotion_2019">Promotion 2019</option>
                </select> 
                <? {} ?>
                </div>
                <!-- card projet -->
                <article id="projet-card-1" class="project-card max-w-[800px] mx-auto border-2 border-black rounded-lg p-4 mb-8 xl:flex gap-6 xl:p-6">
                    <!-- partie entreprise desktop -->
                    <div class="hidden xl:block w-1/3 border-r-2 border-main-gray pr-6">
                    <div class="my-2 flex-col">
                        <div class="flex flex-wrap"><p class="font-title font-bold mr-2">Projet fourni par : </p><p><a href="lien vers la société" class="text-main-red underline font-bold text-sm">Pole formation CCI Ardennes</a></p></div>
                        <div class="my-4 grow"><img class="" src="assets/img/logo" alt="logo de l'entreprise"></div>
                        <div class="flex flex-wrap"><p class="font-title font-bold mr-2">Adresse :</p><p class="text-sm pt-0.5 text-left font-light">33 rue de la gare, 08000 Charleville-Mézières</p></div>
                    </div>
                    </div>
                    <!-- partie info projet -->
                    <div class="flex-col text-[12px] flex text-end xl:w-2/3">
                        <!-- tags projet -->
                        <div class="uppercase space-x-4 my-4 [&>tag]:bg-main-gray [&>tag]:bg-opacity-10 [&>tag]:py-2 [&>tag]:px-4 [&>tag]:rounded-full">
                            <tag> html</tag>
                            <tag> css</tag>
                            <tag> react</tag>
                        </div>
                        <!-- titre projet -->
                        <h2 class="font-title text-main-red italic font-bold text-3xl my-2"><a href="lien du projet">Super projet de fou</a></h2>
                        <div class="self-end flex w-3/4 justify-between italic border-b border-main-red"><span>Débuté le 25/03/2002</span><span>Fini le 25/03/2002</span></div>
                        <!-- contenu projet -->
                        <div class="text-base flex-grow flex-col">
                            <p class="pl-[20%] line-clamp-5 mt-2 mb-4">The best kept secret of The Bahamas is the country’s sheer size and diversity. With 16 major islands, The Bahamas is an unmatched destination The best kept secret of The Bahamas is the country’s sheer size and diversity. With 16 major islands, The Bahamas is an unmatched destination The best kept secret of The Bahamas is the country’s sheer size and diversity. With 16 major islands, The Bahamas is an unmatched destination The best kept secret of The Bahamas is the country’s sheer size and diversity. With 16 major islands, The Bahamas is an unmatched destination The best kept secret of The Bahamas is the country’s sheer size and diversity. With 16 major islands, The Bahamas is an unmatched destination</p>
                            <div id="end" class="mt-auto">
                                <a href="page de la promo" class="bg-main-red py-2 px-4 rounded-full text-main-white my-2 hover:bg-main-white hover:text-main-red hover:border border-main-red">Développeurs Web 2023</a>
                                <div class="space-x-4 mt-4 mb-2 text-sm text-main-white [&>a]:bg-main-gray [&>a]:py-1 [&>a]:px-3 [&>a]:rounded-full">
                                    <a href="profil de l'apprenant" class="hover:border border-main-gray hover:text-main-gray hover:bg-main-white">Nabil</a>
                                    <a href="profil de l'apprenant" class="hover:border border-main-gray hover:text-main-gray hover:bg-main-white">Alexandre</a>
                                    <a href="profil de l'apprenant" class="hover:border border-main-gray hover:text-main-gray hover:bg-main-white">Bryan</a>
                                </div>
                                <a href="lien du projet" class="block float-left text-xs">Voir le projet <i class="fa fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <!-- séparateur mobile-->
                    <div class="xl:hidden w-4/5 mx-auto bg-main-gray bg-opacity-50 h-0.5 my-4"></div>
                    <!-- partie info entreprise mobile-->
                    <div class="xl:hidden my-2">
                        <div class="flex flex-wrap"><p class="font-title font-bold mr-2">Projet fourni par : </p><p><a href="lien vers la société" class="text-main-red underline font-bold text-sm">Pole formation CCI Ardennes</a></p></div>
                        <div class="flex flex-wrap"><p class="font-title font-bold mr-2">Adresse :</p><p class="text-sm pt-0.5 text-left font-light">33 rue de la gare, 08000 Charleville-Mézières</p></div>
                    </div>
                </article>
<!-- card projet -->
<article id="projet-card-1" class="project-card max-w-[800px] mx-auto border-2 border-black rounded-lg p-4 mb-8 xl:flex gap-6 xl:p-6">
                    <!-- partie entreprise desktop -->
                    <div class="hidden xl:block w-1/3 border-r-2 border-main-gray pr-6">
                    <div class="my-2 flex-col">
                        <div class="flex flex-wrap"><p class="font-title font-bold mr-2">Projet fourni par : </p><p><a href="lien vers la société" class="text-main-red underline font-bold text-sm">Pole formation CCI Ardennes</a></p></div>
                        <div class="my-4 grow"><img class="" src="assets/img/logo" alt="logo de l'entreprise"></div>
                        <div class="flex flex-wrap"><p class="font-title font-bold mr-2">Adresse :</p><p class="text-sm pt-0.5 text-left font-light">33 rue de la gare, 08000 Charleville-Mézières</p></div>
                    </div>
                    </div>
                    <!-- partie info projet -->
                    <div class="flex-col text-[12px] flex text-end xl:w-2/3">
                        <!-- tags projet -->
                        <div class="uppercase space-x-4 my-4 [&>tag]:bg-main-gray [&>tag]:bg-opacity-10 [&>tag]:py-2 [&>tag]:px-4 [&>tag]:rounded-full">
                            <tag> html</tag>
                            <tag> css</tag>
                            <tag> react</tag>
                        </div>
                        <!-- titre projet -->
                        <h2 class="font-title text-main-red italic font-bold text-3xl my-2"><a href="lien du projet">Super projet de fou</a></h2>
                        <div class="self-end flex w-3/4 justify-between italic border-b border-main-red"><span>Débuté le 25/03/2002</span><span>Fini le 25/03/2002</span></div>
                        <!-- contenu projet -->
                        <div class="text-base flex-grow flex-col">
                            <p class="pl-[20%] line-clamp-5 mt-2 mb-4">The best kept secret of The Bahamas is the country’s sheer size and diversity. With 16 major islands, The Bahamas is an unmatched destination The best kept secret of The Bahamas is the country’s sheer size and diversity. With 16 major islands, The Bahamas is an unmatched destination The best kept secret of The Bahamas is the country’s sheer size and diversity. With 16 major islands, The Bahamas is an unmatched destination The best kept secret of The Bahamas is the country’s sheer size and diversity. With 16 major islands, The Bahamas is an unmatched destination The best kept secret of The Bahamas is the country’s sheer size and diversity. With 16 major islands, The Bahamas is an unmatched destination</p>
                            <div id="end" class="mt-auto">
                                <a href="page de la promo" class="bg-main-red py-2 px-4 rounded-full text-main-white my-2 hover:bg-main-white hover:text-main-red hover:border border-main-red">Développeurs Web 2023</a>
                                <div class="space-x-4 mt-4 mb-2 text-sm text-main-white [&>a]:bg-main-gray [&>a]:py-1 [&>a]:px-3 [&>a]:rounded-full">
                                    <a href="profil de l'apprenant" class="hover:border border-main-gray hover:text-main-gray hover:bg-main-white">Nabil</a>
                                    <a href="profil de l'apprenant" class="hover:border border-main-gray hover:text-main-gray hover:bg-main-white">Alexandre</a>
                                    <a href="profil de l'apprenant" class="hover:border border-main-gray hover:text-main-gray hover:bg-main-white">Bryan</a>
                                </div>
                                <a href="lien du projet" class="block float-left text-xs">Voir le projet <i class="fa fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <!-- séparateur mobile-->
                    <div class="xl:hidden w-4/5 mx-auto bg-main-gray bg-opacity-50 h-0.5 my-4"></div>
                    <!-- partie info entreprise mobile-->
                    <div class="xl:hidden my-2">
                        <div class="flex flex-wrap"><p class="font-title font-bold mr-2">Projet fourni par : </p><p><a href="lien vers la société" class="text-main-red underline font-bold text-sm">Pole formation CCI Ardennes</a></p></div>
                        <div class="flex flex-wrap"><p class="font-title font-bold mr-2">Adresse :</p><p class="text-sm pt-0.5 text-left font-light">33 rue de la gare, 08000 Charleville-Mézières</p></div>
                    </div>
                </article>

            </div>


            <!-- Modal footer -->
            <div class="flex items-center p-6 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
                <button data-modal-hide="modal-projet<?php "" ?>" type="button" class="text-gray-500 bg-white hover:bg-gray-100 
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