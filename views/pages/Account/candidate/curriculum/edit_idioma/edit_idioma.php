<div class="container-edit">
    <div class="modal-dialog">
        <div class="modal-content px-3 py-3">
            <form class="" novalidate method="post" role="form">
                <?php
                $id_data = $_GET['id_idioma'];
                $data = $_SESSION['rol']->id_usuario;
                    $url = CurlController::api() . "idiomas?linkTo=id_idioma&equalTo=" . $id_data . "&token=no";
                    $method = "GET";
                    $fields = array();
                    $header = array();
                    $verificarIdioma = CurlController::request($url, $method, $fields, $header);
                    $editIdiomaPerfil = new UsersController();
                    $editIdiomaPerfil->editIdiomaPerfil($verificarIdioma);
                    

              ?>

                <input type="hidden" value="<?php echo CurlController::api() ?>" id="urlApi">
                <div class="row ">
                    <div class="col-lg-12 col-md-12 col-12">
                        <div class="input-control">

                            <p class="text-label2">Describe en una palabra o frase corta tus habilidades:</p>
                            <input type="text" name="title_edit_idioma" class="form-control input-group"
                                placeholder="ej: Autodidacta o Lider nato" required
                                value="<?php echo $verificarIdioma->results[0]->title_idioma  ?>">

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

                            <p class="text-label2">Describe en una palabra o frase corta tus habilidades:</p>
                            <input type="text" name="nivel_edit_idioma" class="form-control input-group"
                                placeholder="ej: Autodidacta o Lider nato" required
                                value="<?php echo $verificarIdioma->results[0]->nivel_idioma  ?>">

                            <div class="valid-feedback">
                                Válido
                            </div>
                            <div class="invalid-feedback">
                                ¡Apellidos es requerido!
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 col-12 my-3  ">
                        <button type="submit" class="form-control" id="btn-register" name="datos_edit_idioma">
                            Guardar y continuar
                        </button>
                    </div>


                </div>

            </form>
        </div>
    </div>
</div>