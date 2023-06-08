<?php
$formationRepo = new FormationRepository;
$formations = $formationRepo->getAllFormations(); ?>

<nav id="navbar"
  class="w-[100vw] fixed top-0 shadow-[3px_5px_10px] shadow-[#1111114d] blur-[0.2px] left-0 z-40 transition-all duration-[0.3s]">
  <div
    class="grid grid-cols-2 transition-all duration-[0.2s] items-center bg-main-white border-t-[4px] md:grid-cols-[20%_80%] border-main-red">
    <a href="index.php"><img src="assets/img/navbar/logo-simplon.png" alt="Logo Simplon" class="w-[171px]" /></a>
    <i onclick="changeNavFunction()"
      class="fa-solid fa-bars text-[39px] justify-self-end mr-6 sm:mr-8 mb-1 md:hidden hiddenIcon"></i>
    <i onclick="changeNavFunction()"
      class="fa-solid fa-xmark text-[46px] justify-self-end mr-6 mb-1 sm:mr-8 md:hidden hiddenIcon"
      style="display: none"></i>
    <div
      class="changeNav hidden md:grid bg-main-lightred md:bg-main-white col-start-1 col-end-3 md:col-start-auto md:justify-self-end md:mr-2 lg:mr-4 xl:mr-6 translate-x-[80vw] md:translate-x-0 duration-[0.4s] ease-out transition-all">
      <div
        class="grid grid-cols-[25%_60%] sm:mx-auto sm:w-[40%] items-center pt-8 gap-8 md:mr-4 md:pt-0 md:inline-flex md:w-full md:gap-2">
        <?php
        if (
          isset($_SESSION['user']->role->id) &&
          $_SESSION['user']->role->id == 1
        ) { ?>
          <i class="md:ml-2 hiddenIcon fa-solid fa-screwdriver-wrench text-[44px] sm:text-[62px] justify-self-center md:text-[20px]"
            style="color: #bd3124"></i>
          <a href="#" class="md:hidden text-[24px] sm:text-[36px]">Admin</a>
          <?php
        }
        ?>
        <i class="md:ml-2 fa-solid fa-file-lines text-[44px] sm:text-[62px] md:text-[20px] justify-self-center"
          style="color: #bd3124"></i>
        <!-- Dropdown menu -->
        <div>
          <button data-dropdown-toggle="dropdown"
            class="focus:outline-none rounded-[4px] text-[24px] sm:text-[36px] md:text-[20px] xl:text-[24px] text-center inline-flex items-center"
            type="button">
            Formations
            <svg class="w-8 h-8 ml-2 transition-all  duration-[1s]  linear" aria-hidden="true" fill="none"
              stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
              </path>
            </svg>
          </button>
          <div id="dropdown"
            class="z-50 border-main-lightgray hidden bg-main-white rounded-lg shadow w-fit mr-4 pl-0 border-main-lightgray">
            <ul
              class="z-50 relative py-2 md:py-0 px-2 md:px-0 text-sm leading-9 sm:leading-[60px] text-gray-700 divide-y border-2 border-main-red divide-main-red rounded-[4px]"
              aria-labelledby="dropdownDefaultButton">
              <?php foreach ($formations as $formation) { ?>
                <li class="md:hover:bg-main-lightred">
                  <a href="?action=formationPage&id=<?= $formation->id ?>"
                    class="block px-4 py-2 text-[22px] sm:text-[32px] md:text-[20px]"><?= $formation->name ?></a>
                </li>
              <?php } ?>
            </ul>
          </div>
        </div>
        <i class="md:ml-2 fa-solid fa-users text-[44px] sm:text-[62px] justify-self-center md:text-[20px]"
          style="color: #bd3124"></i>
        <p class="text-[24px] sm:text-[36px] md:text-[20px] xl:text-[24px]">
          <a href="?action=allPromotionsPage">Promotions</a>
        </p>
        <i class="md:ml-2 fa-solid fa-book text-[44px] sm:text-[62px] justify-self-center md:text-[20px]"
          style="color: #bd3124"></i>
        <p class="text-[24px] sm:text-[36px] md:text-[20px] xl:text-[24px]">
          <a href="?action=allProjectsPage">Projets</a>
        </p>
        <i class="md:ml-2 fa-solid fa-user text-[44px] sm:text-[62px] justify-self-center md:text-[20px]"
          style="color: #bd3124"></i>
        <?php if (isset($_SESSION['user'])) { ?>
          <div>
            <button data-dropdown-toggle="dropdownAccount"
              class="focus:outline-none rounded-[4px] text-[24px] sm:text-[36px] md:text-[20px] xl:text-[24px] text-center inline-flex items-center"
              type="button">
              Compte
              <svg class="w-8 h-8 ml-2 transition-all  duration-[1s]  linear" aria-hidden="true" fill="none"
                stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                </path>
              </svg>
            </button>
            <div id="dropdownAccount"
              class="z-50 border-main-lightgray hidden bg-main-white rounded-lg shadow w-fit mr-4 pl-0 border-main-lightgray">
              <ul
                class="z-50 relative py-2 md:py-0 px-6 md:px-0 text-sm leading-9 sm:leading-[60px] text-gray-700 divide-y border-2 border-main-red divide-main-red rounded-[4px]"
                aria-labelledby="dropdownAccountDefaultButton">
                <?php if (isset($_SESSION['user']) && $_SESSION['user']->role_id != 3 && $_SESSION['user']->role_id != 1) { ?>

                  <li class="md:hover:bg-main-lightred">
                    <a href="?action=profilePage" class="block px-4 py-2 text-[22px] sm:text-[32px] md:text-[20px]">Mon
                      profil</a>
                  </li>
                <?php } ?>
                <?php if (isset($_SESSION['user']) && $_SESSION['user']->role_id == 1) { ?>
                  <li class="md:hover:bg-main-lightred">
                    <a href="?action=crudLearnerPage"
                      class="block px-4 py-2 text-[22px] sm:text-[32px] md:text-[20px]">Admin</a>
                  </li>
                <?php } ?>
                <?php if (isset($_SESSION['user']) && $_SESSION['user']->role_id < 4) { ?>
                  <li class="md:hover:bg-main-lightred">
                    <a href="?action=projectGestionPage&id=<?= $_SESSION['user']->user_id ?>"
                      class="block px-4 py-2 text-[22px] sm:text-[32px] md:text-[20px]">Mes Projets</a>
                  </li>
                <?php } ?>
                <?php if (isset($_SESSION['user']) && $_SESSION['user']->role_id == 4) { ?>
                  <li class="md:hover:bg-main-lightred">
                    <a href="?action=promotionPage" class="block px-4 py-2 text-[22px] sm:text-[32px] md:text-[20px]">Ma
                      promo</a>
                  </li>
                <?php } ?>


                <li class="md:hover:bg-main-lightred">
                  <a href="index.php?action=logOut"
                    class="block px-4 py-2 text-[22px] sm:text-[32px] md:text-[20px]">Déconnexion</a>
                </li>
              </ul>
            </div>
          </div>
          <?php
        } else {
          ?>
          <button type="button" id="connexion"
            class="text-[24px] sm:text-[36px] md:text-[20px] xl:text-[24px] cursor-pointer"
            data-modal-target="login-modal" data-modal-toggle="login-modal">
            Connexion
          </button>
          <?php
        }
        ?>
      </div>
    </div>
  </div>
  <div id="content_succes">
    <?php if (isset($_SESSION['succes'])) {
      $_SESSION['succes'];
    } ?>
  </div>
</nav>