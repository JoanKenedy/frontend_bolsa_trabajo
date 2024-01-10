<div class="container">
    <h6 class="text-dorado">¿Estás buscando el trabajo de tus sueños?</h6>
    <section class="job-section job-featured-section section-padding" id="job-section">
        <div class="container">
            <div class="row">

                <div class="col-lg-6 col-12 text-center mx-auto mb-4">
                    <h2>Trabajos destacados</h2>

                    <p><strong>Encuentra las mejores oportunidades</strong> </p>
                </div>

                <div class="col-lg-12 col-12">



                    <div class="job-thumb d-flex">
                        <div class="job-image-wrap bg-white shadow-lg">
                            <img src="images/logos/google.png" class="job-image img-fluid" alt="">
                        </div>

                        <div class="job-body d-flex flex-wrap flex-auto align-items-center ms-4">
                            <div class="mb-3">
                                <h4 class="job-title mb-lg-0">
                                    <a href="job-details.html" class="job-title-link">
                                        <?php echo $filas['title_vacante'] ?></a>
                                </h4>

                                <div class="d-flex flex-wrap align-items-center">
                                    <p class="job-location mb-0">
                                        <i class="custom-icon bi-geo-alt me-1"></i>
                                        <?php echo $filas['lugar_de_trabajo'] ?>
                                    </p>

                                    <p class="job-date mb-0">
                                        <i class="custom-icon bi-clock me-1"></i>
                                        <?php echo $filas['fecha_de_publicacion'] ?>
                                    </p>

                                    <p class="job-price mb-0">
                                        <i class="custom-icon bi-cash me-1"></i>
                                        $<?php echo $filas['rango_sueldo'] ?>
                                    </p>

                                </div>
                            </div>

                            <div class="container-btn-postular">
                                <a href="<?php echo $path ?>account&candidate&dashboard&vacante_details?id_vacante=<?php echo $filas['id_vacante']   ?>"
                                    class="custom-btn btn">Ver más</a>
                            </div>
                        </div>
                    </div>











                    <nav aria-label="Page navigation example">
                        <ul class="pagination justify-content-center mt-5">
                            <li class="page-item">
                                <a class="page-link" href="#" aria-label="Previous">
                                    <span aria-hidden="true">Prev</span>
                                </a>
                            </li>

                            <li class="page-item active" aria-current="page">
                                <a class="page-link" href="#">1</a>
                            </li>

                            <li class="page-item">
                                <a class="page-link" href="#">2</a>
                            </li>

                            <li class="page-item">
                                <a class="page-link" href="#">3</a>
                            </li>

                            <li class="page-item">
                                <a class="page-link" href="#">4</a>
                            </li>

                            <li class="page-item">
                                <a class="page-link" href="#">5</a>
                            </li>

                            <li class="page-item">
                                <a class="page-link" href="#" aria-label="Next">
                                    <span aria-hidden="true">Next</span>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>

            </div>
        </div>
    </section>
</div>