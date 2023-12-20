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

$url = CurlController::api() . "relations?rel=estudios,curriculums,usuarios&type=estudio,curriculum,usuario&linkTo=id_usuario&equalTo=" . $data . "";
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

?>
<div class="container grid-padre">


    <div class="grid-container">
        <div class="grid-1">
            <div class="grid-inter">
                <div class="grid-header">
                    <img src="images/avatar/usuario.png" alt="">
                </div>
                <div class="grid-body">
                    <p><?php echo $verificarRel->results[0]->nombre  ?> <?php echo $verificarRel->results[0]->apellidos  ?></p>
                    <p><?php echo $verificarRel->results[0]->estado  ?> <?php echo $verificarRel->results[0]->pais  ?></p>
                    <p>Email: <?php echo $verificarRel->results[0]->email  ?> </p>
                    <p>Teléfono: <?php echo $verificarRel->results[0]->telefono  ?></p>
                </div>
            </div>

        </div>
        <div class="grid-2">
            <div class="grid-inter">
                <div class="grid-header">
                    <h6>Habilidades</h6>
                    <p>Las habilidades ayudan a tener un perfil más atractivo y completo.</p>

                </div>
                <div class="grid-body">
                    <i class="bi bi-plus-circle-fill icon-agregar"></i> <span>Agregar</span>
                </div>
            </div>
        </div>
        <div class="grid-9">
            <div class="grid-inter">
                <div class="grid-header">
                    <h6>Archivos y enlaces</h6>
                    <p>Adjunta tu currículo en Word/PDF para conocer más sobre ti.</p>
                </div>
                <div class="grid-body">
                    <i class="bi bi-plus-circle-fill icon-agregar"></i> <span>Agregar</span>
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
                <p><?php echo $verificarRel->results[0]->fecha_inicio  ?>-<?php echo $verificarRel->results[0]->fecha_termino  ?></p>
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
                <p><?php echo $verificarRel2->results[0]->fecha_inicio  ?>-<?php echo $verificarRel2->results[0]->fecha_termino  ?></p>


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
            </div>
            <div class="grid-body">
                <i class="bi bi-plus-circle-fill icon-agregar"></i> <span>Agregar</span>
            </div>
        </div>
        <div class="grid-8">
            <div class="grid-header">
                <h6>Cursos y certificaciones</h6>
                <p> Compártenos si tienes cursos complementarios o certificados que validan tus conocimientos.</p>
            </div>
            <div class="grid-body">
                <i class="bi bi-plus-circle-fill icon-agregar"></i> <span>Agregar</span>
            </div>
        </div>
        <div class="grid-6">
            <div class="grid-header">
                <h6>Áreas de especialidad</h6>
                <p> Compártenos si tienes cursos complementarios o certificados que validan tus conocimientos.</p>
            </div>
            <div class="grid-body">
                <i class="bi bi-plus-circle-fill icon-agregar"></i> <span>Agregar</span>
            </div>
        </div>
    </div>
</div>