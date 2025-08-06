<?php
// Asegúrate de que $sectores esté definido cuando se incluya este archivo
if (!isset($sectores)) {
    $sectores = [];
}
?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <h1>Lista de Sectores</h1>
    <a href="index.php?vista=crear_sector" class="btn btn-primary">Nuevo Sector</a>
</div>

<div class="table-responsive">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tipo de Sector</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php if (empty($sectores)): ?>
                <tr>
                    <td colspan="3">No hay sectores registrados.</td>
                </tr>
            <?php else: ?>
                <?php foreach ($sectores as $sector): ?>
                    <tr>
                        <td><?= htmlspecialchars($sector['id']) ?></td>
                        <td><?= htmlspecialchars($sector['tipo']) ?></td>
                        <td>
                            <a href="index.php?vista=editar_sector&id=<?= htmlspecialchars($sector['id']) ?>" class="btn btn-sm btn-warning">Editar</a>
                            <form action="index.php?vista=eliminar_sector&id=<?= htmlspecialchars($sector['id']) ?>" method="POST" class="d-inline" onsubmit="return confirm('¿Está seguro de eliminar este sector?');">
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