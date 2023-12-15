<div class="container my-5">
    <?php
    $datosProfesion = new UsersController();
    $datosProfesion->datosProfesion();

    ?>
    <div class="ps-my-account">
        <div class="container">
            <form class="custom-form hero-form form-login requires-validation" novalidate method="post" role="form">
                <p class=" text-center mb-3">
                    Para saber más de tu profesión
                </p>
                <p>Cuéntanos sobre tu campo de experiencia o especialidad.</p>
                <input type="hidden" value="<?php echo CurlController::api() ?>" id="urlApi">
                <div class="row ">

                    <div class="col-lg-6 col-md-6 col-12">
                        <div class="input-control">
                            <span class="input-icon" id="basic-addon2"><i
                                    class="bi bi-folder-fill custom-icon"></i></span>

                            <input type="text" name="regPuesto" class="form-control input-group"
                                placeholder="ej: Ejecutivo de ventas" required>

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
                            <span class="input-icon" id="basic-addon2"><i class="bi bi-coin custom-icon"></i></span>

                            <input type="text" name="regSalario" class="form-control input-group"
                                placeholder="Salario aproximado" required>

                            <div class="valid-feedback">
                                Válido
                            </div>
                            <div class="invalid-feedback">
                                ¡Correo es requerido!
                            </div>
                        </div>
                    </div>





                    <div class="col-lg-12 col-12 m-auto">
                        <button type="submit" class="form-control" id="btn-register" name="datos_profesion">
                            Guardar y continuar
                        </button>
                    </div>


                </div>

            </form>
        </div>
    </div>


</div>