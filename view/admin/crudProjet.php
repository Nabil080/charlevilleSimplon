<table class="w-full text-sm text-left ">
    <thead class="text-xs text-gray-700 uppercase bg-main-red text-main-white ">
        <tr>
            <th scope="col" class="px-4 py-3 text-center">
                <?= "" ?> Nom du projet
            </th>
            <th scope="col" class="px-4 py-3 text-center">
                <?= "" ?> Nom de l'entreprise
            </th>
            <th scope="col" class="px-4 py-3 text-center">
                <?= "" ?> Promotion
            </th>
            <th scope="col" class="px-4 py-3 text-center">
                <?= "" ?> Cahier des charges
            </th>
            <th scope="col" class="px-4 py-3 text-center">
                <?= "" ?> Fiche de projet
            </th>
            <th scope="col" class="px-4 py-3 text-center">
                <span class="sr-only">Edit</span>
            </th>
        </tr>
    </thead>
    <tbody class="border-2">
        <?php for ($i = 0; $i < 10; $i++) { ?>
            <tr class="border-2 border-gray-800">
                <th scope="row" class="px-4 py-3 font-medium text-gray-900 border whitespace-nowrap ">Super projet de fou
                </th>
                <td class="px-4 py-3 border">
                    La boulangerie géniale
                </td>
                <td class="px-4 py-3 border">
                    <?php if (!isset($assignation)) { ?>
                        <form method="post" action="assignProject">
                            <select name="promotion" class="w-full">
                                <?php if (isset($promotions)) {
                                    foreach ($promotions as $promotion) { ?>
                                        <option value="<?= $promotion ?>">
                                            $promotion
                                        </option>
                                    <?php }
                                } ?>
                            </select>
                            <button type="submit" name="submit"
                                class="block cursor-pointer w-full text-white bg-main-red hover:bg-red-800 focus:ring-4
                                            focus:outline-none font-medium rounded-lg text-sm px-5 py-2.5 mt-2 mx-auto text-center">
                                Assigner
                            </button>
                        </form>
                    <?php } ?>
                </td>
                <td class="px-4 py-3 border">

                    <a href="$cahier des charges" class="block cursor-pointer w-full md:w-1/2 text-white bg-main-gray hover:bg-red-800 focus:ring-4 focus:outline-none 
                                     font-medium rounded-lg text-sm px-5 py-2.5 mt-2 mx-auto text-center"
                        type="button">
                        <i class="fa-solid fa-file"></i>
                    </a>
                </td>
                <td class="px-4 py-3 border">
                    <a href="$link page projet" class="block cursor-pointer w-full md:w-1/2 text-white bg-main-gray hover:bg-red-800 focus:ring-4 focus:outline-none 
                                     font-medium rounded-lg text-sm px-5 py-2.5 mt-2 mx-auto text-center"
                        type="button">
                        <i class="fa-solid fa-link"></i>
                    </a>
                </td>
                <td class="px-4 py-3 mx-auto items-center text-center">
                    <button id="apple-imac-27-dropdown-button" data-dropdown-toggle="apple-imac-27-dropdown"
                        class="inline-flex items-center p-0.5 text-sm font-medium text-center text-gray-500 hover:text-gray-800 rounded-lg focus:outline-none "
                        type="button">
                        <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewbox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z" />
                        </svg>
                    </button>
                    <div id="apple-imac-27-dropdown"
                        class="hidden z-10 w-44 bg-white rounded divide-y divide-gray-100 shadow  ">
                        <ul class="py-1 text-sm text-gray-700 " aria-labelledby="apple-imac-27-dropdown-button">
                            <li>
                                <a href="#" class="block py-2 px-4">Modifier</a>
                            </li>
                        </ul>
                        <div class="py-1">
                            <a href="#" class="block py-2 px-4 text-sm text-gray-700">Supprimer</a>
                        </div>
                    </div>
                </td>
            </tr>
        <?php
        }
        ?>

    </tbody>
</table>