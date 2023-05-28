const tableRows = document.querySelectorAll("table tbody tr");
const contactInput = document.querySelector("#emailContact");

tableRows.forEach((row) => {
  const contactButton = row.querySelector(
    "table tbody tr button[data-modal-target=modal-contact]"
  );
  contactButton.addEventListener("click", (e) => {
    console.log(e.target.dataset);
    contactInput.value = e.target.dataset.userMail;
  });
});
