<?php
if (!isset($_SESSION['rol'])) {
     header('location:login.php');
     return;
}else{
    if($_SESSION['rol'] != 1){
        header('location:login.php');
         return;
    }
}
?>

<h2>Hola estas en perfil de Candidato</h2>