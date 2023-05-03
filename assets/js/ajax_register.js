const loginForm = document.querySelector('#register-form');

loginForm.addEventListener('submit', function (event) {
    event.preventDefault(); // prevent default form submission behavior

    // handle form submission with fetch
    const formData = new FormData(loginForm);
    fetch('index.php?action=registerTreatment', {
        method: 'POST',
        body: formData
    })
        .then(response => response.json())
        .then(data => {
            console.log(data);
            data.forEach(function (element) {
                const errorMessage = document.getElementById(element['location'] + '_error');
                console.log(errorMessage);

                if (errorMessage != null) { errorMessage.remove() }
                const input = document.getElementById(element['location']);
                input.insertAdjacentHTML("afterend", element['message']);
            })

        })
        .catch(error => console.error(error));
});
