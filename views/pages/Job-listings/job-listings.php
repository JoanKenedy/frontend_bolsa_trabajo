<?php
if (isset($urlParams[1])) {
    if (is_numeric($urlParams[1])) {
        $startAt = ($urlParams[1] * 3) - 3;
    } else {
        echo '<script>
       window.location = "' . $path . $urlParams[0] . '"
       </script>';
    }
} else {
    $startAt = 0;
}
$endArt = 3;

$conn = mysqli_connect('localhost', 'root', '', 'bolsa_de_trabajo');
if ($conn->connect_errno != 0) {
    echo $conn->connect_error;
    exit();
}
$todos = $conn->query("SELECT * FROM crear_vacantes");
$rows = $todos->num_rows;
$sql = $conn->query("SELECT * FROM crear_vacantes LIMIT $startAt, $endArt");





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
                            <li class="breadcrumb-item"><a href="<? echo $path ?>">Home</a></li>

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
                    <?php if (isset($urlParams[1])) : ?>
                        <h3>Pagina <?php echo $urlParams[1] ?> de <?php echo ceil($rows / 3) ?></h3>
                    <?php else : ?>
                        <h3>Pagina 1 de <?php echo ceil($rows / 3) ?></h3>
                    <?php endif ?>

                </div>

                <div class="col-lg-4 col-12 d-flex align-items-center ms-auto mb-5 mb-lg-4">


                </div>
                <?php
                while ($row = $sql->fetch_assoc()) {
                ?>
                    <div class="col-lg-4 col-md-6 col-12">
                        <div class="job-thumb job-thumb-box">
                            <div class="job-image-box-wrap">
                                <a href="#">
                                    <?php if ($row['foto_vacante'] != '') : ?>
                                        <img src="images/descargas/<?php echo $row['foto_vacante'] ?>" class="job-base img-fluid" alt="">
                                    <?php else : ?>
                                        <img src="images/avatar/job.png" class="job-todos img-fluid" alt="">
                                    <?php endif; ?>

                                </a>


                            </div>

                            <div class="job-body">
                                <h4 class="job-title">
                                    <a href="job-details.html" class="job-title-link"><?php echo $row['title_vacante'] ?></a>
                                </h4>


                                <div class="d-flex align-items-center">
                                    <p class="job-location">
                                        <i class="custom-icon bi-geo-alt me-1"></i>
                                        <?php echo $row['lugar_de_trabajo']  ?>
                                    </p>

                                    <p class="job-date">
                                        <i class="custom-icon bi-clock me-1"></i>
                                        <?php echo $row['fecha_de_publicacion']  ?>
                                    </p>
                                </div>

                                <div class="d-flex align-items-center border-top pt-3">
                                    <p class="job-price mb-0">
                                        <i class="custom-icon bi-cash me-1"></i>
                                        $<?php echo $row['rango_sueldo'] ?>
                                    </p>

                                    <a href="#" data-bs-toggle="modal" data-bs-target="#Tres" class="custom-btn btn ms-auto">Postularme</a>

                                </div>
                            </div>
                        </div>
                    </div>

                <?php
                }

                ?>




                <div class="col-lg-12 col-12 paginacion-padre">
                    <?php
                    if (isset($urlParams[1])) {
                        $currentPage = $urlParams[1];
                    } else {
                        $currentPage = 1;
                    }


                    ?>
                    <ul class="paginacion" data-total-pages="<?php echo ceil($rows / 3) ?>" data-current-page="<?php echo $currentPage ?>" data-url-page="<?php echo $_SERVER['REQUEST_URI'] ?>">

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
    <div class="modal fade" id="Tres" tabindex="-1" aria-labelledby="exampleModalLiveLabel" style="display: none;" aria-hidden="true">
        <div class="modal-dialog">

            <div class=" modal-content px-3 py-3 modal-home">
                <img src="images/descargas/user.png" alt="" class="img-redonda text-center">
                <h6 class="text-center">Para poder utilizar la plataforma tienes que registrarte.</h6>
                <a href="<?php echo $path ?>account&enrrollment" class="custom-btn custom-border-btn btn me-4">Registrarme</a>

            </div>


        </div>
    </div>
</main>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twbs-pagination/1.4.2/jquery.twbsPagination.min.js"></script>
<script>
    function pagination() {
        var target = $(".paginacion");
        if (target.length > 0) {
            target.each(function() {
                var el = $(this),
                    totalPages = el.data("total-pages"),
                    currentPage = el.data("current-page"),
                    urlPage = el.data("url-page");

                el.twbsPagination({
                    totalPages: totalPages,
                    startPage: currentPage,
                    visiblePages: 3,
                    first: 'Inicio',
                    last: 'Final',
                    prev: '<i class="bi bi-arrow-left-circle-fill"></i>',
                    next: '<i class="bi bi-arrow-right-circle-fill"></i>',
                }).on("page", function(evt, page) {
                    if (urlPage.includes("&", 1)) {
                        urlPage = urlPage.replace("&" + currentPage, "&" + page);
                        window.location = urlPage;
                    } else {
                        window.location = urlPage + "&" + page;
                    }

                })
            });
        }
    }

    pagination();
</script>