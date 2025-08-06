<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Lista de Matrículas</h1>
        <a href="index.php?vista=crear_matricula" class="btn btn-primary mb-3">Crear Nueva Matrícula</a>
    </div>
    
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Estudiante</th>
                    <th>Colegio</th>
                    <th>Grado</th>
                    <th>Grupo</th>
                    <th>Año</th>
                    <th>Periodo</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
            <?php
            if (!empty($matriculas)) {
                foreach ($matriculas as $matricula) {
            ?>
                    <tr>
                        <td><?= htmlspecialchars($matricula['id']) ?></td>
                        <td><?= htmlspecialchars($matricula['nombre_estudiante']) ?></td>
                        <td><?= htmlspecialchars($matricula['nombre_colegio']) ?></td>
                        <td><?= htmlspecialchars($matricula['grado']) ?></td>
                        <td><?= htmlspecialchars($matricula['grupo']) ?></td>
                        <td><?= htmlspecialchars($matricula['fecha']) ?></td>
                        <td><?= htmlspecialchars($matricula['periodo']) ?></td>
                        <td>
                            <a href="index.php?vista=editar_matricula&id=<?= htmlspecialchars($matricula['id']) ?>" class="btn btn-sm btn-warning">Editar</a>
                            <a href="index.php?eliminar_matricula=<?= htmlspecialchars($matricula['id']) ?>" class="btn btn-sm btn-danger" onclick="return confirm('¿Está seguro de eliminar esta matrícula?')">Eliminar</a>
                        </td>
                    </tr>
            <?php
                }
            } else {
            ?>
                <tr>
                    <td colspan="8" class="text-center">No hay matrículas registradas</td>
                </tr>
            <?php
            }
            ?>
            </tbody>
        </table>
    </div>
</div> 