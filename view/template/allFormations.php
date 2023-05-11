<?php
$title = "Toutes nos formations";
?>

<?php ob_start(); ?>

<div class="background bg-main-white">
    <!-- Chiffres clés, invisibles en mobile -->
    <div class="key_numbers hidden md:flex md:justify-center border-t-[4px] border-b-[4px] border-main-red py-5 w-full">
        <div class="numbers_container px-5 flex w-full">
            <div class="number1 flex w-1/3 items-center">
                <span class="bg-main-red rounded-[5px] text-main-white text-[30px] h-[100px] w-[100px] flex items-center justify-center">142</span>
                <p class="font-title text-[20px] italic pl-2">Simplonien.ne.s depuis la création</p>
            </div>
            <div class="number2 flex w-1/3 items-center">
                <span class="bg-main-gray rounded-[5px] text-main-white text-[30px] h-[100px] w-[100px] flex items-center justify-center">99%</span>
                <p class="font-title text-[20px] font-semibold pl-2">Taux de réussite au diplôme front-end</p>
            </div>
            <div class="number3 flex w-1/3 items-center">
                <span class="bg-main-red rounded-[5px] text-main-white text-[30px] h-[100px] w-[100px] flex items-center justify-center">80%</span>
                <p class="font-title text-[20px] italic pl-2">Taux de réussite au diplôme back-end</p>
            </div>
        </div>
    
    </div>

    <h1 class="text-main-red font-title text-center text-[24px] md:text-[48px] font-semibold pt-4 md:py-8">Les formations de <span class="italic">Simplon Charleville</span></h1>

    <div class="large_screen md:mx-2">
        <div class="section-cards md:flex md:flex-wrap md:justify-around">
            <!-- Card formation -->
            <div class="card_formation rounded-[5px] border-[1px] m-3 border-main-border md:w-2/5">
                <img class="max-h-[140px] md:max-h-[200px] w-full" src="assets/img/formations/devweb" alt="Formation">
                <h3 class="text-main-red font-title text-[18px] pl-3 mt-3 text-center md:text-[36px]">Développeur Web / Web Mobile</h3>
                <h4 class="text-main-gray font-main text-[14px] italic pl-3 text-center">Niveau Bac + 2 / Titre professionnel niveau 5</h4>
                <div class="hidden md:flex flex-col text-justify px-8 py-4 text-[16px]">
                    <h5 class="text-main-red font-main pb-2 font-semibold">Le métier de développeur Web s’articule autour de plusieurs activités principales :</h5>
                    <ul class="list-disc pl-4"> 
                        <li>Développer la partie front-end d’une application web ou web mobile en intégrant les recommandations de sécurité</li>
                        <li>Développer la partie back-end d’une application web ou web mobile en intégrant les recommandations de sécurité</li>
                    </ul>
                </div>
                <div class="formation_status flex justify-center items-center">
                    <h5 class="text-main-gray font-main text-[14px] md:text-[16px] italic text-center my-3">Formation en cours depuis le 28/01/2023</h5>
                    <span class="w-4 h-4 border-[1px] bg-main-green rounded-full ml-2"></span>
                </div>
                <div class="card_buttons flex justify-around pb-6 pt-2">
                    <a href="" class="bg-main-red rounded-[5px] text-main-white text-center font-medium flex items-center justify-center text-[14px] font-main w-1/3 py-2 px-3">En savoir plus</a>
                    <a href="" class="bg-main-red rounded-[5px] text-main-white text-center font-medium flex items-center justify-center text-[14px] font-main w-1/3 py-2 px-2">Postuler à la formation</a>
                </div>
            </div>
            <!-- Fin de la card formation -->
            <div class="card_formation rounded-[5px] border-[1px] m-3 border-main-border md:w-2/5">
                <img class="max-h-[140px] md:max-h-[200px] w-full" src="assets/img/formations/devweb" alt="Formation">
                <h3 class="text-main-red font-title text-[18px] pl-3 mt-3 text-center md:text-[36px]">Développeur Web / Web Mobile</h3>
                <h4 class="text-main-gray font-main text-[14px] italic pl-3 text-center">Niveau Bac + 2 / Titre professionnel niveau 5</h4>
                <div class="hidden md:flex flex-col text-justify px-6 py-4 text-[16px]">
                    <h5 class="text-main-red font-main pb-2 font-semibold">Le métier de développeur Web s’articule autour de plusieurs activités principales :</h5>
                    <ul>
                        <li>Développer la partie front-end d’une application web ou web mobile en intégrant les recommandations de sécurité</li>
                        <li>Développer la partie back-end d’une application web ou web mobile en intégrant les recommandations de sécurité</li>
                    </ul>
                </div>
                <div class="formation_status flex justify-center items-center">
                    <h5 class="text-main-gray font-main text-[14px] md:text-[16px] italic text-center my-3">Formation en cours depuis le 28/01/2023</h5>
                    <span class="w-4 h-4 border-[1px] bg-main-green rounded-full ml-2"></span>
                </div>
                <div class="card_buttons flex justify-around pb-6 pt-2">
                    <a href="" class="bg-main-red rounded-[5px] text-main-white font-medium text-center flex items-center justify-center text-[14px] font-main w-1/3 py-2 px-3">En savoir plus</a>
                    <a href="" class="bg-main-red rounded-[5px] text-main-white font-medium text-center flex items-center justify-center text-[14px] font-main w-1/3 py-2 px-2">Postuler à la formation</a>
                </div>
            </div>

            <div class="card_formation rounded-[5px] border-[1px] m-3 border-main-border md:w-2/5">
                <img class="max-h-[140px] md:max-h-[200px] w-full" src="assets/img/formations/devweb" alt="Formation">
                <h3 class="text-main-red font-title text-[18px] pl-3 mt-3 text-center md:text-[36px]">Développeur Web / Web Mobile</h3>
                <h4 class="text-main-gray font-main text-[14px] italic pl-3 text-center">Niveau Bac + 2 / Titre professionnel niveau 5</h4>
                <div class="hidden md:flex flex-col text-justify px-6 py-4 text-[16px]">
                    <h5 class="text-main-red font-main pb-2 font-semibold">Le métier de développeur Web s’articule autour de plusieurs activités principales :</h5>
                    <ul>
                        <li>Développer la partie front-end d’une application web ou web mobile en intégrant les recommandations de sécurité</li>
                        <li>Développer la partie back-end d’une application web ou web mobile en intégrant les recommandations de sécurité</li>
                    </ul>
                </div>
                <div class="formation_status flex justify-center items-center">
                    <h5 class="text-main-gray font-main text-[14px] md:text-[16px] italic text-center my-3">Formation en cours depuis le 28/01/2023</h5>
                    <span class="w-4 h-4 border-[1px] bg-main-green rounded-full ml-2"></span>
                </div>
                <div class="card_buttons flex justify-around pb-6 pt-2">
                    <a href="" class="bg-main-red rounded-[5px] text-main-white font-medium text-center flex items-center justify-center text-[14px] font-main w-1/3 py-2 px-3">En savoir plus</a>
                    <a href="" class="bg-main-red rounded-[5px] text-main-white font-medium text-center flex items-center justify-center text-[14px] font-main w-1/3 py-2 px-2">Postuler à la formation</a>
                </div>
            </div>

        </div>
    </div>
    
    <!-- Section Apprendre à Simplon -->
    <div class="section_learn bg-main-white pb-5 mx-2 md:mx-[5%] lg:mx-[10%]">
        <h2 class="text-main-red font-title text-center text-[24px] font-semibold pt-4">Apprendre à Simplon</h2>
        <p class="mx-7 py-5 font-main text-[16px] text-justify tracking-wide">La méthode d’apprentissage <span class="italic">Simplon.co</span>, <strong>c’est une pédagogie active et par projets</strong> où l’apprenant est confronté à des mises en situation concrètes via des projets individuels et en groupe. Les thèmes des projets sont directement issus de cas réels, pour permettre aux apprenants d’appréhender le terrain dès la formation. Le collectif est un élément central de l’apprentissage car <strong>le travail en équipe est constant</strong>, et les apprenants s’entraident et s’évaluent régulièrement.</p>
        <p class="mx-7 py-5 font-main text-[16px] text-justify tracking-wide">Pour garantir une <strong>insertion professionnelle réussie</strong>, l’apprenante est accompagnée par des formateurs experts du métier visé et des équipes en lien avec les entreprises du territoire. Il est immergé dans le monde de l’entreprise tout au long de sa formation : parrainage de la promotion par une entreprise, simulations d’entretiens, meet-ups...</p>
        <p class="mx-7 py-5 font-main text-[16px] text-justify tracking-wide">Quasiment toutes nos formations débouchent sur la <strong>délivrance de certifications reconnues</strong>, soit un Titre RNCP reconnu par le ministère du travail (équivalent diplôme), soit une ou plusieurs certifications Simplon reconnues par l'État ou par les professionnels.</p>
        <div class="flex justify-center">
            <a href="" class="bg-main-red rounded-[5px] text-main-white font-semibold text-[16px] font-main py-5 px-3 inline">Projets réalisés par nos formations</a>
        </div>
    </div>

    <div class="section_history relative">
        <h2 class="text-main-red font-title text-center text-[24px] font-semibold py-5 my-8">Notre histoire</h2>
        <!-- Timeline -->
        <ol id="translateList" class="flex absolute animate-pulse w-auto sm:w-full lg:w-3/4 sm:animate-none sm:translate-x-0 sm:opacity-100 sm:relative sm:flex-row sm:mx-auto lg:relative opacity-40 flex-col w-full transition-all duration-[0.5s] -translate-x-2/3 lg:flex md:justify-around md:gap-6">
            <div class="border-2 hidden sm:block border-main-red w-[300vw] absolute z-0 h-0 top-1/2 -left-full"></div>
            <li class="z-10 w-2/3 cursor-pointer">
                <div onclick="changeTab(0)" class="tabChange rounded-[5px] text-main-white bg-main-red p-2 grid items-center justify-center">
                    <span class="lg:text-xl text-md font-semibold">2013</span>
                </div>
            </li>
            <li class="z-10 w-2/3 cursor-pointer">
            <div onclick="changeTab(1)" class="tabChange bg-main-gray rounded-[5px] text-main-white p-2 grid items-center justify-center">
                    <span class="lg:text-xl text-md font-semibold">2014-2015</span>
                </div>
            </li>
            <li class="z-10 w-2/3 cursor-pointer">
            <div onclick="changeTab(2)" class="tabChange bg-main-gray rounded-[5px] text-main-white p-2 grid items-center justify-center">
                    <span class="lg:text-xl text-md font-semibold">2016-2017</span>
                </div>
            </li>
            <li class="z-10 w-2/3 cursor-pointer">
            <div onclick="changeTab(3)" class="tabChange bg-main-gray rounded-[5px] text-main-white p-2 grid items-center justify-center">
                    <span class="lg:text-xl text-md font-semibold">2018-2019</span>
                </div>
            </li>
            <li class="z-10 w-2/3 cursor-pointer">
            <div onclick="changeTab(4)" class="tabChange bg-main-gray rounded-[5px] text-main-white p-2 grid items-center justify-center">
                    <span class="lg:text-xl text-md font-semibold">2020-2021</span>
                </div>
            </li>
            <div onclick="openSide()" draggable="true" ondragend="openSide()" style="clip-path: polygon(49% 0, 100% 100%, 0 100%);" class="cursor-pointer translate-x-[55%] sm:hidden -translate-y-[235%] rotate-90 w-2/3 ml-4 py-4 bg-main-red">
                <p class="text-main-white text-center ">Découvrir</p>
            </div>
        </ol>
        
        <div class="mx-7 lg:mx-[15%] lg:mt-16 mb-8">
            <div class="sectionChange transition-all duration-[1.5s]">
            <h3 class="text-[20px] md:text-[44px] font-bold font-title">2013</h3>
            <p class="text-[16px]"> L’aventure de Simplon débute en 2013 avec Frédéric Bardeau, Andrei Vladescu-Olt et Erwan Kezzar.
                Inspirés par les premiers bootcamps qui fleurissent un peu partout dans la Silicon Valley,
                ils rêvent d’une version française plus inclusive et gratuite avec plus de femmes, et plus de recrues de milieux
                et de territoires différents. Le local de Montreuil est trouvé, loué et rapidement rafraîchi pour accueillir en octobre
                la première promotion de Simplon sur Ruby On Rails : 30 personnes ayant un projet d'application ou d'entreprise dont 50% de
                femmes de 18 à 52 ans, de Bac-15 à Bac+15 et des personnes provenant de 17 nationalités différentes.</p>
            </div>
            <div class="hidden sectionChange transition-all opacity-50 duration-[1.5s]">
            <h3 class="text-[20px] md:text-[44px] font-bold font-title">2014 - 2015</h3>
            <p class="text-[16px]"> Simplon se développe rapidement en dehors de Montreuil via un mécanisme de "franchise sociale" et des fabriques commencent à
                 pousser dans les quartiers prioritaires et ruraux de France et à l'étranger (Roumanie, Afrique du Sud). Une première levée de
                  fonds consolide le modèle et Simplon est autorisé à délivrer le Certificat de Qualification Professionnelle (CQP)
                   « Développeur nouvelles technologies ». À la même époque, Simplon développe ses activités avec la création de Simplon Prod,
                   l’atelier solidaire de fabrication digitale, à destination des acteurs de l’ESS, et la Fondation Simplon, sa branche
                   philanthropique abritée par Face reconnue d'utilité publique nait. Simplon est lauréat de la France s'Engage en 2014,
                   fellow Ashoka et sélectionnée par EPIC en 2015.</p>
            </div>
            <div class="hidden sectionChange transition-all opacity-50 duration-[1.5s]">
            <h3 class="text-[20px] md:text-[44px] font-bold font-title">2016-2017</h3>
            <p class="text-[16px]"> Simplon devient le premier réseau de formation labellisées par l'Etat en France "Grande Ecole du Numérique" et se développe à l’international :
                la Belgique, le Liban, la Côte d’Ivoire. Simplon voit grand et organise une seconde levée de fonds. France Active
                (via France Active Investissement), la Caisse des Dépôts et Consignations (CDC en direct), Phitrust, INCO (Comptoir de l’innovation),
                Aviva, Crédit Coopératif (via ESFIN), Amundi et Mirova entrent au capital de Simplon. Simplon prend un nouvel élan et double ses
                effectifs tous les ans, et son impact. Simplon Corp, sa division spécialisée dans la formation des salariés dont les métiers et les
                compétences sont fortement impactées par la transformation numérique, déploie ses projets dans les grands comptes. DigitESS nait à ce
                moment là pour accompagner la transition numérique des acteurs à impact positif.</p>
            </div>
            <div class="hidden sectionChange transition-all opacity-50 duration-[1.5s]">
                <h3 class="text-[20px] md:text-[44px] font-bold font-title">2018-2019</h3>
                <p class="text-[16px]"> Au moment de fêter ses 6 ans, Simplon.co lève 12 millions d’euros auprès de son pool d’investisseurs de l’Économie sociale
                    et solidaire (ESS) afin de poursuivre la croissance de son impact social en France et à l’international. Ces deux dernières années,
                    porté par le maintien d’un niveau très élevé des besoins en compétences dans le domaine du numérique, Simplon.co a multiplié par quatre
                    son impact social et formé aux métiers du numérique plus de 5 600 personnes dans le monde avec un taux de sorties positives de 75%
                    (6 mois après la formation). Le développement à l’international se poursuit. En 2019, Simplon.co compte 78 Fabriques dont 24 à l’étranger.
                    Simplon Prod dépasse les 150 projets ESS réalisés et Simplon Corp le millier de salarié formé.</p>
            </div>
            <div class="hidden sectionChange transition-all opacity-50 duration-[1.5s]">
                <h3 class="text-[20px] md:text-[44px] font-bold font-title">2020-2021</h3>
                <p class="text-[16px]"> En 2020, Simplon poursuit le développement de son impact social dans un contexte de crise sanitaire inédit.
                    Durant le confinement, les formations passent à distance, ce qui oblige à en repenser les modalités tout en maintenant
                    une approche pédagogique active et inclusive, et un univers bienveillant pour minimiser les impacts de cette crise sur
                    les activités de Simplon. Malgré un contexte difficile, Simplon dépasse en octobre 2020 la barre des 10 000 apprenants
                    formés dans le monde, et fête ses 7 ans et demi entouré de ses partenaires et amis en décembre. </p>
            </div>
        </div>


    </div>


</div>

<?php ob_start(); ?>
<script src="assets/js/allFormations.js"></script>
<?php $script = ob_get_clean(); ?>


<?php $content = ob_get_clean(); ?>

<?php require 'view/layout.php'; ?>