<?php $title = $errorTable['title'] ?>

<?php ob_start(); ?>

<main class="px-[5%] min-h-[74vh] justify-self-start ">
    <div class="flex flex-col md:flex-row justify-content absolute inset-x-0 inset-y-0 items-center">
        <div class="md:w-1/2">
            <img src="assets/img/autres/errorBig.png" alt="image d'erreur" class="hidden md:block img-fluid" />
            <img src="assets/img/autres/errorLittle.png" alt="image d'erreur" class="md:hidden img-fluid" />

        </div>
        <div class="md:w-1/2 flex flex-col items-center gap-5">
            <h2 class="font-title font-bold text-main-red text-[24px] md:text-[34px] lg:text-[48px]">
                <?= $errorTable['title'] ?>
            </h2>
            <p class="italic font-medium text-[18px]">Bad Request - La syntaxe de la requête est erronée.</p>
            <p class="text-[16px] md:text-[20px]">
                <?= $errorTable['message'] ?>
            </p>
        </div>
    </div>
</main>
<?php $content = ob_get_clean() ?>

<?php require 'view/layout.php' ?>