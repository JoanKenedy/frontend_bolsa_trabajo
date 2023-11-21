<div class="container">
    <form class="custom-form hero-form form-login" action="#" method="post" role="form">
        <h3 class="text-white text-center mb-3">
            <a href="#"> Registro</a>/ <a href="<?php echo $path ?>login.php">Iniciar sesión</a>
        </h3>

        <div class="row">
            <div class="col-lg-6 col-md-6 col-12">
                <div class="input-group">
                    <span class="input-group-text" id="basic-addon1"><i class="bi-person custom-icon"></i></span>

                    <input type="text" name="nombre" id="job-title" class="form-control" placeholder="Nombre" required>
                </div>
            </div>

            <div class="col-lg-6 col-md-6 col-12">
                <div class="input-group">
                    <span class="input-group-text" id="basic-addon2"><i class="bi-geo-alt custom-icon"></i></span>

                    <input type="text" name="apellidos" id="job-location" class="form-control" placeholder="Apellidos" required>
                </div>
            </div>
            <div class="col-lg-12 col-md-12 col-12">
                <div class="input-group">
                    <span class="input-group-text" id="basic-addon2"><i class="bi-geo-alt custom-icon"></i></span>

                    <input type="email" name="email" id="job-location" class="form-control" placeholder="Correo electronico" required>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-12">
                <div class="input-group">
                    <span class="input-group-text" id="basic-addon2"><i class="bi-geo-alt custom-icon"></i></span>

                    <input type="text" name="telefono" id="job-location" class="form-control" placeholder="Teléfono" required>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-12">
                <div class="input-radio">
                    <span class="input-group-text" id="basic-addon2"><i class="bi-geo-alt custom-icon"></i> &nbsp; Rol que desempeñaras</span> <br>
                    <div class="div">
                        <input type="radio" id="cbox1" value="1" /> Candidato
                        <input type="radio" id="cbox2" value="2" /> Reclutador
                    </div>

                </div>
            </div>
            <div class="col-lg-12 col-md-12 col-12">
                <div class="input-group">
                    <span class="input-group-text" id="basic-addon2"><i class="bi-geo-alt custom-icon"></i></span>

                    <input type="password" name="password" id="job-location" class="form-control" placeholder="Contraseña" required>
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