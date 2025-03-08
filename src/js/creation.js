//fonction qui permet de défiler au tout début de la page
const retourhaut = document.querySelector(".return_top");
retourhaut.addEventListener('click', function() {
    window.scrollTo({
        top: 0,
        left: 0,
        behavior: 'smooth' //défilement fluide
    });

});

function showConfirmation(event) {
    event.preventDefault();

    if (!checkPromotionPrice() || !checkPrice()) {
        return; // Ne pas afficher la modale si le prix ou le prix promotionnel n'est pas valide
    }
    // Remplir la modale avec les données modifiées
    document.getElementById('confirmNomProduit').innerText = document.getElementById('nomProduit').value;
    document.getElementById('confirmDescription').innerText = document.getElementById('message').value;
    document.getElementById('confirmPrix').innerText = document.getElementById('prix').value;
    document.getElementById('confirmDelayLivraison').innerText = document.getElementById('delayLivraison').value;

    if(document.getElementById('prixPromotion')) {
        document.getElementById('confirmPrixPromotion').innerText = document.getElementById('prixPromotion').value;
    }
    // Afficher la modale
    document.getElementById('confirmationModal').style.display = 'block';
}
document.querySelector('.envoyer').addEventListener('click', showConfirmation);

function closeModal() {
    // Fermer la modale
    document.getElementById('confirmationModal').style.display = 'none';
}
document.querySelector('.close').addEventListener('click', closeModal);

function submitForm() {
    // Soumettre le formulaire
    document.getElementById('creationForm').submit();
}
document.querySelector('.confirm_button').addEventListener('click', submitForm);

function showPromoInput() {
    document.getElementById('promo_section').style.display = 'block';
}

function checkPromotionPrice() {
    var prix = parseFloat(document.getElementById('prix').value);
    var prixPromotionElement = document.getElementById('prixPromotion');
    var promotionError = document.getElementById('promotionError');

    if (prixPromotionElement) {
        var prixPromotion = parseFloat(prixPromotionElement.value);
        if (prixPromotion >= prix || prixPromotion < 0) {
            promotionError.style.display = 'inline';
            return false; // Prix promotionnel non valide
        } else {
            promotionError.style.display = 'none';
            return true; // Prix promotionnel valide
        }
    } else {
        return true; // Pas de prix promotionnel, donc valide
    }
}

function checkPrice(){
    var prix = parseFloat(document.getElementById('prix').value);
    var priceError = document.getElementById('priceError');
    if (prix <= 0) {
        priceError.style.display = 'inline';
        return false; // Prix non valide
    } else {
        priceError.style.display = 'none';
        return true; // Prix valide
    }
}