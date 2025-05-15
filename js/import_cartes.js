console.log("import_cartes.js chargé !");

document.addEventListener("DOMContentLoaded", function () {
    const adminPanel = document.getElementById("adminPanel");
    if (!adminPanel) {
        console.warn("adminPanel non trouvé, arrêt du script.");
        return;
    }
    
    adminPanel.classList.add("active");

    // Vérifier les listes d'animés et films
    const animeList = window.animes || [];
    const filmList = window.films || [];
    console.log("AnimeList:", animeList);
    console.log("FilmList:", filmList);

    // Fonction pour mettre à jour les options d'animés/films (ajout)
    function updateAnimeFilmOptions() {
        const typeSelect = document.getElementById("cardType");
        const animeSelect = document.getElementById("cardAnime");
        const newAnimeInput = document.getElementById("newAnimeInput");

        if (!typeSelect || !animeSelect || !newAnimeInput) {
            console.warn("Éléments manquants pour updateAnimeFilmOptions:", { typeSelect, animeSelect, newAnimeInput });
            return;
        }

        console.log("Mise à jour des options pour cardType:", typeSelect.value);
        animeSelect.innerHTML = '<option value="">Sélectionnez un ' + (typeSelect.value === "anime" ? "animé" : "film/série") + '</option>';
        newAnimeInput.style.display = "none";
        newAnimeInput.removeAttribute("required");

        if (typeSelect.value === "anime") {
            animeList.forEach(anime => {
                const option = document.createElement("option");
                option.value = anime;
                option.text = anime.charAt(0).toUpperCase() + anime.slice(1);
                animeSelect.appendChild(option);
            });
            animeSelect.innerHTML += '<option value="new">Ajouter un nouvel animé...</option>';
            animeSelect.disabled = false;
        } else if (typeSelect.value === "film") {
            filmList.forEach(film => {
                const option = document.createElement("option");
                option.value = film;
                option.text = film.charAt(0).toUpperCase() + film.slice(1);
                animeSelect.appendChild(option);
            });
            animeSelect.innerHTML += '<option value="new">Ajouter un nouveau film/série...</option>';
            animeSelect.disabled = false;
        } else {
            animeSelect.innerHTML = '<option value="">Sélectionnez un type d\'abord</option>';
            animeSelect.disabled = true;
        }
    }

    // Fonction pour mettre à jour les options d'animés/films (gestion d'inventaire)
    function updateEditAnimeFilmOptions() {
        const typeSelect = document.getElementById("editCardType");
        const animeSelect = document.getElementById("editCardAnime");

        if (!typeSelect || !animeSelect) {
            console.warn("Éléments manquants pour updateEditAnimeFilmOptions:", { typeSelect, animeSelect });
            return;
        }

        console.log("Mise à jour des options pour editCardType:", typeSelect.value);
        animeSelect.innerHTML = '<option value="">Sélectionnez un ' + (typeSelect.value === "anime" ? "animé" : "film/série") + '</option>';

        if (typeSelect.value === "anime") {
            if (animeList.length === 0) {
                console.warn("Aucun animé disponible dans animeList");
                animeSelect.innerHTML = '<option value="">Aucun animé disponible</option>';
            } else {
                animeList.forEach(anime => {
                    const option = document.createElement("option");
                    option.value = anime;
                    option.text = anime.charAt(0).toUpperCase() + anime.slice(1);
                    animeSelect.appendChild(option);
                });
                animeSelect.disabled = false;
            }
        } else if (typeSelect.value === "film") {
            if (filmList.length === 0) {
                console.warn("Aucun film disponible dans filmList");
                animeSelect.innerHTML = '<option value="">Aucun film/série disponible</option>';
            } else {
                filmList.forEach(film => {
                    const option = document.createElement("option");
                    option.value = film;
                    option.text = film.charAt(0).toUpperCase() + film.slice(1);
                    animeSelect.appendChild(option);
                });
                animeSelect.disabled = false;
            }
        } else {
            animeSelect.innerHTML = '<option value="">Sélectionnez un type d\'abord</option>';
            animeSelect.disabled = true;
        }
    }

    // Afficher/cacher le champ pour un nouvel animé/film (ajout)
    function toggleNewAnimeInput() {
        const animeSelect = document.getElementById("cardAnime");
        const newAnimeInput = document.getElementById("newAnimeInput");
        if (animeSelect && newAnimeInput) {
            if (animeSelect.value === "new") {
                newAnimeInput.style.display = "block";
                newAnimeInput.setAttribute("required", "required");
            } else {
                newAnimeInput.style.display = "none";
                newAnimeInput.removeAttribute("required");
            }
        }
    }

    // Mettre à jour les cartes disponibles (gestion d'inventaire)
    async function updateCardOptions() {
        const type = document.getElementById("editCardType").value;
        const rarete = document.getElementById("editCardRarete").value;
        const anime = document.getElementById("editCardAnime").value;
        const cardSelect = document.getElementById("editCardSelect");

        if (!type || !rarete || !anime) {
            cardSelect.innerHTML = '<option value="">Sélectionnez tous les filtres</option>';
            return;
        }

        console.log("Récupération des cartes avec:", { type, rarete, anime });
        try {
            const response = await fetch(`test.php?action=get_cards&type=${encodeURIComponent(type)}&rarete=${encodeURIComponent(rarete)}&anime=${encodeURIComponent(anime)}`);
            const cards = await response.json();

            if (cards.error) {
                console.error('Erreur:', cards.error);
                cardSelect.innerHTML = '<option value="">Erreur lors du chargement</option>';
                return;
            }

            console.log("Cartes récupérées:", cards);
            const options = ['<option value="">Sélectionnez une carte</option>'];
            cards.forEach(card => {
                const display = type === 'anime' ? `${card.nom} (${card.anime})` : `${card.nom} (${card.film})`;
                options.push(`<option value="${card.id}">${display}</option>`);
            });
            cardSelect.innerHTML = options.join('');
        } catch (error) {
            console.error('Erreur lors de la récupération des cartes:', error);
            cardSelect.innerHTML = '<option value="">Erreur lors du chargement</option>';
        }
    }

    // Initialiser les événements pour le formulaire d'ajout
    const cardTypeSelect = document.getElementById("cardType");
    const cardAnimeSelect = document.getElementById("cardAnime");
    if (cardTypeSelect) {
        cardTypeSelect.addEventListener("change", () => {
            console.log("cardType changé:", cardTypeSelect.value);
            updateAnimeFilmOptions();
        });
        updateAnimeFilmOptions();
    }
    if (cardAnimeSelect) {
        cardAnimeSelect.addEventListener("change", toggleNewAnimeInput);
        toggleNewAnimeInput();
    }

    // Initialiser les événements pour le formulaire de gestion d'inventaire
    const editCardTypeSelect = document.getElementById("editCardType");
    const editCardRareteSelect = document.getElementById("editCardRarete");
    const editCardAnimeSelect = document.getElementById("editCardAnime");
    if (editCardTypeSelect) {
        editCardTypeSelect.addEventListener("change", () => {
            console.log("editCardType changé:", editCardTypeSelect.value);
            updateEditAnimeFilmOptions();
            updateCardOptions();s
        });
        console.log("Initialisation editCardType, valeur:", editCardTypeSelect.value);
        updateEditAnimeFilmOptions();
    }
    if (editCardRareteSelect) {
        editCardRareteSelect.addEventListener("change", () => {
            console.log("editCardRarete changé:", editCardRareteSelect.value);
            updateCardOptions();
        });
    }
    if (editCardAnimeSelect) {
        editCardAnimeSelect.addEventListener("change", () => {
            console.log("editCardAnime changé:", editCardAnimeSelect.value);
            updateCardOptions();
        });
    }
});