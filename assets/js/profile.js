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

const modifHighlightButton = document.getElementById('modif-modal-button');
const modifyInput = document.getElementById('modifyInput');

modifHighlightButton.addEventListener('click', () => {
    modifyInput.value = 'modify';
})

