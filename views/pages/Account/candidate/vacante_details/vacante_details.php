<main>
    <?php
     $id_vacante = $_GET['id_vacante'];
      $data = $_SESSION['rol']->id_usuario;
    
                    $url = CurlController::api() . "crear_vacantes?linkTo=id_vacante&equalTo=" . $id_vacante . "&token=no";
                    $method = "GET";
                    $fields = array();
                    $header = array();
                    $verificarVacante = CurlController::request($url, $method, $fields, $header);
                    
          
               
                  
                    
    ?>

    <header class="site-header">
        <div class="section-overlay"></div>

        <div class="container">
            <div class="row">

                <div class="col-lg-12 col-12 text-center">
                    <h1 class="text-white">Detalles del empleo</h1>

                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item"><a href="<?php echo $path ?>">Home</a></li>


                        </ol>
                    </nav>
                </div>

            </div>
        </div>
    </header>


    <section class="job-section section-padding pb-0">
        <div class="container">
            <div class="row">

                <div class="col-lg-8 col-12">
                    <h2 class="job-title mb-0"><?php echo  $verificarVacante->results[0]->title_vacante ?></h2>

                    <div class="job-thumb job-thumb-detail">
                        <div class="d-flex flex-wrap align-items-center border-bottom pt-lg-3 pt-2 pb-3 mb-4">
                            <p class="job-location mb-0">
                                <i class="custom-icon bi-geo-alt me-1"></i>
                                <?php echo $verificarVacante->results[0]->lugar_de_trabajo ?>
                            </p>

                            <p class="job-date mb-0">
                                <i class="custom-icon bi-clock me-1"></i>
                                <?php echo $verificarVacante->results[0]->fecha_de_publicacion ?>
                            </p>

                            <p class="job-price mb-0">
                                <i class="custom-icon bi-cash me-1"></i>
                                <?php echo $verificarVacante->results[0]->rango_sueldo ?>MXN
                            </p>

                            <div class="d-flex">
                                <p class="mb-0">
                                    <a href="job-listings.html"
                                        class="badge badge-level"><?php echo $verificarVacante->results[0]->educacion_requerida ?></a>
                                </p>

                                <p class="mb-0">
                                    <a href="job-listings.html"
                                        class="badge"><?php echo $verificarVacante->results[0]->tipo_contratacion?></a>
                                </p>
                            </div>
                        </div>

                        <h4 class="mt-4 mb-2">Descripción:</h4>

                        <p><?php  echo $verificarVacante->results[0]->descripcion ?></p>

                        <h5 class="mt-4 mb-3">The Role</h5>

                        <p class="mb-1"><strong>Benefits:</strong> Lorem Ipsum dolor sit amet, consectetur adipsicing
                            kengan omeg kohm tokito adipcingi elit</p>

                        <p><strong>Good salary:</strong> Lorem Ipsum dolor sit amet, consectetur adipsicing kengan omeg
                            kohm tokito</p>

                        <h5 class="mt-4 mb-3">Requirements</h5>

                        <ul>
                            <li>Strong knowledge in computing skill</li>

                            <li>Minimum 5 years of working experiences consectetur omeg</li>

                            <li>Excellent interpersonal skills</li>
                        </ul>




                        <div class="d-flex justify-content-center flex-wrap mt-5 border-top pt-4">
                            <a class="custom-btn btn mt-2"
                                href="<?php echo $path ?>account&candidate&dashboard&postularme?vacante=<?php echo $verificarVacante->results[0]->id_vacante  ?>">Postularme</a>

                            <a href="" class="custom-btn custom-border-btn btn mt-2 ms-lg-4 ms-3">Regresar</a>

                            <div class="job-detail-share d-flex align-items-center">
                                <p class="mb-0 me-lg-4 me-3">Share:</p>

                                <a href="#" class="bi-facebook"></a>

                                <a href="#" class="bi-twitter mx-3"></a>

                                <a href="#" class="bi-share"></a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-12 mt-5 mt-lg-0">
                    <?php
                     $id_vacante = $_GET['id_vacante'];
                     $data = $verificarVacante->results[0]->id_usuario_vacante;
                    $url = CurlController::api() . "relations?rel=crear_vacantes,reclutadores&type=vacante,reclutador&linkTo=id_usuario_reclutador&equalTo=" . $data . "&token=no";
                    $method = "GET";
                    $fields = array();
                    $header = array();
                    $verificarVacante2 = CurlController::request($url, $method, $fields, $header);
              
                  
                    
    ?>
                    <div class="job-thumb job-thumb-detail-box bg-white shadow-lg">
                        <div class="d-flex align-items-center">
                            <div class="job-image-wrap d-flex align-items-center bg-white shadow-lg mb-3">
                                <img src="images/descargas/<?php echo $verificarVacante2->results[0]->logo_empresa ?>"
                                    class="job-image me-3 img-fluid" alt="">

                                <p class="mb-0"><?php echo $verificarVacante2->results[0]->name_empresa ?></p>
                            </div>

                            <a href="#" class="bi-bookmark ms-auto me-2"></a>

                            <a href="#" class="bi-heart"></a>
                        </div>

                        <h6 class="mt-3 mb-2">Nosotros</h6>

                        <p><?php echo $verificarVacante2->results[0]->descripcion ?></p>

                        <h6 class="mt-4 mb-3">Información de contacto</h6>

                        <p class="mb-2">
                            <i class="custom-icon bi-globe me-1"></i>

                            <a href="#" class="site-footer-link">
                                www.jobbportal.com
                            </a>
                        </p>

                        <p class="mb-2">
                            <i class="custom-icon bi-telephone me-1"></i>

                            <a href="tel: 305-240-9671" class="site-footer-link">
                                <?php echo $verificarVacante2->results[0]->telefono_empresa ?>
                            </a>
                        </p>

                        <p>
                            <i class="custom-icon bi-envelope me-1"></i>

                            <a href="mailto:info@yourgmail.com" class="site-footer-link">
                                <?php echo $verificarVacante2->results[0]->email_empresa ?>
                            </a>
                        </p>
                    </div>
                </div>

            </div>
        </div>
    </section>


</main>