<?php
if (isset($urlParams[3])) {
    if ($urlParams[3] == isset($_GET['ver_vacante'])) {
    }
} else {
    include "views/modules/postulaciones_candidate.php";
}
