<?php $title = "Tout les promotions"; ?>

<?php ob_start(); ?>
<main class="px-[5%] min-h-screen">
    <h2 class="pb-10 text-main-red text-[24px] md:text-[48px] font-bold text-center">Nos promotions</h2>
    <div class="pb-10 flex justify-evenly gap-5">
        <button class="w-1/2 md:w-[320px] px-5 py-3 bg-main-red text-white font-bold rounded-[10px]">Promotion
            Actuelle</button>
        <select
            class="w-1/2 md:w-[320px] text-main-red text-center border border-4 border-main-red rounded-[10px] font-bold">
            <option selected value="promotion_2023">Promotion 2023</option>
            <option value="promotion_2022">Promotion 2022</option>
            <option value="promotion_2021">Promotion 2021</option>
            <option value="promotion_2020">Promotion 2020</option>
            <option value="promotion_2019">Promotion 2019</option>
        </select>
    </div>
    <div class="flex flex-wrap gap-5 justify-center">
        <?php foreach ($promos as $promo) {
                include('view/template/_promotion_card.php');
        } ?>
    </div>
</main>
<?php $content = ob_get_clean(); ?>


<?php ob_start(); ?>
<script src="assets/js/promotion.js"></script>
<?php $script = ob_get_clean(); ?>

<?php require 'view/layout.php'; ?>