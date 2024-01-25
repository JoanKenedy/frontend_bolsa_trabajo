<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="">
    <meta name="author" content="">
    <base href="views/" />

    <title>Multiservices bolsa de trabajo</title>
    <link rel="icon" type="image/png" href="images/logo.png" />

    <!-- CSS FILES -->
    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=League+Spartan:wght@100;300;400;600;700&display=swap" rel="stylesheet">

    <link href="css/bootstrap.min.css" rel="stylesheet">

    <link href="css/bootstrap-icons.css" rel="stylesheet">

    <link href="css/owl.carousel.min.css" rel="stylesheet">

    <link href="css/owl.theme.default.min.css" rel="stylesheet">

    <link href="css/tooplate-gotto-job.css" rel="stylesheet">
    <script src="
https://cdn.jsdelivr.net/npm/sweetalert2@11.10.0/dist/sweetalert2.all.min.js
"></script>
    <link href="
https://cdn.jsdelivr.net/npm/sweetalert2@11.10.0/dist/sweetalert2.min.css
" rel="stylesheet">

    <script src="js/header.js"></script>

</head>

<body id="top">

    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center" href="index.html">


                <div class="d-flex flex-column">
                    <strong class="logo-text">Multiservices Job</strong>
                    <small class="logo-slogan">Bolsa de trabajo</small>
                </div>
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">

                <ul class="navbar-nav align-items-center ms-lg-5">
                    <?php if (isset($_SESSION['rol'])) : ?>
                        <?php if ($_SESSION['rol']->rol_usuario_id == 1) : ?>
                            <li class="nav-item">
                                <a class="nav-link active" href="<?php echo $path ?>account&candidate&inicio">Inicio</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo $path ?>account&candidate&about">Nosotros</a>
                            </li>
                            <li class="nav-item"><a class="nav-link " href="<?php echo $path ?>account&candidate&job-listings&1">Lista de trabajos</a></li>

                            <li class="nav-item"><a class="nav-link " href="<?php echo $path ?>account&candidate&contact">Contacto</a></li>
                        <?php elseif ($_SESSION['rol']->rol_usuario_id  == 2) :  ?>
                            <li class="nav-item">
                                <a class="nav-link active" href="<?php echo $path ?>account&recruiter&inicio">Inicio</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo $path ?>account&recruiter&about">Nosotros</a>
                            </li>

                            <li class="nav-item"><a class="nav-link " href="<?php echo $path ?>account&recruiter&contact">Conctacto</a></li>
                        <?php endif; ?>
                    <?php else :  ?>
                        <li class="nav-item">
                            <a class="nav-link active" href="<?php echo $path ?> ">Inicio</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo $path ?>about.php">Nosotros</a>
                        </li>
                        <!-- <li><a class="nav-link" href="<?php echo $path ?>job-listings.php">Listado de
                            trabajos</a></li>-->
                        <li class="nav-item">
                            <a class="nav-link " href="<?php echo $path ?>contact.php">Conctacto</a>
                        </li>
                    <?php endif; ?>



                    <?php if (isset($_SESSION['rol'])) : ?>
                        <?php if ($_SESSION['rol']->rol_usuario_id == 1) : ?>

                            <li class="nav-item ms-lg-auto mx-3 ">
                                <a class="nav-link custom-btn btn" href="<?php echo $path ?>account&candidate&curriculum">MI
                                    CV</a>
                            </li>
                            <li class="nav-item ms-lg-auto mx-3 ">
                                <a class="nav-link custom-btn btn" href="<?php echo $path ?>account&candidate&dashboard">Mi
                                    perfil</a>
                            </li>
                            <li class="nav-item ms-lg-auto btn-compu">
                                <a href="nav-link custom-btn btn"> <img src="images/avatar/usuario.png" alt="" class="img_perfil">
                                    <p><?php echo $_SESSION['rol']->nombre ?></p>
                                </a>
                            </li>
                        <?php elseif ($_SESSION['rol']->rol_usuario_id  == 2) :  ?>
                            <li class="nav-item ms-lg-auto mx-3 ">
                                <a class="nav-link custom-btn btn " href="<?php echo $path ?>account&recruiter&company_profile">CV
                                    Empresa</a>
                            </li>
                            <li class="nav-item ms-lg-auto mx-3 ">
                                <a class="nav-link custom-btn btn " href="<?php echo $path ?>account&recruiter&dashboard">Mi
                                    cuenta</a>
                            </li>


                            </li>
                        <?php endif; ?>
                    <?php else :  ?>
                        <li class="nav-item ms-lg-auto">
                            <a class="nav-link" href="<?php echo $path ?>account&enrrollment">Registrarse</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link custom-btn btn" href="<?php echo $path ?>account&login">Acceso</a>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>