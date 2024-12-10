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