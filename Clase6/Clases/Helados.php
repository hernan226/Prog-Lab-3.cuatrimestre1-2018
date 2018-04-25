<?php
require_once "./Interfaces/IVendible.php";
class Helados implements IVendible
{
    private $_Sabor;
    private $_Precio;
    private $_Foto;

    

    public function __construct($sabor, $precio)
    {        
        $this->_Sabor = $sabor;
        $this->_Precio = $precio;
        $this->_Foto = "heladosImagen/".$this->_Sabor.".".date("His")."."."jpg";
    }

    public function __toString()
    {
        return $this->_Sabor.".".$this->_Precio.".".$this->_Foto;
    }
    
    public function PrecioMasIva()
    {
        return $this->_Precio*1.21;
    }

    function NombreDeLaFoto()
    {
        return $this->_Foto;
    }

    /*public function VenderHelado($sabor, $cantidad)
    {
        if(BuscarSabor($sabor))
        {
            return 
        }
    }*/

    public static function BuscarSabor($sabor)
    {
        $ar=fopen("./helados/sabores.txt","r");
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
                if( strcmp($aux[$i], $sabor) )
                    return true;
            }
        }
        fclose($ar);
        return false;
    }

    public function GuardarImagen()
    {
        move_uploaded_file($_FILES['Archivo']['tmp_name'], $this->NombreDeLaFoto());        
    }   

    public function GuardarHelado()
    {
        $ar=fopen("./helados/sabores.txt","a");
        fwrite($ar, $this . PHP_EOL);
        fclose($ar);
        $this->GuardarImagen();
    }

}


?>