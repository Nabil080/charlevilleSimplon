const sectionChange = document.getElementsByClassName('sectionChange');
const tabChange = document.getElementsByClassName('tabChange');
const translate = document.getElementById('translateList');
let translate_x = 0;

function changeTab(y) {
    for (i = 0; i < sectionChange.length; i++) {
        sectionChange[i].classList.add("hidden");
        tabChange[i].classList.remove("bg-main-red");
        tabChange[i].classList.add("bg-main-gray");
        sectionChange[y].classList.remove("opacity-50");

    }
    // if (typeof translate_x !== 'undefined') {
    //     translate.classList.remove(translate_x);
    // }

    // let number = y * 1;
    // translate_x = "translate-x-" + number +"/4";
    // translate.classList.add (translate_x);

    sectionChange[y].classList.remove("hidden");
    sectionChange[y].offsetHeight;
    sectionChange[y].classList.add("opacity-100");

    tabChange[y].classList.add("bg-main-red");
}

// Open Side menu

// document.addEventListener("dragend", openSide());

function openSide() { // onclick sur le déclencheur
    const list = document.getElementById("translateList"); // Récupere l'élément à ouvrir ou fermer

    list.classList.toggle("-translate-x-2/3"); // Toggle les classes pour obtenir l'effet de translate
    list.classList.toggle("opacity-40");
    list.classList.toggle("animate-pulse");
}
