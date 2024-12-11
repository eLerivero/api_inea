<?php
header("Content-Type: application/json");
header("Cache-Control: no-cache");
header("Access-Control-Allow-Origin: *"); // Permitir CORS
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE"); // Métodos permitidos
header("Access-Control-Allow-Headers: Content-Type");

require_once './config/conexion.php';
require_once './controllers/PaisController.php';

$paisController = new PaisController($pdo);

// Verificar el método de la solicitud
switch ($_SERVER['REQUEST_METHOD']) {
    case 'GET':
        if (isset($_GET['id'])) {
            // Consultar un país específico
            $pais = $paisController->obtenerPais($_GET['id']);
            echo json_encode($pais);
        } else {
            // Listar todos los países
            $paises = $paisController->listarPaises();
            echo json_encode($paises);
        }
        break;

    case 'POST':
        // Agregar un nuevo país
        $data = json_decode(file_get_contents("php://input"), true);
        $resultado = $paisController->insertarPais($data);
        echo json_encode($resultado);
        break;

    case 'PUT':
        // Editar un país existente
        $data = json_decode(file_get_contents("php://input"), true);
        $resultado = $paisController->editarPais($data);
        echo json_encode($resultado);
        break;

    case 'DELETE':
        // Eliminar un país
        $data = json_decode(file_get_contents("php://input"), true);
        $resultado = $paisController->eliminarPais($data['id']);
        echo json_encode($resultado);
        break;

    default:
        echo json_encode(["error" => "Método no permitido"]);
        break;
}
