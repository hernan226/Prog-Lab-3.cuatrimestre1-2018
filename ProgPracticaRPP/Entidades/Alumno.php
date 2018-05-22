<?php

require_once "./Entidades/Archivos.php";

class Alumno
{
    static function GuardarFoto($correo)
    {
        move_uploaded_file($_FILES['foto']['tmp_name'], "./fotos/$correo.png");        
    }

    public static function CargarAlumno($nombre, $apellido, $correo)/*post*/
    {
        Alumno::GuardarFoto($correo);
        Archivos::Guardar("./Archivos/alumnos.txt", "$correo-$apellido-$nombre-./fotos/$correo.png");
    }

    public static function alumnos()
    {
        $aux = Archivos::Leer("./Archivos/alumnos.txt");
        if($aux!=false)
        {   
            echo "<table>";
            echo "
                <tr>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>EMail</th>
                <th>Foto</th>
                </tr>
                ";

            for($i=0; $i < count($aux)-1; $i++)
            {
                $escribir=explode("-",$aux[$i]);   
                $nombre=$escribir[0];
                $apellido=$escribir[1];
                $mail=$escribir[2];
                $foto=$escribir[3];
                echo "<tr>
                     <td>$nombre</td>
                     <td>$apellido</td>
                     <td>$mail</td>
                     <td>
                     <img src='$foto' border='0' width='50' height='50'></td>
                     </tr>";
            }
            echo "</table>";
        }
    }

    public static function ConsultarAlumno($apellido)/*get*/
    {
        $aux = Archivos::Leer("./Archivos/alumnos.txt");
        if($aux!=false)
        {    
            $flag=0;         
            $retorno = array();

            for($i=0; $i < count($aux)-1 ; $i++)
            {
                $nombre=explode("-",$aux[$i]);
                if(!strcasecmp($nombre[1], $apellido))
                {                    
                    $retorno[] = $aux[$i];
                    $flag=1;
                }
                    
            }
        }
        if($flag==1)
            return $retorno;
            else
                echo "No existe alumno con apellido $apellido";
    }

    public static function Modificar($nuevoNombre, $nuevoApellido, $correo)
    {
        $aux = Archivos::Leer("./Archivos/alumnos.txt");
        if($aux!=false)
        {  
            for($i=0; $i < count($aux)-1 ; $i++)
            {
                $alumno=explode("-",$aux[$i]);
                var_dump($alumno);
                if(!strcasecmp($alumno[0], $correo))
                {                    
                    if(isset($nuevoNombre))
                        $alumno[2] = $nuevoNombre;

                    if(isset($nuevoApellido))
                        $alumno[1] = $nuevoApellido;
                }
                $aux[$i] = implode("-", $alumno);
                
            }
            Archivos::Sobreescribir("./Archivos/alumnos.txt",$aux);
        }
    }

}
?>