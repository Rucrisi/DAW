function buscarImagenes() {
    let latitud = document.getElementById("latitud").value.trim();
    let longitud = document.getElementById("longitud").value.trim();
    let mensaje = document.getElementById("mensaje");
    let contenedor = document.getElementById("imagenes");

    // Validación de datos
    if (!latitud || !longitud || isNaN(latitud) || isNaN(longitud)) {
        mensaje.innerText = "Por favor, ingresa latitud y longitud válidas.";
        return;
    }

    // URL con imágenes en mayor resolución (pithumbsize=800)
    let url = `https://commons.wikimedia.org/w/api.php?action=query&format=json&prop=coordinates|pageimages&generator=geosearch&ggscoord=${latitud}|${longitud}&ggsradius=1000&ggslimit=5&pithumbsize=800&origin=*`;

    // Mensaje de carga
    mensaje.innerText = "Buscando imágenes...";
    contenedor.innerHTML = "";

    fetch(url)
        .then(response => response.json())
        .then(data => {
            mensaje.innerText = "";
            if (!data.query) {
                mensaje.innerText = "No se encontraron imágenes en estas coordenadas.";
                return;
            }

            let pages = Object.values(data.query.pages);
            pages.forEach(page => {
                if (page.thumbnail) {
                    let img = document.createElement("img");
                    img.src = page.thumbnail.source;
                    img.alt = page.title;
                    img.style.width = "100%";
                    img.style.maxWidth = "300px";
                    img.style.margin = "10px";
                    contenedor.appendChild(img);
                }
            });

            if (contenedor.innerHTML === "") {
                mensaje.innerText = "No hay imágenes disponibles en estas coordenadas.";
            }
        })
        .catch(error => {
            console.error("Error al obtener imágenes:", error);
            mensaje.innerText = "Ocurrió un error al obtener las imágenes.";
        });
}
