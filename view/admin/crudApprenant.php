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
                <?= "" ?> Promo
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
        <?php foreach ($learners as $learner) { ?>
            <tr class="border-2 border-gray-800">
                <th scope="row" class="px-4 py-3 font-medium text-gray-900 border whitespace-nowrap "><?=$learner->name?>
                </th>
                <td class="px-4 py-3 border"><?=$learner->surname?></td>
                <td class="px-4 py-3 border">
                    <p class="text-center italic font-bold underline"><?=$UserRepo->getUserPromo($learner->id)->name?></p>

                </td>
                <td class="px-4 py-3 border">
                    <button data-modal-target="modal-info-<?=$learner->id?>" data-modal-toggle="modal-info-<?=$learner->id?>" class="block w-full md:w-2/3 text-white bg-main-red hover:bg-red-800 focus:ring-4 focus:outline-none 
                                    font-medium rounded-lg text-sm px-5 mx-auto py-2.5 text-center" type="button">
                        Voir les infos
                    </button>
                    <button data-modal-target="modal-projet-<?=$learner->id?>" data-modal-toggle="modal-projet-<?=$learner->id?>" class="block w-full md:w-2/3 text-white bg-main-red hover:bg-red-800 focus:ring-4 focus:outline-none 
                                    font-medium rounded-lg text-sm px-5 py-2.5 mt-2 mx-auto text-center"
                        type="button">
                        Voir les Projets
                    </button>
                </td>
                <td class="px-4 py-3 border">
                    <button data-user-mail="<?=$learner->email?>" data-user-id="<?=$learner->id?>" data-user-name="<?=$learner->name,' ',$learner->surname?> " data-modal-target="modal-contact" data-modal-toggle="modal-contact" class="block w-full md:w-auto text-white bg-main-gray hover:bg-gray-900 focus:ring-4 focus:outline-none 
                                    font-medium rounded-lg text-sm px-5 py-2.5 mt-2 mx-auto text-center"
                        type="button">
                        <i class="fa-solid fa-envelope text-main-white"></i>
                    </button>
                </td>
                <td class="px-4 py-3 mx-auto items-center text-center">
                <form action="?action=deleteLearner" method="post">
                        <input type="hidden" name="user_id" value=<?=$learner->id?>>
                        <input type="hidden" name="promo_id" value=<?=$UserRepo->getUserPromo($learner->id)->id?>>
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