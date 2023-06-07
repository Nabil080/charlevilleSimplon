<?php $title = "Ajout de projet"; ?>

<?php ob_start(); ?>
<main class="pb-10 px-[5%] xl:px-[15%]">
    <h2 class="pb-5 font-title text-main-red text-center font-bold uppercase text-[24px] md:text-[48px]">Ajout de projet
    </h2>
    <div class="md:flex justify-evenly items-center gap-10">
        <div class="w-1/2 hidden md:block">
            <img src="assets/img/autres/project.png" alt="image de décoration" class="img-fluid" />
        </div>
        <div class="md:w-1/2">
            <form id="projectForm" enctype="multipart/form-data" class="flex flex-col items-center gap-6" target="_blank">
                <?php if(isset($project)){?>
                    <input type="hidden" name="project_id" value="<?=$project->id?>">
                <?php } ?>
                <?php if(isset($user->user_company)){?>
                    <h3 class="font-title text-main-red font-bold text-[20px] md:text-[24px]"><?=$user->user_company?></h3>
                    <input type="hidden" name="company" value="<?=$user->user_company?>" /> <!-- Variable à mettre -->
                    <input type="hidden" name="adress" value="<?=$user->user_adress?>" /> <!-- Variable à mettre -->
                <?php } ?>
                <div class="w-full md:w-2/3">
                    <label for="project" class="block mb-2 text-[16px] font-medium">Nom du projet</label>
                    <input type="text" id="project" name="project" placeholder="Votre nom de projet" <?php if(isset($project)){echo "value='$project->name'";}?>
                        class="bg-main-white border border-main-red text-[18px] rounded-[5px] block w-full p-2.5">
                </div>
                <div class="w-full md:w-2/3">
                    <label for="pdf" class="block mb-2 text-[14px] font-medium">Cahier des charges</label>
                    <input type="file" id="pdf" name="pdf"
                        placeholder="Envoie de cahier des charges"
                        class="file:bg-main-red border border-main-red text-[18px] rounded-[5px] block w-full">
                    <p class="mt-1 text-sm text-gray-500" id="specifications">Fichier en PDF</p>

                </div>
                <div class="w-full md:w-2/3">
                    <label for="description" class="block mb-2 text-[14px] font-medium">Description</label>
                    <textarea rows="4" id="description" name="description"
                        placeholder="Vos demandes, une description, choses à savoir..."
                        class="bg-main-white border border-main-red text-[18px] rounded-[5px] block w-full p-2.5"><?php if(isset($project)){echo "$project->description";}?></textarea>
                </div>
                <div class="w-full md:w-2/3">
                    <label for="image" class="block mb-2 text-[14px] font-medium">Image/Logo d'entreprise</label>
                    <input type="file" id="image" name="image" placeholder="Votre image/logo d'entreprise"
                        class="bg-main-white border border-main-red text-[18px] rounded-[5px] block w-full">
                </div>
                <div class="w-full md:w-2/3">
                    <label for="link" class="block mb-2 text-[14px] font-medium">Lien vers votre
                        entreprise</label>
                    <input type="url" id="link" name="link" placeholder="Votre lien" <?php if(isset($project)){echo "value='$project->company_link'";}?>
                        class="bg-main-white border border-main-red text-[18px] rounded-[5px] block w-full p-2.5">
                </div>
                <div class="">
                    <button type=" submit"
                        class="px-10 py-3 text-main-white font-bold text-lg uppercase bg-main-red rounded-[5px]">
                        <?php if(isset($project)){echo "Modifier le projet";}else{echo "Déposer un projet";} ?>
                    </button>
                </div>
            </form>
        </div>
    </div>
</main>

<script>
    const form = document.querySelector('#projectForm');
    form.addEventListener('submit', (event) => {
        event.preventDefault();

        const formData = new FormData(form);

        fetch('?action=<?=isset($project) ? "update" : "add"?>ProjectTraitement',{
            method: 'POST',
            body: formData
        })
        .then((response) => response.json())
        .then((data) => {
            console.log(data);
        })
    })
</script>
<?php
$content = ob_get_clean();
require 'view/layout.php';