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
$start = 0;
$rows_per_page = 3;

$records = $conn->query("SELECT * FROM crear_vacantes");
$nr_of_rows =  $records->num_rows;

$pages = ceil($nr_of_rows / $rows_per_page);
if (isset($_GET['page-nr'])) {
    $page = $_GET['page-nr'] - 1;
    $start = $page * $rows_per_page;
}
$sql = $conn->query("SELECT * FROM crear_vacantes LIMIT $start,$rows_per_page");

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
    }
} else if ($path) {
    include 'pages/Home/home.php';
}
?>

<?php
include 'modules/footer.php';
?>