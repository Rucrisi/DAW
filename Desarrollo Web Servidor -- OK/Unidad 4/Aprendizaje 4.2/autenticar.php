<?php

$usuarios = [
    'juan' => [
        'contrasena' => 'j1@n',
        'nombre_completo' => 'Juan García Mohedano'
    ],
    'sara' => [
        'contrasena' => 's@r@',
        'nombre_completo' => 'Sara Fernández Agudo'
    ]
];

// Obtiene los datos del formulario
$usuario = $_POST['usuario'] ?? '';
$contrasena = $_POST['contrasena'] ?? '';

// Verifica si el usuario existe y si la contraseña es correcta
if (isset($usuarios[$usuario]) && $usuarios[$usuario]['contrasena'] === $contrasena) {

    echo "Hola, " . $usuarios[$usuario]['nombre_completo'] . "!";

} else {

    echo "Error: Usuario o contraseña incorrectos.";

}
?>
