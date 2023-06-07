        <!-- card projet 1 -->
        <article id="projet-card-1"
            class="project-card max-w-[766px] border-2 border-black rounded-lg p-4 mb-8 md:flex gap-6 md:p-6 md:mx-auto">
            <!-- partie entreprise desktop -->
            <div class="hidden md:block w-1/3 border-r-2 border-main-gray pr-6">
                <div class="my-2 flex-col">
                    <div class="flex flex-wrap">
                        <p class="font-title font-bold mr-2">Projet fourni par : </p>
                        <p><a href="<?=$project->company_link?>" target="_blank" class="text-main-red underline font-bold text-sm"><?=$project->company_name?></a></p>
                    </div>
                    <div class="my-4 grow"><img class="" src="<?=$project->company_image?>" alt="logo de l'entreprise"></div>
                    <div class="flex flex-wrap">
                        <p class="font-title font-bold mr-2">Adresse :</p>
                        <p class="text-sm pt-0.5 text-left font-light"><?=$project->company_adress?></p>
                    </div>
                </div>
            </div>
            <!-- partie info projet -->
            <div class="flex-col text-[12px] flex text-end md:w-2/3">
                <!-- tags projet -->
                <div
                    class="uppercase space-x-4 my-4 [&>tag]:bg-main-gray [&>tag]:bg-opacity-10 [&>tag]:py-2 [&>tag]:px-4 [&>tag]:rounded-full">
                    <?php foreach($project->tags as $tag){ ?>
                        <tag><?=$tag->name?></tag>
                    <?php } ?>
                </div>
                <!-- titre projet -->
                <h2 class="font-title text-main-red italic font-bold text-3xl my-2"><a href="?action=projectPage&id=<?=$project->id?>"><?=$project->name?></a></h2>
                <div class="self-end flex w-3/4 justify-between italic border-b border-main-red">
                    <?php if(isset($project->start)){ ?><span>Débuté le <?=date('d-m-Y', strtotime($project->start))?></span><?php }
                    if(isset($project->end)){ ?><span>Fini le <?=date('d-m-Y', strtotime($project->end))?></span><?php } ?>
                </div>
                <!-- contenu projet -->
                <div class="text-base flex-grow flex-col">
                    <div class="pl-[20%] line-clamp-4 mt-2 mb-4"><?=$project->description?></div>
                    <div id="end" class="mt-auto">
                        <?php if(isset($project->promo)){?>
                        <a href="?action=promotionPage&id=<?= $project->promo->id ?>"
                            class="bg-main-red py-2 px-4 rounded-full text-main-white my-2 hover:bg-main-white hover:text-main-red hover:border border-main-red">
                            <?=$project->promo->name?>
                        </a>
                        <?php } ?>
                        <div
                            class="space-x-4 mt-4 mb-2 text-sm text-main-white [&>a]:bg-main-gray [&>a]:py-1 [&>a]:px-3 [&>a]:rounded-full">
                            <?php 
                            if(isset($project->team) && !empty($project->team)){
                            foreach($project->team as $teamUser){ ?>
                                <a href="?action=profilePage&id=<?=$teamUser->user_id?>" class="hover:border border-main-gray hover:text-main-gray hover:bg-main-white">
                                    <?=$teamUser->user_surname?>
                                </a>
                            <?php }
                            } ?>
                        </div>
                        <a href="?action=projectPage&id=<?=$project->id?>" class="block float-left text-xs">
                        Voir le projet <i class="fa fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>
            <!-- séparateur mobile-->
            <div class="md:hidden w-4/5 mx-auto bg-main-gray bg-opacity-50 h-0.5 my-4"></div>
            <!-- partie info entreprise mobile-->
            <div class="md:hidden my-2">
                <div class="flex flex-wrap">
                    <p class="font-title font-bold mr-2">Projet fourni par : </p>
                    <p><a href="<?=$project->company_link?>" class="text-main-red underline font-bold text-sm"><?=$project->company_name?></a></p>
                </div>
                <div class="flex flex-wrap">
                    <p class="font-title font-bold mr-2">Adresse :</p>
                    <p class="text-sm pt-0.5 text-left font-light"><?=$project->company_adress?></p>
                </div>
            </div>

        </article>
