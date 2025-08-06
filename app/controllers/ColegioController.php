<?php
require_once __DIR__ . '/../models/Colegio.php';
require_once __DIR__ . '/../models/Ciudad.php';
require_once __DIR__ . '/../models/Sector.php';
require_once __DIR__ . '/../config/session.php';

class ColegioController {
    private $colegioModel;
    private $ciudadModel;
    private $sectorModel;

    public function __construct() {
        $this->colegioModel = new Colegio();
        $this->ciudadModel = new Ciudad();
        $this->sectorModel = new Sector();
    }

    public function index() {
        $colegios = $this->colegioModel->getAll();
        // Obtener nombres de ciudad y sector para mostrar en la tabla
        foreach ($colegios as &$colegio) {
            $ciudad = $this->ciudadModel->getById($colegio['fk_ciudad']);
            $sector = $this->sectorModel->getById($colegio['fk_sector']);
            $colegio['nombre_ciudad'] = $ciudad['nombre'] ?? 'N/A';
            $colegio['tipo_sector'] = $sector['tipo'] ?? 'N/A';
        }
        $content = ''; // Inicializamos content para la vista
        ob_start(); // Iniciar buffer de salida
        include __DIR__ . '/../views/colegios/index.php';
        $content = ob_get_clean(); // Obtener contenido del buffer
        require_once __DIR__ . '/../views/layouts/main.php';
    }

    public function createForm() {
        $ciudades = $this->ciudadModel->getAll();
        $sectores = $this->sectorModel->getAll();
        $content = ''; // Inicializamos content para la vista
        ob_start(); // Iniciar buffer de salida
        include __DIR__ . '/../views/colegios/create.php';
        $content = ob_get_clean(); // Obtener contenido del buffer
        require_once __DIR__ . '/../views/layouts/main.php';
    }

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nombre = trim($_POST['nombre'] ?? '');
            $fk_ciudad = $_POST['fk_ciudad'] ?? '';
            $fk_sector = $_POST['fk_sector'] ?? '';

            if (empty($nombre) || empty($fk_ciudad) || empty($fk_sector)) {
                setFlashMessage('error', 'Todos los campos son obligatorios.');
                header('Location: index.php?vista=crear_colegio');
                exit;
            }

            $data = [
                'nombre' => $nombre,
                'fk_ciudad' => $fk_ciudad,
                'fk_sector' => $fk_sector
            ];

            try {
                $this->colegioModel->create($data);
                setFlashMessage('success', 'Colegio creado exitosamente.');
                header('Location: index.php?vista=listar_colegios');
                exit;
            } catch (PDOException $e) {
                setFlashMessage('error', 'Error al crear el colegio: ' . $e->getMessage());
                header('Location: index.php?vista=crear_colegio');
                exit;
            }
        }
    }

    public function editForm($id) {
        $colegio = $this->colegioModel->getById($id);
        if (!$colegio) {
            setFlashMessage('error', 'Colegio no encontrado.');
            header('Location: index.php?vista=listar_colegios');
            exit;
        }
        $ciudades = $this->ciudadModel->getAll();
        $sectores = $this->sectorModel->getAll();
        $content = ''; // Inicializamos content para la vista
        ob_start(); // Iniciar buffer de salida
        include __DIR__ . '/../views/colegios/edit.php';
        $content = ob_get_clean(); // Obtener contenido del buffer
        require_once __DIR__ . '/../views/layouts/main.php';
    }

    public function update($id) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nombre = trim($_POST['nombre'] ?? '');
            $fk_ciudad = $_POST['fk_ciudad'] ?? '';
            $fk_sector = $_POST['fk_sector'] ?? '';

            if (empty($nombre) || empty($fk_ciudad) || empty($fk_sector)) {
                setFlashMessage('error', 'Todos los campos son obligatorios.');
                header('Location: index.php?vista=editar_colegio&id=' . $id);
                exit;
            }

            $data = [
                'nombre' => $nombre,
                'fk_ciudad' => $fk_ciudad,
                'fk_sector' => $fk_sector
            ];

            try {
                $this->colegioModel->update($id, $data);
                setFlashMessage('success', 'Colegio actualizado exitosamente.');
                header('Location: index.php?vista=listar_colegios');
                exit;
            } catch (PDOException $e) {
                setFlashMessage('error', 'Error al actualizar el colegio: ' . $e->getMessage());
                header('Location: index.php?vista=editar_colegio&id=' . $id);
                exit;
            }
        }
    }

    public function delete($id) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            try {
                $this->colegioModel->delete($id);
                setFlashMessage('success', 'Colegio eliminado exitosamente.');
                header('Location: index.php?vista=listar_colegios');
                exit;
            } catch (PDOException $e) {
                setFlashMessage('error', 'Error al eliminar el colegio: ' . $e->getMessage());
                header('Location: index.php?vista=listar_colegios');
                exit;
            }
        }
    }
}
?>
