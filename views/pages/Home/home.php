<main>

    <section class="hero-section d-flex justify-content-center align-items-center">
        <div class="section-overlay"></div>

        <div class="container">
            <div class="row">

                <div class="col-lg-6 col-12 mb-5 mb-lg-0">
                    <div class="hero-section-text mt-5">
                        <h6 class="text-white">¿Estás buscando el trabajo de tus sueños?</h6>

                        <h1 class="hero-title text-white mt-4 mb-4">Comienza tu historia de éxito</h1>

                        <!-- <a href="#categories-section" class="custom-btn custom-border-btn btn">Categorías</a> -->
                    </div>
                </div>

                <div class="col-lg-6 col-12">
                    <form class="custom-form hero-form" action="#" method="get" role="form">
                        <h3 class="text-white mb-3">
                            Busca el trabajo de tus sueños</h3>

                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-12">
                                <div class="input-group">
                                    <span class="input-group-text" id="basic-addon1"><i
                                            class="bi-person custom-icon"></i></span>

                                    <input type="text" name="job-title" id="job-title" class="form-control"
                                        placeholder="Job Title" required>
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6 col-12">
                                <div class="input-group">
                                    <span class="input-group-text" id="basic-addon2"><i
                                            class="bi-geo-alt custom-icon"></i></span>

                                    <input type="text" name="job-location" id="job-location" class="form-control"
                                        placeholder="Location" required>
                                </div>
                            </div>

                            <div class="col-lg-12 col-12 my-2">
                                <button type="submit" data-bs-toggle="modal" data-bs-target="#Uno" class="form-control">
                                    Buscar trabajo
                                </button>

                            </div>


                        </div>
                    </form>
                </div>

            </div>
        </div>
    </section>


    <section class="categories-section section-padding" id="categories-section">
        <div class="container">
            <div class="row justify-content-center align-items-center">

                <div class="col-lg-12 col-12 text-center">
                    <h2 class="mb-5">Categorias</span></h2>
                </div>

                <div class="col-lg-2 col-md-4 col-6">
                    <div class="categories-block">
                        <a href="#" class="d-flex flex-column justify-content-center align-items-center h-100">
                            <i class="categories-icon bi-window"></i>

                            <small class="categories-block-title">Diseño Web</small>

                            <div
                                class="categories-block-number d-flex flex-column justify-content-center align-items-center">
                                <span class="categories-block-number-text">320</span>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="col-lg-2 col-md-4 col-6">
                    <div class="categories-block">
                        <a href="#" class="d-flex flex-column justify-content-center align-items-center h-100">
                            <i class="categories-icon bi-twitch"></i>

                            <small class="categories-block-title">Marketing</small>

                            <div
                                class="categories-block-number d-flex flex-column justify-content-center align-items-center">
                                <span class="categories-block-number-text">180</span>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="col-lg-2 col-md-4 col-6">
                    <div class="categories-block">
                        <a href="#" class="d-flex flex-column justify-content-center align-items-center h-100">
                            <i class="categories-icon bi-play-circle-fill"></i>

                            <small class="categories-block-title">Video</small>

                            <div
                                class="categories-block-number d-flex flex-column justify-content-center align-items-center">
                                <span class="categories-block-number-text">340</span>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="col-lg-2 col-md-4 col-6">
                    <div class="categories-block">
                        <a href="#" class="d-flex flex-column justify-content-center align-items-center h-100">
                            <i class="categories-icon bi-globe"></i>

                            <small class="categories-block-title">Desarrollo web</small>

                            <div
                                class="categories-block-number d-flex flex-column justify-content-center align-items-center">
                                <span class="categories-block-number-text">140</span>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="col-lg-2 col-md-4 col-6">
                    <div class="categories-block">
                        <a href="#" class="d-flex flex-column justify-content-center align-items-center h-100">
                            <i class="categories-icon bi-people"></i>

                            <small class="categories-block-title">Soporte Técnico</small>

                            <div
                                class="categories-block-number d-flex flex-column justify-content-center align-items-center">
                                <span class="categories-block-number-text">84</span>
                            </div>
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </section>


    <section class="about-section">
        <div class="container">
            <div class="row">

                <div class="col-lg-3 col-12">
                    <div class="about-image-wrap custom-border-radius-start">
                        <img src="images/dr_arturo.jpeg" class="about-image custom-border-radius-start img-fluid"
                            alt="">

                        <div class="about-info">
                            <h4 class="text-white mb-0 me-2">Arturo Muñoz</h4>

                            <p class="text-white mb-0">Fundador</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 col-12">
                    <div class="custom-text-block">
                        <h2 class="text-white mb-2">Nuestro plus...</h2>

                        <p class="text-white">Nuestra plataforma de búsqueda de trabajo es una herramienta innovadora
                            diseñada para ayudar a los candidatos a encontrar oportunidades laborales y a las empresas a
                            encontrar talento. Con una amplia base de datos de empleos y una interfaz intuitiva,
                            facilitamos el proceso de búsqueda y contratación.</p>

                        <div class="custom-border-btn-wrap d-flex align-items-center mt-5">
                            <a href="<?php echo $path ?>about.php"
                                class="custom-btn custom-border-btn btn me-4">Conócenos</a>


                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-12">
                    <div class="instagram-block">
                        <img src="images/jobs/jobs.jpg" class="about-image custom-border-radius-end img-fluid" alt="">

                        <div class="instagram-block-text">
                            <a href="https://www.instagram.com/multiservicecard/?igshid=ZDdkNTZiNTM%3D"
                                class="custom-btn btn">
                                <i class="bi-instagram"></i>
                                @Multiservicescard
                            </a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>


    <section class="job-section job-featured-section section-padding" id="job-section">
        <div class="container">
            <div class="row">

                <div class="col-lg-6 col-12 text-center mx-auto mb-4">
                    <h2>Trabajos destacados</h2>

                    <p><strong>Encuentra las mejores oportunidades</strong> </p>
                </div>

                <div class="col-lg-12 col-12">

                    <?php

                    while ($row = $sql->fetch_assoc()) {
                    ?>

                    <div class="job-thumb d-flex">
                        <div class="job-image-wrap bg-white shadow-lg">
                            <img src="images/logos/google.png" class="job-image img-fluid" alt="">
                        </div>

                        <div class="job-body d-flex flex-wrap flex-auto align-items-center ms-4">
                            <div class="mb-3">
                                <h4 class="job-title mb-lg-0">
                                    <a href="job-details.html" class="job-title-link">
                                        <?php echo $row['title_vacante']  ?></a>
                                </h4>

                                <div class="d-flex flex-wrap align-items-center">
                                    <p class="job-location mb-0">
                                        <i class="custom-icon bi-geo-alt me-1"></i>
                                        <?php echo $row['lugar_de_trabajo'] ?>
                                    </p>

                                    <p class="job-date mb-0">
                                        <i class="custom-icon bi-clock me-1"></i>
                                        <?php echo $row['fecha_de_publicacion'] ?>
                                    </p>

                                    <p class="job-price mb-0">
                                        <i class="custom-icon bi-cash me-1"></i>
                                        $<?php echo $row['rango_sueldo'] ?>
                                    </p>

                                </div>
                            </div>

                            <div class="job-section-btn-wrap">
                                <a href="#" type="button" data-bs-toggle="modal" data-bs-target="#Dos"
                                    class="custom-btn btn">Postularme</a>

                            </div>
                        </div>
                    </div>

                    <?php
                    }



                    ?>




                </div>
                <div class="col-lg-12 col-12 text-center">
                    <a href="<?php echo $path ?>job-listings.php" class="custom-btn btn mt-5">Todas las
                        vacantes</a>
                </div>

            </div>
        </div>
    </section>


    <section class="">
        <div class="container">
            <div class="row">

                <div class="col-lg-6 col-12">
                    <div class="custom-text-block custom-border-radius-start">
                        <h2 class="text-white mb-3">MultiservicesJob te ayuda a conseguir un nuevo trabajo con mayor
                            facilidad</h2>

                        <p class="text-white"></p>

                        <div class="d-flex mt-4">
                            <div class="counter-thumb">
                                <div class="d-flex">
                                    <span class="counter-number" data-from="1" data-to="12" data-speed="1000"></span>
                                    <span class="counter-number-text">M</span>
                                </div>

                                <span class="counter-text">Usuarios activos diarios</span>
                            </div>

                            <div class="counter-thumb">
                                <div class="d-flex">
                                    <span class="counter-number" data-from="1" data-to="450" data-speed="1000"></span>
                                    <span class="counter-number-text">k</span>
                                </div>

                                <span class="counter-text">Apertura de empleos</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 col-12">
                    <div class="video-thumb">
                        <img src="images/people-working-as-team-company.jpg"
                            class="about-image custom-border-radius-end img-fluid" alt="">

                        <div class="video-info">
                            <a href="https://www.youtube.com/tooplate" class="youtube-icon bi-youtube"></a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <section class="reviews-section section-padding">
        <div class="container">
            <div class="row">

                <div class="col-lg-12 col-12">
                    <h2 class="text-center mb-5">Clientes felices</h2>

                    <div class="owl-carousel owl-theme reviews-carousel">
                        <div class="reviews-thumb">

                            <div class="reviews-info d-flex align-items-center">
                                <img src="images/avatar/slider1.jpg" class="avatar-image img-fluid" alt="">

                                <div class="d-flex align-items-center justify-content-between flex-wrap w-100 ms-3">
                                    <p class="mb-0">
                                        <strong>Susan L</strong>
                                        <small>Abogada</small>
                                    </p>

                                    <div class="reviews-icons">
                                        <i class="bi-star-fill"></i>
                                        <i class="bi-star-fill"></i>
                                        <i class="bi-star-fill"></i>
                                        <i class="bi-star-fill"></i>
                                        <i class="bi-star-fill"></i>
                                    </div>
                                </div>
                            </div>

                            <div class="reviews-body">
                                <img src="images/left-quote.png" class="quote-icon img-fluid" alt="">

                                <h4 class="reviews-title">Encontre la opotunidad de trabajo en multiservices job, no
                                    pense que fuera tan rapido, estoy muy feliz.</h4>
                            </div>
                        </div>

                        <div class="reviews-thumb">
                            <div class="reviews-info d-flex align-items-center">
                                <img src="images/avatar/slider2.jpg" class="avatar-image img-fluid" alt="">

                                <div class="d-flex align-items-center justify-content-between flex-wrap w-100 ms-3">
                                    <p class="mb-0">
                                        <strong>Jaquelin R.</strong>
                                        <small>Diseñadora web</small>
                                    </p>

                                    <div class="reviews-icons">
                                        <i class="bi-star-fill"></i>
                                        <i class="bi-star-fill"></i>
                                        <i class="bi-star-fill"></i>
                                        <i class="bi-star"></i>
                                        <i class="bi-star"></i>
                                    </div>
                                </div>
                            </div>

                            <div class="reviews-body">
                                <img src="images/left-quote.png" class="quote-icon img-fluid" alt="">

                                <h4 class="reviews-title">Tenia dos meses sin encontrar trabajo,me entere de
                                    multiservices job y fue muy facil.Tambien he adquirido su tarjeta der descuentos.
                                </h4>
                            </div>
                        </div>

                        <div class="reviews-thumb">

                            <div class="reviews-info d-flex align-items-center">
                                <img src="images/avatar/slider3.jpg" class="avatar-image img-fluid" alt="">

                                <div class="d-flex align-items-center justify-content-between flex-wrap w-100 ms-3">
                                    <p class="mb-0">
                                        <strong>Jose R.</strong>
                                        <small>Vendedor a detalle</small>
                                    </p>

                                    <div class="reviews-icons">
                                        <i class="bi-star-fill"></i>
                                        <i class="bi-star-fill"></i>
                                        <i class="bi-star-fill"></i>
                                        <i class="bi-star-fill"></i>
                                        <i class="bi-star-fill"></i>
                                    </div>
                                </div>
                            </div>

                            <div class="reviews-body">
                                <img src="images/left-quote.png" class="quote-icon img-fluid" alt="">

                                <h4 class="reviews-title">En la bolsa de trabajo hay varias opciones y oportunidades de
                                    trabajo.Se los recomiendo.</h4>
                            </div>
                        </div>

                        <div class="reviews-thumb">
                            <div class="reviews-info d-flex align-items-center">
                                <img src="images/avatar/foto.jpg" class="avatar-image img-fluid" alt="">

                                <div class="d-flex align-items-center justify-content-between flex-wrap w-100 ms-3">
                                    <p class="mb-0">
                                        <strong>Jackson Dev</strong>
                                        <small>Desallorador de apps</small>
                                    </p>

                                    <div class="reviews-icons">
                                        <i class="bi-star-fill"></i>
                                        <i class="bi-star-fill"></i>
                                        <i class="bi-star-fill"></i>
                                        <i class="bi-star"></i>
                                        <i class="bi-star"></i>
                                    </div>
                                </div>
                            </div>

                            <div class="reviews-body">
                                <img src="images/left-quote.png" class="quote-icon img-fluid" alt="">

                                <h4 class="reviews-title">Encontre una gran oportunidad de trabajo en Puerto Vallarta y
                                    la aproveche.Excelente pagina de busqueda de trabajo.</h4>
                            </div>
                        </div>

                        <div class="reviews-thumb">
                            <div class="reviews-info d-flex align-items-center">
                                <img src="images/avatar/foto2.jpg" class="avatar-image img-fluid" alt="">

                                <div class="d-flex align-items-center justify-content-between flex-wrap w-100 ms-3">
                                    <p class="mb-0">
                                        <strong>Kevin Saavedra</strong>
                                        <small>Reclutador</small>
                                    </p>

                                    <div class="reviews-icons">
                                        <i class="bi-star-fill"></i>
                                        <i class="bi-star-fill"></i>
                                        <i class="bi-star-fill"></i>
                                        <i class="bi-star-fill"></i>
                                        <i class="bi-star-fill"></i>
                                    </div>
                                </div>
                            </div>

                            <div class="reviews-body">
                                <img src="images/left-quote.png" class="quote-icon img-fluid" alt="">

                                <h4 class="reviews-title">Cubri mis vacantes en menos de 2 meses.Es una plataforma
                                    intituiva y facil de entender la recomiendo al 100%.</h4>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>


    <section class="cta-section">
        <div class="section-overlay"></div>

        <div class="container">
            <div class="row">

                <div class="col-lg-6 col-10">
                    <h2 class="text-white mb-2">Más de 10.000 puestos de trabajo vacantes</h2>


                </div>

                <div class="col-lg-4 col-12 ms-auto">
                    <div class="custom-border-btn-wrap d-flex align-items-center mt-lg-4 mt-2">
                        <a href="<?php echo $path ?>account&enrrollment"
                            class="custom-btn custom-border-btn btn me-4">Crea una cuenta</a>

                        <a href="<?php echo $path ?>account&enrrollment" class="custom-link">Anunciar un trabajo</a>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <div class="modal fade" id="Uno" tabindex="-1" aria-labelledby="exampleModalLiveLabel" style="display: none;"
        aria-hidden="true">
        <div class="modal-dialog">

            <div class="modal-content px-3 py-3 modal-home">
                <img src="images/descargas/user.png" alt="" class="img-redonda">
                <h6 class="text-center">Para poder utilizar la plataforma tienes que registrarte.</h6>
                <a href="<?php echo $path ?>account&enrrollment"
                    class="custom-btn custom-border-btn btn me-4">Registrarme</a>

            </div>
        </div>
    </div>
    <div class="modal fade" id="Dos" tabindex="-1" aria-labelledby="exampleModalLiveLabel" style="display: none;"
        aria-hidden="true">
        <div class="modal-dialog">

            <div class=" modal-content px-3 py-3 modal-home">
                <img src="images/descargas/user.png" alt="" class="img-redonda text-center">
                <h6 class="text-center">Para poder utilizar la plataforma tienes que registrarte.</h6>
                <a href="<?php echo $path ?>account&enrrollment"
                    class="custom-btn custom-border-btn btn me-4">Registrarme</a>

            </div>


        </div>
    </div>
    </div>
</main>