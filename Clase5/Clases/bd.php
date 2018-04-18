<?php
    $Con='mysql:host=localhost;dbname=cdcol;charset=utf8';
    $Usr="root";
    $Pass="";
    $pdo = new PDO($Con,$Usr,$Pass);

    

    /*$query= $pdo->query("select * from cds");

    $resultado = $query->fetchall();
    
    foreach($resultado as $fila)
    {
        var_dump($fila);
        echo "<br>--------------------------------------<br>";
    }*/
    /*
    while($fila=$query->fetch(PDD::FETCH_ASSOC))
    {
        var_dump($fila);
        echo "<br>--------------------------------------<br>";
    }
    */
?>