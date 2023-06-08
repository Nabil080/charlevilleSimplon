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

    const nav = document.querySelector("nav");
    if (nav.classList.contains("-translate-y-[20vh]") && this.window.screen.width > 762) { // si la navbar est caché fait remonté l'aside jusqu'en haut
        aside.classList.add("-translate-y-20");
    } else {    // Si la navbar apparait fait redescendre l'aside
        aside.classList.remove("-translate-y-20");
    }
});


function validationForm(){
// Gestion de validation de promotion

    const validationForm = document.querySelectorAll("form.validationForm");
    validationForm.forEach(form => {
        // console.log(form);
        const validationDiv = form.querySelector(".validationDiv")
        // console.log(validationDiv);
        const showValidation = form.querySelector(".showValidation");
        // console.log(showValidation);
        const inputsValidation = validationDiv.querySelectorAll("input");
        const numberCheckedContainer = form.querySelector(".numberChecked");
        let containerValidation = 0;
        let reset = 0;

        
    for (i = 0; i < inputsValidation.length; i++) { // Pour chaque input
        inputsValidation[i].addEventListener("change", (e) => { // Surveille si un input change
                if (typeof containerValidation !== 'undefined' && containerValidation !== 0) { // Si le container des input est déja défini, le supprime
                    containerValidation.remove();
                }

                let allText = [];  // Remet le tableau qui contient les input en vide
                let boolInput = true; // Défini un booléan
                let numberChecked = 0; // Réinitialise le nombre des inputs checked
                numberCheckedContainer.textContent = ""; // Réinitialise le container de comptage des inputs checked

                showValidation.insertAdjacentHTML("beforeend", "<div class='pl-4 transition-all' id='containerValidation'></div>"); // Crée la div qui contient les input
                containerValidation = document.getElementById("containerValidation"); // Relie la variable au container crée
                
                inputsValidation.forEach(input => { // pour chaque input verifie si elle est checked
                    if (input.checked) {
                        let text = "<p id='" + input.dataset.name + "'>" + input.dataset.name + "</p>" // Si il est checked crée un element p avec les infos transmis par l'input
                        allText.push(text); // Insère dans le tableau chaque element checked
                        boolInput = false; // Si un des inputs est checked change le boolean
                        numberChecked ++; // Ajoute +1 pour chaque input checked
                    }
                });
                allText = allText.sort(); // Trie tout les elements par ordre alphabétique
                finalText = allText.join(""); // Transforme l'array en string
                containerValidation.insertAdjacentHTML("afterbegin", finalText); // Ajoute tout les éléments selectionnés dans le container
                if (boolInput == false) { // Si le bool est faux un des inputs est checked donc ajoute un ring vert
                    showValidation.classList.add("ring-green-500", "ring")
                } else if (boolInput !== false) { // Enlève les class si le bool est true
                    showValidation.classList.remove("ring-green-500", "ring");
                }
                numberCheckedContainer.textContent += numberChecked; // Rajoute en texte le nombre d'elements checked
        });
    };

    })
}



