function validationAjax(){

const validationForms = document.querySelectorAll('form.validationForm');
// console.log(validationForms);

validationForms.forEach((form) => {
    form.addEventListener('submit', (e) => {
        e.preventDefault();

        const checkboxes = document.querySelectorAll('.validationForm input[type=checkbox]');
        
        const promo = e.target.dataset.promo;
        const accepted = [];
        const rejected = [];
    
        checkboxes.forEach((checkbox) => {
            if (checkbox.checked) {
                accepted.push(checkbox.value);
            } else {
                rejected.push(checkbox.value);
            }
        });
    
        let data = {
            promo: promo,
            accepted: accepted,
            rejected: rejected
        };

        fetch('?action=validatePromotion',{
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(data)
        })
        .then((response) => response.json())
        .then((data) => console.log(data))

        // FETCH METHOD POST

        // ENVOYER EN DATA : {Promo: 1, ACCEPTED: [1 , 2], REJECTED: [3, 4, 5]}
        // JSON.stringify(data);

    })
});
}