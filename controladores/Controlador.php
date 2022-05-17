<?php

class Controlador {

    public function promedio(Peticion $peticion) {
        $datosDeLaVista=['ok'=>false];
        if ($peticion->has('a','b'))
        {
            $a=$peticion->getString('a');
            $b=$peticion->getString('b');            
            if (is_numeric($a) && is_numeric($b))
            {
                $datosDeLaVista['promedio']=MathModel::promedio($a,$b);
                $datosDeLaVista['ok']=true;
            }
        }
        incluirDeFormaAislada(VISTAS.'/vistapromedio.php',$datosDeLaVista);
    }

    public function promedioJSON(Peticion $peticion)
    {
        $result=[];
        try {
            $data=json_decode($peticion->getRawInputData());
            if ($data===null)
            {
                $result['error']="No hay datos JSON";
            }
            else if (isset($data->a) && isset($data->b))
            {
                $result['promedio']=MathModel::promedio($data->a, $data->b);
            }
        } 
        catch(Exception $e)
        {
            $result['error']="No hay datos JSON";
        }
        header('Content-type: application/json');        
        echo json_encode($result);
    }
    
    //se muestran las ciudades 
    public function ciudades(Peticion $peticion){
        $columna=$orden=false;
        $ciudades=new CiudadesModel();
        if($peticion->has('columna', 'orden')){
            
             $columna=$peticion->getString('columna', true);
             $orden=$peticion->getString('orden', true);
             echo "<br>Columna: ".$columna;
             echo "<br>Orden: ".$orden;
             $datosCiudades['ciudades']=$ciudades->ordenCiudades($columna, $orden);
        }else{
            $datosCiudades['ciudades']=$ciudades->listarCiudades($columna, $orden);
        } 
        
        
        
        incluirDeFormaAislada(VISTAS.'/vistaCiudades.php', $datosCiudades);
        
    }
}