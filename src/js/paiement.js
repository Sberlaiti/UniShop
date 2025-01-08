const payementMethod = document.querySelectorAll('.paymentMethod');
const cardInput = document.querySelectorAll('.cardInput');

payementMethod.forEach(function (element) {
    element.addEventListener('click', function () {
        payementMethod.forEach(function (element) {
            element.classList.remove('active');
        });
        element.classList.add('active');

        cardInput.forEach(function (input) {
            input.value = "";
        });
    });
});

cardInput.forEach(function (element) {
    element.addEventListener('click', function () {
        payementMethod.forEach(function (element) {
            element.classList.remove('active');
        });
    });
});

// On rajoute les espaces dans le numéro de carte et ne permet pas de mettre plus de 16 chiffres
const cardNumber_input = document.querySelector('.card_number > input');
cardNumber_input.addEventListener('input', (e) => {
    let value = e.target.value.replace(/\D/g, '');
    value = value.slice(0, 16);
    value = value.match(/.{1,4}/g)?.join(' ') || value;
    e.target.value = value;
});


// On change le format de la date d'expiration
const expirationDateInput = document.querySelector('.card_date > input');
const errorMessage_date = document.querySelector('.error_message_date');

expirationDateInput.addEventListener('input', (e) => {
    let value = e.target.value.replace(/\D/g, '');
    if (value.length > 2) {
        value = value.slice(0, 2) + '/' + value.slice(2, 4);
    }
    e.target.value = value.slice(0, 5);
});

// On ne permet pas de mettre plus de 3 chiffres dans le cvv et des lettres
const cvvInput = document.querySelector('.card_cvv > input');
cvvInput.addEventListener('input', (e) => {
    let value = e.target.value.replace(/\D/g, '');
    value = value.slice(0, 3);
    e.target.value = value;
});


function selectPaymentMethod(method) {
    document.getElementById('selectedPaymentMethod').value = method;
}