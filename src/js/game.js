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
const validerButton = document.createElement('button');
validerButton.classList.add('valider');
validerButton.textContent = "Valider";
let hasWon = false; // Indicateur de victoire

startButton.addEventListener('click', () => {
    // Désactiver le bouton pendant que la roue tourne
    startButton.disabled = true;

    // Rotation de la roue : ajouter 5 tours complets (5 * 360 degrés) + un angle aléatoire
    const finalRotation = number + 1800; // 5 tours complets

    // Appliquer la rotation de la roue
    wheel.style.transition = 'transform 4s ease-out';
    wheel.style.transform = "rotate(" + finalRotation + "deg)";

    // Calcul de l'angle final (position réelle sur la roue)
    const finalAngle = finalRotation % 360; // Angle final entre 0 et 360 degrés
    number += Math.ceil(Math.random() * 1000); // Préparation de l'angle suivant

    // Calcul de l'indice du segment gagnant
    const segmentAngle = 360 / totalSegments; // Angle attribué à chaque segment

    setTimeout(() => {
        const segmentIndex = Math.floor((360 - finalAngle + (segmentAngle / 2)) / segmentAngle) % totalSegments; // Index du segment final
        const shouldWin = segments[segmentIndex]; // Vérifier si le segment est gagnant

        // Déterminer si le joueur gagne de manière aléatoire
        const winProbability = 0.5; // Probabilité de gagner (50%)
        const randomWin = Math.random() < winProbability;

        if (shouldWin.classList.contains('winning_segment') && !hasWon && randomWin) {
            hasWon = true;
            // Générer un code promo aléatoire
            const codePromo = 'UNI' + Math.floor(Math.random() * 100);
            resultat.innerHTML = "Félicitations ! Vous avez gagné un code promo : <strong>" + codePromo + "</strong>";
            startButton.disabled = true;
            startButton.style.backgroundColor = "gray";
            document.querySelector('.affichage_jeu').appendChild(validerButton);

            validerButton.style.display = 'block';
            validerButton.addEventListener('click', () => {
                fetch('../src/php/insert_code.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({ codePromo })
                })
                .then(response => { 
                    if(!response.ok){
                        throw new Error('Erreur lors de la requête ! ' + response.statusText);
                    }
                    return response.json();
                })
                .then(data => {
                    // Affichage du message de validation
                    resultat.innerHTML = "Code promo validé !<br>";
                    startButton.disabled = true;
                    startButton.style.backgroundColor = "gray";
                    validerButton.style.display = 'none';
                })
                .catch(error => console.error(error));
            });
        } else if (hasWon) {
            resultat.textContent = "Vous avez déjà gagné ! Vous ne pouvez pas gagner deux fois.";
            startButton.disabled = true;
            startButton.style.backgroundColor = "gray";
        } else {
            resultat.textContent = "Vous avez perdu. Réessayez !";
        }

        // Mise à jour des coups restants
        nbCoups--;
        document.querySelector('#nb_coups').textContent = 'Nombre de coups restants : ' + nbCoups;

        fetch('../src/php/update_coups.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({ nbCoups })
        })
        .then(response => {
            if(!response.ok){
                throw new Error('Erreur lors de la requête ! ' + response.statusText);
            }
            return response.json();
        })
        .then(data => {
            if(nbCoups > 0 && !hasWon){
                startButton.disabled = false;
            }
            else if(hasWon){
                startButton.disabled = true;
                startButton.style.backgroundColor = "gray";
            }
            else{
                resultat.innerHTML += "<br>Vous avez épuisé tous vos coups. Réessayez plus tard.";
                startButton.disabled = true;
            }
        })
        .catch(error => console.error(error));
    }, 4000); // Attente de 4 secondes pour terminer la rotation
});
