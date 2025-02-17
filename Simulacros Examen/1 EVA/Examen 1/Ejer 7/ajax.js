function cargarContenido() {

    var xhr = new XMLHttpRequest();
    xhr.open("GET", "contenido.txt", true);  // Suponiendo que hay un archivo llamado contenido.txt
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) // Cambiar el contenido del párrafo
        {
            document.getElementById('contenido').innerHTML = xhr.responseText;
        }
    };
    xhr.send();
}
