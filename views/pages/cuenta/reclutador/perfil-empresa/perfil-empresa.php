<?php
if (!isset($_SESSION['rol']->rol_usuario_id)) {
    header('location:cuenta&acceso');
    return;
} else {
    if ($_SESSION['rol']->rol_usuario_id != 2) {
        header('location:cuenta&acceso');
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
$editEmpresPerfil1 = new RecruitersController();
$editEmpresPerfil1->editarEmpresaPerfil1();
$editEmpresPerfil12 = new RecruitersController();
$editEmpresPerfil12->editarEmpresaPerfil2();
$editEmpresPerfil13 = new RecruitersController();
$editEmpresPerfil13->editarEmpresaPerfil3();
$editEmpresPerfil14 = new RecruitersController();
$editEmpresPerfil14->editarEmpresaPerfil4();


if ($verificarRelation->status == 404) {

    header('location:cuenta&reclutador&datos_empresa');
};

?>

<div class="container grid-padre">


    <div class="grid-container">
        <div class="grid-1">
            <div class="grid-inter">
                <div class="grid-header">
                    <?php if ($verificarRelation->results[0]->logo_empresa != '') : ?>
                        <img src="images/descargas/<?php echo $verificarRelation->results[0]->logo_empresa ?>" alt="" class="img-redonda">
                    <?php else :  ?>
                        <img src="images/avatar/usuario.png" alt="">
                    <?php endif; ?>

                </div>
                <div class="grid-body">
                    <p><?php echo $verificarRelation->results[0]->name_empresa ?></p>
                    <p>
                    </p>
                    <p>Email:<?php echo $verificarRelation->results[0]->email_empresa ?> </p>
                    <p>Teléfono:<?php echo $verificarRelation->results[0]->telefono_empresa ?> </p>
                </div>
                <button type="button" data-bs-toggle="modal" data-bs-target="#edit1" class="editar">
                    <i class=" bi bi-pencil-fill icon-editar"></i>

                </button>
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
                <h6>Ubicación</h6>
                <span>Pais: <?php echo $verificarRelation->results[0]->pais ?></span>
                <p>Estado o ciudad: <?php echo $verificarRelation->results[0]->estado ?></p>
            </div>
            <div class="grid-body">
                <span>Dirección: <?php echo $verificarRelation->results[0]->direccion ?></span>
                <p>Codigó postal: <?php echo $verificarRelation->results[0]->codigo_postal ?> </p>
            </div>
            <button type="button" data-bs-toggle="modal" data-bs-target="#edit2" class="editar">
                <i class=" bi bi-pencil-fill icon-editar"></i>

            </button>

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
            <button type="button" data-bs-toggle="modal" data-bs-target="#edit3" class="editar">
                <i class=" bi bi-pencil-fill icon-editar"></i>

            </button>

        </div>
        <div class="grid-5">
            <div class="grid-header">
                <h6>Datos ante la ley</h6>
                <p>Razón social: <?php echo $verificarRelation->results[0]->razon_social ?> </p>
                <p>Rfc: <?php echo $verificarRelation->results[0]->rfc ?></p>
            </div>
            <div class="grid-body">

            </div>
            <button type="button" data-bs-toggle="modal" data-bs-target="#edit4" class="editar">
                <i class=" bi bi-pencil-fill icon-editar"></i>

            </button>
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
    <div class="modal fade" id="edit1" tabindex="-1" aria-labelledby="exampleModalLiveLabel" style="display: none;" aria-hidden="true">
        <div class="modal-dialog" style="width: 80%;">
            <?php

            $data = $_SESSION['rol']->id_usuario;
            $url = CurlController::api() . "reclutadores?linkTo=id_usuario_reclutador&equalTo=" . $data . "";
            $method = "GET";
            $fields = array();
            $header = array();
            $verificarCvRe = CurlController::request($url, $method, $fields, $header);



            ?>
            <div class="modal-content px-3 py-3">
                <form class=" requires-validation" novalidate method="post" role="form" enctype="multipart/form-data">
                    <p class=" text-center  text-dorado">
                        Para que te contacten manten actualizados tus datos y permite que las empresan te contacten
                    </p>

                    <input type="hidden" value="<?php echo CurlController::api() ?>" id="urlApi">
                    <div class="row ">
                        <div class="col-lg-12 col-md-12 col-12">
                            <div class="input-control">

                                <p class="text-label2">Nombre de la empresa o negocio:</p>
                                <input type="text" name="nameEditEmpresa" class="form-control input-group" placeholder="ej: Grupo Bimbo" required value="<?php echo $verificarCvRe->results[0]->name_empresa ?>">

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

                                <p class="text-label2">Teléfono empresarial o de contacto:</p>
                                <input type="text" name="telEditContacto" class="form-control input-group" placeholder="Teléfono empresarial o contacto principal" required value="<?php echo $verificarCvRe->results[0]->telefono_empresa ?>">

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

                                <p class="text-label2">Email empresarial o de contacto:</p>
                                <input type="email" name="emailEditContacto" class="form-control input-group" placeholder="Email " required value="<?php echo $verificarCvRe->results[0]->email_empresa ?>">

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

                                <p class="text-label2">Logo de la empresa:</p>
                                <input type="file" name="fotoEditEmpresa" class="form-control input-group" required>

                                <div class="valid-feedback">
                                    Válido
                                </div>
                                <div class="invalid-feedback">
                                    ¡Apellidos es requerido!
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 col-12 m-auto my-3">
                            <button type="submit" class="form-control" id="btn-register" name="datos_edit_empresa">
                                Guardar y continuar
                            </button>
                        </div>


                    </div>

                </form>

            </div>
        </div>
    </div>
    <div class="modal fade" id="edit2" tabindex="-1" aria-labelledby="exampleModalLiveLabel" style="display: none;" aria-hidden="true">
        <div class="modal-dialog" style="width: 80%;">
            <?php

            $data = $_SESSION['rol']->id_usuario;
            $url = CurlController::api() . "reclutadores?linkTo=id_usuario_reclutador&equalTo=" . $data . "";
            $method = "GET";
            $fields = array();
            $header = array();
            $verificarCvRe2 = CurlController::request($url, $method, $fields, $header);



            ?>
            <div class="modal-content px-3 py-3">
                <form class=" requires-validation" novalidate method="post" role="form">
                    <p class=" text-center  text-dorado">
                        Para que te contacten manten actualizados tus datos y permite que las empresan te contacten
                    </p>

                    <input type="hidden" value="<?php echo CurlController::api() ?>" id="urlApi">
                    <div class="row ">
                        <div class="col-lg-12 col-md-12 col-12">
                            <div class="input-control">

                                <p class="text-label2">Pais:</p>

                                <select name="paisEditEmpresa" class=" input-group select">
                                    <option value="AR">Argentina</option>
                                    <option value="BS">Bahamas</option>
                                    <option value="BO">Bolivia</option>
                                    <option value="BR">Brasil</option>
                                    <option value="CA">Canadá</option>
                                    <option value="CO">Colombia</option>
                                    <option value="CU">Cuba</option>
                                    <option value="EC">Ecuador</option>
                                    <option value="SV">El Salvador</option>
                                    <option value="ES">España</option>
                                    <option value="US">Estados Unidos</option>
                                    <option value="GP">Guadalupe</option>
                                    <option value="GT">Guatemala</option>
                                    <option value="GY">Guayana</option>
                                    <option value="GF">Guayana Francesa</option>
                                    <option value="HT">Haití</option>
                                    <option value="HN">Honduras</option>
                                    <option value="MX">México</option>
                                    <option value="PY">Paraguay</option>
                                    <option value="PE">Perú</option>
                                    <option value="TT">Trinidad y Tobago</option>
                                    <option value="UY">Uruguay</option>
                                    <option value="VE">Venezuela</option>

                                </select>

                            </div>
                        </div>


                        <div class="col-lg-12 col-md-12 col-12">
                            <div class="input-control">

                                <p class="text-label2">Estado, ciudad o provincia:</p>
                                <input type="text" name="estadoEditEmpresa" class="form-control input-group" placeholder="Estado o Provincia" required value="<?php echo $verificarCvRe2->results[0]->estado ?>">

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

                                <p class="text-label2">Codigó postal:</p>
                                <input type="text" name="postalEditEmpresa" class="form-control input-group" placeholder="Codigó postal" required value="<?php echo $verificarCvRe2->results[0]->codigo_postal ?>">

                                <div class="valid-feedback">
                                    Válido
                                </div>
                                <div class="invalid-feedback">
                                    ¡Correo es requerido!
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-12">
                            <div class="input-control">

                                <p class="text-label2">Dirección:</p>
                                <input type="text" name="direccionEditEmpresa" class="form-control input-group" placeholder="Dirección Completa" required value="<?php echo $verificarCvRe2->results[0]->direccion ?>">

                                <div class="valid-feedback">
                                    Válido
                                </div>
                                <div class="invalid-feedback">
                                    ¡Teléfono es requerido!
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 col-12 m-auto my-3">
                            <button type="submit" class="form-control" id="btn-register" name="datos_edit_empresa2">
                                Guardar y continuar
                            </button>
                        </div>


                    </div>

                </form>

            </div>
        </div>
    </div>
    <div class="modal fade" id="edit3" tabindex="-1" aria-labelledby="exampleModalLiveLabel" style="display: none;" aria-hidden="true">
        <div class="modal-dialog" style="width: 80%;">
            <?php

            $data = $_SESSION['rol']->id_usuario;
            $url = CurlController::api() . "reclutadores?linkTo=id_usuario_reclutador&equalTo=" . $data . "";
            $method = "GET";
            $fields = array();
            $header = array();
            $verificarCvRe3 = CurlController::request($url, $method, $fields, $header);



            ?>
            <div class="modal-content px-3 py-3">
                <form class=" requires-validation" novalidate method="post" role="form" enctype="multipart/form-data">
                    <p class=" text-center  text-dorado">
                        Para que te contacten manten actualizados tus datos y permite que las empresan te contacten
                    </p>

                    <input type="hidden" value="<?php echo CurlController::api() ?>" id="urlApi">
                    <div class="row ">
                        <div class="col-lg-12 col-md-12 col-12">
                            <div class="input-control">
                                <p class="text-label2">Numero de trabajadores:</p>
                                <input type="text" name="giroEditEmpresa" class="form-control input-group" placeholder="Teléfono empresarial o contacto principal" required value="<?php echo $verificarCvRe->results[0]->giro_empresa ?>">

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
                                <p class="text-label2">Numero de trabajadores:</p>
                                <input type="text" name="numEditEmpleado" class="form-control input-group" placeholder="Teléfono empresarial o contacto principal" required value="<?php echo $verificarCvRe->results[0]->num_trabajadores ?>">

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

                                <p class="text-label2">Descripcion:</p>
                                <input type="text" name="descripcionEditR" class="form-control input-group" placeholder="Email " required value="<?php echo $verificarCvRe->results[0]->descripcion ?>">

                                <div class="valid-feedback">
                                    Válido
                                </div>
                                <div class="invalid-feedback">
                                    ¡Apellidos es requerido!
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 col-12 m-auto my-3">
                            <button type="submit" class="form-control" id="btn-register" name="datos_edit_empresa3">
                                Guardar y continuar
                            </button>
                        </div>


                    </div>

                </form>

            </div>
        </div>
    </div>
    <div class="modal fade" id="edit4" tabindex="-1" aria-labelledby="exampleModalLiveLabel" style="display: none;" aria-hidden="true">
        <div class="modal-dialog" style="width: 80%;">
            <?php

            $data = $_SESSION['rol']->id_usuario;
            $url = CurlController::api() . "reclutadores?linkTo=id_usuario_reclutador&equalTo=" . $data . "";
            $method = "GET";
            $fields = array();
            $header = array();
            $verificarCvRe = CurlController::request($url, $method, $fields, $header);



            ?>
            <div class="modal-content px-3 py-3">
                <form class=" requires-validation" novalidate method="post" role="form" enctype="multipart/form-data">
                    <p class=" text-center  text-dorado">
                        Para que te contacten manten actualizados tus datos y permite que las empresan te contacten
                    </p>

                    <input type="hidden" value="<?php echo CurlController::api() ?>" id="urlApi">
                    <div class="row ">
                        <div class="col-lg-12 col-md-12 col-12">
                            <div class="input-control">

                                <p class="text-label2">Razón social:</p>
                                <input type="text" name="razonEditEmpresa" class="form-control input-group" placeholder="ej: Grupo Bimbo" required value="<?php echo $verificarCvRe->results[0]->razon_social ?>">

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

                                <p class="text-label2">Rfc:</p>
                                <input type="text" name="rfcEditContacto" class="form-control input-group" placeholder="Teléfono empresarial o contacto principal" required value="<?php echo $verificarCvRe->results[0]->rfc ?>">

                                <div class="valid-feedback">
                                    Válido
                                </div>
                                <div class="invalid-feedback">
                                    ¡Apellidos es requerido!
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 col-12 m-auto my-3">
                            <button type="submit" class="form-control" id="btn-register" name="datos_edit_empresa4">
                                Guardar y continuar
                            </button>
                        </div>


                    </div>

                </form>

            </div>
        </div>
    </div>
</div>