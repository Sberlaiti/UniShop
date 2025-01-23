function showConfirmation() {
    event.preventDefault();
    // Remplir la modale avec les données modifiées
    document.getElementById('confirmNomProduit').innerText = document.getElementById('nomProduit').value;
    document.getElementById('confirmDescription').innerText = document.getElementById('description').value;
    document.getElementById('confirmPrix').innerText = document.getElementById('prix').value;
    document.getElementById('confirmDelayLivraison').innerText = document.getElementById('delayLivraison').value;

    // Afficher la modale
    document.getElementById('confirmationModal').style.display = 'block';
}

function closeModal() {
    // Fermer la modale
    document.getElementById('confirmationModal').style.display = 'none';
}

function submitForm() {
    // Soumettre le formulaire
    document.getElementById('modifForm').submit();
}