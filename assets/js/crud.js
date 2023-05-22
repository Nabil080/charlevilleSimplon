const aside = document.getElementById("sidebar-multi-level-sidebar");
const dropdown = document.getElementById("dropdown-contact");
const inputs = dropdown.querySelectorAll("input");
const contactButton = document.getElementById("contactValidation");
let bools = [];

for (i = 0; i < inputs.length; i++) {

inputs[i].addEventListener('change', function()  // Event listener sur chaque checkbox
{   
    inputs.forEach(input => bools.push(input.checked)); // Pour chaque checkbox verifie si elle est check (true) est place le boolean dans le tableau bools
    
    const isFalse = (currentValue) => currentValue !== true // Prepare la constante isFalse avec une fonction permettant de tester si la valeur donnée est fausse 

    const bool = bools.every(isFalse); // Applique la function isFalse sur chaque element du tableau bools, renvoie un true si tout les éléments sont faux (donc pas checked)

    if (contactButton.classList.contains("hidden")) { // Si le button est déja caché l'affiche
         contactButton.classList.remove("hidden");
    } else if (bool == true) {  // Si le boolean est true, aucun des inputs est checked, si il est faux au moins des inputs est checked
        contactButton.classList.add("hidden");
    }
    
    bools = []; // Remet le tableau vide à chaque étape pour ne pas garder les précédents tests
})

};

window.addEventListener("scroll", function () { // Ecoute le scroll sur la page

    if (nav.classList.contains("-translate-y-[20vh]") && this.window.screen.width > 762) { // si la navbar est caché fait remonté l'aside jusqu'en haut
        aside.classList.add("-translate-y-20");
    } else {    // Si la navbar apparait fait redescendre l'aside
        aside.classList.remove("-translate-y-20");
    }
});

// Gestion de validation de promotion

const validationForm = document.getElementById("validationForm");
const showValidation = document.getElementById("showValidation");
const inputsValidation = validationForm.getElementsByTagName("input");
let allText = [];
let containerValidation = 0;

for (i = 0; i < inputsValidation.length; i++) {
    inputsValidation[i].addEventListener("change", (e) => {
        let validation = document.getElementById(e.target.dataset.name);

        if (validation == null) {
            if (typeof containerValidation !== 'undefined' && containerValidation !== 0) {
                containerValidation.remove();
            }

            showValidation.insertAdjacentHTML("afterbegin", "<div id='containerValidation'></div>");
            containerValidation = document.getElementById("containerValidation");

            inputs.forEach(input => {
                console.log("salut");
                if (input.checked) {
                    console.log("salut");
                    allText.push(input.dataset.name);
                }
            });

            // let text = "<p id='" + e.target.dataset.name + "'>" + e.target.dataset.name + "</p>";
            // allText.push(text);
            allText = allText.sort();
            finalText = allText.join("");

            containerValidation.insertAdjacentHTML("afterbegin", finalText);
        
        } else {
            console.log(validation.outerHTML);
            console.log(allText[1]);

            
            validation.remove();
            allText.splice(index);
            console.log("cet élement existe déja");
        }
    });
};

