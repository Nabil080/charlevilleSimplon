function swapDivsById(id1, id2) {
    document.getElementById(id1).classList.toggle('hidden')
    document.getElementById(id2).classList.toggle('hidden')
}

function changeTab(y) {
    const sectionChange = document.getElementsByClassName('sectionChange');
    const tabChange = document.getElementsByClassName('tabChange');

    for (i = 0; i < sectionChange.length; i++) {
        sectionChange[i].classList.add("hidden");
        tabChange[i].classList.remove("!bg-main-red", "bg-main-red");
        tabChange[i].classList.add("bg-main-gray");

    }
    sectionChange[y].classList.remove("hidden");
    tabChange[y].classList.add("!bg-main-red", "bg-main-red");
}

function switchDiv(id1, id2) {
    const div1 = document.getElementById(id1);
    const div2 = document.getElementById(id2);
    if (div1.style.display === "none") {
        div1.style.display = "block";
        div2.style.display = "none";
    } else {
        div1.style.display = "none";
        div2.style.display = "block";
    }
}

function rotateDropdownIcons() {
    const buttons = document.querySelectorAll("button");
    clickableButtons = [];
    let count = 0;
    buttons.forEach(button => {
        if (button.dataset.dropdownToggle !== null) {
            let fleche = button.getElementsByTagName('svg');
            if (fleche[0] !== undefined) {
                clickableButtons.push(buttons[count]);
            }
            count++;
        }
    })
    clickableButtons.forEach(button => {
        button.addEventListener('click', () => {
            fleche = button.getElementsByTagName('svg');
            fleche[0].classList.toggle('rotate-180');

        });
    });
};

function updateContact() {

    const tableRows = document.querySelectorAll("table tbody tr");
    const contactInput = document.querySelector("#emailContact");

    tableRows.forEach((row) => {
        const contactButton = row.querySelector(
            "table tbody tr button[data-modal-target=modal-contact]"
        );
        contactButton.addEventListener("click", (e) => {
            contactInput.value = e.target.dataset.userMail;
        });
    });

    const navbarContact = document.querySelector("#dropdown-contact")
    const navbarContactButton = document.querySelector("#contactValidation")
    const checkboxes = navbarContact.querySelectorAll("input[type=checkbox]")

    navbarContactButton.addEventListener('click', (event) => {
        let mailList = []

        checkboxes.forEach(checkbox => {
            if (checkbox.checked) {
                mailList.push(checkbox.name)
            }
        });
        contactInput.value = mailList.join(',');
    })
};
