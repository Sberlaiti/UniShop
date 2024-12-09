//fonction qui permet de défiler au tout début de la page
const retourhaut = document.querySelector("#retourHaut");
retourhaut.addEventListener('click', function() {
    window.scrollTo({
        top: 0,
        left: 0,
        behavior: 'smooth' //défilement fluide
    });

});


const titre_acces = document.querySelectorAll(".titre_acces");
titre_acces.forEach((titre_acces) => {
    titre_acces.addEventListener('click', function() {
        // Récupère l'ID cible à partir de l'attribut "data-target"
        const targetId = titre_acces.getAttribute("data-target");
        const targetElement = document.getElementById(targetId);

        if (targetElement) {
            // Fais défiler la page jusqu'à l'élément cible
            targetElement.scrollIntoView({
                behavior: "smooth", // Défilement fluide
                block: "start" // Positionne l'élément en haut de la vue
            });
        }
    });
});