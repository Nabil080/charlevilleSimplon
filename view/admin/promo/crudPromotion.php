<table class="w-full text-sm text-left ">
    <thead class="text-xs text-gray-700 uppercase bg-main-red text-main-white ">
        <tr>
            <th scope="col" class="px-4 py-3 text-center">
                <?= "" ?> Nom
            </th>
            <th scope="col" class="px-4 py-3 text-center">
                <?= "" ?> Statut
            </th>
            <th scope="col" class="px-4 py-3 text-center">
                <?= "" ?> Dates
            </th>
            <th scope="col" class="px-4 py-3 text-center">
                <?= "" ?> Liste des apprenants
            </th>
            <th scope="col" class="px-4 py-3 text-center">
                <?= "" ?> Liste des formateurs
            </th>
            <th scope="col" class="px-4 py-3 text-center">
                <?= "" ?> Projets données
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
        <?php
        // foreach ($promos as $promo) {
        //     $mailList = $PromoRepo->getPromoMailList($promo->id);
        //     include("view/admin/promo/table_row.php");
        //     if ($promo->status->id != 9) {
        //         $apprenants = $PromoRepo->getAllApprenants($promo->id);
        //         include("view/admin/modalApprenant.php");
        //     } else {
        //         $candidates = $PromoRepo->getPromoCandidates($promo->id);
        //         include("view/admin/promo/modalValidationPromo.php");
        //     }

        //     $promoFormators = $PromoRepo->getAllFormateurs($promo->id);
        //     include("view/admin/modalFormateur.php");
        //     include("view/admin/modal/modalProjet.php");
        //     include("view/admin/promo/modalUpdatePromotion.php");
        //     include("view/admin/modal/modalDelete.php");
        // }
        ?>

    </tbody>
</table>
<div id="loading"></div>
<div id="modals" class=""></div>