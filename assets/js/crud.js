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