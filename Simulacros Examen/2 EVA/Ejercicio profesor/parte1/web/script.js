document.addEventListener("DOMContentLoaded", () => {
    generateCalculatorGrid();
    setUseAPI(false); // Default to local calculator
});

let useAPI = false; // true -> API mode, false -> local mode
const pantalla = document.getElementById("pantalla");

function setUseAPI(value) {
    useAPI = value;
    document.querySelectorAll('.navbar button').forEach((btn, index) =>
        btn.classList.toggle('active', index === (useAPI ? 1 : 0))
    );
}

const calculatorButtons = [
    ['7', '8', '9', '/'],
    ['4', '5', '6', '*'],
    ['1', '2', '3', '-'],
    ['0', '.', '=', '+']
].flat();

function generateCalculatorGrid() {
    const grid = document.getElementById("calculator-grid");
    calculatorButtons.forEach(value => {
        grid.appendChild(createButton(value));
    });
}

function createButton(value) {
    const button = document.createElement("button");
    button.type = "button";
    button.textContent = value;
    button.onclick = () => handleInput(value);
    return button;
}

function handleInput(value) {
    if (value === '=') {
        useAPI ? calcularAPI() : calcularLocal();
    } else {
        pantalla.value += value;
    }
}

function calcularLocal() {
    try {
        pantalla.value = eval(pantalla.value);
    } catch {
        pantalla.value = "Error";
    }
}

function calcularAPI() {
    fetch(`http://127.0.0.1:8080/server/server.php?expression=${encodeURIComponent(pantalla.value)}`)
        .then(response => response.text())
        .then(result => pantalla.value = result)
        .catch(console.error);
}

function borrar() {
    pantalla.value = '';
}
