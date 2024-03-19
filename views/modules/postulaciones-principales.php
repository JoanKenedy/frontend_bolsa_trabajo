<?php
if (isset($urlParams[3])) {
    if ($urlParams[3] == isset($_GET['id_cv'])) {
        include "views/modules/detalles_cv.php";
    }
} else {
    include "views/modules/super-body.php";
}
