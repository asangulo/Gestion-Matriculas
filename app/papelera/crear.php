<!-- views/docentes/crear.php 

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Docente</title>
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
    <h2>Nuevo Docente</h2>
    <form method="POST" action="index.php">
        <div>
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" placeholder="Ingrese el nombre" required>
        </div>
        <div>
            <label for="especialidad">Especialidad:</label>
            <input type="text" id="especialidad" name="especialidad" placeholder="Ingrese la especialidad" required>
        </div>
        <button type="submit" name="crear_docente">Guardar Docente</button>
    </form>
    <a href="index.php?vista=listar_docentes">← Volver a la lista de docentes</a>
</body>
</html> -->