const loginForm = document.querySelector('#login-form');
loginForm.addEventListener('submit', function (event) {
    event.preventDefault(); // prevent default form submission behavior

    // handle form submission with fetch
    const formData = new FormData(loginForm);
    fetch('index.php?action=loginTreatment', {
        method: 'POST',
        body: formData
    })
        .then(response => response.json())
        .then(data => {
            console.log(data[0].role_id);
            if (data[0].role_id) {
                const role_id = data[0].role_id;
                switch (role_id) {
                    case '1':
                        document.location.href = 'index.php?action=crudCandidatePage';
                        break;
                    case '2':
                        document.location.href = 'index.php';
                        break;
                    case '3':
                        document.location.href = 'index.php';
                        break;
                    case '4':
                        document.location.href = 'index.php';
                        break;
                    case '5':
                        document.location.href = 'index.php';
                        break;
                }
            }
            deleteAlert();
            showAlert(data);
        })
        .catch(error => console.error(error));
});

const forgetForm = document.querySelector('#forget-form');
forgetForm.addEventListener('submit', function (event) {
    event.preventDefault(); // prevent default form submission behavior

    // handle form submission with fetch
    const formData = new FormData(forgetForm);
    fetch('index.php?action=sendMailResetPasswordTreatment', {
        method: 'POST',
        body: formData
    })
        .then(response => response.json())
        .then(data => {
            deleteAlert();
            showAlert(data);
        })
        .catch(error => console.error(error));
});