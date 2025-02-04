//fonction qui permet de revenir au tout début de la page
const retourhaut = document.querySelector(".return_top");
retourhaut.addEventListener('click', function() {
    window.scrollTo({
        top: 0,
        left: 0,
        behavior: 'smooth' //défilement fluide
    });
});

//Dupliquer le contenu de la catégorie
document.addEventListener('DOMContentLoaded', () => {
    const blocCategorie = document.querySelector('.bloc_categorie');
    const content = blocCategorie.innerHTML;
    blocCategorie.innerHTML += content; // Dupliquer le contenu
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
    } else if (produits.length >= 1) {
        section.classList.add("affichage_produit");
    }
}
// Exécuter la fonction dès que le DOM est chargé
document.addEventListener("DOMContentLoaded", choixClasse);

// Fonction pour changer la couleur des étoiles en fonction de la note
const userStarsForm = document.querySelectorAll('.user_star_rating_form .star');
userStarsForm.forEach(star => {
    const starValue = parseFloat(star.getAttribute('data-value'));
    if (starValue <= rating) {
        star.classList.add('filled');
    } else {
        star.classList.remove('filled');
    }
});