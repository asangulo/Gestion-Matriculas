<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Lista de Estudiantes</h1>
        <a href="index.php?vista=crear_estudiante" class="btn btn-primary">Nuevo Estudiante</a>
    </div>

    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Edad</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
            <?php
            if (!empty($estudiantes)) {
                foreach ($estudiantes as $estudiante) {
            ?>
                    <tr>
                        <td><?= htmlspecialchars($estudiante['id']) ?></td>
                        <td><?= htmlspecialchars($estudiante['nombre']) ?></td>
                        <td><?= htmlspecialchars($estudiante['edad']) ?></td>
                        <td>
                            <a href="index.php?vista=editar_estudiante&id=<?= htmlspecialchars($estudiante['id']) ?>" class="btn btn-sm btn-warning">Editar</a>
                            <a href="index.php?eliminar_estudiante=<?= htmlspecialchars($estudiante['id']) ?>" class="btn btn-sm btn-danger" onclick="return confirm('¿Está seguro de eliminar este estudiante?')">Eliminar</a>
                        </td>
                    </tr>
            <?php
                }
            } else {
            ?>
                <tr>
                    <td colspan="4" class="text-center">No hay estudiantes registrados</td>
                </tr>
            <?php
            }
            ?>
            </tbody>
        </table>
    </div>
</div> 