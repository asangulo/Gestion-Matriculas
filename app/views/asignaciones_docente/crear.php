<!-- views/asignaciones_docente/crear.php -->

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Asignación de Docente</title>
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
    <h2>Nueva Asignación de Docente</h2>
    <form method="POST" action="index.php">
        <div>
            <label for="id_docente">Docente:</label>
            <select id="id_docente" name="id_docente" required>
                <option value="">Seleccione un docente</option>
                <?php foreach ($docentes_disponibles as $docente): ?>
                    <option value="<?= htmlspecialchars($docente['id']) ?>"><?= htmlspecialchars($docente['nombre']) ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div>
            <label for="id_colegio">Colegio:</label>
            <select id="id_colegio" name="id_colegio" required>
                <option value="">Seleccione un colegio</option>
                <?php foreach ($colegios_disponibles as $colegio): ?>
                    <option value="<?= htmlspecialchars($colegio['id']) ?>"><?= htmlspecialchars($colegio['nombre']) ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div>
            <label for="grado">Grado:</label>
            <input type="text" id="grado" name="grado" placeholder="Ingrese el grado (ej. 10)" required>
        </div>
        <div>
            <label for="grupo">Grupo:</label>
            <input type="text" id="grupo" name="grupo" placeholder="Ingrese el grupo (ej. A)">
        </div>
        <div>
            <label for="periodo">Período:</label>
            <input type="text" id="periodo" name="periodo" placeholder="Ingrese el período (ej. 2024-1)" required>
        </div>
        <div>
            <label for="dia_semana">Día de la Semana:</label>
            <select id="dia_semana" name="dia_semana" required>
                <option value="">Seleccione un día</option>
                <option value="Lunes">Lunes</option>
                <option value="Martes">Martes</option>
                <option value="Miércoles">Miércoles</option>
                <option value="Jueves">Jueves</option>
                <option value="Viernes">Viernes</option>
                <option value="Sábado">Sábado</option>
                <option value="Domingo">Domingo</option>
            </select>
        </div>
        <button type="submit" name="crear_asignacion_docente">Guardar Asignación</button>
    </form>
    <a href="index.php?vista=listar_asignaciones_docente">← Volver a la lista de asignaciones</a>
</body>
</html> 