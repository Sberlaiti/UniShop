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
    } else if (produits.length >= 1) {
        section.classList.add("affichage_produit");
    }

    const noProduit = document.querySelector(".no_produit");
    const mainSection = document.querySelector(".main_section");
    if(noProduit){
        mainSection.style.marginTop = "1cm";
        mainSection.style.marginBottom = "3.23cm";
    }
}
// Exécuter la fonction dès que le DOM est chargé
if(!document.querySelector(".produitUser")){
    document.addEventListener("DOMContentLoaded", choixClasse);
}


// Fonction pour changer l'url en fonction de la catégorie sélectionnée
document.querySelectorAll('input[name="categorie"]').forEach(function(radio) {
    radio.addEventListener('change', function() {
        const idCategorie = this.value;
        const url = new URL(window.location.href);
        url.searchParams.set('idCategorie', idCategorie); // Ajoute ou met à jour le paramètre
        window.location.href = url.toString(); // Recharge la page avec la nouvelle URL
    });
});

document.addEventListener('DOMContentLoaded', () => {
    const messagePanier = document.querySelector('.message_panier');
    // Fonction pour afficher le message
    function showMessage() {
        if (messagePanier) {
            messagePanier.classList.add('show');
            setTimeout(() => {
                messagePanier.classList.remove('show');
            }, 3000); // Masquer après 3 secondes
        }
    }

    // Appeler la fonction pour afficher le message (par exemple, après l'ajout au panier)
    showMessage();
});

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