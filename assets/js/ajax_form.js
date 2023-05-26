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
            //console.log(data);
            deleteAlert();
            showAlert(data);
        })
        .catch(error => console.error(error));
});