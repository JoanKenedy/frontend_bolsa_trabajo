<section class="contenedor-buscador d-flex justify-content-center align-items-center">
    <div class="container">
        <div class="row">

            <div class="col-lg-12 col-12 form-mobil" id="form-mobil">
                <form class="custom-form hero-form " action="#" method="get" role="form">
                    <h6 class="text-white mb-3 text-center">
                        Busca el trabajo de tus sueños</h6>

                    <div class="row">
                        <div class="col-lg-4 col-md-4 col-12">
                            <div class="input-group">
                                <span class="input-group-text" id="basic-addon1"><i class="bi-person custom-icon"></i></span>

                                <input type="text" name="job-title" class="form-control" placeholder="Job Title" required>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-4 col-12 ">
                            <div class="input-group">
                                <span class="input-group-text" id="basic-addon2"><i class="bi-geo-alt custom-icon"></i></span>

                                <input type="text" name="job-location" id="job-location" class="form-control" placeholder="Location" required>
                            </div>
                        </div>

                        <div class="col-lg-4 col-12 ">
                            <button type="submit" class="form-control">
                                Buscar trabajo
                            </button>
                        </div>


                    </div>
                </form>

            </div>
            <div class="col-lg-4 col-12 ">
                <button type="submit" class="formControl" id="busquedaMobil">
                    Buscar trabajo
                </button>
            </div>
            <div class="col-lg-12 col-12">
                <form class="custom-form hero-form " action="#" method="get" role="form" id="form-compu">
                    <h3 class="text-white mb-3 text-center">
                        Busca el trabajo de tus sueños</h3>

                    <div class="row">
                        <div class="col-lg-4 col-md-4 col-12">
                            <div class="input-group">
                                <span class="input-group-text" id="basic-addon1"><i class="bi-person custom-icon"></i></span>

                                <input type="text" name="job-title" id="job-title" class="form-control" placeholder="Job Title" required>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-4 col-12">
                            <div class="input-group">
                                <span class="input-group-text" id="basic-addon2"><i class="bi-geo-alt custom-icon"></i></span>

                                <input type="text" name="job-location" id="job-location" class="form-control" placeholder="Location" required>
                            </div>
                        </div>

                        <div class="col-lg-4 col-12">
                            <button type="submit" class="form-control">
                                Buscar trabajo
                            </button>
                        </div>


                    </div>
                </form>
            </div>

        </div>
    </div>
</section>
<div class="col-lg-6 col-12 text-center mx-auto mt-3 ">
    <h2>Explora tu espacio</h2>
</div>
<div class="container-body d-flex justify-content-center align-items-center">
    <div class="container container-father">

        <section class="job-section job-featured-section section-space" id="job-section">
            <div class="container">
                <div class="col-lg-12 col-12">
                    <div class="wraper-job">
                        <div class="wraper-footer-job ">

                            <h4 class="job-titulo  text-center mb-lg-0">
                                <a href="job-details.html" class="job-title-link">Desarrollador Web </a>
                                <p class="">

                                    Diciembre 23
                                </p>
                            </h4>

                            <div class="wraper-footer-job-description">
                                <p class="">
                                    <i class="custom-icon bi-cash me-1"></i>
                                    $12,000 a 13,500 mxn
                                </p>
                                <p class="">
                                    <i class="custom-icon bi-geo-alt me-1"></i>
                                    Delegación Benito Juarez, Ciudad de México.
                                </p>
                            </div>


                            <div class="container-btn-postular">
                                <a href="job-details.html" class="custom-btn btn">Ver más</a>
                            </div>
                        </div>
                    </div>

                </div>
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