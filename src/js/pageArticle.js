const userStarsForm = document.querySelectorAll('.user_star_rating_form .star');
const noteInput = document.getElementById('note');

if (noteInput) {
    function updateUserStars(rating) {
        userStarsForm.forEach(star => {
            const starValue = parseFloat(star.getAttribute('data-value'));
            if (starValue <= rating) {
                star.classList.add('filled');
            } else {
                star.classList.remove('filled');
            }
        });
    }

    userStarsForm.forEach(star => {
        star.addEventListener('click', () => {
            const clickedValue = parseFloat(star.getAttribute('data-value'));
            noteInput.value = clickedValue;
            updateUserStars(clickedValue);
        });
    });

    updateUserStars(parseFloat(noteInput.value));
}
const existingNote = parseFloat(noteInput.value);
if (existingNote > 0) {
    
    updateUserStars(existingNote);
    userStarsForm.forEach(star => {
        star.style.pointerEvents = 'none';
    });
}

const thumbnails = document.querySelectorAll('.thumbnail_list .thumbnail');
const mainImage = document.querySelector('.main_image img');

thumbnails.forEach(thumbnail => {
    thumbnail.addEventListener('click', () => {
        mainImage.src = thumbnail.src;
        mainImage.alt = thumbnail.alt;
    });
});

const sizeButtons = document.querySelectorAll('.product_sizes .size');

sizeButtons.forEach(button => {
    button.addEventListener('click', () => {
        sizeButtons.forEach(btn => btn.classList.remove('selected'));
        button.classList.add('selected');
    });
});

document.addEventListener('DOMContentLoaded', () => {
    const moreOptionsButton = document.querySelector('.more_options');
    const moreOptionsMenu = document.querySelector('.more_options_menu');

    moreOptionsButton.addEventListener('click', () => {
        moreOptionsMenu.style.display = moreOptionsMenu.style.display === 'block' ? 'none' : 'block';
    });

    // Fermer le menu si on clique en dehors
    document.addEventListener('click', (event) => {
        if (!moreOptionsButton.contains(event.target) && !moreOptionsMenu.contains(event.target)) {
            moreOptionsMenu.style.display = 'none';
        }
    });
});


/*<button type="submit" name="ajout_panier" class="cart_button" id="cart_button">Ajouter au Panier</button>
*/