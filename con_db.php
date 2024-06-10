<?php
$host = "localhost"; // Cambia esto si tu servidor no es local
$user = "root"; // Cambia esto con tu usuario de MySQL
$password = ""; // Cambia esto con tu contraseña de MySQL
$dbname = "formulario"; // Asegúrate de que este nombre coincida con tu base de datos

$conex = mysqli_connect($host, $user, $password, $dbname);

if (!$conex) {
    die("Conexión fallida: " . mysqli_connect_error());
}
?>
