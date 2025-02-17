
var letras = "TRWAGMYFPDXBNJZSQVHLCKET"; // Letras que se usan en los DNI.

var dni = 12345678; // Variable ficticia sin letra del DNI.

var posicion = dni % 23; // Formula para calcular el Modulo de la variable dni.

var letraCalculada = letras.substring(posicion, posicion + 1); // Formula que devuelve letra de la variable dni segun la posicion en la cadena de letras.

document.write(dni + "-" + letraCalculada); // Mostrara el DNI completo el numero y la letra.