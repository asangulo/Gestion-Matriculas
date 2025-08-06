<?php
require_once __DIR__ . '/../config/db.php';

class Colegio {
    private $pdo;

    public function __construct() {
        global $pdo;
        $this->pdo = $pdo;
    }

    public function getAll() {
        $stmt = $this->pdo->query('SELECT * FROM colegio');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id) {
        $stmt = $this->pdo->prepare('SELECT * FROM colegio WHERE id = ?');
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($data) {
        $stmt = $this->pdo->prepare('INSERT INTO colegio (nombre, fk_ciudad, fk_sector) VALUES (?, ?, ?)');
        return $stmt->execute([
            $data['nombre'],
            $data['fk_ciudad'],
            $data['fk_sector']
        ]);
    }

    public function update($id, $data) {
        $stmt = $this->pdo->prepare('UPDATE colegio SET nombre = ?, fk_ciudad = ?, fk_sector = ? WHERE id = ?');
        return $stmt->execute([
            $data['nombre'],
            $data['fk_ciudad'],
            $data['fk_sector'],
            $id
        ]);
    }

    public function delete($id) {
        $stmt = $this->pdo->prepare('DELETE FROM colegio WHERE id = ?');
        return $stmt->execute([$id]);
    }

    /**
     * Obtiene el número total de colegios.
     * @return int Cantidad total de colegios.
     */
    public function getTotalCount() {
        $stmt = $this->pdo->query('SELECT COUNT(*) FROM colegio');
        return $stmt->fetchColumn();
    }
}
?>
