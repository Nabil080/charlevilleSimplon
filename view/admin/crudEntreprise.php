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
        <?php foreach ($companies as $user) { ?>
            <tr class="border-2 border-gray-800">
                <th scope="row" class="px-4 py-3 font-medium text-gray-900 border whitespace-nowrap "><?= $user->name ?>
                </th>
                <td class="px-4 py-3 border"><?= $user->surname ?></td>
                <td class="px-4 py-3 border">
                    <p class="text-center italic font-bold underline"><?= $user->company ?></p>

                </td>
                <td class="px-4 py-3 border">
                    <button data-modal-target="modal-info-<?= $user->id ?>" data-modal-toggle="modal-info-<?= $user->id ?>" class="block w-full md:w-2/3 text-white bg-main-red hover:bg-red-800 focus:ring-4 focus:outline-none 
                                    font-medium rounded-lg text-sm px-5 mx-auto py-2.5 text-center" type="button">
                        Voir les infos
                    </button>
                    <button data-modal-target="modal-projet-<?= $user->id ?>" data-modal-toggle="modal-projet-<?= $user->id ?>" class="block w-full md:w-2/3 text-white bg-main-red hover:bg-red-800 focus:ring-4 focus:outline-none 
                                    font-medium rounded-lg text-sm px-5 py-2.5 mt-2 mx-auto text-center" type="button">
                        Voir les projets déposés
                    </button>
                </td>
                <td class="px-4 py-3 border">
                    <button data-user-mail="<?=$user->email?>" data-user-id="<?=$user->id?>" data-user-name="<?=$user->name,' ',$user->surname?> " data-modal-target="modal-contact" data-modal-toggle="modal-contact" class="block w-full md:w-auto text-white bg-main-gray hover:bg-gray-900 focus:ring-4 focus:outline-none 
                                    font-medium rounded-lg text-sm px-5 py-2.5 mt-2 mx-auto text-center" type="button">
                        <i class="fa-solid fa-envelope text-main-white"></i>
                    </button>
                </td>
                <td class="px-4 py-3 mx-auto items-center text-center">
                <form action="?action=deleteLearner" method="post">
                        <input type="hidden" name="user_id" value=<?=$user->id?>>
                        <input type="hidden" name="promo_id" value=<?=$UserRepo->getUserPromo('apprenant',$user->id)[0]->id?>>
                        <button class="block w-full md:w-auto text-white bg-main-gray hover:bg-gray-900 focus:ring-4 focus:outline-none font-medium rounded-lg text-sm px-5 py-2.5 mt-2 mx-auto text-center" type="submit">
                        <i class="fa-solid fa-trash-can text-main-white"></i>
                    </button>
                    </form>
                </td>
            </tr>
        <?php
            include("view/admin/modalInfos.php");
            include("view/admin/modalProjet.php");
        }
        ?>

    </tbody>
</table>