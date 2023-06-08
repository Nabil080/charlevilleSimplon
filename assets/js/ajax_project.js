
const forms = document.querySelectorAll('form');

forms.forEach(form  => {
    form.addEventListener('submit', (event) => {
        event.preventDefault();
        formData = new FormData(form);
        fetch('index.php?action=updateProjectElement', {
            method: 'POST',
            body: formData
        }).then(response => response.json())
        .then(data => {
            if (data.projets == true) {
                // Afficher un succès
            }
        })
    });
})