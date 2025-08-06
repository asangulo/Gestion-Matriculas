<?php
// El contenido se ha capturado en el controlador y se pasará al layout principal.
// Aquí no se incluye el layout directamente, ya que el controlador lo hace.
// Asegúrate de que no haya salida antes del formulario
?>

<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Crear Nuevo Docente</h3>
                </div>
                <div class="card-body">
                    <form action="index.php" method="POST">
                        <div class="mb-3">
                            <label for="nombre" class="form-label">Nombre</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" required>
                        </div>
                        <div class="mb-3">
                            <label for="especialidad" class="form-label">Especialidad</label>
                            <input type="text" class="form-control" id="especialidad" name="especialidad" required>
                        </div>
                        <button type="submit" name="crear_docente" class="btn btn-primary">Guardar Docente</button>
                        <a href="index.php?vista=listar_docentes" class="btn btn-secondary">Cancelar</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> 