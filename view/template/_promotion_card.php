<div class="rounded-[5px] border border-main-border min-w-[330px] md:w-[470px] pb-4">
    <?php $image = $PromoRepository->getPromoImage($promo->formation_id); ?>
    <div role="image" class="bg-cover bg-center  h-[140px] md:h-[200px] w-full" style= "background-image: url(<?= $image ?>)" aria-label="image">
        <!-- <img class="" src="<?= $formation->image ?>" alt="Formation"> -->
    </div>
    <h3 class="text-main-red font-title text-[20px] pl-3 mt-3 md:pb-4 text-center flex items-center justify-center md:text-[36px] md:min-h-[120px]"><?= $promo->name; ?></h3>

    <div class="flex flex-wrap justify-around gap-3 pb-6 pt-2">
        <?php if ($promo->status->id == 12 || $promo->status->id == 13) {?>
        <a href="?action=promotionPage&id=<?= $promo->id; ?>"
            class="border border-4 border-main-red rounded-[5px] text-main-red font-medium flex items-center justify-center text-[14px] font-main w-[90%] py-2 px-2">Voir tous les élèves de la promo</a>
            <?php } elseif ($promo->status->id == 14) {?>
                <a href="?action=promotionPage&id=<?= $promo->id;?>"
                    class="border border-4 border-main-red bg-main-red rounded-[5px] text-main-white font-medium flex items-center justify-center text-[14px] font-main w-[90%] py-2 px-2">Postuler à la formation</a>
            <?php } ?>
            <?php if ($promo->status->id == 12 || $promo->status->id == 13) {?>
        <a href="?action=promotionPage&id=<?= $promo->id; ?>&project=1"
            class="bg-main-red rounded-[5px] text-main-white font-medium flex items-center justify-center text-[14px] font-main w-2/5 py-2 px-2">Projets
            réalisés</a>
            <?php } elseif ($promo->status->id == 14) {?>
                <a href="?action=promotionPage&id=<?= $promo->id; ?>&project=1"
            class="bg-main-gray rounded-[5px] text-main-white font-medium flex items-center justify-center text-[14px] font-main w-2/5 py-2 px-2 pointer-events-none">Projets
            réalisés</a>
            <?php } ?>
        <a href="?action=formationPage&id=<?= $promo->formation_id; ?>"
            class="bg-main-red rounded-[5px] text-main-white font-medium flex items-center justify-center text-[14px] font-main w-2/5 py-2 px-3">En
            savoir plus</a>
    </div>
    <div class="flex justify-center items-center">
        <p class="pb-2 text-[16px] text-center italic"><?= $promo->status->name ?>
        <?php if ($promo->status->id == 12 || $promo->status->id == 14){?> <?= $promo->start; ?>
        <?php } elseif($promo->status->id == 13) { ?> <?= $promo->end; ?> <?php } ?></p>
        
        <?php if ($promo->status->id == 12) { ?>
            <span class="w-4 h-4 border-[1px] bg-main-orange rounded-full ml-2 mb-2 animate-pulse"></span>
        <?php } elseif ($promo->status->id == 14) { ?>
        <span class="w-4 h-4 border-[1px] bg-main-green rounded-full ml-2 mb-2 animate-pulse"></span>
        <?php } elseif ($promo->status->id == 13) { ?>
        <span class="w-4 h-4 border-[1px] bg-main-red rounded-full ml-2 mb-2 animate-pulse"></span>
        <?php }?>
        <div class="hidden" year-filter="<?=$promo->year?>"></div>
    </div>
</div>
