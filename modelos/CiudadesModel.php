<?php

class CiudadesModel{
    private $ciudades=[
                ["ciudad"=>"Madrid", "poblacion" => 3305408, "superficie" => 604.45, "latitud"=>40.418889, "longitud"=>-3.691944],
                ["ciudad"=>"París", "poblacion" => 2240621, "superficie" => 105.4, "latitud"=>48.856944, "longitud"=>2.351389],
                ["ciudad"=>"Berlín", "poblacion" => 3769495, "superficie" => 891.69, "latitud"=>52.516667, "longitud"=>13.383333],
                ["ciudad"=>"Barcelona", "poblacion" => 2857321, "superficie" => 1287.36, "latitud"=>41.893056, "longitud"=>12.482778],
                ["ciudad"=>"Tokio", "poblacion" => 41185502, "superficie" => 2187, "latitud"=>35.689722, "longitud"=>139.692222],
                ["ciudad"=>"Shanghái", "poblacion" => 24870895, "superficie" => 6340, "latitud"=>31.166666, "longitud"=>121.466666]];
                //Añadir dos más
  
    
    public function listarCiudades($columna, $orden){
      $datos=$this->ciudades;
      return $datos;
  }  
  /*
   * ordena el array $ciudades
   * @param $key string para la ordenacion por indice 'poblacion' o 'superficie'
   * @param @orden strin que indica el orden 'SORT_DESC' o 'SORT_ASC'
   */  
  
  public function ordenCiudades($key, $sort) {
    $array=$this->ciudades;
    echo "<br>orden ".$sort;
    echo "<br>key ".$key;
    $_keys=array_column($array,$key);
    if($sort === 'SORT_ASC') array_multisort($_keys,SORT_ASC, $array);
    if($sort === 'SORT_DESC') array_multisort($_keys,SORT_DESC, $array);
    return $array;
//    foreach($array as $ciudad){
//        echo $ciudad['ciudad']."-".$ciudad['poblacion']."-".$ciudad['superficie'];
//        echo"<br>";
//    }
  }
        
}
    
    


