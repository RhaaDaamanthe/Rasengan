console.log("main.js chargé !");

// Gestion du menu hamburger
const menuHamburger = document.querySelector(".menu-burger");
const navLinks = document.querySelector(".nav-links");

if (menuHamburger && navLinks) {
    menuHamburger.addEventListener("click", () => {
        navLinks.classList.toggle("mobile-menu");
    });
}

// Liste animé / films / séries première lettre en gras
document.addEventListener("DOMContentLoaded", function () {
    function processList(listId) {
        const listElement = document.getElementById(listId);

        if (!listElement) {
            console.warn(`⚠️ Aucun élément avec l'ID '${listId}' trouvé !`);
            return;
        }

        const items = listElement.getElementsByTagName("li");
        let seenLetters = new Set();

        for (let item of items) {
            let text = item.textContent.trim();
            let firstLetter = text.charAt(0).toUpperCase();

            if (!seenLetters.has(firstLetter) && !text.startsWith('Total des cartes')) {
                item.innerHTML = `<strong>${firstLetter}</strong>${text.slice(1)}`;
                seenLetters.add(firstLetter);
            }
        }
    }

    // Appliquer la fonction aux listes
    processList("anime-list");
    processList("film-list");

    // Gestion du clic sur les cartes pour redirection (main-catalogue)
    document.querySelectorAll(".main-catalogue .card").forEach((card) => {
        card.addEventListener("click", () => {
            const url = card.getAttribute("data-url");
            if (url) {
                window.location.href = url;
            }
        });
    });

    // Gestion du clic sur les cartes pour afficher/masquer les propriétaires (catalogue2)
    document.querySelectorAll(".catalogue2 .card").forEach((card) => {
        card.addEventListener("click", (e) => {
            e.preventDefault(); // Empêche tout comportement par défaut
            const ownersElement = card.querySelector(".card-owners");
            if (ownersElement) {
                const isHidden = ownersElement.style.display === "none" || ownersElement.style.display === "";
                ownersElement.style.display = isHidden ? "block" : "none";
            }
        });
    });
});

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