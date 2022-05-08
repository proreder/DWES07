
<?php
       //cargamos el script functions
       require_once 'lib/functions.php';
       include_once 'lib/kint.phar';
       
        $apiURL="http://api.nobelprize.org/2.1/nobelPrizes";              

        $result=get("https://api.nobelprize.org/2.1/nobelPrizes",["nobelPrizeYear"=>'1964']);
        
        d($result);
    
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <title>Título de la página</title>
        <style type="text/css">
            
        </style>
        <script type="text/javascript">
      	  
        </script>
        <!--<script type="text/javascript" src="js/codigo.js"></script>-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
        <div>
            <fieldset>
                <legend>Premios Nóbeles desde 1901 hatas 2021</legend>
                <form action="ejercicio1.php" method="POST">
                    <label>Selecciona un año:</label>
                     <select name="year">
                          <option value="0">Año</option>
                          <?php  for($i=1901;$i<=2021;$i++) { echo "<option value='".$i."'>".$i."</option>"; } ?>
                    </select>
                </form>
            </fieldset>
        </div>
    
       <?php
            if ($result){
                $array =json_decode($result, true);
                $nominados=$array['nobelPrizes'];
                d($nominados);
                echo "<table>";
                echo "<thead>";
                echo "   <tr>";
                echo "     <th>Año</th>";
                echo "     <th>Categoría del Premio</th>";
                echo "     <th>Nombre del Premiado</th>";
                echo "     <th>Motivo de la nominación</th>";
                echo "   </tr>";
                echo " </thead>";
                echo " <tbody>";
                echo "   <tr>";
                foreach ($nominados as $registro){
                    echo "   <tr>";
                    echo "<td>{$registro['awardYear']}</td>";
                    echo "<td>{$registro['category']['en']}</td>";
                    echo "<td>{$registro['fullName']['en']}</td>";
                    echo "<td>{$registro['motivation']['en']}</td>";
                   echo "   </tr>"; 
                }

                echo " </tbody>";
               echo "</table>";
            }
       ?>
    <body>

    </body>

</html>
