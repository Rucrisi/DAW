const apiKey = "e611cb3dea35c7a80035d4dfd0afb2a4";
const searchInput = document.getElementById("searchInput");
const suggestions = document.getElementById("suggestions");
const searchButton = document.getElementById("searchButton");
const results = document.getElementById("results");
const loading = document.getElementById("loading");

// Función para obtener sugerencias mientras el usuario escribe
searchInput.addEventListener("input", async () => {
    const query = searchInput.value;
    if (query.length < 3) {
        suggestions.innerHTML = "";
        return;
    }

    const response = await fetch(`https://api.themoviedb.org/3/search/movie?api_key=${apiKey}&query=${query}`);
    const data = await response.json();

    suggestions.innerHTML = "";
    data.results.slice(0, 5).forEach(async (movie) => {
        // Segunda consulta para obtener el IMDB ID
        const movieDetailsResponse = await fetch(`https://api.themoviedb.org/3/movie/${movie.id}?api_key=${apiKey}`);
        const movieDetails = await movieDetailsResponse.json();
        const imdbId = movieDetails.imdb_id;

        if (imdbId) {
            const suggestion = document.createElement("div");
            suggestion.textContent = movie.title;
            suggestion.classList.add("suggestion");
            suggestion.addEventListener("click", () => {

                // Primero, rellenar el input con el nombre de la sugerencia
                searchInput.value = movie.title;
                window.open(`https://www.imdb.com/title/${imdbId}/`, "_blank");
                // Limpiar las sugerencias después de hacer clic
                suggestions.innerHTML = "";
            });
            suggestions.appendChild(suggestion);
        }
    });
});

// Función para buscar películas al hacer clic en el botón
searchButton.addEventListener("click", async () => {
    const query = searchInput.value;
    if (!query) return;

    // Ocultar las sugerencias al hacer clic en "Buscar"
    suggestions.innerHTML = "";

    loading.style.display = "block";
    results.innerHTML = "";

    const response = await fetch(`https://api.themoviedb.org/3/search/movie?api_key=${apiKey}&query=${query}`);
    const data = await response.json();
    loading.style.display = "none";

    data.results.forEach(async (movie) => {
        // Segunda consulta para obtener detalles de la película
        const movieDetailsResponse = await fetch(`https://api.themoviedb.org/3/movie/${movie.id}?api_key=${apiKey}&append_to_response=credits`);
        const details = await movieDetailsResponse.json();

        const actors = details.credits?.cast?.slice(0, 3).map(actor => actor.name).join(", ") || "No disponible";
        const genres = details.genres?.map(g => g.name).join(", ") || "No disponible";
        const imdbId = details.imdb_id;

        const movieCard = `
        <div class="movie-card">
            <img src="https://image.tmdb.org/t/p/w200${movie.poster_path}" alt="${movie.title}">
            <h3 style="text-align: center;">${movie.title}</h3>
            <p><strong>Géneros:</strong> ${genres}</p>
            <p><strong>Fecha de estreno:</strong> ${movie.release_date}</p>
            <p><strong>Actores principales:</strong> ${actors}</p>
            ${imdbId ? `
                <div class="imdb-box">
                    <a href="https://www.imdb.com/title/${imdbId}/" target="_blank">Ver en IMDB</a>
                </div>` : ""}
        </div>
    `;
        results.innerHTML += movieCard;
    });
});
