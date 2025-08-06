<!-- views/sectores/listar.php -->

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Sectores</title>
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
    <h2>Lista de Sectores</h2>
    <a href="index.php?vista=crear_sector" class="crear-btn">Crear nuevo sector</a>
    <ul>
        <?php if (empty($sectores)): ?>
            <li>No hay sectores registrados</li>
        <?php else: ?>
            <?php foreach ($sectores as $s): ?>
                <li><?= htmlspecialchars($s['tipo']) ?></li>
            <?php endforeach; ?>
        <?php endif; ?>
    </ul>
    <a href="index.php">← Volver al inicio</a>
</body>
</html> 