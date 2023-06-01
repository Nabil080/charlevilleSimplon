<?php
try {
    function homepage()
    {
        include 'view/public/homepage.php';
    }
    function contactPage()
    {
        include 'view/public/contact.php';
    }

    // Formation 
    function allFormationsPage()
    {
        $formationRepository = new FormationRepository;
        $formations = $formationRepository->getAllFormations();
        include 'view/public/allFormations.php';
    }

    function formationPage()
    {
        include 'view/public/formation.php';
    }

    // Project 

    function projectPage()
    {
        include 'view/public/project.php';
    }

    function allProjectsPage()
    {
        include 'view/public/all_projects.php';
    }

    function projectGestionPage()
    {
    if ($_SESSION['user']->role-> id == 3) {
        $projectRepository = new ProjectRepository;
        $projects = $projectRepository->getEntrepriseProjects($_SESSION['user']->id);
        include 'view/public/project_gestion.php';
    } else if ($_SESSION['user']->role-> id == 1){
        $promoRepository = new PromoRepository;
        $promos =   $promoRepository->getActivePromos();
        $projectRepository = new ProjectRepository;
        $projects = $projectRepository->getWaitingProjects();
        include 'view/public/project_gestion.php';
    } else if ($_SESSION['user']->role-> id == 2) {
        $projectRepository = new ProjectRepository;
        $projects = $projectRepository->getFormateurProjects($_SESSION['user']->id);
        include 'view/public/project_gestion.php';
    } else {
        header('Location:?action=homepage');
    }

    }

// Profile
function profilePage()
{
    if (!isset($_GET['id'])) {
        if (!isset($_SESSION['user']['user_id'])) {
            homepage();
        } else {
            myProfile();
        }
    }
    else if (isset($_GET['id']) && $_GET['id'] == $_SESSION['user']['user_id']) {
        myProfile();
    }
    else {
        $id = $_GET['id'];
        $user = new UserRepository();
        $userDatas = new User($id);
        $tags = new TagRepository();
        $allTags = $tags->getAllTags();
        $status = new StatusRepository();
        $allStatus = $status->getAllStatus();
        $ProjectRepo = new ProjectRepository();
        $userProjects = $ProjectRepo->getUserProjects($id);
        $Promo = new PromoRepository();
        $userPromo = $Promo->getPromoByUserID($id);
        include 'view/public/profile.php';
    }
}

function myProfile()
{
    $isMyProfile = false;
    if (!isset($_GET['id'])) {
        if (!isset($_SESSION['user']['user_id'])) {
            homepage();
        } else {
            $id = $_SESSION['user']['user_id'];
            $isMyProfile = true;
        }
    }
    else if (isset($_GET['id']) && $_GET['id'] == $_SESSION['user']['user_id']) {
        $id = $_SESSION['user']['user_id'];
        $isMyProfile = true;
    }
    else {
        $id = $_GET['id'];
        profilePage();
    }
    $userDatas = new User($id);
    $tags = new TagRepository();
    $allTags = $tags->getAllTags();
    $status = new StatusRepository();
    $allStatus = $status->getAllStatus();
    $ProjectRepo = new ProjectRepository();
    $userProjects = $ProjectRepo->getUserProjects($id);
    $Promo = new PromoRepository();
    $userPromo = $Promo->getPromoByUserID($id);
    include 'view/public/profile.php';
}

// Register
function registerPage()
{
    $boolCompany = (isset($_GET['company'])) ? 1 : 0;
    $formation_id = (isset($_GET['formation_id'])) ? $_GET['formation_id'] : 0;
    include 'view/public/register.php';

}
    // Promotion
    function allPromotionsPage()
    {
        $PromoRepository = new PromoRepository;
        $promos = $PromoRepository->getPromos();
        include 'view/public/all_promotions.php';
    }
    function promotionPage()
    {
        if (isset($_GET['id_promo'])) {
            $id = $_GET['id_promo'];
        } else {
            $id = 1;
        }
        $PromoRepository = new PromoRepository;
        $promo = $PromoRepository->getPromoById($id);
        $apprenants = $PromoRepository->getAllApprenants($id);
        $formateurs = $PromoRepository->getAllFormateurs($id);
        $allProjects = $PromoRepository->getPromoProjects($id);
        include 'view/public/promotion.php';
    }

    function accountActivationPage()
    {
        $etat = activationAccountTreatment();
        include 'view/public/accountActivation.php';
    }


    function resetPasswordForm()
    {
        $token = $_GET['token'];
        $etat = checkToken();
        if ($etat === true) {
            include 'view/public/resetPassword.php';
        } else {
            throw new Exception($etat[1]);
        }
    }


// ==================  Admin  ======================

function crudCandidatePage()
{
    $UserRepo = new UserRepository;
    $candidates = $UserRepo->getAllCandidates();

    include 'view/admin/_candidate.php';
}  
  
  
function crudLearnerPage()
{
    $UserRepo = new UserRepository;
    $learners = $UserRepo->getAllLearners();
    $formators = $UserRepo->getAllFormators();
    $PromoRepo = new PromoRepository;
    $promos = $PromoRepo->getActivePromos();

    include 'view/admin/_learner.php';
}

function crudCompanyPage()
{
    $UserRepo = new UserRepository;
    $companies = $UserRepo->getAllCompanies();
    include 'view/admin/_company.php';
}

function crudPromotionPage()
{
    $PromoRepo = new PromoRepository;
    $promos = $PromoRepo->getPromos();

    $UserRepo = new UserRepository;
    $FormationRepo = new FormationRepository;
    $formators = $UserRepo->getAllFormators();
    $formations = $FormationRepo->getAllFormations();

    include 'view/admin/_promotions.php';
}

function crudProjetPage()
{
    $ProjectRepo = new ProjectRepository;
    $projects = $ProjectRepo->getAllProjects();
    $PromoRepo = new PromoRepository;
    $promos = $PromoRepo->getActivePromos();
    include 'view/admin/_projects.php';
}

function projectFormPage() {
    $UserRepo = new UserRepository;
    // $User = $UserRepo->new User($_SESSION['user']->role_id);
    $User = new User(3);
    if(isset($_GET['id'])){
        $projectRepo = new ProjectRepository;
        $project=$projectRepo->getProjectById($_GET['id']);
    }

    include 'view/admin/projectAddForm.php';
}

} catch (Exception $error) {
    echo 'Exception reçue : ', $error->getMessage(), "\n";
}