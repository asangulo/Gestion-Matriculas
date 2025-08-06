<?php
// Asegúrate de que $ciudades y $sectores estén definidos cuando se incluya este archivo
if (!isset($ciudades)) {
    $ciudades = [];
}
if (!isset($sectores)) {
    $sectores = [];
}
?>

<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Crear Nuevo Colegio</h3>
                </div>
                <div class="card-body">
                    <form action="index.php" method="POST">
                        <div class="mb-3">
                            <label for="nombre" class="form-label">Nombre del Colegio</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" required>
                        </div>
                        <div class="mb-3">
                            <label for="fk_ciudad" class="form-label">Ciudad</label>
                            <select class="form-select" id="fk_ciudad" name="fk_ciudad" required>
                                <option value="">Seleccione una ciudad</option>
                                <?php foreach ($ciudades as $ciudad): ?>
                                    <option value="<?= htmlspecialchars($ciudad['id']) ?>">
                                        <?= htmlspecialchars($ciudad['nombre']) ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="fk_sector" class="form-label">Sector</label>
                            <select class="form-select" id="fk_sector" name="fk_sector" required>
                                <option value="">Seleccione un sector</option>
                                <?php foreach ($sectores as $sector): ?>
                                    <option value="<?= htmlspecialchars($sector['id']) ?>">
                                        <?= htmlspecialchars($sector['tipo']) ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <button type="submit" name="crear_colegio" class="btn btn-primary">Guardar Colegio</button>
                        <a href="index.php?vista=listar_colegios" class="btn btn-secondary">Cancelar</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> 