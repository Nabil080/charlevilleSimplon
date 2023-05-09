<?php $title = ""; ?>

<?php ob_start(); ?>

<!-- header -->
<section class="text-center [&_h5]:italic [&_h5]:my-2">
    <h1 class="font-title text-2xl font-semibold text-main-red uppercase">Super projet de zinzin</h1>
    <div>
        <h5>Réalisé par :</h5>
        <div class="flex flex-wrap justify-center gap-2 text-sm text-main-white [&>a]:bg-main-gray [&>a]:py-0.5 [&>a]:px-3 [&>a]:rounded-full">
            <a href="profil de l'apprenant" class="hover:border border-main-gray hover:text-main-gray hover:bg-main-white">Nabil</a>
            <a href="profil de l'apprenant" class="hover:border border-main-gray hover:text-main-gray hover:bg-main-white">Alexandre</a>
            <a href="profil de l'apprenant" class="hover:border border-main-gray hover:text-main-gray hover:bg-main-white">Florian</a>
            <a href="profil de l'apprenant" class="hover:border border-main-gray hover:text-main-gray hover:bg-main-white">Bryan</a>
        </div>
    </div>
    <div>
        <h5>Supervisé par :</h5>
        <div class="flex flex-wrap justify-center gap-2 text-sm text-main-white [&>a]:bg-main-gray [&>a]:py-0.5 [&>a]:px-3 [&>a]:rounded-full">
            <a href="profil de l'apprenant" class="hover:border border-main-gray hover:text-main-gray hover:bg-main-white">Axel</a>
            <a href="profil de l'apprenant" class="hover:border border-main-gray hover:text-main-gray hover:bg-main-white">Steven</a>
        </div>
    </div>
</section>

<!-- aperçu projet -->
<section class="text-center mx-4">
    <!-- maquette -->
    <div class=""><div class="font-title text-xl font-bold my-4 underline w-full"><a href="lien de la maquette">Maquette/Wireframe</a></div>
        <div class="w-full max-h-[200px] overflow-scroll"><img class="w-full" src="assets/img/maquette" alt="maquette du projet"></div>
    </div>
    <!-- avancement -->
    <div class=""><div class="font-title text-xl font-bold my-4">Avancement du projet</div>
        <!-- avancement 1 -->
        <div class="mb-1 text-start italic">Cahier des charges</div>
        <div class="w-full bg-gray-200 rounded-full h-2.5 mb-4  ">
            <div class="bg-green-600 h-2.5 rounded-full" style="width: 100%"></div>
        </div>
        <!-- avancement 2 -->
        <div class="mb-1 text-start italic">Développement front</div>
        <div class="w-full bg-gray-200 rounded-full h-2.5 mb-4  ">
            <div class="bg-yellow-400 h-2.5 rounded-full" style="width: 60%"></div>
        </div>
        <!-- avancement 3 -->
        <div class="mb-1 text-start italic">Non défini</div>
        <div class="w-full bg-gray-200 rounded-full h-2.5 mb-4  ">
            <div class="bg-red-main h-2.5 rounded-full" style="width: 45%"></div>
        </div>
    </div>
</section>

<!-- boutons liens externes -->
<section class="my-12    [&_i]:text-[40px] [&_i]:w-10 [&_i]:text-center">
    <!-- bouton 1 -->
    <div class="flex mx-4 my-4 gap-4 h-max">
        <i class="fa-brands fa-github"></i>
        <a href="github externe" target="_blank" class="text-main-white bg-main-red grow h-[40px] flex items-center justify-center">Voir le github du projet</a>
    </div>
    <!-- bouton 2 -->
    <div class="flex mx-4 my-4 gap-4 h-max">
        <i class="fa-solid fa-file-pdf"></i>
        <a href="cahier des charges pdf" download class="text-main-white bg-main-red grow h-[40px] flex items-center justify-center">Télécharger le cahier des charges</a>
    </div>
    <!-- bouton 3 -->
    <div class="flex mx-4 my-4 gap-4 h-max">
        <i class="fa-brands fa-chrome"></i>
        <!-- disabled : div + opacity-50 -->
        <div href="site externe" target="_blank" class="opacity-50 text-main-white bg-main-red grow h-[40px] flex items-center justify-center">Lien vers le site</div>
    </div>
</section>

<!-- tabulation entreprise/apprenants -->
<section>
    <div class="flex w-full">
        <div onclick="changeTab(0)" class="tabChange px-0 transition-all duration-[0.4s] bg-main-red w-1/2 text-center text-main-white font-title text-lg font-bold py-2">
            <p>Demandes de l'entreprise</p>
        </div>
        <div onclick="changeTab(1)" class="tabChange px-0 transition-all duration-[0.4s] bg-main-gray w-1/2 text-center text-main-white font-title text-lg font-bold py-2">
            <p>Note des apprenants</p>
        </div>
    </div>
</section>



<section class="sectionChange"> <!-------------PROMOTIONS----------->
Promo
</section>
<section class="sectionChange hidden"> <!-------------PROJETS----------->
    projets
</section>
















<?php $content = ob_get_clean(); ?>



<?php ob_start(); ?>
<script src="assets/js/project.js"></script>
<?php $script = ob_get_clean(); ?>

<?php require 'view/layout.php'; ?>