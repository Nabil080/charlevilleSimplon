<!-- Modal de connexion -->
<section id="company-login-modal" data-modal-placement="center" tabindex="-1" aria-hidden="true"
    class="backdrop:brightness-50 fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] md:h-full">
    <div class="relative w-full h-fit max-w-md md:h-auto">
        <div class="relative bg-main-white border-main-red border-2 rounded-md text-main-red">
            <button type="button"
                class="absolute top-3 right-2.5 text-main-red bg-transparent rounded-md text-sm p-1.5 ml-auto inline-flex items-center border border-transparent hover:border-main-red"
                data-modal-hide="company-login-modal">
                <svg data-modal-hide="company-login-modal" aria-hidden="true" class="w-5 h-5 text-main-light"
                    fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                        clip-rule="evenodd"></path>
                </svg>
                <span class="sr-only">Close modal</span>
            </button>
            <!-- Partie CONNEXION -->
            <div id="co" class="px-6 py-6 lg:px-8">
                <h3 class="mb-4 text-xl uppercase w-fit mx-auto font-bold font-title text-main-red">Connexion</h3>
                <form class="space-y-6" id="login-form" method="post">
                    <div>
                        <label for="email_login" class="block mb-2 text-sm font-medium  text-main-red">E-mail</label>
                        <input type="email" name="email_login" id="email_login"
                            class=" border text-sm rounded-md block w-full p-2.5 border-main-red text-main-red"
                            placeholder="Exemple@mail.com">
                        <p id="email_login_error" class="errorAlert mt-2 text-sm text-red-600 dark:text-red-500"></p>
                    </div>
                    <div>
                        <label for="password_login" class="block mb-2 text-sm font-medium  text-main-red">Mot de
                            passe</label>
                        <input type="password" name="password_login" id="password_login" placeholder="*********"
                            class=" border text-sm rounded-md block w-full p-2.5 border-main-red text-main-red">
                        <p id="password_login_error" class="errorAlert mt-2 text-sm text-red-600 dark:text-red-500"></p>
                    </div>
                    <button type="submit"
                        class="login_alertMessage w-full uppercase font-title text-main-white bg-main-red hover:bg-red-800 font-medium rounded-md text-sm px-5 py-2.5 text-center">Se
                        connecter</button>
                    <div>
                        <div class="text-sm font-bold text-main-gray">
                            Mot de passe oublié ? <a onclick="switchDiv('co','paco')"
                                class="hover:underline text-main-red cursor-pointer">Réinitialiser</a>
                        </div>
                        <div class="text-sm font-bold text-main-gray">
                            Pas de compte ? <a href="?action=registerPage&company="
                                class="hover:underline text-main-red cursor-pointer">S'inscrire en tant qu'entreprise</a>
                        </div>
                    </div>
                </form>
            </div>
            <!-- Partie MDP OUBLIÉ -->
            <div id="paco" class="hidden px-6 py-6 lg:px-8">
                <h3 class="mb-4 text-xl uppercase w-fit mx-auto font-bold font-title text-main-red">Mot de passe oublié
                </h3>
                <form class="space-y-6" id="forget-form" method="post">
                    <div id="forget_succesContent" class="alertContent">
                    </div>
                    <div>
                        <label for="email_forget" class="block mb-2 text-sm font-medium  text-main-red">Votre adresse
                            mail</label>
                        <input type="email" name="email_forget" id="email_forget"
                            class=" border text-sm rounded-md block w-full p-2.5 border-main-red text-main-red"
                            placeholder="Exemple@mail.com" required>
                    </div>
                    <button type="submit"
                        class="forget_alertMessage w-full font-title text-main-white bg-main-red hover:bg-red-800 font-medium rounded-md text-sm px-5 py-2.5 text-center ">Réinitialiser
                        le mot de passe</button>
                    <div class="text-sm font-bold text-main-gray">
                        Vous avez votre mot de passe ? <a onclick="switchDiv('co','paco')"
                            class="hover:underline text-main-red cursor-pointer">Se connecter</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>