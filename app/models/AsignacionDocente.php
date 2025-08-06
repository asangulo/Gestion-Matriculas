<?php
require_once __DIR__ . '/../config/db.php';

class AsignacionDocente {
    private $pdo;

    public function __construct() {
        global $pdo;
        $this->pdo = $pdo;
    }

    public function getAll() {
        try {
            $stmt = $this->pdo->query('SELECT * FROM asignacion_docente');
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log('Error al obtener asignaciones: ' . $e->getMessage());
            return [];
        }
    }

    public function getById($id) {
        try {
            $stmt = $this->pdo->prepare('SELECT * FROM asignacion_docente WHERE id = ?');
            $stmt->execute([$id]);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log('Error al obtener asignación por ID: ' . $e->getMessage());
            return false;
        }
    }

    public function create($data) {
        try {
            // Verificar si ya existe una asignación similar
            $stmt = $this->pdo->prepare('
                SELECT COUNT(*) FROM asignacion_docente 
                WHERE id_docente = ? AND id_colegio = ? AND grado = ? AND grupo = ? AND periodo = ? AND dia_semana = ?
            ');
            $stmt->execute([
                $data['id_docente'],
                $data['id_colegio'],
                $data['grado'],
                $data['grupo'],
                $data['periodo'],
                $data['dia_semana']
            ]);
            
            if ($stmt->fetchColumn() > 0) {
                throw new Exception('Ya existe una asignación similar para este docente.');
            }

            // Insertar la nueva asignación
            $stmt = $this->pdo->prepare('
                INSERT INTO asignacion_docente 
                (id_docente, id_colegio, grado, grupo, periodo, dia_semana) 
                VALUES (?, ?, ?, ?, ?, ?)
            ');
            
            return $stmt->execute([
                $data['id_docente'],
                $data['id_colegio'],
                $data['grado'],
                $data['grupo'] ?? null,
                $data['periodo'],
                $data['dia_semana']
            ]);
        } catch (PDOException $e) {
            error_log('Error al crear asignación: ' . $e->getMessage());
            throw new Exception('Error al crear la asignación: ' . $e->getMessage());
        }
    }

    public function update($id, $data) {
        try {
            // Verificar si ya existe una asignación similar (excluyendo la actual)
            $stmt = $this->pdo->prepare('
                SELECT COUNT(*) FROM asignacion_docente 
                WHERE id_docente = ? AND id_colegio = ? AND grado = ? AND grupo = ? AND periodo = ? AND dia_semana = ?
                AND id != ?
            ');
            $stmt->execute([
                $data['id_docente'],
                $data['id_colegio'],
                $data['grado'],
                $data['grupo'],
                $data['periodo'],
                $data['dia_semana'],
                $id
            ]);
            
            if ($stmt->fetchColumn() > 0) {
                throw new Exception('Ya existe una asignación similar para este docente.');
            }

            // Actualizar la asignación
            $stmt = $this->pdo->prepare('
                UPDATE asignacion_docente 
                SET id_docente = ?, id_colegio = ?, grado = ?, grupo = ?, periodo = ?, dia_semana = ? 
                WHERE id = ?
            ');
            
            return $stmt->execute([
                $data['id_docente'],
                $data['id_colegio'],
                $data['grado'],
                $data['grupo'] ?? null,
                $data['periodo'],
                $data['dia_semana'],
                $id
            ]);
        } catch (PDOException $e) {
            error_log('Error al actualizar asignación: ' . $e->getMessage());
            throw new Exception('Error al actualizar la asignación: ' . $e->getMessage());
        }
    }

    public function delete($id) {
        try {
            $stmt = $this->pdo->prepare('DELETE FROM asignacion_docente WHERE id = ?');
            return $stmt->execute([$id]);
        } catch (PDOException $e) {
            error_log('Error al eliminar asignación: ' . $e->getMessage());
            throw new Exception('Error al eliminar la asignación: ' . $e->getMessage());
        }
    }

    /**
     * Obtiene el número total de asignaciones de docentes.
     * @return int Cantidad total de asignaciones de docentes.
     */
    public function getTotalCount() {
        try {
            $stmt = $this->pdo->query('SELECT COUNT(*) FROM asignacion_docente');
            return $stmt->fetchColumn();
        } catch (PDOException $e) {
            error_log('Error al obtener conteo de asignaciones: ' . $e->getMessage());
            return 0;
        }
    }
} 