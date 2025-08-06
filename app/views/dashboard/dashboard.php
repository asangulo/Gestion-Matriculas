<!-- views/dashboard/dashboard.php -->

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Gestión de Matrículas</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; background-color: #f4f4f4; }
        .container { max-width: 1200px; margin: 0 auto; padding: 20px; background-color: #fff; border-radius: 8px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); }
        h2 { color: #333; border-bottom: 2px solid #007bff; padding-bottom: 10px; margin-bottom: 20px; }
        .stats-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 20px; margin-bottom: 30px; }
        .stat-card { background-color: #e9ecef; padding: 20px; border-radius: 8px; text-align: center; }
        .stat-card h3 { margin: 0 0 10px 0; color: #555; font-size: 1.2em; }
        .stat-card p { font-size: 2.5em; font-weight: bold; color: #007bff; margin: 0; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #ddd; padding: 10px; text-align: left; }
        th { background-color: #007bff; color: white; }
        .menu { margin-bottom: 30px; }
        .menu a { 
            display: inline-block;
            padding: 10px 15px;
            margin-right: 10px;
            background-color: #6c757d;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }
        .menu a:hover { background-color: #5a6268; }
    </style>
</head>
<body>
    <div class="container">
        <h2>Dashboard de Gestión de Matrículas</h2>

        <div class="menu">
            <a href="index.php?vista=listar">Estudiantes</a>
            <a href="index.php?vista=listar_docentes">Docentes</a>
            <a href="index.php?vista=listar_colegios">Colegios</a>
            <a href="index.php?vista=listar_matriculas">Matrículas</a>
            <a href="index.php?vista=listar_ciudades">Ciudades</a>
            <a href="index.php?vista=listar_sectores">Sectores</a>
            <a href="index.php?vista=listar_asignaciones_docente">Asignaciones Docente</a>
        </div>

        <h3>Resumen General</h3>
        <div class="stats-grid">
            <div class="stat-card">
                <h3>Total Estudiantes</h3>
                <p><?= $totalEstudiantes ?? 'N/A' ?></p>
            </div>
            <div class="stat-card">
                <h3>Total Docentes</h3>
                <p><?= $totalDocentes ?? 'N/A' ?></p>
            </div>
            <div class="stat-card">
                <h3>Total Matrículas</h3>
                <p><?= $totalMatriculas ?? 'N/A' ?></p>
            </div>
            <div class="stat-card">
                <h3>Total Colegios</h3>
                <p><?= $totalColegios ?? 'N/A' ?></p>
            </div>
        </div>

        <h3>Estudiantes por Grado, Colegio y Año</h3>
        <?php if (empty($estudiantesPorGradoColegioAnio)): ?>
            <p>No hay datos disponibles para esta consulta.</p>
        <?php else: ?>
            <table>
                <thead>
                    <tr>
                        <th>Grado</th>
                        <th>Año</th>
                        <th>Colegio</th>
                        <th>Cantidad de Estudiantes</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($estudiantesPorGradoColegioAnio as $data): ?>
                        <tr>
                            <td><?= htmlspecialchars($data['grado']) ?></td>
                            <td><?= htmlspecialchars($data['anio']) ?></td>
                            <td><?= htmlspecialchars($data['nombre_colegio']) ?></td>
                            <td><?= htmlspecialchars($data['cantidad_estudiantes']) ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php endif; ?>

    </div>
</body>
</html> 