<?php

class Archivos
{
    public static function Guardar($dir, $dat)
    {
        $ar=fopen($dir,"a");
        fwrite($ar, $dat.PHP_EOL);
        fclose($ar);
    }

    public static function Leer($dir)
    {
        $aux= array();
        $ar=fopen($dir,"r");
        if($ar!=false)
        {            
            while(!feof($ar))
            {
                $aux[]=fgets($ar);
            }
            fclose($ar);

            return $aux;
        }

        return false;
    }

    public static function Sobreescribir($dir, $dat)
    {
        $ar=fopen($dir,"w");
        for($i=0; $i<count($dat); $i++)
        {
            fwrite($ar, $dat[$i]);                        
        }
        fclose($ar);
    }
}

?>