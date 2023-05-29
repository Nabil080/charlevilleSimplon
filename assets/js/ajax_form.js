const registerForm = document.querySelector('#register-form');
const loginForm = document.querySelector('#login-form');

function deleteAlert() {
    let errorMessages = document.getElementsByClassName('errorAlert');
    for (let i = 0; i < errorMessages.length; i++) {
        errorMessages[i].innerHTML = '';
    }
    let succesMessages = document.getElementsByClassName('successAlert');
    for (let i = 0; i < succesMessages.length; i++) {
        succesMessages[i].innerHTML = '';
    }
    let contentAlert = document.getElementsByClassName('contentAlert');
    for (let i = 0; i < contentAlert.length; i++) {
        contentAlert[i].innerHTML = '';
        contentAlert[i].classList.add('hidden');
    }
}
function showAlert(data) {

    data.forEach(function (element) {
        console.log(element['location']);
        const input = document.getElementById(element['location']);
        input.innerHTML = element['message'];
        if (element['location'].endsWith('Content_error')) input.classList.remove('hidden');
    })
}

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
                        document.location.href = 'index.php';
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