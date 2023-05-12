<?php
$title = "Inscription";
$boolCompany = (isset($_GET['campany'])) ? true : false;
?>

<?php ob_start(); ?>
<div class="w-full md:w-2/3 mb-6 md:mb-3">
    <label for="nationality" class="block mb-2 text-[14px] font-medium">Nationalité</label>
    <input type="text" id="nationality" name="nationality" placeholder="Votre nationalité"
        class="bg-main-white border border-main-red text-[18px] rounded-[5px] block w-full p-2.5">
</div>
<div class="w-full md:w-2/3 mb-6 md:mb-3">
    <label for="date_birth" class="block mb-2 text-[14px] font-medium">Date de naissance</label>
    <input type="date" id="date_birth" name="date_birth" placeholder="Votre date de naissance"
        class="bg-main-white border border-main-red text-[18px] rounded-[5px] block w-full p-2.5">
</div>
<div class="w-full md:w-2/3 mb-6 md:mb-3">
    <label for="place_birth" class="block mb-2 text-[14px] font-medium">Ville de naissance</label>
    <input type="text" id="place_birth" name="place_birth" placeholder="Paris"
        class="bg-main-white border border-main-red text-[18px] rounded-[5px] block w-full p-2.5">
</div>
<div class="w-full md:w-2/3 mb-6 md:mb-3">
    <label for="id_poleEmploi" class="block mb-2 text-[14px] font-medium">Identifiant Pole Emploi</label>
    <input type="text" id="id_poleEmploi" name="id_poleEmploi" placeholder="ID pole emploi"
        class="bg-main-white border border-main-red text-[18px] rounded-[5px] block w-full p-2.5">
    <div class="flex items-center mt-2">
        <input id="default-checkbox" type="checkbox" value=""
            class="w-4 h-4 text-main-red bg-main-white border-main-border rounded focus:ring-0">
        <label for="default-checkbox" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">J'ai pas encore
            le numéro Pôle Emploi</label>
    </div>
</div>

<?php $prospect = ob_get_clean(); ?>

<?php ob_start(); ?>
<div class="w-full md:w-2/3 mb-6 md:mb-3">
    <label for="name_company" class="block mb-2 text-[14px] font-medium">Nom de l'entreprise</label>
    <input type="text" id="name_company" name="name_company" placeholder="Simplon"
        class="bg-main-white border border-main-red text-[18px] rounded-[5px] block w-full p-2.5">
</div>

<?php $company = ob_get_clean(); ?>




<?php ob_start(); ?>
<main class="px-[10%]">
    <h2 class="pb-5 text-[48px] text-main-red font-bold text-center">
        <?php echo ($boolCompany) ? 'Inscription' : 'Candidature'; ?>
    </h2>
    <div class="pb-10 flex items-center gap-3">
        <i class="fa-sharp fa-solid fa-exclamation-circle fa-2xl text-main-red"></i>
        <p class="text-[16px] md:text-[28px] font-bold">Si vous avez déjà un compte, veuillez vous connecter
            avant de
            procéder à
            <?php echo ($boolCompany) ? "l'inscription" : 'la candidature'; ?> !
        </p>
    </div>
    <form id="register-form" class="bg-main-lightgray p-5 border border-main-red rounded-[5px]">
        <?php if (!$boolCompany) { ?>
            <p class="pb-10 text-[14px] md:text-[20px] font-medium text-center">
                Pour postuler à la formation $nom_de_la_promo qui commence le $date_de_la_promo, veuillez remplir le
                formulaire ci-dessous :
            </p>
        <?php } ?>

        <div class="grid [&>div]:mx-auto place-content-center gap-3 md:grid-cols-2 ">
            <div class="w-full md:w-2/3 mb-6 md:mb-3">
                <label for="name" class="block mb-2 text-[14px] font-medium">Nom</label>
                <input type="text" id="name" name="name" placeholder="Votre nom"
                    class="bg-main-white border border-main-red text-[18px] rounded-[5px] block w-full p-2.5">
            </div>
            <div class="w-full md:w-2/3 mb-6 md:mb-3">
                <label for="surname" class="block mb-2 text-[14px] font-medium">Prénom</label>
                <input type="text" id="surname" name="surname" placeholder="Votre prénom"
                    class="bg-main-white border border-main-red text-[18px] rounded-[5px] block w-full p-2.5">
            </div>
            <div class="w-full md:w-2/3 mb-6 md:mb-3">
                <label for="email" class="block mb-2 text-[14px] font-medium">Email</label>
                <input type="email" id="email" name="email" placeholder="Votre email"
                    class="bg-main-white border border-main-red text-[18px] rounded-[5px] block w-full p-2.5">
            </div>
            <div class="w-full md:w-2/3 mb-6 md:mb-3">
                <label for="phone" class="block mb-2 text-[14px] font-medium">Téléphone</label>
                <input type="tel" id="phone" name="phone" pattern="[0][1-9]{9}" placeholder="07256533**"
                    class="bg-main-white border border-main-red text-[18px] rounded-[5px] block w-full p-2.5">
            </div>
            <div class="w-full md:w-2/3 mb-6 md:mb-3">
                <label for="adress" class="block mb-2 text-[14px] font-medium">Adress</label>
                <input type="text" id="adress" name="adress" placeholder="2 rue Du Général de Gaulle"
                    class="bg-main-white border border-main-red text-[18px] rounded-[5px] block w-full p-2.5">
            </div>
            <div class="w-full md:w-2/3 mb-6 md:mb-3">
                <label for="postal" class="block mb-2 text-[14px] font-medium">code Postal</label>
                <input type="text" id="postal" name="postal" placeholder="75000"
                    class="bg-main-white border border-main-red text-[18px] rounded-[5px] block w-full p-2.5">
            </div>
            <div class="w-full md:w-2/3 mb-6 md:mb-3">
                <label for="city" class="block mb-2 text-[14px] font-medium">Ville</label>
                <input type="text" id="city" name="city" placeholder="Paris"
                    class="bg-main-white border border-main-red text-[18px] rounded-[5px] block w-full p-2.5">
            </div>
            <?php echo ($boolCompany) ? $company : $prospect; ?>
        </div>
        <p class="py-5 md:text-center text-[14px] text-main-red font-bold font-bold">
            Conservez votre mot de passe : il
            vous
            servira
            pour
            accéder à vos
            <?php echo ($boolCompany) ? 'projets.' : 'candidatures et à votre espace personnel.'; ?>
        </p>
        <div class="grid [&>div]:mx-auto place-content-center gap-3 md:grid-cols-2 ">
            <div class="w-full md:w-2/3 mb-6">
                <label for="password" class="block mb-2 text-[14px] font-medium">Mot de passe</label>
                <input type="password" id="password" name="password" placeholder="Votre mot de passe"
                    class="bg-main-white border border-main-red text-[18px] rounded-[5px] block w-full p-2.5">
            </div>
            <div class="w-full md:w-2/3 mb-6">
                <label for="confirm_password" class="block mb-2 text-[14px] font-medium">Confirmez mot de
                    passe</label>
                <input type="password" id="confirm_password" name="confirm_password"
                    placeholder="Confirmer votre mot de passe"
                    class="bg-main-white border border-main-red text-[18px] rounded-[5px] block w-full p-2.5">
            </div>
        </div>
        <div class="text-center">
            <button type=" submit"
                class="px-10 py-3 text-main-white font-bold text-lg uppercase bg-main-red rounded-lg">
                <?php echo ($boolCompany) ? "Inscription" : 'Postuler'; ?>
            </button>
        </div>
    </form>
</main>



<?php $content = ob_get_clean(); ?>

<?php include 'view/layout.php'; ?>