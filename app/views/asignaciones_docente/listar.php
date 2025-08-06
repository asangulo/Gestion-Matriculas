<!-- views/asignaciones_docente/listar.php -->

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Asignaciones de Docentes</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        ul { list-style: none; padding: 0; }
        li { padding: 10px; border-bottom: 1px solid #eee; }
        a { color: #2196F3; text-decoration: none; }
        .crear-btn { 
            display: inline-block;
            padding: 10px 20px;
            background: #4CAF50;
            color: white;
            text-decoration: none;
            border-radius: 4px;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <?php include __DIR__ . '/../partials/header.php'; ?>
    <h2>Lista de Asignaciones de Docentes</h2>
    <a href="index.php?vista=crear_asignacion_docente" class="crear-btn">Crear nueva asignación</a>
    <ul>
        <?php if (empty($asignaciones_docente)): ?>
            <li>No hay asignaciones de docentes registradas</li>
        <?php else: ?>
            <?php foreach ($asignaciones_docente as $ad): ?>
                <li>
                    Docente ID: <?= htmlspecialchars($ad['id_docente']) ?>, 
                    Colegio ID: <?= htmlspecialchars($ad['id_colegio']) ?>, 
                    Grado: <?= htmlspecialchars($ad['grado']) ?>, 
                    Grupo: <?= htmlspecialchars($ad['grupo']) ?>, 
                    Periodo: <?= htmlspecialchars($ad['periodo']) ?>, 
                    Día: <?= htmlspecialchars($ad['dia_semana']) ?>
                </li>
            <?php endforeach; ?>
        <?php endif; ?>
    </ul>
    <a href="index.php">← Volver al inicio</a>
</body>
</html> 