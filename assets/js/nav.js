const nav = document.querySelector("nav");
const heightNav = nav.offsetHeight;
const changeNav = nav.querySelector(".changeNav");
const change = nav.querySelectorAll("i");
const div = nav.querySelectorAll("div")[0];
const button = nav.querySelector("button");

function changeNavFunction () {
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
    div.classList.toggle("bg-main-lightred");
    // Empeche le click sur le dropdown menu pendant le temps de l'animation
    button.style.pointerEvents = "none";
    function pointer () {
    button.style.pointerEvents = "auto";
    }
    setTimeout(pointer, 500);
    
}

window.addEventListener ("scroll", function () {
    
    const body = document.body;
    if (!changeNav.classList.contains("h-[100vh]")) {
      //Defini prevScrollTop pour le premier scroll
      if (typeof prevScrollTop == "undefined") {
        prevScrollTop = 0;
      } 
      // une fois que 150px on été scroll, enlève la navbar
      if (body.getBoundingClientRect().top > -150 && this.window.screen.width > 762) {
      //   nav.classList.remove("hidden");
      //   nav.offsetHeight;
        nav.classList.remove("-translate-y-["+heightNav+"px]");

      } else {

          if (body.getBoundingClientRect().top < prevScrollTop) {  // Si on scroll vers le haut (cherche la distance du haut actuelle puis compare à la précédente), affiche la navbar 
          // nav.classList.add("hidden");
          // nav.offsetHeight;
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
            console.log("bouah");
            dropdown.classList.add("hidden");
          }
      }
      }
    }
    /*
    const contentSuccess = document.getElementById("content_succes");
    if (nav.classList.contains("-translate-y-["+heightNav+"]")) { // si la navbar est caché fait remonté l'aside jusqu'en haut
      contentSuccess.classList.add("-translate-y-20");
    } else {    // Si la navbar apparait fait redescendre l'aside
      contentSuccess.classList.remove("-translate-y-20");
    }*/
  }
  );


//  window.addEventListener ( "resize", function() {
//      if (window.matchMedia("(min-width: 768px)").matches) {
//          console.log("salut");
        
//          if (changeNav.classList.contains("h-[100vh]")) {
//             changeNav.classList.toggle("translate-x-[80vw]");
//             changeNav.classList.toggle("h-[100vh]");
//             changeNav.classList.toggle("grid-rows-[10vh_10vh_10vh_10vh]");
//             div.classList.toggle("bg-main-white");
//             div.classList.toggle("bg-main-lightred");
//          }
//      } else if (window.matchMedia("(max-width: 768px)").matches) {
//         if (changeNav.classList.contains("h-[100vh]")) {
//             changeNav.classList.toggle("hidden");
//             changeNav.offsetHeight;
//             changeNav.classList.toggle("translate-x-[80vw]");
//             changeNav.classList.toggle("h-[100vh]");
//             changeNav.classList.toggle("grid-rows-[10vh_10vh_10vh_10vh]");
//             div.classList.toggle("bg-main-white");
//             div.classList.toggle("bg-main-lightred");
//                 // changement d'icone
//             // if (change[0].classList.contains("hidden")) {
//             //     change[0].classList.toggle("hidden");
//             //     change[0].style.display = "block";
//             // } else {
//             //     change[0].style.display = "none";
//             //     change[0].classList.toggle("hidden");
//             // }
//             if (!change[1].classList.contains("hidden")) {
//                 change[1].classList.remove("hidden");
//                 change[1].style.display = "block";
//             } else {
//                 change[1].style.display = "none";
//                 change[1].classList.add("hidden");
//                 change[0].classList.toggle("hidden");
//                 change[0].style.display = "block";
//             }
//          }
//     }
//  })
