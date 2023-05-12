<section > <!-- Navigation -->       
    <button data-drawer-target="sidebar-multi-level-sidebar" data-drawer-toggle="sidebar-multi-level-sidebar" aria-controls="sidebar-multi-level-sidebar" type="button" class="inline-flex items-center p-2 mt-2 ml-3 text-sm text-gray-500 rounded-lg sm:hidden focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400  dark:focus:ring-gray-600">
       <span class="sr-only">Open sidebar</span>
       <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
      <path clip-rule="evenodd" fill-rule="evenodd" d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"></path>
       </svg>
    </button>
    
    <aside id="sidebar-multi-level-sidebar" class="fixed top-20 left-0 z-40 w-64 h-screen transition-transform -translate-x-full sm:translate-x-0" aria-label="Sidebar">
    <div class="h-full px-3 py-4 overflow-y-auto bg-gray-50 dark:bg-main-white shadow-md shadow-gray-800">
        <ul class="space-y-2 font-medium">
           <li>
              <a href="#" class="flex items-center p-2  rounded-lg ">
                <i class="fa-solid fa-user text-main-red"></i>
                 <span class="ml-3">Candidat</span>
              </a>
           </li>

           <li>
              <a href="#" class="flex items-center p-2  rounded-lg ">
                <i class="fa-solid fa-graduation-cap text-main-red"></i>
                <span class="flex-1 ml-3 whitespace-nowrap">Apprenant</span>
              </a>
           </li>
           <li>
              <a href="#" class="flex items-center p-2  rounded-lg ">
                <i class="fa-solid fa-industry text-main-red"></i>
                <span class="flex-1 ml-3 whitespace-nowrap">Entreprise</span>
              </a>
           </li>
           <li>
              <a href="#" class="flex items-center p-2  rounded-lg ">
              <i class="fa-solid fa-user-group text-main-red"></i>
                 <span class="flex-1 ml-3 whitespace-nowrap">Utilisateurs</span>
              </a>
           </li>
           <li>
              <a href="#" class="flex items-center p-2  rounded-lg ">
                <i class="fa-solid fa-file-pen text-main-red    "></i>
                 <span class="flex-1 ml-3 whitespace-nowrap">Projets</span>
              </a>
           </li>
           <li>
                <button type="button" class="flex items-center w-full p-2  transition duration-75 rounded-lg group " aria-controls="dropdown-contact" data-collapse-toggle="dropdown-contact">
                      <i class="fa-solid fa-graduation-cap text-main-red"></i>
                      <span class="flex-1 ml-3 text-left whitespace-nowrap" sidebar-toggle-item>Contact</span>
                      <svg sidebar-toggle-item class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                </button>
                <ul id="dropdown-contact" class="hidden py-2 space-y-2">
                    <li>
                       <a href="#" class="flex items-center w-full p-2  transition duration-75 rounded-lg pl-11 group " aria-controls="dropdown-dev" data-collapse-toggle="dropdown-dev" >Promotions
                       <svg sidebar-toggle-item class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                       </a>
                    </li>
                    <ul id="dropdown-dev" class="hidden py-2 space-y-2">
                        <!-- <?php foreach ($promotions as $promotion) { ?> -->
                        <li class="flex items-center">
                            <input type="checkbox" name="$promotion['nom'];">
                            <a href="#" class="flex items-center w-full p-2 transition duration-75 rounded-lg pl-11 group ">$promotion['nom']</a>
                        </li>
                        <!-- <?php } ?> -->
                        
                        <li class="flex items-center">
                            <input type="checkbox" name="<?php ?>;">
                           <a href="#" class="flex items-center w-full p-2  transition duration-75 rounded-lg pl-11 group ">Référent Digital</a>
                        </li>
                        <li class="flex items-center">
                            <input type="checkbox" name="<?php ?>;">
                           <a href="#" class="flex items-center w-full p-2  transition duration-75 rounded-lg pl-11 group ">TSSR</a>
                        </li>
                        <li class="flex items-center">
                            <input type="checkbox" name="<?php ?>;">
                           <a href="#" class="flex items-center w-full p-2  transition duration-75 rounded-lg pl-11 group ">CDA</a>
                        </li>
                    </ul>
                    <li class="flex items-center">
                        <input type="checkbox" name="allEntreprise">
                       <a href="#" class="flex items-center w-full p-2  transition duration-75 rounded-lg pl-11 group ">Entreprise</a>
                    </li>

                </ul>
                <button onclick="openModal()" id="contactValidation" class="hidden bg-main-red text-center block text-white mx-auto w-auto mt-4 p-2 px-4">Envoyer<button>

           </li>
        </ul>
         </div>
      </aside>
      
  </section>
