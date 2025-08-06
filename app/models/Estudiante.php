<?php
// Incluir el archivo de configuración de la base de datos
require_once __DIR__ . '/../config/db.php';

/**
 * Clase Estudiante
 * Maneja todas las operaciones relacionadas con los estudiantes en la base de datos
 */
class Estudiante {
    // Propiedad para almacenar la conexión a la base de datos
    private $pdo;

    /**
     * Constructor de la clase
     * Inicializa la conexión a la base de datos
     */
    public function __construct() {
        global $pdo;
        $this->pdo = $pdo;
    }

    /**
     * Obtiene todos los estudiantes de la base de datos
     * @return array Lista de todos los estudiantes
     */
    public function getAll() {
        try {
            // Para depuración
            error_log('Ejecutando getAll()');
            
            $stmt = $this->pdo->query('SELECT * FROM estudiante');
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            
            // Para depuración
            error_log('Resultado de la consulta: ' . print_r($result, true));
            
            return $result;
        } catch (PDOException $e) {
            error_log('Error en getAll: ' . $e->getMessage());
            return [];
        }
    }

    /**
     * Crea un nuevo estudiante en la base de datos
     * @param string $nombre Nombre del estudiante
     * @param int $edad Edad del estudiante
     * @return array ['success' => bool, 'message' => string, 'data' => array|null]
     */
    public function create($nombre, $edad) {
        try {
            // Validaciones
            if (empty($nombre)) {
                return ['success' => false, 'message' => 'El nombre es requerido', 'data' => null];
            }
            if (!is_numeric($edad) || $edad < 0 || $edad > 100) {
                return ['success' => false, 'message' => 'La edad debe ser un número válido entre 0 y 100', 'data' => null];
            }

            $stmt = $this->pdo->prepare('INSERT INTO estudiante (nombre, edad) VALUES (?, ?)');
            $stmt->execute([$nombre, $edad]);
            
            return [
                'success' => true,
                'message' => 'Estudiante creado exitosamente',
                'data' => ['id' => $this->pdo->lastInsertId()]
            ];
        } catch (PDOException $e) {
            error_log('Error al crear estudiante: ' . $e->getMessage());
            return ['success' => false, 'message' => 'Error al crear el estudiante', 'data' => null];
        }
    }

    /**
     * Actualiza los datos de un estudiante existente
     * @param int $id ID del estudiante a actualizar
     * @param string $nombre Nuevo nombre del estudiante
     * @param int $edad Nueva edad del estudiante
     * @return array ['success' => bool, 'message' => string, 'data' => array|null]
     */
    public function update($id, $nombre, $edad) {
        try {
            // Validaciones
            if (empty($nombre)) {
                return ['success' => false, 'message' => 'El nombre es requerido', 'data' => null];
            }
            if (!is_numeric($edad) || $edad < 0 || $edad > 100) {
                return ['success' => false, 'message' => 'La edad debe ser un número válido entre 0 y 100', 'data' => null];
            }
            if (!is_numeric($id) || $id <= 0) {
                return ['success' => false, 'message' => 'ID de estudiante inválido', 'data' => null];
            }

            // Verificar si el estudiante existe
            $stmt = $this->pdo->prepare('SELECT id FROM estudiante WHERE id = ?');
            $stmt->execute([$id]);
            if (!$stmt->fetch()) {
                return ['success' => false, 'message' => 'Estudiante no encontrado', 'data' => null];
            }

            $stmt = $this->pdo->prepare('UPDATE estudiante SET nombre = ?, edad = ? WHERE id = ?');
            $stmt->execute([$nombre, $edad, $id]);
            
            return [
                'success' => true,
                'message' => 'Estudiante actualizado exitosamente',
                'data' => ['id' => $id]
            ];
        } catch (PDOException $e) {
            error_log('Error al actualizar estudiante: ' . $e->getMessage());
            return ['success' => false, 'message' => 'Error al actualizar el estudiante', 'data' => null];
        }
    }

    /**
     * Elimina un estudiante de la base de datos
     * @param int $id ID del estudiante a eliminar
     * @return array ['success' => bool, 'message' => string]
     */
    public function delete($id) {
        try {
            if (!is_numeric($id) || $id <= 0) {
                return ['success' => false, 'message' => 'ID de estudiante inválido'];
            }

            // Verificar si el estudiante existe
            $stmt = $this->pdo->prepare('SELECT id FROM estudiante WHERE id = ?');
            $stmt->execute([$id]);
            if (!$stmt->fetch()) {
                return ['success' => false, 'message' => 'Estudiante no encontrado'];
            }

            $stmt = $this->pdo->prepare('DELETE FROM estudiante WHERE id = ?');
            $stmt->execute([$id]);
            
            return ['success' => true, 'message' => 'Estudiante eliminado exitosamente'];
        } catch (PDOException $e) {
            error_log('Error al eliminar estudiante: ' . $e->getMessage());
            return ['success' => false, 'message' => 'Error al eliminar el estudiante'];
        }
    }

    /**
     * Obtiene el número total de estudiantes.
     * @return int Cantidad total de estudiantes.
     */
    public function getTotalCount() {
        $stmt = $this->pdo->query('SELECT COUNT(*) FROM estudiante');
        return $stmt->fetchColumn();
    }

    /**
     * Obtiene un estudiante por su ID
     * @param int $id ID del estudiante
     * @return array|null Datos del estudiante o null si no existe
     */
    public function getById($id) {
        try {
            if (!is_numeric($id) || $id <= 0) {
                return null;
            }

            $stmt = $this->pdo->prepare('SELECT * FROM estudiante WHERE id = ?');
            $stmt->execute([$id]);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log('Error al obtener estudiante por ID: ' . $e->getMessage());
            return null;
        }
    }
}
?>