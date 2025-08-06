<?php
// Asegúrate de que $asignacion, $docentes_disponibles y $colegios_disponibles estén definidos
if (!isset($asignacion)) {
    $asignacion = [
        'id' => '',
        'id_docente' => '',
        'id_colegio' => '',
        'grado' => '',
        'grupo' => '',
        'periodo' => '',
        'dia_semana' => ''
    ];
}
if (!isset($docentes_disponibles)) {
    $docentes_disponibles = [];
}
if (!isset($colegios_disponibles)) {
    $colegios_disponibles = [];
}

$dias_semana = ['Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado', 'Domingo'];
?>

<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Editar Asignación de Docente</h3>
                </div>
                <div class="card-body">
                    <form action="index.php?vista=editar_asignacion_docente_post&id=<?= htmlspecialchars($asignacion['id']) ?>" method="POST">
                        <div class="mb-3">
                            <label for="id_docente" class="form-label">Docente</label>
                            <select class="form-select" id="id_docente" name="id_docente" required>
                                <option value="">Seleccione un docente</option>
                                <?php foreach ($docentes_disponibles as $docente): ?>
                                    <option value="<?= htmlspecialchars($docente['id']) ?>" <?= ($asignacion['id_docente'] == $docente['id']) ? 'selected' : '' ?>>
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
                                    <option value="<?= htmlspecialchars($colegio['id']) ?>" <?= ($asignacion['id_colegio'] == $colegio['id']) ? 'selected' : '' ?>>
                                        <?= htmlspecialchars($colegio['nombre']) ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="grado" class="form-label">Grado</label>
                            <input type="text" class="form-control" id="grado" name="grado" value="<?= htmlspecialchars($asignacion['grado']) ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="grupo" class="form-label">Grupo (Opcional)</label>
                            <input type="text" class="form-control" id="grupo" name="grupo" value="<?= htmlspecialchars($asignacion['grupo']) ?>">
                        </div>
                        <div class="mb-3">
                            <label for="periodo" class="form-label">Periodo</label>
                            <input type="text" class="form-control" id="periodo" name="periodo" value="<?= htmlspecialchars($asignacion['periodo']) ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="dia_semana" class="form-label">Día de la Semana</label>
                            <select class="form-select" id="dia_semana" name="dia_semana" required>
                                <option value="">Seleccione un día</option>
                                <?php foreach ($dias_semana as $dia): ?>
                                    <option value="<?= htmlspecialchars($dia) ?>" <?= ($asignacion['dia_semana'] == $dia) ? 'selected' : '' ?>>
                                        <?= htmlspecialchars($dia) ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Actualizar Asignación</button>
                        <a href="index.php?vista=listar_asignaciones_docente" class="btn btn-secondary">Cancelar</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> 