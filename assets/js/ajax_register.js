const loginForm = document.querySelector("#login-form");

loginForm.addEventListener("submit", function (event) {
  event.preventDefault(); // prevent default form submission behavior

  // handle form submission with fetch
  const formData = new FormData(loginForm);
  fetch("index.php?action=loginTreatment", {
    method: "POST",
    body: formData,
  })
    .then((response) => response.json())
    .then((data) => {
      console.log(data);

      data.forEach(function (element) {
        // Tout effacer les erreurs déjà afficher.
        let alertMessages = document.getElementsByClassName("success");
        for (let i = 0; i < alertMessages.length; i++) {
          alertMessages[i].remove();
        }

        alertMessages = document.getElementsByClassName("error");
        for (let i = 0; i < alertMessages.length; i++) {
          alertMessages[i].remove();
        }

        let id = element["successMessage"]
          ? "content_success"
          : element["location"];
        console.log(id);

        const input = document.getElementById(id);
        input.insertAdjacentHTML("afterend", element["message"]);
      });
    })
    .catch((error) => console.error(error));
});
