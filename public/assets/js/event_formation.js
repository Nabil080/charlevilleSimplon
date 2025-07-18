// Job
const jobFee = document.querySelector('#select_job');
jobFee.addEventListener('click', function creatInput(event) {
    event.preventDefault();
    if (event.target.localName == 'option') {
        const job = {
            job_id: event.target.value,
            job_name: event.target.innerText
        };

        const badge = document.querySelector("#badge-job_" + job.job_id);
        if (badge == null) {
            addBadge("job", job);
        }
    }
});

const radioJob = document.querySelectorAll('.radio-job');
radioJob.forEach(function (radioButton) {
    radioButton.addEventListener('change', function () {
        const searchContent = document.querySelector('#select_job');
        const addContent = document.querySelector('#add_job');
        const jobBtn = document.querySelectorAll('#job-btn');
        if (radioButton.value == 'job-search') {
            searchContent.classList.remove('hidden');
            addContent.classList.add('hidden');
            jobBtn[0].innerHTML = 'Modifier';
        } else if (radioButton.value == "job-add") {
            searchContent.classList.add('hidden');
            addContent.classList.remove('hidden');
            jobBtn[0].innerHTML = 'Ajouter'
        };
    });
});

// Activity
const selectactivity = document.querySelector('#select_activity');
selectactivity.addEventListener('click', function creatInput(event) {
    event.preventDefault();
    if (event.target.localName == 'option') {
        const activity = {
            activity_id: event.target.value,
            activity_name: event.target.innerText
        };

        const badge = document.querySelector("#badge-activity_" + activity.activity_id);
        if (badge == null) {
            addBadge("activity", activity);
        }
    }
});
//Admission
// Activity
const selectRequirement = document.querySelector('#select_admission');
selectRequirement.addEventListener('click', function creatInput(event) {
    event.preventDefault();
    if (event.target.localName == 'option') {
        const admission = {
            admission_id: event.target.value,
            admission_name: event.target.innerText
        };

        const badge = document.querySelector("#badge-admission_" + admission.admission_id);
        if (badge == null) {
            addBadge("admission", admission);
        }
    }
});
// Fee 
// Financement
const selectFee = document.querySelector('#select_fee');
selectFee.addEventListener('click', function creatInput(event) {
    event.preventDefault();
    if (event.target.localName == 'option') {
        const fee = {
            fee_id: event.target.value,
            fee_name: event.target.innerText
        };

        const badge = document.querySelector("#badge-fee_" + fee.fee_id);
        if (badge == null) {
            addBadge("fee", fee);
        }
    }
});


// Certification
const certificationFee = document.querySelector('#select_certification');
certificationFee.addEventListener('click', function creatInput(event) {
    event.preventDefault();
    if (event.target.localName == 'option') {
        const certification = {
            certification_id: event.target.value,
            certification_name: event.target.innerText
        };

        const badge = document.querySelector("#badge-certification_" + certification.certification_id);
        if (badge == null) {
            addBadge("certification", certification);
        }
    }
});


function addBadge(type, badge) {
    var span = document.createElement("span");
    span.id = "badge-" + type + "_" + badge[type + '_id'];
    span.className = "inline-flex items-center px-2 py-1 mr-2 text-sm font-medium text-blue-800 bg-blue-100 rounded dark:bg-blue-900 dark:text-blue-300";

    var text = document.createTextNode(badge[type + '_name']);
    span.appendChild(text);

    var input = document.createElement("input");
    input.type = "hidden";
    input.name = type + "[]";
    input.value = badge[type + '_id'];
    span.appendChild(input);

    var button = document.createElement("button");
    button.type = "button";
    button.onclick = function () {
        deletBadge(type, badge[type + '_id']);
    };
    button.className = "inline-flex items-center p-0.5 ml-2 text-sm text-blue-400 bg-transparent rounded-sm hover:bg-blue-200 hover:text-blue-900 dark:hover:bg-blue-800 dark:hover:text-blue-300";

    var svg = document.createElementNS("http://www.w3.org/2000/svg", "svg");
    svg.setAttribute("aria-hidden", "true");
    svg.setAttribute("class", "w-3.5 h-3.5");
    svg.setAttribute("fill", "currentColor");
    svg.setAttribute("viewBox", "0 0 20 20");

    var path = document.createElementNS("http://www.w3.org/2000/svg", "path");
    path.setAttribute("fill-rule", "evenodd");
    path.setAttribute("d", "M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z");
    svg.appendChild(path);

    button.appendChild(svg);

    var buttonText = document.createElement("span");
    buttonText.className = "sr-only";
    var buttonTextContent = document.createTextNode("Remove badge");
    buttonText.appendChild(buttonTextContent);
    button.appendChild(buttonText);

    span.appendChild(button);

    var container = document.getElementById(type + "_selectContent");
    container.appendChild(span);
}

function deletBadge(type, id) {
    id = 'badge-' + type + '_' + id;
    const badge = document.querySelector('#' + id);
    badge.remove();
}
