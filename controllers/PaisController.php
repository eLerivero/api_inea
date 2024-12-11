<?php
require_once './models/Pais.php';

class PaisController
{
    private $paisModel;

    public function __construct($pdo)
    {
        $this->paisModel = new Pais($pdo);
    }

    public function listarPaises()
    {
        return $this->paisModel->obtenerPaises();
    }

    public function obtenerPais($id)
    {
        return $this->paisModel->obtenerPais($id);
    }

    public function insertarPais($data)
    {
        return $this->paisModel->insertarPais($data);
    }

    public function editarPais($data)
    {
        return $this->paisModel->editarPais($data);
    }

    public function eliminarPais($id)
    {
        return $this->paisModel->eliminarPais($id);
    }
}
