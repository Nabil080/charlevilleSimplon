const registerForm = document.querySelector('#register-form');
registerForm.addEventListener('submit', function (event) {
    event.preventDefault(); // prevent default form submission behavior

    // handle form submission with fetch
    const formData = new FormData(registerForm);
    fetch('index.php?action=registerTreatment', {
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