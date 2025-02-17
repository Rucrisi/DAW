// Definimos la función para verificar si el número es par o impar
function esPar (numero) {

    // Usamos el operador módulo (%) para verificar si el número es divisible por 2
    if (numero % 2 === 0) {
        return "Par";
    } else {
        return "Impar";
    }
}

// Ejemplo de uso
let numero = 7;
let resultado = esPar (numero);

// Mostramos el resultado en la consola
console.log("El número " + numero + " es: " + resultado);
