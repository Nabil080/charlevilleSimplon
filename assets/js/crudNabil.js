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

let mailList = []

navbarContactButton.addEventListener('click', (event) => {
  checkboxes.forEach(checkbox => {
    if(checkbox.checked){
      // (console.log(checkbox))
      mailList.push(checkbox.name)
    }
  });
  contactInput.value = mailList.join(',');
  console.log(mailList);
})