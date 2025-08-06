<!-- views/colegios/listar.php -->

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Colegios</title>
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
    <h2>Lista de Colegios</h2>
    <a href="index.php?vista=crear_colegio" class="crear-btn">Crear nuevo colegio</a>
    <ul>
        <?php if (empty($colegios)): ?>
            <li>No hay colegios registrados</li>
        <?php else: ?>
            <?php foreach ($colegios as $c): ?>
                <li><?= htmlspecialchars($c['nombre']) ?> (Dirección: <?= htmlspecialchars($c['direccion']) ?>)</li>
            <?php endforeach; ?>
        <?php endif; ?>
    </ul>
    <a href="index.php">← Volver al inicio</a>
</body>
</html> 