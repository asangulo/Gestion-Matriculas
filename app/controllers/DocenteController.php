<?php
require_once __DIR__ . '/../models/Docente.php';
require_once __DIR__ . '/../config/session.php';

class DocenteController {
    private $docenteModel;

    public function __construct() {
        $this->docenteModel = new Docente();
    }

    public function index() {
        $docentes = $this->docenteModel->getAll();
        $content = ''; // Inicializamos content para la vista
        ob_start(); // Iniciar buffer de salida
        include __DIR__ . '/../views/docentes/index.php';
        $content = ob_get_clean(); // Obtener contenido del buffer
        return $content; // Retornar el contenido
    }

    public function createForm() {
        $content = ''; // Inicializamos content para la vista
        ob_start(); // Iniciar buffer de salida
        include __DIR__ . '/../views/docentes/create.php';
        $content = ob_get_clean(); // Obtener contenido del buffer
        return $content; // Retornar el contenido
    }

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nombre = trim($_POST['nombre'] ?? '');
            $especialidad = trim($_POST['especialidad'] ?? '');

            if (empty($nombre) || empty($especialidad)) {
                setFlashMessage('error', 'Todos los campos son obligatorios.');
                header('Location: index.php?vista=crear_docente');
                exit;
            }

            $data = [
                'nombre' => $nombre,
                'especialidad' => $especialidad
            ];

            try {
                $this->docenteModel->create($data);
                setFlashMessage('success', 'Docente creado exitosamente.');
                header('Location: index.php?vista=listar_docentes');
                exit;
            } catch (PDOException $e) {
                setFlashMessage('error', 'Error al crear el docente: ' . $e->getMessage());
                header('Location: index.php?vista=crear_docente');
                exit;
            }
        }
    }

    public function editForm($id) {
        $docente = $this->docenteModel->getById($id);
        if (!$docente) {
            setFlashMessage('error', 'Docente no encontrado.');
            header('Location: index.php?vista=listar_docentes');
            exit;
        }
        $content = ''; // Inicializamos content para la vista
        ob_start(); // Iniciar buffer de salida
        include __DIR__ . '/../views/docentes/edit.php';
        $content = ob_get_clean(); // Obtener contenido del buffer
        return $content; // Retornar el contenido
    }

    public function update($id) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nombre = trim($_POST['nombre'] ?? '');
            $especialidad = trim($_POST['especialidad'] ?? '');

            if (empty($nombre) || empty($especialidad)) {
                setFlashMessage('error', 'Todos los campos son obligatorios.');
                header('Location: index.php?vista=editar_docente&id=' . $id);
                exit;
            }

            $data = [
                'nombre' => $nombre,
                'especialidad' => $especialidad
            ];

            try {
                $this->docenteModel->update($id, $data);
                setFlashMessage('success', 'Docente actualizado exitosamente.');
                header('Location: index.php?vista=listar_docentes');
                exit;
            } catch (PDOException $e) {
                setFlashMessage('error', 'Error al actualizar el docente: ' . $e->getMessage());
                header('Location: index.php?vista=editar_docente&id=' . $id);
                exit;
            }
        }
    }

    public function delete($id) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            try {
                $this->docenteModel->delete($id);
                setFlashMessage('success', 'Docente eliminado exitosamente.');
                header('Location: index.php?vista=listar_docentes');
                exit;
            } catch (PDOException $e) {
                setFlashMessage('error', 'Error al eliminar el docente: ' . $e->getMessage());
                header('Location: index.php?vista=listar_docentes');
                exit;
            }
        }
    }
}
?>
