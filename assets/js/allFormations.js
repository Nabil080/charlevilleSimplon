const sectionDateChange = document.getElementsByClassName('sectionDateChange');
const tabDateChange = document.getElementsByClassName('tabDateChange');
const translate = document.getElementById('translateList');
let translate_x = 0;

function changeDateTab(y) {
    if (y == "back") { // Permet de retourner au début de la tabulation en définissant le y sur la première table
        y = 0;
        tabDateChange[1].classList.add("animate-pulse"); // remet l'animation sur la deuxième tab
    }
    for (i = 0; i < sectionDateChange.length; i++) { // Cache toutes les section et enleve le style de toutes les tab
        sectionDateChange[i].classList.add("hidden");
        tabDateChange[i].classList.remove("!bg-main-red");
        tabDateChange[i].classList.add("bg-main-gray");
        sectionDateChange[y].classList.remove("opacity-50");
        tabDateChange[y].classList.remove("animate-pulse");

    }

    if (window.innerWidth < 640) { // Pour le mobile définit un translate

        if (typeof translate_x !== 'undefined') {
            translate.classList.remove(translate_x);
        }

        let number = y * 17; // Définit le translate en fonction du numéro de la tab
        translate_x = "-translate-x-[" + number +"%]"; // Ajoute la variable prédente pour définir le translate en pourcentage
        translate.classList.add (translate_x);
    }

    sectionDateChange[y].classList.remove("hidden"); // Fait apparraitre la table séléctionné et active la tab lié
    sectionDateChange[y].offsetHeight;
    sectionDateChange[y].classList.add("opacity-100");

    tabDateChange[y].classList.add("!bg-main-red");
}
