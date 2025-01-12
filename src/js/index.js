//fonction qui permet de revenir au tout début de la page
const retourhaut = document.querySelector(".return_top");
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


//fonction qui permet de changer la classe si le nombre de catégories est supérieur ou égal à 8
const categories = document.querySelectorAll(".categorie");
const affichage_categories = document.querySelector(".affichage_categorie");
const container = document.querySelector(".categorie_container");
document.addEventListener("DOMContentLoaded", function() {
    if(categories.length >= 8){
        affichage_categories.classList.add("affichage_categorie2");
        affichage_categories.classList.remove("affichage_categorie");
    }
});