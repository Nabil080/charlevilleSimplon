<article id="projet-card-1" class="project-card max-w-[400px] border-2 border-black rounded-lg p-4 2xl:flex gap-6 2xl:p-6">
    <!-- partie info projet -->
    <div class="flex-col text-[12px] flex">
        <!-- titre projet -->
        <h2 class="font-title text-main-red italic font-bold text-3xl my-2"><a href="?action=projectPage&id=<?=$project->id?>"><?=$project->name?></a></h2>
        <div class=" flex w-full justify-between italic border-b border-main-red"><?php if(isset($project->start)){ ?><span>Débuté le <?=date('d-m-Y', strtotime($project->start))?></span><?php }
                    if(isset($project->end)){ ?><span>Fini le <?=date('d-m-Y', strtotime($project->end))?></span><?php } ?></div>
        <!-- contenu projet -->
        <div class="text-base flex-grow flex-col">
            <p class="pl-[20%] line-clamp-5 mt-4 mb-4 text-[14px] font-medium text-end"><?=$project->description?></p>
            <div class="my-2 grow"><img class="w-2/3 flex mx-auto" src="<?=$project->model_image?>" alt="image du projet"></div>
            <div id="end" class="mt-auto">
                <!-- tags projet -->
                <div class="uppercase space-x-4 my-4 [&>tag]:bg-main-gray [&>tag]:bg-opacity-10 [&>tag]:py-2 [&>tag]:px-4 [&>tag]:rounded-full flex justify-around">
                <?php foreach($project->tags as $tag){ ?>
                        <tag><?=$tag->name?></tag>
                    <?php } ?>
                    <tag> react</tag>
                </div>
            </div>
        </div>
        <a href=" https://wikipedia.com" class="bg-main-red py-2 px-4 rounded-full text-main-white text-center text-[16px] mx-auto my-2 hover:bg-main-white hover:text-main-red hover:border border-main-red">Voir le projet </a>
        <!-- Boutons modifier/supprimer le projet -->
        <div class="flex justify-between">
            <div class="flex items-center pt-2">
                <i class="fa-solid fa-pen fa-xl text-main-red "></i>
                <span class="hidden lg:block text-[10px] text-main-red">Modifier</span>
            </div>
            <a href="?action=deleteProject&id=<?=$project->id?>" class="flex items-center pt-2 cursor-pointer">
                <i class="fa-solid fa-trash-can fa-xl text-main-red "></i>
                <span class="hidden lg:block text-[10px] text-main-red">Supprimer</span>
            </a>
        </div>
    </div>
</article>