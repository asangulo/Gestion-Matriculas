<?php

require_once __DIR__ . '/../models/Matricula.php';
require_once __DIR__ . '/../models/Estudiante.php';
require_once __DIR__ . '/../models/Colegio.php';
require_once __DIR__ . '/../config/session.php';

class MatriculaController {
    private $matricula;
    private $estudiante;
    private $colegio;

    public function __construct() {
        $this->matricula = new Matricula();
        $this->estudiante = new Estudiante();
        $this->colegio = new Colegio();
    }

    /**
     * Muestra la lista de matrículas
     */
    public function index() {
        try {
            error_log('MatriculaController::index() - Iniciando');
            $matriculas = $this->matricula->getAll();
            error_log('MatriculaController::index() - Matrículas obtenidas: ' . print_r($matriculas, true));
            $totalMatriculas = $this->matricula->getTotalCount();
            error_log('MatriculaController::index() - Total matrículas: ' . $totalMatriculas);
            
            ob_start();
            require_once __DIR__ . '/../views/matriculas/index.php';
            $content = ob_get_clean();
            error_log('MatriculaController::index() - Vista renderizada correctamente');
            return $content;
        } catch (Exception $e) {
            error_log('Error en index de matrículas: ' . $e->getMessage());
            error_log('Stack trace: ' . $e->getTraceAsString());
            setFlashMessage('error', 'Error al obtener la lista de matrículas: ' . $e->getMessage());
            header('Location: index.php?vista=dashboard');
            exit;
        }
    }

    /**
     * Muestra el formulario para crear una nueva matrícula
     */
    public function createForm() {
        try {
            $estudiantes = $this->estudiante->getAll();
            $colegios = $this->colegio->getAll();
            ob_start();
            require_once __DIR__ . '/../views/matriculas/crear.php';
            $content = ob_get_clean();
            return $content;
        } catch (Exception $e) {
            error_log('Error al cargar formulario de creación: ' . $e->getMessage());
            setFlashMessage('error', 'Error al cargar el formulario de creación: ' . $e->getMessage());
            header('Location: index.php?vista=listar_matriculas');
            exit;
        }
    }

    /**
     * Procesa la creación de una nueva matrícula
     */
    public function create() {
        try {
            $id_estudiante = $_POST['id_estudiante'] ?? '';
            $id_colegio = $_POST['id_colegio'] ?? '';
            $grado = $_POST['grado'] ?? '';
            $grupo = $_POST['grupo'] ?? '';
            $fecha = $_POST['fecha'] ?? '';
            $periodo = $_POST['periodo'] ?? '';

            if (empty($id_estudiante) || empty($id_colegio) || empty($grado) || empty($fecha) || empty($periodo)) {
                setFlashMessage('error', 'Todos los campos son requeridos');
                header('Location: index.php?vista=crear_matricula');
                exit;
            }

            $data = [
                'id_estudiante' => $id_estudiante,
                'id_colegio' => $id_colegio,
                'grado' => $grado,
                'grupo' => $grupo,
                'fecha' => $fecha,
                'periodo' => $periodo
            ];

            $resultado = $this->matricula->create($data);

            if ($resultado) {
                setFlashMessage('success', 'Matrícula creada exitosamente');
            } else {
                setFlashMessage('error', 'Error al crear la matrícula');
            }
        } catch (Exception $e) {
            error_log('Error al crear matrícula: ' . $e->getMessage());
            setFlashMessage('error', 'Error al crear la matrícula: ' . $e->getMessage());
        }

        header('Location: index.php?vista=listar_matriculas');
        exit;
    }

    /**
     * Muestra el formulario para editar una matrícula
     */
    public function editForm($id) {
        try {
            $matricula = $this->matricula->getById($id);
            if (!$matricula) {
                setFlashMessage('error', 'Matrícula no encontrada');
                header('Location: index.php?vista=listar_matriculas');
                exit;
            }
            
            $estudiantes = $this->estudiante->getAll();
            $colegios = $this->colegio->getAll();
            
            ob_start();
            require_once __DIR__ . '/../views/matriculas/edit.php';
            $content = ob_get_clean();
            return $content;
        } catch (Exception $e) {
            error_log('Error al cargar formulario de edición: ' . $e->getMessage());
            setFlashMessage('error', 'Error al cargar el formulario de edición: ' . $e->getMessage());
            header('Location: index.php?vista=listar_matriculas');
            exit;
        }
    }

    /**
     * Procesa la actualización de una matrícula
     */
    public function update($id) {
        try {
            $id_estudiante = $_POST['id_estudiante'] ?? '';
            $id_colegio = $_POST['id_colegio'] ?? '';
            $grado = $_POST['grado'] ?? '';
            $grupo = $_POST['grupo'] ?? '';
            $fecha = $_POST['fecha'] ?? '';
            $periodo = $_POST['periodo'] ?? '';

            if (empty($id_estudiante) || empty($id_colegio) || empty($grado) || empty($fecha) || empty($periodo)) {
                setFlashMessage('error', 'Todos los campos son requeridos');
                header('Location: index.php?vista=editar_matricula&id=' . $id);
                exit;
            }

            $data = [
                'id_estudiante' => $id_estudiante,
                'id_colegio' => $id_colegio,
                'grado' => $grado,
                'grupo' => $grupo,
                'fecha' => $fecha,
                'periodo' => $periodo
            ];

            $resultado = $this->matricula->update($id, $data);

            if ($resultado) {
                setFlashMessage('success', 'Matrícula actualizada exitosamente');
            } else {
                setFlashMessage('error', 'Error al actualizar la matrícula');
            }
        } catch (Exception $e) {
            error_log('Error al actualizar matrícula: ' . $e->getMessage());
            setFlashMessage('error', 'Error al actualizar la matrícula: ' . $e->getMessage());
        }

        header('Location: index.php?vista=listar_matriculas');
        exit;
    }

    /**
     * Procesa la eliminación de una matrícula
     */
    public function delete($id) {
        try {
            $resultado = $this->matricula->delete($id);
            
            if ($resultado) {
                setFlashMessage('success', 'Matrícula eliminada exitosamente');
            } else {
                setFlashMessage('error', 'Error al eliminar la matrícula');
            }
        } catch (Exception $e) {
            error_log('Error al eliminar matrícula: ' . $e->getMessage());
            setFlashMessage('error', 'Error al eliminar la matrícula: ' . $e->getMessage());
        }
        
        header('Location: index.php?vista=listar_matriculas');
        exit;
    }
}
