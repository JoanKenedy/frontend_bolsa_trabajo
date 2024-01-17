<<<<<<< HEAD
<?php
$id_usuario = $_SESSION['rol']->id_usuario;

$url = CurlController::api() . "relations?rel=postulaciones,crear_vacantes,usuarios&type=postulacion,vacante,usuario&linkTo=id_usuario_postulacion&equalTo=" . $id_usuario . "";
$method = "GET";
$fields = array();
$header = array();


$totalPostulacionesCandidato = CurlController::request($url, $method, $fields, $header);


if ($totalPostulacionesCandidato->status == 200) {

    include "views/modules/postulaciones_candidato.php";
} else {
    include "views/modules/postulaciones_vacio.php";
}
=======
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
>>>>>>> dda478e85ccb7377eda8f4d75fd86e9f98135a79
