<?php

class Alumno
{
    public $Nombre;
    public $Apellido;
    public $EMail;
    public $Foto;

    public function __construct($nombre, $apellido, $correo, $foto)
    {        
        $this->Nombre = $nombre;
        $this->Apellido = $apellido;
        $this->EMail = $correo;
        $this->Foto = $foto;
        $this->GuardarFoto();
    }
  
    public function __toString()
    {
        return $this->EMail."-".$this->Apellido."-".$this->Nombre."-".$this->Foto;
    }

    function GuardarFoto()
    {
        move_uploaded_file($_FILES['foto']['tmp_name'], $this->Foto);        
    }

    public function CargarAlumno()/*post*/
    {
            $ar=fopen("./Archivos/alumnos.txt","a");
            fwrite($ar, $this.PHP_EOL);
            fclose($ar);
    }

    public static function alumnos()
    {
        $ar=fopen("./Archivos/alumnos.txt","r");
        if($ar!=false)
        {     
            $aux = array();   
            $flag=0;         
            $retorno = array();

            while(!feof($ar))
            {
                $aux[]=fgets($ar);
            }
            fclose($ar);

            echo "<table>";
            echo "
                <tr>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>EMail</th>
                <th>Foto</th>
                </tr>
                ";

            for($i=0; $i<count($aux); $i++)
            {
                $escribir=explode("-",$aux[i]);   
                $nombre=$escribir[0];
                $apellido=$escribir[1];
                $mail=$escribir[2];
                $foto=$escribir[3];
                echo "<tr>
                     <td>$nombre</td>
                     <td>$apellido</td>
                     <td>$mail</td>
                     <td>$foto</td>
                     </tr>";
            }
            echo "</table>";
        }
        else
            return;

    }

    public static function ConsultarAlumno($apellido)/*get*/
    {
        $ar=fopen("./Archivos/alumnos.txt","r");
        if($ar!=false)
        {     
            $aux = array();   
            $flag=0;         
            $retorno = array();

            while(!feof($ar))
            {
                $aux[]=fgets($ar);
            }
            fclose($ar);
            
            for($i=0; $i<count($aux); $i++)
            {
                $nombre=explode(",",$aux[i]);
                if( strcmp($nombre[0], $apellido) )
                {                    
                    $retorno[] = $aux[i];
                    $flag=1;
                }
                    
            }
        }
        if($flag==1)
            return $retorno;
            else
                return "No existe alumno con apellido $apellido";
    }

}
?>