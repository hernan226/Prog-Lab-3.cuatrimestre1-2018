<?php

    class Materias
    {
            
        public $Nombre;
        public $Codigo;
        public $Cupo;
        public $Aula;

        public function __construct($nombre, $codigo, $cupo, $aula)
        {        
            $this->Nombre = $nombre;
            $this->Codigo = $codigo;
            $this->Cupo = $cupo;
            $this->Aula = $aula;
        }
        
        public function __toString()
        {
            return $this->Codigo."-".$this->Nombre."-".$this->Cupo."-".$this->Aula;
        }
        
        public function CargarMateria()/*post*/
        {
                $ar=fopen("./Archivos/materias.txt","a");
                fwrite($ar, $this.PHP_EOL);
                fclose($ar);
        }

        public static function inscribirAlumno($nombre, $apellido, $mail, $materia, $codigo)/*get*/
        {
            $ar=fopen("./Archivos/materias.txt","r");
            if($ar!=false)
            {     
                $flag = 0;     
                $actualizada = array();
                $count=0;

                while(!feof($ar))
                {
                    $aux = fgets($ar);
                    $aux = explode("-",$aux);
                    if (stricmp($aux[0], $codigo))
                    {
                        $flag = 1;
                        $aux[2] = (int)$aux[2];
                        $aux[2]--;
                        if($aux[2]<0) 
                        {
                            fclose($ar);
                            return "No hay cupos.";
                        }
                    }
                    $actualizada[]=implode("-",$aux);
                }
                fclose($ar);
                if ($flag==0 && feof($ar))
                return "La materia no existe";                
                  
            }
            if ($flag==1)
            {
                $ar=fopen("./Archivos/materia.txt","w");
                for($i=0; $i<count($actualizada); $i++)
                {
                    fwrite($ar, $actualizada[i].PHP_EOL);                        
                }
                fclose($ar);
                $ar=fopen("./Archivos/inscripciones.txt","a");                
                fwrite($ar,$nombre."-".$apellido."-".$mail."-".$materia."-".$codigo.PHP_EOL);          
                fclose($ar);
            }
        }

        public static function Inscripciones()/*get*/
        {
            $aux= array();
            $ar=fopen("./Archivos/alumnos.txt","r");
            if($ar!=false)
            {
                while(!feof($ar))
                {
                    $aux[]=fgets($ar);
                }
            }   
            else 
                return;

            $this->escribir($aux);

        }

        public static function InscripcionesDisc($parametro,$tipo)/*get*//*1 si es materia 0 si es apellido*/
        {
            $aux= array();
            $ar=fopen("./Archivos/inscripciones.txt","r");
            if($ar!=false)
            {
                while(!feof($ar))
                {
                    $filtro=fgets($ar);
                    $explotado=explode($filtro);
                    if($tipo==1)
                    {
                        if($parametro==$explotado[3])                            
                        $aux[]=$filtro;
                    }else
                    {
                        if($tipo==0)
                        {
                            if($parametro==$explotado[1])                            
                            $aux[]=$filtro;
                        }
                    }
                }
            }   
            else 
                return;
            $this->escribir($aux);
        }

        static function escribir($array)
        {
            
            echo "<table>";
            echo "
            <tr>
              <th>Nombre</th>
              <th>Apellido</th>
              <th>EMail</th>
            </tr>
            ";
            for($i=0; $i<count($aux); $i++)
            {
                $escribir=explode("-",$aux[i]);   
                $nombre=$escribir[0];
                $apellido=$escribir[1];
                $mail=$escribir[2];
                echo "<tr>
                     <td>$nombre</td>
                     <td>$apellido</td>
                     <td>$mail</td>
                     </tr>";
            }
            echo "</table>";
        }
    }




?>