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


window.onload = () => changePage(1);

const changePage = number => {
    const projectGrid = document.querySelector('#project-cards')
    const paginationButtons = document.querySelectorAll('#pagination a');


    let pageNumber = number;

    const projectsCount = 9
    const projectsPerPage = 6
    const totalPages = Math.ceil(projectsCount/projectsPerPage)

    let initialPage = (pageNumber-1)*projectsPerPage
    let limitRequest = `${initialPage}, ${projectsPerPage}`;
    // console.log(limitRequest);

    fetch('?action=projectsPagination',{
        method: 'POST',
        body:JSON.stringify({request: limitRequest})
    })
    .then((response) => {
        // console.log(response.text())

        return response.text()
    })
    .then((data) => {2
        projectGrid.innerHTML = ""
        data = JSON.parse(data);

        data.projets.forEach(projet => {

            let projectTags = ""
            projet.tags.forEach(tag => {
                projectTags += `<tag>${tag.name}</tag>`
            })

            let projectTeam = ""
            projet.team.forEach(user => {
                projectTeam += `
                <a href="?action=profilePage&id=${user.id}" class="hover:border border-main-gray hover:text-main-gray hover:bg-main-white">
                    ${user.surname}
                </a>`
            })

            // console.log(projet)
            projectGrid.insertAdjacentHTML('beforeend',
            `
            <!-- card projet 1 -->
        <article id="projet-card-1"
            class="project-card max-w-[766px] border-2 border-black rounded-lg p-4 mb-8 md:flex gap-6 md:p-6 md:mx-auto">
            <!-- partie entreprise desktop -->
            <div class="hidden md:block w-1/3 border-r-2 border-main-gray pr-6">
                <div class="my-2 flex-col">
                    <div class="flex flex-wrap">
                        <p class="font-title font-bold mr-2">Projet fourni par : </p>
                        <p><a href="${projet.company_link}" target="_blank" class="text-main-red underline font-bold text-sm">${projet.company_name}</a></p>
                    </div>
                    <div class="my-4 grow"><img class="" src="${projet.company_image}" alt="logo de l\'entreprise"></div>
                    <div class="flex flex-wrap">
                        <p class="font-title font-bold mr-2">Adresse :</p>
                        <p class="text-sm pt-0.5 text-left font-light">${projet.company_adress}</p>
                    </div>
                </div>
            </div>
            <!-- partie info projet -->
            <div class="flex-col text-[12px] flex text-end md:w-2/3">
                <!-- tags projet -->
                <div
                    class="uppercase space-x-4 my-4 [&>tag]:bg-main-gray [&>tag]:bg-opacity-10 [&>tag]:py-2 [&>tag]:px-4 [&>tag]:rounded-full">
                    ${projectTags}
                    <tag>React</tag>
                </div>
                <!-- titre projet -->
                <h2 class="font-title text-main-red italic font-bold text-3xl my-2"><a href="?action=projetPage&id=${projet.id}">${projet.name}</a></h2>
                <div class="self-end flex w-3/4 justify-between italic border-b border-main-red">
                    <span>Débuté le ${projet.start}</span>
                    <span>Fini le ${projet.end}</span></div>
                <!-- contenu projet -->
                <div class="text-base flex-grow flex-col">
                    <p class="pl-[20%] line-clamp-5 mt-2 mb-4">${projet.description}</p>
                    <div id="end" class="mt-auto">
                        <a href="page de la promo"
                            class="bg-main-red py-2 px-4 rounded-full text-main-white my-2 hover:bg-main-white hover:text-main-red hover:border border-main-red">
                            ${projet.name}
                        </a>
                        <div
                            class="space-x-4 mt-4 mb-2 text-sm text-main-white [&>a]:bg-main-gray [&>a]:py-1 [&>a]:px-3 [&>a]:rounded-full">
                            ${projectTeam}
                        </div>
                        <a href="?action=projetPage&id=${projet.id}" class="block float-left text-xs">
                        Voir le projet <i class="fa fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>
            <!-- séparateur mobile-->
            <div class="md:hidden w-4/5 mx-auto bg-main-gray bg-opacity-50 h-0.5 my-4"></div>
            <!-- partie info entreprise mobile-->
            <div class="md:hidden my-2">
                <div class="flex flex-wrap">
                    <p class="font-title font-bold mr-2">Projet fourni par : </p>
                    <p><a href="${projet.company_link}" class="text-main-red underline font-bold text-sm">${projet.company_name}</a></p>
                </div>
                <div class="flex flex-wrap">
                    <p class="font-title font-bold mr-2">Adresse :</p>
                    <p class="text-sm pt-0.5 text-left font-light">${projet.company_adress}</p>
                </div>
            </div>
        </article>

            `
            )
        })
    })
}
