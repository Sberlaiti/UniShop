// Fonction pour revenir au début de la page
const retourhaut = document.querySelector(".return_top");
retourhaut.addEventListener('click', function () {
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
const segments = document.querySelectorAll('.segment, .winning_segment'); // Tous les segments
const totalSegments = segments.length; // Nombre total de segments
let nbCoups = parseInt(document.querySelector('#nb_coups')?.textContent.split(': ')[1]) || 3; // Coups restants
let lossStreak = 0; // Compteur de pertes consécutives

startButton.addEventListener('click', () => {
    // Ajouter plusieurs tours complets avant de calculer l'angle final
    const extraSpins = 5; // Nombre de tours complets supplémentaires
    const finalRotation = number + extraSpins * 360; // Calculer la rotation totale

    // Rotation de la roue
    wheel.style.transition = 'transform 4s ease-out';
    wheel.style.transform = "rotate(" + finalRotation + "deg)";

    // Calcul de l'angle final
    const finalAngle = finalRotation % 360; // Angle final entre 0 et 360
    number += Math.ceil(Math.random() * 1000); // Préparation de l'angle suivant

    // Calcul de l'indice du segment gagnant
    const segmentAngle = 360 / totalSegments; // Angle de chaque segment
    const winningIndex = Math.floor(finalAngle / segmentAngle); // Index du segment final

    setTimeout(() => {
        // **Nouvelle logique pour un tirage équitable**
        const randomValue = Math.random();
        const shouldWin = lossStreak >= 2 || randomValue < 0.5; // 50% de chance de gagner ou garantie après 2 pertes

        if (shouldWin) {
            lossStreak = 0; // Réinitialiser le compteur de pertes
            // Trouver le prochain segment gagnant
            const winningSegment = Array.from(segments).find(segment =>
                segment.classList.contains('winning_segment')
            );
            // Simuler l'appel à une API ou serveur pour obtenir une promotion
            fetch('../src/game.php')
                .then(response => response.json())
                .then(data => {
                    resultat.textContent = 'Bravo vous avez gagné un code promo : ' + data.codePromo;
                })
                .catch(error => {
                    resultat.textContent = ' Erreur lors de la récupération de la promotion.';
                    console.error('Erreur:', error);
                });
        } else {
            lossStreak++; // Augmenter le compteur de pertes
            resultat.textContent = "Vous avez perdu. Réessayez !";
        }

        // Mise à jour des coups restants
        nbCoups--;
        document.querySelector('#nb_coups').textContent = 'Nombre de coups restants : ' + nbCoups;

        // Vérification si l'utilisateur a épuisé ses coups
        if (nbCoups === 0) {
            startButton.disabled = true;
            startButton.style.backgroundColor = "gray";
            resultat.innerHTML += "<br>Plus de coups disponibles. Revenez demain !";
        }
    }, 4000); // Attente pour terminer la rotation
});
