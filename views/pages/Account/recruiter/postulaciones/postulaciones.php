<?php
$id_usuario = $_SESSION['rol']->id_usuario;

$url = CurlController::api() . "relations?rel=postulaciones,crear_vacantes,usuarios&type=postulacion,vacante,usuario&linkTo=id_usuario_vacante&equalTo=" . $id_usuario . "";
$method = "GET";
$fields = array();
$header = array();

$totalPostulaciones = CurlController::request($url, $method, $fields, $header);

if ($totalPostulaciones->status == 200) {

    include "views/modules/body_postulaciones.php";
} else {
    include "views/modules/postulaciones_vacio.php";
}
