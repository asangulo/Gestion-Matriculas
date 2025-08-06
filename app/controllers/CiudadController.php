<?php
require_once __DIR__ . '/../models/Ciudad.php';
require_once __DIR__ . '/../config/session.php';

class CiudadController {
    private $ciudadModel;

    public function __construct() {
        $this->ciudadModel = new Ciudad();
    }

    public function index() {
        $ciudades = $this->ciudadModel->getAll();
        $content = ''; // Inicializamos content para la vista
        ob_start(); // Iniciar buffer de salida
        include __DIR__ . '/../views/ciudades/index.php';
        $content = ob_get_clean(); // Obtener contenido del buffer
        require_once __DIR__ . '/../views/layouts/main.php';
    }

    public function createForm() {
        $content = ''; // Inicializamos content para la vista
        ob_start(); // Iniciar buffer de salida
        include __DIR__ . '/../views/ciudades/create.php';
        $content = ob_get_clean(); // Obtener contenido del buffer
        require_once __DIR__ . '/../views/layouts/main.php';
    }

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nombre = trim($_POST['nombre'] ?? '');

            if (empty($nombre)) {
                setFlashMessage('error', 'El nombre de la ciudad es obligatorio.');
                header('Location: index.php?vista=crear_ciudad');
                exit;
            }

            $data = [
                'nombre' => $nombre
            ];

            try {
                $this->ciudadModel->create($data);
                setFlashMessage('success', 'Ciudad creada exitosamente.');
                header('Location: index.php?vista=listar_ciudades');
                exit;
            } catch (PDOException $e) {
                setFlashMessage('error', 'Error al crear la ciudad: ' . $e->getMessage());
                header('Location: index.php?vista=crear_ciudad');
                exit;
            }
        }
    }

    public function editForm($id) {
        $ciudad = $this->ciudadModel->getById($id);
        if (!$ciudad) {
            setFlashMessage('error', 'Ciudad no encontrada.');
            header('Location: index.php?vista=listar_ciudades');
            exit;
        }
        $content = ''; // Inicializamos content para la vista
        ob_start(); // Iniciar buffer de salida
        include __DIR__ . '/../views/ciudades/edit.php';
        $content = ob_get_clean(); // Obtener contenido del buffer
        require_once __DIR__ . '/../views/layouts/main.php';
    }

    public function update($id) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nombre = trim($_POST['nombre'] ?? '');

            if (empty($nombre)) {
                setFlashMessage('error', 'El nombre de la ciudad es obligatorio.');
                header('Location: index.php?vista=editar_ciudad&id=' . $id);
                exit;
            }

            $data = [
                'nombre' => $nombre
            ];

            try {
                $this->ciudadModel->update($id, $data);
                setFlashMessage('success', 'Ciudad actualizada exitosamente.');
                header('Location: index.php?vista=listar_ciudades');
                exit;
            } catch (PDOException $e) {
                setFlashMessage('error', 'Error al actualizar la ciudad: ' . $e->getMessage());
                header('Location: index.php?vista=editar_ciudad&id=' . $id);
                exit;
            }
        }
    }

    public function delete($id) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            try {
                $this->ciudadModel->delete($id);
                setFlashMessage('success', 'Ciudad eliminada exitosamente.');
                header('Location: index.php?vista=listar_ciudades');
                exit;
            } catch (PDOException $e) {
                setFlashMessage('error', 'Error al eliminar la ciudad: ' . $e->getMessage());
                header('Location: index.php?vista=listar_ciudades');
                exit;
            }
        }
    }
}
?> 