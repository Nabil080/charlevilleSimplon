<table class="w-full text-sm text-left ">
    <thead class="text-xs text-gray-700 uppercase bg-main-red text-main-white ">
        <tr>
            <th scope="col" class="px-4 py-3 text-center">
                <?= "" ?> Nom
            </th>
            <th scope="col" class="px-4 py-3 text-center">
                <?= "" ?> Prénom
            </th>
            <th scope="col" class="px-4 py-3 text-center">
                <?= "" ?> Nom de l'entreprise
            </th>
            <th scope="col" class="px-4 py-3 text-center">
                <?= "" ?> Plus d'infos
            </th>
            <th scope="col" class="px-4 py-3 text-center">
                <?= "" ?> Contact
            </th>
            <th scope="col" class="px-4 py-3 text-center">
                <span class="sr-only">Edit</span>
            </th>
        </tr>
    </thead>
    <tbody class="border-2">
        <?php for ($i = 0; $i < 10; $i++) { ?>
            <tr class="border-2 border-gray-800">
                <th scope="row" class="px-4 py-3 font-medium text-gray-900 border whitespace-nowrap ">Apple iMac 27&#34;
                </th>
                <td class="px-4 py-3 border">PC</td>
                <td class="px-4 py-3 border">
                    <p class="text-center italic font-bold underline">$entreprise</p>

                </td>
                <td class="px-4 py-3 border">
                    <button data-modal-target="modal-info<?php "" ?>" data-modal-toggle="modal-info<?php "" ?>" class="block w-full md:w-2/3 text-white bg-main-red hover:bg-red-800 focus:ring-4 focus:outline-none 
                                     font-medium rounded-lg text-sm px-5 mx-auto py-2.5 text-center" type="button">
                        Voir les infos
                    </button>
                    <button data-modal-target="modal-projet<?php "" ?>" data-modal-toggle="modal-projet<?php "" ?>" class="block w-full md:w-2/3 text-white bg-main-red hover:bg-red-800 focus:ring-4 focus:outline-none 
                                     font-medium rounded-lg text-sm px-5 py-2.5 mt-2 mx-auto text-center"
                        type="button">
                        Voir les projets déposés
                    </button>
                </td>
                <td class="px-4 py-3 border">
                    <button data-modal-target="modal-contact<?php "" ?>" data-modal-toggle="modal-contact<?php "" ?>" class="block w-full md:w-auto text-white bg-main-gray hover:bg-gray-900 focus:ring-4 focus:outline-none 
                                     font-medium rounded-lg text-sm px-5 py-2.5 mt-2 mx-auto text-center"
                        type="button">
                        <i class="fa-solid fa-envelope text-main-white"></i>
                    </button>
                </td>
                <td class="px-4 py-3 mx-auto items-center text-center">
                    <button data-modal-target="modal-contact<?php "" ?>" data-modal-toggle="modal-contact<?php "" ?>"
                        class="block w-full md:w-auto text-white bg-main-gray hover:bg-gray-900 focus:ring-4 focus:outline-none font-medium rounded-lg text-sm px-5 py-2.5 mt-2 mx-auto text-center"
                        type="button">
                        <i class="fa-solid fa-trash-can text-main-white"></i>
                    </button>
                </td>
            </tr>
        <?php
        }
        ?>

    </tbody>
</table>