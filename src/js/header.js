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

//affichage des catégories lors du survol
document.querySelectorAll('#menu_item').forEach(item => {
    item.addEventListener('mouseover', () => {
      const dropdown = item.querySelector('.liste_deroulante');
      dropdown.style.display = 'block';
    });
  
    item.addEventListener('mouseleave', () => {
      const dropdown = item.querySelector('.liste_deroulante');
      dropdown.style.display = 'none';
    });
  });