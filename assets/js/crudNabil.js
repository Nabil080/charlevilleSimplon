function updateContact() {
  const tableRows = document.querySelectorAll("table tbody tr");
  const contactInput = document.querySelector("#emailContact");

  tableRows.forEach((row) => {
    const contactButton = row.querySelector(
      "table tbody tr button[data-modal-target=modal-contact]"
    );
    contactButton.addEventListener("click", (e) => {
      mailToInput = e.target.dataset.userMail;
      contactInput.value = mailToInput;
    });
  });

  const navbarContact = document.querySelector("#dropdown-contact");
  const navbarContactButton = document.querySelector("#contactValidation");
  const checkboxes = navbarContact.querySelectorAll("input[type=checkbox]");

  navbarContactButton.addEventListener("click", (event) => {
    let mailList = [];

    checkboxes.forEach((checkbox) => {
      if (checkbox.checked) {
        // (console.log(checkbox))
        mailList.push(checkbox.name);
      }
    });
    contactInput.value = mailList.join(",");
    console.log(mailList);
  });
}

updateContact();

function updateModifPromo(){
  const tableRows = document.querySelectorAll("table tbody tr")
  const updateModal = document.querySelector("#modal-update")
  const promotionInput = document.querySelector("#promotion-input")
  const formationInput = document.querySelector("#formation-input")
  const startInput = document.querySelector("#start-input")
  const endInput = document.querySelector("#end-input")

  console.log(tableRows);

  tableRows.forEach(row => {
    const updateButton = row.querySelector("[data-modal-target=modal-update]")
    updateButton.addEventListener("click", (e) => {
      console.log(updateButton.dataset)
      promotionInput.value = updateButton.dataset.promoId
      formationInput.value = updateButton.dataset.formationId
      startInput.value = updateButton.dataset.startDate
      endInput.value = updateButton.dataset.endDate
    })
  })
}

updateModifPromo();
