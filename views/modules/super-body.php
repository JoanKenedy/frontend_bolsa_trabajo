<div class="container container-postulaciones">
    <section class="job-section job-featured-section section-space" id="job-section">

        <div class="container container-item-postulacion">

            <?php foreach ($totalPostulaciones->results as $key => $value) : ?>
            <div class=" col-12 my-4 postulaciones-item">
                <div class="wraper-job">
                    <div class="postulaciones-vacantes ">
                        <p class="text-dorado my-0"> Se postulo a tus siguientes vacantes:</p>



                        Vacante:<?php echo $value->title_vacante ?>,



                        <h4 class="job-titulo  text-center mb-lg-0">
                            <a href="job-details.html" class="job-title-link"><?php echo $value->nombre ?>
                                <?php echo $value->apellidos ?></a>

                        </h4>

                        <div class="wraper-footer-job-description">
                            <p class="">
                                <i class="custom-icon bi-cash me-1"></i>
                                Email: <?php echo $value->email ?>
                            </p>
                            <p class="">
                                <i class="custom-icon bi-geo-alt me-1"></i>
                                Email: <?php echo $value->telefono ?>

                            </p>
                        </div>


                        <div class="container-btn-postular">
                            <a href="<?php echo $path ?>account&recruiter&postulaciones&details_cv?id_cv=<?php echo $value->id_usuario_postulacion  ?>"
                                class="custom-btn btn">Ver curriculum</a>
                        </div>
                    </div>
                </div>

            </div>
            <?php endforeach ?>
        </div>

    </section>


</div>