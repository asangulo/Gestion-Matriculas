<?php
require_once __DIR__ . '/../models/AsignacionDocente.php';
require_once __DIR__ . '/../models/Docente.php';
require_once __DIR__ . '/../models/Colegio.php';
require_once __DIR__ . '/../config/session.php';

class AsignacionDocenteController {
    private $asignacionDocenteModel;
    private $docenteModel;
    private $colegioModel;

    public function __construct() {
        $this->asignacionDocenteModel = new AsignacionDocente();
        $this->docenteModel = new Docente();
        $this->colegioModel = new Colegio();
    }

    public function index() {
        $asignaciones = $this->asignacionDocenteModel->getAll();
        // Obtener nombres de docente y colegio para mostrar en la tabla
        foreach ($asignaciones as &$asignacion) {
            $docente = $this->docenteModel->getById($asignacion['id_docente']);
            $colegio = $this->colegioModel->getById($asignacion['id_colegio']);
            $asignacion['nombre_docente'] = $docente['nombre'] ?? 'N/A';
            $asignacion['nombre_colegio'] = $colegio['nombre'] ?? 'N/A';
        }
        $content = ''; // Inicializamos content para la vista
        ob_start(); // Iniciar buffer de salida
        include __DIR__ . '/../views/asignaciones_docente/index.php';
        $content = ob_get_clean(); // Obtener contenido del buffer
        require_once __DIR__ . '/../views/layouts/main.php';
    }

    public function createForm() {
        $docentes_disponibles = $this->docenteModel->getAll();
        $colegios_disponibles = $this->colegioModel->getAll();
        $content = ''; // Inicializamos content para la vista
        ob_start(); // Iniciar buffer de salida
        include __DIR__ . '/../views/asignaciones_docente/create.php';
        $content = ob_get_clean(); // Obtener contenido del buffer
        require_once __DIR__ . '/../views/layouts/main.php';
    }

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            try {
                // Validar y limpiar los datos de entrada
                $id_docente = filter_input(INPUT_POST, 'id_docente', FILTER_VALIDATE_INT);
                $id_colegio = filter_input(INPUT_POST, 'id_colegio', FILTER_VALIDATE_INT);
                $grado = trim($_POST['grado'] ?? '');
                $grupo = trim($_POST['grupo'] ?? '');
                $periodo = trim($_POST['periodo'] ?? '');
                $dia_semana = trim($_POST['dia_semana'] ?? '');

                // Validar que los campos requeridos no estén vacíos
                if (!$id_docente || !$id_colegio || empty($grado) || empty($periodo) || empty($dia_semana)) {
                    throw new Exception('Todos los campos obligatorios deben ser llenados.');
                }

                // Validar que el docente y el colegio existan
                if (!$this->docenteModel->getById($id_docente)) {
                    throw new Exception('El docente seleccionado no existe.');
                }
                if (!$this->colegioModel->getById($id_colegio)) {
                    throw new Exception('El colegio seleccionado no existe.');
                }

                $data = [
                    'id_docente' => $id_docente,
                    'id_colegio' => $id_colegio,
                    'grado' => $grado,
                    'grupo' => $grupo,
                    'periodo' => $periodo,
                    'dia_semana' => $dia_semana
                ];

                // Intentar crear la asignación
                if ($this->asignacionDocenteModel->create($data)) {
                    setFlashMessage('success', 'Asignación de docente creada exitosamente.');
                    header('Location: index.php?vista=listar_asignaciones_docente');
                    exit;
                } else {
                    throw new Exception('Error al crear la asignación.');
                }
            } catch (Exception $e) {
                setFlashMessage('error', 'Error al crear la asignación: ' . $e->getMessage());
                header('Location: index.php?vista=crear_asignacion_docente');
                exit;
            }
        }
    }

    public function editForm($id) {
        $asignacion = $this->asignacionDocenteModel->getById($id);
        if (!$asignacion) {
            setFlashMessage('error', 'Asignación de docente no encontrada.');
            header('Location: index.php?vista=listar_asignaciones_docente');
            exit;
        }
        $docentes_disponibles = $this->docenteModel->getAll();
        $colegios_disponibles = $this->colegioModel->getAll();
        $content = ''; // Inicializamos content para la vista
        ob_start(); // Iniciar buffer de salida
        include __DIR__ . '/../views/asignaciones_docente/edit.php';
        $content = ob_get_clean(); // Obtener contenido del buffer
        require_once __DIR__ . '/../views/layouts/main.php';
    }

    public function update($id) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            try {
                // Validar y limpiar los datos de entrada
                $id_docente = filter_input(INPUT_POST, 'id_docente', FILTER_VALIDATE_INT);
                $id_colegio = filter_input(INPUT_POST, 'id_colegio', FILTER_VALIDATE_INT);
                $grado = trim($_POST['grado'] ?? '');
                $grupo = trim($_POST['grupo'] ?? '');
                $periodo = trim($_POST['periodo'] ?? '');
                $dia_semana = trim($_POST['dia_semana'] ?? '');

                // Validar que los campos requeridos no estén vacíos
                if (!$id_docente || !$id_colegio || empty($grado) || empty($periodo) || empty($dia_semana)) {
                    throw new Exception('Todos los campos obligatorios deben ser llenados.');
                }

                // Validar que el docente y el colegio existan
                if (!$this->docenteModel->getById($id_docente)) {
                    throw new Exception('El docente seleccionado no existe.');
                }
                if (!$this->colegioModel->getById($id_colegio)) {
                    throw new Exception('El colegio seleccionado no existe.');
                }

                $data = [
                    'id_docente' => $id_docente,
                    'id_colegio' => $id_colegio,
                    'grado' => $grado,
                    'grupo' => $grupo,
                    'periodo' => $periodo,
                    'dia_semana' => $dia_semana
                ];

                // Intentar actualizar la asignación
                if ($this->asignacionDocenteModel->update($id, $data)) {
                    setFlashMessage('success', 'Asignación de docente actualizada exitosamente.');
                    header('Location: index.php?vista=listar_asignaciones_docente');
                    exit;
                } else {
                    throw new Exception('Error al actualizar la asignación.');
                }
            } catch (Exception $e) {
                setFlashMessage('error', 'Error al actualizar la asignación: ' . $e->getMessage());
                header('Location: index.php?vista=editar_asignacion_docente&id=' . $id);
                exit;
            }
        }
    }

    public function delete($id) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            try {
                if ($this->asignacionDocenteModel->delete($id)) {
                    setFlashMessage('success', 'Asignación de docente eliminada exitosamente.');
                } else {
                    throw new Exception('Error al eliminar la asignación.');
                }
            } catch (Exception $e) {
                setFlashMessage('error', 'Error al eliminar la asignación: ' . $e->getMessage());
            }
            header('Location: index.php?vista=listar_asignaciones_docente');
            exit;
        }
    }
}
?> 