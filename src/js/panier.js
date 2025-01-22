const buttonsDelete = document.querySelectorAll('.delete');
buttonsDelete.forEach(buttonDelete => {
    buttonDelete.addEventListener('click', function() {    
        fetch('../src/php/panier_Functions.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: JSON.stringify({
                function: 'deleteProduct',
                dataID: buttonDelete.getAttribute('data-id')
            }),
        })
        .then(response => response.text())
        .then(data => {
            console.log(data);
            location.reload();
        })
        .catch(error => {
            console.error('Error:', error);
        });
    });
});

const buttonsAdd = document.querySelectorAll('.plus');
buttonsAdd.forEach(buttonAdd => {
    buttonAdd.addEventListener('click', function() {
        fetch('../src/php/panier_Functions.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: JSON.stringify({
                function: 'updateProduct',
                dataID: buttonAdd.getAttribute('data-id'),
                quantity: 1
            }),
        })
        .then(response => response.text())
        .then(data => {
            console.log(data);
            location.reload();
        })
        .catch(error => {
            console.error('Error:', error);
        });
    });
});

const buttonsSub = document.querySelectorAll('.minus');
buttonsSub.forEach(buttonSub => {
    buttonSub.addEventListener('click', function() {
        fetch('../src/php/panier_Functions.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: JSON.stringify({
                function: 'updateProduct',
                dataID: buttonSub.getAttribute('data-id'),
                quantity: -1
            }),
        })
        .then(response => response.text())
        .then(data => {
            console.log(data);
            location.reload();
        })
        .catch(error => {
            console.error('Error:', error);
        });
    });
});