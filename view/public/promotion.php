<?php $title = "Promotion"; ?>

<?php ob_start(); ?>
<main class="w-[100vw] overflow-x-hidden bg-main-white">
    <section>
        <!-------------Titre----------->
        <h2 class="text-center text-[24px] md:text-4xl font-bold font-title text-main-red uppercase pb-2">Développeur
            Web
            et Web Mobile
        </h2>
        <p class="text-center text-[24px] md:text-4xl font-title text-main-red pb-8">Janvier 2023 - Septembre 2023
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
            <?php foreach ($formateurs as $formateur) {  ?>
            <div
                class="grid grid-cols-auto flex-grow rounded-[5px] place-items-center justify-center items-center border-2 border-main-gray mx-auto min-w-[270px] max-w-[300px]">
                <div class="rounded-full  flex place-items-center w-[130px] h-[130px] bg-main-lightred z-10 grayscale bg-cover bg-center" style="background-image: url(upload/promotion/devWeb2023/efz.png);">
                    <!-- <img src="upload\promotion\devWeb2023\efz.png" class="w-[78px] z-20 mx-auto my-auto"> -->
                </div>
                <p class="text-[18px] font-main-title font-bold pt-4">
                    <?php if (isset($formateur->surname)) { 
                        echo($formateur->surname);
                    } else if(!isset($formateur->surname)) {
                        echo("Prénom");
                    }
                    ?>
                    <span class="uppercase"> 
                        <?php if (isset($formateur->name)) { 
                            echo($formateur->name);
                        } else if(!isset($formateur->name)) {
                            echo("Nom");
                        }
                        ?>
                    </span>
                </p>
                <div class="border-2 border-main-red w-full my-3"></div>
                <div class="flex overflow-x-scroll gap-3 px-4 min-w-[270px] max-w-[270px] sm:min-w-[295px] pb-4">
                    <!-- MAXIMUM 6 TAG -->
                    <?php $y = 0;
                            if (isset($formateur->tags) && empty($formateur->tags)) { ?>
                                <p class="italic text-center text-[18px] text-main-red">Pas de compétence spécifiée</p>
                            <?php } else if (isset($formateur->tags) && !empty($formateur->tags)) {
                                foreach ($formateur->tags as $tag) { ?>
                                <p class="text-main-white bg-main-gray px-4 py-1 text-base rounded-[50px]"><?= $tag->name ?></p>
                            <?php $y++;
                                    if ($y == 6) {
                                        break;
                                    }
                    }} ?>
                </div>
                <button onclick="window.location.href = '?action=profilePage'"
                class="bg-main-red text-white text-[20px] font-bold font-main-title w-full py-4 self-end">Voir le
                    profil</button>
            </div>
            <?php } ?>
            <!-------------Fin de la Card Formateur----------->

            <!-----Card Formateur------->
            <div
                class="grid grid-cols-auto rounded-[5px] place-items-center justify-center items-center border-2 border-main-gray mx-auto max-w-[300px]">
                <div class="rounded-full flex place-items-center w-[130px] h-[130px] bg-main-lightred z-10 grayscale bg-cover bg-center" style="background-image: url(upload/promotion/devWeb2023/efz.png);">
                    <!-- <img src="upload\promotion\devWeb2023\efz.png" class="w-[78px] z-20 mx-auto my-auto"> -->
                </div>
                <p class="text-[18px] font-main-title font-bold pt-4">Steven <span class="uppercase">Blombou</span></p>
                <div class="border-2 border-main-red w-full my-3"></div>
                <div class="flex overflow-x-scroll gap-3 px-4 w-full pb-4">
                    <!-- MAXIMUM 6 TAG -->
                        <p class="text-main-white bg-main-gray px-4 py-1 text-base rounded-[50px]">PHP</p>
                        <p class="text-main-white bg-main-gray px-4 py-1 text-base rounded-[50px]">Tailwind</p>
                        <p class="text-main-white bg-main-gray px-4 py-1 text-base rounded-[50px]">Symfony</p>
                        <p class="text-main-white bg-main-gray px-4 py-1 text-base rounded-[50px]">HTML</p>
                        <p class="text-main-white bg-main-gray px-4 py-1 text-base rounded-[50px]">CSS</p>
                        <p class="text-main-white bg-main-gray px-4 py-1 text-base rounded-[50px]">React</p>
                </div>
                <button onclick="window.location.href = '?action=profilePage'"
                class="bg-main-red text-white text-[20px] font-bold font-main-title w-full py-4 self-end">Voir le
                    profil</button>
            </div>
            <!-------------Fin de la Card Formateur----------->
        </div>

        <div class="grid w-11/12 justify-center mx-auto xl:w-[100%] grid-cols-1 xl:grid-cols-2 gap-8 xl:gap-12"> <!------Apprenants------->
            <h3 class="text-center xl:col-start-1 xl:col-end-3 font-main-title text-[22px] font-bold mt-4">Apprenants</h3>
            
            <?php foreach ($apprenants as $apprenant) { ?>
                
            <!-----Card Apprenants------->
            <div id="home" class="grid place-items-center overflow-hidden border-4 max-w-[400px] justify-self-center mx-auto sm:w-auto sm:max-w-full">
              <div class="wrapper relative grid grid-rows-[50%_50%] max-h-[520px] min-[400px]:grid-rows-[55%_45%]  min-[400px]:max-h-[700px] grid-cols-1 sm:gap-0 sm:h-[350px] sm:grid-cols-[6fr_4fr] sm:grid-rows-1 sm:aspect-[16/9]">
                <div class="sm:hidden mx-auto overflow-hidden object-fill">
                    <img class="max-w-full h-auto grayscale" 
                    src="<?php if (isset($apprenant->avatar)) {
                        echo ($apprenant->avatar);
                    } else if (!isset($apprenant->avatar)) {
                        echo ("https://images.unsplash.com/photo-1580707578919-892eb22db615?ixid=MnwxMjA3fDB8MHxzZWFyY2h8MTV8fG1hbiUyMHBvcnRyYWl0fGVufDB8fDB8fA%3D%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=400&q=60");
                    }
                    ?>" 
                    alt="">
                </div>
                <div class="content-splitter pt-4 sm:pt-4 flex flex-col gap-4">
                    <div class="left flex flex-col flex-grow gap-4 px-4 w-[minmax(80px,80%)]">
                        <p class="text-[22px] md:text-[24px] text-center sm:text-left  font-main-title font-bold leading-1 inline">
                            <?php if (isset($apprenant->surname)) { 
                                echo($apprenant->surname);
                            } else if(!isset($apprenant->surname)) {
                                echo("Prénom");
                            }
                            ?>
                            <span class="uppercase"> 
                                <?php if (isset($apprenant->name)) { 
                                    echo($apprenant->name);
                                } else if(!isset($apprenant->name)) {
                                    echo("Nom");
                                }
                                ?>
                            </span>
                        </p>
                        <div class=" mx-auto border-2 -mt-2 border-main-red text-left w-10/12 "></div>
                        <p class="text-[20px] md:text-[18px] text-center sm:text-left  sm:whitespace-nowrap">

                            <i class="fa-solid fa-circle 
                            <?php if (isset($apprenant->status->id) && $apprenant->status->id < 6) { 
                                echo("text-red-500"); 
                            } 
                            else if (isset($apprenant->status->id) && $apprenant->status->id > 6) {
                                echo("text-green-500");
                            }?>
                             animate-pulse duration-[2s] mr-1"></i>
                            <?= $apprenant->status->name; ?> depuis
                            <?= substr($apprenant->status_date, 0, 4); ?>
                        </p>
                        <div class="flex gap-1 justify-center sm:justify-normal mx-auto sm:gap-1">
                            <?php $y = 0;
                            if (isset($apprenant->tags) && empty($apprenant->tags)) { ?>
                                <p class="italic text-center text-[18px] text-main-red">Pas de compétence spécifiée</p>
                            <?php } else if (isset($apprenant->tags) && !empty($apprenant->tags)) {
                                foreach ($apprenant->tags as $tag) { ?>
                                <p class="bg-[#F2F2F3] px-4 py-1 border-main-gray border-2 text-[16px] rounded-[50px]"><?= $tag->name ?></p>
                            <?php $y++;
                                    if ($y == 3) {
                                        break;
                                    }
                            }} ?>
                        </div>
                        <div class="hidden min-[400px]:block">
                            <p  class="font-bold my-3 text-center text-[20px] sm:text-left ">Projets de l'apprenant :</p>
                            <div class="flex justify-center sm:justify-auto gap-3 px-4">
                                <?php $i = 0;
                                if (isset($apprenant->tags) && empty($apprenant->projects)) { ?>
                                        <p class="italic text-[18px] text-main-red">Pas de projet pour le moment</p>
                                    <?php } else if (isset($apprenant->tags) && !empty($apprenant->tags)) {
                                        foreach ($apprenant->projects as $project) {
                                            ?>
                                            <a href="">
                                                <p class="bg-main-gray text-main-white px-4 py-1 text-[14px] rounded-[50px]"><?= substr($project->name, 0, 15) . ".." ;?></p>
                                            </a>
                                        <?php 
                                        $i++;
                                        if ($i == 2) {
                                            break;
                                        }
                                    }
                                } 
                                ?>
                            </div>
                        </div>
                    </div>

                    <button class="clipper2 h-[25%] sm:h-[25%] xl:h-[20%] bg-main-red block text-white z-10 relative text-[20px] text-[22px] font-bold font-main-title w-full">Voir le profil</button>
                  
                </div>
                <div class="hidden clipper sm:flex w-full z-10 bg-center bg-cover grayscale" 
                style="background-image: url(
                <?php if (isset($apprenant->avatar)) {
                        echo ($apprenant->avatar);
                    } else if (!isset($apprenant->avatar)) {
                        echo ("https://images.unsplash.com/photo-1580707578919-892eb22db615?ixid=MnwxMjA3fDB8MHxzZWFyY2h8MTV8fG1hbiUyMHBvcnRyYWl0fGVufDB8fDB8fA%3D%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=400&q=60");
                    }
                ?> 
                    );">
                    <!-- <img class="flex-grow grayscale" src="https://images.unsplash.com/photo-1580707578919-892eb22db615?ixid=MnwxMjA3fDB8MHxzZWFyY2h8MTV8fG1hbiUyMHBvcnRyYWl0fGVufDB8fDB8fA%3D%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=400&q=60" alt=""> -->
                </div>
              </div>
            </div>
            <!-------------Fin de la Card Apprenants----------->
            <?php }; ?>

            <!-----Card Apprenants------->
            <div id="home" class="grid place-items-center overflow-hidden border-4 max-w-[400px] justify-self-center mx-auto sm:w-auto sm:max-w-full">
              <div class="wrapper relative grid grid-rows-[60%_40%] max-h-[520px] min-[400px]:grid-rows-[55%_45%]  min-[400px]:max-h-[700px] grid-cols-1 sm:gap-0 sm:h-[350px] sm:grid-cols-[6fr_4fr] sm:grid-rows-1 sm:aspect-[16/9]">
                <div class="sm:hidden mx-auto overflow-hidden object-fill">
                    <img class="max-w-full h-auto grayscale" src="https://images.unsplash.com/photo-1580707578919-892eb22db615?ixid=MnwxMjA3fDB8MHxzZWFyY2h8MTV8fG1hbiUyMHBvcnRyYWl0fGVufDB8fDB8fA%3D%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=400&q=60" alt="">
                </div>
                <div class="content-splitter pt-4 sm:pt-4 flex flex-col gap-4">
                    <div class="left flex flex-col flex-grow gap-4 px-4 w-[minmax(80px,80%)]">
                        <p class="text-[24px] text-center sm:text-left  font-main-title font-bold leading-1 inline">Guillaume <span class="uppercase">Poucet</span></p>
                        <div class=" mx-auto border-2 -mt-2 border-main-red text-left w-10/12 "></div>
                        <p class="text-[20px] md:text-[18px] text-center sm:text-left  leading-[1px] sm:whitespace-nowrap">

                            <i class="fa-solid fa-circle 
                            <?php if (isset($statut) && $statut == 1) { echo("text-red-500"); } ?>
                            text-green-500
                             animate-pulse duration-[2s] mr-1"></i>
                            En alternance depuis 2013
                        </p>
                        <div class="flex gap-1 justify-center sm:justify-normal mx-auto sm:gap-1">
                            <a href="">
                                <p class="bg-[#F2F2F3] px-4 py-1 border-main-gray border-2 text-[16px] rounded-[50px]">REACT</p>
                            </a>
                            <a href="">
                                <p class="bg-[#F2F2F3] px-4 py-1 border-main-gray border-2 text-[16px] rounded-[50px]">Symfony</p>
                            </a>
                            <a class="hidden sm:block" href="">
                                <p class="bg-[#F2F2F3] px-4 py-1 border-main-gray border-2 text-[16px] rounded-[50px]">TypeScript</p>
                            </a>
                        </div>
                        <div class="hidden min-[400px]:block">
                            <p  class="font-bold my-3 text-center text-[20px] sm:text-left ">Projets de l'apprenant :</p>
                            <div class="flex justify-center sm:justify-auto gap-3 px-4">
                                <a href="">
                                    <p class="bg-main-gray text-main-white px-4 py-1 text-[14px] rounded-[50px]">Un projet génial</p>
                                </a>
                                <a href="">
                                    <p class="bg-main-gray text-main-white px-4 py-1 text-[14px] rounded-[50px]">Projet absolum..</p>
                                </a>
                            </div>
                        </div>
                    </div>

                    <button class="clipper2 h-[25%] sm:h-[25%] xl:h-[20%] bg-main-red block text-white z-10 relative text-[20px] text-[22px] font-bold font-main-title w-full">Voir le profil</button>
                  
                </div>
                <div class="hidden clipper sm:flex w-full z-10 bg-center bg-cover grayscale" style="background-image: url(upload/promotion/devWeb2023/profil.jpg);">
                    <!-- <img class="flex-grow grayscale" src="upload/promotion/dev" alt=""> -->
                </div>
              </div>
            </div>


            <!-------------Fin de la Card Apprenants----------->
            

            <!-----Card Apprenants------->
            <div id="home" class="grid place-items-center overflow-hidden border-4 max-w-[400px] justify-self-center mx-auto sm:w-auto sm:max-w-full">
              <div class="wrapper relative grid grid-rows-[60%_40%] max-h-[520px] min-[400px]:grid-rows-[55%_45%]  min-[400px]:max-h-[700px] grid-cols-1 sm:gap-0 sm:h-[350px] sm:grid-cols-[6fr_4fr] sm:grid-rows-1 sm:aspect-[16/9]">
                <div class="sm:hidden mx-auto overflow-hidden object-fill">
                    <img class="max-w-full h-auto grayscale" src="upload\promotion\devWeb2023\profil.jpg" alt="">
                </div>
                <div class="content-splitter pt-4 sm:pt-4 flex flex-col gap-4">
                    <div class="left flex flex-col flex-grow gap-4 px-4 w-[minmax(80px,80%)]">
                        <p class="text-[24px] text-center sm:text-left  font-main-title font-bold leading-1 inline">Guillaume <span class="uppercase">Poucet</span></p>
                        <div class=" mx-auto border-2 -mt-2 border-main-red text-left w-10/12 "></div>
                        <p class="text-[20px] md:text-[18px] text-center sm:text-left  leading-[1px] sm:whitespace-nowrap">

                            <i class="fa-solid fa-circle 
                            <?php if (isset($statut) && $statut == 1) { echo("text-red-500"); } ?>
                            text-green-500
                             animate-pulse duration-[2s] mr-1"></i>
                            En alternance depuis 2013
                        </p>
                        <div class="flex gap-1 justify-center sm:justify-normal mx-auto sm:gap-1">
                            <a href="">
                                <p class="bg-[#F2F2F3] px-4 py-1 border-main-gray border-2 text-[16px] rounded-[50px]">REACT</p>
                            </a>
                            <a href="">
                                <p class="bg-[#F2F2F3] px-4 py-1 border-main-gray border-2 text-[16px] rounded-[50px]">Symfony</p>
                            </a>
                            <a class="hidden sm:block" href="">
                                <p class="bg-[#F2F2F3] px-4 py-1 border-main-gray border-2 text-[16px] rounded-[50px]">TypeScript</p>
                            </a>
                        </div>
                        <div class="hidden min-[400px]:block">
                            <p  class="font-bold my-3 text-center text-[20px] sm:text-left ">Projets de l'apprenant :</p>
                            <div class="flex justify-center sm:justify-auto gap-3 px-4">
                                <a href="">
                                    <p class="bg-main-gray text-main-white px-4 py-1 text-[14px] rounded-[50px]">Un projet génial</p>
                                </a>
                                <a href="">
                                    <p class="bg-main-gray text-main-white px-4 py-1 text-[14px] rounded-[50px]">Projet absolum..</p>
                                </a>
                            </div>
                        </div>
                    </div>

                    <button class="clipper2 h-[25%] sm:h-[25%] xl:h-[20%] bg-main-red block text-white z-10 relative text-[20px] text-[22px] font-bold font-main-title w-full">Voir le profil</button>
                  
                </div>
                <div class="hidden clipper sm:flex w-full z-10 bg-center bg-cover grayscale" style="background-image: url(upload/promotion/devWeb2023/efz.png);">
                    <!-- <img class="flex-grow grayscale" src="https://images.unsplash.com/photo-1580707578919-892eb22db615?ixid=MnwxMjA3fDB8MHxzZWFyY2h8MTV8fG1hbiUyMHBvcnRyYWl0fGVufDB8fDB8fA%3D%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=400&q=60" alt=""> -->
                </div>
              </div>
            </div>


            <!-------------Fin de la Card Apprenants----------->
            
        </div>
    </section>
    <!-------------Fin de la section Apprenants----------->

    <!-------------PROJETS----------->
    <section class="sectionChange hidden w-11/12 mt-8  md:mt-20 grid gap-6 lg:gap-16 xl:grid-cols-2 mx-auto">
        <?php 
        foreach($allProjects as $project) {
        include('view/template/_project_card.php');
         } ?>

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
