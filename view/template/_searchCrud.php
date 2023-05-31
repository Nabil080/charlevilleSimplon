<!-- Start coding here -->
<div class="bg-white relative shadow-md sm:rounded-lg overflow-hidden">
    <div class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0 md:space-x-2 pb-2">
        <div class="w-full md:w-1/2">
            <form class="flex items-center">
                <label for="simple-search" class="sr-only">Rechercher</label>
                <div class="relative w-full">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 ml-5 pointer-events-none">
                        <svg aria-hidden="true" class="w-5 h-5 " fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <input type="text" id="simple-search" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg 
                            focus:ring-primary-500 focus:border-primary-500 block w-full pl-10 p-2 ml-5" placeholder="Rechercher" required="">
                </div>
            </form>
        </div>
        <div class="w-full md:w-auto flex flex-col md:flex-row space-y-2 md:space-y-0 items-stretch md:items-center justify-end md:space-x-3 md:pr-8 flex-shrink-0">

            <button <?php if($_GET['action'] ==' crudProjetPage'){ ?>onclick="window.location.href='?action=addProject'"<?php } ?>data-modal-target="modal-add" data-modal-toggle="modal-add" type="button" class="<?php if (isset($candidatPage) && $candidatPage == 1) { ?>hidden <?php } ?>flex items-center bg-main-red text-white justify-center font-medium rounded-lg 
                    text-sm px-4 py-2">
                <svg class="h-3.5 w-3.5 mr-2" class="select-none pointer-events-none"fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                    <path clip-rule="evenodd" fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" />
                </svg>
            </button>
            <div class="<?php if (isset($entreprisePage) && $entreprisePage == 1) { ?>hidden <?php } ?> flex items-center space-x-3 w-full md:w-auto">
                <button id="filterDropdownButton" data-dropdown-toggle="filterDropdown" class="w-full md:w-auto flex items-center justify-center py-2 px-4 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200hover:text-primary-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700" type="button">
                    <svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true" class="h-4 w-4 mr-2 text-gray-400" viewbox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M3 3a1 1 0 011-1h12a1 1 0 011 1v3a1 1 0 01-.293.707L12 11.414V15a1 1 0 01-.293.707l-2 2A1 1 0 018 17v-5.586L3.293 6.707A1 1 0 013 6V3z" clip-rule="evenodd" />
                    </svg>
                    <?php if (isset($candidatPage) && $candidatPage == 1) { ?>
                        Filtrer par promotion
                    <?php }
                    if (isset($apprenantPage) && $apprenantPage == 1) { ?>
                        Filtrer par promotion
                    <?php }
                    if (isset($promotionPage) && $promotionPage == 1) { ?>
                        Filtrer par année
                    <?php }
                    if (isset($projetPage) && $projetPage == 1) { ?>
                        Filtrer par promotion
                    <?php }
                    ?>
                    <svg class="-mr-1 ml-1.5 w-5 h-5" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                        <path clip-rule="evenodd" fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" />
                    </svg>
                </button>
                <div id="filterDropdown" class="z-10 hidden w-48 p-3 bg-white rounded-lg shadow ">
                    <h6 class="mb-3 text-sm font-medium text-gray-900 ">Choisir</h6>
                    <ul class="space-y-2 text-sm" aria-labelledby="filterDropdownButton">
                        <li class="flex items-center">
                            <input id="apple" type="checkbox" value="" class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-700 focus:ring-2 ">
                            <label for="apple" class="ml-2 text-sm font-medium text-gray-900 ">Apple (56)</label>
                        </li>
                        <li class="flex items-center">
                            <input id="fitbit" type="checkbox" value="" class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-700 focus:ring-2 ">
                            <label for="fitbit" class="ml-2 text-sm font-medium text-gray-900 ">Microsoft (16)</label>
                        </li>
                        <li class="flex items-center">
                            <input id="razor" type="checkbox" value="" class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-700 focus:ring-2 ">
                            <label for="razor" class="ml-2 text-sm font-medium text-gray-900 ">Razor (49)</label>
                        </li>
                        <li class="flex items-center">
                            <input id="nikon" type="checkbox" value="" class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-700 focus:ring-2 ">
                            <label for="nikon" class="ml-2 text-sm font-medium text-gray-900 ">Nikon (12)</label>
                        </li>
                        <li class="flex items-center">
                            <input id="benq" type="checkbox" value="" class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-700 focus:ring-2 ">
                            <label for="benq" class="ml-2 text-sm font-medium text-gray-900 ">BenQ (74)</label>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>