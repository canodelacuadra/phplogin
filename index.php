<?php

/**
 * Un Script de inicio de sesión de PHP sencillo, limpio y seguro / MINIMAL VERSION
 * Para más verisones (one-file, advanced, framework-like) visite http://www.php-login.net
 *
 * Utiliza PHP sesiones, modernas hash y sating y da las funciones básicas de que un sistema de inicio de sesión correcto.
 *
 * @author Panique
 * @link https://github.com/panique/php-login-minimal/
 * @license http://opensource.org/licenses/MIT MIT License
 */

// comprobación de versión PHP mínima
if (version_compare(PHP_VERSION, '5.3.7', '<')) {
    exit("Lo sentimos, Simple Login PHP no se ejecuta en una versión PHP menor que 5.3.7 !");
} else if (version_compare(PHP_VERSION, '5.5.0', '<')) {
    // Si usted está usando PHP 5.3 o 5.4 PHP debes incluir la password_api_compatibility_library.php
    // (Esta biblioteca agrega las funciones hash de contraseña PHP 5.5 a versiones anteriores de PHP)
    require_once("libraries/password_compatibility_library.php");
}

// incluyen la configuración / constantes para la conexión de base de datos
require_once("config/db.php");

// cargar la clase de login
require_once("classes/Login.php");

// crear un objeto de sesión. Cuando este objeto se crea, lo hará cosas iniciar/cerrar sesión automáticamente
// Así que esta sola línea maneja el proceso de login entero. en consecuencia, usted puede simplemente ...
$login = new Login();

// ... preguntar si estamos logueados aquí:
if ($login->isUserLoggedIn() == true) {
    // el usuario está conectado pulg. puedes hacer lo que quieras.
    // for demonstration purposes, we simply show the "you are logged in" view.
    include("views/logged_in.php");

} else {
    // the user is not logged in. you can do whatever you want here.
    // for demonstration purposes, we simply show the "you are not logged in" view.
    include("views/not_logged_in.php");
}
