<table class="w-full text-sm text-left ">
    <thead class="text-xs text-gray-700 uppercase bg-main-red text-main-white ">
        <tr>
            <th scope="col" class="px-4 py-3 text-center"><?= "" ?> Nom </th>
            <th scope="col" class="px-4 py-3 text-center"><?= "" ?> Prénom</th>
            <th scope="col" class="px-4 py-3 text-center"><?= "" ?> Candidatures</th>
            <th scope="col" class="px-4 py-3 text-center"><?= "" ?> Contact</th>
            <th scope="col" class="px-4 py-3 text-center">
                <span class="sr-only">Edit</span>
            </th>
        </tr>
    </thead>
    <tbody class="border-2">
        <?php foreach($candidates as $candidate) { ?>
        <tr class="border-2 border-gray-800">
            <th scope="row" class="px-4 py-3 font-medium text-gray-900 border whitespace-nowrap "><?=$candidate->name?>;
            </th>
            <td class="px-4 py-3 border"><?=$candidate->surname?></td>
            <td class="px-4 py-3 border">
                <?php if (isset($candidatures)) {
                                foreach ($candidatures as $candidature) { ?>
                <p class="text-center italic font-bold underline">$candidature</p>
                <?php 
                                }}?>
                <p class="text-center italic font-bold underline"><?php
                $userPromo = $UserRepo->getUserPromo($candidate->id);
                echo $userPromo->name?></p>

                <button data-modal-target="modal-candidature<?php "" ?>"
                    data-modal-toggle="modal-candidature<?php "" ?>" class="block w-full md:w-auto text-white bg-main-red hover:bg-red-800 focus:ring-4 focus:outline-none 
                                    font-medium rounded-lg text-sm px-5 py-2.5 mt-2 mx-auto text-center"
                    type="button">
                    Vérifier les candidatures
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