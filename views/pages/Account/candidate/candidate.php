<?php
if (!isset($_SESSION['rol']->rol_usuario_id)) {
    header('location:account&login');
    return;
} else {
    if ($_SESSION['rol']->rol_usuario_id != 1) {
        header('location:account&login');
        return;
    }
}
?>
<?php
if (isset($urlParams[2])) {

    include $urlParams[2] . "/" . $urlParams[2] . ".php";
};
?>