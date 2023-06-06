<?php
if(isset($candidate)){
    $user = $candidate;
}
?>

<!-- Modal de connexion -->
<section id="modal-update-<?=$user->user_id?>" data-modal-placement="center" tabindex="-1" aria-hidden="true" class="fixed z-50 hidden w-full h-full p-4 overflow-x-hidden bg-opacity-50 bg-black overflow-y-auto md:inset-0 max-h-full">
    <div class="relative w-full h-fit max-w-md md:h-auto mx-auto">
        <div class="relative bg-main-white border-main-red border-2 rounded-md text-main-red">
            <button type="button" class="absolute top-3 right-2.5 text-main-red bg-transparent rounded-md text-sm p-1.5 ml-auto inline-flex items-center hover: hover:border border-main-red" data-modal-hide="modal-update-<?=$user->user_id?>" data-modal-target="modal-update-<?=$user->user_id?>">
                <svg aria-hidden="true" class="w-5 h-5 text-main-light" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                <span class="sr-only">Close modal</span>
            </button>
            <!-- Partie CONNEXION -->
            <div id="co" class="px-6 py-6 lg:px-8">
                <h3 class="mb-4 text-xl uppercase w-fit mx-auto font-bold font-title text-main-red">Modification utilisateur</h3>
                <form class="space-y-6" action="?action=updateUserPersonnalInfos" method="post" target="_blank">
                    <!-- INPUT GENERALES -->
                    <input type="hidden" name="user" value="<?=$user->user_id?>">
                    <input type="hidden" name="role" value="<?=$user->role_id?>">
                    <div>
                        <label for="surname" class="block mb-2 text-sm font-medium  text-main-red">Prénom</label>
                        <input type="text" name="surname" class=" border text-sm rounded-md block w-full p-2.5 border-main-red text-black" value="<?=$user->user_surname?>" required>
                    </div>
                    <div>
                        <label for="name" class="block mb-2 text-sm font-medium  text-main-red">Nom</label>
                        <input type="text" name="name" class=" border text-sm rounded-md block w-full p-2.5 border-main-red text-black" value="<?=$user->user_name?>" required>
                    </div>
                    <div>
                        <label for="adress" class="block mb-2 text-sm font-medium  text-main-red">Adresse</label>
                        <input type="text" name="adress" class=" border text-sm rounded-md block w-full p-2.5 border-main-red text-black" value="<?=$user->user_adress?>" required>
                    </div>
                    <div>
                        <label for="email" class="block mb-2 text-sm font-medium  text-main-red">Email</label>
                        <input type="email" name="email" class=" border text-sm rounded-md block w-full p-2.5 border-main-red text-black" value="<?=$user->user_email?>" required>
                    </div>
                    <div>
                        <label for="phone" class="block mb-2 text-sm font-medium  text-main-red">Téléphone</label>
                        <input type="tel" name="phone" class=" border text-sm rounded-md block w-full p-2.5 border-main-red text-black" pattern="[0][0-9]{9}" placeholder="07256533**" value="<?=$user->user_phone?>" required>
                    </div>

                    <!-- INPUT PAS ENTREPRISE -->
                    <?php if($user->role_id != 3){ ?>
                    <div>
                        <label for="birth_date" class="block mb-2 text-sm font-medium  text-main-red">Date de naissance</label>
                        <input type="date" name="birth_date" class=" border text-sm rounded-md block w-full p-2.5 border-main-red text-black" value="<?=$user->user_birth_date?>" required>
                    </div>
                    <div>
                        <label for="birth_place" class="block mb-2 text-sm font-medium  text-main-red">Lieu de naissance</label>
                        <input type="text" name="birth_place" class=" border text-sm rounded-md block w-full p-2.5 border-main-red text-black" value="<?=$user->user_birth_place?>" required>
                    </div>
                    <div>
                        <label for="nationality" class="block mb-2 text-sm font-medium  text-main-red">Nationalité</label>
                        <input type="text" name="nationality" class=" border text-sm rounded-md block w-full p-2.5 border-main-red text-black" value="<?=$user->user_nationality?>" required>
                    </div>
                    <?php }
                    // INPUT PAS FORMATEUR/ENTREPRISE
                    if($user->role_id > 3){ ?>
                    <div>
                        <label for="number" class="block mb-2 text-sm font-medium  text-main-red">Numéro Pôle Emploi</label>
                        <input type="text" name="number" class=" border text-sm rounded-md block w-full p-2.5 border-main-red text-black" value="<?=$user->user_id_poleEmploi?>" required>
                    </div>
                    <?php } ?>

                    <!-- INPUT ENTREPRISE -->
                    <?php if($user->role_id == 3){ ?>
                    <div>
                        <label for="company" class="block mb-2 text-sm font-medium  text-main-red">Entreprise</label>
                        <input type="text" name="company" class=" border text-sm rounded-md block w-full p-2.5 border-main-red text-black" value="<?=$user->user_company?>" required>
                    </div>
                    <?php }?>
                    <button type="submit" class="w-full my-4 uppercase font-title text-main-white bg-main-red hover:bg-red-800 font-medium rounded-md text-sm px-5 py-2.5 text-center ">Modifier</button>
                </form>
            </div>
        </div>
    </div>
</section>