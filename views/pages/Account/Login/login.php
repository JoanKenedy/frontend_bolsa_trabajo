<?php
$login = new UsersController();
$login->login();
if (isset($urlParams[2])) {
    echo '<pre>';print_r($urlParams[2]);echo '</pre>';
    $verify = base64_decode($urlParams[2]);
    echo '<pre>';print_r($verify);echo '</pre>';

    /* Verificamos que el usuario exista */
    $url = CurlController::api() . "usuarios?linkTo=email&equalTo=" . $verify . "";
    $method = "GET";
    $fields = array();
    $header = array();
    $verificar = CurlController::request($url, $method, $fields, $header);
     echo '<pre>';print_r($verificar);echo '</pre>';


    if (!empty($verificar)) {
        if ($verificar->status == 200) {

            $url = CurlController::api() . "usuarios?id=" . $verificar->results[0]->id_usuario . "&nameId=id_usuario&token=no&except=verificacion_email";
            $method = "PUT";
            $fields = "verificacion_email=1";
            $header = array();
            $verificarUser = CurlController::request($url, $method, $fields, $header);

            if ($verificarUser->status == 200) {
?>
<script>
function modal() {

    Swal.fire({
        position: "top",
        icon: "success",
        title: "Tu cuenta ha sido verificada",
        showConfirmButton: false,
        footer: '<a href="<?php echo $path ?>account&login" class="btn btn-success">Ir al login</a>'


    });
}
modal();
</script>
<?php
            }
        }
    } else {
        ?>
<script>
function modal() {
    Swal.fire({
        position: "top",
        icon: "error",
        title: "Algo salio mal, verifica tu email o codigo",
        showConfirmButton: false,
        timer: 1500,


    });
}
modal();
</script>
<?php

    }

    /*  $conn = mysqli_connect('localhost', 'root', '', 'bolsa_de_trabajo');

        $sql = "UPDATE usuarios SET verificacion_email = '1' WHERE email = '$verify '";

        $result = mysqli_query($conn, $sql);

        if (mysqli_affected_rows($conn) == 0) { ?>
<script>
function modal() {
    Swal.fire({
        position: "top",
        icon: "error",
        title: "Algo salio mal, verifica tu email o codigo",
        showConfirmButton: false,
        timer: 1500,


    });
}
modal();
</script>
<?php } else { ?>
<script>
function modal() {

    Swal.fire({
        position: "top",
        icon: "success",
        title: "Tu cuenta ha sido verificada",
        showConfirmButton: false,
        footer: '<a href="<?php echo $path ?>account&login" class="btn btn-success">Ir al login</a>'


    });
}
modal();
</script>
<?php

        }*/
}
?>
<div class="container">


    <form class="custom-form hero-form form-login requires-validation" novalidate method="post" role="form">
        <h3 class=" text-center mb-3">
            <a href="<?php echo $path ?>account&login" class="text-dorado">Iniciar sesión</a> &nbsp; <a
                href="<?php echo $path ?>account&enrrollment" class="text-gray"> Registro</a>
        </h3>

        <div class="row">



            <div class="col-lg-12 col-md-12 col-12">
                <div class="input-control">
                    <span class="input-icon" id="basic-addon2"><i class="bi bi-envelope custom-icon"></i></span>

                    <input type="email" name="loginEmail" class="form-control input-group"
                        placeholder="Correo electronico" pattern="\w+([.-_+]?\w+)*@\w+([.-]?\w+)*(\.\w{2,10})+$"
                        onchange="validateJS(event, 'email')" required>


                    <div class="invalid-feedback">
                        La contraseña o correo no son correctos.
                    </div>
                </div>
            </div>


            <div class="col-lg-12 col-md-12 col-12">
                <div class="input-control">
                    <span class="input-icon"><i class="bi bi-eye-slash custom-icon"></i></span>

                    <input type="password" name="loginPassword" class="form-control input-group"
                        placeholder="Contraseña" pattern="(?=.*\d)(?=.*[a-záéíóúüñ]).*[A-ZÁÉÍÓÚÜÑ].*"
                        onchange="validateJS(event, 'password')" required>

                    <div class="invalid-feedback">
                        La contraseña o correo no son correctos.
                    </div>
                </div>
            </div>


            <div class="col-lg-6 col-6 m-auto">
                <button type="submit" class="form-control">
                    Entrar
                </button>
            </div>


        </div>
    </form>
</div>