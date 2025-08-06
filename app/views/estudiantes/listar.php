<!-- views/estudiantes/listar.php -->

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Estudiantes</title>
    <!-- Estilos CSS para mejorar la apariencia de la lista -->
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
    <!-- Título de la página -->
    <h2>Lista de Estudiantes</h2>
    
    <!-- Botón para crear nuevo estudiante -->
    <a href="index.php?vista=crear" class="crear-btn">Crear nuevo estudiante</a>
    
    <!-- Lista de estudiantes -->
    <ul>
        <?php 
        // Para depuración: Ver el contenido de $estudiantes que llega a la vista
        error_log('Datos de $estudiantes en listar.php: ' . print_r($estudiantes, true));
        
        if (empty($estudiantes)): // Comprobamos si la lista de estudiantes está vacía
        ?>
            <li>No hay estudiantes registrados</li>
        <?php else: ?>
            <?php foreach ($estudiantes as $e): // Iteramos sobre cada estudiante en la lista ?>
                <!-- Cada estudiante se muestra en un elemento de lista -->
                <li>
                    <!-- Accedemos a las propiedades 'nombre' y 'edad' de cada estudiante ($e) -->
                    <?= htmlspecialchars($e['nombre']) ?> 
                    (<?= $e['edad'] ?> años)
                </li>
            <?php endforeach; ?>
        <?php endif; ?>
    </ul>
</body>
</html>