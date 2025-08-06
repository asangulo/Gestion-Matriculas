<?php
// Asegúrate de que $ciudad esté definido cuando se incluya este archivo
if (!isset($ciudad)) {
    $ciudad = [
        'id' => '',
        'nombre' => ''
    ];
}
?>

<div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Editar Ciudad</h3>
                </div>
                <div class="card-body">
                    <form action="index.php?vista=editar_ciudad_post&id=<?= htmlspecialchars($ciudad['id']) ?>" method="POST">
                        <div class="mb-3">
                            <label for="nombre" class="form-label">Nombre de la Ciudad</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" value="<?= htmlspecialchars($ciudad['nombre']) ?>" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Actualizar Ciudad</button>
                        <a href="index.php?vista=listar_ciudades" class="btn btn-secondary">Cancelar</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> 