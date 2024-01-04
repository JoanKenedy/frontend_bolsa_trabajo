<?php
$data = $_GET['id_cv'];
$url = CurlController::api() . "relations?rel=estudios,curriculums,usuarios&type=estudio,curriculum,usuario&linkTo=id_usuario&equalTo=" . $data . "";
$method = "GET";
$fields = array();
$header = array();
$verificarCv = CurlController::request($url, $method, $fields, $header);

?>
<div class="container grid-padre">
    <div class="grid-container">
        <div class="grid-1">
            <div class="grid-inter">
                <div class="grid-header">
                    <?php if ($verificarCv->results[0]->foto_perfil != '') : ?>
                        <img src="images/descargas/<?php echo $verificarCv->results[0]->foto_perfil ?>" alt="" class="img-redonda">
                    <?php else :  ?>
                        <img src="images/avatar/usuario.png" alt="">
                    <?php endif; ?>

                </div>
                <div class="grid-body">
                    <p><?php echo $verificarCv->results[0]->nombre  ?>
                        <?php echo $verificarCv->results[0]->apellidos  ?></p>

                    <p>Email: <?php echo $verificarCv->results[0]->email  ?> </p>
                    <p>Teléfono: <?php echo $verificarCv->results[0]->telefono  ?></p>


                </div>

            </div>



        </div>
        <div class="grid-2">
            <div class="grid-inter">
                <div class="grid-header">
                    <h6>Habilidades</h6>
                    <p>Las habilidades ayudan a tener un perfil más atractivo y completo.(Máximo 6 habilidadades)</p>


                    <?php

                    $data = $_GET['id_cv'];
                    $url = CurlController::api() . "relations?rel=habilidades,curriculums,usuarios&type=habilidad,curriculum,usuario&linkTo=id_usuario&equalTo=" . $data . "";
                    $method = "GET";
                    $fields = array();
                    $header = array();
                    $verificarHabilidades = CurlController::request($url, $method, $fields, $header);
                    if ($verificarHabilidades->status == 404) {
                    ?>

                        <p class="text-dorado">El candidato aun no llena esta sección, cuando lo haga se actualizaran automaticamente los datos </p>

                    <?php
                    } else {
                    ?>


                        <?php

                        $data = $_GET['id_cv'];
                        $url = CurlController::api() . "habilidades?linkTo=id_usuario_habilidad&equalTo=" . $data . "&token=no";
                        $method = "GET";
                        $fields = array();
                        $header = array();
                        $verificarRel4 = CurlController::request($url, $method, $fields, $header)->results;

                        ?>
                        <div class="col-lg-12 col-12">
                            <div class="container-habilidades">
                                <?php foreach ($verificarRel4 as $key => $value) : ?>
                                    <div class="item-container-habilidades">

                                        <p><?php echo $value->title_habilidad ?></p>


                                    </div>
                                <?php endforeach ?>
                            </div>


                        </div>

                    <?php
                    }
                    ?>

                </div>


            </div>
        </div>
        <div class="grid-9">
            <div class="grid-inter">
                <div class="grid-header">
                    <h6>Archivo</h6>
                    <p>Adjunta tu currículum en Word/PDF para conocer más sobre ti.</p>
                    <?php

                    $data = $_GET['id_cv'];
                    $url = CurlController::api() . "relations?rel=archivos,curriculums,usuarios&type=archivo,curriculum,usuario&linkTo=id_usuario&equalTo=" . $data . "";
                    $method = "GET";
                    $fields = array();
                    $header = array();
                    $verificarCv = CurlController::request($url, $method, $fields, $header);
                    if ($verificarCv->status == 404) {
                    ?>

                        <p class="text-dorado">El candidato aun no llena esta sección, cuando lo haga se actualizaran automaticamente los datos </p>

                    <?php
                    } else {
                    ?>


                        <?php

                        $data = $_GET['id_cv'];
                        $url = CurlController::api() . "archivos?linkTo=id_usuario_archivo&equalTo=" . $data . "&token=no";
                        $method = "GET";
                        $fields = array();
                        $header = array();
                        $verificarRel6 = CurlController::request($url, $method, $fields, $header);

                        ?>
                        <div class="col-lg-12 col-12">
                            <div class="container-idioma">

                                <div class="item-container-idioma">
                                    <p><?php echo $verificarRel6->results[0]->title_archivo ?></p>
                                    <a href="images/descargas/<?php echo $verificarRel6->results[0]->link_archivo ?>" target="_blank">CV <i class="bi bi-cloud-download-fill"></i></a>
                                </div>

                            </div>


                        </div>

                    <?php
                    }
                    ?>
                </div>
                <div class="grid-body">

                </div>
            </div>

        </div>

    </div>
    <div class="grid-container">
        <?php

        $data = $_GET['id_cv'];
        $url = CurlController::api() . "relations?rel=estudios,curriculums,usuarios&type=estudio,curriculum,usuario&linkTo=id_usuario&equalTo=" . $data . "";
        $method = "GET";
        $fields = array();
        $header = array();
        $verificarCv = CurlController::request($url, $method, $fields, $header);


        ?>
        <div class="grid-3">
            <div class="grid-header">
                <h6>Objetivo Profesional</h6>
                <span>Puesto</span>
                <p><?php echo $verificarCv->results[0]->puesto ?></p>
            </div>
            <div class="grid-body">
                <span>Sueldo aproximado</span>
                <p><?php echo $verificarCv->results[0]->sueldo_aprox ?> MXN</p>
            </div>

        </div>
        <div class="grid-4">
            <div class="grid-header">
                <h6>Grado Academico</h6>
                <p><?php echo $verificarCv->results[0]->nombre_escuela ?></p>
                <p><?php echo $verificarCv->results[0]->title_carrera ?></p>
                <p><?php echo $verificarCv->results[0]->fecha_inicio ?> - <?php echo $verificarCv->results[0]->fecha_termino ?></p>
            </div>
            <div class="grid-body">
                <span>Nivel</span>
                <p> <?php echo $verificarCv->results[0]->nivel_academico ?></p>
            </div>

        </div>
        <div class="grid-5">
            <?php

            $data = $_GET['id_cv'];
            $url = CurlController::api() . "relations?rel=trabajos,curriculums,usuarios&type=trabajo,curriculum,usuario&linkTo=id_usuario&equalTo=" . $data . "";
            $method = "GET";
            $fields = array();
            $header = array();
            $verificarCvTrabajo = CurlController::request($url, $method, $fields, $header);


            ?>
            <div class="grid-header">
                <h6>Experiencia profesional</h6>
                <p><?php echo  $verificarCvTrabajo->results[0]->nombre_empresa ?></p>
                <p><?php echo  $verificarCvTrabajo->results[0]->puesto_de_trabajo ?></p>
                <p>
                    <?php echo  $verificarCvTrabajo->results[0]->fecha_inicio ?>-<?php echo  $verificarCvTrabajo->results[0]->fecha_termino ?>
                </p>


            </div>
            <div class="grid-body">
                <span>Descripción</span>
                <p> <?php echo  $verificarCvTrabajo->results[0]->descripcion_trabajo ?></p>
            </div>

        </div>


        <div class="grid-7">

            <div class="grid-header">
                <h6>Idiomas</h6>
                <p>Describe los idiomas que conoces, incluso tu idioma nativo.</p>




                <?php

                $data = $_GET['id_cv'];
                $url = CurlController::api() . "relations?rel=idiomas,curriculums,usuarios&type=idioma,curriculum,usuario&linkTo=id_usuario&equalTo=" . $data . "";
                $method = "GET";
                $fields = array();
                $header = array();
                $verificarCv = CurlController::request($url, $method, $fields, $header);
                if ($verificarCv->status == 404) {
                ?>

                    <p class="text-dorado">El candidato aun no llena esta sección, cuando lo haga se actualizaran automaticamente los datos </p>

                <?php
                } else {
                ?>


                    <?php

                    $data = $_GET['id_cv'];
                    $url = CurlController::api() . "idiomas?linkTo=id_usuario_idioma&equalTo=" . $data . "&token=no";
                    $method = "GET";
                    $fields = array();
                    $header = array();
                    $verificarRel3 = CurlController::request($url, $method, $fields, $header)->results;
                    ?>
                    <div class="col-lg-12 col-12">
                        <div class="container-idioma-edit">
                            <?php foreach ($verificarRel3 as $key => $value) : ?>
                                <div class="item-container-idioma-edit">

                                    <p>Idioma: <?php echo $value->title_idioma ?></p>
                                    <p>Nivel: <?php echo $value->nivel_idioma ?></p>


                                </div>
                            <?php endforeach ?>
                        </div>


                    </div>

                <?php
                }
                ?>





            </div>

            <div class="grid-body">


            </div>

        </div>
        <div class="grid-8">
            <div class="grid-header">
                <h6>Cartas de recomendacion</h6>
                <p> </p>
                <?php

                $data = $_GET['id_cv'];
                $url = CurlController::api() . "relations?rel=cursos_certificaciones,curriculums,usuarios&type=certificacion,curriculum,usuario&linkTo=id_usuario&equalTo=" . $data . "";
                $method = "GET";
                $fields = array();
                $header = array();
                $verificarEspecialidaes = CurlController::request($url, $method, $fields, $header);
                if ($verificarEspecialidaes->status == 404) {
                ?>

                    <p class="text-dorado">El candidato aun no llena esta sección, cuando lo haga se actualizaran automaticamente los datos </p>

                <?php
                } else {
                ?>


                    <?php

                    $data = $_GET['id_cv'];
                    $url = CurlController::api() . "cursos_certificaciones?linkTo=id_usuario_certificacion&equalTo=" . $data . "&token=no";
                    $method = "GET";
                    $fields = array();
                    $header = array();
                    $verificarRel7 = CurlController::request($url, $method, $fields, $header)->results;
                    ?>
                    <div class="col-lg-12 col-12">
                        <div class="container-idioma">
                            <?php foreach ($verificarRel7 as $key => $value) : ?>
                                <div class="item-container-idioma">

                                    <p><?php echo $value->nombre_certificacion ?></p>

                                    <a href="images/descargas/<?php echo $value->enlace ?>" target="_blank">Certificado <i class="bi bi-cloud-download-fill"></i></a>



                                </div>
                            <?php endforeach ?>
                        </div>


                    </div>

                <?php
                }
                ?>
            </div>
            <div class="grid-body">

            </div>
        </div>
        <div class="grid-6" id="container-especialidades">
            <div class="grid-header">
                <h6>Áreas de especialidad</h6>
                <p> Compártenos en que áreas destacas (Máximo 4 especialidades). </p>
                <?php

                $data = $_GET['id_cv'];
                $url = CurlController::api() . "relations?rel=especialidades,curriculums,usuarios&type=especialidad,curriculum,usuario&linkTo=id_usuario&equalTo=" . $data . "";
                $method = "GET";
                $fields = array();
                $header = array();
                $verificarEspecialidaes = CurlController::request($url, $method, $fields, $header);
                if ($verificarEspecialidaes->status == 404) {
                ?>

                    <p class="text-dorado">El candidato aun no llena esta sección, cuando lo haga se actualizaran automaticamente los datos </p>

                <?php

                } else {

                ?>


                    <?php

                    $data = $_GET['id_cv'];
                    $url = CurlController::api() . "especialidades?linkTo=id_usuario_especialidad&equalTo=" . $data . "&token=no";
                    $method = "GET";
                    $fields = array();
                    $header = array();
                    $verificarRel5 = CurlController::request($url, $method, $fields, $header)->results;
                    ?>
                    <div class="col-lg-12 col-12">
                        <div class="container-idioma">
                            <?php foreach ($verificarRel5 as $key => $value) : ?>
                                <div class="item-container-idioma">

                                    <p><?php echo $value->title_especialidad ?></p>



                                </div>

                            <?php endforeach ?>

                        </div>



                    </div>

                <?php
                }
                ?>
            </div>
            <div class="grid-body">

            </div>



        </div>
    </div>

</div>