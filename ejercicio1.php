<?php
       //cargamos el script functions
       require_once 'lib/functions.php';
       
        $apiURL="http://api.nobelprize.org/2.1/nobelPrizes";              

        $result=get("https://api.nobelprize.org/2.1/nobelPrizes",["nobelPrizeYear"=>'1964']);

        var_dump($result);
    
?>
