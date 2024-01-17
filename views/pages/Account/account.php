<div class="container">
    <div class="container-myaccount">
        <div class="cerrar">
            <a href="/">Home/</a>Mi cuenta
        </div>
        <?php if (isset($_SESSION['rol'])) : ?>

            <div class="cerrar">
                <div class="perfil-photo">
                    <img src="images/avatar/usuario.png" alt="" class="img_perfil">
                    <p><?php echo $_SESSION['rol']->nombre ?></p>
                </div>
                <div class="perfil-photo">
                    <a href="<?php echo $path ?>account&logout">Salir</a>
                </div>

            </div>
        <?php endif; ?>
    </div>

</div>
<?php

if (isset($urlParams[1])) {
<<<<<<< HEAD
    if ($urlParams[1] == "enrrollment" || $urlParams[1] == "login" || $urlParams[1] == "candidate" || $urlParams[1] == "recruiter" || $urlParams[1] == "logout") {
        include $urlParams[1] . "/" . $urlParams[1] . ".php";
    }
=======

    
       include $urlParams[1]."/".$urlParams[1].".php";
    
   
>>>>>>> dda478e85ccb7377eda8f4d75fd86e9f98135a79
}
?>