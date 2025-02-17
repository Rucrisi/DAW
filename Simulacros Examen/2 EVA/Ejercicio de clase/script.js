const output = document.getElementById('output');
const botones = document.querySelectorAll('.calculadora button');

function ButtonClick(event) {
  const boton = event.target;
  const textoBoton = boton.textContent;

  if (textoBoton === '=') {
    // Funcion eval para ejecutar la cadena
    const result = eval(output.value);
    output.value = String(result);

    // Boton para resetear
  } else if (textoBoton === 'Rst') {
    const result = "";
    output.value = String(result);

    // Para añadir simbolos a la cadena
  } else {
    output.value += textoBoton;
  }
}

botones.forEach((button) => button.addEventListener('click', ButtonClick));