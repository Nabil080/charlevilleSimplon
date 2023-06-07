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
                <?= "" ?> Type de projet
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
        <?php
            $PromoRepo = new PromoRepository;
            $promos = $PromoRepo->getActivePromos();
            // foreach($projects as $project) {
            //     include("view/admin/projet/table_row.php");
            //     include("view/admin/modal/modalDelete.php");
            // }
        ?>

    </tbody>
</table>
<div id="loading"></div>