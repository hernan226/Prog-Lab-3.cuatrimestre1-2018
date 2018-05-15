<?php
require_once "./Entidades/Alumno.php";
require_once "./Entidades/Materias.php";

if(isset($_POST))
{
    switch($_POST['submit'])
    {
        case "cargarAlumno":
            $alumno = new Alumno($_POST['nombre'],$_POST['apellido'],$_POST['correo'],$_POST['foto']);
            $alumno->CargarAlumno();
            break;
        case "cargarMateria":    
            $materia = new Materias($_POST['materia'],$_POST['codigo'],$_POST['cupo'],$_POST['aula']);
            $materia->cargarMateria();
            break;
        case "modificarAlumno":
            break;
            
    }
}
else
{
    if(isset($_GET))
    {    
        switch($_GET['submit'])
        {
            case "consultarAlumno":
                var_dump(consultarAlumno($_GET['apellido']));
                break;
            case "inscribirAlumno":
                Materias::inscribirAlumno($_POST['nombre'],$_POST['apellido'],$_POST['correo'],$_POST['materia'],$_POST['codigo']);
                break;
            case "inscripciones":
                Materias::Inscripciones();
                break;
            case "inscripcionesDiscriminadas":
                Materias::InscripcionesDisc($_POST['parametro'],$_POST['tipo']);
                break;
            case "alumnos":
                Materias::alumnos();
                break;
        }
    }
}
?>
