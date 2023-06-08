<?php $title = "Contact"; ?>

<?php ob_start(); ?>

<main>
    <section>
        <!--Téléphone + Adresse -->
        <h2 class="text-center text-[24px] md:text-4xl font-bold font-title text-main-red uppercase pb-2 lg:my-8">Nous
            Contacter
        </h2>
        <div class="grid md:grid-cols-2 sm:gap-8 justify-center md:items-baseline w-2/3 mx-auto mt-8 lg:mt-16">
            <div class="flex flex-wrap justify-center w-auto mb-8">
                <i
                    class="fa-solid fa-phone-volume text-[24px] xl:text-[36px] text-center w-full mt-2 text-main-red"></i>
                <p
                    class="font-bold mb-4 text-[24px] xl:text-[36px] whitespace-nowrap  w-full sm:whitespace-normal text-center">
                    Nous appeler :</p>
                <p class="col-start-1 col-end-3 xl:text-[20px] text-center">06.55.58.36.98</p>
            </div>
            <div class="flex flex-wrap justify-center  mb-8">
                <i
                    class="fa-solid fa-location-dot text-[24px] xl:text-[36px] w-full text-center mt-2 text-main-red"></i>
                <p class="font-bold mb-4 text-[24px] xl:text-[36px] w-full text-center">Nous rendre visite :</p>
                <p class="col-start-1 col-end-3 xl:text-[20px] text-center">Campus Sup Ardennes, 8 rue Claude Chrétien,
                    <br> 08000 Charleville-Mézières
                </p>
            </div>
        </div>
    </section>
    <section>
        <iframe class="w-11/12 mx-auto lg:h-[300px] xl:h-[400px]"
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1216.88710206817!2d4.722451118316222!3d49.739151769884515!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47ea0d52508ce1b1%3A0x728f7af63c73d095!2sMaison%20du%20campus!5e0!3m2!1sfr!2sfr!4v1683797825936!5m2!1sfr!2sfr"
            style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </section>
    <section>

        <!-- Section: Design Block -->
        <section
            class="mb-32 mt-8 bg-main-lightgray py-4 w-11/12 mx-auto rounded-[5px] border-2 border-main-red text-center">
            <div class="max-w-[700px] mx-auto px-3 lg:px-6">
                <h2 class="text-3xl font-bold mb-12">Nous contacter</h2>
                <form id="contact-form">
                    <div class="form-group mb-6">
                        <input type="text" class="form-control block
                  w-full
                  px-3
                  py-1.5
                  text-base
                  font-normal
                  bg-white bg-clip-padding
                  border border-solid border-gray-300
                  rounded
                  transition
                  ease-in-out
                  m-0
                  focus:bg-white focus:border-main-green focus:outline-none" id="name" name="name" placeholder="Nom">
                        <p id="name_error" class="errorAlert mt-2 text-sm text-red-600 dark:text-red-500"></p>
                    </div>
                    <div class="form-group mb-6">
                        <input type="text" class="form-control block
                  w-full
                  px-3
                  py-1.5
                  text-base
                  font-normal
                  bg-white bg-clip-padding
                  border border-solid border-gray-300
                  rounded
                  transition
                  ease-in-out
                  m-0
                  focus:bg-white focus:border-main-green focus:outline-none" id="surname" name="surname"
                            placeholder="Prénom">
                        <p id="surname_error" class="errorAlert mt-2 text-sm text-red-600 dark:text-red-500"></p>
                    </div>
                    <div class="form-group mb-6">
                        <input type="email" class="form-control block
                  w-full
                  px-3
                  py-1.5
                  text-base
                  font-normal
                  bg-white bg-clip-padding
                  border border-solid border-gray-300
                  rounded
                  transition
                  ease-in-out
                  m-0
                  focus:text-gray-700  focus:border-main-green focus:outline-none" id="email" name="email"
                            placeholder="Adresse mail">
                        <p id="email_error" class="errorAlert mt-2 text-sm text-red-600 dark:text-red-500"></p>
                    </div>
                    <div class="form-group mb-6">
                        <textarea class="
                  form-control
                  block
                  w-full
                  px-3
                  py-1.5
                  text-base
                  font-normal
                  bg-white bg-clip-padding
                  border border-solid border-gray-300
                  rounded
                  transition
                  ease-in-out
                  m-0
                  focus:text-gray-700 focus:border-main-green focus:outline-none
                " id="message" name="message" rows="3" placeholder="Message"></textarea>
                        <p id="message_error" class="errorAlert mt-2 text-sm text-red-600 dark:text-red-500"></p>
                    </div>

                    <button type="submit" class="
                alertButton
                w-1/2
                px-6
                py-2.5
                bg-main-red
                text-white
                font-medium
                text-xs
                leading-tight
                uppercase
                rounded
                shadow-md
                border
                border-transparent
                hover:bg-main-white hover:text-main-red hover:shadow-lg hover:border-main-red
                focus:bg-main-white focus:text-main-red focus:shadow-lg focus:border-main-red focus:outline-none focus:ring-0
                active:bg-main-white active:text-main-red active:border-main-red active:shadow-lg
                transition
                duration-150
                ease-in-out">Send</button>
                </form>
            </div>
        </section>
        <!-- Section: Design Block -->

    </section>
</main>


<?php $content = ob_get_clean(); ?>

<?php ob_start(); ?>
<?php $link = ob_get_clean(); ?>

<?php ob_start(); ?>
<script>
handleFormSubmission('#contact-form', 'index.php?action=contactTreatment');
</script>
<?php $script = ob_get_clean(); ?>

<?php require 'view/layout.php'; ?>