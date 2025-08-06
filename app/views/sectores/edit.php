<?php
// Asegúrate de que $sector esté definido cuando se incluya este archivo
if (!isset($sector)) {
    $sector = [
        'id' => '',
        'tipo' => ''
    ];
}
?>

<div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Editar Sector</h3>
                </div>
                <div class="card-body">
                    <form action="index.php?vista=editar_sector_post&id=<?= htmlspecialchars($sector['id']) ?>" method="POST">
                        <div class="mb-3">
                            <label for="tipo" class="form-label">Tipo de Sector</label>
                            <input type="text" class="form-control" id="tipo" name="tipo" value="<?= htmlspecialchars($sector['tipo']) ?>" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Actualizar Sector</button>
                        <a href="index.php?vista=listar_sectores" class="btn btn-secondary">Cancelar</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> 