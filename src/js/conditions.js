function retourhaut(){
    document.documentElement.scrollTop = 0;
}

document.querySelector("#retourHaut").addEventListener('click', retourhaut);


const titre_acces = document.querySelectorAll(".titre_acces");
titre_acces.forEach((titre_acces) =>{
    titre_acces.addEventListener('click', () =>{
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