<!-- views/matriculas/crear.php -->

<div class="container mt-4">
    <h2 class="mb-4">Formulario de Nueva Matrícula</h2>

    <form method="POST" action="index.php" class="p-4 border rounded shadow-sm">
        <input type="hidden" name="crear_matricula_post" value="1">
        <div class="mb-3">
            <label for="id_estudiante" class="form-label">Estudiante:</label>
            <select id="id_estudiante" name="id_estudiante" class="form-select" required>
                <option value="">Seleccione un estudiante</option>
                <?php foreach ($estudiantes as $estudiante): ?>
                    <option value="<?= htmlspecialchars($estudiante['id']) ?>"><?= htmlspecialchars($estudiante['nombre']) ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="mb-3">
            <label for="id_colegio" class="form-label">Colegio:</label>
            <select id="id_colegio" name="id_colegio" class="form-select" required>
                <option value="">Seleccione un colegio</option>
                <?php foreach ($colegios as $colegio): ?>
                    <option value="<?= htmlspecialchars($colegio['id']) ?>"><?= htmlspecialchars($colegio['nombre']) ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="mb-3">
            <label for="grado" class="form-label">Grado:</label>
            <input type="text" id="grado" name="grado" class="form-control" placeholder="Ingrese el grado (ej. 10)" required>
        </div>
        <div class="mb-3">
            <label for="grupo" class="form-label">Grupo (Opcional):</label>
            <input type="text" id="grupo" name="grupo" class="form-control" placeholder="Ingrese el grupo (ej. A)">
        </div>
        <div class="mb-3">
            <label for="fecha" class="form-label">Año de Matrícula:</label>
            <input type="number" id="fecha" name="fecha" class="form-control" placeholder="Ingrese el año (ej. 2024)" min="1900" max="2100" required>
        </div>
        <div class="mb-3">
            <label for="periodo" class="form-label">Período Académico:</label>
            <input type="text" id="periodo" name="periodo" class="form-control" placeholder="Ej: 2023-2024" required>
        </div>
        <div class="d-flex justify-content-start">
            <button type="submit" class="btn btn-primary me-2">Guardar Matrícula</button>
            <a href="index.php?vista=listar_matriculas" class="btn btn-secondary">Cancelar</a>
        </div>
    </form>
</div> 