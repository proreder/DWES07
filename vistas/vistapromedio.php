<?php

//Esta vista require dos variables: $ok y $promedio (solo si $ok es true)

if ($ok)
{
    echo "El promedio es ". $promedio;
    echo "<bR>";
    echo "Introduce otra operación:";
}
?>
<form action="ejercicio2.php?operacion=promedio" method="post">
    Número A: <input type="text" name="a" id=""> <br>
    Número B: <input type="text" name="b" id=""> <br>
    <input type="submit" value="Calcular promedio!">
</form>