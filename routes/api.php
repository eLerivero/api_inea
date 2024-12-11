<?php
header("Content-Type: application/json");
header("Cache-Control: no-cache");
header("Access-Control-Allow-Origin: *"); // Permitir CORS
header("Access-Control-Allow-Methods: GET"); // Métodos permitidos
header("Access-Control-Allow-Headers: Content-Type");

// Incluir la conexión y el controlador
require_once './config/conexion.php'; // Asegúrate de que esta ruta sea correcta
require_once './controllers/PaisController.php';

// Crear una instancia del controlador
$paisController = new PaisController($pdo);

// Verificar el método de la solicitud
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $paises = $paisController->listarPaises();
    echo json_encode($paises);
} else {
    echo json_encode(["error" => "Método no permitido"]);
}
?>
