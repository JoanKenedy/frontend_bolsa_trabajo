<?php
if (isset($urlParams[3])) {
    if ($urlParams[3] == isset($_GET['id_vacante'])) {
        include "views/pages/Account/recruiter/ver_vacante/ver_vacante.php";
    } else if ($urlParams[3] == isset($_GET['editar'])) {
        include "views/pages/Account/recruiter/editar_vacante/editar_vacante.php";
    }
} else {
    include "views/modules/body_dashboard.php";
}            