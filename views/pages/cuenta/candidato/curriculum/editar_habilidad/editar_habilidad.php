<div class="container-edit ">
    <a href="<?php echo $path ?>cuenta&candidato&curriculum" class="btn-regresar">
        <span class="regresar"><i class="bi bi-arrow-return-left icon-atras"></i>Regresar</span>
    </a>
    <div class="modal-dialog">
        <div class="modal-content px-3 py-3">
            <form class="" novalidate method="post" role="form">
                <?php
                $id_data = $_GET['id_habilidad'];
                $data = $_SESSION['rol']->id_usuario;
                $url = CurlController::api() . "habilidades?linkTo=id_habilidad&equalTo=" . $id_data . "&token=no";
                $method = "GET";
                $fields = array();
                $header = array();
                $verificarHabilidad = CurlController::request($url, $method, $fields, $header);
                $editHabilidadPerfil = new UsersController();
                $editHabilidadPerfil->editHabilidadPerfil($verificarHabilidad);


                ?>

                <input type="hidden" value="<?php echo CurlController::api() ?>" id="urlApi">
                <div class="row ">
                    <div class="col-lg-12 col-md-12 col-12">
                        <div class="input-control">

                            <p class="text-label2">Describe en una palabra o frase corta tus habilidades:</p>
                            <input type="text" name="title_edit_habilidad" class="form-control input-group" placeholder="ej: Autodidacta o Lider nato" required value="<?php echo $verificarHabilidad->results[0]->title_habilidad  ?>">

                            <div class="valid-feedback">
                                Válido
                            </div>
                            <div class="invalid-feedback">
                                ¡Apellidos es requerido!
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 col-12 my-3  ">
                        <button type="submit" class="form-control" id="btn-register" name="datos_edit_habilidad">
                            Guardar y continuar
                        </button>
                    </div>


                </div>

            </form>
        </div>
    </div>
</div>