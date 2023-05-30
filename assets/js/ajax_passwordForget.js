const forgetPassword = document.querySelector('#forgetPasswordForm');
forgetPassword.addEventListener('submit', function (event) {
    event.preventDefault(); // prevent default form submission behavior

    // handle form submission with fetch
    const formData = new FormData(forgetPassword);
    fetch('index.php?action=resetPasswordTreatment', {
        method: 'POST',
        body: formData
    })
        .then(response => response.json())
        .then(data => {
            console.log(data);
            deleteAlert();
            showAlert(data);
        })
        .catch(error => console.error(error));
});