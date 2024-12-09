<?php

header("Content-Type: application/json");
header("Cache-Control: no-cache");

require_once './config/conexion.php'; // Asegúrate de que esta ruta sea correcta
require_once './controllers/PaisController.php';

$paisController = new PaisController($pdo);
$paises = $paisController->listarPaises();

echo json_encode($paises);
?>
