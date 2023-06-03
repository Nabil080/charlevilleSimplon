// Ajouter un listener sur le selecteur de choix dans l'ajout de projet phare
const websiteHighlight = document.getElementById('website_input');
const pdfHighlight = document.getElementById('pdf_input');
const imageHighlight = document.getElementById('image_input');
const selectHighlight = document.getElementById('file_type');

selectHighlight.addEventListener('change', () => {
    const options = selectHighlight.getElementsByTagName('option');
    pdfHighlight.classList.add("hidden");
    imageHighlight.classList.add("hidden");
    websiteHighlight.classList.add("hidden");
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

modifHighlightButton.addEventListener('click', () => {
    modifyInput.value = 'modify';
});

// Suppression de projet perso

const deleteMyProject = document.getElementById('delete-my-project');
const forms = deleteMyProject.getElementsByTagName('form');
let formData =null;

for (i = 0; i < forms.length; i++) {
    forms[i].addEventListener('submit', (event) => {
        event.preventDefault();
        formData = new FormData(forms[i]);
        fetch('index.php?action=deleteMyProject', {
            method: 'POST',
            body: formData
        })
            .then(response => response.json())
            .then(data => {
                //console.log(data);
                deleteAlert();
                showAlert(data);
            })
            .catch(error => console.error(error));
    });
}

