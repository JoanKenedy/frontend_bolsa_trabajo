<?php
if (!isset($_SESSION['rol']->rol_usuario_id)) {
    header('location:login.php');
    return;
} else {
    if ($_SESSION['rol']->rol_usuario_id != 1) {
        header('location:login.php');
        return;
    }
}
?>