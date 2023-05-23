<?php $title = "Ajout de projet"; ?>

<?php ob_start(); ?>
<main class="pb-10 px-[5%] xl:px-[15%]">
    <h2 class="pb-5 font-title text-main-red text-center font-bold uppercase text-[24px] md:text-[48px]">Ajout de projet
    </h2>
    <div class="md:flex justify-evenly items-center gap-10">
        <div class="w-1/2 hidden md:block">
            <img src="assets/img/autres/projet.jpg" alt="image de décoration" class="img-fluid" />
        </div>
        <div class="md:w-1/2">
            <form class="flex flex-col items-center gap-6">
                <h3 class="font-title text-main-red font-bold text-[20px] md:text-[24px]">${Nom d'entreprise}</h3>
                <input type="hidden" namle="name_campany" value="$" /> <!-- Variable à mettre -->
                <div class="w-full md:w-2/3">
                    <label for="name_project" class="block mb-2 text-[16px] font-medium">Nom du projet</label>
                    <input type="text" id="name_project" name="name_project" placeholder="Votre nom de projet"
                        class="bg-main-white border border-main-red text-[18px] rounded-[5px] block w-full p-2.5">
                </div>
                <div class="w-full md:w-2/3">
                    <label for="specifications" class="block mb-2 text-[14px] font-medium">Cahier des charges</label>
                    <input type="file" id="specifications" name="specifications"
                        placeholder="Envoie de cahier des charges"
                        class="file:bg-main-red border border-main-red text-[18px] rounded-[5px] block w-full">
                    <p class="mt-1 text-sm text-gray-500" id="specifications">Fichier en PDF</p>

                </div>
                <div class="w-full md:w-2/3">
                    <label for="description" class="block mb-2 text-[14px] font-medium">Cahier des charges</label>
                    <textarea rows="4" id="description" name="description"
                        placeholder="Votre informations suplémentaire ou description."
                        class="bg-main-white border border-main-red text-[18px] rounded-[5px] block w-full p-2.5"></textarea>
                </div>
                <div class="w-full md:w-2/3">
                    <label for="img_campany" class="block mb-2 text-[14px] font-medium">Image/Logo d'entreprise</label>
                    <input type="file" id="img_campany" name="img_campany" placeholder="Votre image/logo d'entreprise"
                        class="bg-main-white border border-main-red text-[18px] rounded-[5px] block w-full">
                </div>
                <div class="w-full md:w-2/3">
                    <label for="link_campany" class="block mb-2 text-[14px] font-medium">Lien vers vers votre
                        entreprise</label>
                    <input type="text" id="link_campany" name="link_campany" placeholder="Votre lien"
                        class="bg-main-white border border-main-red text-[18px] rounded-[5px] block w-full p-2.5">
                </div>
                <div class="">
                    <button type=" submit"
                        class="px-10 py-3 text-main-white font-bold text-lg uppercase bg-main-red rounded-[5px]">
                        Déposer un projet
                    </button>
                </div>
            </form>
        </div>
    </div>

</main>
<?php
$content = ob_get_clean();
require 'view/layout.php';