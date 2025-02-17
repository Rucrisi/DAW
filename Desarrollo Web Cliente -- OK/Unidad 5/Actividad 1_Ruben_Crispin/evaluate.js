function validateDate1() {
    const inputEx1 = document.getElementById('inputEx1');
    const checkEx1 = document.getElementById('checkEx1');
    const errorEx1 = document.getElementById('errorEx1');
    const regex1 = /^(0[1-9]|[12][0-9]|3[01])-(0[1-9]|1[0-2])-\d{4}$/;

    if (regex1.test(inputEx1.value)) {
        checkEx1.style.display = 'inline';
        errorEx1.style.display = 'none'; // Oculta el mensaje de error si es válido
    } else {
        checkEx1.style.display = 'none';
        errorEx1.style.display = 'inline'; // Muestra el mensaje de error si no es válido
        errorEx1.textContent = "Formato de fecha incorrecto.";
    }
}

function validateDate2() {
    const inputEx2 = document.getElementById('inputEx2');
    const checkEx2 = document.getElementById('checkEx2');
    const errorEx2 = document.getElementById('errorEx2');
    const regex2 = /^(0[1-9]|[12][0-9]|3[01])[-/](0[1-9]|1[0-2])[-/]\d{4}$/;

    if (regex2.test(inputEx2.value)) {
        checkEx2.style.display = 'inline';
        errorEx2.style.display = 'none';
    } else {
        checkEx2.style.display = 'none';
        errorEx2.style.display = 'inline';
        errorEx2.textContent = "Formato de fecha incorrecto.";
    }
}

function validatePhone1() {
    const inputEx3 = document.getElementById('inputEx3');
    const checkEx3 = document.getElementById('checkEx3');
    const errorEx3 = document.getElementById('errorEx3');
    const regex3 = /^(9\d{2}(\s?\d{3}){2}|[67]\d{2}(\s?\d{3}){2})$/;

    if (regex3.test(inputEx3.value)) {
        checkEx3.style.display = 'inline';
        errorEx3.style.display = 'none';
    } else {
        checkEx3.style.display = 'none';
        errorEx3.style.display = 'inline';
        errorEx3.textContent = "Número de telefono incorrecto.";
    }
}

function validatePhone2() {
    const inputEx4 = document.getElementById('inputEx4');
    const checkEx4 = document.getElementById('checkEx4');
    const errorEx4 = document.getElementById('errorEx4');
    const regex4 = /^\+?\d{3} ?\d{3} ?\d{3} ?\d{3}$/;

    if (regex4.test(inputEx4.value)) {
        checkEx4.style.display = 'inline';
        errorEx4.style.display = 'none';
    } else {
        checkEx4.style.display = 'none';
        errorEx4.style.display = 'inline';
        errorEx4.textContent = "Formato de telefono incorrecto.";
    }
}

function validatePassword() {
    const inputEx5 = document.getElementById('inputEx5');
    const checkEx5 = document.getElementById('checkEx5');
    const errorEx5 = document.getElementById('errorEx5');
    const regex5 = /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/;

    if (regex5.test(inputEx5.value)) {
        checkEx5.style.display = 'inline';
        errorEx5.style.display = 'none';
    } else {
        checkEx5.style.display = 'none';
        errorEx5.style.display = 'inline';
        errorEx5.textContent = "Contraseña incorrecta. Debe tener mas de 8 caracteres y contener letras y numeros.";
    }
}
