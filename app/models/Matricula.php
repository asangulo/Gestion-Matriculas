<?php
require_once __DIR__ . '/../config/db.php';

class Matricula {
    private $pdo;

    public function __construct() {
        global $pdo;
        $this->pdo = $pdo;
    }

    public function getAll() {
        $stmt = $this->pdo->query('SELECT m.*, e.nombre AS nombre_estudiante, c.nombre AS nombre_colegio 
                                FROM matricula m 
                                JOIN estudiante e ON m.id_estudiante = e.id
                                JOIN colegio c ON m.id_colegio = c.id');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id) {
        $stmt = $this->pdo->prepare('SELECT * FROM matricula WHERE id = ?');
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($data) {
        $stmt = $this->pdo->prepare('INSERT INTO matricula (id_estudiante, id_colegio, grado, grupo, fecha, periodo) VALUES (?, ?, ?, ?, ?, ?)');
        return $stmt->execute([
            $data['id_estudiante'],
            $data['id_colegio'],
            $data['grado'],
            $data['grupo'],
            $data['fecha'],
            $data['periodo']
        ]);
    }

    public function update($id, $data) {
        $stmt = $this->pdo->prepare('UPDATE matricula SET id_estudiante = ?, id_colegio = ?, grado = ?, grupo = ?, fecha = ?, periodo = ? WHERE id = ?');
        return $stmt->execute([
            $data['id_estudiante'],
            $data['id_colegio'],
            $data['grado'],
            $data['grupo'],
            $data['fecha'],
            $data['periodo'],
            $id
        ]);
    }

    public function delete($id) {
        $stmt = $this->pdo->prepare('DELETE FROM matricula WHERE id = ?');
        return $stmt->execute([$id]);
    }

    /**
     * Obtiene el número total de matrículas.
     * @return int Cantidad total de matrículas.
     */
    public function getTotalCount() {
        $stmt = $this->pdo->query('SELECT COUNT(*) FROM matricula');
        return $stmt->fetchColumn();
    }

    /**
     * Consulta la cantidad de estudiantes por grado, colegio y año.
     * @return array Un array de resultados con grado, fecha, nombre_colegio y cantidad_estudiantes.
     */
    public function getEstudiantesPorGradoColegioAnio() {
        $sql = "
            SELECT
                m.grado,
                m.fecha,
                c.nombre AS nombre_colegio,
                COUNT(DISTINCT m.id_estudiante) AS cantidad_estudiantes
            FROM
                matricula m
            JOIN
                colegio c ON m.id_colegio = c.id
            GROUP BY
                m.grado, m.fecha, c.nombre
            ORDER BY
                c.nombre, m.fecha DESC, m.grado ASC;
        ";
        $stmt = $this->pdo->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
