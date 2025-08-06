<!-- views/sectores/crear.php -->

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Sector</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        form { max-width: 400px; margin: 20px 0; }
        input { width: 100%; padding: 8px; margin: 8px 0; }
        button { padding: 10px 20px; background: #4CAF50; color: white; border: none; cursor: pointer; }
        a { color: #2196F3; text-decoration: none; }
    </style>
</head>
<body>
    <?php include __DIR__ . '/../partials/header.php'; ?>
    <h2>Nuevo Sector</h2>
    <form method="POST" action="index.php">
        <div>
            <label for="tipo">Tipo de Sector:</label>
            <input type="text" id="tipo" name="tipo" placeholder="Ingrese el tipo (ej. Público, Privado)" required>
        </div>
        <button type="submit" name="crear_sector">Guardar Sector</button>
    </form>
    <a href="index.php?vista=listar_sectores">← Volver a la lista de sectores</a>
</body>
</html> 