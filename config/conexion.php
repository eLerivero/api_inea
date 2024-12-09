<?php
$host = '127.0.0.1'; // IP del servidor de BD
$db = 'api'; // Nombre de la base de datos
$user = 'postgres'; // Usuario
$password = '12345678'; // Contraseña

try {
    // Crear una conexión a la base de datos
    $pdo = new PDO("pgsql:host=$host;dbname=$db", $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo json_encode(["error" => "Error en la conexión: " . $e->getMessage()]);
    exit;
}
?>