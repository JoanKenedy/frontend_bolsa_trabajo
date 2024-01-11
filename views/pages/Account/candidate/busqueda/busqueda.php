<?php
if (isset($_POST['btnSearch'])) {
    $jobTitle = strtolower($_POST['job-title']);
    $jobLocation = strtolower($_POST['job-location']);


    $conn = mysqli_connect('localhost', 'root', '', 'bolsa_de_trabajo');
    $sql = "SELECT * FROM crear_vacantes WHERE title_vacante like '" . $jobTitle . "%' and lugar_de_trabajo like '" . $jobLocation . "%'";
    $result = mysqli_query($conn, $sql);
    if ($result->num_rows == 0) {
        include "views/modules/search_error.php";
    } else {
        while ($filas = mysqli_fetch_assoc($result)) {
            include "views/modules/search_result.php";
        }
    }
}
