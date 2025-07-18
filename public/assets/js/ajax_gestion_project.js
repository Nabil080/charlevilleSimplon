
const multiSelectWithoutCtrl = ( elemSelector ) => {
    let options = [].slice.call(document.querySelectorAll(elemSelector));
    options.forEach(function (element) {
        element.addEventListener("mousedown",
            function (e) {
                e.preventDefault();
                element.parentElement.focus();
                this.selected = !this.selected;
                return false;
            }, false );

    });

}

multiSelectWithoutCtrl('#multiSelect option');

const validationProjectForm = document.getElementsByClassName('validationProjectForm');
const validationTeamForm = document.getElementsByClassName('validationTeamForm');

function assignTeamToProjectTreatment(i) 
{

        validationTeamForm[i].addEventListener('submit', function (event) {
            event.preventDefault(); // prevent default form submission behavior
        // handle form submission with fetch
            const formData = new FormData(validationTeamForm[i]);
            fetch('index.php?action=assignTeamToProject', {
                method: 'POST',
                body: formData
            })
                .then(response => response.json())
                .then(data => {
                    data.forEach(function (element) {
                        // Tout effacer les erreurs déjà afficher.
                        let alertMessages = document.getElementsByClassName('success');
                        for (let i = 0; i < alertMessages.length; i++) {
                            alertMessages[i].remove();
                        }

                        alertMessages = document.getElementsByClassName('error');
                        for (let i = 0; i < alertMessages.length; i++) {
                            alertMessages[i].remove();
                        }


                        let id = (element['successMessage'] ? "content_success" : element['location']);

                        const input = document.getElementById(id);
                        input.insertAdjacentHTML("afterend", element['message']);
                    })

                })
                .catch(error => console.error(error));
        });
    }


function traitementStatusProject(i) 
{

    if (validationProjectForm.length >= 0) {
        validationProjectForm[i].addEventListener('submit', function (event) {
            event.preventDefault(); // prevent default form submission behavior
        // handle form submission with fetch
            const formData = new FormData(validationProjectForm[i]);
            fetch('index.php?action=validationProjectTreatment', {
                method: 'POST',
                body: formData
            })
                .then(response => response.json())
                .catch(error => console.error(error));
        });
    }
}


function acceptProject(i, x)
{
    if (validationProjectForm.length >= 0) {
        validationProjectForm[i].insertAdjacentHTML("beforeend", "<input type='hidden' name='validation' value='accept'>");
        traitementStatusProject(i);
        const form = document.getElementById(x);
        form.classList.add("hidden");
        const curr = "status" + x;
        const status = document.getElementById(curr);
        const icone = status.getElementsByTagName('i');
        const texte = status.getElementsByTagName('p');
        console.log(texte[0].innerHTML);

        icone[0].classList.add("text-green-500");
        icone[0].classList.remove("text-red-500");
        icone[0].classList.remove("text-orange-500");

        texte[0].textContent = "Statut du projet : Accepté";
    }
}

function refuseProject(i, x)
{
    if (validationProjectForm.length > 0) {
        traitementStatusProject(i);
        const form = document.getElementById(x);
        form.classList.add("hidden");
        const curr = "status" + x;
        const status = document.getElementById(curr);
        const icone = status.getElementsByTagName('i');
        const texte = status.getElementsByTagName('p');
        console.log(texte[0].innerHTML);

        icone[0].classList.add("text-red-500");
        icone[0].classList.remove("text-green-500");
        icone[0].classList.remove("text-orange-500");

        texte[0].textContent = "Statut du projet : Refusé";
    }
}

function assignTeamToProject(i, x)
{
    if (validationTeamForm.length > 0){
        assignTeamToProjectTreatment(i);
        
        const form = document.getElementById("team" + x);
        form.classList.add("hidden");

        const curr = "status" + x;
        const status = document.getElementById(curr);
        const icone = status.getElementsByTagName('i');
        const texte = status.getElementsByTagName('p');
        console.log(texte[0].innerHTML);

        icone[0].classList.remove("text-red-500");
        icone[0].classList.add("text-green-500");
        icone[0].classList.remove("text-orange-500");

        texte[0].textContent = "Statut du projet : En Cours";
    }
}

