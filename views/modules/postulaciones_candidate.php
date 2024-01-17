<div class="container container-postulaciones">

    <section class="job-section job-featured-section section-space" id="job-section">
        <h4 class="text-dorado  px-3">Te postulaste a las siguientes vacantes:</h4>
        <div class="container container-item-postulacion">


            <?php foreach ($totalPostulacionesCandidato->results as $key => $value) : ?>
                <div class=" col-12 postulaciones-item">
                    <div class="wraper-job">
                        <div class="postulaciones-vacantes ">


                            <h4 class="job-titulo  text-center mb-lg-0">
                                <a href="job-details.html" class="job-title-link"><?php echo $value->title_vacante ?></a>

                            </h4>

                            <div class="wraper-footer-job-description postulaciones-job">

                                <?php

                                $url = CurlController::api() . "reclutadores?linkTo=id_usuario_reclutador&equalTo=" . $value->id_usuario_vacante . "";
                                $method = "GET";
                                $fields = array();
                                $header = array();


                                $datosContacto = CurlController::request($url, $method, $fields, $header);

                                ?>
                                <p class="">
                                    <i class="custom-icon bi-cash "></i>
                                    Sueldo: <?php echo $value->rango_sueldo ?>
                                </p>
                                <p class="">

                                    <i class="custom-icon bi bi-building"></i>
                                    Empresa: <?php echo $datosContacto->results[0]->name_empresa ?>

                                </p>
                                <p class="">

                                    <i class="custom-icon bi bi-envelope"></i>
                                    Email: <?php echo $datosContacto->results[0]->email_empresa ?>

                                </p>
                                <p class="">
                                    <i class="custom-icon bi bi-telephone"></i>
                                    Teléfono de contacto: <?php echo $datosContacto->results[0]->telefono_empresa ?>

                                </p>
                            </div>



                        </div>
                    </div>

                </div>
            <?php endforeach ?>
        </div>

    </section>


</div>