<?php $title = "Les projets"; ?>

<?php
        $projectRepo = new ProjectRepository;
        $projects = $projectRepo->getAllProjects();
        // pagination
        $pageNumber = isset($_GET['page']) ? intval($_GET['page']) : 1 ;
        $limit = 6;
        $initialPage = ($pageNumber-1)*$limit;
        // syntaxe requete avec limit
        $limitRequest = $initialPage.",".$limit;
        $pageCount = ceil(count($projects)/$limit);

        $projects = $projectRepo->getAllProjects($limitRequest);
        if(sizeof($projects) == 0){
            echo '<script>window.location.href = "?action=allProjectsPage"</script>';
        }
        // var_dump($projects);

?>

<?php ob_start(); ?>

<h1 class="px-4 text-main-red font-title font-semibold text-center text-2xl sm:text-3xl lg:text-[40px]">Les projets réalisés à <span class="italic">Simplon Charleville</span></h1>

<!-- section tous les projets -->
<section id="all-projects" class="px-4 2xl:mx-6">
    <!-- barre de recherche -->
    <div class="relative w-full 2xl:w-4/5 mx-auto mt-4">
        <input id="project-search" class="border-main-red rounded-lg w-full pl-10 py-4 placeholder:text-black focus:border-green-50" placeholder="Votre recherche" type="search" oninput="searchByInputAndClassName(this,'project-card')">
        <i class="fa fa-search absolute top-0 left-0 w-10 text-center text-xl py-4"></i>
    </div>
    <!-- boutons de filtre -->
    <span class="text-main-red text-xs py-0.5 2xl:mx-[10%]">Filtrer par :</span>
    <div class="2xl:mx-[10%] flex justify-start text-xs sm:text-sm gap-x-4 sm:[&>button]:w-1/4 [&>button]:px-2 sm:[&>button]:px-4 [&>button]:py-2 [&>button]:border-main-red [&>button]:border [&>button]:rounded-lg">
        <div id="formation-dropdown" class="dropdown-toggle w-1/4 border-main-red border rounded-t-lg rounded-b-lg sm:relative">
        <button onclick="toggleDropdown('formation-dropdown')" class="relative w-full py-2"><i class="fa fa-filter text-xs"></i> Formation</button>
        <!-- dropdown formations -->
            <div class="filter-dropdown dropdown hidden absolute box-content -translate-x-[1px] z-10 w-[calc(100%-2rem)] sm:w-full -translate-y-1 border rounded-b-lg rounded-tr-lg sm:rounded-tr-none text-start bg-main-white sm:border-t-transparent border-main-red">
                <div class="flex gap-2 text-xs my-2 px-2"><input class="my-auto" id="dev" type="checkbox" value="dev"><label for="dev">Développeur Web et Web Mobile</label></div>
                <div class="flex gap-2 text-xs my-2 px-2"><input class="my-auto" id="cda" type="checkbox" value="cda"><label for="cda">Concepteur développeur d'applications</label></div>
                <div class="flex gap-2 text-xs my-2 px-2"><input class="my-auto" id="tssr" type="checkbox" value="tssr"><label for="tssr">Technicien supérieur système et réseaux</label></div>
                <div class="flex gap-2 text-xs my-2 px-2"><input class="my-auto" id="ref-dig" type="checkbox" value="ref-dig"><label for="ref-dig">Référent digital</label></div>
            </div>
        </div>
        <div id="years-dropdown" class="dropdown-toggle w-1/4 border-main-red border rounded-t-lg rounded-b-lg relative">
        <button onclick="toggleDropdown('years-dropdown')" class="relative w-full py-2"><i class="fa fa-filter text-xs"></i> Années</button>
        <!-- dropdown yearss -->
            <div class="filter-dropdown dropdown hidden absolute box-content -translate-x-[1px] z-10 w-full sm:w-full -translate-y-1 border rounded-b-lg text-start bg-main-white border-t-transparent border-main-red">
                <div class="flex gap-2 text-xs my-2 px-2"><input class="my-auto" id="2023" type="checkbox" value="2023"><label for="2023">2023</label></div>
                <div class="flex gap-2 text-xs my-2 px-2"><input class="my-auto" id="2022" type="checkbox" value="2022"><label for="2022">2022</label></div>
                <div class="flex gap-2 text-xs my-2 px-2"><input class="my-auto" id="2021" type="checkbox" value="2021"><label for="2021">2021</label></div>
                <div class="flex gap-2 text-xs my-2 px-2"><input class="my-auto" id="2020" type="checkbox" value="2020"><label for="2020">2020</label></div>
            </div>
        </div>
        <div id="level-dropdown" class="dropdown-toggle w-1/4 border-main-red border rounded-t-lg rounded-b-lg relative">
        <button onclick="toggleDropdown('level-dropdown')" class="relative w-full py-2"><i class="fa fa-filter text-xs"></i> Niveau</button>
        <!-- dropdown yearss -->
            <div class="filter-dropdown dropdown hidden absolute box-content -translate-x-[1px] z-10 w-full sm:w-full -translate-y-1 border rounded-b-lg text-start bg-main-white border-t-transparent border-main-red">
                <div class="flex gap-2 text-xs my-2 px-2"><input class="my-auto" id="bac+1" type="checkbox" value="bac+1"><label for="bac+1">Bac+1</label></div>
                <div class="flex gap-2 text-xs my-2 px-2"><input class="my-auto" id="bac+2" type="checkbox" value="bac+2"><label for="bac+2">Bac+2</label></div>
                <div class="flex gap-2 text-xs my-2 px-2"><input class="my-auto" id="bac+3" type="checkbox" value="bac+3"><label for="bac+3">Bac+3</label></div>
                <div class="flex gap-2 text-xs my-2 px-2"><input class="my-auto" id="bac+4" type="checkbox" value="bac+4"><label for="bac+4">Bac+4</label></div>
                <div class="flex gap-2 text-xs my-2 px-2"><input class="my-auto" id="bac+5" type="checkbox" value="bac+5"><label for="bac+5">Bac+5</label></div>
            </div>
        </div>
    </div>
    <span onclick="resetProjectFilters()" class="text-main-red text-xs py-0.5 cursor-pointer underline hover:text-red-700 2xl:mx-[10%]">Réinitialiser les filtres</span>


    <section id="project-cards" class="mt-2 grid gap-6 xl:grid-cols-2 w-fit mx-auto">
        <h3 class="max-w-[766px] text-main-red xl:col-span-2">10 projets correspondants sur 72</h3>

        <?php
        foreach($projects as $project){
            include('view/template/_project_card.php');
        }
        ?>


    </section>

    <!-- pagination -->
    <section id="pagination" class="flex justify-center text-md ">
    <a href="?action=allProjectsPage&page=<?=$pageNumber-1?>" class="fa fa-chevron-left my-auto mx-3 px-3 <?php if($pageNumber == 1){ echo 'opacity-30 select-none pointer-events-none';}?>"></a>
    <div id="pagination" class="flex gap-x-0.5 [&>a]:px-4 [&>a]:py-0.5 [&>a]:rounded-md">
        <?php for($i=1;$i<=$pageCount;$i++){
                if($i > $pageNumber - 3 && $i < $pageNumber + 3){?>
                    <a id="pagination-<?=$i?>" onclick="changePage(<?=$i?>)" class="hover:bg-main-red hover:text-main-white cursor-pointer <?php echo $i == $pageNumber ? " bg-main-red text-main-white " : " "; ?>"><?=$i?></a>
                <?php }} ?>
    </div>
    <a href="?action=allProjectsPage&page=<?=$pageNumber+1?>" class="fa fa-chevron-right my-auto mx-3 px-3 <?php if($pageNumber == $pageCount){ echo 'opacity-30 select-none pointer-events-none';}?>"></a>
    </section>

</section>

<script>

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


</script>







<?php $content = ob_get_clean(); ?>



<?php ob_start(); ?>
<script src="assets/js/all_projects.js"></script>
<?php $script = ob_get_clean(); ?>

<?php require 'view/layout.php'; ?>