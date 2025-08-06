<?php
$content = '
<div class="container">
    <h1>Editar Matrícula</h1>
    <form action="index.php?vista=listar_matriculas" method="POST">
        <input type="hidden" name="editar_matricula" value="1">
        <input type="hidden" name="id" value="' . htmlspecialchars($matricula['id']) . '">
        
        <div class="mb-3">
            <label for="id_estudiante" class="form-label">Estudiante</label>
            <select class="form-select" id="id_estudiante" name="id_estudiante" required>
                <option value="">Seleccione un estudiante</option>';
                foreach ($estudiantes as $estudiante) {
                    $selected = ($estudiante['id'] == $matricula['id_estudiante']) ? 'selected' : '';
                    $content .= '
                    <option value="' . htmlspecialchars($estudiante['id']) . '" ' . $selected . '>' . 
                        htmlspecialchars($estudiante['nombre']) . ' (ID: ' . 
                        htmlspecialchars($estudiante['id']) . ')</option>';
                }
                $content .= '
            </select>
        </div>

        <div class="mb-3">
            <label for="id_colegio" class="form-label">Colegio</label>
            <select class="form-select" id="id_colegio" name="id_colegio" required>
                <option value="">Seleccione un colegio</option>';
                foreach ($colegios as $colegio) {
                    $selected = ($colegio['id'] == $matricula['id_colegio']) ? 'selected' : '';
                    $content .= '
                    <option value="' . htmlspecialchars($colegio['id']) . '" ' . $selected . '>' . 
                        htmlspecialchars($colegio['nombre']) . '</option>';
                }
                $content .= '
            </select>
        </div>

        <div class="mb-3">
            <label for="grado" class="form-label">Grado</label>
            <input type="number" class="form-control" id="grado" name="grado" 
                min="1" max="11" required value="' . htmlspecialchars($matricula['grado']) . '">
        </div>

        <div class="mb-3">
            <label for="grupo" class="form-label">Grupo</label>
            <input type="text" class="form-control" id="grupo" name="grupo" 
                maxlength="1" value="' . htmlspecialchars($matricula['grupo']) . '">
        </div>

        <div class="mb-3">
            <label for="fecha" class="form-label">Año</label>
            <input type="number" class="form-control" id="fecha" name="fecha" 
                min="2000" max="2100" required 
                placeholder="Ingrese el año (ej: 2024)"
                value="' . htmlspecialchars($matricula['fecha']) . '">
        </div>

        <div class="mb-3">
            <label for="periodo" class="form-label">Periodo</label>
            <select class="form-select" id="periodo" name="periodo" required>
                <option value="">Seleccione un periodo</option>
                <option value="1" ' . ($matricula['periodo'] == 1 ? 'selected' : '') . '>Primer Periodo</option>
                <option value="2" ' . ($matricula['periodo'] == 2 ? 'selected' : '') . '>Segundo Periodo</option>
                <option value="3" ' . ($matricula['periodo'] == 3 ? 'selected' : '') . '>Tercer Periodo</option>
                <option value="4" ' . ($matricula['periodo'] == 4 ? 'selected' : '') . '>Cuarto Periodo</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Actualizar</button>
        <a href="index.php?vista=listar_matriculas" class="btn btn-secondary">Cancelar</a>
    </form>
</div>';

require_once __DIR__ . '/../layouts/main.php';
?> 