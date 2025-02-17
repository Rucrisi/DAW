document.addEventListener("DOMContentLoaded", () => {
    // Ejercicio 1
    document.querySelector("input[value='Encender']").addEventListener("click", function() {
        const star = document.getElementById("star");
        star.src = "star_on.gif";
    });

    // Ejercicio 2
    document.querySelectorAll("input[value='Encender']")[1].addEventListener("click", function() {
        const estrellas = document.querySelectorAll("#estrelles img");
        if (estrellas.length > 1) {
            estrellas[1].src = "star_on.gif";
        }
    });
});