<div class="container">
    <?php
    if (isset($_POST['verify_email'])) {
        $email = $_POST['verificarEmail'];
        $codigo = $_POST['verificarCodigo'];

        $conn = mysqli_connect('localhost', 'root', '', 'bolsa_de_trabajo');

        $sql = "UPDATE usuarios SET verificacion_email = '1' WHERE email = '$email ' AND verify_code = '$codigo'";

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
                        footer: '<a href="<?php echo $path ?>login.php" class="btn btn-success">Ir al login</a>'


                    });
                }
                modal();
            </script>
    <?php

        }
    }

    ?>

    <form class="custom-form hero-form form-login requires-validation" novalidate method="post" role="form">
        <h3 class=" text-center mb-3">
            <a class="text-dorado">Verificación de cuenta</a>
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
                <button type="submit" name="verify_email" class="form-control" value="Verificar Email" id="miModal" onclick="modal()">
                    Verificar Email
                </button>
            </div>


        </div>
    </form>
</div>