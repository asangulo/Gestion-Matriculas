<?php
// Asegúrate de que $colegio, $ciudades y $sectores estén definidos cuando se incluya este archivo
if (!isset($colegio)) {
    $colegio = [
        'id' => '',
        'nombre' => '',
        'fk_ciudad' => '',
        'fk_sector' => ''
    ];
}
if (!isset($ciudades)) {
    $ciudades = [];
}
if (!isset($sectores)) {
    $sectores = [];
}
?>

<div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Editar Colegio</h3>
                </div>
                <div class="card-body">
                    <form action="index.php?vista=editar_colegio_post&id=<?= htmlspecialchars($colegio['id']) ?>" method="POST">
                        <div class="mb-3">
                            <label for="nombre" class="form-label">Nombre del Colegio</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" value="<?= htmlspecialchars($colegio['nombre']) ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="fk_ciudad" class="form-label">Ciudad</label>
                            <select class="form-select" id="fk_ciudad" name="fk_ciudad" required>
                                <option value="">Seleccione una ciudad</option>
                                <?php foreach ($ciudades as $ciudad): ?>
                                    <option value="<?= htmlspecialchars($ciudad['id']) ?>" <?= ($colegio['fk_ciudad'] == $ciudad['id']) ? 'selected' : '' ?>>
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
                                    <option value="<?= htmlspecialchars($sector['id']) ?>" <?= ($colegio['fk_sector'] == $sector['id']) ? 'selected' : '' ?>>
                                        <?= htmlspecialchars($sector['tipo']) ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Actualizar Colegio</button>
                        <a href="index.php?vista=listar_colegios" class="btn btn-secondary">Cancelar</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> 