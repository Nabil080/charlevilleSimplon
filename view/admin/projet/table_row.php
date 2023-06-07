<tr class="border-2 border-gray-800">
    <th scope="row" class="px-4 py-3 font-medium text-gray-900 border whitespace-nowrap "><?=$project->name?>
    </th>
    <td class="px-4 py-3 border">
        <a href="<?=$project->company_link?>" target="_blank"><?=$project->company_name?></a>
    </td>
    <td class="px-4 py-3 border">
        <?=$project->type->name?>
    </td>
    <td class="px-4 py-3 border">
        <?php if (isset($project->promo)){
                echo $project->promo->name;
            }else{?>
            <form method="post" action="?action=assignProject" target="_blank">
                <input type="hidden" name="project" value="<?=$project->id?>">
                <select name="promo" class="w-full">
                    <?php
                    $promoRepo = new PromoRepository;
                    $promos = $promoRepo->getActivePromos();
                    if(!empty($promos)){
                        foreach ($promos as $promo) { ?>
                            <option value="<?= $promo->id ?>">
                                <?=$promo->name?>
                            </option>
                        <?php }
                    }
                    ?>
                </select>
                <button type="submit" name="submit"
                    class="block cursor-pointer w-full text-white bg-main-red hover:bg-red-800 focus:ring-4
                                focus:outline-none font-medium rounded-lg text-sm px-5 py-2.5 mt-2 mx-auto text-center">
                    Assigner
                </button>
            </form>
        <?php
        } ?>
    </td>
    <td class="px-4 py-3 border">

        <a href="<?=$project->file?>" target="_blank" class="block cursor-pointer w-full md:w-1/2 text-white bg-main-gray hover:bg-red-800 focus:ring-4 focus:outline-none 
                            font-medium rounded-lg text-sm px-5 py-2.5 mt-2 mx-auto text-center"
            type="button">
            <i class="fa-solid fa-file"></i>
        </a>
    </td>
    <td class="px-4 py-3 border">
        <a href="?action=projectPage&id=<?=$project->id?>" target="_blank" class="block cursor-pointer w-full md:w-1/2 text-white bg-main-gray hover:bg-red-800 focus:ring-4 focus:outline-none 
                            font-medium rounded-lg text-sm px-5 py-2.5 mt-2 mx-auto text-center"
            type="button">
            <i class="fa-solid fa-link"></i>
        </a>
    </td>
    <td class="px-4 py-3 mx-auto items-center text-center relative">
        <button id="dropdown-button-<?=$project->id?>" data-dropdown-toggle="dropdown-content-<?=$project->id?>"
            class="inline-flex items-center p-0.5 text-sm font-medium text-center text-gray-500 hover:text-gray-800 rounded-lg focus:outline-none "
            type="button">
            <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewbox="0 0 20 20"
                xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z" />
            </svg>
        </button>
        <div id="dropdown-content-<?=$project->id?>"
            class="hidden absolute top-12 right-0 z-10 w-44 bg-white rounded divide-y divide-gray-100 shadow  ">
            <ul class="py-1 text-sm text-gray-700 " aria-labelledby="dropdown-button-<?=$project->id?>">
                <li>
                    <a href="?action=addProject&id=<?=$project->id?>" class="block py-2 px-4" target="_blank">Modifier</a>
                </li>
            </ul>
            <div class="py-1">
                <a data-modal-target="modal-delete-<?= $project->id ?>" data-modal-toggle="modal-delete-<?= $project->id ?>" class="cursor-pointer block py-2 px-4 text-sm text-gray-700">Supprimer</a>
            </div>
        </div>
    </td>
</tr>
