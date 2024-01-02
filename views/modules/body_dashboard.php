<div class="container-body d-flex justify-content-center align-items-center">
    <div class="container container-father">

        <section class="job-section job-featured-section section-space" id="job-section">
            <h4 class="mx-4 textVacante">Crea tu primera vacante</h4>

            <div class="modal fade" id="exampleModalLive" tabindex="-1" aria-labelledby="exampleModalLiveLabel"
                style="display: none;" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content px-3 py-3">
                        <form class="" novalidate method="post" role="form">


                            <input type="hidden" value="<?php echo CurlController::api() ?>" id="urlApi">
                            <div class="row ">
                                <div class="col-lg-6 col-md-6 col-12">
                                    <div class="input-control">

                                        <p class="text-label2">Título de vacante:</p>
                                        <input type="text" name="titleVacante" class="form-control input-group"
                                            placeholder="ej:Diseñador Jr" required>

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

                                        <p class="text-label2">Rango de sueldo:</p>
                                        <input type="text" name="sueldoVacante" class="form-control input-group"
                                            placeholder="10,000 a 12,000" required>

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

                                        <p class="text-label2">Educación requerida:</p>
                                        <input type="text" name="educacionRequerida" class="form-control input-group"
                                            placeholder="Preparatoria Concluida " required>

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

                                        <p class="text-label2">Tipo de contratación:</p>
                                        <input type="text" name="tipoContratacion" class="form-control input-group"
                                            placeholder="Temporal " required>

                                    </div>
                                </div>


                                <div class="col-lg-6 col-md-6 col-12">
                                    <div class="input-control">

                                        <p class="text-label2">Horario:</p>
                                        <input type="text" name="horarioVacante" class="form-control input-group"
                                            placeholder="9:00am a 18:00pm" required>

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

                                        <p class="text-label2">Lugar de trabajo:</p>
                                        <input type="text" name="lugarTrabajo" class="form-control input-group"
                                            placeholder="Cdmx Colonia Centro #12" required>

                                        <div class="valid-feedback">
                                            Válido
                                        </div>
                                        <div class="invalid-feedback">
                                            ¡Correo es requerido!
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-12">

                                    <div class="col-lg-12 col-md-12 col-12">
                                        <div class="input-control">

                                            <p class="text-label2">Descripción de actividades a desempeñar :</p>
                                            <div class="text-center">
                                                <textarea id="myTextArea" name="descripcionVacante" rows="5">

</textarea>
                                            </div>




                                        </div>
                                    </div>
                                </div>




                                <div class="col-lg-12 col-12 my-3  ">
                                    <button type="submit" class="form-control" id="btn-register" name="datos_vacante">
                                        Guardar y continuar
                                    </button>
                                </div>


                            </div>

                        </form>
                    </div>
                </div>
            </div>

            <div class="container-btn-postular my-3 mx-auto">


                <div class="container">
                    <?php
                    $datosVacante = new RecruitersController();
                    $datosVacante->datosVacante();
                    $data = $_SESSION['rol']->id_usuario;
                    $url = CurlController::api() . "relations?rel=crear_vacantes,reclutadores,usuarios&type=vacante,reclutador,usuario&linkTo=id_usuario&equalTo=" . $data . "";
                    $method = "GET";
                    $fields = array();
                    $header = array();
                    $verificarRel = CurlController::request($url, $method, $fields, $header);
                    if ($verificarRel->status == 404) {
                    ?>
                    <form class="" novalidate method="post" role="form">


                        <input type="hidden" value="<?php echo CurlController::api() ?>" id="urlApi">
                        <div class="row ">
                            <div class="col-lg-6 col-md-6 col-12">
                                <div class="input-control">

                                    <p class="text-label2">Título de vacante:</p>
                                    <input type="text" name="titleVacante" class="form-control input-group"
                                        placeholder="ej:Diseñador Jr" required>

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

                                    <p class="text-label2">Rango de sueldo:</p>
                                    <input type="text" name="sueldoVacante" class="form-control input-group"
                                        placeholder="10,000 a 12,000" required>

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

                                    <p class="text-label2">Educación requerida:</p>
                                    <input type="text" name="educacionRequerida" class="form-control input-group"
                                        placeholder="Preparatoria Concluida " required>

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

                                    <p class="text-label2">Tipo de contratación:</p>
                                    <input type="text" name="tipoContratacion" class="form-control input-group"
                                        placeholder="Temporal " required>

                                </div>
                            </div>


                            <div class="col-lg-6 col-md-6 col-12">
                                <div class="input-control">

                                    <p class="text-label2">Horario:</p>
                                    <input type="text" name="horarioVacante" class="form-control input-group"
                                        placeholder="9:00am a 18:00pm" required>

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

                                    <p class="text-label2">Lugar de trabajo:</p>
                                    <input type="text" name="lugarTrabajo" class="form-control input-group"
                                        placeholder="Cdmx Colonia Centro #12" required>

                                    <div class="valid-feedback">
                                        Válido
                                    </div>
                                    <div class="invalid-feedback">
                                        ¡Correo es requerido!
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-12">

                                <div class="col-lg-12 col-md-12 col-12">
                                    <div class="input-control">

                                        <p class="text-label2">Descripción de actividades a desempeñar :</p>
                                        <div class="text-center">
                                            <textarea id="myTextArea" name="descripcionVacante" rows="5">

        </textarea>
                                        </div>




                                    </div>
                                </div>
                            </div>




                            <div class="col-lg-12 col-12 my-3  ">
                                <button type="submit" class="form-control" id="btn-register" name="datos_vacante">
                                    Guardar y continuar
                                </button>
                            </div>


                        </div>

                    </form>


                    <?php
                    } else {
                    ?>
                    <button type="button" class="btn btn-primary mx-4" data-bs-toggle="modal"
                        data-bs-target="#exampleModalLive">
                        Nueva vacante
                    </button>


                    <?php

                        $data = $_SESSION['rol']->id_usuario;
                        $url = CurlController::api() . "crear_vacantes?linkTo=id_usuario_vacante&equalTo=" . $data . "&token=no";
                        $method = "GET";
                        $fields = array();
                        $header = array();
                        $verificarRel = CurlController::request($url, $method, $fields, $header)->results;
                        ?>
                    <div class="col-lg-12 col-12">
                        <?php foreach ($verificarRel as $key => $value) : ?>


                        <div class="container-vacante ">
                            <div class="item-container-vacante">
                                <img src="images/logos/google.png" class="job-vacante img-fluid" alt="">
                            </div>

                            <div class="item-container-vacante">
                                <div class="mb-3">
                                    <h4 class="job-title mb-lg-0">
                                        <a href="job-details.html" class="job-title-link">
                                            <?php echo $value->title_vacante ?></a>
                                    </h4>

                                    <div class="">
                                        <p class="job-location mb-0">
                                            <i class="custom-icon bi-geo-alt me-1"></i>
                                            <?php echo $value->lugar_de_trabajo ?>
                                        </p>

                                        <p class="job-date mb-0">
                                            <i class="custom-icon bi-clock me-1"></i>
                                            <?php echo $value->fecha_de_publicacion ?>
                                        </p>

                                        <p class="job-price mb-0">
                                            <i class="custom-icon bi-cash me-1"></i>
                                            $<?php echo $value->rango_sueldo ?>
                                        </p>

                                    </div>
                                </div>

                            </div>
                            <div class="item-container-vacante">
                                <a href="<?php echo $path ?>account&recruiter&dashboard&ver_vacante?id_vacante=<?php echo $value->id_vacante  ?>"
                                    class="custom-btn btn">Ver</a>

                                <a href="<?php echo $path ?>account&recruiter&dashboard&editar_vacante?editar=<?php echo $value->id_vacante  ?>"
                                    class="custom-btn btn">Editar</a>

                            </div>
                        </div>

                        <?php endforeach ?>

                    </div>

                    <?php
                    }

                    ?>


                </div>

        </section>
        <section class="grid-curriculum-index">
            <div class="container container-grid-curriculum-index">
                <div class="grid-item-curriculum-index">
                    <img src="images/avatar/usuario.png" alt="">
                    <h6 class="title-6">¡Hola Manuel!</h6>
                    <span>Tu curriculum esta activo</span>
                </div>
                <div class="grid-item-curriculum-index">
                    <h6>Visitas a mi curriculum</h6>
                    <div class="grid-item-body">
                        <div class="grid-item-img">
                            <img src="images/logos/google.png" class="img-wraper-job" alt="">
                        </div>
                        <div class="grid-item-text">
                            <h6 class="title-6">Grupo Bimbo S.A de C.V</h6>
                            <span>Hace 1 día</span>
                        </div>
                    </div>
                </div>
                <div class="grid-item-curriculum-index">
                    <h6>Visitas a mi curriculum</h6>
                    <div class="grid-item-body">
                        <div class="grid-item-img">
                            <img src="images/logos/google.png" class="img-wraper-job" alt="">
                        </div>
                        <div class="grid-item-text">
                            <h6 class="title-6">Grupo Bimbo S.A de C.V</h6>
                            <span>Hace 1 día</span>
                        </div>
                    </div>
                </div>
            </div>


        </section>
    </div>




</div>
<script>
let btnForm = document.getElementById("busquedaMobil");
let btnHidden = document.getElementById("form-mobil");

btnForm.addEventListener("click", () => {
    btnHidden.classList.add("aparecerInput");
    btnForm.style.display = 'none';
});
</script>