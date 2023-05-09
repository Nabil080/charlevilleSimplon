<?php $title = ""; ?>

<?php ob_start(); ?>

<!-- header -->
<section class="text-center [&_h5]:italic [&_h5]:my-2">
    <h1 class="font-title text-2xl sm:text-3xl lg:text-[40px] font-semibold text-main-red uppercase">Super projet de zinzin</h1>
    <div>
        <h5>Réalisé par :</h5>
        <div class="flex flex-wrap justify-center gap-2 text-sm md:text-base 2xl:text-lg text-main-white [&>a]:bg-main-gray [&>a]:py-0.5 [&>a]:px-3 [&>a]:rounded-full">
            <a href="profil de l'apprenant" class="hover:border border-main-gray hover:text-main-gray hover:bg-main-white">Nabil</a>
            <a href="profil de l'apprenant" class="hover:border border-main-gray hover:text-main-gray hover:bg-main-white">Alexandre</a>
            <a href="profil de l'apprenant" class="hover:border border-main-gray hover:text-main-gray hover:bg-main-white">Florian</a>
            <a href="profil de l'apprenant" class="hover:border border-main-gray hover:text-main-gray hover:bg-main-white">Bryan</a>
        </div>
    </div>
    <div>
        <h5>Supervisé par :</h5>
        <div class="flex flex-wrap justify-center gap-2 text-sm md:text-base 2xl:text-lg text-main-white [&>a]:bg-main-gray [&>a]:py-0.5 [&>a]:px-3 [&>a]:rounded-full">
            <a href="profil de l'apprenant" class="hover:border border-main-gray hover:text-main-gray hover:bg-main-white">Axel</a>
            <a href="profil de l'apprenant" class="hover:border border-main-gray hover:text-main-gray hover:bg-main-white">Steven</a>
        </div>
    </div>
</section>

<!-- aperçu projet -->
<section class="text-center sm:text-start mx-4 mt-4 sm:grid grid-cols-2 gap-8 sm:gap-10 md:gap-12 lg:gap-20 xl:gap-40 max-w-[1200px] lg:mx-12 xl:mx-auto">
    <!-- maquette -->
    <article class="order-2">
        <div class="font-title text-xl sm:text-2xl xl:text-3xl font-bold my-4 underline w-full"><a href="lien de la maquette">Maquette/Wireframe</a></div>
        <div class="w-full max-h-[200px] sm:max-h-[250px] overflow-scroll"><img class="w-full" src="assets/img/maquette" alt="maquette du projet"></div>
    </article>
    <!-- avancement -->
    <article class="flex-col flex">
        <div class="font-title text-xl sm:text-2xl xl:text-3xl font-bold my-4">Avancement</div>
        <div class="grow flex flex-col justify-center">
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
    </article>
</section>

<!-- boutons liens externes -->
<section class="my-12 lg:grid grid-cols-3 lg:max-w-[1150px] mx-auto [&_i]:text-[40px] [&_i]:w-10 [&_i]:text-center">
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
<section class="max-w-[1200px] mx-auto">
    <div class="flex w-full">
        <div onclick="changeTab(0)" class="tabChange cursor-pointer px-0 transition-all duration-[0.4s] bg-main-red w-1/2 text-center text-main-white font-title text-lg md:text-xl lg:text-2xl font-bold py-2 md:py-4">
            <p class="select-none">Demandes de l'entreprise</p>
        </div>
        <div onclick="changeTab(1)" class="tabChange cursor-pointer px-0 transition-all duration-[0.4s] bg-main-gray w-1/2 text-center text-main-white font-title text-lg md:text-xl lg:text-2xl font-bold py-2 md:py-4">
            <p class="select-none">Notes des apprenants</p>
        </div>
    </div>
</section>


<!-- CONTENU TAB -->
<section class="max-w-[1200px] mx-auto flex">
    <!-- CONTENU TAB ENTREPRISE -->
    <div class="sectionChange">
        <h2 class="text-center italic font-title text-xl lg:text-2xl font-semibold uppercase my-4">Demandes de l'entreprise</h2>
        <div class="mx-4 h-1 bg-main-red"></div>
        <div class="flex">
            <p class="m-4 lg:w-4/5">
                La méthode d'apprentissage <I>Simplon.co</I>, <B>c'est une pédagogie active et par projets</B> où l'apprenant est confronté à des mises en situation concrètes via des projets individuels et en groupe. Les thèmes des projets sont directement issus de cas réels, pour permettre aux apprenants d'appréhender le terrain dès la formation. Le collectif est un élément central de l'apprentissage car <B>le travail en équipe est constant</B>, et les apprenants s'entraident et s'évaluent régulièrement.<br><br>

                Pour garantir une <B>insertion professionnelle réussie</B>, l'apprenante est accompagnée par des formateurs experts du métier visé et des équipes en lien avec les entreprises du territoire. Il est immergé dans le monde de l'entreprise tout au long de sa formation : parrainage de la promotion par une entreprise, simulations d'entretiens, meet-ups...<br><br>

                Quasiment toutes nos formations débouchent sur <B>la délivrance de certifications reconnues</B>, soit un Titre RNCP reconnu par le ministère du travail (équivalent diplôme), soit une ou plusieurs certifications Simplon reconnues par l'État ou par les professionnels.
            </p>
            <!-- ANIMATION ASIDE -->
            <div class="hidden lg:grid w-1/5 place-items-center">
                <img class="w-4/5"src="assets/img/logo" alt="anim">
            </div>
        </div>
    </div>
    <!-- CONTENU TAB APPRENANT -->
    <div class="sectionChange hidden">
        <h2 class="text-center italic font-title text-xl lg:text-2xl font-semibold uppercase my-4">Notes des apprenants</h2>
        <div class="mx-4 h-1 bg-main-red"></div>
        <div class="flex">
            <p class="m-4 lg:w-4/5">
                La méthode d'apprentissage <I>Simplon.co</I>, <B>c'est une pédagogie active et par projets</B> où l'apprenant est confronté à des mises en situation concrètes via des projets individuels et en groupe. Les thèmes des projets sont directement issus de cas réels, pour permettre aux apprenants d'appréhender le terrain dès la formation. Le collectif est un élément central de l'apprentissage car <B>le travail en équipe est constant</B>, et les apprenants s'entraident et s'évaluent régulièrement.<br><br>

                Pour garantir une <B>insertion professionnelle réussie</B>, l'apprenante est accompagnée par des formateurs experts du métier visé et des équipes en lien avec les entreprises du territoire. Il est immergé dans le monde de l'entreprise tout au long de sa formation : parrainage de la promotion par une entreprise, simulations d'entretiens, meet-ups...<br><br>
            </p>
            <!-- ANIMATION ASIDE -->
            <div class="hidden lg:grid w-1/5 place-items-center">
                <img class="w-4/5"src="assets/img/logo" alt="anim">
            </div>
        </div>
    </div>
</section>















<?php $content = ob_get_clean(); ?>



<?php ob_start(); ?>
<script src="assets/js/project.js"></script>
<?php $script = ob_get_clean(); ?>

<?php require 'view/layout.php'; ?>