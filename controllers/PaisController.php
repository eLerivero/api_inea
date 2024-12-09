<?php
require_once './models/Pais.php';

class PaisController {
    private $paisModel;

    public function __construct($pdo) {
        $this->paisModel = new Pais($pdo);
    }

    public function listarPaises() {
        return $this->paisModel->obtenerPaises();
    }
}
?>
