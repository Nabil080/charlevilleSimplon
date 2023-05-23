const sectionChange = document.getElementsByClassName('sectionChange');
const tabChange = document.getElementsByClassName('tabChange');
const translate = document.getElementById('translateList');
let translate_x = 0;

function changeTab(y) {
    if (y == "back") { // Permet de retourner au début de la tabulation en définissant le y sur la première table
        y = 0;
        tabChange[1].classList.add("animate-pulse"); // remet l'animation sur la deuxième tab
    }
    for (i = 0; i < sectionChange.length; i++) { // Cache toutes les section et enleve le style de toutes les tab
        sectionChange[i].classList.add("hidden");
        tabChange[i].classList.remove("!bg-main-red");
        tabChange[i].classList.add("bg-main-gray");
        sectionChange[y].classList.remove("opacity-50");
        tabChange[y].classList.remove("animate-pulse");

    }

    if (window.innerWidth < 640) { // Pour le mobile définit un translate
        if (typeof translate_x !== 'undefined') {
            translate.classList.remove(translate_x);
        }

        let number = y * 17; // Définit le translate en fonction du numéro de la tab
        translate_x = "-translate-x-[" + number +"%]"; // Ajoute la variable prédente pour définir le translate en pourcentage
        translate.classList.add (translate_x);
    }

    sectionChange[y].classList.remove("hidden"); // Fait apparraitre la table séléctionné et active la tab lié
    sectionChange[y].offsetHeight;
    sectionChange[y].classList.add("opacity-100");

    tabChange[y].classList.add("!bg-main-red");
}

// Open Side menu

// document.addEventListener("dragend", openSide());

function openSide() { // onclick sur le déclencheur
    const list = document.getElementById("translateList"); // Récupere l'élément à ouvrir ou fermer

    list.classList.toggle("-translate-x-2/3"); // Toggle les classes pour obtenir l'effet de translate
    list.classList.toggle("opacity-40");
    list.classList.toggle("animate-pulse");
}
