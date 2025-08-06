<?php
require_once __DIR__ . '/../config/db.php';

class Ciudad {
    private $pdo;

    public function __construct() {
        global $pdo;
        $this->pdo = $pdo;
    }

    public function getAll() {
        $stmt = $this->pdo->query('SELECT * FROM ciudad');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id) {
        $stmt = $this->pdo->prepare('SELECT * FROM ciudad WHERE id = ?');
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($data) {
        $stmt = $this->pdo->prepare('INSERT INTO ciudad (nombre) VALUES (?)');
        return $stmt->execute([
            $data['nombre']
        ]);
    }

    public function update($id, $data) {
        $stmt = $this->pdo->prepare('UPDATE ciudad SET nombre = ? WHERE id = ?');
        return $stmt->execute([
            $data['nombre'],
            $id
        ]);
    }

    public function delete($id) {
        $stmt = $this->pdo->prepare('DELETE FROM ciudad WHERE id = ?');
        return $stmt->execute([$id]);
    }

    /**
     * Obtiene el número total de ciudades.
     * @return int Cantidad total de ciudades.
     */
    public function getTotalCount() {
        $stmt = $this->pdo->query('SELECT COUNT(*) FROM ciudad');
        return $stmt->fetchColumn();
    }
}
?> 