function handleFormSubmission(formId, actionUrl) {
    console.log('ok');
    const form = document.querySelector(formId);
    form.addEventListener('submit', function (event) {
        event.preventDefault(); // prevent default form submission behavior

        // handle form submission with fetch
        const formData = new FormData(form);
        fetch(actionUrl, {
            method: 'POST',
            body: formData
        })
            .then(response => response.json())
            .then(data => {
                console.log(data);
                if (typeof data != Array) data = Array.from(data);
                deleteAlert();
                showAlert(data);
            })
            .catch(error => console.error(error));
    });
}

function deleteAlert() {
    let errorMessages = document.getElementsByClassName('errorAlert');
    for (let i = 0; i < errorMessages.length; i++) {
        errorMessages[i].innerHTML = '';
    }
    let succesMessages = document.getElementsByClassName('alertMessage');
    for (let i = 0; i < succesMessages.length; i++) {
        succesMessages[i].remove();
    }
}
function showAlert(data) {
    data.forEach(function (element) {
        console.log(element['location']);
        if (element['navbar'] == false) {
            const input = document.querySelector(element['location']);
            console.log(input);
            if (element['location'] == '.alertButton' || element['where'] == 'button') {
                input.insertAdjacentHTML('beforebegin', element['message']);
            } else {
                input.innerHTML = element['message'];
            }
        } else {
            window.location.href = 'index.php';
        }
    })
}

