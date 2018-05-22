<?php
require_once "./Entidades/Alumno.php";
require_once "./Entidades/Materias.php";

    switch($_REQUEST['submit'])
    {
        // con POST/////////////////////////////////////////////////////////////////////////////////////////////////////////////
        case "cargarAlumno":
            Alumno::CargarAlumno($_POST['nombre'],$_POST['apellido'],$_POST['correo']);
            break;
        case "cargarMateria":
            Materias::cargarMateria($_POST['materia'],$_POST['codigo'],$_POST['cupo'],$_POST['aula']);
            break;
        case "modificarAlumno":
            Alumno::Modificar($_POST['nombre'],$_POST['apellido'],$_POST['correo']);
            break;
        ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

        // con GET /////////////////////////////////////////////////////////////////////////////////////////////////////////////   
        case "consultarAlumno":        
            $asd = Alumno::ConsultarAlumno($_GET['apellido']);
            echo "</br>";
            var_dump($asd);
            break;
        case "inscribirAlumno":
            Materias::inscribirAlumno($_GET['nombre'],$_GET['apellido'],$_GET['correo'],$_GET['materia'],$_GET['codigo']);
            break;
        case "inscripciones":
            Materias::Inscripciones();
            break;
        case "inscripcionesDiscriminadas":
            Materias::InscripcionesDisc($_GET['parametro'],$_GET['tipo']);
            break;
        case "alumnos":
            Alumno::alumnos();
            break;
        ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////        
    }

?>
