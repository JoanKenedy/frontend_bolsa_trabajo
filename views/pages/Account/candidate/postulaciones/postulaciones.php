<?php 

        $url = CurlController::api() . "postulaciones?linkTo=id_usuario_postulacion&equalTo=".$_SESSION['rol']->id_usuario."";
        $method = "GET";
        $fields = array();
        $header = array();

        $totalPostulaciones = CurlController::request($url, $method, $fields, $header);
        echo '<pre>'; print_r($totalPostulaciones);echo '</pre>';
        if($totalPostulaciones->status == 404){
           include 'views/modules/postulaciones_vacio.php';
        }else{
           
        }



?>