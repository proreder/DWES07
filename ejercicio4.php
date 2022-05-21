<?php

require_once 'lib/Peticion.php';
require_once 'lib/functions.php';
define ('SERVICE_URL','http://'.$_SERVER['HTTP_HOST'].':'.$_SERVER['SERVER_PORT'].
    str_replace(basename(__FILE__),'ejercicio2.php',$_SERVER['REQUEST_URI'])
);

$peticion=new Peticion();
$indice=0;
if ($peticion->has('columna','orden'))
{
    $data=new stdClass();
    
    $data->columna=$peticion->getString('columna');
    $data->orden=$peticion->getString('orden');

    $httpQueryParams=http_build_query(['operacion'=>'ciudadesJSON']);

    //Lanzamos una petición HTTP contra el servicio web implementado, el resultado recibido es en formato JSON
    $datosRecibidos=post(SERVICE_URL.'?'.$httpQueryParams,$data,true);
    
    $result=json_decode($datosRecibidos);
    $indice=count($result);
//    var_dump($result);
//    if (isset($result->ciudades)){
//        $indice=count($result->ciudades);
//      }elseif (isset ($result->error))
//        
//        echo $result->error;
}else{
    $data=new stdClass();
    
     $httpQueryParams=http_build_query(['operacion'=>'ciudadesJSON']);

    //Lanzamos una petición HTTP contra el servicio web implementado, el resultado recibido es en formato JSON
    $datosRecibidos=post(SERVICE_URL.'?'.$httpQueryParams,null,true);
    
    $result=json_decode($datosRecibidos);
    $indice=count($result);
//        echo "Indice: ".$indice;
//    var_dump($result);
//    if (isset($result->ciudades)){
//        $indice=count($result->ciudades);
//        echo "Indice: ".$indice;
//      }elseif (isset ($result->error))
//        
//        echo $result->error;
}
?>
<style type="text/css">
           table tbody tr:nth-child(odd) {
            background: #97FCFE;
            }
            table tbody tr:nth-child(even) {
                    background: #fdf8ef;
            }
            table thead {
              background: #a6e1f5;
              color: black;
              font-size: 18px;
              border : solid 1px black;
            }
            table {
              border-collapse: collapse;
               
              width: 500px;
            } 
            table td,th{
                border : solid 1px black;
            }
            .ciudad {
                width: 100px;
                text-align: center;
             }
             .poblacion{
                width: 110px;
                
             }
             .largo{
                width: 190px;
             }
             .rojo{
                 color: red;
             }
             .formulario{
                 width: 550px;
             }
             .izq{
                 text-align: right;
             }
             
        </style>
        <script type="text/javascript">
      	  
        </script>
        <!--<script type="text/javascript" src="js/codigo.js"></script>-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        
             <table>
               <thead> 
                 <tr> 
                 <th class='ciudad'>Ciudad</th> 
                 <th class='poblacion'>Población</th> 
                 <th class='largo'>Superficie</th> 
                 <th class='largo'>Latitud/Longitud</th> 
                 </tr> 
                 </thead> 
                 <tbody>
                     <?php 
                        
                        if($indice>0){
                         for($i=0;$i<$indice;$i++){
                            echo "<tr>";
                             echo "<td>{$result[$i]->ciudad}</td>";
                             echo "<td class='izq'>{$result[$i]->poblacion}</td>";
                             echo "<td class='izq'>{$result[$i]->superficie}m&sup2;</td>";
                             echo "<td class='izq'>{$result[$i]->latitud}&deg;,&nbsp;{$result[$i]->longitud}&deg;</td>";
                            echo "</tr>";
                         }
                     }
                     ?>
                 </tbody>
             </table>
        <br><br>        
<fieldset class="formulario">
             <form action="ejercicio4.php" method="post">
                <label for="columna">    
                    Seleccione la columna de ordenación: <select name="columna" id="columna">
                        <option value="poblacion">Población</option>
                        <option value="superficie">Superficie</option>
                    </select>
                </label>
                <label for="orden"><br>
                Seleccione si desea ordenar ascendente o descendentemente:
                <select name="orden" id="orden">
                    <option value="desc">Descendente</option>
                    <option value="asc">Ascendente</option>
                </select>
                </label><br><br>
                <input type="submit" value="¡Enviar!">
              </form>
 </fieldset>