<?php
// Asegúrate de que $docentes esté definido cuando se incluya este archivo
// Si no está definido (ej. acceso directo), inicialízalo como un array vacío para evitar errores.
if (!isset($docentes)) {
    $docentes = [];
}
?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <h1>Lista de Docentes</h1>
    <a href="index.php?vista=crear_docente" class="btn btn-primary">Nuevo Docente</a>
</div>

<div class="table-responsive">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Especialidad</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php if (empty($docentes)): ?>
                <tr>
                    <td colspan="4">No hay docentes registrados.</td>
                </tr>
            <?php else: ?>
                <?php foreach ($docentes as $docente): ?>
                    <tr>
                        <td><?= htmlspecialchars($docente['id']) ?></td>
                        <td><?= htmlspecialchars($docente['nombre']) ?></td>
                        <td><?= htmlspecialchars($docente['especialidad']) ?></td>
                        <td>
                            <a href="index.php?vista=editar_docente&id=<?= htmlspecialchars($docente['id']) ?>" class="btn btn-sm btn-warning">Editar</a>
                            <form action="index.php?vista=eliminar_docente&id=<?= htmlspecialchars($docente['id']) ?>" method="POST" class="d-inline" onsubmit="return confirm('¿Está seguro de eliminar este docente?');">
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