<?php
$conn = mysqli_connect('localhost', 'root', '', 'bolsa_de_trabajo');
if ($conn->connect_errno != 0) {
    echo $conn->connect_error;
    exit();
}

$sql = $conn->query("SELECT * FROM crear_vacantes LIMIT 0, 4");
?>
<main>

    <section class="hero-section d-flex justify-content-center align-items-center">
        <div class="section-overlay"></div>

        <div class="container">
            <div class="row">

                <div class="col-lg-6 col-12 mb-5 mb-lg-0">
                    <div class="hero-section-text mt-5">
                        <h6 class="text-white">¿Estás buscando el trabajo de tus sueños?</h6>

                        <h1 class="hero-title text-white mt-4 mb-4">Comienza tu historia de éxito</h1>


                    </div>
                </div>

                <div class="col-lg-6 col-12">
                    <form class="custom-form hero-form" action="#" method="get" role="form">
                        <h3 class="text-white mb-3">
                            Busca el trabajo de tus sueños</h3>

                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-12">
                                <div class="input-group">
                                    <span class="input-group-text" id="basic-addon1"><i class="bi-person custom-icon"></i></span>

                                    <input type="text" name="job-title" id="job-title" class="form-control" placeholder="Puesto de trabajo que busca" required>
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6 col-12">
                                <div class="input-group">
                                    <span class="input-group-text" id="basic-addon2"><i class="bi-geo-alt custom-icon"></i></span>

                                    <input type="text" name="job-location" id="job-location" class="form-control" placeholder="Ubicación" required>
                                </div>
                            </div>

                            <div class="col-lg-12 col-12">
                                <button type="submit" data-bs-toggle="modal" data-bs-target="#Tres" class="form-control">
                                    Buscar trabajo
                                </button>
                            </div>

                            <div class="col-12">

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
                        <div class="d-flex flex-column justify-content-center align-items-center h-100">
                            <i class="categories-icon bi-window"></i>

                            <small class="categories-block-title">Diseño Web</small>

                            <div class="categories-block-number d-flex flex-column justify-content-center align-items-center">
                                <span class="categories-block-number-text">320</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-2 col-md-4 col-6">
                    <div class="categories-block">
                        <div class="d-flex flex-column justify-content-center align-items-center h-100">
                            <i class="categories-icon bi-twitch"></i>

                            <small class="categories-block-title">Marketing</small>

                            <div class="categories-block-number d-flex flex-column justify-content-center align-items-center">
                                <span class="categories-block-number-text">180</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-2 col-md-4 col-6">
                    <div class="categories-block">
                        <div class="d-flex flex-column justify-content-center align-items-center h-100">
                            <i class="categories-icon bi-play-circle-fill"></i>

                            <small class="categories-block-title">Video</small>

                            <div class="categories-block-number d-flex flex-column justify-content-center align-items-center">
                                <span class="categories-block-number-text">340</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-2 col-md-4 col-6">
                    <div class="categories-block">
                        <div class="d-flex flex-column justify-content-center align-items-center h-100">
                            <i class="categories-icon bi-globe"></i>

                            <small class="categories-block-title">Desarrollo web</small>

                            <div class="categories-block-number d-flex flex-column justify-content-center align-items-center">
                                <span class="categories-block-number-text">140</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-2 col-md-4 col-6">
                    <div class="categories-block">
                        <div class="d-flex flex-column justify-content-center align-items-center h-100">
                            <i class="categories-icon bi-people"></i>

                            <small class="categories-block-title">Soporte Técnico</small>

                            <div class="categories-block-number d-flex flex-column justify-content-center align-items-center">
                                <span class="categories-block-number-text">84</span>
                            </div>
                        </div>
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
                        <img src="images/dr_arturo.jpeg" class="about-image custom-border-radius-start img-fluid" alt="">

                        <div class="about-info">
                            <h4 class="text-white mb-0 me-2">Arturo Muñoz</h4>

                            <p class="text-white mb-0">Fundador</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 col-12">
                    <div class="custom-text-block">
                        <h2 class="text-white mb-2">Nuestro plus...</h2>

                        <p class="text-white">Encuentra trabajos desde casa, medio tiempo y más, en la bolsa de trabajo
                            de México. En Multiservices puedes buscar empleos ideales de acuerdo a tu perfil.</p>

                        <div class="custom-border-btn-wrap d-flex align-items-center mt-5">
                            <a href="<?php echo $path ?>cuenta&reclutador&nosotros" class="custom-btn custom-border-btn btn me-4">Conócenos</a>


                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-12">
                    <div class="instagram-block">
                        <img src="images/jobs/jobs.jpg" class="about-image custom-border-radius-end img-fluid" alt="">

                        <div class="instagram-block-text">
                            <a href="https://www.instagram.com/multiservicecard/" class="custom-btn btn" target="_blank">
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
                    <div class="grid-jobs">


                        <?php
                        while ($row = $sql->fetch_assoc()) {
                        ?>
                            <div class="job-thumb d-flex">
                                <div class="job-image-wrap bg-white shadow-lg">
                                    <?php if ($row['foto_vacante']  != '') : ?>
                                        <img src="images/descargas/<?php echo $row['foto_vacante'] ?>" class="img-redonda" alt="">
                                    <?php else : ?>
                                        <img src="images/avatar/job.png" alt="" class="job-todos">
                                    <?php endif; ?>
                                </div>

                                <div class="job-body d-flex flex-wrap flex-auto align-items-center ms-4">
                                    <div class="mb-3">
                                        <h4 class="job-title mb-lg-0">
                                            <a href="job-details.html" class="job-title-link">
                                                <?php echo $row['title_vacante'] ?></a>
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
                                        <a href="<?php echo $path ?>cuenta&reclutador&panel&ver_vacante?id_vacante=<?php echo $row['id_vacante']  ?>" class="custom-btn btn">Solo ver</a>
                                    </div>
                                </div>
                            </div>


                        <?php




                        }

                        ?>










                    </div>




                    <div class="col-lg-12 col-12 text-center">
                        <a href="<?php echo $path ?>cuenta&reclutador&lista-trabajos&1" class="custom-btn btn mt-5">Todas las
                            vacantes</a>
                    </div>






                </div>

            </div>
        </div>
    </section>

    <section>
        <div class="container">
            <div class="row">

                <div class="col-lg-6 col-12">
                    <div class="custom-text-block custom-border-radius-start">
                        <h2 class="text-white mb-3">Multiservices te ayuda a conseguir un nuevo trabajo con mayor
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
                        <img src="images/people-working-as-team-company.jpg" class="about-image custom-border-radius-end img-fluid" alt="">

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

                    <div class="owl-carousel owl-theme reviews-carousel owl-loaded owl-drag">









                        <div class="owl-stage-outer">
                            <div class="owl-stage" style="transform: translate3d(-1932px, 0px, 0px); transition: all 0.25s ease 0s; width: 5313px;">
                                <div class="owl-item cloned" style="width: 453px; margin-right: 30px;">
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
                                </div>
                                <div class="owl-item cloned" style="width: 453px; margin-right: 30px;">
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
                                </div>
                                <div class="owl-item cloned" style="width: 453px; margin-right: 30px;">
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
                                <div class="owl-item" style="width: 453px; margin-right: 30px;">
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
                                </div>
                                <div class="owl-item active" style="width: 453px; margin-right: 30px;">
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
                                </div>
                                <div class="owl-item active" style="width: 453px; margin-right: 30px;">
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
                                </div>
                                <div class="owl-item" style="width: 453px; margin-right: 30px;">
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
                                </div>
                                <div class="owl-item" style="width: 453px; margin-right: 30px;">
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
                                <div class="owl-item cloned" style="width: 453px; margin-right: 30px;">
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
                                </div>
                                <div class="owl-item cloned" style="width: 453px; margin-right: 30px;">
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
                                </div>
                                <div class="owl-item cloned" style="width: 453px; margin-right: 30px;">
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
                                </div>
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

                </div>

            </div>
        </div>
    </section>
    <div class="modal fade" id="Tres" tabindex="-1" aria-labelledby="exampleModalLiveLabel" style="display: none;" aria-hidden="true">
        <div class="modal-dialog">

            <div class="modal-content px-3 py-3 modal-home">
                <img src="images/descargas/user.png" alt="" class="img-redonda">
                <h6 class="text-center">Esta función para reclutadores esta deshabilitada, en mi cuenta puedes ver y
                    editar
                    vacantes que vas postulando.</h6>
                <a href="<?php echo $path ?>cuenta&reclutador&panel" class="custom-btn custom-border-btn btn me-4">Ir a
                    mi cuenta</a>

            </div>
        </div>
    </div>
</main>