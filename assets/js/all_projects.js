function searchByInputAndClassName(input,className)
{
    const search = input.value;
    console.log(search);
    var projects = document.getElementsByClassName(className);
    console.log(projects);

    for (var i = 0, len = projects.length; i < len; ++i) {

        if(projects[i].innerHTML.toLowerCase().indexOf(search.toLowerCase()) === -1) {
            projects[i].classList.add('!hidden');
        }else{
            projects[i].classList.remove('!hidden');
        }
    }
}

function toggleDropdown(id){
    const selectedDropdownButton = document.querySelector(`#${id}`)
    const allDropdownButtons = document.querySelectorAll('.dropdown-toggle')
    const selectedDropdown = document.querySelector(`#${id} .filter-dropdown`)
    const allDropdowns = document.querySelectorAll('.dropdown')


    // // Réinitialise les autres dropdown
    // allDropdownButtons.forEach(dropdownButton => {
    //     if(dropdownButton.id != id){
    //     dropdownButton.classList.add('rounded-b-lg')
    //     }
    // })
    // allDropdowns.forEach(dropdown => dropdown.classList.add('hidden'))

    // Active le dropdown correspondant
    selectedDropdownButton.classList.toggle('rounded-b-lg')
    selectedDropdown.classList.toggle('hidden')
}


// window.onload = () => changePage(1);

// const changePage = number => {
//     const projectGrid = document.querySelector('#project-cards')
//     const paginationButtons = document.querySelectorAll('#pagination a');


//     let pageNumber = number;

//     const projectsCount = 9
//     const projectsPerPage = 6
//     const totalPages = Math.ceil(projectsCount/projectsPerPage)

//     let initialPage = (pageNumber-1)*projectsPerPage
//     let limitRequest = `${initialPage}, ${projectsPerPage}`;
//     // console.log(limitRequest);

//     fetch('?action=projectsPagination',{
//         method: 'POST',
//         body:JSON.stringify({request: limitRequest})
//     })
//     .then((response) => {
//         // console.log(response.text())

//         return response.text()
//     })
//     .then((data) => {2
//         data = JSON.parse(data);
//         projectGrid.innerHTML = data.projets
//     })
// }

const projectGrid = document.querySelector('#project-cards');
const searchInput = document.querySelector('#project-search');

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


    searchInput.addEventListener('input', e => {

            // * UTILISE L'ARRAY PROJETS
            const limitedProjects = projets
            // * FILTRE DE RECHERCHE
            .filter((projet) => projet.toLowerCase().includes(searchInput.value.toLowerCase()))
            // * FILTRE DE LIMITE
            .slice(0, 6)
            // * CREER LE NOUVEL ARRAY
            .map((projet) => projet)
            // * CONVERTIS L'ARRAY EN UN STRING
            .join('');

        // * REMPLACE LA GRILLE PROJETS
        projectGrid.innerHTML = limitedProjects
    })

  })
  .catch((error) => {
    console.error(error);
  });
