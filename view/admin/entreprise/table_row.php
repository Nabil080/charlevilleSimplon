<tr class="border-2 border-gray-800">
    <th scope="row" class="px-4 py-3 font-medium text-gray-900 border whitespace-nowrap "><?= $user->user_name ?>
    </th>
    <td class="px-4 py-3 border"><?= $user->user_surname ?></td>
    <td class="px-4 py-3 border">
        <p class="text-center italic font-bold underline"><?= $user->user_company ?></p>

    </td>
    <td class="px-4 py-3 border">
        <button data-modal-target="modal-info-<?= $user->user_id ?>" data-modal-toggle="modal-info-<?= $user->user_id ?>" class="block w-full md:w-2/3 text-white bg-main-red hover:bg-red-800 focus:ring-4 focus:outline-none 
                        font-medium rounded-lg text-sm px-5 mx-auto py-2.5 text-center" type="button">
            Voir les infos
        </button>
        <button data-modal-target="modal-projet-<?= $user->user_id ?>" data-modal-toggle="modal-projet-<?= $user->user_id ?>" class="block w-full md:w-2/3 text-white bg-main-red hover:bg-red-800 focus:ring-4 focus:outline-none 
                        font-medium rounded-lg text-sm px-5 py-2.5 mt-2 mx-auto text-center" type="button">
            Voir les projets déposés
        </button>
    </td>
    <td class="px-4 py-3 border">
        <button data-user-mail="<?= $user->user_email ?>" data-user-id="<?= $user->user_id ?>" data-user-name="<?= $user->user_name, ' ', $user->user_surname ?> " data-modal-target="modal-contact" data-modal-toggle="modal-contact" class="block w-full md:w-auto text-white bg-main-gray hover:bg-gray-900 focus:ring-4 focus:outline-none 
                        font-medium rounded-lg text-sm px-5 py-2.5 mt-2 mx-auto text-center" type="button">
            <i class="select-none pointer-events-none fa-solid fa-envelope text-main-white"></i>
        </button>
    </td>
    <td class="px-4 py-3 mx-auto items-center text-center">
        <button data-modal-target="modal-update-<?=$user->user_id?>" data-modal-toggle="modal-update-<?=$user->user_id?>"  class="block w-full md:w-auto text-white bg-main-gray hover:bg-gray-900 focus:ring-4 focus:outline-none font-medium rounded-lg text-sm px-5 py-2.5 mt-2 mx-auto text-center">
            <i class="fa-solid fa-pen-to-square text-main-white"></i>
        </button>
    </td>
    <td class="px-4 py-3 mx-auto items-center text-center">
        <form action="?action=deleteUser" method="post">
            <input type="hidden" name="user_id" value=<?= $user->user_id ?>>
            <button class="block w-full md:w-auto text-white bg-main-gray hover:bg-gray-900 focus:ring-4 focus:outline-none font-medium rounded-lg text-sm px-5 py-2.5 mt-2 mx-auto text-center" type="submit">
                <i class="fa-solid fa-trash-can text-main-white"></i>
            </button>
        </form>
    </td>
</tr>