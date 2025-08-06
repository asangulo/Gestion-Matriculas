<?php
// Asegúrate de que $ciudades esté definido cuando se incluya este archivo
if (!isset($ciudades)) {
    $ciudades = [];
}
?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <h1>Lista de Ciudades</h1>
    <a href="index.php?vista=crear_ciudad" class="btn btn-primary">Nueva Ciudad</a>
</div>

<div class="table-responsive">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php if (empty($ciudades)): ?>
                <tr>
                    <td colspan="3">No hay ciudades registradas.</td>
                </tr>
            <?php else: ?>
                <?php foreach ($ciudades as $ciudad): ?>
                    <tr>
                        <td><?= htmlspecialchars($ciudad['id']) ?></td>
                        <td><?= htmlspecialchars($ciudad['nombre']) ?></td>
                        <td>
                            <a href="index.php?vista=editar_ciudad&id=<?= htmlspecialchars($ciudad['id']) ?>" class="btn btn-sm btn-warning">Editar</a>
                            <form action="index.php?vista=eliminar_ciudad&id=<?= htmlspecialchars($ciudad['id']) ?>" method="POST" class="d-inline" onsubmit="return confirm('¿Está seguro de eliminar esta ciudad?');">
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