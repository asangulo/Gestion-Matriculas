<?php
// Incluir la configuración de sesión
require_once __DIR__ . '/app/config/session.php';

// Incluir los archivos necesarios para la aplicación
require_once __DIR__ . '/app/config/db.php';        // Configuración de la base de datos
require_once __DIR__ . '/app/models/Estudiante.php'; // Modelo de Estudiante
require_once __DIR__ . '/app/models/Matricula.php';  // Modelo de Matrícula
require_once __DIR__ . '/app/models/Docente.php';    // Modelo de Docente
require_once __DIR__ . '/app/models/Colegio.php';    // Modelo de Colegio
require_once __DIR__ . '/app/models/Ciudad.php';     // Modelo de Ciudad
require_once __DIR__ . '/app/models/Sector.php';     // Modelo de Sector
require_once __DIR__ . '/app/models/AsignacionDocente.php'; // Modelo de AsignacionDocente
require_once __DIR__ . '/app/controllers/EstudianteController.php'; // Controlador de Estudiante
require_once __DIR__ . '/app/controllers/MatriculaController.php'; // Controlador de Matrícula
require_once __DIR__ . '/app/controllers/DocenteController.php'; // Controlador de Docente
require_once __DIR__ . '/app/controllers/CiudadController.php'; // Controlador de Ciudad
require_once __DIR__ . '/app/controllers/ColegioController.php'; // Controlador de Colegio
require_once __DIR__ . '/app/controllers/AsignacionDocenteController.php'; // Controlador de AsignacionDocente
require_once __DIR__ . '/app/controllers/SectorController.php'; // Controlador de Sector

// Obtener la vista solicitada, si no se especifica, por defecto será 'dashboard'
$vista = $_GET['vista'] ?? 'dashboard';

// --- Procesamiento de formularios --- 

// Procesar el formulario de creación de Estudiante
if (isset($_POST['crear_estudiante'])) {
    $controller = new EstudianteController();
    $controller->create();
}

// Procesar el formulario de creación de Docente
if (isset($_POST['crear_docente'])) {
    $controller = new DocenteController();
    $controller->create();
}

// Procesar el formulario de creación de Ciudad
if (isset($_POST['crear_ciudad'])) {
    $controller = new CiudadController();
    $controller->create();
}

// Procesar el formulario de creación de Sector
if (isset($_POST['crear_sector'])) {
    $controller = new SectorController();
    $controller->create();
}

// Procesar el formulario de creación de Colegio
if (isset($_POST['crear_colegio'])) {
    $controller = new ColegioController();
    $controller->create();
}

// Procesar el formulario de creación de AsignacionDocente
if (isset($_POST['crear_asignacion_docente'])) {
    $controller = new AsignacionDocenteController();
    $controller->create();
}

// Procesar el formulario de creación de Matrícula
if (isset($_POST['crear_matricula_post'])) {
    $controller = new MatriculaController();
    $controller->create();
}

// Procesar edición de matrícula
if (isset($_POST['editar_matricula'])) {
    $id = $_POST['id'] ?? '';
    if (empty($id)) {
        setFlashMessage('error', 'ID de matrícula no especificado');
        header('Location: index.php?vista=listar_matriculas');
        exit;
    }
    $controller = new MatriculaController();
    $controller->update($id);
}

// Procesar eliminación de matrícula
if (isset($_GET['eliminar_matricula'])) {
    $id = $_GET['eliminar_matricula'];
    $controller = new MatriculaController();
    $controller->delete($id);
}

// Procesar edición de Docente
if (isset($_POST['editar_docente'])) {
    $id = $_POST['id'] ?? ''; // Asegúrate de que el ID se pase desde el formulario
    if (empty($id)) {
        setFlashMessage('error', 'ID de docente no especificado');
        header('Location: index.php?vista=listar_docentes');
        exit;
    }
    $controller = new DocenteController();
    $controller->update($id);
}

// Procesar eliminación de Docente
if (isset($_GET['eliminar_docente'])) {
    $id = $_GET['eliminar_docente'];
    $controller = new DocenteController();
    $controller->delete($id);
}

// Procesar edición de Ciudad
if (isset($_POST['editar_ciudad'])) {
    $id = $_POST['id'] ?? '';
    if (empty($id)) {
        setFlashMessage('error', 'ID de ciudad no especificado');
        header('Location: index.php?vista=listar_ciudades');
        exit;
    }
    $controller = new CiudadController();
    $controller->update($id);
}

// Procesar eliminación de Ciudad
if (isset($_GET['eliminar_ciudad'])) {
    $id = $_GET['eliminar_ciudad'];
    $controller = new CiudadController();
    $controller->delete($id);
}

// Procesar edición de Colegio
if (isset($_POST['editar_colegio'])) {
    $id = $_POST['id'] ?? '';
    if (empty($id)) {
        setFlashMessage('error', 'ID de colegio no especificado');
        header('Location: index.php?vista=listar_colegios');
        exit;
    }
    $controller = new ColegioController();
    $controller->update($id);
}

// Procesar eliminación de Colegio
if (isset($_GET['eliminar_colegio'])) {
    $id = $_GET['eliminar_colegio'];
    $controller = new ColegioController();
    $controller->delete($id);
}

// Procesar edición de AsignacionDocente
if (isset($_POST['editar_asignacion_docente'])) {
    $id = $_POST['id'] ?? '';
    if (empty($id)) {
        setFlashMessage('error', 'ID de asignación de docente no especificado');
        header('Location: index.php?vista=listar_asignaciones_docente');
        exit;
    }
    $controller = new AsignacionDocenteController();
    $controller->update($id);
}

// Procesar eliminación de AsignacionDocente
if (isset($_GET['eliminar_asignacion_docente'])) {
    $id = $_GET['eliminar_asignacion_docente'];
    $controller = new AsignacionDocenteController();
    $controller->delete($id);
}

// Procesar edición de Sector
if (isset($_POST['editar_sector'])) {
    $id = $_POST['id'] ?? '';
    if (empty($id)) {
        setFlashMessage('error', 'ID de sector no especificado');
        header('Location: index.php?vista=listar_sectores');
        exit;
    }
    $controller = new SectorController();
    $controller->update($id);
}

// Procesar eliminación de Sector
if (isset($_GET['eliminar_sector'])) {
    $id = $_GET['eliminar_sector'];
    $controller = new SectorController();
    $controller->delete($id);
}

// --- Enrutamiento de vistas ---

// Mostrar la vista correspondiente según la variable $vista
switch ($vista) {
    case 'dashboard':
        // Instanciar modelos para obtener conteos y consultas específicas
        $estudiante = new Estudiante();
        $matricula = new Matricula();
        $docente = new Docente();
        $colegio = new Colegio();
        $ciudad = new Ciudad();
        $sector = new Sector();
        $asignacion_docente = new AsignacionDocente();

        ob_start();
        include __DIR__ . '/app/views/dashboard.php';
        $content = ob_get_clean();
        break;
    case 'listar': // Listar Estudiantes
        $controller = new EstudianteController();
        $content = $controller->index();
        break;
    case 'crear_estudiante':
        $controller = new EstudianteController();
        $content = $controller->createForm();
        break;
    case 'editar_estudiante':
        $controller = new EstudianteController();
        $id = $_GET['id'] ?? '';
        if (empty($id)) {
            setFlashMessage('error', 'ID de estudiante no especificado');
            header('Location: index.php?vista=listar');
            exit;
        }
        $content = $controller->editForm($id);
        break;
    case 'listar_docentes':
        $controller = new DocenteController();
        $content = $controller->index();
        break;
    case 'crear_docente':
        $controller = new DocenteController();
        $content = $controller->createForm();
        break;
    case 'editar_docente':
        $controller = new DocenteController();
        $id = $_GET['id'] ?? '';
        if (empty($id)) {
            setFlashMessage('error', 'ID de docente no especificado');
            header('Location: index.php?vista=listar_docentes');
            exit;
        }
        $content = $controller->editForm($id);
        break;
    case 'listar_ciudades':
        $controller = new CiudadController();
        $content = $controller->index();
        break;
    case 'crear_ciudad':
        $controller = new CiudadController();
        $content = $controller->createForm();
        break;
    case 'editar_ciudad':
        $controller = new CiudadController();
        $id = $_GET['id'] ?? '';
        if (empty($id)) {
            setFlashMessage('error', 'ID de ciudad no especificado');
            header('Location: index.php?vista=listar_ciudades');
            exit;
        }
        $content = $controller->editForm($id);
        break;
    case 'listar_sectores':
        $controller = new SectorController();
        $content = $controller->index();
        break;
    case 'crear_sector':
        $controller = new SectorController();
        $content = $controller->createForm();
        break;
    case 'editar_sector':
        $controller = new SectorController();
        $id = $_GET['id'] ?? '';
        if (empty($id)) {
            setFlashMessage('error', 'ID de sector no especificado');
            header('Location: index.php?vista=listar_sectores');
            exit;
        }
        $content = $controller->editForm($id);
        break;
    case 'listar_colegios':
        $controller = new ColegioController();
        $content = $controller->index();
        break;
    case 'crear_colegio':
        $controller = new ColegioController();
        $content = $controller->createForm();
        break;
    case 'editar_colegio':
        $controller = new ColegioController();
        $id = $_GET['id'] ?? '';
        if (empty($id)) {
            setFlashMessage('error', 'ID de colegio no especificado');
            header('Location: index.php?vista=listar_colegios');
            exit;
        }
        $content = $controller->editForm($id);
        break;
    case 'listar_matriculas':
        $controller = new MatriculaController();
        $content = $controller->index();
        break;
    case 'crear_matricula':
        $controller = new MatriculaController();
        $content = $controller->createForm();
        break;
    case 'editar_matricula':
        $id = $_GET['id'] ?? '';
        if (empty($id)) {
            setFlashMessage('error', 'ID de matrícula no especificado');
            header('Location: index.php?vista=listar_matriculas');
            exit;
        }
        $controller = new MatriculaController();
        $content = $controller->editForm($id);
        break;
    case 'listar_asignaciones_docente':
        $controller = new AsignacionDocenteController();
        $content = $controller->index();
        break;
    case 'crear_asignacion_docente':
        $controller = new AsignacionDocenteController();
        $content = $controller->createForm();
        break;
    case 'editar_asignacion_docente':
        $controller = new AsignacionDocenteController();
        $id = $_GET['id'] ?? '';
        if (empty($id)) {
            setFlashMessage('error', 'ID de asignación de docente no especificado');
            header('Location: index.php?vista=listar_asignaciones_docente');
            exit;
        }
        $content = $controller->editForm($id);
        break;
    default:
        // Si la vista no existe, redirigir al dashboard
        header('Location: index.php?vista=dashboard');
        exit;
}

// Incluir el layout principal al final para todas las vistas
require_once __DIR__ . '/app/views/layouts/main.php';
?>
