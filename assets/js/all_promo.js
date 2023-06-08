function toggleDropdown(id){
    const selectedDropdownButton = document.querySelector(`#${id}`)
    const selectedDropdown = document.querySelector(`#${id} .filter-dropdown`)
    // Active le dropdown correspondant
    selectedDropdownButton.classList.toggle('rounded-b-lg')
    selectedDropdown.classList.toggle('hidden')
}

const projectGrid = document.querySelector('#promo-cards');
const actualPromotion = document.getElementById('actualPromotion');
const yearCheckboxes = document.querySelectorAll("#year-dropdown input");


const getProjets = () => {

    return fetch('?action=promosFilter')
    .then((response) => response.text())
    .then((data) => {
        data = JSON.parse(data);

        return data.projets
    })

}



function getFiltersProjects () {
getProjets()
.then((projets) => {
    loadProjects(projets,1)

    yearCheckboxes.forEach(checkbox => {

        checkbox.addEventListener('change', (e) => {

            loadProjects(projets,1)
        })
    })

})
.catch((error) => {
    console.error(error);
});


function loadProjects(projets,number){

    // * DEFINIT LES FILTRES ANNÉES
    const yearFilters = []
    $bool = "true";

    yearCheckboxes.forEach(checkbox => {
        // * AJOUTE LES CHECKBOX CHECK
        if(checkbox.checked){
            yearFilters.push(checkbox.value);
            actualPromotion.classList.add("bg-main-gray");
            $bool = "false";
        }
        if ($bool == "false"){
            actualPromotion.classList.add("bg-main-gray");
        } else if ($bool == "true"){
            actualPromotion.classList.remove("bg-main-gray");
        }
    })
    // * SI ARRAY VIDE GERE L'ERREUR :
    if(yearFilters.length === 0){
        yearFilters.push('')
    }

    // ! CREATION DE L'ARRAY PROJETS FILTRES A PARTIR DE L'ARRAY TOUS LES PROJETS
        // * CREATION DU NOUVEL ARRAY VIA .MAP
        const filteredProjects = projets
        // * FILTRES ANNÉES
        .filter((projet) => {
            // ? exemple : const yearFilters = ['2023', '2022', '2021', '2018'];
            return yearFilters.some(filter =>
            projet.toLowerCase().includes(filter.toLowerCase())
            );
        })
        .map((projet) => projet)


    // * DEFINIT LE NOMBRE DE PROJETS FILTRES
    const projectsCount = filteredProjects.length
    // console.log(projectsCount)
    // * DEFINT LE NOMBRE TOTAL DE PROJETS
    const allProjectsCount = projets.length
    // * AFFICHE LE NOMBRE DE PROJETS CORRESPONDANTS
    projectGrid.innerHTML = `<h3 id="promo-count" class="w-[100%] text-center text-main-red mt-6 ">${projectsCount} promotions correspondantes sur ${allProjectsCount}</h3>`;


    // * TRANSFORME L'ARRAY EN STRING ET L'INSERE

    projectGrid.innerHTML += filteredProjects.join('');



}
}
getFiltersProjects();

actualPromotion.addEventListener('click', () => {
    yearCheckboxes.forEach(checkbox => {
        checkbox.checked = false;
    })
    getFiltersProjects();
    let dropdownButton = document.querySelector("#year-dropdown");
    let dropdown = document.querySelector('.filter-dropdown');
    dropdown.classList.add("hidden");
    dropdownButton.classList.add("rounded-b-lg");

    // toggleDropdown('year-dropdown');
});
