const searchBar = document.querySelector('.searchBar');
const searchButton = searchBar.querySelector('button');

searchButton.addEventListener('click', display_SearchBar);

function display_SearchBar() {
    let searchInput = searchBar.querySelector('input');
    if (searchInput.style.display === 'block') {
        searchInput.style.display = 'none';
    } else {
        searchInput.style.display = 'block';
    }
}