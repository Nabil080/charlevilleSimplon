<article id="project-1" class="">
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
                        <p class="font-title font-bold mr-2">Adresse :</p>
                        <p class="text-sm lg:!text-base xl:!text-lg pt-0.5 text-left font-light"><?=$project->company_adress?></p></div>
                </div>
            </div>
            <!-- partie info projet -->
            <div class="flex-col text-[12px] lg:text-base flex text-end md:w-full">
                <!-- tags projet -->
                <div class="uppercase space-x-4 my-4 [&>tag]:bg-main-gray [&>tag]:bg-opacity-10 [&>tag]:py-2 [&>tag]:px-4 [&>tag]:rounded-full">
                    <?php foreach($project->tags as $tag){ ?>
                        <tag><?=$tag->name?></tag>
                    <?php } ?>
                    <tag>React</tag>
                </div>
                <!-- titre projet -->
                <h2 class="font-title text-main-red italic font-bold text-3xl md:!text-[40px] lg:!text-[46px] my-2 lg:!my-6"><a href="lien du projet">Super projet de fou</a></h2>
                <div class="self-end flex w-3/4 justify-between italic border-b border-main-red">
                    <?php if(isset($project->start)){ ?><span>Débuté le <?=date('d-m-Y', strtotime($project->start))?></span><?php }
                    if(isset($project->end)){ ?><span>Fini le <?=date('d-m-Y', strtotime($project->end))?></span><?php } ?>
                </div>

                <!-- contenu projet -->
                <div class="text-base md:text-lg lg:text-xl flex-grow flex-col">
                    <p class="pl-[10%] line-clamp-5 lg:line-clamp-6 mt-2 mb-4"><?=$project->description?></p>
                    <div id="end" class="mt-auto lg:mt-8">
                        <a href="?action=promotionPage&id=<?= $project->promo->id ?>" class="bg-main-red py-2 px-4 rounded-full text-main-white my-2 hover:bg-main-white hover:text-main-red hover:border border-main-red">
                            <?=$project->promo->name?>
                        </a>
                        <div class="space-x-4 mt-4 mb-2 text-sm md:!text-base lg:!text-lg text-main-white [&>a]:bg-main-gray [&>a]:py-1 [&>a]:px-3 [&>a]:rounded-full">
                            <?php foreach($project->team as $user){ ?>
                                <a href="?action=profilePage&id=<?=$user->id?>" class="hover:border border-main-gray hover:text-main-gray hover:bg-main-white">
                                    <?=$user->surname?>
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
                    <p class="text-sm pt-0.5 text-left font-light"><?=$project->company_adress?></p>
                </div>
            </div>
        </div>
        <!-- boutons projet -->
        <form class="mt-6 flex lg:text-lg [&>div]:grid [&>div]:place-content-center">
            <!-- refuser -->
            <div class="w-fit px-6 md:!flex gap-2 md:items-center hover:text-main-red cursor-pointer" onclick="deleteProject('project-1')">
                <i class="fa-solid fa-xmark"></i><p class="hidden md:block"> Refuser </p>
            </div>
            <!-- select promo -->
            <div class="grow">
                <select class="w-full" name="promo" id="">
                    <option value="1">Développeurs Web et Web Mobile 2023</option><option value="2">Concepteurs développeurs d'application 2023</option>
                </select>
            </div>
            <!-- accepter -->
            <button type="submit" class="w-fit px-6 md:flex md:items-center gap-2 hover:text-main-red cursor-pointer" onclick="acceptProject('project-1')">
                <p class="hidden md:block"> Accepter</p><i class="fa-solid fa-check"></i>
            </button>
        </form>
        <div class="w-4/5 h-1 border-b-2 my-12 mx-auto"></div>
    </article>