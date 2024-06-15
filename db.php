<?php
// Configuración de la base de datos
$host = "localhost";
$dbname = "hospital";
$user = "root";
$password = "";

// Definir DSN
$dsn = "mysql:host=$host;dbname=$dbname;charset=utf8mb4";

// Crear conexión con la base de datos
try {
    $conn = new PDO($dsn, $user, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'Error al conectar con la base de datos: ' . $e->getMessage();
    exit;
}
?>
