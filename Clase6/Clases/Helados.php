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
        $this->_Foto = "heladosImagen/".$this->_Sabor.",".date("His")."."."jpg";
    }

    public function __toString()
    {
        return $this->_Sabor.",".$this->_Precio.",".$this->_Foto;
    }

    public function __get($property)
    {
        return $this->_Sabor;
    }
    
    public function PrecioMasIva()
    {
        return $this->_Precio*1.21;
    }


    function NombreDeLaFoto()
    {
        return $this->_Foto;
    }

    public function BuscarSabor($sabor)
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
                $nombre=explode(",",$aux[i]);
                if( strcmp($nombre[0], $sabor) )
                    return true;
            }
        }
        fclose($ar);
        return false;
    }

    public function VenderHelado($cant)
    {   
        if($this->BuscarSabor($helado->sabor))
        {
            $this->GuardarVenta($helado, $cant);
            return $helado->PrecioMasIva*$cant;
        }
        else
            echo "El sabor no existe.";
    }   

    public function GuardarVenta($helado, $cant)
    {
        $ar=fopen("./helados/vendidos.txt","a");
        fwrite($ar, $helado->sabor.",".$cant.",".(($helado->PrecioMasIva/121)*100).PHP_EOL);
        fclose($ar);
    }

    public function GuardarImagen()
    {
        move_uploaded_file($_FILES['foto']['tmp_name'], $this->NombreDeLaFoto());        
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