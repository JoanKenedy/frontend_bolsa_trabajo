<div class="container-edit">
    <div class="modal-dialog">
        <div class="modal-content px-3 py-3">
            <form class="" novalidate method="post" role="form" enctype="multipart/form-data">
                <?php
                $id_data = $_GET['id_certificacion'];
                $data = $_SESSION['rol']->id_usuario;
                    $url = CurlController::api() . "cursos_certificaciones?linkTo=id_certificacion&equalTo=" . $id_data . "&token=no";
                    $method = "GET";
                    $fields = array();
                    $header = array();
                    $verificarCertificacion = CurlController::request($url, $method, $fields, $header);
                    $editCertificacionPerfil = new UsersController();
                    $editCertificacionPerfil->editCertificacionPerfil($verificarCertificacion);
                    

              ?>

                <input type="hidden" value="<?php echo CurlController::api() ?>" id="urlApi">
                <div class="row ">
                    <div class="col-lg-12 col-md-12 col-12">
                        <div class="input-control">

                            <p class="text-label2">Titulo de curso o certificación:</p>
                            <input type="text" name="title_edit_certificacion" class="form-control input-group"
                                placeholder="Desarrollo web con Js" required
                                value="<?php echo $verificarCertificacion->results[0]->nombre_certificacion ?>">

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
                            <input type="file" name="doc_edit_file" class="form-control input-group" required>

                            <div class="valid-feedback">
                                Válido
                            </div>
                            <div class="invalid-feedback">
                                ¡Apellidos es requerido!
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 col-12 my-3  ">
                        <button type="submit" class="form-control" id="btn-register" name="datos_edit_certificacion">
                            Subir y guardar
                        </button>
                    </div>


                </div>

            </form>
        </div>
    </div>
</div>