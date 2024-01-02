<div class="container my-5">
    <?php
    $datosEmpresa = new RecruitersController();
    $datosEmpresa->datosEmpresa();
    /* Verificamos que el usuario exista */
    $data = $_SESSION['rol']->id_usuario;

    $url = CurlController::api() . "relations?rel=reclutadores,usuarios&type=reclutador,usuario&linkTo=id_usuario&equalTo=" . $data . "";
    $method = "GET";
    $fields = array();
    $header = array();
    $verificarRelation = CurlController::request($url, $method, $fields, $header);




    ?>
    <div class="ps-my-account">
        <div class="container">
            <form class="custom-form hero-form form-login requires-validation" novalidate method="post" role="form">
                <p class=" text-center  text-white">
                    Para que te contacten manten actualizados tus datos y permite que las empresan te contacten
                </p>

                <input type="hidden" value="<?php echo CurlController::api() ?>" id="urlApi">
                <div class="row ">
                    <div class="col-lg-6 col-md-6 col-12">
                        <div class="input-control">

                            <p class="text-label">Nombre de la empresa o negocio:</p>
                            <input type="text" name="nameEmpresa" class="form-control input-group"
                                placeholder="ej: Grupo Bimbo" required>

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

                            <p class="text-label">Teléfono empresarial o de contacto:</p>
                            <input type="text" name="telContacto" class="form-control input-group"
                                placeholder="Teléfono empresarial o contacto principal" required>

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

                            <p class="text-label">Email empresarial o de contacto:</p>
                            <input type="email" name="emailContacto" class="form-control input-group"
                                placeholder="Email " required>

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

                            <p class="text-label">Pais:</p>

                            <select name="paisEmpresa" class=" input-group select">
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


                    <div class="col-lg-6 col-md-6 col-12">
                        <div class="input-control">

                            <p class="text-label">Estado, ciudad o provincia:</p>
                            <input type="text" name="estadoEmpresa" class="form-control input-group"
                                placeholder="Estado o Provincia" required>

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

                            <p class="text-label">Codigó postal:</p>
                            <input type="text" name="postalEmpresa" class="form-control input-group"
                                placeholder="Codigó postal" required>

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

                            <p class="text-label">Dirección:</p>
                            <input type="text" name="direccionEmpresa" class="form-control input-group"
                                placeholder="Dirección Completa" required>

                            <div class="valid-feedback">
                                Válido
                            </div>
                            <div class="invalid-feedback">
                                ¡Teléfono es requerido!
                            </div>
                        </div>
                    </div>




                    <div class="col-lg-12 col-12 m-auto">
                        <button type="submit" class="form-control" id="btn-register" name="datos_empresa">
                            Guardar y continuar
                        </button>
                    </div>


                </div>

            </form>
        </div>
    </div>


</div>