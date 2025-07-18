function toggleDropdown(id){
    const selectedDropdownButton = document.querySelector(`#${id}`)
    const selectedDropdown = document.querySelector(`#${id} .filter-dropdown`)
    // Active le dropdown correspondant
    selectedDropdownButton.classList.toggle('rounded-b-lg')
    selectedDropdown.classList.toggle('hidden')
}

function closeAllDropdowns(){
    document.querySelectorAll('.filter-dropdown').forEach(dropdown => dropdown.classList.add('hidden'))
    document.querySelectorAll('.dropdown-toggle').forEach(toggle => toggle.classList.add('rounded-b-lg'))
}

function showLoading(){
    projectGrid.innerHTML = `
        <div role="status" class="w-fit mx-auto my-12 col-span-2">
            <svg aria-hidden="true" class="inline w-20 h-20 text-gray-200 animate-spin fill-red-600" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/>
                <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/>
            </svg>
            <span class="sr-only">Loading...</span>
        </div>
    `
    document.querySelector('#pagination-section').classList.add('hidden')
}

function stopLoading(){
    projectGrid.innerHTML = ''
    document.querySelector('#pagination-section').classList.remove('hidden')
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

// pagination
let projectsPerPage = 6;
let paginationRange = 3
// filtres
let filterString = '';
let filterExecute = '';



const getProjets = (limitStart = 0,limitEnd = 6) => {

    formationFilters = [];
    // * DEFINIT LES FILTRES FORMATION
    formationCheckboxes.forEach(checkbox => {
        // * AJOUTE LES CHECKBOX CHECK
        if(checkbox.checked){
            formationFilters.push(checkbox.dataset.formationId)
        }
    })
    let formationString = formationFilters.map(id => `promo.formation_id = ?`).join(' OR ') ;
    if(formationString != ""){formationString = `(${formationString})`}
    let formationExecute = formationFilters.map(id => `${id}`)

    // * DEFINIT LES FILTRES ANNÉES
    const yearFilters = []
    yearCheckboxes.forEach(checkbox => {
        // * AJOUTE LES CHECKBOX CHECK
        if(checkbox.checked){
            yearFilters.push(checkbox.dataset.year)
        }
    })
    let yearString = yearFilters.map(year => `YEAR(project. project_start) = ?`).join(' OR ') ;
    if(yearString != ""){yearString = `(${yearString})`}
    let yearExecute = yearFilters.map(year => `${year}`)

    // * DEFINIT LES FILTRES NIVEAUX
    const levelFilters = []
    levelCheckboxes.forEach(checkbox => {
        // * AJOUTE LES CHECKBOX CHECK
        if(checkbox.checked){
            levelFilters.push(checkbox.dataset.level)
        }
    })
    let levelString = levelFilters.map(level => `formation.formation_level = ?`).join(' OR ') ;
    if(levelString != ""){levelString = `(${levelString})`}
    let levelExecute = levelFilters.map(level => `${level}`)

    // * DEFINIT LES FILTRES RECHERCHE
    let searchString = searchInput.value ? `(project.project_name LIKE ?
    OR project.project_description LIKE ?
    OR project.project_notes LIKE ?
    OR project.project_company_name LIKE ?)` : '' ;
    let searchExecute = searchInput.value? `%${searchInput.value}%,%${searchInput.value}%,%${searchInput.value}%,%${searchInput.value}%` : '' ;


    // Récupère un array des filtres non vides
    const filtersArray = [formationString, yearString, levelString,searchString].filter(Boolean);
    const ExecuteArray = [formationExecute, yearExecute, levelExecute,searchExecute].filter(arr => arr.length > 0);
    // les transformes en string pour la requete
    const filterString = filtersArray.join(" AND ");
    const filterExecute = ExecuteArray.join(",");
    return fetch('?action=allProjectsPagination',{
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({
            limitStart: limitStart,
            limitEnd: limitEnd,
            filter: filterString,
            execute: filterExecute
        })
    })
    .then((data) => data.json())
}

async function updateData(currentPage = 1){
        showLoading()
    let limitStart = (currentPage - 1) * projectsPerPage
    let limitEnd = projectsPerPage

    data = await getProjets(limitStart,limitEnd)
        stopLoading()

        // TODO: CREATION DE LA PAGINATION

        let prevRange = ( currentPage - 1 ) * projectsPerPage
        let nextRange = (currentPage * projectsPerPage )
        const allProjectsCount = data.total
        let projectsCount = data.filtered
        let pageCount = Math.ceil(projectsCount / projectsPerPage);


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
                    paginationDiv.innerHTML += `<button id="${page}" data-active="${page}" class="bg-main-red text-main-white pointer-events-none ">${page}</button>`;
                }else{
                    paginationDiv.innerHTML += `<button id="${page}" class="hover:bg-main-red hover:text-main-white">${page}</button>`;
                }
            }
        }

        // * AJOUTE LES EVENT LISTENERS
        paginationDiv.querySelectorAll('button').forEach(button => 
        {
            button.addEventListener('click', (e) => {
                updateData(Number(e.target.id))
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

        // * AFFICHE LE NOMBRE DE PROJETS CORRESPONDANTS
        projectGrid.innerHTML = `<h3 id="project-count" class="max-w-[766px] text-main-red mt-6 xl:col-span-2" data-page-count="${pageCount}">${projectsCount} projets correspondants sur ${allProjectsCount}</h3>`;
        // * AFFICHE LES PROJETS CORRESPONDANTS
        projectGrid.innerHTML += data.projets.join('');
        // * SCROLL EN BAS
        if(currentPage != 1){
            document.querySelector('footer').scrollIntoView();
        }

}

// lance la fonction au départ + a chaque changement de filtre
updateData();

let timeoutId;

searchInput.addEventListener('input', (e) => {
    clearTimeout(timeoutId);

    timeoutId = setTimeout(() => {
        updateData();
    }, 500); 
});

formationCheckboxes.forEach(checkbox => {
    checkbox.addEventListener('change', (e) => {
        updateData()
    })
})

yearCheckboxes.forEach(checkbox => {
    checkbox.addEventListener('change', (e) => {
        updateData()
    })
})

levelCheckboxes.forEach(checkbox => {
    checkbox.addEventListener('change', (e) => {
        updateData()
    })
})


filterReset.addEventListener('click', (e) => {
    document.querySelectorAll('input[type=checkbox]').forEach(checkbox => {
        checkbox.checked = false
    })
    closeAllDropdowns();
    updateData();
})

firstPage.addEventListener('click', (e) => {
    updateData()
})
prevPage.addEventListener('click', (e) => {
    activePage = document.querySelector("button[data-active]")
    updateData(Number(activePage.dataset.active) - 1)
})

nextPage.addEventListener('click', (e) => {
    activePage = document.querySelector("button[data-active]").dataset.active
    updateData(Number(activePage) + 1)
})
lastPage.addEventListener('click', (e) => {
    pageCount = document.querySelector("[data-page-count]").dataset.pageCount
    updateData(pageCount)
})
