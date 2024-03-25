<div class="container-edit">
    <a href="<?php echo $path ?>cuenta&candidato&curriculum" class="btn-regresar">
        <span class="regresar"><i class="bi bi-arrow-return-left icon-atras"></i>Regresar</span>
    </a>
    <div class="modal-dialog">
        <div class="modal-content px-3 py-3">
            <form class="" novalidate method="post" role="form">
                <?php
                $id_data = $_GET['id_especialidad'];
                $data = $_SESSION['rol']->id_usuario;
                $url = CurlController::api() . "especialidades?linkTo=id_especialidad&equalTo=" . $id_data . "&token=no";
                $method = "GET";
                $fields = array();
                $header = array();
                $verificarEspecialidad = CurlController::request($url, $method, $fields, $header);
                $editEspecialidadPerfil = new UsersController();
                $editEspecialidadPerfil->editEspecialidadPerfil($verificarEspecialidad);


                ?>

                <input type="hidden" value="<?php echo CurlController::api() ?>" id="urlApi">
                <div class="row ">
                    <div class="col-lg-12 col-md-12 col-12">
                        <div class="input-control">

                            <p class="text-label2">Edita la palabra o frase:</p>
                            <input type="text" name="title_edit_especialidad" class="form-control input-group" placeholder="ej:Especialidad en Redes" required value="<?php echo $verificarEspecialidad->results[0]->title_especialidad  ?>">

                            <div class="valid-feedback">
                                Válido
                            </div>
                            <div class="invalid-feedback">
                                ¡Apellidos es requerido!
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 col-12 my-3  ">
                        <button type="submit" class="form-control" id="btn-register" name="datos_edit_especialidad">
                            Guardar y continuar
                        </button>
                    </div>


                </div>

            </form>
        </div>
    </div>
</div>