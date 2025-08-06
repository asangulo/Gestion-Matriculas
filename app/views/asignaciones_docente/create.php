<?php
// Asegúrate de que $docentes_disponibles y $colegios_disponibles estén definidos cuando se incluya este archivo
if (!isset($docentes_disponibles)) {
    $docentes_disponibles = [];
}
if (!isset($colegios_disponibles)) {
    $colegios_disponibles = [];
}
?>

<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Crear Nueva Asignación de Docente</h3>
                </div>
                <div class="card-body">
                    <form action="index.php" method="POST">
                        <div class="mb-3">
                            <label for="id_docente" class="form-label">Docente</label>
                            <select class="form-select" id="id_docente" name="id_docente" required>
                                <option value="">Seleccione un docente</option>
                                <?php foreach ($docentes_disponibles as $docente): ?>
                                    <option value="<?= htmlspecialchars($docente['id']) ?>">
                                        <?= htmlspecialchars($docente['nombre']) ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="id_colegio" class="form-label">Colegio</label>
                            <select class="form-select" id="id_colegio" name="id_colegio" required>
                                <option value="">Seleccione un colegio</option>
                                <?php foreach ($colegios_disponibles as $colegio): ?>
                                    <option value="<?= htmlspecialchars($colegio['id']) ?>">
                                        <?= htmlspecialchars($colegio['nombre']) ?>
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
                            <label for="periodo" class="form-label">Periodo</label>
                            <input type="text" class="form-control" id="periodo" name="periodo" required>
                        </div>
                        <div class="mb-3">
                            <label for="dia_semana" class="form-label">Día de la Semana</label>
                            <select class="form-select" id="dia_semana" name="dia_semana" required>
                                <option value="">Seleccione un día</option>
                                <option value="Lunes">Lunes</option>
                                <option value="Martes">Martes</option>
                                <option value="Miércoles">Miércoles</option>
                                <option value="Jueves">Jueves</option>
                                <option value="Viernes">Viernes</option>
                                <option value="Sábado">Sábado</option>
                                <option value="Domingo">Domingo</option>
                            </select>
                        </div>
                        <button type="submit" name="crear_asignacion_docente" class="btn btn-primary">Guardar Asignación</button>
                        <a href="index.php?vista=listar_asignaciones_docente" class="btn btn-secondary">Cancelar</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> 