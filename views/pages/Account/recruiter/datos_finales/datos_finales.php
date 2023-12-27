<div class="container my-5">
    <?php
    $datosFinales = new RecruitersController();
    $datosFinales->datosFinales();

    ?>


    <div class="ps-my-account">
        <div class="container">
            <form class="custom-form hero-form form-login requires-validation" novalidate method="post" role="form">
                <p class=" text-center  text-white">
                    Estos son los datos finales para tu perfil empresarial.
                </p>

                <input type="hidden" value="<?php echo CurlController::api() ?>" id="urlApi">
                <div class="row ">
                    <div class="col-lg-6 col-md-6 col-12">
                        <div class="input-control">

                            <p class="text-label">Giro de tu empresa:</p>
                            <input type="text" name="giroEmpresa" class="form-control input-group" placeholder="ej:Farmaceutico" required>

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

                            <p class="text-label">Razón social:</p>
                            <input type="text" name="razonEmpresa" class="form-control input-group" placeholder="Razon social de tu empresa" required>

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

                            <p class="text-label">RFC:</p>
                            <input type="email" name="rfcEmpresa" class="form-control input-group" placeholder="Rfc " required>

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

                            <p class="text-label">Numero de trabajadores:</p>
                            <input type="text" name="numTrabajadores" class="form-control input-group" placeholder="Numero de colaboradores en tu empresa" required>

                            <div class="valid-feedback">
                                Válido
                            </div>
                            <div class="invalid-feedback">
                                ¡Apellidos es requerido!
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12 col-12">
                        <div class="input-control">

                            <p class="text-label">Descripción de actividades desempeñadas en tu empresa o negocio:</p>
                            <div class="text-center">
                                <textarea id="myTextArea" name="descripcionEmpresa" rows="5">

                            </textarea>
                            </div>




                        </div>
                    </div>




                    <div class="col-lg-12 col-12 m-auto">
                        <button type="submit" class="form-control" id="btn-register" name="datos_finales">
                            Guardar y continuar
                        </button>
                    </div>


                </div>

            </form>
        </div>
    </div>


</div>