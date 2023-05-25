function toggleDropdown(id){
    const selectedDropdownButton = document.querySelector(`#${id}`)
    const selectedDropdown = document.querySelector(`#${id} .filter-dropdown`)
    // Active le dropdown correspondant
    selectedDropdownButton.classList.toggle('rounded-b-lg')
    selectedDropdown.classList.toggle('hidden')
}

const projectGrid = document.querySelector('#project-cards');
const searchInput = document.querySelector('#project-search');
const formationCheckboxes = document.querySelectorAll("#formation-dropdown input");
const yearCheckboxes = document.querySelectorAll("#year-dropdown input");
const levelCheckboxes = document.querySelectorAll("#level-dropdown input");


const getProjets = () => {

    return fetch('?action=projectsPagination')
    .then((response) => response.text())
    .then((data) => {
        data = JSON.parse(data);

        return data.projets
    })

}

getProjets()
.then((projets) => {
    loadProjects(projets)

    formationCheckboxes.forEach(checkbox => {
        checkbox.addEventListener('change', (e) => {
            loadProjects(projets)
        })
    })

    yearCheckboxes.forEach(checkbox => {
        checkbox.addEventListener('change', (e) => {
            loadProjects(projets)
        })
    })

    levelCheckboxes.forEach(checkbox => {
        checkbox.addEventListener('change', (e) => {
            loadProjects(projets)
        })
    })

    searchInput.addEventListener('input', (e) => {
        loadProjects(projets)
    })
})
.catch((error) => {
    console.error(error);
});


function loadProjects(projets){

    // * DEFINIT LES FILTRES FORMATION
    const formationFilters = [];
    formationCheckboxes.forEach(checkbox => {
        // * AJOUTE LES CHECKBOX CHECK
        if(checkbox.checked){
            formationFilters.push(checkbox.value)
        }
    })
    // * SI ARRAY VIDE GERE L'ERREUR :
    if(formationFilters.length === 0){
        formationFilters.push('')
    }
    // console.log(formationFilters)

    // TODO: DEFINIT LES FILTRES ANNÉES
    const yearFilters = []
    yearCheckboxes.forEach(checkbox => {
        // * AJOUTE LES CHECKBOX CHECK
        if(checkbox.checked){
            yearFilters.push(checkbox.value)
        }
    })
    // * SI ARRAY VIDE GERE L'ERREUR :
    if(yearFilters.length === 0){
        yearFilters.push('')
    }
    console.log(yearFilters)

    // TODO: DEFINIT LES FILTRES NIVEAUX
    const levelFilters = []
    levelCheckboxes.forEach(checkbox => {
        // * AJOUTE LES CHECKBOX CHECK
        if(checkbox.checked){
            levelFilters.push(checkbox.value)
        }
    })
    // * SI ARRAY VIDE GERE L'ERREUR :
    if(levelFilters.length === 0){
        levelFilters.push('')
    }
    // console.log(levelFilters)

    // ! CREATION DE L'ARRAY PROJETS FILTRES A PARTIR DE L'ARRAY TOUS LES PROJETS
        // * CREATION DU NOUVEL ARRAY VIA .MAP
        const filteredProjects = projets
        // * FILTRES FORMATIONS
        .filter((projet) => {
            // ? exemple : const formationFilters = ['concepteurs développeurs', 'web', 'Référent'];
            return formationFilters.some(filter =>
            projet.toLowerCase().includes(filter.toLowerCase())
            );
        })
        // * FILTRES ANNÉES
        .filter((projet) => {
            // ? exemple : const yearFilters = ['2023', '2022', '2021', '2018'];
            return yearFilters.some(filter =>
            projet.toLowerCase().includes(filter.toLowerCase())
            );
        })
        // * FILTRES NIVEAUX
        .filter((projet) => {
            // ? exemple : const levelFilters = ['Bac+5', 'Bac+4', 'Bac+3', 'Bac+2', 'Bac+1'];
            return levelFilters.some(filter =>
            projet.toLowerCase().includes(filter.toLowerCase())
            );
        })
        // * FILTRES RECHERCHE
        .filter((projet) =>
            projet.toLowerCase().includes(searchInput.value.toLowerCase())
        )
        .map((projet) => projet)


    // * DEFINIT LE NOMBRE DE PROJETS FILTRES
    const projectsCount = filteredProjects.length
    console.log(projectsCount)
    // * DEFINT LE NOMBRE TOTAL DE PROJETS
    const allProjectsCount = projets.length
    // * AFFICHE LE NOMBRE DE PROJETS CORRESPONDANTS
    projectGrid.innerHTML = `<h3 id="project-count" class="max-w-[766px] text-main-red mt-6 col-span-2">${projectsCount} projets correspondants sur ${allProjectsCount}</h3>`;

    // * LIMITE LES LES PROJETS AFFICHEES
    const limitedProjects = filteredProjects.slice(0,6)
    // * TRANSFORME L'ARRAY EN STRING ET L'INSERE
    projectGrid.innerHTML += limitedProjects.join('');
}
