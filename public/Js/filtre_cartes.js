// Fonction filterCards définie globalement
function filterCards() {
    const searchInput = document.getElementById('searchbar');
    const rarityFilter = document.getElementById("rarityFilter");

    if (!searchInput || !rarityFilter) return;

    const searchValue = searchInput.value.toLowerCase().trim().normalize("NFD").replace(/[\u0300-\u036f]/g, "") || "";
    const selectedRarity = rarityFilter.value.toLowerCase().trim().normalize("NFD").replace(/[\u0300-\u036f]/g, "") || "";

    const cards = document.querySelectorAll(".catalogue2 .card");

    cards.forEach((card) => {
        const characterName = card.querySelector("img")?.getAttribute("alt")?.toLowerCase().normalize("NFD").replace(/[\u0300-\u036f]/g, "") || "";
        const animeName = card.getAttribute("data-anime")?.toLowerCase().normalize("NFD").replace(/[\u0300-\u036f]/g, "") || "";
        const filmName = card.getAttribute("data-film")?.toLowerCase().normalize("NFD").replace(/[\u0300-\u036f]/g, "") || "";
        const cardRareteId = card.getAttribute("data-rarete");

        let cardRarityName = '';
        switch(parseInt(cardRareteId)) {
            case 1: cardRarityName = 'communes'; break;
            case 2: cardRarityName = 'rares'; break;
            case 3: cardRarityName = 'epiques'; break;
            case 4: cardRarityName = 'legendaires'; break;
            case 5: cardRarityName = 'mythiques'; break;
            case 6: cardRarityName = 'events'; break;
        }

        const matchesSearch =
            searchValue === "" ||
            characterName.includes(searchValue) ||
            animeName.includes(searchValue) ||
            filmName.includes(searchValue);

        const matchesRarity =
            selectedRarity === "" || cardRarityName === selectedRarity;

        card.style.display = matchesSearch && matchesRarity ? "block" : "none";
    });
}

// Ajouter les écouteurs d'événements pour le filtrage
document.addEventListener('DOMContentLoaded', () => {
    const searchInput = document.getElementById('searchbar');
    const rarityFilter = document.getElementById("rarityFilter");

    if (searchInput && rarityFilter) {
        searchInput.addEventListener("input", filterCards);
        rarityFilter.addEventListener("change", filterCards);
        filterCards();
    }
});