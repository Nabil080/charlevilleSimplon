<nav class="w-[100vw] fixed top-0 left-0 transition-all duration-[0.3s]">
      <div class="grid grid-cols-2 transition-all duration-[0.2s] items-center bg-main-white border-t-[4px] md:grid-cols-[20%_80%] border-main-red">
        <img src="assets/img/navbar/logo-simplon.png" alt="Logo Simplon" class="w-[171px]" />
        <i id="hiddenIcon" onclick="changeNavFunction()" class="fa-solid fa-bars text-[39px] justify-self-end mr-4 mb-1 md:hidden"></i>
        <i onclick="changeNavFunction()" class="fa-solid fa-xmark text-[46px] justify-self-end mr-4 mb-1 md:hidden" style="display: none"></i>
        <div class="changeNav hidden md:grid bg-main-lightred md:bg-main-white col-start-1 col-end-3 md:col-start-auto md:justify-self-end md:mr-2 lg:mr-4 xl:mr-6 translate-x-[80vw] md:translate-x-0 duration-[0.4s] ease-out transition-all ">
          <div class="grid grid-cols-[25%_60%] sm:mx-auto sm:w-[40%] items-center pt-8 gap-8 md:mr-4 md:pt-0 md:inline-flex md:w-full md:gap-2">
              <i class="md:ml-2 fa-solid fa-file-lines text-[44px] sm:text-[62px] md:text-[20px] justify-self-center"  style="color: #BD3124;"></i>
              <!-- Dropdown menu -->
              <div>
                  <button data-dropdown-toggle="dropdown" class="focus:outline-none rounded-[4px] text-[24px] sm:text-[36px] md:text-[20px] text-center inline-flex items-center" type="button">Formations
                      <svg class="w-8 h-8 ml-2" aria-hidden="true" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" ></path>
                      </svg>
                  </button>
                  <div id="dropdown" class="z-10 border-main-lightgray hidden bg-main-white rounded-lg shadow w-full mr-4 pl-0 border-main-lightgray">
                      <ul class="z-100 relative py-2 px-2 text-sm leading-9 sm:leading-[60px] text-gray-700 divide-y border-2 border-main-red divide-main-red rounded-[4px]" aria-labelledby="dropdownDefaultButton">
                        <li class="md:hover:bg-main-lightred">
                          <a href="#" class="block px-4 py-2 text-[22px] sm:text-[32px] md:text-[20px] ">Découvrir nos formations</a>
                        </li>
                        <li class="md:hover:bg-main-lightred">
                          <a href="#" class="block px-4 py-2 text-[22px] sm:text-[32px] md:text-[20px]">Devellopeur Web / Web mobile</a>
                        </li>
                        <li class="md:hover:bg-main-lightred">
                          <a href="#" class="block px-4 py-2 text-[22px] sm:text-[32px] md:text-[20px]">Référent Digital</a>
                        </li>
                        <li class="md:hover:bg-main-lightred">
                          <a href="#" class="block px-4 py-2 text-[22px] sm:text-[32px] md:text-[20px]">Technicien supérieur système et réseaux</a>
                        </li>
                        <li class="md:hover:bg-main-lightred">
                          <a href="#" class="block px-4 py-2 text-[22px] sm:text-[32px] md:text-[20px]">Concepteur développeur d'applications</a>
                        </li>
                      </ul>
                  </div>
              </div>
              <i class="md:ml-2 fa-solid fa-users text-[44px] sm:text-[62px] justify-self-center  md:text-[20px]" style="color: #BD3124;"></i>
              <p class="text-[24px] sm:text-[36px] md:text-[20px]">Promotions</p>
              <i class="md:ml-2 fa-solid fa-book text-[44px] sm:text-[62px] justify-self-center  md:text-[20px]"  style="color: #BD3124;"></i>
              <p class="text-[24px] sm:text-[36px] md:text-[20px]">Projets</p>
              <i class="md:ml-2 fa-solid fa-user text-[44px] sm:text-[62px] justify-self-center  md:text-[20px]"  style="color: #BD3124;"></i>
              <p class="text-[24px] sm:text-[36px] md:text-[20px]">Compte</p>
          </div>
        </div>
      </div>

</nav>

<script src="assets/js/nav.js"></script>


