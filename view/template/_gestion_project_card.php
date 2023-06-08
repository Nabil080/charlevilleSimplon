<article class="relative mt-2">

    <!-- statut projet -->
    <div id="status<?= $x ?>" class="absolute -top-8 italic flex items-center font-bold text-xl"><p>Statut du projet : <?= $project->status->name ?> 
    <?php  

        if (isset($project->start) && $project->status->id == 12) {
        echo $project->start;
    } ?></p>
        <i class="fa fa-circle ml-2 mt-1 
        <?php if (isset($project->status) && ($project->status->id == 10 || $project->status->id == 12)) { ?>
            text-green-500
        <?php } else if (isset($project->status) && $project->status->id == 11) { ?>
            text-red-500
        <?php } else if (isset($project->status) && $project->status->id == 9) { ?>
            text-orange-500
        <?php } ?> animate-pulse">
        </i>
    </div>
    <a href="?action=addProject&id=<?=$project->id ?>" type="submit" class="whitespace-nowrap absolute -top-8 right-0 font-bold text-xl hover:text-main-red cursor-pointer">
        <p>Modifier <i class="fa-solid fa-pen-to-square"></i></p>
    </a>
        <!-- card projet -->
        <div id="projet-card-1" class="project-card max-w-[1000px] border-2 border-black rounded-lg p-4 md:flex gap-6  md:p-6">
            <!-- partie entreprise desktop -->
            <div class="hidden md:block w-2/5 border-r-2 border-main-gray pr-4">
                <div class="my-2 flex-col text-lg lg:text-xl">
                    <div class="flex flex-wrap">
                        <p class="font-title font-bold mr-2">Projet fourni par : </p>
                        <p><a href="<?=$project->company_link?>" target="_blank" class="text-main-red underline font-bold text-sm"><?=$project->company_name?></a></p>
                    </div>
                    <div class="my-4 grow"><img class="" src="<?=$project->company_image?>" alt="logo de l'entreprise"></div>
                    <div class="flex flex-wrap">
                        <p class="font-title font-bold mr-2 block w-full">Adresse :</p>
                        <?php  
                         if (isset ($project->company_adress) && !empty($project->company_adress)) { ?>
                            <p class="text-sm pt-0.5 text-left font-light"><?=$project->company_adress?></p>
                        <?php } else { ?>
                            <p class="text-sm pt-0.5 text-left font-light">Pas d'adresse spécifiée</p>
                        <?php } ?>
                    </div>
                </div>
            </div>
            <!-- partie info projet -->
            <div class="flex-col text-[12px] lg:text-base flex text-end md:w-full">
                <!-- tags projet -->
                <div class="uppercase space-x-4 my-4 [&>tag]:bg-main-gray [&>tag]:bg-opacity-10 [&>tag]:py-2 [&>tag]:px-4 [&>tag]:rounded-full">
                    <?php foreach($project->tags as $tag){ ?>
                        <tag><?=$tag->name?></tag>
                    <?php } ?>
                </div>
                <!-- titre projet -->
                <h2 class="font-title text-main-red italic font-bold text-3xl md:!text-[40px] lg:!text-[46px] my-2 lg:!my-6"><a href="?action=projectPage&id=<?= $project->id?>"><?= $project->name?></a></h2>
                <div class="self-end flex w-3/4 justify-between italic border-b border-main-red">
                    <?php if(isset($project->start)){ ?><span>Débuté le <?=date('d-m-Y', strtotime($project->start))?></span><?php }
                    if(isset($project->end)){ ?><span>Fini le <?=date('d-m-Y', strtotime($project->end))?></span><?php } ?>
                </div>

                <!-- contenu projet -->
                <div class="text-base md:text-lg lg:text-xl flex-grow flex-col">
                    <p class="pl-[10%] line-clamp-5 lg:line-clamp-6 mt-2 mb-4"><?=$project->description?></p>
                    <div id="end" class="mt-auto lg:mt-8">
                        <?php if (isset($project->promo) && !empty($project->promo)) {?>
                        <a href="?action=promotionPage&id=<?= $project->promo->id ?>" class="bg-main-red py-2 px-4 rounded-full text-main-white my-2 hover:bg-main-white hover:text-main-red hover:border border-main-red">
                            <?=$project->promo->name?>
                        </a>
                        <?php } ?>
                        <div class="space-x-4 mt-4 mb-2 text-sm md:!text-base lg:!text-lg text-main-white [&>a]:bg-main-gray [&>a]:py-1 [&>a]:px-3 [&>a]:rounded-full">
                            <?php foreach($project->team as $user) { ?>
                                <a href="?action=profilePage&id=<?=$user->user_id?>" class="hover:border border-main-gray hover:text-main-gray hover:bg-main-white">
                                    <?=$user->user_surname?>
                                </a>
                            <?php } ?>
                        </div>
                        <a href="?action=projectPage&id=<?=$project->id?>" class="block float-left text-xs md:!text-base lg:!text-lg ">Voir le projet <i class="fa fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>
            <!-- séparateur mobile-->
            <div class="md:hidden w-4/5 mx-auto bg-main-gray bg-opacity-50 h-0.5 my-4"></div>
            <!-- partie info entreprise mobile-->
            <div class="md:hidden my-2">
                <div class="flex flex-wrap">
                    <p class="font-title font-bold mr-2">Projet fourni par : </p>
                    <p>
                        <a href="<?=$project->company_link?>" class="text-main-red underline font-bold text-sm"><?=$project->company_name?></a>
                    </p>
                </div>
                <div class="flex flex-wrap">
                    <p class="font-title font-bold mr-2">Adresse :</p>
                    <?php  
                    if (isset ($project->company_adress) && !empty($project->company_adress)) { ?>
                        <p class="text-sm pt-0.5 text-left font-light"><?=$project->company_adress?></p>
                    <?php } else { ?>
                    <p class="text-sm pt-0.5 text-left font-light">Pas d'adresse spécifiée</p>
                    <?php } ?>
                </div>
            </div>
        </div>
        <!-- boutons projet -->
        <?php 
        if (isset($_SESSION['user']) && $_SESSION['user']->role_id == 1 && $project->status->id == 9) { 
            ?> <!--1-->
            <form id="<?= $x ?>" class="validationProjectForm mt-6 flex lg:text-lg [&>div]:grid [&>div]:place-content-center">
                <!-- refuser -->
                <button type="submit" onclick="refuseProject(<?= $i ?>, <?= $x ?>)" class="w-fit px-6 md:!flex gap-2 md:items-center hover:text-main-red cursor-pointer">
                    <i  class="fa-solid fa-xmark"></i>
                    <p class=" hidden md:block"> Refuser </p>
                </button>
                <!-- select promo -->
                <div class="grow">
                    
                        <select class="w-full" name="promo" id="">
                            <?php foreach ($promos as $promo) { ?>
                                <option value="<?= $promo->id ?>"><?= $promo->name ?></option>
                            <?php } 
                            ?>
                        </select>
                            
                    <input type="hidden" name="projectId" value="<?= $project->id ?>"/>           
                </div>
                <!-- accepter -->
                <button type="submit" onclick="acceptProject(<?=$i?>, <?= $x ?>)" class="w-fit px-6 md:flex md:items-center gap-2 hover:text-main-red cursor-pointer">
                    <p  class="hidden md:block"> Accepter</p><i class="fa-solid fa-check"></i>
                </button>
            </form>
        <?php $i ++;
        } else if (isset($_SESSION['user']) && $_SESSION['user']->role_id == 2 && $project->status->id == 10) { ?> <!--2-->
            <form id="team<?= $x ?>" class="validationTeamForm mt-6 flex lg:text-lg [&>div]:grid [&>div]:place-content-center">
                <!-- refuser -->
                <p class="w-fit px-6 md:!flex gap-2  md:items-center hover:text-main-red cursor-pointer">
                    <p class=" hidden md:block font-extrabold"> <?= $project->promo->name ?> </p>
                </p>
                <!-- select promo -->
                <div class="grow">
                    <?php $promoRepository = new PromoRepository;
                    $apprenants = $promoRepository->getAllApprenants($project->promo->id);?>
                    <div data-dropdown-toggle="user-dropdown<?= $y ?>" class="text-center w-full cursor-pointer">Sélectionner les apprenants <i class="fa fa-chevron-down"></i></div>
                    <select id="user-dropdown<?= $y ?>" multiple class="hidden z-20 w-fit" name="team[]" id="">
                        <?php foreach ($apprenants as $apprenant) { ?>
                            <option value="<?= $apprenant->user_id ?>"><?= $apprenant->user_name ?> <?= $apprenant->user_surname ?></option>
                        <?php } ?>
                    </select>

                    <input type="hidden" name="projectId" value="<?= $project->id ?>"/>           
                </div>
                <!-- accepter -->
                <button type="submit" onclick="assignTeamToProject(<?= $y ?>, <?= $x ?>)" class="w-fit px-6 md:flex md:items-center gap-2 hover:text-main-red cursor-pointer">
                    <p  class="hidden md:block"> Accepter</p><i class="fa-solid fa-check"></i>
                </button>
            </form>
        <?php $y ++; // Compte le nombre de formulaire
            }  else if (isset($_SESSION['user']) && $_SESSION['user']->role_id == 3 && $project->status->id == 11) {?>
            <a type="submit" href="?action=reSubmitProject&id=<?= $project->id ?>" class="w-fit px-6 md:flex md:items-center mx-auto gap-2 hover:text-main-red cursor-pointer">
                <p class="hidden md:block">Soumettre à nouveau le projet</p><i class="fa-solid fa-check"></i>
            </a>
        <?php }  ?>
        <div class="w-4/5 h-1 border-b-2 my-12 mx-auto"></div>
    </article>