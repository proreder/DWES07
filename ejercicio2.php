<?php

/*
La operación implementada a modo de ejemplo es accesible a través de la URL:
http://localhost/dwes07/ejercicio2.php?operacion=promedio
*/

require_once 'controladores/Controlador.php';
require_once 'lib/Peticion.php';
require_once 'lib/utils.php';
//var_dump($_POST);
define ('VISTAS',__DIR__.'/vistas');
//se añaden todos los archivos que estan dentro de la carpeta modelos
{ $tmp=glob(__DIR__.'/modelos/*.php'); array_walk($tmp,function ($f) {include_once $f;}); }

$peticion=new Peticion();
$controlador=new Controlador();

// Si "$_POST['operacion']" existe y hay un método en la clase Controlador que se llame igual que el valor de dicha variable
// entonces invoca dicho método de la clase controlador pasandole una instancia de la clase Peticion

if ($peticion->has('operacion') && method_exists($controlador,$operacion=$peticion->getString('operacion')))
{            
    $controlador->{$operacion}($peticion);
}else{
    echo "No se ha recibido ningún operación válida";
    echo "<br>";
    echo "La operación implementada a modo de ejemplo es accesible a través de la URL:<br>";
    echo "http://localhost/dwes07/ejercicio2.php?operacion=promedio";
}