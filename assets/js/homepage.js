function companyHomepage(){
    // alert("salut");
    const homepage = document.getElementById("homepage");
    // console.log(homepage);
    const companyHomepage = document.getElementById("company-homepage");
    // console.log(companyHomepage);
    homepage.classList.add("opacity-0");
    companyHomepage.classList.remove("hidden");
    setTimeout(() => {
        homepage.classList.add("hidden");
        companyHomepage.classList.add("opacity-100");
    },500)
}

function visitorHomepage(){
    // alert("salut");
    const homepage = document.getElementById("homepage");
    // console.log(homepage);
    const visitorHomepage = document.getElementById("visitor-homepage");
    // console.log(visitorHomepage);
    homepage.classList.add("opacity-0");
    visitorHomepage.classList.remove("hidden");
    setTimeout(() => {
        homepage.classList.add("hidden");
        visitorHomepage.classList.add("opacity-100");
    },500)
}

function returnHomepage(id){
    const homepage = document.getElementById("homepage");
    // console.log(homepage);
    const previousPage = document.getElementById(id);
    console.log(previousPage);
    previousPage.classList.remove("opacity-100");
    setTimeout(() => {
        homepage.classList.remove("hidden");
        previousPage.classList.add("hidden");
        setTimeout(() => {
            homepage.classList.remove("opacity-0");
        },1)
    },500)
}

function loginModal(){
    const loginModal = document.getElementById("login-modal");
    // console.log(loginModal);
    loginModal.showModal();
}

function companyPromo(){
    window.location.replace("index.php");
}

function companyProject(){
    window.location.replace("index.php");
}

function visitorProject(){
    window.location.replace("index.php");
}

function visitorFormation(){
    window.location.replace("index.php");
}

