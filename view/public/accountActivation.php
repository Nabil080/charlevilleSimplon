<?php $title = "Activation" ?>

<?php ob_start(); ?>
<main class="min-h-[75vh] px-[10%] xl:px-[15%] flex justify-center items-center">
    <div class="p-5 border-2 border-black rounded-lg">
        <?php if ($etat == "activationSucces") { ?>
        <h2 class="pb-10 text-main-red text-[48px]">Compte Activé !</h2>
        <p>Votre compte a bien été activé, vous pouvez maintenant vous connecter à tout moment.</p>
        <?php }
        if ($etat == "tokenError") { ?>

        <h2 class="pb-5 text-main-red text-[48px]">Erreur : Token !</h2>
        <p>Nous avons eu une erreur lors du traitement du token.<br>
            Cette erreur peut indiquer un token manquant ou incorrect, mais aussi un compte déjà activé.
        </p>
        <?php } ?>

    </div>
</main>
<?php $content = ob_get_clean(); ?>

<?php include 'view/layout.php'; ?>