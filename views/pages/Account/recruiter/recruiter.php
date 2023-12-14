<?php
if (!isset($_SESSION['rol'])) {
    header('location:account&login');
    return;
} else {
    if ($_SESSION['rol'] != 2) {
        header('location:account&login');
        return;
    }
}
?>

<h2>Hola estas en el perfil como reclutador</h2>