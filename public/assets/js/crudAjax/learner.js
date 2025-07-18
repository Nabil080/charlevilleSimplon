// loading
function showLoading(){
    learnerTable.innerHTML = '';
    document.querySelector('#loading').innerHTML = `
        <div role="status" class="w-fit mx-auto my-[45vh]">
            <svg aria-hidden="true" class="inline w-20 h-20 text-gray-200 animate-spin fill-red-600" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/>
                <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/>
            </svg>
            <span class="sr-only">Loading...</span>
        </div>
    `
}

function stopLoading(){
    document.querySelector('#loading').innerHTML = ''
}
// NOMBRE DE LIGNES
const rowNumberSelect = document.querySelector('#row-number')
// DIV MODAL
const modalDiv = document.querySelector('#modals')
// PAGINATION
const learnerTable = document.querySelector('tbody');
const paginationDiv = document.querySelector('#pagination');
const prevPage = document.querySelector('#prev-page');
const nextPage = document.querySelector('#next-page');
const firstPage = document.querySelector('#first-page');
const lastPage = document.querySelector('#last-page');
const candidatesRange = document.querySelector('#candidates-range')
const candidateNumber = document.querySelector('#candidates-number')
// FILTRES
const searchInput = document.querySelector('#simple-search');

// Variables nécessaires à la pagination
const paginationRange = 3

let filterString = '';
let filterExecute = '';

const getProjets = (limitStart = 0,limitEnd = 6) => {

    // * DEFINIT LES FILTRES RECHERCHE
    let searchString = searchInput.value ? `(user.user_name LIKE ?
        OR user.user_surname LIKE ?
        OR user.user_description LIKE ?
        OR user.user_place LIKE ?)` : '' ;
        let searchExecute = searchInput.value? `%${searchInput.value}%,%${searchInput.value}%,%${searchInput.value}%,%${searchInput.value}%` : '' ;


        // Récupère un array des filtres non vides
        const filtersArray = [searchString].filter(Boolean);
        const ExecuteArray = [searchExecute].filter(arr => arr.length > 0);
        // les transformes en string pour la requete
        const filterString = filtersArray.join(" AND ");
        const filterExecute = ExecuteArray.join(",");

    return fetch('?action=learnerPagination',{
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
    let projectsPerPage = 5
    if(rowNumberSelect.value > 0 && rowNumberSelect.value < 100){
        projectsPerPage = Number(rowNumberSelect.value)
    }
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
                    paginationDiv.innerHTML += `<li data-active=${page} data-page-count=${pageCount}>
                        <a id="${page}" class="pointer-events-none flex items-center justify-center text-sm py-2 px-3 leading-tight text-main-white bg-main-red border border-gray-300 ">${page}</a>
                    </li>`;
                }else{
                    paginationDiv.innerHTML += `<li>
                        <a id="${page}" class="flex cursor-pointer items-center justify-center text-sm py-2 px-3 leading-tight text-black bg-white border border-gray-300 hover:text-main-white hover:bg-main-red">${page}</a>
                    </li>`;
                }
            }
        }

        // * AJOUTE LES EVENT LISTENERS
        paginationDiv.querySelectorAll('a').forEach(button =>
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

        // * AFFICHE LE NOMBRE DE CANDIDATS CORRESPONDANTS
        if(currentPage != pageCount){
            candidatesRange.innerHTML = `Résultats <span class="font-semibold text-gray-900">${limitStart + 1}-${limitStart + projectsPerPage}</span>`
        }else{
            candidatesRange.innerHTML = `Résultats <span class="font-semibold text-gray-900">${limitStart + 1}-${projectsCount}</span>`
        }
        candidateNumber.innerHTML = `sur <span class="font-semibold text-gray-900">${projectsCount}</span>`
        if(projectsCount === 0){
            candidatesRange.innerHTML = `Aucun utilisateur correspondant.`
            candidateNumber.innerHTML = '';
        }
        // * AFFICHE LES CANDIDATS CORRESPONDANTS
        learnerTable.innerHTML = data.candidates.join('');

        // * CREER LES MODALS :
        modalDiv.innerHTML = data.modals
        const modalButtons = document.querySelectorAll('tbody [data-modal-target], #modals [data-modal-target]')
        modalButtons.forEach(button => {
            button.addEventListener('click',(event) => {
                event.preventDefault()

                let modal = document.getElementById(button.dataset.modalTarget)
                modal.classList.toggle('hidden')
            })
        })

        // * Ajoute script modal contact :
        updateContact()
}

updateData()

let timeoutId;

searchInput.addEventListener('input', (e) => {
    clearTimeout(timeoutId);

    timeoutId = setTimeout(() => {
        updateData();
    }, 500); // Adjust the delay time (in milliseconds) according to your needs
});

firstPage.addEventListener('click', (e) => {
    updateData()
})
prevPage.addEventListener('click', (e) => {
    activePage = document.querySelector("li[data-active]")
    updateData(Number(activePage.dataset.active) - 1)
})

nextPage.addEventListener('click', (e) => {
    activePage = document.querySelector("li[data-active]").dataset.active
    updateData(Number(activePage) + 1)
})
lastPage.addEventListener('click', (e) => {
    pageCount = document.querySelector("[data-page-count]").dataset.pageCount
    updateData(pageCount)
})

rowNumberSelect.addEventListener('change', (e) => {
    updateData()
})