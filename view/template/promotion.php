<?php $title = "Promotion"; ?>

<?php ob_start(); ?>

<main class="w-[100vw] overflow-x-hidden bg-main-white">
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
            <div class="grid grid-cols-1 grid-rows-[1fr] rounded-[5px] w-full min-[500px]:w-3/4 sm:w-[100%] justify-self-center sm:grid-cols-[60%_40%] 
                bg-white sm:grid-rows-[250px] xl:grid-rows-[300px] md:justify-self-center md:w-3/4 
                lg:w-full lg:grid-rows-[200px] xl:grid-rows-[300px] relative border-2">
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

    <!-------------PROJETS----------->
    <section class="sectionChange hidden w-11/12 mt-8  md:mt-20 grid gap-6 lg:gap-16 xl:grid-cols-2 mx-auto">
        <!-- card projet 1 -->
        <article id="projet-card-1"
            class="project-card max-w-[766px] border-2 border-black rounded-lg p-4 mb-8 md:flex gap-6 md:p-6 md:mx-auto">
            <!-- partie entreprise desktop -->
            <div class="hidden md:block w-1/3 border-r-2 border-main-gray pr-6">
                <div class="my-2 flex-col">
                    <div class="flex flex-wrap">
                        <p class="font-title font-bold mr-2">Projet fourni par : </p>
                        <p><a href="lien vers la société" class="text-main-red underline font-bold text-sm">Pole
                                formation CCI Ardennes</a></p>
                    </div>
                    <div class="my-4 grow"><img class="" src="assets/img/logo" alt="logo de l'entreprise"></div>
                    <div class="flex flex-wrap">
                        <p class="font-title font-bold mr-2">Adresse :</p>
                        <p class="text-sm pt-0.5 text-left font-light">33 rue de la gare, 08000 Charleville-Mézières</p>
                    </div>
                </div>
            </div>
            <!-- partie info projet -->
            <div class="flex-col text-[12px] flex text-end md:w-2/3">
                <!-- tags projet -->
                <div
                    class="uppercase space-x-4 my-4 [&>tag]:bg-main-gray [&>tag]:bg-opacity-10 [&>tag]:py-2 [&>tag]:px-4 [&>tag]:rounded-full">
                    <tag> html</tag>
                    <tag> css</tag>
                    <tag> react</tag>
                </div>
                <!-- titre projet -->
                <h2 class="font-title text-main-red italic font-bold text-3xl my-2"><a href="lien du projet">Super
                        projet de fou</a></h2>
                <div class="self-end flex w-3/4 justify-between italic border-b border-main-red"><span>Débuté le
                        25/03/2002</span><span>Fini le 25/03/2002</span></div>
                <!-- contenu projet -->
                <div class="text-base flex-grow flex-col">
                    <p class="pl-[20%] line-clamp-5 mt-2 mb-4">The best kept secret of The Bahamas is the country’s
                        sheer size and diversity. With 16 major islands, The Bahamas is an unmatched destination The
                        best kept secret of The Bahamas is the country’s sheer size and diversity. With 16 major
                        islands, The Bahamas is an unmatched destination The best kept secret of The Bahamas is the
                        country’s sheer size and diversity. With 16 major islands, The Bahamas is an unmatched
                        destination The best kept secret of The Bahamas is the country’s sheer size and diversity. With
                        16 major islands, The Bahamas is an unmatched destination The best kept secret of The Bahamas is
                        the country’s sheer size and diversity. With 16 major islands, The Bahamas is an unmatched
                        destination</p>
                    <div id="end" class="mt-auto">
                        <a href="page de la promo"
                            class="bg-main-red py-2 px-4 rounded-full text-main-white my-2 hover:bg-main-white hover:text-main-red hover:border border-main-red">Développeurs
                            Web 2023</a>
                        <div
                            class="space-x-4 mt-4 mb-2 text-sm text-main-white [&>a]:bg-main-gray [&>a]:py-1 [&>a]:px-3 [&>a]:rounded-full">
                            <a href="profil de l'apprenant"
                                class="hover:border border-main-gray hover:text-main-gray hover:bg-main-white">Nabil</a>
                            <a href="profil de l'apprenant"
                                class="hover:border border-main-gray hover:text-main-gray hover:bg-main-white">Alexandre</a>
                            <a href="profil de l'apprenant"
                                class="hover:border border-main-gray hover:text-main-gray hover:bg-main-white">Bryan</a>
                        </div>
                        <a href="lien du projet" class="block float-left text-xs">Voir le projet <i
                                class="fa fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>
            <!-- séparateur mobile-->
            <div class="md:hidden w-4/5 mx-auto bg-main-gray bg-opacity-50 h-0.5 my-4"></div>
            <!-- partie info entreprise mobile-->
            <div class="md:hidden my-2">
                <div class="flex flex-wrap">
                    <p class="font-title font-bold mr-2">Projet fourni par : </p>
                    <p><a href="lien vers la société" class="text-main-red underline font-bold text-sm">Pole formation
                            CCI Ardennes</a></p>
                </div>
                <div class="flex flex-wrap">
                    <p class="font-title font-bold mr-2">Adresse :</p>
                    <p class="text-sm pt-0.5 text-left font-light">33 rue de la gare, 08000 Charleville-Mézières</p>
                </div>
            </div>
        </article>
        <!-- card projet 1 -->
        <article id="projet-card-1"
            class="project-card max-w-[766px] border-2 border-black rounded-lg p-4 mb-8 md:flex gap-6 md:p-6 md:mx-auto">
            <!-- partie entreprise desktop -->
            <div class="hidden md:block w-1/3 border-r-2 border-main-gray pr-6">
                <div class="my-2 flex-col">
                    <div class="flex flex-wrap">
                        <p class="font-title font-bold mr-2">Projet fourni par : </p>
                        <p><a href="lien vers la société" class="text-main-red underline font-bold text-sm">Pole
                                formation CCI Ardennes</a></p>
                    </div>
                    <div class="my-4 grow"><img class="" src="assets/img/logo" alt="logo de l'entreprise"></div>
                    <div class="flex flex-wrap">
                        <p class="font-title font-bold mr-2">Adresse :</p>
                        <p class="text-sm pt-0.5 text-left font-light">33 rue de la gare, 08000 Charleville-Mézières</p>
                    </div>
                </div>
            </div>
            <!-- partie info projet -->
            <div class="flex-col text-[12px] flex text-end md:w-2/3">
                <!-- tags projet -->
                <div
                    class="uppercase space-x-4 my-4 [&>tag]:bg-main-gray [&>tag]:bg-opacity-10 [&>tag]:py-2 [&>tag]:px-4 [&>tag]:rounded-full">
                    <tag> html</tag>
                    <tag> css</tag>
                    <tag> react</tag>
                </div>
                <!-- titre projet -->
                <h2 class="font-title text-main-red italic font-bold text-3xl my-2"><a href="lien du projet">Super
                        projet de fou</a></h2>
                <div class="self-end flex w-3/4 justify-between italic border-b border-main-red"><span>Débuté le
                        25/03/2002</span><span>Fini le 25/03/2002</span></div>
                <!-- contenu projet -->
                <div class="text-base flex-grow flex-col">
                    <p class="pl-[20%] line-clamp-5 mt-2 mb-4">The best kept secret of The Bahamas is the country’s
                        sheer size and diversity. With 16 major islands, The Bahamas is an unmatched destination The
                        best kept secret of The Bahamas is the country’s sheer size and diversity. With 16 major
                        islands, The Bahamas is an unmatched destination The best kept secret of The Bahamas is the
                        country’s sheer size and diversity. With 16 major islands, The Bahamas is an unmatched
                        destination The best kept secret of The Bahamas is the country’s sheer size and diversity. With
                        16 major islands, The Bahamas is an unmatched destination The best kept secret of The Bahamas is
                        the country’s sheer size and diversity. With 16 major islands, The Bahamas is an unmatched
                        destination</p>
                    <div id="end" class="mt-auto">
                        <a href="page de la promo"
                            class="bg-main-red py-2 px-4 rounded-full text-main-white my-2 hover:bg-main-white hover:text-main-red hover:border border-main-red">Développeurs
                            Web 2023</a>
                        <div
                            class="space-x-4 mt-4 mb-2 text-sm text-main-white [&>a]:bg-main-gray [&>a]:py-1 [&>a]:px-3 [&>a]:rounded-full">
                            <a href="profil de l'apprenant"
                                class="hover:border border-main-gray hover:text-main-gray hover:bg-main-white">Nabil</a>
                            <a href="profil de l'apprenant"
                                class="hover:border border-main-gray hover:text-main-gray hover:bg-main-white">Alexandre</a>
                            <a href="profil de l'apprenant"
                                class="hover:border border-main-gray hover:text-main-gray hover:bg-main-white">Bryan</a>
                        </div>
                        <a href="lien du projet" class="block float-left text-xs">Voir le projet <i
                                class="fa fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>
            <!-- séparateur mobile-->
            <div class="md:hidden w-4/5 mx-auto bg-main-gray bg-opacity-50 h-0.5 my-4"></div>
            <!-- partie info entreprise mobile-->
            <div class="md:hidden my-2">
                <div class="flex flex-wrap">
                    <p class="font-title font-bold mr-2">Projet fourni par : </p>
                    <p><a href="lien vers la société" class="text-main-red underline font-bold text-sm">Pole formation
                            CCI Ardennes</a></p>
                </div>
                <div class="flex flex-wrap">
                    <p class="font-title font-bold mr-2">Adresse :</p>
                    <p class="text-sm pt-0.5 text-left font-light">33 rue de la gare, 08000 Charleville-Mézières</p>
                </div>
            </div>
        </article>
    </section>
</main>



<?php $content = ob_get_clean(); ?>

<?php ob_start(); ?>
<link href="assets/css/promotion.css" rel="stylesheet" />
<?php $link = ob_get_clean(); ?>

<?php ob_start(); ?>
<script src="assets/js/promotion.js"></script>
<?php $script = ob_get_clean(); ?>

<?php require 'view/layout.php'; ?>