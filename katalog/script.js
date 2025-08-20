const searchInput = document.getElementById('searchInput');
const categoryFilter = document.getElementById('categoryFilter');
const productCards = document.querySelectorAll('.product-card');

function filterProducts() {
  const searchText = searchInput.value.toLowerCase();
  const selectedCategory = categoryFilter.value;

  productCards.forEach(card => {
    const name = card.dataset.name.toLowerCase();
    const category = card.dataset.category;

    const matchesSearch = name.includes(searchText);
    const matchesCategory = selectedCategory === 'all' || category === selectedCategory;

    if (matchesSearch && matchesCategory) {
      card.style.display = 'block';
    } else {
      card.style.display = 'none';
    }
  });
}

searchInput.addEventListener('input', filterProducts);
categoryFilter.addEventListener('change', filterProducts);
