<?php
$title = "Accueil";
ob_start();
?>

<!-- background -->
<section id="homepage-background" class="relative w-screen h-screen bg-cover bg-center" style="background-image: url(assets/img/homepage_image_blur.jpg);">
    <!-- overlay -->
    <div id="homepage-overlay" class="absolute w-screen h-screen bg-main-white bg-opacity-60">
        <!-- div image logo -->
        <div class="flex justify-center my-6">
            <img class="w-2/3" src="assets/img/logo.png" alt="logo simplon charleville-mézières"><h1 class="hidden">Simplon Charleville-Mézières, formations numérique</h1>
        </div>
        <!-- div accueil -->
        <section id="homepage" class="w-full [&>*]:mx-auto relative
        [&>button]:block [&>button]:bg-main-red [&>button]:w-3/4 [&>button]:py-8 [&>button]:my-12 [&>button]:border-main-white [&>button]:border-2 [&>button]:text-main-white [&>button]:font-title [&>button]:font-bold [&>button]:uppercase [&>button]:text-xl [&>button]:ease-linear [&>button]:duration-200 [&>button]:">
            <h2 class="w-fit font-title font-bold text-3xl text-main-white">Je suis</h2>
            <button onclick="companyHomepage()" type="button" class="hover:bg-main-white hover:text-main-red hover:border-main-red hover:-translate-y-4 focus:scale-110 focus:bg-red-800">Une entreprise</button>
            <button onclick="userHomepage()" type="button" class="hover:bg-main-white hover:text-main-red hover:border-main-red hover:-translate-y-4 focus:scale-110 focus:bg-red-800">Un apprenant</button>
            <button onclick="visitorHomepage()" type="button" class="hover:bg-main-white hover:text-main-red hover:border-main-red hover:-translate-y-4 focus:scale-110 focus:bg-red-800">Un visiteur</button>
            <div class="absolute -bottom-12 w-full flex justify-center"><a href="#" class="underline font-semibold">se connecter</a></div>
        </section>
        <!-- div entreprise -->
        <section id="company-homepage" class="hidden w-full [&>*]:mx-auto relative
        [&>button]:block [&>button]:bg-main-red [&>button]:w-3/4 [&>button]:py-8 [&>button]:my-12 [&>button]:border-main-white [&>button]:border-2 [&>button]:text-main-white [&>button]:font-title [&>button]:font-bold [&>button]:uppercase [&>button]:text-xl [&>button]:ease-linear [&>button]:duration-200 [&>button]:">
            <h2 class="absolute -top-10 w-full text-center font-title font-bold text-3xl text-main-white">Je suis une entreprise</h2>
            <h2 class="w-fit font-title font-bold text-3xl text-main-white">Je souhaite</h2>
            <button onclick="companyHomepage()" type="button" class="hover:bg-main-white hover:text-main-red hover:border-main-red hover:-translate-y-4 focus:scale-110 focus:bg-red-800">Chercher un profil</button>
            <button onclick="userHomepage()" type="button" class="hover:bg-main-white hover:text-main-red hover:border-main-red hover:-translate-y-4 focus:scale-110 focus:bg-red-800">Soumettre un projet</button>
            <button onclick="visitorHomepage()" type="button" class="hover:bg-main-white hover:text-main-red hover:border-main-red hover:-translate-y-4 focus:scale-110 focus:bg-red-800">Gérer mes projets</button>
            <div class="absolute -bottom-12 w-full flex justify-center"><button onclick="homepage()" class="font-semibold text-main-white text-xl shadow-2xl"><i class="fa-solid fa-angle-left"></i> Retour</button></div>
        </section>
    </div>
</section>


<script>
    function companyHomepage(){
        // alert("salut");
        const homepage = document.getElementById("homepage");
        // console.log(homepage);
        const companyHomepage = document.getElementById("company-homepage");
        // console.log(companyHomepage);
        homepage.classList.add("hidden");
        companyHomepage.classList.remove("hidden");

    }

    function homepage(){
        const homepage = document.getElementById("homepage");
        // console.log(homepage);
        const companyHomepage = document.getElementById("company-homepage");
        // console.log(companyHomepage);
        homepage.classList.remove("hidden");
        companyHomepage.classList.add("hidden");
    }

</script>

<?php
$content = ob_get_clean();
ob_start();
?>
<script src="assets/js/homepage.js"></script>
<?php
$script = ob_get_clean();
require ('view/layout_home.php');


?>

