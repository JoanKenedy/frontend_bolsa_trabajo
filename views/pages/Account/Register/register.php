<div class="container">
    <form class="custom-form hero-form form-login requires-validation" novalidate method="post" role="form">
        <h3 class=" text-center mb-3">
            <a href="<?php echo $path ?>register.php" class="text-dorado"> Registro</a> &nbsp; <a href="<?php echo $path ?>login.php" class="text-gray">Iniciar sesión</a>
        </h3>

        <div class="row">
            <div class="col-lg-6 col-md-6 col-12">
                <div class="input-control">
                    <span class="input-icon" id="basic-addon1"><i class="bi-person custom-icon"></i></span>

                    <input type="text" name="nombre" class="form-control input-group" placeholder="Nombre" required>

                    <div class="valid-feedback">
                        Nombre looks good!
                    </div>
                    <div class="invalid-feedback">
                        Nombre is required!
                    </div>

                </div>
            </div>

            <div class="col-lg-6 col-md-6 col-12">
                <div class="input-control">
                    <span class="input-icon" id="basic-addon2"><i class="bi-geo-alt custom-icon"></i></span>

                    <input type="text" name="apellidos" class="form-control input-group" placeholder="Apellidos" required>

                    <div class="valid-feedback">
                        Apellidos looks good!
                    </div>
                    <div class="invalid-feedback">
                        Apellidos is required!
                    </div>
                </div>
            </div>
            <div class="col-lg-12 col-md-12 col-12">
                <div class="input-control">
                    <span class="input-icon" id="basic-addon2"><i class="bi-geo-alt custom-icon"></i></span>

                    <input type="email" name="email" class="form-control input-group" placeholder="Correo electronico" required>

                    <div class="valid-feedback">
                        Correo looks good!
                    </div>
                    <div class="invalid-feedback">
                        Correo is required!
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-12">
                <div class="input-control">
                    <span class="input-icon" id="basic-addon2"><i class="bi-geo-alt custom-icon"></i></span>

                    <input type="text" name="telefono" class="form-control input-group" placeholder="Teléfono" required>

                    <div class="valid-feedback">
                        Teléfono looks good!
                    </div>
                    <div class="invalid-feedback">
                        Teléfono is required!
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-12">
                <div class="input-radio">
                    <div class="div">
                        <input type="radio" id="cbox1" value="1" /> Candidato
                        <input type="radio" id="cbox2" value="2" /> Reclutador
                    </div>

                </div>
            </div>
            <div class="col-lg-12 col-md-12 col-12">
                <div class="input-control">
                    <span class="input-icon"><i class="bi-geo-alt custom-icon"></i></span>

                    <input type="password" name="password" class="form-control input-group" placeholder="Contraseña" required>

                    <div class="valid-feedback">
                        Contraseña looks good!
                    </div>
                    <div class="invalid-feedback">
                        La contraseña debe tener miniomo 8 caracteres
                    </div>
                </div>
            </div>


            <div class="col-lg-6 col-6 m-auto">
                <button type="submit" class="form-control">
                    Registrar
                </button>
            </div>


        </div>
    </form>
</div>