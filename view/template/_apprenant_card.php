<?php
$projectRepo = new ProjectRepository;
$tagsRepository = new TagRepository;


if(isset($formators)){
    $formateurs = $formators;
}

?>


<div id="home" class="grid place-items-center overflow-hidden border-4 max-w-[400px] justify-self-center mx-auto sm:w-auto sm:max-w-full">
    <div class="wrapper relative grid grid-rows-[50%_50%] max-h-[520px] min-[400px]:grid-rows-[55%_45%]  min-[400px]:max-h-[700px] grid-cols-1 sm:gap-0 sm:h-[350px] sm:grid-cols-[6fr_4fr] sm:grid-rows-1 sm:aspect-[16/9]">
        <div class="sm:hidden mx-auto overflow-hidden object-fill">
            <img class="max-w-full h-auto grayscale"
            src="<?php if (isset($apprenant->user_avatar)) {
                echo ($apprenant->user_avatar);
            } else if (!isset($apprenant->user_avatar)) {
                echo ("https://images.unsplash.com/photo-1580707578919-892eb22db615?ixid=MnwxMjA3fDB8MHxzZWFyY2h8MTV8fG1hbiUyMHBvcnRyYWl0fGVufDB8fDB8fA%3D%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=400&q=60");
            }
            ?>"
            alt="">
        </div>
        <div class="content-splitter pt-4 sm:pt-4 flex flex-col gap-4">
            <div class="left flex flex-col flex-grow gap-4 px-4 w-[minmax(80px,80%)]">
                <p class="text-[22px] md:text-[24px] text-center sm:text-left  font-main-title font-bold leading-1 inline">
                    <?php if (isset($apprenant->user_surname)) { 
                        echo($apprenant->user_surname);
                    } else if(!isset($apprenant->user_surname)) {
                        echo("Prénom");
                    }
                    ?>
                    <span class="uppercase"> 
                        <?php if (isset($apprenant->user_name)) { 
                            echo($apprenant->user_name);
                        } else if(!isset($apprenant->user_name)) {
                            echo("Nom");
                        }
                        ?>
                    </span>
                </p>
                <div class=" mx-auto border-2 -mt-2 border-main-red text-left w-10/12 "></div>
                <p class="text-[20px] md:text-[18px] text-center sm:text-left  sm:whitespace-nowrap">

                    <i class="fa-solid fa-circle 
                    <?php if (isset($apprenant->user_status_id) && $apprenant->user_status_id < 6) { 
                        echo("text-red-500"); 
                    } 
                    else if (isset($apprenant->user_status_id) && $apprenant->user_status_id >= 6) {
                        echo("text-green-500");
                    }?>
                     animate-pulse duration-[2s] mr-1"></i>
                    <?= $apprenant->user_status; ?> depuis
                    <?= substr($apprenant->user_status_date, 0, 4); ?>
                </p>
                <div class="flex gap-1 justify-center sm:justify-normal mx-auto sm:gap-1">
                    <?php $y = 0;
                $tags = $tagsRepository->getUserTags($apprenant->user_id);
                    if (isset($tags) && empty($tags)) { ?>
                        <p class="italic text-center text-[18px] text-main-red">Pas de compétence spécifiée</p>
                    <?php } else if (isset($tags) && !empty($tags)) {
                        foreach ($tags as $tag) { ?>
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
                        $projects = $projectRepo->getUserProjects($apprenant->user_id);

                        if (isset($projects) && empty($projects)) { ?>
                                <p class="italic text-[18px] text-main-red">Pas de projet pour le moment</p>
                            <?php } else if (isset($projects) && !empty($projects)) {
                                foreach ($projects as $project) {
                                    ?>
                                    <a href="?action=projectPage&id=<?= $project->id ?>">
                                        <p class="bg-main-gray text-main-white px-4 py-1 text-[14px] rounded-[50px]"><?php echo strlen($project->name) > 14 ? substr($project->name, 0, 14) . ".." : $project->name;?></p>
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

            <button class="clipper2 h-[25%] sm:h-[25%] xl:h-[20%] bg-main-red block text-white z-10 relative text-[20px] text-[22px] font-bold font-main-title w-full"><a href="?action=profilePage&id=<?= $apprenant->user_id ?>">Voir le profil</a></button>

        </div>
        <div class="hidden clipper sm:flex w-full z-10 bg-center bg-cover grayscale" 
        style="background-image: url(
        <?php if (isset($apprenant->user_avatar)) {
                echo ($apprenant->user_avatar);
            } else if (!isset($apprenant->user_avatar)) {
                echo ("https://images.unsplash.com/photo-1580707578919-892eb22db615?ixid=MnwxMjA3fDB8MHxzZWFyY2h8MTV8fG1hbiUyMHBvcnRyYWl0fGVufDB8fDB8fA%3D%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=400&q=60");
            }
        ?> 
            );">
            <!-- <img class="flex-grow grayscale" src="https://images.unsplash.com/photo-1580707578919-892eb22db615?ixid=MnwxMjA3fDB8MHxzZWFyY2h8MTV8fG1hbiUyMHBvcnRyYWl0fGVufDB8fDB8fA%3D%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=400&q=60" alt=""> -->
        </div>
    </div>
</div>
            <!-------------Fin de la Card Apprenants----------->