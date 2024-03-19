<?php

if (isset($urlParams[3])) {
    if ($urlParams[3] == isset($_GET['id_vacante'])) {
        include "views/pages/cuenta/candidato/vacante_detalles/vacante_detalles.php";
    }
    if ($urlParams[3] == isset($_GET['vacante'])) {
        include "views/pages/cuenta/candidato/panel/postularme/postularme.php";
    }
    if ($urlParams[3] == isset($_GET['page'])) {
        include "views/pages/cuenta/candidato/panel/paginas/paginas.php";
    }
} else {
    include "views/modules/candidato_panel.php";
}
