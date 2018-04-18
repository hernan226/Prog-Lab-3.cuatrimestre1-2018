<?php

class Persona
{
    private $_Nombre;
    private $_Apellido;
    private $_Edad;
    private $_Legajo;

    Listado();
    
    public function __construct($Nombre,$Apellido,$Edad,$Legajo)
    {        
        $this->_Nombre=$Nombre;
        $this->_Apellido=$Apellido;
        $this->_Edad=$Edad;
        $this->_Legajo=$Legajo;
    }
    
    
    public function __toString()
    {
        return $this->_Nombre."-".$this->_Apellido."-".$this->_Edad."-".$this->_Legajo;
    }

    public function Listado($direccion)
    {
        $aux= array();
        
        $ar=fopen($direccion,"r");
        while(!feof($ar))
        {
            $aux[]=fgets($ar);
        }
        fclose($ar);

        return $aux;
    }
    
}
?>