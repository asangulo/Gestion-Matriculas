<?php

require_once __DIR__ . '/../models/Estudiante.php';
require_once __DIR__ . '/../config/session.php';

class EstudianteController {
    private $estudiante;

    public function __construct() {
        $this->estudiante = new Estudiante();
    }

    /**
     * Muestra la lista de estudiantes
     */
    public function index() {
        try {
            error_log('EstudianteController::index() - Iniciando');
            $estudiantes = $this->estudiante->getAll();
            error_log('EstudianteController::index() - Estudiantes obtenidos: ' . print_r($estudiantes, true));
            $totalEstudiantes = $this->estudiante->getTotalCount();
            error_log('EstudianteController::index() - Total estudiantes: ' . $totalEstudiantes);
            
            ob_start();
            require_once __DIR__ . '/../views/estudiantes/index.php';
            $content = ob_get_clean();
            error_log('EstudianteController::index() - Vista renderizada correctamente');
            return $content;
        } catch (Exception $e) {
            error_log('Error en index de estudiantes: ' . $e->getMessage());
            error_log('Stack trace: ' . $e->getTraceAsString());
            setFlashMessage('error', 'Error al cargar la lista de estudiantes');
            header('Location: index.php?vista=dashboard');
            exit;
        }
    }

    /**
     * Muestra el formulario para crear un nuevo estudiante
     */
    public function createForm() {
        ob_start();
        require_once __DIR__ . '/../views/estudiantes/crear.php';
        $content = ob_get_clean();
        return $content;
    }

    /**
     * Procesa la creación de un nuevo estudiante
     */
    public function create() {
        try {
            error_log('EstudianteController::create() - Iniciando');
            error_log('EstudianteController::create() - Datos recibidos: ' . print_r($_POST, true));

            // Validar que los datos requeridos estén presentes
            if (!isset($_POST['nombre']) || !isset($_POST['edad'])) {
                setFlashMessage('error', 'Todos los campos son requeridos');
                error_log('EstudianteController::create() - Error de validación: campos requeridos faltantes');
                header('Location: index.php?vista=crear_estudiante');
                exit;
            }

            $nombre = $_POST['nombre'];
            $edad = $_POST['edad'];
            error_log('EstudianteController::create() - Intentando crear estudiante: Nombre=' . $nombre . ', Edad=' . $edad);
            
            $result = $this->estudiante->create($nombre, $edad);
            error_log('EstudianteController::create() - Resultado del modelo: ' . print_r($result, true));
            
            if ($result['success']) {
                setFlashMessage('success', $result['message']);
                error_log('EstudianteController::create() - Redireccionando a listar');
                header('Location: index.php?vista=listar');
            } else {
                setFlashMessage('error', $result['message']);
                error_log('EstudianteController::create() - Error al crear en el modelo: ' . $result['message']);
                header('Location: index.php?vista=crear_estudiante');
            }
        } catch (Exception $e) {
            error_log('Error al crear estudiante (Excepción): ' . $e->getMessage());
            error_log('Stack trace: ' . $e->getTraceAsString());
            setFlashMessage('error', 'Error al crear el estudiante');
            header('Location: index.php?vista=crear_estudiante');
        }
        exit;
    }

    /**
     * Muestra el formulario para editar un estudiante
     */
    public function editForm($id) {
        try {
            $estudiante = $this->estudiante->getById($id);
            if (!$estudiante) {
                setFlashMessage('error', 'Estudiante no encontrado');
                header('Location: index.php?vista=listar');
                exit;
            }
            ob_start();
            require_once __DIR__ . '/../views/estudiantes/edit.php';
            $content = ob_get_clean();
            return $content;
        } catch (Exception $e) {
            error_log('Error al cargar formulario de edición: ' . $e->getMessage());
            setFlashMessage('error', 'Error al cargar el formulario de edición');
            header('Location: index.php?vista=listar');
            exit;
        }
    }

    /**
     * Procesa la actualización de un estudiante
     */
    public function update($id) {
        try {
            // Validar que los datos requeridos estén presentes
            if (!isset($_POST['nombre']) || !isset($_POST['edad'])) {
                setFlashMessage('error', 'Todos los campos son requeridos');
                header('Location: index.php?vista=editar_estudiante&id=' . $id);
                exit;
            }

            $result = $this->estudiante->update($id, $_POST['nombre'], $_POST['edad']);
            
            if ($result['success']) {
                setFlashMessage('success', $result['message']);
                header('Location: index.php?vista=listar');
            } else {
                setFlashMessage('error', $result['message']);
                header('Location: index.php?vista=editar_estudiante&id=' . $id);
            }
        } catch (Exception $e) {
            error_log('Error al actualizar estudiante: ' . $e->getMessage());
            setFlashMessage('error', 'Error al actualizar el estudiante');
            header('Location: index.php?vista=editar_estudiante&id=' . $id);
        }
        exit;
    }

    /**
     * Procesa la eliminación de un estudiante
     */
    public function delete($id) {
        try {
            $result = $this->estudiante->delete($id);
            
            if ($result['success']) {
                setFlashMessage('success', $result['message']);
            } else {
                setFlashMessage('error', $result['message']);
            }
        } catch (Exception $e) {
            error_log('Error al eliminar estudiante: ' . $e->getMessage());
            setFlashMessage('error', 'Error al eliminar el estudiante');
        }
        
        header('Location: index.php?vista=listar');
        exit;
    }
}

?>

