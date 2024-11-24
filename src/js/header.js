const searchBar = document.querySelector('.searchBar');
const searchButton = searchBar.querySelector('button');

searchButton.addEventListener('click', a);

function a() {
    let searchInput = searchBar.querySelector('input');
    if (searchInput.style.display === 'block') {
        searchInput.style.display = 'none';
    } else {
        searchInput.style.display = 'block';
    }
}