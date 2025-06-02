document.addEventListener("DOMContentLoaded", function () {
    const typeSelect = document.getElementById("cardType");
    const animeSelect = document.getElementById("cardAnime");
    const newAnimeInput = document.getElementById("newAnimeInput");

    function updateAnimeOptions(list) {
        // Réinitialiser
        animeSelect.innerHTML = '<option value="">Sélectionnez un animé/film</option>';

        // Ajouter les options
        list.forEach(item => {
            const option = document.createElement("option");
            option.value = item;
            option.textContent = item.charAt(0).toUpperCase() + item.slice(1);
            animeSelect.appendChild(option);
        });

        // Ajouter option "Autre..."
        const otherOption = document.createElement("option");
        otherOption.value = "__other__";
        otherOption.textContent = "Autre (ajouter manuellement)";
        animeSelect.appendChild(otherOption);
    }

    typeSelect.addEventListener("change", function () {
        newAnimeInput.style.display = "none";
        const selectedType = typeSelect.value;

        if (selectedType === "anime") {
            updateAnimeOptions(animes);
        } else if (selectedType === "film") {
            updateAnimeOptions(films);
        } else {
            animeSelect.innerHTML = '<option value="">Sélectionnez un type d\'abord</option>';
        }
    });

    animeSelect.addEventListener("change", function () {
        if (animeSelect.value === "__other__") {
            newAnimeInput.style.display = "block";
        } else {
            newAnimeInput.style.display = "none";
        }
    });
});