<div class="container">

    <section class="job-section job-featured-section section-space" id="job-section">

        <div class="container">
            <a href="<?php echo $path ?>cuenta&candidato&panel">
                <span class="regresar"><i class="bi bi-arrow-return-left icon-atras"></i>Regresar</span>
            </a>
            <h4 class="text-dorado mt-2">Estos son tus resultados</h4>
            <?php
            while ($filas = mysqli_fetch_assoc($result)) {
            ?>

                <div class="col-lg-7 col-12 my-3">
                    <div class="wraper-job">
                        <div class="wraper-footer-job ">
                            <div class="foto">
                                <?php if ($filas['foto_vacante'] != '') : ?>
                                    <img src="images/descargas/<?php echo $filas['foto_vacante'] ?>" alt="" class="img-redonda">
                                <?php else :  ?>
                                    <img src="images/avatar/usuario.png" alt="">
                                <?php endif; ?>
                            </div>

                            <div class="job-titulo2  text-center mb-lg-0">
                                <p class="job-title-link"><?php echo $filas['title_vacante'] ?></p>
                                <p class="">

                                    <?php echo $filas['fecha_de_publicacion'] ?>
                                </p>
                            </div>

                            <div class="wraper-footer-job-description text-center">
                                <p class="">
                                    <i class="custom-icon bi-cash me-1"></i>
                                    $<?php echo $filas['rango_sueldo'] ?>MXN
                                </p>
                                <p class="">
                                    <i class="custom-icon bi-geo-alt me-1"></i>
                                    <?php echo $filas['lugar_de_trabajo'] ?>
                                </p>
                            </div>


                            <div class="container-btn-postular">
                                <a href="<?php echo $path ?>cuenta&candidato&panel&vacante_detalles?id_vacante=<?php echo $filas['id_vacante']     ?>" class="custom-btn btn">Ver más</a>
                            </div>
                        </div>
                    </div>

                </div>



            <?php

            }


            ?>


        </div>

    </section>

</div>