<div class="rounded-[5px] border border-main-border min-w-[330px] md:w-[400px]">
    <img class="max-h-[140px] md:max-h-[200px] w-full" src="assets/img/formations/devweb" alt="Formation">
    <h3 class="text-main-red font-title text-[20px] pl-3 mt-3 md:pb-4 text-center md:text-[36px]"><?= $promo->name; ?></h3>

    <div class="flex flex-wrap justify-around gap-3 pb-6 pt-2">
        <a href="?action=promotionPage&id=<?= $promo->id; ?>"
            class="border border-4 border-main-red rounded-[5px] text-main-red font-medium flex items-center justify-center text-[14px] font-main w-[90%] py-2 px-2">Voir
            tous les élèves de la promo</a>
        <a href="?action=promotionPage&id=<?= $promo->id; ?>&project=1"
            class="bg-main-red rounded-[5px] text-main-white font-medium flex items-center justify-center text-[14px] font-main w-2/5 py-2 px-2">Projets
            réalisés</a>
        <a href="?action=formationPage&id=<?= $promo->formation_id; ?>"
            class="bg-main-red rounded-[5px] text-main-white font-medium flex items-center justify-center text-[14px] font-main w-2/5 py-2 px-3">En
            savoir plus</a>
    </div>
    <div class="flex justify-center items-center">
        <p class="pb-2 text-[16px] text-center italic"><?= $promo->status->name ?> le <?= $promo->end; ?></p>
        <span class="w-4 h-4 border-[1px] bg-main-green rounded-full ml-2 mb-2 animate-pulse"></span>
        <div class="hidden" year-filter="<?=$promo->year?>"></div>
    </div>
</div>
