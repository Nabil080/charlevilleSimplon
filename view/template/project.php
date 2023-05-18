<?php $title = ""; ?>

<?php ob_start(); ?>

<!-- header -->
<section class="text-center [&_h5]:italic [&_h5]:my-2">
    <!-- titre du projet  -->
    <h1 id="title" class="font-title text-2xl sm:text-3xl lg:text-[40px] font-semibold text-main-red uppercase">Super projet de zinzin
        <!-- bouton d'edit -->
        <i onclick="swapDivsById('title','title-update')" class="fa-solid fa-pen text-main-red cursor-pointer"></i>
    </h1>
        <!-- formulaire d'edit -->
    <form id="title-update" class="hidden space-x-4 font-title text-2xl sm:text-3xl lg:text-[40px] font-semibold text-main-red uppercase ">
        <input class="border-main-red border-2 p-2" value="Super projet de zinzin" placeholder="Nom du projet">
        <button type="submit"><i class="fa-solid fa-check"></i></button>
        <i onclick="swapDivsById('title','title-update')" class="fa-solid fa-xmark cursor-pointer"></i>
    </form>
    <!-- Apprenants du projet -->
    <div>
        <h5>Réalisé par :</h5>
        <div id="students" class="flex flex-wrap justify-center gap-2 text-sm md:text-base 2xl:text-lg text-main-white [&>a]:bg-main-gray [&>a]:py-0.5 [&>a]:px-3 [&>a]:rounded-full">
            <a href="profil de l'apprenant" class="hover:border border-main-gray hover:text-main-gray hover:bg-main-white">Nabil</a>
            <a href="profil de l'apprenant" class="hover:border border-main-gray hover:text-main-gray hover:bg-main-white">Alexandre</a>
            <a href="profil de l'apprenant" class="hover:border border-main-gray hover:text-main-gray hover:bg-main-white">Florian</a>
            <a href="profil de l'apprenant" class="hover:border border-main-gray hover:text-main-gray hover:bg-main-white">Bryan</a>
            <!-- bouton d'edit -->
            <i onclick="swapDivsById('students','students-update')" class="fa-solid fa-pen text-main-red cursor-pointer h-fit my-auto"></i>
        </div>
        <!-- formulaire d'edit -->
        <form id="students-update" class="hidden space-x-4 text-main-red">
            <select name="students" class="border-main-red border-2 p-2">
                <option value="apprenant 1">apprenant 1</option><option value="apprenant 2">apprenant 2</option>
            </select>
            <button type="submit"><i class="fa-solid fa-check text-main-red"></i></button>
            <i onclick="swapDivsById('students','students-update')" class="fa-solid fa-xmark text-main-red cursor-pointer"></i>
        </form>
    </div>
    <!-- Formateurs du projet -->
    <div>
        <h5>Supervisé par :</h5>
        <div id="formator" class="flex flex-wrap justify-center gap-2 text-sm md:text-base 2xl:text-lg text-main-white [&>a]:bg-main-gray [&>a]:py-0.5 [&>a]:px-3 [&>a]:rounded-full">
            <a href="profil de l'apprenant" class="hover:border border-main-gray hover:text-main-gray hover:bg-main-white">Axel</a>
            <a href="profil de l'apprenant" class="hover:border border-main-gray hover:text-main-gray hover:bg-main-white">Steven</a>
            <i onclick="swapDivsById('formator','formator-update')" class="fa-solid fa-pen text-main-red cursor-pointer h-fit my-auto"></i>
            <!-- bouton d'edit -->
        </div>
        <!-- formulaire d'edit -->
        <form id="formator-update" class="hidden space-x-4 text-main-red">
            <select name="formator" class="border-main-red border-2 p-2">
                <option value="formateur 1">formateur 1</option><option value="formateur 2">formateur 2</option>
            </select>
            <button type="submit"><i class="fa-solid fa-check text-main-red"></i></button>
            <i onclick="swapDivsById('formator','formator-update')" class="fa-solid fa-xmark text-main-red cursor-pointer"></i>
        </form>
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
        <div class="font-title text-xl sm:text-2xl xl:text-3xl font-bold my-4">Avancement
            <!-- boutons d'edit -->
            <i onclick="swapDivsById('progress1','progress1-update');swapDivsById('progress2','progress2-update');swapDivsById('progress3','progress3-update')" class="fa-solid fa-pen text-main-red cursor-pointer h-fit my-auto"></i></div>
        <div class="grow flex flex-col justify-center">
            <!-- avancement 1 -->
            <div id="progress1" class="mb-1 text-start italic">Cahier des charges</div>
            <!-- formulaire d'edit 1 -->
            <form id="progress1-update" class="hidden my-2 gap-4 w-full flex place-items-center">
                <input type="text" class="min-w-[80px] grow" placeholder="Nom">
                <input type="number" class="w-1/5 min-w-[80px]" placeholder="80%">
                <button type="submit"><i class="fa-solid fa-check text-main-red"></i></button>
                <i onclick="swapDivsById('progress1','progress1-update')" class="fa-solid fa-xmark text-main-red cursor-pointer"></i>
            </form>
            <div class="w-full bg-gray-200 rounded-full h-2.5 mb-4">
                <div class="bg-green-600 h-2.5 rounded-full" style="width: 100%"></div>
            </div>
            <!-- avancement 2 -->
            <div id="progress2" class="mb-1 text-start italic">Développement front</div>
            <!-- formulaire d'edit 2 -->
            <form id="progress2-update" class="hidden my-2 gap-4 w-full flex place-items-center">
                <input type="text" class="min-w-[80px] grow" placeholder="Nom" value="Cahier des charges">
                <input type="number" class="w-1/5 min-w-[80px]" placeholder="80%" value="40" min='0' max='100'>
                <button type="submit"><i class="fa-solid fa-check text-main-red"></i></button>
                <i onclick="swapDivsById('progress2','progress2-update')" class="fa-solid fa-xmark text-main-red cursor-pointer"></i>
            </form>
            <div class="w-full bg-gray-200 rounded-full h-2.5 mb-4  ">
                <div class="bg-yellow-400 h-2.5 rounded-full" style="width: 60%"></div>
            </div>
            <!-- avancement 3 -->
            <div id="progress3" class="mb-1 text-start italic">Non défini</div>
            <!-- formulaire d'edit 3 -->
            <form id="progress3-update" class="hidden my-2 gap-4 w-full flex place-items-center">
                <input type="text" class="min-w-[80px] grow" placeholder="Nom" value="Non défini">
                <input type="number" class="w-1/5 min-w-[80px]" placeholder="80%" value="0" min='0' max='100'>
                <button type="submit"><i class="fa-solid fa-check text-main-red"></i></button>
                <i onclick="swapDivsById('progress3','progress3-update')" class="fa-solid fa-xmark text-main-red cursor-pointer"></i>
            </form>
            <div class="w-full bg-gray-200 rounded-full h-2.5 mb-4">
                <div class="bg-red-main h-2.5 rounded-full" style="width: 45%"></div>
            </div>
        </div>
    </article>
</section>

<!-- boutons liens externes -->
<section class="my-12 lg:grid grid-cols-3 lg:max-w-[1150px] mx-auto [&_i]:text-[40px] [&_i]:w-10 [&_i]:text-center">
    <!-- bouton 1 github -->
    <div class="flex mx-4 my-4 gap-4 h-max">
        <i class="fa-brands fa-github"></i>
        <a id="github" href="github externe" target="_blank" class="text-main-white bg-main-red grow h-[40px] flex items-center justify-center">Voir le github du projet</a>
        <!-- formulaire d'edit github -->
        <form id="github-update" class="hidden w-full flex flex-wrap">
            <input type="text" name="github" placeholder="lien github" value="https://github.com/SirLauvel/charlevilleSimplon" class="text-main-white bg-main-red w-1/2 grow h-[40px] flex items-center justify-center">
            <button type="submit"><i class="fa-solid fa-check text-main-red"></i></button>
            <i onclick="swapDivsById('github','github-update')" class="fa-solid fa-xmark text-main-red cursor-pointer"></i>
        </form>
    </div>
    <!-- bouton 2 -->
    <div class="flex mx-4 my-4 gap-4 h-max">
        <i class="fa-solid fa-file-pdf"></i>
        <a id="pdf" href="cahier des charges pdf" download class="text-main-white bg-main-red grow h-[40px] flex items-center justify-center">Télécharger le cahier des charges</a>
        <!-- formulaire d'edit cahier des charges -->
        <form id="pdf-update" class="hidden w-full flex flex-wrap">
            <input type="file" name="pdf" placeholder="cahier des charges" class="text-main-white bg-main-red w-1/2 grow h-[40px] flex items-center justify-center">
            <button type="submit"><i class="fa-solid fa-check text-main-red"></i></button>
            <i onclick="swapDivsById('pdf','pdf-update')" class="fa-solid fa-xmark text-main-red cursor-pointer"></i>
        </form>
    </div>
    <!-- bouton 3 -->
    <div class="flex mx-4 my-4 gap-4 h-max">
        <i class="fa-brands fa-chrome"></i>
        <a id="link" href="site externe" target="_blank" class="disabled-button text-main-white bg-main-red grow h-[40px] flex items-center justify-center">Lien vers le site</a>
        <!-- formulaire d'edit lien site -->
        <form id="link-update" class="hidden w-full flex flex-wrap">
            <input type="text" name="link" placeholder="lien du site" value="" class="text-main-white bg-main-red w-1/2 grow h-[40px] flex items-center justify-center">
            <button type="submit"><i class="fa-solid fa-check text-main-red"></i></button>
            <i onclick="swapDivsById('link','link-update')" class="fa-solid fa-xmark text-main-red cursor-pointer"></i>
        </form>
    </div>
</section>
<!-- bouton d'edit liens externes -->
<div onclick="swapDivsById('github','github-update');swapDivsById('link','link-update');swapDivsById('pdf','pdf-update')" class="w-fit mx-auto relative -top-10 text-main-red cursor-pointer"><i class="fa-solid fa-pen cursor-pointer"></i> Modifier les liens</div>

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
        <h2 class="text-center italic font-title text-xl lg:text-2xl font-semibold uppercase my-4">Demandes de l'entreprise
            <!-- bouton d'edit -->
            <i onclick="swapDivsById('company-notes','company-notes-update')" class="fa-solid fa-pen text-main-red cursor-pointer"></i>
        </h2>
        <div class="mx-4 h-1 bg-main-red"></div>
        <div class="flex">
            <p id="company-notes" class="m-4 lg:w-4/5">
                La méthode d'apprentissage <I>Simplon.co</I>, <B>c'est une pédagogie active et par projets</B> où l'apprenant est confronté à des mises en situation concrètes via des projets individuels et en groupe. Les thèmes des projets sont directement issus de cas réels, pour permettre aux apprenants d'appréhender le terrain dès la formation. Le collectif est un élément central de l'apprentissage car <B>le travail en équipe est constant</B>, et les apprenants s'entraident et s'évaluent régulièrement.<br><br>

                Pour garantir une <B>insertion professionnelle réussie</B>, l'apprenante est accompagnée par des formateurs experts du métier visé et des équipes en lien avec les entreprises du territoire. Il est immergé dans le monde de l'entreprise tout au long de sa formation : parrainage de la promotion par une entreprise, simulations d'entretiens, meet-ups...<br><br>

                Quasiment toutes nos formations débouchent sur <B>la délivrance de certifications reconnues</B>, soit un Titre RNCP reconnu par le ministère du travail (équivalent diplôme), soit une ou plusieurs certifications Simplon reconnues par l'État ou par les professionnels.
            </p>
            <!-- formulaire d'edit -->
            <form id="company-notes-update" class="hidden w-full" method="post" action="">
                <textarea name="company-notes" id="editor" class="w-full" rows="10">La méthode d'apprentissage <I>Simplon.co</I>, <B>c'est une pédagogie active et par projets</B> où l'apprenant est confronté à des mises en situation concrètes via des projets individuels et en groupe. Les thèmes des projets sont directement issus de cas réels, pour permettre aux apprenants d'appréhender le terrain dès la formation. Le collectif est un élément central de l'apprentissage car <B>le travail en équipe est constant</B>, et les apprenants s'entraident et s'évaluent régulièrement.<br><br>

                Pour garantir une <B>insertion professionnelle réussie</B>, l'apprenante est accompagnée par des formateurs experts du métier visé et des équipes en lien avec les entreprises du territoire. Il est immergé dans le monde de l'entreprise tout au long de sa formation : parrainage de la promotion par une entreprise, simulations d'entretiens, meet-ups...<br><br>

                Quasiment toutes nos formations débouchent sur <B>la délivrance de certifications reconnues</B>, soit un Titre RNCP reconnu par le ministère du travail (équivalent diplôme), soit une ou plusieurs certifications Simplon reconnues par l'État ou par les professionnels.
                </textarea>
                <button type="submit" class="py-2 px-4 bg-main-red border-main-white border text-main-white hover:border-main my-4 mr-4">Modifier</button>
                Annuler<i onclick="swapDivsById('company-notes','company-notes-update')" class="fa-solid fa-xmark text-main-red cursor-pointer"></i>
            </form>
            <!-- ANIMATION ASIDE -->
            <div class="hidden lg:grid w-1/5 place-items-center">
                <img class="w-4/5"src="assets/img/logo" alt="anim">
            </div>
        </div>
    </div>
    <!-- CONTENU TAB APPRENANT -->
    <div class="sectionChange hidden">
        <h2 class="text-center italic font-title text-xl lg:text-2xl font-semibold uppercase my-4">Notes des apprenants
        <!-- bouton d'edit -->
        <i onclick="swapDivsById('notes','notes-update')" class="fa-solid fa-pen text-main-red cursor-pointer"></i>
        </h2>
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

<?php
var_dump($_POST)
?>


<script>
        ClassicEditor
            .create( document.querySelector( '#editor' ),{
                fontColor: {
                    colors: [
                        {
                    color: '#BD3124',
                    label: 'Rouge'
                },
                {
                    color: '#F6DADE',
                    label: 'Rouge clair'
                },
                {
                    color: '#4F4F4F',
                    label: 'Gris'
                },
                    ]
                }
            })
            .catch( error => {
                console.error( error );
            } );
    </script>










<?php $content = ob_get_clean(); ?>



<?php ob_start(); ?>
<script src="assets/js/tabs.js"></script>
<?php $script = ob_get_clean(); ?>

<?php require 'view/layout.php'; ?>