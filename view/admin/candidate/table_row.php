<tr class="border-2 border-gray-800 text-center">
    <th scope="row" class="px-4 py-3 font-medium text-gray-900 border whitespace-nowrap ">
        <?= $candidate->user_name ?>
    </th>
    <td class="px-4 py-3 border"><?= $candidate->user_surname ?></td>
    <td class="px-4 py-3 border">
        <?php
        foreach ($UserRepo->getUserPromo('candidature', $candidate->user_id) as $promo) {
            echo "<p class='text-center italic font-bold underline'>$promo->name</p>";
        }
        ?>
        <button data-modal-target="modal-candidature-<?= $candidate->user_id ?>" data-modal-toggle="modal-candidature-<?= $candidate->user_id ?>" class="block w-full md:w-auto text-white bg-main-red ho:bg-red-800 focus:ring-4 focus:outline-none 
                        font-medium rounded-lg text-sm px-5 py-2.5 mt-2 mx-auto text-center" type="button">
            Vérifier les candidatures
        </button>
    </td>
    <td class="px-4 py-3 border">
        <button data-user-mail="<?= $candidate->user_email ?>" data-user-id="<?= $candidate->user_id ?>" data-user-name="<?= $candidate->user_name, ' ', $candidate->user_surname ?> " data-modal-target="modal-contact" data-modal-toggle="modal-contact" class="block w-full md:w-auto text-white bg-main-gray hover:bg-gray-900 focus:ring-4 focus:outline-none 
                        font-medium rounded-lg text-sm px-5 py-2.5 mt-2 mx-auto text-center" type="button">
            <i class="select-none pointer-events-none fa-solid fa-envelope text-main-white"></i>
        </button>
    </td>
    <td class="px-4 py-3 mx-auto items-center text-center">
        <button data-modal-target="modal-update-<?= $candidate->user_id ?>" data-modal-toggle="modal-update-<?= $candidate->user_id ?>" class="block w-full md:w-auto text-white bg-main-gray hover:bg-gray-900 focus:ring-4 focus:outline-none font-medium rounded-lg text-sm px-5 py-2.5 mt-2 mx-auto text-center">
            <i class="fa-solid fa-pen-to-square text-main-white"></i>
        </button>
    </td>
    <td class="px-4 py-3 mx-auto items-center text-center">
        <form action="?action=deleteCandidate" method="post">
            <input type="hidden" name="user_id" value=<?= $candidate->user_id ?>>
            <?php if(isset($UserRepo->getUserPromo('candidature',$candidate->user_id)[0]->id)){ ?>
                <input type="hidden" name="promo_id" value=<?= $UserRepo->getUserPromo('candidature', $candidate->user_id)[0]->id ?>>
            <?php } ?>
            <button class="block w-full md:w-auto text-white bg-main-gray hover:bg-gray-900 focus:ring-4 focus:outline-none font-medium rounded-lg text-sm px-5 py-2.5 mt-2 mx-auto text-center" type="submit">
                <i class="fa-solid fa-trash-can text-main-white"></i>
            </button>
        </form>
    </td>
</tr>