function retourhaut(){
    document.documentElement.scrollTop = 0;
    console.log("en marche");
}

document.addEventListener('click', retourhaut);

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
        console.log("Plus de 3 produits affichés.");
    } else if (produits.length >= 2) {
        section.classList.add("affichage_produit2");
        console.log("2 ou 3 produits affichés.");
    } else {
        section.classList.add("affichage_produit");
        console.log("1 produit ou aucun produit affiché.");
    }
}

// Exécuter la fonction dès que le DOM est chargé
document.addEventListener("DOMContentLoaded", choixClasse);