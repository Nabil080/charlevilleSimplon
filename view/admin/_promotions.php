<?php $title = "Promotions"; ?>

<?php ob_start();

$UserRepo = new UsersRepository;
$formators = $UserRepo->getAllFormators();
// var_dump($formators);
$FormationRepo = new FormationRepository;
$formations = $FormationRepo->getAllFormations();

include("view/admin/crudPromotion.php");
include("view/admin/modalContact.php");
include("view/admin/add/modalAddPromotion.php");

$content = ob_get_clean(); ?>

<?php ob_start();?>

<script src="assets/js/promo_validation.js"></script>

<?php $script = ob_get_clean(); ?>
<?php include 'view/layout_admin.php'; ?>
