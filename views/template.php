<?php


$routesArray = explode("/", $_SERVER['REQUEST_URI']);
$routesArray = array_filter($routesArray);
$path = TemplateController::path();




$url = CurlController::api() . "crear_vacantes";
$method = "GET";
$fields = array();
$header = array();

$totalVacantes = CurlController::request($url, $method, $fields, $header)->results;
include 'modules/header.php';

?>

<!--
Rutas de paginas
!-->

<?php
/* Capturar las rutas de la URL */

if (!empty(array_filter($routesArray)[1])) {
    $urlParams = explode('/', array_filter($routesArray)[1]);
}







if (!empty($urlParams[0])) {
    switch ($urlParams[0]) {
        case "about.php":
            include 'pages/About/about.php';
            break;
        case "contact.php":
            include 'pages/Contact/contact.php';
            break;
        case "job-details.php":
            include 'pages/Job-details/job-details.php';
            break;
        case "job-listings.php":
            include 'pages/Job-listings/job-listings.php';
            break;
        case "register.php":
            include 'pages/Account/Register/register.php';
            break;
        case "login.php":
            include 'pages/Account/Login/login.php';
            break;
        case "verificar_cuenta.php":
            include 'pages/Account/Verificar/verificar_cuenta.php';
            break;
    }
} else if ($path) {
    include 'pages/Home/home.php';
}
?>

<?php
include 'modules/footer.php';
?>