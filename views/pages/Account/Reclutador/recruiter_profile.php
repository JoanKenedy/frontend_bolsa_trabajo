<?php
if (!isset($_SESSION['rol'])) {
      header('location:login.php');
      return;
}else{
    if($_SESSION['rol'] != 2){
        header('location:login.php');
        return;
    }
}
?>

<h2>Hola estas en el perfil como reclutador</h2>