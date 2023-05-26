function toggleDropdown(id){
    const selectedDropdownButton = document.querySelector(`#${id}`)
    const selectedDropdown = document.querySelector(`#${id} .filter-dropdown`)
    // Active le dropdown correspondant
    selectedDropdownButton.classList.toggle('rounded-b-lg')
    selectedDropdown.classList.toggle('hidden')
}

const projectGrid = document.querySelector('#project-cards');
const paginationDiv = document.querySelector('#pagination');
const prevPage = document.querySelector('#prev-page');
const nextPage = document.querySelector('#next-page');
const firstPage = document.querySelector('#first-page');
const lastPage = document.querySelector('#last-page');

const searchInput = document.querySelector('#project-search');
const formationCheckboxes = document.querySelectorAll("#formation-dropdown input");
const yearCheckboxes = document.querySelectorAll("#year-dropdown input");
const levelCheckboxes = document.querySelectorAll("#level-dropdown input");
const filterReset = document.querySelector('#filter-reset');

let currentPage = 1

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
    loadProjects(projets,1)

    formationCheckboxes.forEach(checkbox => {
        checkbox.addEventListener('change', (e) => {
            loadProjects(projets,1)
        })
    })

    yearCheckboxes.forEach(checkbox => {
        checkbox.addEventListener('change', (e) => {
            loadProjects(projets,1)
        })
    })

    levelCheckboxes.forEach(checkbox => {
        checkbox.addEventListener('change', (e) => {
            loadProjects(projets,1)
        })
    })

    searchInput.addEventListener('input', (e) => {
        loadProjects(projets,1)
    })

    filterReset.addEventListener('click', (e) => {
        document.querySelectorAll('input[type=checkbox]').forEach(checkbox => {
            checkbox.checked = false
        })
        loadProjects(projets,1)
    })

    firstPage.addEventListener('click', (e) => {
        loadProjects(projets,1)
    })
    prevPage.addEventListener('click', (e) => {
        loadProjects(projets,currentPage - 1)
    })

    nextPage.addEventListener('click', (e) => {
        loadProjects(projets,currentPage + 1)
    })
    lastPage.addEventListener('click', (e) => {
        loadProjects(projets,'last')
    })

})
.catch((error) => {
    console.error(error);
});


function loadProjects(projets,number){

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

    // * DEFINIT LES FILTRES ANNÉES
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
    // console.log(yearFilters)

    // * DEFINIT LES FILTRES NIVEAUX
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
    // console.log(projectsCount)
    // * DEFINT LE NOMBRE TOTAL DE PROJETS
    const allProjectsCount = projets.length
    // * AFFICHE LE NOMBRE DE PROJETS CORRESPONDANTS
    projectGrid.innerHTML = `<h3 id="project-count" class="max-w-[766px] text-main-red mt-6 xl:col-span-2">${projectsCount} projets correspondants sur ${allProjectsCount}</h3>`;


    // TODO: CREATION DE LA PAGINATION
    // * VARIABLES POUR LA PAGINATION
    let projectsPerPage = 4;
    let pageCount = Math.ceil(projectsCount / projectsPerPage);
    let paginationRange = 3
    currentPage = number
    if(number == 'last'){currentPage = pageCount}

    const prevRange = ( currentPage - 1 ) * projectsPerPage
    const nextRange = (currentPage * projectsPerPage ) 
    console.log(prevRange,nextRange)
    // console.log(currentPage)

    
    // * ACTIVE/DESACTIVE BOUTON PRECEDENT
    if(currentPage == 1){
        firstPage.classList.add('opacity-30', 'select-none', 'pointer-events-none')
        prevPage.classList.add('opacity-30', 'select-none', 'pointer-events-none')
    }else{
        firstPage.classList.remove('opacity-30', 'select-none', 'pointer-events-none')
        prevPage.classList.remove('opacity-30', 'select-none', 'pointer-events-none')
    }

    // * AFFICHE LA PAGINATION
    paginationDiv.innerHTML = '';
    for(page = 1; page <= pageCount; page++){
        if(page > currentPage - paginationRange && page < currentPage + paginationRange){
            if(page == currentPage){
                paginationDiv.innerHTML += `<button id="${page}" class="bg-main-red text-main-white">${page}</button>`;
            }else{
                paginationDiv.innerHTML += `<button id="${page}" class="hover:bg-main-red hover:text-main-white">${page}</button>`;
            }
        }
    }
    // * AJOUTE LES EVENT LISTENERS
    paginationDiv.querySelectorAll('button').forEach(button => 
    {
        button.addEventListener('click', (e) => {
            console.log(Number(e.target.id))
            loadProjects(projets,Number(e.target.id))
        })
    })

    // * ACTIVE/DESACTIVE BOUTON SUIVANT
    if(currentPage == pageCount){
        lastPage.classList.add('opacity-30','select-none', 'pointer-events-none')
        nextPage.classList.add('opacity-30', 'select-none', 'pointer-events-none')
    }else{
        lastPage.classList.remove('opacity-30','select-none', 'pointer-events-none')
        nextPage.classList.remove('opacity-30', 'select-none', 'pointer-events-none')
    }

    // * LIMITE LES LES PROJETS AFFICHEES
    const limitedProjects = filteredProjects.slice(prevRange,nextRange)
    // * TRANSFORME L'ARRAY EN STRING ET L'INSERE
    projectGrid.innerHTML += limitedProjects.join('');



}
