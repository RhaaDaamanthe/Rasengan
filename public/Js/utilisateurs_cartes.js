    document.addEventListener("DOMContentLoaded", () => {
        const cards = document.querySelectorAll(".card");
        const rarityFilter = document.getElementById("rarityFilter");
        const searchbar = document.getElementById("searchbar");

        function filterCards() {
            const rarity = rarityFilter.value.toLowerCase();
            const search = searchbar.value.toLowerCase();

            cards.forEach((card) => {
                const anime = card.getAttribute("data-anime").toLowerCase();
                const title = card.querySelector(".card-content h2").textContent.toLowerCase();
                const rarete = card.getAttribute("data-rarete").toLowerCase();
                const show = 
                    (!rarity || title.includes(rarity) || rarete.includes(rarity)) &&
                    (!search || anime.includes(search) || title.includes(search));
                card.style.display = show ? "block" : "none";
            });
        }

        rarityFilter.addEventListener("change", filterCards);
        searchbar.addEventListener("input", filterCards);

        // Gestion du clic pour allonger la carte et afficher les propriétaires (uniquement pour raretés 3, 2, 1)
        cards.forEach(card => {
            card.addEventListener("click", (e) => {
                e.preventDefault();
                const rarete = parseInt(card.getAttribute("data-rarete"));
                if ([3, 2, 1].includes(rarete)) {
                    card.classList.toggle("expanded");
                }
            });

            // Fermer la liste si on clique à l'extérieur
            document.addEventListener("click", (e) => {
                if (!card.contains(e.target)) {
                    card.classList.remove("expanded");
                }
            });
        });
    });