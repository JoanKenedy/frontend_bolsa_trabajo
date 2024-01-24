<?php session_start(); ?>
<?php
$routesArray = explode("/", $_SERVER['REQUEST_URI']);
$routesArray = array_filter($routesArray);
$path = TemplateController::path();
$conn = mysqli_connect('localhost', 'root', '', 'bolsa_de_trabajo');
if ($conn->connect_errno != 0) {
    echo $conn->connect_error;
    exit();
}
$sql = $conn->query("SELECT * FROM crear_vacantes");

include 'modules/header.php';
?>
<?php
/* Capturar las rutas de la URL */
if (!empty($_SERVER['HTTPS']) && ('on' == $_SERVER['HTTPS'])) {
    if (!empty(array_filter($routesArray)[2])) {
        $urlParams = explode('/', array_filter($routesArray)[2]);
    }
} else {
    if (!empty(array_filter($routesArray)[1])) {
        $urlParams = explode('&', array_filter($routesArray)[1]);
    }
}

if (!empty($urlParams[0])) {
    if ($urlParams[0] == "account") {
        include "pages/" . $urlParams[0] . "/" . $urlParams[0] . ".php";
    }
    switch ($urlParams[0]) {
        case "about.php":
            include 'pages/About/about.php';
            break;
        case "contact.php":
            include 'pages/Contact/contact.php';
            break;
        case "job-listings.php":
            include 'pages/Job-listings/job-listings.php';
            break;
    }
} else if ($path) {
    include 'pages/Home/home.php';
}
?>

<?php
include 'modules/footer.php';
?>