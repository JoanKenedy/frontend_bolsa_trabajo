<?php

if (isset($urlParams[3])) {
    if (is_numeric($urlParams[3])) {
        $startAt = ($urlParams[3] * 3) - 3;
    } else {
        echo '<script>
       window.location = "' . $path . $urlParams[2] . '"
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
                    <h1 class="text-white">Lista de Trabajos</h1>

                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item"><a href="<?php echo $path ?>">Inicio</a></li>

                            <li class="breadcrumb-item active" aria-current="page">Lista de trabajos</li>
                        </ol>
                    </nav>
                </div>

            </div>
        </div>
    </header>







    <section class="job-section section-padding">
        <div class="container">
            <div class="row align-items-center">

                <div class="col-lg-6 col-12 mb-lg-4">
                    <?php if (isset($urlParams[3])) : ?>
                    <h3>Pagina <?php echo $urlParams[3] ?> de <?php echo ceil($rows / 3) ?></h3>
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
                            <a href="job-details.html">
                                <?php if ($row['foto_vacante'] != '') : ?>
                                <img src="images/descargas/<?php echo $row['foto_vacante'] ?>"
                                    class="job-base img-fluid" alt="">
                                <?php else : ?>
                                <img src="images/avatar/job.png" class="job-todos img-fluid" alt="">
                                <?php endif; ?>

                            </a>


                        </div>

                        <div class="job-body">
                            <h4 class="job-title">
                                <a href="job-details.html"
                                    class="job-title-link"><?php echo $row['title_vacante'] ?></a>
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

                                <a href="<?php echo $path ?>cuenta&candidato&panel&ver_vacante?id_vacante=<?php echo $row['id_vacante']  ?>"
                                    class="custom-btn btn">Ver más</a>

                            </div>
                        </div>
                    </div>
                </div>

                <?php
                }

                ?>




                <div class="col-lg-12 col-12 paginacion-padre">
                    <?php
                    if (isset($urlParams[3])) {
                        $currentPage = $urlParams[3];
                    } else {
                        $currentPage = 1;
                    }


                    ?>
                    <ul class="paginacion" data-total-pages="<?php echo ceil($rows / 3) ?>"
                        data-current-page="<?php echo $currentPage ?>"
                        data-url-page="<?php echo $_SERVER['REQUEST_URI'] ?>">

                    </ul>
                </div>

            </div>
        </div>
    </section>

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

</main>