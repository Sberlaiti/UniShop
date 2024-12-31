// Fonction pour revenir au début de la page
const retourhaut = document.querySelector(".return_top");
retourhaut.addEventListener('click', function() {
    window.scrollTo({
        top: 0,
        left: 0,
        behavior: 'smooth' // défilement fluide
    });
});


let wheel = document.querySelector('#wheel');
let startButton = document.querySelector('#spin');
let number = Math.ceil(Math.random() * 1000);
const resultat = document.querySelector('#result');
const segments = document.querySelectorAll('.segment'); // Sélection de tous les segments
const totalSegments = segments.length; // Nombre total de segments sur la roue
let nbCoups = parseInt(document.querySelector('#nb_coups')?.textContent.split(': ')[1]) || 3; // Nombre de coups restants

startButton.addEventListener('click', () => {
    if (nbCoups > 0) {
        // Rotation de la roue
        wheel.style.transform = "rotate(" + number + "deg)";
        
        // Calcul de l'angle final
        const finalAngle = number % 360; // Angle final entre 0 et 360
        number += Math.ceil(Math.random() * 1000); // Préparation de l'angle suivant

        // Calcul de l'indice du segment gagnant
        const segmentAngle = 360 / totalSegments; // Angle de chaque segment
        const winningIndex = Math.floor(finalAngle / segmentAngle); // Index du segment final

        // Vérification si le segment est gagnant
        const isWinningSegment = segments[winningIndex].classList.contains('winning_segment');
        if (isWinningSegment) {
            resultat.textContent = "🎉 Vous avez gagné une promotion !";
        } else {
            resultat.textContent = "😞 Vous avez perdu. Réessayez !";
        }

        // Mise à jour des coups restants
        nbCoups--;
        document.querySelector('#nb_coups').textContent = `Nombre de coups restants : ${nbCoups}`;

        // Vérification si l'utilisateur a épuisé ses coups
        if (nbCoups === 0) {
            startButton.disabled = true;
            resultat.textContent = "😢 Plus de coups disponibles. Revenez demain !";
        }
    } else {
        resultat.textContent = "😢 Vous n'avez plus de coups disponibles.";
    }
});
