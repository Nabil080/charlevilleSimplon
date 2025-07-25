<?php
$action = 'loginTreatment';
$title = 'Connexion';
?>

<?php ob_start(); ?>

<form id="login-form" action="index.php?action=loginTreatment" method="POST">
    <p id="content_success"></p>
    <div class="mb-6">
        <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Adresse mail</label>
        <input type="email" id="email" name="email"
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
            placeholder="john.doe@company.com" required>
    </div>
    <div class="grid gap-6 mb-6 md:grid-cols-2">
        <div>
            <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Mot de passe</label>
            <input type="password" id="password" name="password"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="•••••••••" required>
        </div>
    </div>
    <button type="submit"
        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Envoyer</button>
</form>

<?php $content = ob_get_clean(); ?>


<?php ob_start(); ?>
<script src="assets/js/ajax_register.js"></script>
<?php $script = ob_get_clean(); ?>

<?php require 'view/layout.php'; ?>
