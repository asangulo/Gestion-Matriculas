<?php
require_once __DIR__ . '/../models/Sector.php';
require_once __DIR__ . '/../config/session.php';

class SectorController {
    private $sectorModel;

    public function __construct() {
        $this->sectorModel = new Sector();
    }

    public function index() {
        $sectores = $this->sectorModel->getAll();
        $content = ''; // Inicializamos content para la vista
        ob_start(); // Iniciar buffer de salida
        include __DIR__ . '/../views/sectores/index.php';
        $content = ob_get_clean(); // Obtener contenido del buffer
        require_once __DIR__ . '/../views/layouts/main.php';
    }

    public function createForm() {
        $content = ''; // Inicializamos content para la vista
        ob_start(); // Iniciar buffer de salida
        include __DIR__ . '/../views/sectores/create.php';
        $content = ob_get_clean(); // Obtener contenido del buffer
        require_once __DIR__ . '/../views/layouts/main.php';
    }

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $tipo = trim($_POST['tipo'] ?? '');

            if (empty($tipo)) {
                setFlashMessage('error', 'El tipo de sector es obligatorio.');
                header('Location: index.php?vista=crear_sector');
                exit;
            }

            $data = [
                'tipo' => $tipo
            ];

            try {
                $this->sectorModel->create($data);
                setFlashMessage('success', 'Sector creado exitosamente.');
                header('Location: index.php?vista=listar_sectores');
                exit;
            } catch (PDOException $e) {
                setFlashMessage('error', 'Error al crear el sector: ' . $e->getMessage());
                header('Location: index.php?vista=crear_sector');
                exit;
            }
        }
    }

    public function editForm($id) {
        $sector = $this->sectorModel->getById($id);
        if (!$sector) {
            setFlashMessage('error', 'Sector no encontrado.');
            header('Location: index.php?vista=listar_sectores');
            exit;
        }
        $content = ''; // Inicializamos content para la vista
        ob_start(); // Iniciar buffer de salida
        include __DIR__ . '/../views/sectores/edit.php';
        $content = ob_get_clean(); // Obtener contenido del buffer
        require_once __DIR__ . '/../views/layouts/main.php';
    }

    public function update($id) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $tipo = trim($_POST['tipo'] ?? '');

            if (empty($tipo)) {
                setFlashMessage('error', 'El tipo de sector es obligatorio.');
                header('Location: index.php?vista=editar_sector&id=' . $id);
                exit;
            }

            $data = [
                'tipo' => $tipo
            ];

            try {
                $this->sectorModel->update($id, $data);
                setFlashMessage('success', 'Sector actualizado exitosamente.');
                header('Location: index.php?vista=listar_sectores');
                exit;
            } catch (PDOException $e) {
                setFlashMessage('error', 'Error al actualizar el sector: ' . $e->getMessage());
                header('Location: index.php?vista=editar_sector&id=' . $id);
                exit;
            }
        }
    }

    public function delete($id) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            try {
                $this->sectorModel->delete($id);
                setFlashMessage('success', 'Sector eliminado exitosamente.');
                header('Location: index.php?vista=listar_sectores');
                exit;
            } catch (PDOException $e) {
                setFlashMessage('error', 'Error al eliminar el sector: ' . $e->getMessage());
                header('Location: index.php?vista=listar_sectores');
                exit;
            }
        }
    }
}
?> 