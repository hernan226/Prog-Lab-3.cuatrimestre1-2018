<?php

require_once "./Entidades/Archivos.php";

class Materias
{

    public static function CargarMateria($nombre, $codigo, $cupo, $aula)/*post*/
    {
        Archivos::Guardar("./Archivos/materias.txt", "$codigo-$materia-$cupo-$aula");
    }

    public static function inscribirAlumno($nombre, $apellido, $mail, $materia, $codigo)/*get*/
    {
        $actualizada = array();
        $aux = Archivos::Leer("./Archivos/materias.txt");
        if($aux!=false)
        {     
            for ($i=0; $i < count($aux)-1; $i++)
            { 
                $explotado = explode("-",$aux[$i]);
                if (!strcasecmp($explotado[0], $codigo))
                {
                    $flag = 1;
                    $explotado[2] = (int)$explotado[2];
                    $explotado[2]--;
                    if($explotado[2]<0) 
                    {
                        echo "No hay cupos.";
                        return;
                    }
                }       
                $actualizada[] = implode("-", $explotado);
            }

            if ($flag==0)
            {
                echo "La materia no existe";  
                return;  
            }        
                else  
                {
                    Archivos::Sobreescribir("./Archivos/materias.txt", $actualizada);

                    Archivos::Guardar("./Archivos/inscripciones.txt", "$nombre-$apellido-$mail-$materia-$codigo");
                }    
                
        }
    }

    public static function Inscripciones()/*get*/
    {
        $aux = Archivos::Leer("./Archivos/inscripciones.txt");
        if($aux!=false)
        { 
            Materias::escribir($aux);
        }   
    }

    public static function InscripcionesDisc($parametro,$tipo)/*get*/
    {
        $aux = array();
        $ar = Archivos::Leer("./Archivos/inscripciones.txt");
        if($ar!=false)
        { 
            for ($i=0; $i < count($ar); $i++) 
            { 
                $explotado = explode("-", $ar[$i]);

                if($tipo=="materia")
                {
                    if($parametro == $explotado[3])                            
                    $aux[]=$ar[$i];
                }
                    else
                    {
                        if($tipo=="apellido")
                        {
                            if($parametro==$explotado[1])                            
                            $aux[]=$ar[$i];
                        }
                    }
            }                 
            Materias::escribir($aux);
        }
    }

    static function escribir($aux)
    {
        
        echo "<table>";
        echo "
        <tr>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>EMail</th>
            <th>Materia</th>
        </tr>
        ";
        for($i=0; $i<count($aux); $i++)
        {
            $escribir=explode("-",$aux[$i]);   
            $nombre=$escribir[0];
            $apellido=$escribir[1];
            $mail=$escribir[2];
            $materia=$escribir[3];
            echo "<tr>
                    <td>$nombre</td>
                    <td>$apellido</td>
                    <td>$mail</td>
                    <td>$materia</td>
                    </tr>";
        }
        echo "</table>";
    }
}

?>