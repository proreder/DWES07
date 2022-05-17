<?php

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <title>Título de la página</title>
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
                        
                        if(isset($ciudades)){
                         foreach($ciudades as $ciudad){
                            echo "<tr>";
                             echo "<td>{$ciudad['ciudad']}</td>";
                             echo "<td class='izq'>{$ciudad['poblacion']}</td>";
                             echo "<td class='izq'>{$ciudad['superficie']}&sup2;</td>";
                             echo "<td class='izq'>{$ciudad['latitud']}&deg;,&nbsp;{$ciudad['longitud']}&deg;</td>";
                            echo "</tr>";
                         }
                     }
                     ?>
                 </tbody>
             </table>
        <br><br>        
            <fieldset class="formulario">
             <form action="ejercicio2.php?operacion=ciudades" method="post">
                <label for="columna">    
                    Seleccione la columna de ordenación: <select name="columna" id="columna">
                        <option value="poblacion">Población</option>
                        <option value="superficie">Superficie</option>
                    </select>
                </label>
                <label for="orden"><br>
                Seleccione si desea ordenar ascendente o descendentemente:
                <select name="orden" id="orden">
                    <option value="SORT_DESC">Descendente</option>
                    <option value="SORT_ASC">Ascendente</option>
                </select>
                </label><br><br>
                <input type="submit" value="¡Enviar!">
              </form>
            </fieldset>
        
        </body>
</html>
       
