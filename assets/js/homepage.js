function companyHomepage() {
    // alert("salut");
    const homepage = document.getElementById("homepage");
    // console.log(homepage);
    const companyHomepage = document.getElementById("company-homepage");
    // console.log(companyHomepage);
    homepage.classList.add("opacity-0");
    setTimeout(() => {
        homepage.classList.add("hidden", "lg:hidden");
        companyHomepage.classList.remove("hidden", "lg:hidden");
        setTimeout(() => {
            companyHomepage.classList.add("opacity-100");
        }, 1)
    }, 300)
}

function visitorHomepage() {
    // alert("salut");
    const homepage = document.getElementById("homepage");
    // console.log(homepage);
    const visitorHomepage = document.getElementById("visitor-homepage");
    // console.log(visitorHomepage);
    homepage.classList.add("opacity-0");
    setTimeout(() => {
        homepage.classList.add("hidden", "lg:hidden");
        visitorHomepage.classList.remove("hidden", "lg:hidden");
        setTimeout(() => {
            visitorHomepage.classList.add("opacity-100");
        }, 1)
    }, 300)
}

function returnHomepage(id) {
    const homepage = document.getElementById("homepage");
    // console.log(homepage);
    const previousPage = document.getElementById(id);
    // console.log(previousPage);
    previousPage.classList.remove("opacity-100");
    setTimeout(() => {
        homepage.classList.remove("hidden", "lg:hidden");
        previousPage.classList.add("hidden", "lg:hidden");
        setTimeout(() => {
            homepage.classList.remove("opacity-0");
        }, 1)
    }, 300)
}

function loginModal() {
    const loginModal = document.getElementById("login-modal");
    // console.log(loginModal);
    loginModal.showModal();
}

function companyPromo() {
    // REDIRECTION VERS TOUTES LES PROMOS
    window.location.replace("index.php");
}

function companyProject() {
    // REDIRECTION VERS GESTION DE PROJET
    window.location.replace("index.php");
    // REDIRECTION VERS CONNEXION/INSCRIPTION SI PAS CO
}

function visitorProject() {
    // REDIRECTION VERS TOUS LES PROJETS
    window.location.replace("index.php");
}

function visitorFormation() {
    // REDIRECTION VERS TOUTES LES FORMATIONS
    window.location.replace("index.php");
}




