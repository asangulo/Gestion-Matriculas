<div class="container mt-4">
    <h2 class="mb-4">Nuevo Estudiante</h2>

    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Crear Nuevo Estudiante</h3>
                </div>
                <div class="card-body">
                    <form method="POST" action="index.php">
                        <div class="mb-3">
                            <label for="nombre" class="form-label">Nombre:</label>
                            <input type="text" id="nombre" name="nombre" class="form-control" placeholder="Ingrese el nombre" required>
                        </div>

                        <div class="mb-3">
                            <label for="edad" class="form-label">Edad:</label>
                            <input type="number" id="edad" name="edad" class="form-control" placeholder="Ingrese la edad" required>
                        </div>

                        <div class="d-flex justify-content-start">
                            <button type="submit" name="crear_estudiante" class="btn btn-primary me-2">Guardar Estudiante</button>
                            <a href="index.php?vista=listar" class="btn btn-secondary">Cancelar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

