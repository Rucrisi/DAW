document.addEventListener("DOMContentLoaded", () => {

    const estrellas = document.querySelectorAll("#taula_estrelles img"); // Selecciona todas las imágenes dentro de la tabla de estrellas

    function encenderEstrella(event) {
        event.target.src = "star_on.gif";
    }

    function apagarEstrella(event) {
        event.target.src = "star_off.gif";
    }

    estrellas.forEach(estrella => {
        estrella.addEventListener("mouseover", encenderEstrella);
        estrella.addEventListener("mouseout", apagarEstrella);
    });
});
