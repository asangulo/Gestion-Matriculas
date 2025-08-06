<?php
// Asegúrate de que $docente esté definido cuando se incluya este archivo
// Esto es manejado por DocenteController::editForm()
if (!isset($docente)) {
    // Esto solo debería ocurrir si se accede directamente a la vista sin un controlador
    // En un flujo MVC correcto, $docente siempre estaría disponible aquí.
    $docente = [
        'id' => '',
        'nombre' => '',
        'especialidad' => ''
    ];
}
?>

<div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Editar Docente</h3>
                </div>
                <div class="card-body">
                    <form action="index.php?vista=editar_docente_post&id=<?= htmlspecialchars($docente['id']) ?>" method="POST">
                        <div class="mb-3">
                            <label for="nombre" class="form-label">Nombre</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" value="<?= htmlspecialchars($docente['nombre']) ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="especialidad" class="form-label">Especialidad</label>
                            <input type="text" class="form-control" id="especialidad" name="especialidad" value="<?= htmlspecialchars($docente['especialidad']) ?>" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Actualizar Docente</button>
                        <a href="index.php?vista=listar_docentes" class="btn btn-secondary">Cancelar</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> 