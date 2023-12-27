<?php
if (!isset($_SESSION['rol']->rol_usuario_id)) {
    header('location:account&login');
    return;
} else {
    if ($_SESSION['rol']->rol_usuario_id != 2) {
        header('location:account&login');
        return;
    }
}
?>
<?php
/* Verificamos que el usuario exista */
$data = $_SESSION['rol']->id_usuario;


$url = CurlController::api() . "relations?rel=reclutadores,usuarios&type=reclutador,usuario&linkTo=id_usuario&equalTo=" . $data . "";
$method = "GET";
$fields = array();
$header = array();
$verificarRelation = CurlController::request($url, $method, $fields, $header);



if ($verificarRelation->status == 404) {

    header('location:account&recruiter&datos_empresa');
};

?>

<div class="container grid-padre">


    <div class="grid-container">
        <div class="grid-1">
            <div class="grid-inter">
                <div class="grid-header">
                    <img src="images/avatar/usuario.png" alt="">
                </div>
                <div class="grid-body">
                    <p><?php echo $verificarRelation->results[0]->name_empresa ?></p>
                    <p>
                    </p>
                    <p>Email:<?php echo $verificarRelation->results[0]->email_empresa ?> </p>
                    <p>Teléfono:<?php echo $verificarRelation->results[0]->telefono_empresa ?> </p>
                </div>
            </div>

        </div>
        <!--  <div class="grid-2">
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

        </div> -->

    </div>
    <div class="grid-container">
        <div class="grid-3">
            <div class="grid-header">

                <span>Pais: <?php echo $verificarRelation->results[0]->pais ?></span>
                <p>Estado o ciudad: <?php echo $verificarRelation->results[0]->estado ?></p>
            </div>
            <div class="grid-body">
                <span>Dirección: <?php echo $verificarRelation->results[0]->direccion ?></span>
                <p>Codigó postal: <?php echo $verificarRelation->results[0]->codigo_postal ?> </p>
            </div>
        </div>
        <div class="grid-4">
            <div class="grid-header">
                <h6>Datos Generales</h6>
                <p>Giro de la empresa: <?php echo $verificarRelation->results[0]->giro_empresa ?> </p>
                <p>Numero de Trabajadores : <?php echo $verificarRelation->results[0]->num_trabajadores ?></p>
                <p>
                    Descripción: <?php echo $verificarRelation->results[0]->descripcion ?>
                </p>
            </div>
            <div class="grid-body">

            </div>
        </div>
        <div class="grid-5">
            <div class="grid-header">
                <h6>Datos ante la ley</h6>
                <p>Razón social: <?php echo $verificarRelation->results[0]->razon_social ?> </p>
                <p>Rfc: <?php echo $verificarRelation->results[0]->rfc ?></p>
                <p>
                </p>


            </div>
            <div class="grid-body">

            </div>
        </div>


        <!--   <div class="grid-7">
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
        </div> -->
    </div>
</div>