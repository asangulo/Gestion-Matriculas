<?php
// Asegúrate de que $asignaciones esté definido cuando se incluya este archivo
if (!isset($asignaciones)) {
    $asignaciones = [];
}
?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <h1>Lista de Asignaciones de Docentes</h1>
    <a href="index.php?vista=crear_asignacion_docente" class="btn btn-primary">Nueva Asignación</a>
</div>

<div class="table-responsive">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Docente</th>
                <th>Colegio</th>
                <th>Grado</th>
                <th>Grupo</th>
                <th>Periodo</th>
                <th>Día Semana</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php if (empty($asignaciones)): ?>
                <tr>
                    <td colspan="8">No hay asignaciones de docentes registradas.</td>
                </tr>
            <?php else: ?>
                <?php foreach ($asignaciones as $asignacion): ?>
                    <tr>
                        <td><?= htmlspecialchars($asignacion['id']) ?></td>
                        <td><?= htmlspecialchars($asignacion['nombre_docente']) ?></td>
                        <td><?= htmlspecialchars($asignacion['nombre_colegio']) ?></td>
                        <td><?= htmlspecialchars($asignacion['grado']) ?></td>
                        <td><?= htmlspecialchars($asignacion['grupo']) ?></td>
                        <td><?= htmlspecialchars($asignacion['periodo']) ?></td>
                        <td><?= htmlspecialchars($asignacion['dia_semana']) ?></td>
                        <td>
                            <a href="index.php?vista=editar_asignacion_docente&id=<?= htmlspecialchars($asignacion['id']) ?>" class="btn btn-sm btn-warning">Editar</a>
                            <form action="index.php?vista=eliminar_asignacion_docente&id=<?= htmlspecialchars($asignacion['id']) ?>" method="POST" class="d-inline" onsubmit="return confirm('¿Está seguro de eliminar esta asignación?');">
                                <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<?php
// El contenido se ha capturado en el controlador y se pasará al layout principal.
// Aquí no se incluye el layout directamente, ya que el controlador lo hace.
?> 