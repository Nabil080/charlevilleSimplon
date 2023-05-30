<nav class="w-[100vw] backdrop-opacity-10 backdrop-blur-xl shadow-[3px_5px_10px_1px] shadow-[#1111114d] fixed top-0 left-0 z-40 transition-all duration-[0.3s]">

      <div class="grid grid-cols-2 transition-all duration-[0.2s] items-center bg-main-white border-t-[4px] md:grid-cols-[20%_80%] border-main-red">
        <a href="index.php"><img src="assets/img/navbar/logo-simplon.png" alt="Logo Simplon" class="w-[120px] md:w-[171px]" /></a>
        <i onclick="changeNavFunction()" class="fa-solid fa-bars text-[25px] md:text-[39px] justify-self-end mr-6 sm:mr-8 mb-1 md:hidden hiddenIcon"></i>
        <i onclick="changeNavFunction()" class="fa-solid fa-xmark text-[30px] md:text-[46px] justify-self-end mr-6 mb-1 sm:mr-8 md:hidden hiddenIcon" style="display: none"></i>
        <div class="changeNav hidden md:grid bg-main-lightred md:bg-main-white col-start-1 col-end-3 md:col-start-auto md:justify-self-end md:mr-2 lg:mr-4 xl:mr-6 translate-x-[80vw] md:translate-x-0 duration-[0.4s] ease-out transition-all ">

          <div class="grid grid-cols-[25%_60%] sm:mx-auto sm:w-[40%] items-center pt-8 gap-8 md:mr-4 md:pt-0 md:inline-flex md:w-full md:gap-2">
          <?php 
            if (isset($_SESSION['user']->role->id) && $_SESSION['user']->role->id == 1) { 
          ?>
              <i class="md:ml-2 hiddenIcon fa-solid fa-screwdriver-wrench text-[44px] sm:text-[62px] justify-self-center  md:text-[20px]" style="color: #BD3124;"></i>
              <a href="#" class="md:hidden text-[24px] sm:text-[36px]">Admin</a>
          <?php
            }
          ?>
              <i class="md:ml-2 fa-solid fa-file-lines text-[44px] sm:text-[62px] md:text-[20px] justify-self-center"  style="color: #BD3124;"></i>
              <!-- Dropdown menu -->
              <div>
                  <button data-dropdown-toggle="dropdown" class="focus:outline-none rounded-[4px] text-[24px] sm:text-[36px] md:text-[20px] xl:text-[24px] text-center inline-flex items-center" type="button">Formations
                      <svg class="w-8 h-8 ml-2" aria-hidden="true" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" ></path>
                      </svg>
                  </button>
                  <div id="dropdown" class="z-50 border-main-lightgray hidden bg-main-white rounded-lg shadow w-full mr-4 pl-0 border-main-lightgray">
                      <ul class="z-50 relative py-2 md:py-0 px-2 md:px-0 text-sm leading-9 sm:leading-[60px] text-gray-700 divide-y border-2 border-main-red divide-main-red rounded-[4px]" aria-labelledby="dropdownDefaultButton">
                        <li class="md:hover:bg-main-lightred">
                          <a href="?action=allFormationsPage" class="block px-4 py-2 text-[22px] sm:text-[32px] md:text-[20px] ">Découvrir nos formations</a>
                        </li>
                        <li class="md:hover:bg-main-lightred">
                          <a href="?action=formationPage&id=1" class="block px-4 py-2 text-[22px] sm:text-[32px] md:text-[20px]">Devellopeur Web / Web mobile</a>
                        </li>
                        <li class="md:hover:bg-main-lightred">
                          <a href="?action=formationPage&id=2" class="block px-4 py-2 text-[22px] sm:text-[32px] md:text-[20px]">Référent Digital</a>
                        </li>
                        <li class="md:hover:bg-main-lightred">
                          <a href="?action=formationPage&id=3" class="block px-4 py-2 text-[22px] sm:text-[32px] md:text-[20px]">Technicien supérieur système et réseaux</a>
                        </li>
                        <li class="md:hover:bg-main-lightred">
                          <a href="?action=formationPage&id=4" class="block px-4 py-2 text-[22px] sm:text-[32px] md:text-[20px]">Concepteur développeur d'applications</a>
                        </li>
                      </ul>
                  </div>
              </div>
              <i class="md:ml-2 fa-solid fa-users text-[44px] sm:text-[62px] justify-self-center  md:text-[20px]" style="color: #BD3124;"></i>
              <p class="text-[24px] sm:text-[36px] md:text-[20px] xl:text-[24px]"><a href="?action=allPromotionsPage">Promotions</a></p>
              <i class="md:ml-2 fa-solid fa-book text-[44px] sm:text-[62px] justify-self-center  md:text-[20px]"  style="color: #BD3124;"></i>
              <p class="text-[24px] sm:text-[36px] md:text-[20px] xl:text-[24px]"><a href="?action=allProjectsPage">Projets</a></p>
              <i class="md:ml-2 fa-solid fa-user text-[44px] sm:text-[62px] justify-self-center  md:text-[20px]"  style="color: #BD3124;"></i>
              <?php if (isset($_SESSION['user']->role->id)){
                      if ($_SESSION['user']->role->id == 3) {?>
                <p class="text-[24px] sm:text-[36px] md:text-[20px] xl:text-[24px]"><a href="?action=projectGestionPage">Mes Projets</a></p>
                  <?php } else { ?>
                <p class="text-[24px] sm:text-[36px] md:text-[20px] xl:text-[24px]"><a href="">Compte</a></p>
              <?php 
              }
              } else {
              ?>
                <p class="text-[24px] sm:text-[36px] md:text-[20px] xl:text-[24px] cursor-pointer" data-modal-target="login-modal" data-modal-toggle="login-modal">Connexion</p>
              <?php 
              } 
              ?>
          </div>
        </div>
      </div>
      <?php 
        if (isset($_SESSION['define'])) { 
      ?>
        <div class="w-full  justify-center hidden md:flex">
          <a href="#" class="text-center bg-main-red px-5 py-1 rounded-[5px] text-[20px] text-main-white">Admin</a>
        </div>
      <?php
        }
      ?>
</nav>

<!-- Modal de connexion -->
<section id="login-modal" data-modal-placement="center" tabindex="-1" aria-hidden="true" class="backdrop:brightness-50 fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] md:h-full">
    <div class="relative w-full h-fit max-w-md md:h-auto">
        <div class="relative bg-main-white border-main-red border-2 rounded-md text-main-red">
            <button type="button" class="absolute top-3 right-2.5 text-main-red bg-transparent rounded-md text-sm p-1.5 ml-auto inline-flex items-center hover: hover:border border-main-red" data-modal-hide="login-modal">
                <svg data-modal-hide="login-modal" aria-hidden="true" class="w-5 h-5 text-main-light" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                <span class="sr-only">Close modal</span>
            </button>
            <!-- Partie CONNEXION -->
            <div id="co" class="px-6 py-6 lg:px-8">
                <h3 class="mb-4 text-xl uppercase w-fit mx-auto font-bold font-title text-main-red">Connexion</h3>
                <form class="space-y-6" action="/portfolio/allosimplon/traitements/connexion/login.php" method="post">
                    <div>
                        <label for="email" class="block mb-2 text-sm font-medium  text-main-red">E-mail</label>
                        <input type="email" name="email" id="email" class=" border text-sm rounded-md block w-full p-2.5 border-main-red text-main-red" placeholder="Exemple@mail.com" required>
                    </div>
                    <div>
                        <label for="password" class="block mb-2 text-sm font-medium  text-main-red">Mot de passe</label>
                        <input type="password" name="password" id="password" placeholder="*********" class=" border text-sm rounded-md block w-full p-2.5 border-main-red text-main-red" required>
                    </div>
                    <button type="submit" class="w-full uppercase font-title text-main-white bg-main-red hover:bg-red-800 font-medium rounded-md text-sm px-5 py-2.5 text-center ">Se connecter</button>
                    <div class="text-sm font-bold text-main-gray">
                        Mot de passe oublié ? <a onclick="switchDiv('co','paco')" class="hover:underline text-main-red cursor-pointer">Le réinitialiser</a>
                    </div>
                </form>
            </div>
            <!-- Partie MDP OUBLIÉ -->
            <div id="paco" class="hidden px-6 py-6 lg:px-8">
                <h3 class="mb-4 text-xl uppercase w-fit mx-auto font-bold font-title text-main-red">Mot de passe oublié</h3>
                <form class="space-y-6" action="/portfolio/allosimplon/traitements/connexion/sign.php" method="post">
                    <div>
                        <label for="email" class="block mb-2 text-sm font-medium  text-main-red">Votre adresse mail</label>
                        <input type="email" name="email" id="email" class=" border text-sm rounded-md block w-full p-2.5 border-main-red text-main-red" placeholder="Exemple@mail.com" required>
                    </div>
                    <button type="submit" class="w-full font-title text-main-white bg-main-red hover:bg-red-800 font-medium rounded-md text-sm px-5 py-2.5 text-center ">Réinitialiser le mot de passe</button>
                    <div class="text-sm font-bold text-main-gray">
                        Vous avez votre mot de passe ? <a onclick="switchDiv('co','paco')" class="hover:underline text-main-red cursor-pointer">Se connecter</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>


<script src="assets/js/nav.js"></script>