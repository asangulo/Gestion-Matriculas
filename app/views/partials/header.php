<!-- views/partials/header.php -->

<style>
    .global-menu {
        background-color: #333;
        padding: 10px 0;
        text-align: center;
        margin-bottom: 20px;
    }
    .global-menu a {
        color: white;
        padding: 10px 15px;
        text-decoration: none;
        display: inline-block;
        margin: 0 5px;
        border-radius: 4px;
        transition: background-color 0.3s ease;
    }
    .global-menu a:hover {
        background-color: #575757;
    }
</style>

<div class="global-menu">
    <a href="index.php?vista=dashboard">Dashboard</a>
    <a href="index.php?vista=listar">Estudiantes</a>
    <a href="index.php?vista=listar_docentes">Docentes</a>
    <a href="index.php?vista=listar_colegios">Colegios</a>
    <a href="index.php?vista=listar_matriculas">Matrículas</a>
    <a href="index.php?vista=listar_ciudades">Ciudades</a>
    <a href="index.php?vista=listar_sectores">Sectores</a>
    <a href="index.php?vista=listar_asignaciones_docente">Asignaciones Docente</a>
</div> 