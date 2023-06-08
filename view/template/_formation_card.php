<!-- Card formation -->
<div class="card_formation flex flex-col max-w-[445px] rounded-[5px] border-[1px] m-3 border-main-border md:w-2/5">

    <div class="bg-cover bg-center  h-[180px] md:h-[200px] w-full" style= "background-image: url(<?= $formation->image ?>)">
        <!-- <img class="" src="<?= $formation->image ?>" alt="Formation"> -->
    </div>

    <h3 class="text-main-red font-title font-semibold h-auto text-lg pl-3 mt-3 text-center md:text-2xl xl:text-3xl">
        <?= $formation->name; ?>
    </h3>
    <h4 class="text-main-gray font-main text-sm  italic pl-3 text-center">
        <?= $formation->level; ?> / <?= $formation->diploma; ?>
    </h4>
    <div class="hidden md:flex flex-col flex-grow px-8 py-4 text-[16px]">
        
        <h5 class="text-main-red font-main pb-2 font-semibold">Le métier de <span class="italic"><?= $formation->name; ?></span> s’articule
            autour de plusieurs activités principales :</h5>
        <ul class="space-y-2 list-disc pl-4">
            <?= $formation->preview ;?>
        </ul>
    </div>
    <div class="formation_status flex justify-center items-center">
        <h5 class="text-main-gray font-main text-sm md:text-[16px] italic text-center my-3">
            <?= $formation->status->name; ?>
            <?php if ($formation->status->id == 12 || $formation->status->id == 14) { ?>
                <?php $start = $promoRepository->getPromoStartByFormationID($formation->id); echo $start; ?>
            <?php } elseif($formation->status->id == 13) { ?>
                <?php $end = $promoRepository->getPromoEndByFormationID($formation->id); echo $end; ?>
            <?php } ?>
            </h5>
        <span class="w-4 h-4 border-[1px] bg-main-green rounded-full ml-2 animate-pulse"></span>
    </div>
    <div class="card_buttons flex  justify-around pb-6 pt-2">
        <a href="index.php?action=formationPage&id=<?= $formation->id; ?>"
            class="bg-main-red rounded-[5px] min-h-[58px] text-main-white border border-main-white hover:bg-main-white hover:text-main-red hover:border-main-red  text-center font-medium flex items-center justify-center text-sm font-main w-1/3 py-2 px-3">En
            savoir plus</a>
        <?php if ($formation->status->id == 14 ) {?>
            <a href="index.php?action=registerPage&id=<?=$formation->id?>"
                class="bg-main-red rounded-[5px] min-h-[58px] text-main-white border border-main-white hover:bg-main-white hover:text-main-red hover:border-main-red  text-center font-medium flex items-center justify-center text-sm font-main w-1/3 py-2 px-2">Postuler
                à la formation
            </a>
        <?php } else if ($formation->status->id == 13) { ?>
            <a href="#"
                class="bg-green-700 rounded-[5px] min-h-[58px] cursor-default text-main-white border  text-center font-medium flex items-center justify-center text-sm font-main w-1/3 py-2 px-2">
                Prochaine session bientôt
            </a>
        <?php } else if ($formation->status->id == 12) { ?>
            <a href="#"
                class="bg-main-gray rounded-[5px] min-h-[58px] cursor-default text-main-white border  text-center font-medium flex items-center justify-center text-sm font-main w-1/3 py-2 px-2">
                Session en cours
            </a>
        <?php } ?>
    </div>
</div>
<!-- Fin de la card formation -->