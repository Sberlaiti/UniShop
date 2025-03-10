const searchBar = document.querySelector('.searchBar');
const searchButton = document.getElementById('searchButton');
const searchInput = searchBar.querySelector('input[name="query"]');

searchButton.addEventListener('click', handleSearch);
searchInput.addEventListener('keydown', function(event) {
    if (event.key === 'Enter') {
        event.preventDefault();
        handleSearch();
    }
});

function handleSearch() {
    if (searchBar.classList.contains('collapsed')) {
        searchBar.classList.remove('collapsed');
        searchBar.classList.add('expanded');
        searchInput.style.display = 'block';
        searchInput.focus();
    } else {
        if (searchInput.value.trim() !== '') {
            searchBar.closest('form').submit();
        } else {
            searchBar.classList.remove('expanded');
            searchBar.classList.add('collapsed');
            searchInput.style.display = 'none';
        }
    }
    localStorage.setItem("searchQuery", searchInput.value);
}

searchInput.addEventListener('blur', function() {
    if (searchInput.value.trim() === '') {
        searchBar.classList.remove('expanded');
        searchBar.classList.add('collapsed');
        searchInput.style.display = 'none';
    }
});

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