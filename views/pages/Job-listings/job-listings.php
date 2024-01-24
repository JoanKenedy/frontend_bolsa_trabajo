<?php
   if(isset($urlParams[1])){
    if(is_numeric($urlParams[1])){
        $startAt = ($urlParams[1]*3) -3;
    }else{
       echo '<script>
       window.location = "'.$path.$urlParams[0].'"
       </script>';
    }

   }else{
    $startAt = 0;
   }

     $url = CurlController::api() . 'crear_vacantes';
        $method = 'GET';
        $fields = array();
        $header = array();
        $totalVacantes = CurlController::request($url, $method, $fields, $header);
        $rows = $totalVacantes->total;




?>

<main>

    <header class="site-header">
        <div class="section-overlay"></div>

        <div class="container">
            <div class="row">

                <div class="col-lg-12 col-12 text-center">
                    <h1 class="text-white">Job Listings</h1>

                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item"><a href="index.html">Home</a></li>

                            <li class="breadcrumb-item active" aria-current="page">Job listings</li>
                        </ol>
                    </nav>
                </div>

            </div>
        </div>
    </header>

    <!-- <section class="section-padding pb-0 d-flex justify-content-center align-items-center">
        <div class="container">
            <div class="row">

                <div class="col-lg-12 col-12">
                    <form class="custom-form hero-form" action="#" method="get" role="form">
                        <h3 class="text-white mb-3">Search your dream job</h3>

                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-12">
                                <div class="input-group">
                                    <span class="input-group-text" id="basic-addon1"><i class="bi-person custom-icon"></i></span>

                                    <input type="text" name="job-title" id="job-title" class="form-control" placeholder="Job Title" required>
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6 col-12">
                                <div class="input-group">
                                    <span class="input-group-text" id="basic-addon1"><i class="bi-geo-alt custom-icon"></i></span>

                                    <input type="text" name="job-location" id="job-location" class="form-control" placeholder="Location" required>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-4 col-12">
                                <div class="input-group">
                                    <span class="input-group-text" id="basic-addon1"><i class="bi-cash custom-icon"></i></span>

                                    <select class="form-select form-control" name="job-salary" id="job-salary" aria-label="Default select example">
                                        <option selected>Salary Range</option>
                                        <option value="1">$300k - $500k</option>
                                        <option value="2">$10000k - $45000k</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-4 col-12">
                                <div class="input-group">
                                    <span class="input-group-text" id="basic-addon1"><i class="bi-laptop custom-icon"></i></span>

                                    <select class="form-select form-control" name="job-level" id="job-level" aria-label="Default select example">
                                        <option selected>Level</option>
                                        <option value="1">Internship</option>
                                        <option value="2">Junior</option>
                                        <option value="2">Senior</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-4 col-12">
                                <div class="input-group">
                                    <span class="input-group-text" id="basic-addon1"><i class="bi-laptop custom-icon"></i></span>

                                    <select class="form-select form-control" name="job-remote" id="job-remote" aria-label="Default select example">
                                        <option selected>Remote</option>
                                        <option value="1">Full Time</option>
                                        <option value="2">Contract</option>
                                        <option value="2">Part Time</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-lg-12 col-12">
                                <button type="submit" class="form-control">
                                    Search job
                                </button>
                            </div>

                            <div class="col-12">
                                <div class="d-flex flex-wrap align-items-center mt-4 mt-lg-0">
                                    <span class="text-white mb-lg-0 mb-md-0 me-2">Popular keywords:</span>

                                    <div>
                                        <a href="job-listings.html" class="badge">Web design</a>

                                        <a href="job-listings.html" class="badge">Marketing</a>

                                        <a href="job-listings.html" class="badge">Customer support</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="col-lg-6 col-12">
                    <img src="images/4557388.png" class="hero-image img-fluid" alt="">
                </div>

            </div>
        </div>
    </section> -->


    <section class="job-section section-padding">
        <div class="container">
            <div class="row align-items-center">

                <div class="col-lg-6 col-12 mb-lg-4">
                    <h3>Results of 30-65 of 1500 jobs</h3>
                </div>

                <div class="col-lg-4 col-12 d-flex align-items-center ms-auto mb-5 mb-lg-4">
                    <p class="mb-0 ms-lg-auto">Sort by:</p>

                    <div class="dropdown dropdown-sorting ms-3 me-4">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownSortingButton"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Newest Jobs
                        </button>

                        <ul class="dropdown-menu" aria-labelledby="dropdownSortingButton">
                            <li><a class="dropdown-item" href="#">Lastest Jobs</a></li>

                            <li><a class="dropdown-item" href="#">Highed Salary Jobs</a></li>

                            <li><a class="dropdown-item" href="#">Internship Jobs</a></li>
                        </ul>
                    </div>

                    <div class="d-flex">
                        <a href="#" class="sorting-icon active bi-list me-2"></a>

                        <a href="#" class="sorting-icon bi-grid"></a>
                    </div>
                </div>
                <?php foreach ($totalVacantes->results as $key=>$vacante) : ?>
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="job-thumb job-thumb-box">
                        <div class="job-image-box-wrap">
                            <a href="job-details.html">
                                <img src="images/jobs/it-professional-works-startup-project.jpg"
                                    class="job-image img-fluid" alt="">
                            </a>

                            <div class="job-image-box-wrap-info d-flex align-items-center">
                                <p class="mb-0">
                                    <a href="job-listings.html" class="badge badge-level">Internship</a>
                                </p>

                                <p class="mb-0">
                                    <a href="job-listings.html" class="badge">Freelance</a>
                                </p>
                            </div>
                        </div>

                        <div class="job-body">
                            <h4 class="job-title">
                                <a href="job-details.html"
                                    class="job-title-link"><?php echo $vacante->title_vacante ?></a>
                            </h4>

                            <div class="d-flex align-items-center">
                                <div class="job-image-wrap d-flex align-items-center bg-white shadow-lg mt-2 mb-4">
                                    <img src="images/logos/salesforce.png" class="job-image me-3 img-fluid" alt="">

                                    <p class="mb-0">Salesforce</p>
                                </div>

                                <a href="#" class="bi-bookmark ms-auto me-2">
                                </a>

                                <a href="#" class="bi-heart">
                                </a>
                            </div>

                            <div class="d-flex align-items-center">
                                <p class="job-location">
                                    <i class="custom-icon bi-geo-alt me-1"></i>
                                    <?php echo $vacante->lugar_de_trabajo  ?>
                                </p>

                                <p class="job-date">
                                    <i class="custom-icon bi-clock me-1"></i>
                                    <?php echo $vacante->fecha_de_publicacion   ?>
                                </p>
                            </div>

                            <div class="d-flex align-items-center border-top pt-3">
                                <p class="job-price mb-0">
                                    <i class="custom-icon bi-cash me-1"></i>
                                    $<?php echo$vacante->rango_sueldo?>
                                </p>

                                <a href="job-details.html" class="custom-btn btn ms-auto">Postularme</a>
                            </div>
                        </div>
                    </div>
                </div>

                <?php endforeach ?>



                <div class="col-lg-12 col-12">
                    <?php 
                    if(isset($urlParams[1])){
                        $currentPage = $urlParams[1];
                    }else{
                       $currentPage = 1;
                    }
                
                    
                    ?>
                    <ul class="paginacion" data-total-pages="<?php echo ceil($rows/3) ?>"
                        data-current-page="<?php echo $currentPage ?>"
                        data-url-page="<?php echo $_SERVER['REQUEST_URI'] ?>">

                    </ul>
                </div>

            </div>
        </div>
    </section>


    <section class="cta-section">
        <div class="section-overlay"></div>

        <div class="container">
            <div class="row">

                <div class="col-lg-6 col-10">
                    <h2 class="text-white mb-2">Over 10k opening jobs</h2>

                    <p class="text-white">Gotto Job is a free HTML CSS template for job hunting related websites. This
                        layout is based on the famous Bootstrap 5 CSS framework. Thank you for visiting Tooplate
                        website.</p>
                </div>

                <div class="col-lg-4 col-12 ms-auto">
                    <div class="custom-border-btn-wrap d-flex align-items-center mt-lg-4 mt-2">
                        <a href="#" class="custom-btn custom-border-btn btn me-4">Create an account</a>

                        <a href="#" class="custom-link">Post a job</a>
                    </div>
                </div>

            </div>
        </div>
    </section>
</main>