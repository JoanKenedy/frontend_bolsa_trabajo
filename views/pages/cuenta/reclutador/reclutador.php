<?php
if (!isset($_SESSION['rol']->rol_usuario_id)) {
    header('location:cuenta&acceso');
    return;
} else {
    if ($_SESSION['rol']->rol_usuario_id != 2) {
        header('location:cuenta&acceso');
        return;
    }
}
?>
<?php
if (isset($urlParams[2])) {

    include $urlParams[2] . "/" . $urlParams[2] . ".php";
};
?>