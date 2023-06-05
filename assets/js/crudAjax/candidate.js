// PAGINATION
const candidateTable = document.querySelector('tbody');
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
const projectsPerPage = 2
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
        console.log(`requête envoyée :  WHERE ${filterString}`)
        console.log(`execute envoyée : [${filterExecute}]`)

    return fetch('?action=candidatePagination',{
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
    // showLoading()
    console.log(currentPage);
    let limitStart = (currentPage - 1) * projectsPerPage
    let limitEnd = projectsPerPage
    // console.log(limitStart,limitEnd)

    data = await getProjets(limitStart,limitEnd)
        // stopLoading()
        console.log(data);

        // TODO: CREATION DE LA PAGINATION

        let prevRange = ( currentPage - 1 ) * projectsPerPage
        let nextRange = (currentPage * projectsPerPage )
        // console.log(prevRange,nextRange)
        // console.log(currentPage)
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
            candidatesRange.innerHTML = `${limitStart + 1}-${limitStart + projectsPerPage}`
        }else{
            candidatesRange.innerHTML = `${limitStart + 1}-${projectsCount}`
        }
        candidateNumber.innerHTML = projectsCount
        // * AFFICHE LES CANDIDATS CORRESPONDANTS
        candidateTable.innerHTML = data.candidates.join('');

        // * CREER LES MODALS :
        const modalButtons = document.querySelectorAll('tbody [data-modal-target]')
        console.log(modalButtons)
        modalButtons.forEach(button => {
            button.addEventListener('click',(event) => {
                event.preventDefault()

                // alert(button.dataset.modalTarget)
                let modal = document.getElementById(button.dataset.modalTarget)
                modal.classList.toggle('hidden')
            })
        })

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