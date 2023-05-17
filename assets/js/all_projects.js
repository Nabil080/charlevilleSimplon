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

function showPageProjects(currentPage){
    const projectsList = document.querySelectorAll('#project-cards article')
    // console.log(projectsList)
    const projectsCount = projectsList.length
    const projectsPerPage = 6
    const totalPages = Math.ceil(projectsCount/projectsPerPage)
    const prevRange = ( currentPage - 1 ) * projectsPerPage
    const nextRange = (currentPage * projectsPerPage ) - 1

    projectsList.forEach(e => e.classList.add('hidden','2xl:hidden'))

    projectsList.forEach( (project, index) => {
        if ( index >= prevRange && index <= nextRange){
            project.classList.remove('hidden','2xl:hidden')
        }
    })
}

showPageProjects(1)

const paginationList = document.querySelectorAll("#pagination div a")

paginationList.forEach((pagination, index) => {
    pagination.addEventListener('click',event => {
        event.preventDefault()

        showPageProjects(index+1)
    })
})