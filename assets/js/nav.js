const nav = document.querySelector("nav");
const heightNav = nav.offsetHeight;
const changeNav = nav.querySelector(".changeNav");
const change = nav.querySelectorAll("i");
const div = nav.querySelectorAll("div")[0];
const dropdown = div.querySelector("#dropdown");
const dropdownAccount = document.getElementById("dropdownAccount");


const button = nav.querySelector("button");
const logo = nav.getElementsByTagName("img")[0];
const body = document.body;

console.log(body);
removeHeight = - 150; // Définit la hauteur à laquelle la navbar disparait (150px du top)
if (document.getElementById("homepage-overlay") !== null) { // Si c'est sur l'accueil passe à 70% de la hauteur de l'écran
  removeHeight = - (this.window.screen.height * 0.7);
  window.addEventListener("onload", homepageNav(1));

}

function changeNavFunction () {
  if (document.getElementById("homepage-overlay") == null) {
    // apparition nav inférieur
    changeNav.classList.toggle("hidden");
    changeNav.offsetHeight; // permet de spécifier au js la réapparition de l'élément et ainsi l'animer
    // animation nav inferieur
    changeNav.classList.toggle("translate-x-[80vw]");
    changeNav.classList.toggle("h-[100vh]");
    changeNav.classList.toggle("grid-rows-[10vh_10vh_10vh_10vh]");
    // changement d'icone
    if (change[0].classList.contains("hidden")) {
        change[0].classList.toggle("hidden");
        change[0].style.display = "block";
    } else {
        change[0].style.display = "none";
        change[0].classList.toggle("hidden");
    }
    if (!change[1].classList.contains("hidden")) {
        change[1].classList.remove("hidden");
        change[1].style.display = "block";
    } else {
        change[1].style.display = "none";
        change[1].classList.add("hidden");
    }
    change[1].classList.toggle("hidden");
    // changement de couleur nav superieur
    div.classList.toggle("bg-main-white");
    // Empeche le click sur le dropdown menu pendant le temps de l'animation
    button.style.pointerEvents = "none";
    function pointer () {
    button.style.pointerEvents = "auto";
    }
    setTimeout(pointer, 500);
  } else if (document.getElementById("homepage-overlay") !== null) {
    changeNavHomepageFunction();
  }
}



window.addEventListener ("scroll", function () {
    
    if (!changeNav.classList.contains("h-[100vh]")) {
      //Defini prevScrollTop pour le premier scroll
      if (typeof prevScrollTop == "undefined") {
        prevScrollTop = 0;
      } 
      homepageNav(0);
      // une fois que la hauteur définie a été scroll, enlève la navbar
      if (body.getBoundingClientRect().top > removeHeight && this.window.screen.width > 762) {
        nav.classList.remove("-translate-y-["+heightNav+"px]");

      } else {
          if (body.getBoundingClientRect().top < prevScrollTop) {  // Si on scroll vers le haut (cherche la distance du haut actuelle puis compare à la précédente), affiche la navbar 
          nav.classList.add("-translate-y-["+heightNav+"px]");
          prevScrollTop = body.getBoundingClientRect().top;
        }
        if (body.getBoundingClientRect().top > prevScrollTop) { // Si on scroll vers le bas, pareil
                // nav.classList.remove("hidden");
                // nav.offsetHeight;
            nav.classList.remove("-translate-y-["+heightNav+"px]");

            prevScrollTop = body.getBoundingClientRect().top; // Définie la variable contenant la position précédente
            const dropdown = nav.querySelector("#dropdown");

            if (! dropdown.classList.contains("hidden")) { // Cache le dropdown si il est affiché lors du scroll
              dropdown.classList.add("hidden");
            }
        }
      }
    }
  }
  );

  //Navbar sur la page d'accueil


  function homepageNav(y)
  {
    // Script Pour la page d'accueil
    if (document.getElementById("homepage-overlay") !== null) {
      if (body.getBoundingClientRect().top < -1) { 
        
        nav.classList.add("bg-main-white");
        nav.classList.remove("text-main-white", "bg-gray-400", "bg-opacity-30");
        change[0].classList.remove("text-main-white");
        changeNav.classList.add("text-black");
        logo.src = "assets/img/navbar/logo-simplon.png";
        logo.classList.remove("w-[150px]");
        logo.classList.add("w-[171px]");
        dropdown.classList.add("bg-main-white", "text-black");
        let listes = dropdown.getElementsByTagName('li');
        for (let i = 0; i < listes.length; i++) {
          listes[i].classList.remove("md:hover:bg-gray-800");
          listes[i].classList.add("hover:bg-main-lightred");
        }
        dropdown.classList.remove("bg-opacity-90", "blur-[0.3px]");
        if (dropdownAccount !== null) {
          dropdownAccount.classList.add("bg-main-white", "text-black");
          dropdownAccount.classList.remove("bg-opacity-80", "blur-[0.3px]");
          let listesAccount = dropdownAccount.getElementsByTagName('li');
          for (let i = 0; i < listesAccount.length; i++) {
          listesAccount[i].classList.remove("md:hover:bg-gray-800");
            listesAccount[i].classList.add("hover:bg-main-lightred");
          }
        }
      } else if (body.getBoundingClientRect().top > -30 || y == 1) {

        changeNav.classList.remove("text-black");
        nav.classList.remove("bg-main-white");
        nav.classList.add("text-main-white", "bg-gray-400", "bg-opacity-30");
        logo.src = "assets/img/simplonblanc.png";
        logo.classList.add("w-[150px]");
        logo.classList.remove("w-[171px]");
        dropdown.classList.remove("bg-main-white", "text-black");
        let listes = dropdown.getElementsByTagName('li');
        for (let i = 0; i < listes.length; i++) {
          listes[i].classList.add("md:hover:bg-gray-800");

          listes[i].classList.remove("hover:bg-main-lightred");
        }
        dropdown.classList.add("bg-opacity-90", "blur-[0.3px]");
        if (dropdownAccount !== null) {
          dropdownAccount.classList.remove("bg-main-white", "text-black");
          dropdownAccount.classList.add("bg-opacity-80", "blur-[0.3px]");
          let listesAccount = dropdownAccount.getElementsByTagName('li');
          for (let i = 0; i < listesAccount.length; i++) {
          listesAccount[i].classList.add("md:hover:bg-gray-800");

            listesAccount[i].classList.remove("hover:bg-main-lightred");
          }
        }
      }
    }
  }

  function changeNavHomepageFunction () {
      // apparition nav inférieur
      changeNav.classList.toggle("hidden");
      changeNav.offsetHeight; // permet de spécifier au js la réapparition de l'élément et ainsi l'animer
      // animation nav inferieur
      changeNav.classList.toggle("translate-x-[80vw]");
      changeNav.classList.toggle("h-[100vh]");
      changeNav.classList.toggle("grid-rows-[10vh_10vh_10vh_10vh]");
      nav.classList.toggle("text-main-white"); 
    if (body.getBoundingClientRect().top > -30) {
      if (logo.classList.contains("w-[150px]") == true) 
      {
        logo.src = "assets/img/navbar/logo-simplon.png";
        logo.classList.remove("w-[150px]");
        logo.classList.add("w-[171px]");
      } else if (logo.classList.contains("w-[150px]") == false) {

        logo.src = "assets/img/simplonblanc.png";
        logo.classList.add("w-[150px]");
        logo.classList.remove("w-[171px]");
      }
    }
      // changement d'icone
      if (change[0].classList.contains("hidden")) {
          change[0].classList.toggle("hidden");
          change[0].style.display = "block";
      } else {
          change[0].style.display = "none";
          change[0].classList.toggle("hidden");
      }
      if (!change[1].classList.contains("hidden")) {
        change[1].classList.remove("hidden");
        change[1].style.display = "block";
        change[1].classList.add("text-black");
        dropdown.classList.add("bg-main-white", "text-black");
        dropdown.classList.remove("bg-opacity-90", "blur-[0.3px]");
        if (dropdownAccount !== null) {
          dropdownAccount.classList.add("bg-main-white", "text-black");
          dropdownAccount.classList.remove("bg-opacity-80", "blur-[0.3px]");
        }
      } else {
        change[1].style.display = "none";
        change[1].classList.add("hidden");
        change[1].classList.add("text-black");
        dropdown.classList.remove("bg-main-white", "text-black");
        dropdown.classList.add("bg-opacity-90", "blur-[0.3px]");
        if (dropdownAccount !== null) {
          dropdownAccount.classList.remove("bg-main-white", "text-black");
          dropdownAccount.classList.add("bg-opacity-80", "blur-[0.3px]");
        }
      }
      change[1].classList.toggle("hidden");
      // changement de couleur nav superieur
      div.classList.toggle("bg-main-white");

      // Empeche le click sur le dropdown menu pendant le temps de l'animation
      button.style.pointerEvents = "none";
      function pointer () {
      button.style.pointerEvents = "auto";
      }
      setTimeout(pointer, 500);
    
  }
  
