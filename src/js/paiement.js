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

const cardNumber_input = document.querySelector('.card_number > input');

cardNumber_input.addEventListener('input', (e) => {
    let value = e.target.value.replace(/\D/g, '');
    value = value.slice(0, 16);
    value = value.match(/.{1,4}/g)?.join(' ') || value;
    e.target.value = value;
});


const expirationDateInput = document.querySelector('.card_date > input');
const errorMessage = document.querySelector('.error_message');

expirationDateInput.addEventListener('input', (e) => {
    let value = e.target.value.replace(/\D/g, '');
    if (value.length > 2) {
        value = value.slice(0, 2) + '/' + value.slice(2, 4);
    }
    e.target.value = value.slice(0, 5);
});

expirationDateInput.addEventListener('blur', () => {
    const [month, year] = expirationDateInput.value.split('/').map(Number);

    const currentDate = new Date();
    const currentMonth = currentDate.getMonth() + 1;
    const currentYear = currentDate.getFullYear() % 100;

    if (
        !month || !year || 
        month < 1 || month > 12 || 
        year < currentYear || 
        (year === currentYear && month < currentMonth) 
    ) {
        errorMessage.style.display = 'inline'; 
    } else {
        errorMessage.style.display = 'none';
    }
});

