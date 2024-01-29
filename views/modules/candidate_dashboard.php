<?php

if (isset($urlParams[2])) {

    if ($urlParams[2] == 'search') {
        include "views/pages/Account/candidate/search/search.php";
    }
} else if (isset($urlParams[3])) {
    if ($urlParams[3] == $_GET['page']) {
        include "views/pages/Account/candidate/dashboard/paginas/paginas.php";
    }
}
$conn = mysqli_connect('localhost', 'root', '', 'bolsa_de_trabajo');
if ($conn->connect_errno != 0) {
    echo $conn->connect_error;
    exit();
}

$limit = 3;
$page = isset($_GET['page']) ? $_GET['page'] : 1;
$start = ($page - 1) * $limit;
$todos = $conn->query("SELECT * FROM crear_vacantes");
$rows = $todos->num_rows;
$sql = $conn->query("SELECT * FROM crear_vacantes LIMIT $start, $limit");
$pages = ceil($rows / $limit);
?>


<?php


$url = CurlController::api() . "relations?rel=curriculums,usuarios&type=curriculum,usuario&linkTo=id_usuario&equalTo=" . $_SESSION['rol']->id_usuario . "";
$method = "GET";
$fields = array();
$header = array();
$siModal = CurlController::request($url, $method, $fields, $header);
if ($siModal->status == 404) {
    include "views/modules/modal-candidato.php";
}


?>
<section class="contenedor-buscador d-flex justify-content-center align-items-center">
    <div class="container">
        <div class="row">

            <div class="col-lg-12 col-12 form-mobil" id="form-mobil">
                <form class="custom-form hero-form " action="<?php echo $path ?>account&candidate&search" method="post" role="form">
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
                            <button type="submit" class="form-control" name="btnSearch">
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
                <form class="custom-form hero-form " action="<?php echo $path ?>account&candidate&search" method="post" role="form" id="form-compu">
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
                            <button type="submit" class="form-control" name="btnSearch">
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
                <?php
                while ($row = $sql->fetch_assoc()) {
                ?>
                    <div class="col-lg-12 col-12 my-3">
                        <div class="wraper-job">
                            <div class="wraper-footer-job ">
                                <div class="foto">
                                    <?php if ($row['foto_vacante']  != '') : ?>
                                        <img src="images/descargas/<?php echo $row['foto_vacante'] ?>" class="img-redonda" alt="">
                                    <?php else : ?>
                                        <img src="images/avatar/job.png" alt="" class="img-redonda">
                                    <?php endif; ?>
                                </div>

                                <div class="job-titulo2 text-center mb-lg-0">
                                    <p class="job-title-link"><?php echo  $row['title_vacante'] ?></p>
                                    <p class="">

                                        <?php echo $row['fecha_de_publicacion']  ?>
                                    </p>
                                </div>

                                <div class="wraper-footer-job-description text-center">
                                    <p class="">
                                        <i class="custom-icon bi-cash me-1"></i>
                                        $<?php echo  $row['rango_sueldo']  ?>MXN
                                    </p>
                                    <p class="">
                                        <i class="custom-icon bi-geo-alt me-1"></i>
                                        <?php echo $row['lugar_de_trabajo'] ?>
                                    </p>
                                </div>


                                <div class="container-btn-postular">
                                    <a href="<?php echo $path ?>account&candidate&dashboard&vacante_details?id_vacante=<?php echo $row['id_vacante']   ?>" class="custom-btn btn">Ver más</a>
                                </div>
                            </div>
                        </div>

                    </div>

                <?php

                }

                ?>
                <div class="col-lg-12 col-12 paginacion-2">

                    <ul class="paginar">


                        <li class="li-item"><a class="a-item" href="#" onclick="return false">
                                <span><i class="bi bi-arrow-left-circle-fill"></i></span>
                            </a></li>

                        <?php for ($i = 1; $i <= $pages; $i++) : ?>
                            <li class="li-item">
                                <a class="a-item" href="<?php echo $path ?>account&candidate&dashboard&paginas?page=<?php echo $i ?>"><?php echo $i ?></a>
                            </li>
                        <?php endfor; ?>


                        <li class="li-item">
                            <a class="a-item" href="<?php echo $path ?>account&candidate&dashboard&paginas?page=<?php echo 2 ?>">
                                <span><i class="bi bi-arrow-right-circle-fill"></i></span>
                            </a>
                        </li>





                    </ul>


                </div>

            </div>



        </section>
        <section class="grid-curriculum-index">

            <div class="container container-grid-curriculum-index">
                <div class="grid-item-curriculum-index">
                    <?php if ($_SESSION['rol']->foto_perfil != '') : ?>
                        <img src="images/descargas/<?php echo $_SESSION['rol']->foto_perfil ?>" alt="" class="img-redonda">
                    <?php else :  ?>
                        <img src="images/avatar/usuario.png" alt="">
                    <?php endif; ?>

                    <h6 class="title-6 text-dorado">¡ <?php echo $_SESSION['rol']->nombre ?> !</h6>
                    <span><i class="bi bi-check-circle-fill icon-check"></i> &nbsp; Tu curriculum esta activo</span>
                </div>
                <div class="grid-item-curriculum-index">
                    <h6>Visitas a mi curriculum</h6>
                    <div class="grid-item-body">
                        <div class="grid-item-img">
                            <img src="images/logos/google.png" class="img-wraper-job" alt="">
                        </div>
                        <div class="grid-item-text">
                            <h6 class="title-6">Aun no hay datos</h6>

                        </div>
                    </div>
                </div>
                <div class="grid-item-curriculum-index">
                    <h6>Mis postulaciones</h6>
                    <!-- <div class="grid-item-body">
                        <div class="grid-item-img">
                            <img src="images/logos/google.png" class="img-wraper-job" alt="">
                        </div>
                        <div class="grid-item-text">
                            <h6 class="title-6">Grupo Bimbo S.A de C.V</h6>
                            <span>Hace 1 día</span>
                        </div>
                    </div> -->
                    <a href="<?php echo $path ?>account&candidate&postulaciones" class="custom-btn btn">Ver
                        Postulaciones</a>
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

<script>
    window.addEventListener('load', () => {
        setTimeout(function() {
            document.getElementById('automatic').classList.add('chow');
        }, 2000);
    })
    document.getElementById('cerrar_modal').addEventListener('click', () => {
        document.getElementById('automatic').classList.remove('chow');
    })
</script>