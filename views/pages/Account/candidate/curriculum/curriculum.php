<?php
if (!isset($_SESSION['rol']->rol_usuario_id)) {
    header('location:account&login');
    return;
} else {
    if ($_SESSION['rol']->rol_usuario_id != 1) {
        header('location:account&login');
        return;
    }
}
?>
<?php
/* Verificamos que el usuario exista */
$data = $_SESSION['rol']->id_usuario;

$url = CurlController::api() . "relations?rel=curriculums,usuarios&type=curriculum,usuario&linkTo=id_usuario&equalTo=" . $data . "";
$method = "GET";
$fields = array();
$header = array();
$verificarRel = CurlController::request($url, $method, $fields, $header);


if ($verificarRel->status == 404) {

    header('location:account&candidate&datos_contacto');
};

?>
<?php

$data = $_SESSION['rol']->id_usuario;

$url = CurlController::api() . "relations?rel=trabajos,curriculums,usuarios&type=trabajo,curriculum,usuario&linkTo=id_usuario&equalTo=" . $data . "";
$method = "GET";
$fields = array();
$header = array();
$verificarRel2 = CurlController::request($url, $method, $fields, $header);


$url = CurlController::api() . "relations?rel=estudios,curriculums,usuarios&type=estudio,curriculum,usuario&linkTo=id_usuario&equalTo=" . $data . "";
$method = "GET";
$fields = array();
$header = array();
$verificarRel = CurlController::request($url, $method, $fields, $header);

?>
<?php
$datosIdiomas = new UsersController();
$datosIdiomas->datosIdioma();
$datosHabilidades = new UsersController();
$datosHabilidades->datosHabilidad();
$datosEspecialidad = new UsersController();
$datosEspecialidad->datosEspecialidad();
$enviarArchivoCurriculum = new UsersController();
$enviarArchivoCurriculum->enviarArchivoCurriculum();
$datosCertificacion = new UsersController();
$datosCertificacion->datosCertificacion();
$editarUsuarioPerfil = new UsersController();
$editarUsuarioPerfil->editarUsuarioPerfil();
?>
<div class="container grid-padre">


    <div class="grid-container">
        <div class="grid-1">
            <div class="grid-inter">
                <div class="grid-header">
                    <?php if($verificarRel->results[0]->foto_perfil != '' ): ?>
                    <img src="images/descargas/<?php echo $verificarRel->results[0]->foto_perfil ?>" alt=""
                        class="img-redonda">
                    <?php else :  ?>
                    <img src="images/avatar/usuario.png" alt="">
                    <?php endif; ?>

                </div>
                <div class="grid-body">
                    <p><?php echo $verificarRel->results[0]->nombre  ?>
                        <?php echo $verificarRel->results[0]->apellidos  ?></p>

                    <p>Email: <?php echo $verificarRel->results[0]->email  ?> </p>
                    <p>Teléfono: <?php echo $verificarRel->results[0]->telefono  ?></p>


                </div>

            </div>

            <button type="button" data-bs-toggle="modal" data-bs-target="#editarPerfil" value="" class="editar">
                <i class="bi bi-pencil-fill icon-editar"></i> <span>Editar</span>
            </button>

        </div>
        <div class="grid-2">
            <div class="grid-inter">
                <div class="grid-header">
                    <h6>Habilidades</h6>
                    <p>Las habilidades ayudan a tener un perfil más atractivo y completo.</p>


                    <?php

                    $data = $_SESSION['rol']->id_usuario;
                    $url = CurlController::api() . "relations?rel=habilidades,curriculums,usuarios&type=habilidad,curriculum,usuario&linkTo=id_usuario&equalTo=" . $data . "";
                    $method = "GET";
                    $fields = array();
                    $header = array();
                    $verificarHabilidades = CurlController::request($url, $method, $fields, $header);
                    if ($verificarHabilidades->status == 404) {
                    } else {
                    ?>


                    <?php

                        $data = $_SESSION['rol']->id_usuario;
                        $url = CurlController::api() . "habilidades?linkTo=id_usuario_habilidad&equalTo=" . $data . "&token=no";
                        $method = "GET";
                        $fields = array();
                        $header = array();
                        $verificarRel4 = CurlController::request($url, $method, $fields, $header)->results;
                        ?>
                    <div class="col-lg-12 col-12">
                        <div class="container-idioma">
                            <?php foreach ($verificarRel4 as $key => $value) : ?>
                            <div class="item-container-idioma">

                                <p><?php echo $value->title_habilidad ?></p>


                            </div>
                            <?php endforeach ?>
                        </div>


                    </div>

                    <?php
                    }
                    ?>

                </div>
                <div class="grid-body">
                    <button type="button" data-bs-toggle="modal" data-bs-target="#habilidades">
                        <i class="bi bi-plus-circle-fill icon-agregar"></i> <span>Agregar</span>
                    </button>
                </div>

            </div>
        </div>
        <div class="grid-9">
            <div class="grid-inter">
                <div class="grid-header">
                    <h6>Archivos</h6>
                    <p>Adjunta tu currículum en Word/PDF para conocer más sobre ti.</p>
                    <?php

                $data = $_SESSION['rol']->id_usuario;
                $url = CurlController::api() . "relations?rel=archivos,curriculums,usuarios&type=archivo,curriculum,usuario&linkTo=id_usuario&equalTo=" . $data . "";
                $method = "GET";
                $fields = array();
                $header = array();
                $verificarCv = CurlController::request($url, $method, $fields, $header);
                if ($verificarCv->status == 404) {
                    
                    
                } else {
                ?>


                    <?php

                    $data = $_SESSION['rol']->id_usuario;
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
                                <a href="images/descargas/<?php echo $verificarRel6->results[0]->link_archivo ?>"
                                    target="_blank">CV <i class="bi bi-cloud-download-fill"></i></a>
                            </div>

                        </div>


                    </div>

                    <?php
                }
                ?>
                </div>
                <div class="grid-body">
                    <button type="button" data-bs-toggle="modal" data-bs-target="#archivos">
                        <i class="bi bi-plus-circle-fill icon-agregar"></i> <span>Agregar</span>
                    </button>
                </div>
            </div>

        </div>

    </div>
    <div class="grid-container">
        <div class="grid-3">
            <div class="grid-header">
                <h6>Objetivo Profesional</h6>
                <span>Puesto</span>
                <p><?php echo $verificarRel->results[0]->puesto  ?></p>
            </div>
            <div class="grid-body">
                <span>Sueldo aproximado</span>
                <p><?php echo $verificarRel->results[0]->sueldo_aprox  ?> MXN</p>
            </div>
        </div>
        <div class="grid-4">
            <div class="grid-header">
                <h6>Grado Academico</h6>
                <p><?php echo $verificarRel->results[0]->nombre_escuela  ?></p>
                <p><?php echo $verificarRel->results[0]->title_carrera  ?></p>
                <p><?php echo $verificarRel->results[0]->fecha_inicio  ?>-<?php echo $verificarRel->results[0]->fecha_termino  ?>
                </p>
            </div>
            <div class="grid-body">
                <span>Estatus</span>
                <p><?php echo $verificarRel->results[0]->nivel_academico  ?> </p>
            </div>
        </div>
        <div class="grid-5">
            <div class="grid-header">
                <h6>Experiencia profesional</h6>
                <p><?php echo $verificarRel2->results[0]->nombre_empresa  ?> </p>
                <p><?php echo $verificarRel2->results[0]->puesto_de_trabajo  ?></p>
                <p><?php echo $verificarRel2->results[0]->fecha_inicio  ?>-<?php echo $verificarRel2->results[0]->fecha_termino  ?>
                </p>


            </div>
            <div class="grid-body">
                <span>Descripción</span>
                <p><?php echo $verificarRel2->results[0]->descripcion_trabajo  ?> </p>
            </div>
        </div>


        <div class="grid-7">

            <div class="grid-header">
                <h6>Idiomas</h6>
                <p>Describe los idiomas que conoces, incluso tu idioma nativo.</p>




                <?php

                $data = $_SESSION['rol']->id_usuario;
                $url = CurlController::api() . "relations?rel=idiomas,curriculums,usuarios&type=idioma,curriculum,usuario&linkTo=id_usuario&equalTo=" . $data . "";
                $method = "GET";
                $fields = array();
                $header = array();
                $verificarRel = CurlController::request($url, $method, $fields, $header);
                if ($verificarRel->status == 404) {
                } else {
                ?>


                <?php

                    $data = $_SESSION['rol']->id_usuario;
                    $url = CurlController::api() . "idiomas?linkTo=id_usuario_idioma&equalTo=" . $data . "&token=no";
                    $method = "GET";
                    $fields = array();
                    $header = array();
                    $verificarRel3 = CurlController::request($url, $method, $fields, $header)->results;
                    ?>
                <div class="col-lg-12 col-12">
                    <div class="container-idioma">
                        <?php foreach ($verificarRel3 as $key => $value) : ?>
                        <div class="item-container-idioma">

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
                <button type="button" data-bs-toggle="modal" data-bs-target="#exampleModalLive">
                    <i class="bi bi-plus-circle-fill icon-agregar"></i> <span>Agregar</span>
                </button>

            </div>

        </div>
        <div class="grid-8">
            <div class="grid-header">
                <h6>Cursos y certificaciones</h6>
                <p> Compártenos si tienes cursos complementarios o certificados que validan tus conocimientos. Solo
                    documentos (WORD O PDF)</p>
                <?php

                $data = $_SESSION['rol']->id_usuario;
                $url = CurlController::api() . "relations?rel=cursos_certificaciones,curriculums,usuarios&type=certificacion,curriculum,usuario&linkTo=id_usuario&equalTo=" . $data . "";
                $method = "GET";
                $fields = array();
                $header = array();
                $verificarEspecialidaes = CurlController::request($url, $method, $fields, $header);
                if ($verificarEspecialidaes->status == 404) {
                } else {
                ?>


                <?php

                    $data = $_SESSION['rol']->id_usuario;
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
                            <p><?php echo $value->descripcion ?></p>
                            <a href="images/descargas/<?php echo $value->enlace ?>" target="_blank">Certificado <i
                                    class="bi bi-cloud-download-fill"></i></a>


                        </div>
                        <?php endforeach ?>
                    </div>


                </div>

                <?php
                }
                ?>
            </div>
            <div class="grid-body">
                <button type="button" data-bs-toggle="modal" data-bs-target="#certificaciones">
                    <i class="bi bi-plus-circle-fill icon-agregar"></i> <span>Agregar</span>
                </button>
            </div>
        </div>
        <div class="grid-6">
            <div class="grid-header">
                <h6>Áreas de especialidad</h6>
                <p> Compártenos si tienes cursos complementarios o certificados que validan tus conocimientos.</p>
                <?php

                $data = $_SESSION['rol']->id_usuario;
                $url = CurlController::api() . "relations?rel=especialidades,curriculums,usuarios&type=especialidad,curriculum,usuario&linkTo=id_usuario&equalTo=" . $data . "";
                $method = "GET";
                $fields = array();
                $header = array();
                $verificarEspecialidaes = CurlController::request($url, $method, $fields, $header);
                if ($verificarEspecialidaes->status == 404) {
                } else {
                ?>


                <?php

                    $data = $_SESSION['rol']->id_usuario;
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
                <button type="button" data-bs-toggle="modal" data-bs-target="#especialidades">
                    <i class="bi bi-plus-circle-fill icon-agregar"></i> <span>Agregar</span>
                </button>
            </div>
        </div>
    </div>
</div>


</div>
<div class="modal fade" id="exampleModalLive" tabindex="-1" aria-labelledby="exampleModalLiveLabel"
    style="display: none;" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content px-3 py-3">

            <form class="" novalidate method="post" role="form">


                <input type="hidden" value="<?php echo CurlController::api() ?>" id="urlApi">
                <div class="row ">
                    <div class="col-lg-6 col-md-6 col-12">
                        <div class="input-control">

                            <p class="text-label2">Idioma:</p>
                            <input type="text" name="title_idioma" class="form-control input-group"
                                placeholder="ej:Ingles" required>

                            <div class="valid-feedback">
                                Válido
                            </div>
                            <div class="invalid-feedback">
                                ¡Apellidos es requerido!
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-12">
                        <div class="input-control">

                            <p class="text-label2">Nivel de idioma:</p>
                            <input type="text" name="nivel_idioma" class="form-control input-group"
                                placeholder="ej: Intermedio" required>

                            <div class="valid-feedback">
                                Válido
                            </div>
                            <div class="invalid-feedback">
                                ¡Apellidos es requerido!
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 col-12 my-3  ">
                        <button type="submit" class="form-control" id="btn-register" name="datos_idioma">
                            Guardar y continuar
                        </button>
                    </div>


                </div>

            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="habilidades" tabindex="-1" aria-labelledby="exampleModalLiveLabel" style="display: none;"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content px-3 py-3">
            <form class="" novalidate method="post" role="form">


                <input type="hidden" value="<?php echo CurlController::api() ?>" id="urlApi">
                <div class="row ">
                    <div class="col-lg-12 col-md-12 col-12">
                        <div class="input-control">

                            <p class="text-label2">Describe en una palabra o frase corta tus habilidades:</p>
                            <input type="text" name="title_habilidad" class="form-control input-group"
                                placeholder="ej: Autodidacta o Lider nato" required>

                            <div class="valid-feedback">
                                Válido
                            </div>
                            <div class="invalid-feedback">
                                ¡Apellidos es requerido!
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 col-12 my-3  ">
                        <button type="submit" class="form-control" id="btn-register" name="datos_habilidad">
                            Guardar y continuar
                        </button>
                    </div>


                </div>

            </form>
        </div>
    </div>
</div>



<div class="modal fade" id="especialidades" tabindex="-1" aria-labelledby="exampleModalLiveLabel" style="display: none;"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content px-3 py-3">
            <form class="" novalidate method="post" role="form">


                <input type="hidden" value="<?php echo CurlController::api() ?>" id="urlApi">
                <div class="row ">
                    <div class="col-lg-12 col-md-12 col-12">
                        <div class="input-control">

                            <p class="text-label2">En palabras o frase corta escribe tus especialidades:</p>
                            <input type="text" name="title_especialidad" class="form-control input-group"
                                placeholder="ej:Especialidad en Redes" required>

                            <div class="valid-feedback">
                                Válido
                            </div>
                            <div class="invalid-feedback">
                                ¡Apellidos es requerido!
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 col-12 my-3  ">
                        <button type="submit" class="form-control" id="btn-register" name="datos_especialidad">
                            Guardar y continuar
                        </button>
                    </div>


                </div>

            </form>
        </div>
    </div>
</div>


<div class="modal fade" id="certificaciones" tabindex="-1" aria-labelledby="exampleModalLiveLabel"
    style="display: none;" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content px-3 py-3">
            <form class="" novalidate method="post" role="form" enctype="multipart/form-data">


                <input type="hidden" value="<?php echo CurlController::api() ?>" id="urlApi">
                <div class="row ">
                    <div class="col-lg-12 col-md-12 col-12">
                        <div class="input-control">

                            <p class="text-label2">Titulo de curso o certificación:</p>
                            <input type="text" name="title_certificacion" class="form-control input-group"
                                placeholder="Desarrollo web con Js" required>

                            <div class="valid-feedback">
                                Válido
                            </div>
                            <div class="invalid-feedback">
                                ¡Apellidos es requerido!
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-12 col-md-12 col-12">
                        <div class="input-control">

                            <p class="text-label2">Leve descripción:</p>
                            <input type="text" name="leve_descripcion" class="form-control input-group"
                                placeholder="Elabore una pagina web con js y aprendi las bases de la www " required>

                            <div class="valid-feedback">
                                Válido
                            </div>
                            <div class="invalid-feedback">
                                ¡Apellidos es requerido!
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12 col-12">
                        <div class="input-control">

                            <p class="text-label2">Certificado o documento:</p>
                            <input type="file" name="doc_file" class="form-control input-group" required>

                            <div class="valid-feedback">
                                Válido
                            </div>
                            <div class="invalid-feedback">
                                ¡Apellidos es requerido!
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 col-12 my-3  ">
                        <button type="submit" class="form-control" id="btn-register" name="datos_certificacion">
                            Subir y guardar
                        </button>
                    </div>


                </div>

            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="archivos" tabindex="-1" aria-labelledby="exampleModalLiveLabel" style="display: none;"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content px-3 py-3">
            <form class="" novalidate method="post" role="form" enctype="multipart/form-data">


                <input type="hidden" value="<?php echo CurlController::api() ?>" id="urlApi">
                <div class="row ">
                    <div class="col-lg-12 col-md-12 col-12">
                        <div class="input-control">

                            <p class="text-label2">Titúlo del archivo:</p>
                            <input type="text" name="title_archivo" class="form-control input-group"
                                placeholder="Mi curriculum en pdf" required>

                            <div class="valid-feedback">
                                Válido
                            </div>
                            <div class="invalid-feedback">
                                ¡Apellidos es requerido!
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12 col-12">
                        <div class="input-control">

                            <p class="text-label2">Archivo (WORD O PDF) :</p>
                            <input type="file" name="archivo_file" class="form-control input-group" required>

                            <div class="valid-feedback">
                                Válido
                            </div>
                            <div class="invalid-feedback">
                                ¡Apellidos es requerido!
                            </div>
                        </div>
                    </div>






                    <div class="col-lg-12 col-12 my-3  ">
                        <button type="submit" class="form-control" id="btn-register" name="datos_archivo">
                            Subir archivo
                        </button>
                    </div>


                </div>

            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="editarPerfil" tabindex="-1" aria-labelledby="exampleModalLiveLabel" style="display: none;"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content px-3 py-3">
            <?php 
             
               $data = $_SESSION['rol']->id_usuario;
                $url = CurlController::api() . "usuarios?linkTo=id_usuario&equalTo=" . $data . "";
                $method = "GET";
                $fields = array();
                $header = array();
                $verificarCv2 = CurlController::request($url, $method, $fields, $header);
               
               
            
            ?>
            <form class=" requires-validation" novalidate method="post" role="form" enctype="multipart/form-data">
                <h4 class="text-center text-dorado my-1">Edita tu perfil</h4>
                <input type="hidden" value="<?php echo CurlController::api() ?>" id="urlApi">
                <input type="hidden" value="<?php echo $verificarCv2->results[0]->id_usuario ?>" name="id">
                <div class="row ">
                    <div class="col-lg-6 col-md-6 col-12">
                        <div class="input-control">

                            <p class="text-label2">Nombre:</p>
                            <input type="text" name="nombreEditar" class="form-control input-group"
                                placeholder="ej: Ejecutivo de ventas" required
                                value="<?php echo $verificarCv2->results[0]->nombre ?>">

                            <div class="valid-feedback">
                                Válido
                            </div>
                            <div class="invalid-feedback">
                                ¡Apellidos es requerido!
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-12">
                        <div class="input-control">

                            <p class="text-label2">Apellidos:</p>
                            <input type="text" name="apellidoEditar" class="form-control input-group"
                                placeholder="Sueldo aproximado" required
                                value="<?php echo $verificarCv2->results[0]->apellidos ?>">

                            <div class="valid-feedback">
                                Válido
                            </div>
                            <div class="invalid-feedback">
                                ¡Apellidos es requerido!
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12 col-12">
                        <div class="input-control">

                            <p class="text-label2">Telefono:</p>
                            <input type="text" name="telefonoEditar" class="form-control input-group"
                                placeholder="Estado o Provincia" required
                                value="<?php echo $verificarCv2->results[0]->telefono ?>">

                            <div class="valid-feedback">
                                Válido
                            </div>
                            <div class="invalid-feedback">
                                ¡Apellidos es requerido!
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-12 col-md-12 col-12">
                        <div class="input-control">

                            <p class="text-label2">Foto de perfil:</p>
                            <input type="file" name="foto_perfil_editar" class="form-control input-group" required
                                value="<?php echo $verificarCv2->results[0]->foto_perfil ?>">

                            <div class="valid-feedback">
                                Válido
                            </div>
                            <div class="invalid-feedback">
                                ¡Teléfono es requerido!
                            </div>
                        </div>
                    </div>




                    <div class="col-lg-12 col-12 m-auto my-3">
                        <button type="submit" class="form-control" id="btn-register" name="datos_usuario_editar">
                            Guardar y continuar
                        </button>
                    </div>


                </div>

            </form>
        </div>
    </div>
</div>