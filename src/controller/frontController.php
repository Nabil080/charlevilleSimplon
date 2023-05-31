<?php
require_once("src/model/Promo.php");
require_once("src/model/Formation.php");

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
        $projectRepository = new ProjectRepository;
        $promoRepository = new PromoRepository;
        $progressRepository = new ProgressRepository;
        $isMyProject = false;
        if (isset($_SESSION['user'])) {

            $userProject = $projectRepository->getUserProjects($_SESSION['user']->user_id);

            foreach ($userProject as $project){
                if (isset($_GET['id']) && $_GET['id'] == $project->id) {
                    $isMyProject = true;
                }
            }
        }
        if (!isset($_GET['id'])) {
            header('Location:?action=homepage');
        }
        
        if ($_SESSION['user']->user_id == 1) {
            $isMyProject = true;
        }
        if (isset($_GET['id']) && $_GET['id'] !== 0) {
            $id = $_GET['id'];
        } else {
            $id = 3;
        }
        

        $project = $projectRepository->getProjectById($id);
        $team = $projectRepository->getProjectUsers($id);
        $promoUsers = $promoRepository->getAllApprenants($project->promo->id);
        $promoFormateurs = $promoRepository->getAllFormateurs($project->promo->id);
        $allProgress = $progressRepository->getProgressByProjectId($id);
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
        include 'view/public/profile.php';
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

    // Register
    function registerPage()
    {
        $boolCompany = (isset($_GET['company'])) ? 1 : 0;
        $formation_id = (isset($_GET['formation_id'])) ? $_GET['formation_id'] : 0;

        include 'view/public/register.php';
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
        include 'view/admin/_candidate.php';
    }

    function crudLearnerPage()
    {
        include 'view/admin/_learner.php';
    }

    function crudCompanyPage()
    {
        include 'view/admin/_company.php';
    }

    function crudPromotionPage()
    {
        include 'view/admin/_promotions.php';
    }

    function crudProjetPage()
    {
        include 'view/admin/_projects.php';
    }

    function projectFormPage()
    {
        include 'view/admin/projectAddForm.php';
    }
} catch (Exception $error) {
    echo 'Exception reçue : ', $e->getMessage(), "\n";

}