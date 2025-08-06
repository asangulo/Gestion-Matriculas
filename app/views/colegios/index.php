<?php
// Asegúrate de que $colegios esté definido cuando se incluya este archivo
if (!isset($colegios)) {
    $colegios = [];
}
?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <h1>Lista de Colegios</h1>
    <a href="index.php?vista=crear_colegio" class="btn btn-primary">Nuevo Colegio</a>
</div>

<div class="table-responsive">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Ciudad</th>
                <th>Sector</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php if (empty($colegios)): ?>
                <tr>
                    <td colspan="5">No hay colegios registrados.</td>
                </tr>
            <?php else: ?>
                <?php foreach ($colegios as $colegio): ?>
                    <tr>
                        <td><?= htmlspecialchars($colegio['id']) ?></td>
                        <td><?= htmlspecialchars($colegio['nombre']) ?></td>
                        <td><?= htmlspecialchars($colegio['nombre_ciudad']) ?></td>
                        <td><?= htmlspecialchars($colegio['tipo_sector']) ?></td>
                        <td>
                            <a href="index.php?vista=editar_colegio&id=<?= htmlspecialchars($colegio['id']) ?>" class="btn btn-sm btn-warning">Editar</a>
                            <form action="index.php?vista=eliminar_colegio&id=<?= htmlspecialchars($colegio['id']) ?>" method="POST" class="d-inline" onsubmit="return confirm('¿Está seguro de eliminar este colegio?');">
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