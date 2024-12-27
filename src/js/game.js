//fonction qui permet de revenir au tout début de la page
const retourhaut = document.querySelector(".return_top");
retourhaut.addEventListener('click', function() {
    window.scrollTo({
        top: 0,
        left: 0,
        behavior: 'smooth' //défilement fluide
    });

});



document.addEventListener("DOMContentLoaded", () => {
    const wheel = document.getElementById("wheel");
    const spinButton = document.getElementById("spin");
    const result = document.getElementById("result");
    const nbCoups = document.getElementById("nb_coups");

    // Ajouter un écouteur d'événement au bouton
    spinButton.addEventListener("click", () => {
        // Désactiver le bouton pendant que la roue tourne
        spinButton.disabled = true;

        // Récupérer tous les segments
        const segments = wheel.querySelectorAll(".segment");

        // Calculer le nombre total de segments
        const totalSegments = segments.length;

        // Générer un nombre de tours complet aléatoire (3 à 6 tours)
        const fullRotations = Math.floor(Math.random() * 3) + 3;

        // Choisir un segment gagnant aléatoire
        const winningSegmentIndex = Math.floor(Math.random() * totalSegments);

        // Calculer l'angle de rotation final
        const segmentAngle = 360 / totalSegments;
        const finalAngle = fullRotations * 360 + winningSegmentIndex * segmentAngle;

        // Appliquer une animation à la roue
        wheel.style.transition = "transform 4s cubic-bezier(0.25, 0.1, 0.25, 1)";
        wheel.style.transform = `rotate(${finalAngle}deg)`;

        // Attendre la fin de l'animation pour afficher le résultat
        setTimeout(() => {
            // Récupérer le texte du segment gagnant
            const winningSegment = segments[winningSegmentIndex];
            const resultText = winningSegment.textContent.trim() || "Segment vide";

            // Déterminer si le joueur a gagné ou perdu
            const isWinningSegment = winningSegment.classList.contains('winning-segment');
            const outcomeText = isWinningSegment ? "Vous avez gagné ! Voici le code : " : "Vous avez perdu. Essayez encore !";

            // Afficher le résultat
            if (isWinningSegment) {
                result.textContent = `${outcomeText} ${resultText}`;
            } else {
                result.textContent = `${outcomeText}`;
            }

            // Réinitialiser la roue pour le prochain tour
            wheel.style.transition = "none";
            wheel.style.transform = `rotate(${finalAngle % 360}deg)`;

            // Mettre à jour le nombre de coups
            let coups = parseInt(nbCoups.textContent.match(/\d+/)[0]);
            coups--;
            nbCoups.textContent = `Nombre de coups restants : ${coups}`;

            // Réactiver le bouton
            if(coups > 0){
                spinButton.disabled = false;
            }
            else{
                spinButton.disabled = true;
            }
        }, 4000); // Durée de l'animation (4 secondes)
    });
});