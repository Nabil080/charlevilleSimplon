// Ajouter un listener sur le selecteur de choix dans l'ajout de projet phare
const websiteHighlight = document.getElementById('website_input');
const pdfHighlight = document.getElementById('pdf_input');
const imageHighlight = document.getElementById('image_input');
const selectHighlight = document.getElementById('file_type');
const updateButton = document.getElementById('highlight-button');

selectHighlight.addEventListener('change', () => {
    const options = selectHighlight.getElementsByTagName('option');
    pdfHighlight.classList.add("hidden");
    imageHighlight.classList.add("hidden");
    websiteHighlight.classList.add("hidden");
    updateButton.classList.remove('disabled-button')
    for (i = 0; i < options.length; i++) {
        if (options[i].selected) {
            if (options[i].value === 'pdf') {
                pdfHighlight.classList.remove("hidden");
            }
            if (options[i].value === 'image') {
                imageHighlight.classList.remove("hidden");
            }
            if (options[i].value === 'website') {
                websiteHighlight.classList.remove("hidden");
            }
        }
    }
})

// Mofifier la modal d'ajout de projet phare en add ou en modify
const modifHighlightButton = document.getElementById('modif-modal-button');
const modifyInput = document.getElementById('modifyInput');

if(modifHighlightButton !== null){
    modifHighlightButton.addEventListener('click', () => {
        modifyInput.value = 'modify';
    });
}

// Suppression de projet perso
const deleteMyProject = document.getElementById('delete-my-project');
const forms = deleteMyProject.querySelectorAll('.delete-form');
const fromDelete = deleteMyProject.getElementsByClassName('delete-form');

let formData =null;
// ajoute un listener sur la modale de suppression de projet
forms.forEach(form => {
        form.addEventListener('submit', (event) => {
        event.preventDefault();
        formData = new FormData(form);
        fetch('index.php?action=deleteMyProject', {
            method: 'POST',
            body: formData
        })
            .then(response => response.json())
            // retirer l'élement du DOM
            .then(data => {
                let elementToDelete = document.getElementById("project-card" + data.project_id);
                elementToDelete.classList.add("opacity-80");
                function fadeOut() {
                    elementToDelete.classList.add("opacity-40", "grayscale");
                };
                function deleteProject() {
                    elementToDelete.classList.add("!hidden",);
                }
                setTimeout(fadeOut, 400);
                setTimeout(deleteProject, 100);
                // deleteAlert();
                // showAlert(data);
            })
            .catch(error => console.error(error));
    });
})