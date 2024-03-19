<?php
if (isset($urlParams[3])) {
    if ($urlParams[3] == isset($_GET['id_vacante'])) {
        include "views/pages/cuenta/reclutador/ver_vacante/ver_vacante.php";
    } else if ($urlParams[3] == isset($_GET['editar'])) {
        include "views/pages/cuenta/reclutador/editar_vacante/editar_vacante.php";
    }
} else {
    include "views/modules/panel-principal.php";
}
