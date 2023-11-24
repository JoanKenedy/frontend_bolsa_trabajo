<div class="container">
    <form class="custom-form hero-form form-login requires-validation" novalidate method="post" role="form">
        <h3 class=" text-center mb-3">
            <a href="<?php echo $path ?>register.php" class="text-dorado"> Registro</a> &nbsp; <a
                href="<?php echo $path ?>login.php" class="text-gray">Iniciar sesión</a>
        </h3>

        <div class="row">
            <div class="col-lg-6 col-md-6 col-12">
                <div class="input-control">
                    <span class="input-icon" id="basic-addon1"><i class="bi-person custom-icon"></i></span>

                    <input type="text" name="nombre" class="form-control input-group" placeholder="Nombre"
                        pattern="[A-Za-zñÑáéíóúÁÉÍÓÚ ]{1,}" onchange="validateJS(event, 'text')" required>

                    <div class="valid-feedback">
                        Válido
                    </div>
                    <div class="invalid-feedback">
                        ¡Nombre es requerido!
                    </div>
                    <div class="invalido">
                        ¡No utilices numeros o caracteres especiales!
                    </div>

                </div>
            </div>

            <div class="col-lg-6 col-md-6 col-12">
                <div class="input-control">
                    <span class="input-icon" id="basic-addon2"><i class="bi bi-person-plus custom-icon"></i></span>

                    <input type="text" name="apellidos" class="form-control input-group" placeholder="Apellidos"
                        pattern="[A-Za-zñÑáéíóúÁÉÍÓÚ ]{1,}" onchange="validateJS(event,'text')" required>

                    <div class="valid-feedback">
                        Válido
                    </div>
                    <div class="invalid-feedback">
                        ¡Apellidos es requerido!
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-12">
                <div class="input-control">
                    <span class="input-icon" id="basic-addon2"><i class="bi bi-envelope custom-icon"></i></span>

                    <input type="email" name="email" class="form-control input-group" placeholder="Correo electronico"
                        pattern="[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*"
                        onchange="validateJS(event, 'email')" required>

                    <div class="valid-feedback">
                        Válido
                    </div>
                    <div class="invalid-feedback">
                        ¡Correo es requerido!
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-12">
                <div class="input-control">
                    <span class="input-icon" id="basic-addon2"><i class="bi bi-telephone custom-icon"></i></span>

                    <input type="tel" name="telefono" class="form-control input-group"
                        pattern="(\(\+?\d{2,3}\)[\*|\s|\-|\.]?(([\d][\*|\s|\-|\.]?){6})(([\d][\s|\-|\.]?){2})?|(\+?[\d][\s|\-|\.]?){8}(([\d][\s|\-|\.]?){2}(([\d][\s|\-|\.]?){2})?)?)"
                        onchange="validateJS(event, 'tel')" placeholder="Teléfono" required>

                    <div class="valid-feedback">
                        Válido
                    </div>
                    <div class="invalid-feedback">
                        ¡Teléfono es requerido!
                    </div>
                </div>
            </div>
            <div class="col-lg-12 col-md-12 col-12">
                <div class="input-control">

                    <p class="text-label">Rol que deseas desempeñar:</p>

                    <select name="select" class=" input-group select">
                        <option value="1">Candidato</option>
                        <option value="2">Reclutador</option>

                    </select>

                </div>
            </div>
            <div class="col-lg-12 col-md-12 col-12">
                <div class="input-control">
                    <span class="input-icon"><i class="bi bi-eye-slash custom-icon"></i></span>

                    <input type="password" name="password" class="form-control input-group" placeholder="Contraseña"
                        required>

                    <div class="valid-feedback">
                        Válido
                    </div>
                    <div class="invalid-feedback">
                        ¡La contraseña es muy importante!
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