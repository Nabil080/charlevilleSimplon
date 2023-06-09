<?php
function homepage()
{
    $formationRepository = new FormationRepository;
    $promoRepository = new PromoRepository;
    $formations = $formationRepository->getAllFormations();
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
    $promoRepository = new PromoRepository;
    $formations = $formationRepository->getAllFormations();
    include 'view/public/allFormations.php';
}

function formationPage()
{
    if (isset($_GET['id']) && !empty($_GET['id'])) {
        $formation_id = (int) $_GET['id'];
        $Formation = new FormationRepository;
        if ($Formation->checkExistFormation($formation_id)) {
            $Stat = new StatRepository;
            $Job = new JobRepository;
            $Activity = new ActivityRepository;
            $Skill = new SkillRepository;
            $Requirement = new RequirementRepository;
            $Program = new ProgramRepository;
            $Fee = new FeeRepository;
            $Certification = new CertificationRepository;

            $formation_main = $Formation->getFormationById($formation_id);
            $formation_stat = $Stat->getStats($formation_id);
            $formation_job = $Job->getJobName($formation_id);
            $formation_activity = $Activity->getActivityByFormation($formation_id);
            $formation_admission = $Requirement->getRequirementByFormation($formation_id);
            $formation_program = $Program->getProgramByFormation($formation_id);
            $formation_fee = $Fee->getFeeByFormation($formation_id);
            $formation_certification = $Certification->getCertificationByFormation($formation_id);

            $activity_all = $Activity->getAll();
            $job_all = $Job->getAll();
            $skill_all = $Skill->getAll();
            $admission_all = $Requirement->getAll();
            $fee_all = $Fee->getAll();
            $certification_all = $Certification->getAll();

            if (isset($_SESSION['user']->user_id) && $_SESSION['user']->user_id == 1) {
                $CanModify = true;
            } else {
                $CanModify = false;
            }

            include 'view/public/formation.php';
        } else
            throw new Exception('error_404');
    } else
        throw new Exception('error_404');
}

// Project 
function projectPage()
{
    $projectRepository = new ProjectRepository;
    $promoRepository = new PromoRepository;
    $progressRepository = new ProgressRepository;
    $tags = new TagRepository();
    $isMyProject = false;
    if (isset($_SESSION['user'])) {
        $userProject = $projectRepository->getUserProjects($_SESSION['user']->user_id);
        foreach ($userProject as $project) {
            if (isset($_GET['id']) && $_GET['id'] == $project->id) {
                $isMyProject = true;
            }
        }
    }
    if (!isset($_GET['id'])) {
        header('Location:?action=homepage');
    }
    if (isset($_SESSION['user']) && $_SESSION['user']->role_id == 1) {
        $isMyProject = true;
    }
    if (isset($_GET['id']) && $_GET['id'] !== 0) {
        $id = $_GET['id'];
    } else {
        $id = 3;
    }


    $allTags = $tags->getAllTags();

    $project = $projectRepository->getProjectById($id);
    // if ($project->status->id !== 10) {
    //     header('Location:?action=homepage');
    // }
    $team = $projectRepository->getProjectUsers($id);
    if (isset($project->promo->id)) {
        $promoUsers = $promoRepository->getAllApprenants($project->promo->id);
        $promoFormateurs = $promoRepository->getAllFormateurs($project->promo->id);
    }
    $allProgress = $progressRepository->getProgressByProjectId($id);
    include 'view/public/project.php';
}

function allProjectsPage()
{
    include 'view/public/all_projects.php';
}

function projectGestionPage()
{
    if ($_SESSION['user']->role_id == 3) {
        $projectRepository = new ProjectRepository;
        $projects = $projectRepository->getEntrepriseProjects($_SESSION['user']->user_id);
        include 'view/public/project_gestion.php';
    } else if ($_SESSION['user']->role_id == 1) {
        $promoRepository = new PromoRepository;
        $promos = $promoRepository->getActivePromos();
        $projectRepository = new ProjectRepository;
        $projects = $projectRepository->getWaitingProjects();
        include 'view/public/project_gestion.php';
    } else if ($_SESSION['user']->role_id == 2) {
        $projectRepository = new ProjectRepository;
        $projects = $projectRepository->getFormateurProjects($_SESSION['user']->user_id);
        include 'view/public/project_gestion.php';
    } else {
        header('Location:?action=homepage');
    }

}

// Profile
function profilePage()
{
    if (!isset($_GET['id'])) {
        if (!isset($_SESSION['user']->user_id)) {
            homepage();
        } else {
            myProfile();
            // header('Location:?action=homepage');
        }

    } else if (isset($_GET['id']) && isset($_SESSION['user']) && ($_GET['id'] == $_SESSION['user']->user_id)) {
        myProfile();
    } else {
        $id = $_GET['id'];
        $user = new UserRepository();
        $userDatas = new User($id);
        if ($userDatas->role_id == 1 || $userDatas->role_id == 3) {
            homepage();
        } elseif ($userDatas->role_id == 2) {
            // gérer rôle formateur : ne pas afficher promo
            $tags = new TagRepository();
            $allTags = $tags->getAllTags();
            $userTags = $tags->getUserTags($id);
            $status = new StatusRepository();
            $allStatus = $status->getAllStatus();
            $ProjectRepo = new ProjectRepository();
            $userProjects = $ProjectRepo->getUserProjects($id);
            $Promo = new PromoRepository();
            $userPromo = $Promo->getPromoByUserID($id);
            include 'view/public/profile.php';
        } else {
            $tags = new TagRepository();
            $allTags = $tags->getAllTags();
            $userTags = $tags->getUserTags($id);
            $status = new StatusRepository();
            $allStatus = $status->getAllStatus();
            $ProjectRepo = new ProjectRepository();
            $userProjects = $ProjectRepo->getUserProjects($id);
            $Promo = new PromoRepository();
            $userPromo = $Promo->getPromoByUserID($id);
            include 'view/public/profile.php';
        }
    }
}

function myProfile()
{
    $isMyProfile = false;
    if (!isset($_GET['id'])) {
        if (!isset($_SESSION['user']->user_id)) {
            homepage();
        } else {
            $id = $_SESSION['user']->user_id;
            $isMyProfile = true;
            $user = new UserRepository();
            $userDatas = new User($id);
            if ($userDatas->role_id == 1 || $userDatas->role_id == 3) {
                homepage();
            } elseif ($userDatas->role_id == 2) {
                // gérer rôle formateur : ne pas afficher promo
                $tags = new TagRepository();
                $allTags = $tags->getAllTags();
                $userTags = $tags->getUserTags($id);
                $status = new StatusRepository();
                $allStatus = $status->getAllStatus();
                $ProjectRepo = new ProjectRepository();
                $userProjects = $ProjectRepo->getUserProjects($id);
                $Promo = new PromoRepository();
                $userPromo = $Promo->getPromoByUserID($id);
                include 'view/public/profile.php';
            } else {
                $tags = new TagRepository();
                $allTags = $tags->getAllTags();
                $userTags = $tags->getUserTags($id);
                $status = new StatusRepository();
                $allStatus = $status->getAllStatus();
                $ProjectRepo = new ProjectRepository();
                $userProjects = $ProjectRepo->getUserProjects($id);
                $Promo = new PromoRepository();
                $userPromo = $Promo->getPromoByUserID($id);
                include 'view/public/profile.php';
            }
        }
    } else if (isset($_GET['id']) && $_GET['id'] == $_SESSION['user']->user_id) {
        $id = $_SESSION['user']->user_id;
        $isMyProfile = true;
        $user = new UserRepository();
        $userDatas = new User($id);
        if ($userDatas->role_id == 1 || $userDatas->role_id == 3) {
            homepage();
        } elseif ($userDatas->role_id == 2) {
            // gérer rôle formateur : ne pas afficher promo
            $tags = new TagRepository();
            $allTags = $tags->getAllTags();
            $userTags = $tags->getUserTags($id);
            $status = new StatusRepository();
            $allStatus = $status->getAllStatus();
            $ProjectRepo = new ProjectRepository();
            $userProjects = $ProjectRepo->getUserProjects($id);
            $Promo = new PromoRepository();
            $userPromo = $Promo->getPromoByUserID($id);
            include 'view/public/profile.php';
        } else {
            $tags = new TagRepository();
            $allTags = $tags->getAllTags();
            $userTags = $tags->getUserTags($id);
            $status = new StatusRepository();
            $allStatus = $status->getAllStatus();
            $ProjectRepo = new ProjectRepository();
            $userProjects = $ProjectRepo->getUserProjects($id);
            $Promo = new PromoRepository();
            $userPromo = $Promo->getPromoByUserID($id);
            include 'view/public/profile.php';
        }
    } else {
        $id = $_GET['id'];
        profilePage();
    }
}

// Register
function registerPage()
{
    $boolCompany = (isset($_GET['company'])) ? 1 : 0;
    $formation_id = (isset($_GET['id'])) ? $_GET['id'] : 0;
    if (($boolCompany == 0 && $formation_id == 0) || ($boolCompany == 1 && $formation_id != 0)) {
        throw new Exception('error_404');
    } elseif ($boolCompany === 1) {
        include 'view/public/register.php';
    } else {
        $PromoRepository = new PromoRepository;
        $promo = $PromoRepository->getPromoById($formation_id);
        include 'view/public/register.php';
    }
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
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
    } else {
        throw new Exception('error_404');
    }

    if (isset($_GET['project']) && $_GET['project'] == 1) {
        $seeProjects = true;
    } else {
        $seeProjects = false;
    }
    $PromoRepository = new PromoRepository;
    $tagsRepository = new TagRepository;
    $projectRepository = new ProjectRepository;
    $formationRepository = new FormationRepository;
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
    include 'view/admin/_candidate.php';
}


function crudLearnerPage()
{
    $UserRepo = new UserRepository;
    $PromoRepo = new PromoRepository;
    $promos = $PromoRepo->getActivePromos();

    include 'view/admin/_learner.php';
}

function crudCompanyPage()
{
    $UserRepo = new UserRepository;
    include 'view/admin/_company.php';
}

function crudPromotionPage()
{
    $tagsRepository = new TagRepository;
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
    include 'view/admin/_projects.php';
}

function projectFormPage()
{
    $User = new User($_SESSION['user']->role_id);
    if (isset($_GET['id'])) {
        $projectRepo = new ProjectRepository;
        $project = $projectRepo->getProjectById($_GET['id']);
    }

    include 'view/admin/projectAddForm.php';
}

function errorPage($error)
{
    $data = json_decode(file_get_contents('assets/json/errorPage.json'), true);
    $errorTable = $data[$error->getMessage()];

    include 'view/public/errorPage.php';
}