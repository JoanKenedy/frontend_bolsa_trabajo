<div class="container">
    <?php
    if (isset($_POST['verify_email'])) {
        $email = $_POST['verificarEmail'];
        $codigo = $_POST['verificarCodigo'];

        $conn = mysqli_connect('localhost', 'root', '', 'bolsa_de_trabajo');

        $sql = "UPDATE usuarios SET verificacion_email = '1' WHERE email = '$email ' AND verify_code = '$codigo'";

        $result = mysqli_query($conn, $sql);

        if (mysqli_affected_rows($conn) == 0) {
            die("Verificación de codigo fallida");
        } else {
            echo '<div class="alert alert-success">Cuenta verificada exitosamente. Ir al login</div>';
        }
    }

    ?>

    <form class="custom-form hero-form form-login requires-validation" novalidate method="post" role="form">
        <h3 class=" text-center mb-3">
            <a class="text-dorado">Vericación de cuenta</a>
        </h3>

        <div class="row">



            <div class="col-lg-12 col-md-12 col-12">
                <div class="input-control">
                    <span class="input-icon"><i class="bi bi-eye-slash custom-icon"></i></span>

                    <input type="pemail" name="verificarEmail" class="form-control input-group" placeholder="Email a verificar" required>

                    <div class="invalid-feedback">
                        Correo no existe en la base de datos
                    </div>
                </div>
            </div>






            <div class="col-lg-12 col-md-12 col-12">
                <div class="input-control">
                    <span class="input-icon"><i class="bi bi-eye-slash custom-icon"></i></span>

                    <input type="password" name="verificarCodigo" class="form-control input-group" placeholder="Codigo" required>

                    <div class="invalid-feedback">
                        El codigo no es correcto
                    </div>
                </div>
            </div>


            <div class="col-lg-6 col-6 m-auto">
                <button type="submit" name="verify_email" class="form-control" value="Verificar Email">
                    Verificar Email
                </button>
            </div>


        </div>
    </form>
</div>