<?php

require_once 'lib/Peticion.php';
require_once 'lib/functions.php';
define ('SERVICE_URL','http://'.$_SERVER['HTTP_HOST'].':'.$_SERVER['SERVER_PORT'].
    str_replace(basename(__FILE__),'ejercicio2.php',$_SERVER['REQUEST_URI'])
);

$peticion=new Peticion();

if ($peticion->has('a','b'))
{
    $data=new stdClass();
    
    $data->a=$peticion->getString('a');
    $data->b=$peticion->getString('b');

    $httpQueryParams=http_build_query(['operacion'=>'promedioJSON']);

    //Lanzamos una petición HTTP contra el servicio web implementado, el resultado recibido es en formato JSON
    $datosRecibidos=post(SERVICE_URL.'?'.$httpQueryParams,$data,true);

    $result=json_decode($datosRecibidos);

    if (isset($result->promedio))    
        echo "El promedio de '$data->a' y '$data->b' es '$result->promedio'";
    elseif (isset ($result->error))
        echo $result->error;
}
?>

<form action="ejercicio4ejemplo.php" method="post">
    Número A: <input type="text" name="a" id=""> <br>
    Número B: <input type="text" name="b" id=""> <br>
    <input type="submit" value="Calcular promedio!">
</form>
