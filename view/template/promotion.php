<?php $title = "Connexion"; ?>

<?php ob_start(); ?>

<main>
    <section> <!-------------Titre----------->
        <h2 class="text-center text-[24px] md:text-4xl font-bold font-title text-main-red uppercase pb-2">Développeur Web
            et Web Mobile
        </h2>
        <p class="text-center text-[24px] md:text-4xl font-title text-main-red pb-8">Janvier 2023-Septembre 2023
        </p>
    </section>
    <section>   <!-------------TAB----------->
        <div class="flex w-full">
            <div onclick="changeTab(0)" class="tabChange transition-all duration-[0.4s] bg-main-red w-1/2 text-center text-main-white font-title text-[20px] font-bold py-5">
                <p>Promotions</p>
            </div>
            <div onclick="changeTab(1)" class="tabChange transition-all duration-[0.4s] bg-main-gray w-1/2 text-center text-main-white font-title text-[20px] font-bold py-5">
                <p>Projets</p>
            </div>
        </div>
    </section>
    <section class="sectionChange"> <!-------------PROMOTIONS----------->
        <div class="grid w-5/6 gap-8 justify-center mx-auto"> <!------Formateurs------->
            <h3 class="text-center font-main-title text-[22px] font-bold mt-4">Formateurs</h3>
            <!-----Card Formateur------->
            <div class="grid grid-cols-auto rounded-[5px] place-items-center justify-center items-center border-2 border-main-gray mx-auto">
                <div class="rounded-full flex place-items-center w-[130px] h-[130px] bg-main-lightred grayscale z-10">
                    <img src="upload\promotion\devWeb2023\efz.png" class="w-[78px] z-20 grayscale mx-auto my-auto">
                </div>
                <p class="text-[18px] font-main-title font-bold pt-4">Steven <span class="uppercase">Blombou</span></p>
                <div class="border-2 border-main-red w-full mt-1"></div>
                <p class="text-main-white bg-main-gray px-4 py-1 text-[10px] rounded-[50px] mt-4 mb-4">Développeur Web et Web mobile</p>
                <div class="flex gap-3 px-4">
                    <p class="text-main-white bg-main-gray px-4 py-1 text-[10px] rounded-[50px] mb-4">PHP</p>
                    <p class="text-main-white bg-main-gray px-4 py-1 text-[10px] rounded-[50px] mb-4">Symfony</p>
                    <p class="text-main-white bg-main-gray px-4 py-1 text-[10px] rounded-[50px] mb-4">HTML</p>
                    <p class="text-main-white bg-main-gray px-4 py-1 text-[10px] rounded-[50px] mb-4">CSS</p>                
                </div>
                <button class="bg-main-red text-white text-[20px] font-bold font-main-title w-full py-4">Voir le profil</button>
            </div>
            <!-----Card Formateur------->
            <div class="grid grid-cols-auto rounded-[5px] place-items-center justify-center items-center border-2 border-main-gray mx-auto">
                <div class="rounded-full flex place-items-center w-[130px] h-[130px] bg-main-lightred grayscale z-10">
                    <img src="upload\promotion\devWeb2023\efz.png" class="w-[78px] z-20 grayscale mx-auto my-auto">
                </div>
                <p class="text-[18px] font-main-title font-bold pt-4">Steven <span class="uppercase">Blombou</span></p>
                <div class="border-2 border-main-red w-full mt-1"></div>
                <p class="text-main-white bg-main-gray px-4 py-1 text-[10px] rounded-[50px] mt-4 mb-4">Développeur Web et Web mobile</p>
                <div class="flex gap-3 px-4">
                    <p class="text-main-white bg-main-gray px-4 py-1 text-[10px] rounded-[50px] mb-4">PHP</p>
                    <p class="text-main-white bg-main-gray px-4 py-1 text-[10px] rounded-[50px] mb-4">Symfony</p>
                    <p class="text-main-white bg-main-gray px-4 py-1 text-[10px] rounded-[50px] mb-4">HTML</p>
                    <p class="text-main-white bg-main-gray px-4 py-1 text-[10px] rounded-[50px] mb-4">CSS</p>                
                </div>
                <button class="bg-main-red text-white text-[20px] font-bold font-main-title w-full py-4">Voir le profil</button>
            </div>
        </div>
        <div class="grid w-11/12 gap-8 justify-center mx-auto"> <!------Apprenants------->
            <h3 class="text-center font-main-title text-[22px] font-bold mt-4">Apprenants</h3>
            <!-----Card Apprenants------->
            <div class="grid grid-cols-[70%_30%] relative w-[100%]">
                <div class="w-11/12 mx-auto border-2">
                    <p class="text-[18px] font-main-title text-left font-bold pt-4">Steven <span class="uppercase">Blombou</span></p>
                    <div class="border-2 border-main-red text-left w-full mt-1"></div>
                    <p class="text-[12px]"><i class="fa-solid fa-circle text-green-500 animate-pulse duration-[2s] mr-1"></i>En alternance depuis janvier 2023</p>
                    <div class="flex gap-3 px-4">
                        <p class="bg-[#F2F2F3] px-4 py-1 text-[10px] rounded-[50px] mb-4">PHP</p>
                        <p class="bg-[#F2F2F3] px-4 py-1 text-[10px] rounded-[50px] mb-4">HTML</p>
                        <p class="bg-[#F2F2F3] px-4 py-1 text-[10px] rounded-[50px] mb-4">CSS</p>  
                    </div>
                <button class="bg-main-red text-white text-[20px] font-bold font-main-title w-full py-4">Voir le profil</button>

                </div>
                <img src="upload/promotion/devWeb2023/profil.jpg" class="right-0 w-[134px] h-[172px] aspect-square">
            </div>
        </div>
    </section>
    <section class="sectionChange hidden"> <!-------------PROJETS----------->
        projets
    </section>
</main>



<?php $content = ob_get_clean(); ?>



<?php ob_start(); ?>
<script src="assets/js/promotion.js"></script>
<?php $script = ob_get_clean(); ?>

<?php require 'view/layout.php'; ?>