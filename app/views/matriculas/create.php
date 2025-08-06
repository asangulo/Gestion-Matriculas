<?php
if (!isset($estudiantes) || !is_array($estudiantes)) {
    $estudiantes = [];
}
if (!isset($colegios) || !is_array($colegios)) {
    $colegios = [];
}
?>

<div class="container-fluid px-4">
    <h1 class="mt-4">Crear Nueva Matrícula</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="index.php?vista=dashboard">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="index.php?vista=listar_matriculas">Matrículas</a></li>
        <li class="breadcrumb-item active">Crear Matrícula</li>
    </ol>

    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-user-plus me-1"></i>
            Formulario de Nueva Matrícula
        </div>
        <div class="card-body">
            <form action="index.php" method="POST">
                <input type="hidden" name="crear_matricula_post" value="1">

                <div class="mb-3">
                    <label for="id_estudiante" class="form-label">Estudiante</label>
                    <select class="form-select" id="id_estudiante" name="id_estudiante" required>
                        <option value="">Selecciona un estudiante</option>
                        <?php foreach ($estudiantes as $estudiante_data): ?>
                            <option value="<?php echo htmlspecialchars($estudiante_data['id']); ?>">
                                <?php echo htmlspecialchars($estudiante_data['nombre']); ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="id_colegio" class="form-label">Colegio</label>
                    <select class="form-select" id="id_colegio" name="id_colegio" required>
                        <option value="">Selecciona un colegio</option>
                        <?php foreach ($colegios as $colegio_data): ?>
                            <option value="<?php echo htmlspecialchars($colegio_data['id']); ?>">
                                <?php echo htmlspecialchars($colegio_data['nombre']); ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="grado" class="form-label">Grado</label>
                    <input type="text" class="form-control" id="grado" name="grado" required>
                </div>

                <div class="mb-3">
                    <label for="grupo" class="form-label">Grupo (Opcional)</label>
                    <input type="text" class="form-control" id="grupo" name="grupo">
                </div>

                <div class="mb-3">
                    <label for="fecha" class="form-label">Fecha de Matrícula</label>
                    <input type="date" class="form-control" id="fecha" name="fecha" required>
                </div>

                <div class="mb-3">
                    <label for="periodo" class="form-label">Período Académico</label>
                    <input type="text" class="form-control" id="periodo" name="periodo" required>
                </div>

                <button type="submit" class="btn btn-primary">Guardar Matrícula</button>
                <a href="index.php?vista=listar_matriculas" class="btn btn-secondary">Cancelar</a>
            </form>
        </div>
    </div>
</div> 