<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Gestión de Matrículas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="index.php?vista=dashboard">Sistema de Matrículas</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?vista=dashboard">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?vista=listar">Estudiantes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?vista=listar_matriculas">Matrículas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?vista=listar_docentes">Docentes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?vista=listar_colegios">Colegios</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?vista=listar_ciudades">Ciudades</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?vista=listar_sectores">Sectores</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?vista=listar_asignaciones_docente">Asignaciones</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        <?php
        $flash = getFlashMessage();
        if ($flash) {
            $alertClass = $flash['type'] === 'success' ? 'alert-success' : 'alert-danger';
            ?>
            <div class="alert <?php echo $alertClass; ?> alert-dismissible fade show" role="alert">
                <?php echo htmlspecialchars($flash['message']); ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php
        }
        ?>

        <?php echo $content ?? ''; ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html> 