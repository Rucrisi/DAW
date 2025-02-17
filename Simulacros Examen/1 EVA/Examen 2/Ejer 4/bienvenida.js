function bienvenida() {
    // Solicita el nombre del usuario
    const nombre = prompt("Por favor, ingresa tu nombre:");

    // Comprueba que el usuario haya ingresado un nombre
    if (nombre) {
        // Muestra el mensaje de bienvenida
        alert(`¡Bienvenido, ${nombre}!`);
    }
}

// Para ejecutar la funcion en un html
window.onload = bienvenida();