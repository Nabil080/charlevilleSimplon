<?php $tagsRepository = new TagRepository; ?>


<div class="grid grid-cols-auto flex-grow rounded-[5px] place-items-center justify-center items-center border-2 border-main-gray mx-auto min-w-[270px] max-w-[300px]">
    <div class="rounded-full bg-[url('<?= $formateur->user_avatar ?>')] flex place-items-center w-[130px] h-[130px] bg-main-lightred z-10 grayscale bg-cover bg-center">
        <!-- <img src="upload\promotion\devWeb2023\efz.png" class="w-[78px] z-20 mx-auto my-auto"> -->
    </div>
    <p class="text-[18px] font-main-title font-bold pt-4">
        <?php if (isset($formateur->user_surname)) {
            echo($formateur->user_surname);
        } else if(!isset($formateur->user_surname)) {
            echo("Prénom");
        }
        ?>
        <span class="uppercase">
            <?php if (isset($formateur->user_name)) {
                echo($formateur->user_name);
            } else if(!isset($formateur->user_name)) {
                echo("Nom");
            }
            ?>
        </span>
    </p>
    <div class="border-2 border-main-red w-full my-3"></div>
    <div class="flex overflow-x-scroll gap-3 px-4 min-w-[270px] max-w-[270px] sm:min-w-[295px] pb-4">
        <!-- MAXIMUM 6 TAG -->
        <?php $y = 0;
            $tags = $tagsRepository->getUserTags($formateur->user_id);

                if (isset($tags) && empty($tags)) { ?>
                    <p class="italic text-center text-[18px] text-main-red">Pas de compétence spécifiée</p>
                <?php } else if (isset($tags) && !empty($tags)) {
                    foreach ($tags as $tag) { ?>
                    <p class="text-main-white bg-main-gray px-4 py-1 text-base rounded-[50px]"><?= $tag->name ?></p>
                <?php $y++;
                        if ($y == 6) {
                            break;
                        }
        }} ?>
    </div>
    <button onclick="window.location.href = '?action=profilePage&id=<?=$formateur->user_id?>'"
    class="bg-main-red text-white text-[20px] font-bold font-main-title w-full py-4 self-end">Voir le
        profil</button>
</div>
            
            <!-------------Fin de la Card Formateur----------->