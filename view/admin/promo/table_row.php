<tr class="border-2 border-gray-800">
    <th scope="row" class="px-4 py-3 font-medium text-gray-900 border whitespace-nowrap "><?= $promo->name ?>
    </th>
    <td class="px-4 py-3 border"><?= $promo->status->name ?></td>
    <td class="px-4 py-3 border"><?= "$promo->start - $promo->end" ?></td>
    <td class="px-4 py-3 border">
        <?php if ($promo->status->id != 9) { ?>
            <button data-modal-target="modal-apprenant-<?= $promo->id ?>" data-modal-toggle="modal-apprenant-<?= $promo->id ?>" class="block w-full md:w-auto text-white bg-main-red hover:bg-red-800 focus:ring-4 focus:outline-none 
                                         font-medium rounded-lg text-sm px-5 mx-auto py-2.5 text-center" type="button">
                Voir les apprenants
            </button>
        <?php } else { ?>
            <button data-modal-target="modal-promotion-<?= $promo->id ?>" data-modal-toggle="modal-promotion-<?= $promo->id ?>" class="block w-full md:w-auto text-white bg-main-gray hover:bg-gray-700 focus:ring-4 focus:outline-none 
                                         font-medium rounded-lg text-sm px-5 mx-auto py-2.5 text-center" type="button">
                Valider les candidatures
            </button>
        <?php }; ?>
    </td>
    <td class="px-4 py-3 border">
        <button data-modal-target="modal-formateur-<?= $promo->id ?>" data-modal-toggle="modal-formateur-<?= $promo->id ?>" class="block w-full md:w-auto text-white bg-main-red hover:bg-red-800 focus:ring-4 focus:outline-none 
                                     font-medium rounded-lg text-sm px-5 mx-auto py-2.5 text-center" type="button">
            Voir les formateurs
        </button>
    </td>
    <td class="px-4 py-3 border">

        <button data-modal-target="modal-projet-<?= $promo->id ?>" data-modal-toggle="modal-projet-<?= $promo->id ?>" class="block w-full md:w-auto text-white bg-main-red hover:bg-red-800 focus:ring-4 focus:outline-none 
                                     font-medium rounded-lg text-sm px-5 py-2.5 mt-2 mx-auto text-center" type="button">
            Voir les Projets
        </button>
    </td>
    <td class="px-4 py-3 border">
        <button data-user-mail="<?= join(",", $mailList) ?>" data-modal-target="modal-contact" data-modal-toggle="modal-contact" class="block w-full md:w-auto text-white bg-main-gray hover:bg-gray-900 focus:ring-4 focus:outline-none 
                                    font-medium rounded-lg text-sm px-5 py-2.5 mt-2 mx-auto text-center" type="button">
            <i class="pointer-events-none select-none fa-solid fa-envelope text-main-white"></i>
        </button>
    </td>
    <td class="px-4 py-3 mx-auto items-center text-center relative">
        <button id="dropdown-button-<?= $promo->id ?>" data-dropdown-toggle="dropdown-content-<?= $promo->id ?>" class="inline-flex items-center p-0.5 text-sm font-medium text-center text-gray-500 hover:text-gray-800 rounded-lg focus:outline-none " type="button">
            <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z" />
            </svg>
        </button>
        <div id="dropdown-content-<?= $promo->id ?>" class="hidden absolute top-12 right-0 z-10 w-44 bg-white rounded divide-y divide-gray-100 shadow  ">
            <ul class="py-1 text-sm text-gray-700 " aria-labelledby="dropdown-button-<?= $promo->id ?>">
                <li>
                    <a data-promo-id="<?=$promo->id?>" data-formation-id="<?=$promo->formation_id?>"  data-start-date="<?=$PromoRepo->getPromoStart($promo->id)?>" data-end-date="<?=$PromoRepo->getPromoEnd($promo->id)?>" data-modal-target="modal-update-<?=$promo->id?>" data-modal-toggle="modal-update-<?=$promo->id?>" class="open-update cursor-pointer block py-2 px-4">Modifier</a>
                </li>
            </ul>
            <div class="py-1">
                <a data-modal-target="modal-delete-<?= $promo->id ?>" data-modal-toggle="modal-delete-<?= $promo->id ?>" class="cursor-pointer block py-2 px-4 text-sm text-gray-700">Supprimer</a>
            </div>
        </div>
    </td>
</tr>