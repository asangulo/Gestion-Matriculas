<?php
require_once __DIR__ . '/../config/db.php';

class Sector {
    private $pdo;

    public function __construct() {
        global $pdo;
        $this->pdo = $pdo;
    }

    public function getAll() {
        $stmt = $this->pdo->query('SELECT * FROM sector');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id) {
        $stmt = $this->pdo->prepare('SELECT * FROM sector WHERE id = ?');
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    /**
     * Crea un nuevo sector.
     * @param array $data Un array asociativo con los datos del sector (ej. ['tipo' => 'Sector Tipo']).
     * @return bool True en caso de éxito, false en caso de error.
     */
    public function create($data) {
        $stmt = $this->pdo->prepare('INSERT INTO sector (tipo) VALUES (?)');
        return $stmt->execute([
            $data['tipo']
        ]);
    }

    /**
     * Actualiza un sector existente.
     * @param int $id El ID del sector a actualizar.
     * @param array $data Un array asociativo con los nuevos datos del sector (ej. ['tipo' => 'Nuevo Sector Tipo']).
     * @return bool True en caso de éxito, false en caso de error.
     */
    public function update($id, $data) {
        $stmt = $this->pdo->prepare('UPDATE sector SET tipo = ? WHERE id = ?');
        return $stmt->execute([
            $data['tipo'],
            $id
        ]);
    }

    public function delete($id) {
        $stmt = $this->pdo->prepare('DELETE FROM sector WHERE id = ?');
        return $stmt->execute([$id]);
    }

    /**
     * Obtiene el número total de sectores.
     * @return int Cantidad total de sectores.
     */
    public function getTotalCount() {
        $stmt = $this->pdo->query('SELECT COUNT(*) FROM sector');
        return $stmt->fetchColumn();
    }
}
?> 