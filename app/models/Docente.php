<?php
require_once __DIR__ . '/../config/db.php';

class Docente {
    private $pdo;

    public function __construct() {
        global $pdo;
        $this->pdo = $pdo;
    }

    public function getAll() {
        $stmt = $this->pdo->query('SELECT * FROM docente');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id) {
        $stmt = $this->pdo->prepare('SELECT * FROM docente WHERE id = ?');
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($data) {
        $stmt = $this->pdo->prepare('INSERT INTO docente (nombre, especialidad) VALUES (?, ?)');
        return $stmt->execute([
            $data['nombre'],
            $data['especialidad']
        ]);
    }

    public function update($id, $data) {
        $stmt = $this->pdo->prepare('UPDATE docente SET nombre = ?, especialidad = ? WHERE id = ?');
        return $stmt->execute([
            $data['nombre'],
            $data['especialidad'],
            $id
        ]);
    }

    public function delete($id) {
        $stmt = $this->pdo->prepare('DELETE FROM docente WHERE id = ?');
        return $stmt->execute([$id]);
    }

    /**
     * Obtiene el número total de docentes.
     * @return int Cantidad total de docentes.
     */
    public function getTotalCount() {
        $stmt = $this->pdo->query('SELECT COUNT(*) FROM docente');
        return $stmt->fetchColumn();
    }
}
?>
