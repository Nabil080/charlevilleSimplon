<nav>
    <div class="grid grid-cols-2 items-center bg-main-white border-t-[4px] border-main-red">
        <img src="assets/img/navbar/logo-simplon.png" alt="Logo Simplon" class="w-[171px]" />
        <i onclick="changeNavFunction()" class="fa-solid fa-bars text-[39px] justify-self-end mr-4 mb-1"></i>
        <i onclick="changeNavFunction()" class="fa-solid fa-xmark text-[39px] justify-self-end mr-4 mb-1 hidden"  style="color: #da373d;"></i>
        <div class="changeNav hidden col-start-1 col-end-3 grid grid-cols-[25%_75%] w-3/8 ml-[10vw] items-center  gap-8">
                <i class="fa-solid fa-file-lines text-[44px] justify-self-center"  style="color: #da373d;"></i>
                <p class="text-[24px]">Formations</p>
            <i class="fa-solid fa-users text-[44px] justify-self-center" style="color: #da373d;"></i>
                <p class="text-[24px]">Promotions</p>

            <i class="fa-solid fa-book text-[44px] justify-self-center"  style="color: #da373d;"></i>
                <p class="text-[24px]">Projets</p>

            <i class="fa-solid fa-user text-[44px] justify-self-center"  style="color: #da373d;"></i>
                <p class="text-[24px]">Compte</p>
        </div>
    </div>
</nav>

<?php ob_start(); ?>
<script src="assets/js/nav.js"></script>
<?php $script .= ob_get_clean(); ?>