<?php $title = "Toutes les promotions"; 
    $PromoRepository = new PromoRepository;
    $promos = $PromoRepository->getPromos();?>

<?php ob_start(); 
        ?>

<main class="px-[5%] pb-5">
    <h2 class="pb-10 text-main-red text-[24px] md:text-[48px] font-bold text-center">Nos promotions</h2>
    <div class="pb-10 flex flex-col md:flex-row items-center md:justify-evenly gap-5">
        <button id="actualPromotion" class="w-1/2 md:w-[320px] px-5 py-3 bg-main-red text-white font-bold rounded-[10px]">Promotions
            Actuelles</button>
        <div id="year-dropdown" class="dropdown-toggle w-1/2 md:w-1/4 border-main-red border rounded-t-lg rounded-b-lg relative">
            <button onclick="toggleDropdown('year-dropdown')" class="relative w-full py-2"><i class="fa fa-filter text-xs"></i> Précédentes promotions</button>
        <!-- dropdown yearss -->
            <div class="filter-dropdown dropdown hidden absolute box-content -translate-x-[1px] z-10 w-full sm:w-full -translate-y-1 border rounded-b-lg text-start bg-main-white border-t-transparent border-main-red">
                <?php $promoYears = [];
                foreach($promos as $promo){
                    if (!in_array($promo->year, $promoYears)) {?>
                    <div class="flex gap-2 text-xs my-2 px-2"><input class="my-auto" id="<?=$promo->year?>" type="checkbox" value="<?=$promo->year?>"><label for="<?=$promo->year?>"><?=$promo->year?></label></div>
                <?php }
                 array_push($promoYears, $promo->year); 
                } ?>
            </div>
        </div>

    </div>
    <div id="promo-cards" class="flex flex-wrap gap-5 md:gap-12 justify-center">
        <?php foreach ($promos as $promo) {
                include('view/template/_promotion_card.php');
        } ?>
    </div>
</main>
<?php $content = ob_get_clean(); ?>


<?php ob_start(); ?>
<script src="assets/js/all_promo.js"></script>
<?php $script = ob_get_clean(); ?>

<?php require 'view/layout.php'; ?>