<?php

/*
La operación implementada a modo de ejemplo es accesible a través de la URL:
http://localhost/dwes07/ejercicio2.php?operacion=promedio
*/

require_once 'controladores/Controlador.php';
require_once 'lib/Peticion.php';
require_once 'lib/utils.php';

define ('VISTAS',__DIR__.'/vistas');

{ $tmp=glob(__DIR__.'/modelos/*.php'); array_walk($tmp,function ($f) {include_once $f;}); }

$peticion=new Peticion();
$controlador=new Controlador();

// Si "$_POST['operacion']" existe y hay un método en la clase Controlador que se llame igual que el valor de dicha variable
// entonces invoca dicho método de la clase controlador pasandole una instancia de la clase Peticion

if ($peticion->has('operacion') && method_exists($controlador,$operacion=$peticion->getString('operacion')))
{            
    $controlador->{$operacion}($peticion);
}