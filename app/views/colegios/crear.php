<!-- views/colegios/crear.php 

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Colegio</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        form { max-width: 400px; margin: 20px 0; }
        input, select { width: 100%; padding: 8px; margin: 8px 0; }
        button { padding: 10px 20px; background: #4CAF50; color: white; border: none; cursor: pointer; }
        a { color: #2196F3; text-decoration: none; }
    </style>
</head>
<body>
    <?php include __DIR__ . '/../partials/header.php'; ?>
    <h2>Nuevo Colegio</h2>
    <form method="POST" action="index.php">
        <div>
            <label for="nombre">Nombre del Colegio:</label>
            <input type="text" id="nombre" name="nombre" placeholder="Ingrese el nombre del colegio" required>
        </div>
        <div>
            <label for="fk_ciudad">Ciudad:</label>
            <select id="fk_ciudad" name="fk_ciudad" required>
                <option value="">Seleccione una ciudad</option>
                <?php foreach ($ciudades_disponibles as $ciudad): ?>
                    <option value="<?= htmlspecialchars($ciudad['id']) ?>"><?= htmlspecialchars($ciudad['nombre']) ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div>
            <label for="fk_sector">Sector:</label>
            <select id="fk_sector" name="fk_sector" required>
                <option value="">Seleccione un sector</option>
                <?php foreach ($sectores_disponibles as $sector): ?>
                    <option value="<?= htmlspecialchars($sector['id']) ?>"><?= htmlspecialchars($sector['tipo']) ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <button type="submit" name="crear_colegio">Guardar Colegio</button>
    </form>
    <a href="index.php?vista=listar_colegios">← Volver a la lista de colegios</a>
</body>
</html> -->