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

// Fonction pour le déplacement des catégories
document.addEventListener('DOMContentLoaded', () => {
    const affichageCategorie = document.querySelector('.affichage_categorie');
    const left = document.querySelector('#left');
    const right = document.querySelector('#right');
    const blocCategorie = document.querySelector('.bloc_categorie');

    const content = blocCategorie.innerHTML;
    blocCategorie.innerHTML += content; // Dupliquer le contenu

    affichageCategorie.addEventListener('mouseover', () => {
        left.style.display = 'block';
        right.style.display = 'block';
        blocCategorie.style.animationPlayState = 'paused'; // Arrêter l'animation
    });

    affichageCategorie.addEventListener('mouseout', () => {
        left.style.display = 'none';
        right.style.display = 'none';
        blocCategorie.style.animationPlayState = 'running'; // Reprendre l'animation
    });

    left.addEventListener('click', () => {
        blocCategorie.scrollLeft -= 300;
    });

    right.addEventListener('click', () => {
        blocCategorie.scrollLeft += 300;
    });
});


document.addEventListener('DOMContentLoaded', () => {
    const messagePanier = document.querySelector('.confirmation_message');
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