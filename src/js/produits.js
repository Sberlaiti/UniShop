//fonction qui permet de revenir au tout début de la page
const retourhaut = document.querySelector("#retourHaut");
retourhaut.addEventListener('click', function() {
    window.scrollTo({
        top: 0,
        left: 0,
        behavior: 'smooth' //défilement fluide
    });

});

//modification de la classe pour l'affichage des produits
function choixClasse() {
    // Récupérer la section contenant les produits
    const section = document.querySelector("#affichage_produit");
    
    // Récupérer tous les produits dans cette section
    const produits = section.querySelectorAll(".produit");

    // Supprimer les anciennes classes pour éviter des conflits
    section.classList.remove("affichage_produit", "affichage_produit2", "affichage_produit3");

    // Ajouter une classe en fonction du nombre de produits
    if (produits.length >= 3) {
        section.classList.add("affichage_produit3");
    } else if (produits.length >= 2) {
        section.classList.add("affichage_produit2");
    } else {
        section.classList.add("affichage_produit");        
    }
}
// Exécuter la fonction dès que le DOM est chargé
document.addEventListener("DOMContentLoaded", choixClasse);


document.querySelectorAll('input[name="categorie"]').forEach(function(radio) {
    radio.addEventListener('change', function() {
        const idCategorie = this.value;
        const url = new URL(window.location.href);
        url.searchParams.set('idCategorie', idCategorie); // Ajoute ou met à jour le paramètre
        window.location.href = url.toString(); // Recharge la page avec la nouvelle URL
    });
});