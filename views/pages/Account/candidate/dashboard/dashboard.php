<?php
if (isset($urlParams[3])) {
    if ($urlParams[3] == isset($_GET['id_vacante'])) {
        include "views/pages/Account/candidate/vacante_details/vacante_details.php";
    }
    if ($urlParams[3] == isset($_GET['vacante'])) {
        include "views/pages/Account/candidate/dashboard/postularme/postularme.php";
    }
} else {
    include "views/modules/candidate_dashboard.php";
}
