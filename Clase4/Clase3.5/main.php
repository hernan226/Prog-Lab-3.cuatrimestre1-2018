<?php
// fopen("archivo", modo);modo (w, a, r, b, +)
    require "Entidades.php";
    require "accion.php";
    $Lista=array();

    $p1=new Persona("Hernan","Coronel","21","1");
    $p2=new Persona("Pedro","Lopez","45","2");
    $p3=new Persona("Carlos","Garcia","35","3");
    $p4=new Persona("Maria","Perez","34","4");
    $p5=new Persona("Josefa","Mengano","76","5");
 
    

    $ar=fopen("archivo","w");
    fwrite($ar,$p1.PHP_EOL);
    fwrite($ar,$p2.PHP_EOL);
    fwrite($ar,"".PHP_EOL);
    fwrite($ar,$p3.PHP_EOL);
    fwrite($ar,$p4.PHP_EOL);
    fwrite($ar,$p5.PHP_EOL);
    fclose($ar);

    $ar=fopen("archivo","r");   


    
    fclose($ar);



    // unlink(variable del archivor);
    // copy ("origen","destino");
        /*while(!feof($ar))
        {
            echo fgets($ar);
            echo "</br>";
        }
    rewind($ar);
    echo fread($ar, filesize("archivo"));*/
?> 