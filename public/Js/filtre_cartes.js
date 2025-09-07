// Fonction filterCards définie globalement
function filterCards() {
    const searchInput = document.getElementById('searchbar');
    const rarityFilter = document.getElementById("rarityFilter");

    if (!searchInput || !rarityFilter) return;

    const searchValue = searchInput.value.toLowerCase().trim().normalize("NFD").replace(/[\u0300-\u036f]/g, "") || "";
    const selectedRarity = rarityFilter.value.toLowerCase().trim().normalize("NFD").replace(/[\u0300-\u036f]/g, "") || "";

    const cards = document.querySelectorAll(".catalogue2 .card");

    cards.forEach((card) => {
        const cardImg = card.querySelector("img");
        const imgSrc = cardImg?.getAttribute("src").toLowerCase().normalize("NFD").replace(/[\u0300-\u036f]/g, "") || "";
        const characterName = cardImg?.getAttribute("alt")?.toLowerCase().normalize("NFD").replace(/[\u0300-\u036f]/g, "") || "";
        const animeName = card.getAttribute("data-anime")?.toLowerCase().normalize("NFD").replace(/[\u0300-\u036f]/g, "") || "";

        const rarityFromImage = extractRarityFromImage(imgSrc);

        const matchesSearch =
            searchValue === "" ||
            characterName.includes(searchValue) ||
            animeName.includes(searchValue);

        const matchesRarity =
            selectedRarity === "" || rarityFromImage === selectedRarity;

        card.style.display = matchesSearch && matchesRarity ? "block" : "none";
    });
}

function extractRarityFromImage(src) {
    const match = src.match(
        /\/Cartes\/(?:[^\/]*_)?(Communes|Rares|Mythiques|Legendaires|Epiques|Events)/i
    );
    return match ? match[1].toLowerCase().normalize("NFD").replace(/[\u0300-\u036f]/g, "") : "";
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