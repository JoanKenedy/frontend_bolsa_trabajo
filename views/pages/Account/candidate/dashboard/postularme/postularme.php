<?php
$potularmeVacante = new UsersController();
$potularmeVacante->postularmeVacante();
$url = CurlController::api() . "postulaciones?linkTo=id_usuario_postulacion&equalTo=" . $_SESSION['rol']->id_usuario . "";
$method = "GET";
$fields = array();
$header = array();
$totalPostulaciones = CurlController::request($url, $method, $fields, $header);
if ($totalPostulaciones->status == 200) {
  $array = array();
  foreach ($totalPostulaciones->results as $key => $value) {
    if ($value->id_vacante_postulacion == $_GET['vacante']) {
      array_push($array, $value->id_postulacion);
    }
  }
  if (empty($array)) {
    include "views/modules/enviar_cv.php";
  } else {
    include "views/modules/ya_estas_postulado.php";
  }
} else {
  include "views/modules/enviar_cv.php";
}
