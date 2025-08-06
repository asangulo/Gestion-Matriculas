<?php
// Obtener estadísticas
$total_estudiantes = $estudiante->getTotalCount();
$total_docentes = $docente->getTotalCount();
$total_colegios = $colegio->getTotalCount();
$total_matriculas = $matricula->getTotalCount();
?>

<div class="container-fluid px-4">
    <h1 class="mt-4">Dashboard</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Dashboard</li>
    </ol>
    
    <div class="row">
        <!-- Total Estudiantes -->
        <div class="col-xl-3 col-md-6">
            <div class="card bg-primary text-white mb-4">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h4 class="mb-0"><?php echo $total_estudiantes; ?></h4>
                            <div class="small">Total Estudiantes</div>
                        </div>
                        <i class="fas fa-users fa-2x"></i>
                    </div>
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    
                </div>
            </div>
        </div>
        
        <!-- Total Docentes -->
        <div class="col-xl-3 col-md-6">
            <div class="card bg-success text-white mb-4">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h4 class="mb-0"><?php echo $total_docentes; ?></h4>
                            <div class="small">Total Docentes</div>
                        </div>
                        <i class="fas fa-chalkboard-teacher fa-2x"></i>
                    </div>
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    
                </div>
            </div>
        </div>
        
        <!-- Total Colegios -->
        <div class="col-xl-3 col-md-6">
            <div class="card bg-warning text-white mb-4">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h4 class="mb-0"><?php echo $total_colegios; ?></h4>
                            <div class="small">Total Colegios</div>
                        </div>
                        <i class="fas fa-school fa-2x"></i>
                    </div>
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    
                </div>
            </div>
        </div>
        
        <!-- Total Matrículas -->
        <div class="col-xl-3 col-md-6">
            <div class="card bg-danger text-white mb-4">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h4 class="mb-0"><?php echo $total_matriculas; ?></h4>
                            <div class="small">Total Matrículas</div>
                        </div>
                        <i class="fas fa-file-alt fa-2x"></i>
                    </div>
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    
                </div>
            </div>
        </div>
    </div>
</div> 