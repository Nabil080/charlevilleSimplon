
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