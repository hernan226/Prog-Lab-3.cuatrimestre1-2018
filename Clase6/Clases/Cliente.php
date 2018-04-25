<?php

class Cliente
{
    private $_Nombre;
    private $_Correo;
    private $_Clave;

    public function __construct($nombre, $correo, $clave)
    {        
        $this->_Nombre = $nombre;
        $this->_Correo = $correo;
        $this->_Clave = $clave;
    }

    public function __toString()
    {
        return $this->_Nombre."-".$this->_Correo."-".$this->_Clave;
    }
    
    public static function GuardarEnArchivo($Cliente)
    {
            $ar=fopen("./clientes/clientesActuales.txt","a");
            fwrite($ar, $Cliente.PHP_EOL);
            fclose($ar);
    }

    public static function ValidarCliente($Cliente)
    {
        $ar=fopen("./clientes/clientesActuales.txt","r");
        if($ar!=false)
        {     
            $aux = array();
            while(!feof($ar))
            {
                $aux[]=fgets($ar);
            }
            fclose($ar);
            
            for($i=0; $i<count($aux); $i++)
            {
                if( strcmp($aux[$i], $Cliente) )
                    return "Cliente Logueado";
            }
        }
        fclose($ar);
        return "Cliente inexistente";


    }
}




?>