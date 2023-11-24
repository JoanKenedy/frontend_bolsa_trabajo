<div class="container">
    <form class="custom-form hero-form form-login requires-validation" novalidate method="post" role="form">
        <h3 class=" text-center mb-3">
            <a href="<?php echo $path ?>login.php" class="text-dorado">Iniciar sesión</a> &nbsp; <a
                href="<?php echo $path ?>register.php" class="text-gray"> Registro</a>
        </h3>

        <div class="row">



            <div class="col-lg-12 col-md-12 col-12">
                <div class="input-control">
                    <span class="input-icon" id="basic-addon2"><i class="bi bi-envelope custom-icon"></i></span>

                    <input type="email" name="email" class="form-control input-group" placeholder="Correo electronico"
                        required>


                    <div class="invalid-feedback">
                        La contraseña o correo no son correctos.
                    </div>
                </div>
            </div>


            <div class="col-lg-12 col-md-12 col-12">
                <div class="input-control">
                    <span class="input-icon"><i class="bi bi-eye-slash custom-icon"></i></span>

                    <input type="password" name="password" class="form-control input-group" placeholder="Contraseña"
                        required>

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