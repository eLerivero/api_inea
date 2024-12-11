<?php
class Pais
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function obtenerPaises()
    {
        $sql = "SELECT * FROM paises";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function obtenerPais($id)
    {
        $sql = "SELECT * FROM paises WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC); // Devuelve un solo país
    }

    public function insertarPais($data)
    {
        $sql = "INSERT INTO paises (nombre, siglas) VALUES (:nombre, :siglas)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':nombre', $data['nombre']);
        $stmt->bindParam(':siglas', $data['siglas']);
        return $stmt->execute() ? ["mensaje" => "País agregado"] : ["error" => "Error al agregar el país"];
    }

    public function editarPais($data)
    {
        $sql = "UPDATE paises SET nombre = :nombre, siglas = :siglas WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':nombre', $data['nombre']);
        $stmt->bindParam(':siglas', $data['siglas']);
        $stmt->bindParam(':id', $data['id']);
        return $stmt->execute() ? ["mensaje" => "País actualizado"] : ["error" => "Error al actualizar el país"];
    }

    public function eliminarPais($id)
    {
        $sql = "DELETE FROM paises WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':id', $id);
        return $stmt->execute() ? ["mensaje" => "País eliminado"] : ["error" => "Error al eliminar el país"];
    }
}
