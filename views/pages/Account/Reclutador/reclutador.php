<?php
if (!isset($_SESSION['user'])) {
    echo '<script>
    window.location = "' . $path . '";
          </script> 
    ';
    return;
}
?>
<h2>Hola estas en el perfil como reclutador</h2>