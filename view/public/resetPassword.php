<?php $title = "Reset Password" ?>

<?php ob_start(); ?>
<main class="h-[80vh] w-full px-[10%] flex flex-col justify-center items-center">
    <h3
        class="mb-8 text-[24px] sm:text-[34px] md:text-[48px] uppercase w-fit mx-auto font-bold font-title text-center text-main-red">
        Mot de
        passe oublié
    </h3>
    <div class="w-full sm:w-2/3 lg:w-1/2 border-2 border-main-red rounded-[5px] p-5">
        <form class="space-y-6" id="forgetPasswordForm" method="post">
            <div id="succesContent" class="alertContent">
            </div>
            <div id="forget_errorContent"></div>
            <div class="flex flex-col gap-5">
                <div>
                    <label for="password" class="block mb-2 text-sm font-medium  text-main-red">Nouveau
                        mot de
                        passe</label>
                    <input type="password" name="password" id="password" required
                        class=" border text-sm rounded-md block w-full p-2.5 border-main-red text-main-red"
                        placeholder="Exemple@mail.com">
                    <p id="password_error" class="errorAlert mt-2 text-sm text-red-600 dark:text-red-500"></p>
                </div>
                <div>
                    <label for="confirmPassword" class="block mb-2 text-sm font-medium  text-main-red">Confirmer
                        le nouveau
                        mot de
                        passe</label>
                    <input type="password" name="confirmPassword" id="confirmPassword" required
                        class=" border text-sm rounded-md block w-full p-2.5 border-main-red text-main-red"
                        placeholder="Exemple@mail.com">
                    <p id="confirmPassword_error" class="errorAlert mt-2 text-sm text-red-600 dark:text-red-500"></p>
                </div>
            </div>
            <input type="hidden" name="token" value="<?= $token ?>" />
            <button type="submit"
                class="w-full font-title text-main-white bg-main-red hover:bg-red-800 font-medium rounded-md text-sm px-5 py-2.5 text-center ">Valider</button>

        </form>
    </div>
</main>
<?php $content = ob_get_clean(); ?>

<?php ob_start(); ?>
<script>
handleFormSubmission('#forgetPasswordForm', 'index.php?action=resetPasswordTreatment');
</script>
<?php $script = ob_get_clean(); ?>

<?php include 'view/layout.php'; ?>