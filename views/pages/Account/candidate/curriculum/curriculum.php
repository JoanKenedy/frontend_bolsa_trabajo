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
}


?>
<div class="container grid-padre">
    <div class="grid-container">
        <div class="grid-1">
            <div class="grid-inter">
                <div class="grid-header">
                    <img src="images/avatar/usuario.png" alt="">
                </div>
                <div class="grid-body">
                    <p>Johans Kepler Zepeda</p>
                    <p>Naucalpan, Estado de México</p>
                </div>
            </div>

        </div>
        <div class="grid-2">
            <div class="grid-inter">
                <div class="grid-header">
                    <h6>Habilidades</h6>
                    <p>Las habilidades ayudan a tener un perfil más atractivo y completo.</p>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatem veritatis necessitatibus assumenda autem consequatur laborum soluta repellat magnam doloremque temporibus?</p>
                </div>
                <div class="grid-body">
                    <i class="bi bi-plus-circle-fill"></i>
                </div>
            </div>

        </div>
    </div>
    <div class="grid-container">

        <div class="grid-3">
            <div class="grid-header">
                <h6>Objetivo Profesional</h6>
                <span>Puesto</span>
                <p>Desarollador de Software</p>
            </div>
            <div class="grid-body">
                <span>Sueldo aproximado</span>
                <p>12,000 mxn</p>
            </div>
        </div>
        <div class="grid-4">
            <div class="grid-header">
                <h6>Grado Academico</h6>
                <p>UNAM Facultad de Ciencias</p>
                <p>Ingenieria en Computación</p>
                <p>2019-2024</p>
            </div>
            <div class="grid-body">
                <p>Universidad concluida </p>
            </div>
        </div>
        <div class="grid-5">
            <div class="grid-header">
                <h6>Experiencia profesional</h6>
                <p>Desarrollador Front-End</p>
                <p>2019-Actualidad</p>
                <p>Ingenieria en Computación</p>

            </div>
            <div class="grid-body">
                <p>Universidad concluida </p>
            </div>
        </div>
        <div class="grid-6">
            <div class="grid-header">
                <h6>Áreas de especialidad</h6>
                <p> Compártenos si tienes cursos complementarios o certificados que validan tus conocimientos.</p>
            </div>
            <div class="grid-body">
                <i class="bi bi-plus-circle-fill"></i>
            </div>
        </div>

        <div class="grid-7">
            <div class="grid-header">
                <h6>Idiomas</h6>
                <p>Describe los idiomas que conoces, incluso tu idioma nativo.</p>
            </div>
            <div class="grid-body">
                <i class="bi bi-plus-circle-fill"></i>
            </div>
        </div>
        <div class="grid-8">
            <div class="grid-header">
                <h6>Cursos y certificaciones</h6>
                <p> Compártenos si tienes cursos complementarios o certificados que validan tus conocimientos.</p>
            </div>
            <div class="grid-body">
                <i class="bi bi-plus-circle-fill"></i>
            </div>
        </div>
        <div class="grid-9">
            <div class="grid-header">
                <h6>Archivos y enlaces</h6>
                <p>Adjunta tu currículo en Word/PDF para conocer más sobre ti.</p>
            </div>
            <div class="grid-body">
                <i class="bi bi-plus-circle-fill"></i>
            </div>
        </div>
    </div>

</div>