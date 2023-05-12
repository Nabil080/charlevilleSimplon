
<section class="sm:ml-64">
        <?php include ("_searchCrud.php"); ?>
        
            <div class="overflow-x-auto">
                <table class="w-full text-sm text-left ">
                    <thead class="text-xs text-gray-700 uppercase bg-main-red text-main-white ">
                        <tr>
                            <th scope="col" class="px-4 py-3 text-center"><?= "" ?> Nom </th>
                            <th scope="col" class="px-4 py-3 text-center"><?= "" ?> Prénom</th>
                            <th scope="col" class="px-4 py-3 text-center"><?= "" ?> Promo</th>
                            <th scope="col" class="px-4 py-3 text-center"><?= "" ?> Plus d'infos</th>
                            <th scope="col" class="px-4 py-3 text-center"><?= "" ?> Projet</th>
                            <th scope="col" class="px-4 py-3 text-center"><?= "" ?> Contact</th>
                            <th scope="col" class="px-4 py-3 text-center">
                                <span class="sr-only">Edit</span>
                            </th>
                        </tr>
                    </thead>
                    <tbody class="border-2">
                        <?php for ($i = 0; $i < 10; $i++) { ?>
                        <tr class="border-2 border-gray-800">
                            <th scope="row" class="px-4 py-3 font-medium text-gray-900 border whitespace-nowrap ">Apple iMac 27&#34;</th>
                            <td class="px-4 py-3 border">PC</td>
                            <td class="px-4 py-3 border">
                                <p class="text-center italic font-bold underline">$promotion</p>
                                
                            </td>
                            <td class="px-4 py-3 border">
                                <button data-modal-target="modal-info<?php "" ?>" data-modal-toggle="modal-info<?php "" ?>" 
                                    class="block w-full md:w-auto text-white bg-main-red hover:bg-red-800 focus:ring-4 focus:outline-none 
                                     font-medium rounded-lg text-sm px-5 mx-auto py-2.5 text-center" type="button">
                                        Voir les infos
                                </button>
                            </td>
                            <td class="px-4 py-3 border">

                                <button data-modal-target="modal-projet<?php "" ?>" data-modal-toggle="modal-projet<?php "" ?>" 
                                    class="block w-full md:w-auto text-white bg-main-red hover:bg-red-800 focus:ring-4 focus:outline-none 
                                     font-medium rounded-lg text-sm px-5 py-2.5 mt-2 mx-auto text-center" type="button">
                                        Voir les Projets
                                </button>
                            </td>
                            <td class="px-4 py-3 border">
                                <button data-modal-target="modal-contact<?php "" ?>" data-modal-toggle="modal-contact<?php "" ?>" 
                                    class="block w-full md:w-auto text-white bg-main-gray hover:bg-gray-900 focus:ring-4 focus:outline-none 
                                     font-medium rounded-lg text-sm px-5 py-2.5 mt-2 mx-auto text-center" type="button">
                                     <i class="fa-solid fa-envelope text-main-white"></i>
                                </button>
                            </td>
                            <td class="px-4 py-3 mx-auto items-center text-center">
                                <button id="apple-imac-27-dropdown-button" data-dropdown-toggle="apple-imac-27-dropdown" class="inline-flex items-center p-0.5 text-sm font-medium text-center text-gray-500 hover:text-gray-800 rounded-lg focus:outline-none " type="button">
                                    <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z" />
                                    </svg>
                                </button>
                                <div id="apple-imac-27-dropdown" class="hidden z-10 w-44 bg-white rounded divide-y divide-gray-100 shadow  ">
                                    <ul class="py-1 text-sm text-gray-700 " aria-labelledby="apple-imac-27-dropdown-button">
                                        <li>
                                            <a href="#" class="block py-2 px-4">Show</a>
                                        </li>
                                        <li>
                                            <a href="#" class="block py-2 px-4">Edit</a>
                                        </li>
                                    </ul>
                                    <div class="py-1">
                                        <a href="#" class="block py-2 px-4 text-sm text-gray-700">Delete</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <?php 
                        }
                        ?>

                    </tbody>
                </table>
            </div>
            <?php include ("_paginationCrud.php"); ?>
        </div>
    </section>