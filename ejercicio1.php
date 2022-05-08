
<?php
       //cargamos el script functions
       require_once 'lib/functions.php';
       include_once 'lib/kint.phar';
       
        $apiURL="http://api.nobelprize.org/2.1/nobelPrizes";              

        $result=get("https://api.nobelprize.org/2.1/nobelPrizes",["nobelPrizeYear"=>'1965']);
        
//        d($result);
    
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
              background: #444;
              color: #fff;
              font-size: 18px;
            }
            table {
              border-collapse: collapse;
              width: 100%;
            } 
            table td{
                border : solid 1px black;
            }
            .anio {
                width: 40px;
                text-align: center;
             }
             .categoria{
                width: 110px;
             }
             .largo{
                width: 300px;
             }
             
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
                
                echo "<table>";
                echo "<thead>";
                echo "   <tr>";
                echo "     <th class='anio'>Año</th>";
                echo "     <th class='categoria'>Categoría</th>";
                echo "     <th class='largo'>Nombre del Premiado</th>";
                echo "     <th class='largo'>Motivo de la nominación</th>";
                echo "   </tr>";
                echo " </thead>";
                echo " <tbody>";
                echo "   <tr>";
                foreach ($nominados as $nominado){
                    //d($nominado);
                    echo "   <tr>";
                    echo "<td>{$nominado['awardYear']}</td>";
                    echo "<td>{$nominado['category']['en']}</td>";
                        $laureates=$nominado['laureates'];
//                        d($laureates);
                        echo "<td>";
                        foreach($laureates as $laureate){
                            if (isset($laureate['fullName']['en'])){
                                echo $laureate['fullName']['en'];
                            }else{
                                echo $laureate['orgName']['en'];
                            }
//                            d($laureates);
//                            d($laureate);
                        }
                        
                        echo "</td>";
                        echo "<td>{$laureate['motivation']['en']}</td>";
                           
                        
//                    echo "<td>{$nominado['fullName']['en']}</td>";
//                    echo "<td>{$nominado['motivation']['en']}</td>";
                   echo "   </tr>"; 
                }

                echo " </tbody>";
               echo "</table>";
            }
       ?>
    <body>

    </body>

</html>
