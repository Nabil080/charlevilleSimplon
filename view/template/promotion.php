<?php $title = "Connexion"; ?>

<?php ob_start(); ?>

<main class="w-[100vw] overflow-x-hidden bg-main-white">
    <section> <!-------------Titre----------->
        <h2 class="text-center text-[24px] md:text-4xl font-bold font-title text-main-red uppercase pb-2">Développeur Web
            et Web Mobile
        </h2>
        <p class="text-center text-[24px] md:text-4xl font-title text-main-red pb-8">Janvier 2023-Septembre 2023
        </p>
    </section>
    <section>   <!-------------TAB----------->
        <div class="flex w-full">
            <div onclick="changeTab(0)" class="tabChange px-0 transition-all duration-[0.4s] bg-main-red w-1/2 text-center text-main-white font-title text-[20px] font-bold py-5">
                <p>Promotions</p>
            </div>
            <div onclick="changeTab(1)" class="tabChange px-0 transition-all duration-[0.4s] bg-main-gray w-1/2 text-center text-main-white font-title text-[20px] font-bold py-5">
                <p>Projets</p>
            </div>
        </div>
    </section>
    <section class="sectionChange"> <!-------------PROMOTIONS----------->
        <div class="grid w-5/6 lg:grid-cols-2 md:w-4/6 gap-8 justify-center mx-auto"> <!------Formateurs------->
            <h3 class="text-center lg:col-start-1 lg:col-end-3 font-main-title text-[22px] font-bold mt-4">Formateurs</h3>
            <!-----Card Formateur------->
            <div class="grid grid-cols-auto rounded-[5px] place-items-center  justify-center items-center border-2 border-main-gray mx-auto">
                <div class="rounded-full flex place-items-center w-[130px] h-[130px] bg-main-lightred grayscale z-10">
                    <img src="upload\promotion\devWeb2023\efz.png" class="w-[78px] z-20 grayscale mx-auto my-auto">
                </div>
                <p class="text-[18px] font-main-title font-bold pt-4">Steven <span class="uppercase">Blombou</span></p>
                <div class="border-2 border-main-red w-full mt-1"></div>
                <p class="text-main-white bg-main-gray px-4 py-1 text-[10px] rounded-[50px] mt-4 mb-4">Développeur Web et Web mobile</p>
                <div class="flex gap-3 px-4">
                    <p class="text-main-white bg-main-gray px-4 py-1 text-[10px] rounded-[50px] mb-4">PHP</p>
                    <p class="text-main-white bg-main-gray px-4 py-1 text-[10px] rounded-[50px] mb-4">Symfony</p>
                    <p class="text-main-white bg-main-gray px-4 py-1 text-[10px] rounded-[50px] mb-4">HTML</p>
                    <p class="text-main-white bg-main-gray px-4 py-1 text-[10px] rounded-[50px] mb-4">CSS</p>                
                </div>
                <button class="bg-main-red text-white text-[20px] font-bold font-main-title w-full py-4">Voir le profil</button>
            </div>
            <!-------------Fin de la Card Formateur----------->

            <!-----Card Formateur------->
            <div class="grid grid-cols-auto rounded-[5px] place-items-center justify-center items-center border-2 border-main-gray mx-auto">
                <div class="rounded-full flex place-items-center w-[130px] h-[130px] bg-main-lightred grayscale z-10">
                    <img src="upload\promotion\devWeb2023\efz.png" class="w-[78px] z-20 grayscale mx-auto my-auto">
                </div>
                <p class="text-[18px] font-main-title font-bold pt-4">Steven <span class="uppercase">Blombou</span></p>
                <div class="border-2 border-main-red w-full mt-1"></div>
                <p class="text-main-white bg-main-gray px-4 py-1 text-[10px] rounded-[50px] mt-4 mb-4">Développeur Web et Web mobile</p>
                <div class="flex gap-3 px-4">
                    <p class="text-main-white bg-main-gray px-4 py-1 text-[10px] rounded-[50px] mb-4">PHP</p>
                    <p class="text-main-white bg-main-gray px-4 py-1 text-[10px] rounded-[50px] mb-4">Symfony</p>
                    <p class="text-main-white bg-main-gray px-4 py-1 text-[10px] rounded-[50px] mb-4">HTML</p>
                    <p class="text-main-white bg-main-gray px-4 py-1 text-[10px] rounded-[50px] mb-4">CSS</p>                
                </div>
                <button class="bg-main-red text-white text-[20px] font-bold font-main-title w-full py-4">Voir le profil</button>
            </div>
            <!-------------Fin de la Card Formateur----------->

        </div>
        <div class="grid w-11/12 grid-cols-1 lg:grid-cols-2 gap-8 justify-center mx-auto"> <!------Apprenants------->
            <h3 class="text-center lg:col-start-1 lg:col-end-3 font-main-title text-[22px] font-bold mt-4">Apprenants</h3>
            

            <!-----Card Apprenants------->
            <div class="grid grid-cols-[60%_40%] bg-white grid-rows-1 relative w-[100%] border-2">
                <div class="w-full">
                    <div class="h-[75%] w-11/12 lg:w-[98%] ml-auto">
                        <p class="text-[22px] font-main-title text-left font-bold pt-4 leading-1 inline">Steven <span class="uppercase">Blombou</span></p>
                        <div class="border-2 border-main-red text-left w-10/12 ml-0 mt-1"></div>
                        <p class="text-[16px]">
                            <i class="fa-solid fa-circle text-green-500 animate-pulse duration-[2s] mb-6 mt-4 mr-1"></i>
                            En alternance depuis janvier 2023
                        </p>
                        <div class="flex gap-3 px-4">
                            <p class="bg-[#F2F2F3] px-4 py-1 border-main-gray border-2 text-[14px] rounded-[50px] mb-2">PHP</p>
                            <p class="bg-[#F2F2F3] px-4 py-1 border-main-gray border-2 text-[14px] rounded-[50px] mb-2">HTML</p>
                            <p class="bg-[#F2F2F3] px-4 py-1 border-main-gray border-2 text-[14px] rounded-[50px] mb-2">CSS</p>
                        </div>
                        <div class="hidden xl:grid mb-3">
                            <p  class="font-bold my-1">Projets de l'apprenant :</p>
                            <div class="flex gap-3 px-4">
                                <p class="bg-main-gray text-main-white px-4 py-1 text-[14px] rounded-[50px] mb-2">Super Projet de fou</p>
                                <p class="bg-main-gray text-main-white px-4 py-1 text-[14px] rounded-[50px] mb-2">Projet Mcdo</p>
                            </div>
                        </div>
                    </div>
                    <button class="clipper2 h-[25%] lg:h-[20%] bg-main-red block text-white z-10 relative text-[20px] font-bold font-main-title w-full">Voir le profil</button>
                </div>
                <div class="clipper h-full bg-main-red relative z-10">
                    <img src="upload/promotion/devWeb2023/profil.jpg" class="bg-right relative h-full z-10">
                </div>
            </div>
            <!-------------Fin de la Card Apprenants----------->

            <!-----Card Apprenants------->
            <div class="grid grid-cols-[60%_40%] bg-white grid-rows-1 relative w-[100%] border-2">
                <div class="w-full">
                    <div class="h-[75%] w-11/12 lg:w-[98%] ml-auto">
                        <p class="text-[22px] font-main-title text-left font-bold pt-4 leading-1 inline">Steven <span class="uppercase">Blombou</span></p>
                        <div class="border-2 border-main-red text-left w-10/12 ml-0 mt-1"></div>
                        <p class="text-[16px]">
                            <i class="fa-solid fa-circle text-green-500 animate-pulse duration-[2s] mb-6 mt-4 mr-1"></i>
                            En alternance depuis janvier 2023
                        </p>
                        <div class="flex gap-3 px-4">
                            <p class="bg-[#F2F2F3] px-4 py-1 border-main-gray border-2 text-[14px] rounded-[50px] mb-2">PHP</p>
                            <p class="bg-[#F2F2F3] px-4 py-1 border-main-gray border-2 text-[14px] rounded-[50px] mb-2">HTML</p>
                            <p class="bg-[#F2F2F3] px-4 py-1 border-main-gray border-2 text-[14px] rounded-[50px] mb-2">CSS</p>
                        </div>
                        <div class="hidden xl:grid mb-3">
                            <p  class="font-bold my-1">Projets de l'apprenant :</p>
                            <div class="flex gap-3 px-4">
                                <p class="bg-main-gray text-main-white px-4 py-1 text-[14px] rounded-[50px] mb-2">Super Projet de fou</p>
                                <p class="bg-main-gray text-main-white px-4 py-1 text-[14px] rounded-[50px] mb-2">Projet Mcdo</p>
                            </div>
                        </div>
                    </div>
                    <button class="clipper2 h-[25%] lg:h-[20%] bg-main-red block text-white z-10 relative text-[20px] font-bold font-main-title w-full">Voir le profil</button>
                </div>
                <div class="clipper h-full bg-main-red relative z-10">
                    <img src="upload/promotion/devWeb2023/profil.jpg" class="bg-right relative h-full z-10">
                </div>
            </div>
            <!-------------Fin de la Card Apprenants----------->

        </div>
    </section> <!-------------Fin de la section Apprenants----------->

            <!-------------PROJETS----------->
    <section class="sectionChange hidden w-11/12 mt-2 grid gap-6 md:grid-cols-2 mx-auto"> 
        <!-- card projet 1 -->
        <article id="projet-card-1" class="project-card max-w-[766px] border-2 border-black rounded-lg p-4 mb-8 2xl:flex gap-6 2xl:p-6">
            <!-- partie entreprise desktop -->
            <div class="hidden 2xl:block w-1/3 border-r-2 border-main-gray pr-6">
            <div class="my-2 flex-col">
                <div class="flex flex-wrap"><p class="font-title font-bold mr-2">Projet fourni par : </p><p><a href="lien vers la société" class="text-main-red underline font-bold text-sm">Pole formation CCI Ardennes</a></p></div>
                <div class="my-4 grow"><img class="" src="assets/img/logo" alt="logo de l'entreprise"></div>
                <div class="flex flex-wrap"><p class="font-title font-bold mr-2">Adresse :</p><p class="text-sm pt-0.5 text-left font-light">33 rue de la gare, 08000 Charleville-Mézières</p></div>
            </div>
            </div>
            <!-- partie info projet -->
            <div class="flex-col text-[12px] flex text-end 2xl:w-2/3">
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
            <div class="2xl:hidden w-4/5 mx-auto bg-main-gray bg-opacity-50 h-0.5 my-4"></div>
            <!-- partie info entreprise mobile-->
            <div class="2xl:hidden my-2">
                <div class="flex flex-wrap"><p class="font-title font-bold mr-2">Projet fourni par : </p><p><a href="lien vers la société" class="text-main-red underline font-bold text-sm">Pole formation CCI Ardennes</a></p></div>
                <div class="flex flex-wrap"><p class="font-title font-bold mr-2">Adresse :</p><p class="text-sm pt-0.5 text-left font-light">33 rue de la gare, 08000 Charleville-Mézières</p></div>
            </div>
        </article>
    </section>
</main>



<?php $content = ob_get_clean(); ?>

<?php ob_start(); ?>
<link href="assets/css/promotion.css" rel="stylesheet"/>
<?php $link = ob_get_clean(); ?>

<?php ob_start(); ?>
<script src="assets/js/promotion.js"></script>
<?php $script = ob_get_clean(); ?>

<?php require 'view/layout.php'; ?>