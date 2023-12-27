<?php
class RecruitersController
{

    public function datosEmpresa()
    {
        $id_usuario = $_SESSION['rol']->id_usuario;



        if (isset($_POST['datos_empresa'])) {

            $url = CurlController::api() . 'reclutadores?datos_empresa=true&token="' . $_SESSION['rol']->token_user . '"';
            $method = 'POST';
            $fields = array(
                'id_usuario_reclutador' => $id_usuario,
                'email_empresa' => $_POST['emailContacto'],
                'telefono_empresa' => $_POST['telContacto'],
                'name_empresa' => $_POST['nameEmpresa'],
                'pais' => $_POST['paisEmpresa'],
                'estado' => $_POST['estadoEmpresa'],
                'direccion' => $_POST['direccionEmpresa'],
                'codigo_postal' => $_POST['postalEmpresa']

            );
            $header = array(
                'Content-Type' =>  'application/x-www-form-urlencoded'
            );

            $datosEmpresa = CurlController::request($url, $method, $fields, $header);

            if ($datosEmpresa->status == 200) {
?>

                <script>
                    function modal() {
                        let timerInterval;
                        Swal.fire({
                            title: "Cargando tus datos",
                            html: "Cerraré en <b></b> milisegundos.",
                            timer: 2000,
                            timerProgressBar: true,
                            didOpen: () => {
                                Swal.showLoading();
                                const timer = Swal.getPopup().querySelector("b");
                                timerInterval = setInterval(() => {
                                    timer.textContent = `${Swal.getTimerLeft()}`;

                                }, 100);
                            },
                            willClose: () => {
                                clearInterval(timerInterval);
                            }
                        }).then((result) => {
                            /* Read more about handling dismissals below */
                            if (result.dismiss === Swal.DismissReason.timer) {
                                console.log("I was closed by the timer");
                            }
                        });
                    }
                    modal();
                    fncFormatInputs();

                    setTimeout(() => {
                        let urlEnvio = 'http://prueba_bolsa_de_trabajo.com/';
                        location.href = `${urlEnvio}account&recruiter&datos_finales`;
                    }, "2500");
                </script>
                <?php


            } else {
                echo '<div class="alert alert-danger">Algo paso vuelva a intentar</div> <script>
                fncFormatInputs()
            </script>';
            }
        }
    }

    public function datosFinales()
    {

        $data = $_SESSION['rol']->id_usuario;
        $url = CurlController::api() . "relations?rel=reclutadores,usuarios&type=reclutador,usuario&linkTo=id_usuario&equalTo=" . $data . "";
        $method = "GET";
        $fields = array();
        $header = array();
        $verificarRel = CurlController::request($url, $method, $fields, $header);
        if ($verificarRel->status == 200) {
            if (isset($_POST['datos_finales'])) {

                $data = "razon_social=" . $_POST['razonEmpresa'] . "&rfc=" . $_POST['rfcEmpresa'] . "&giro_empresa=" . $_POST['giroEmpresa'] . "&num_trabajadores=" . $_POST['numTrabajadores'] . "&descripcion=" . $_POST['descripcionEmpresa'];

                $url = CurlController::api() . "reclutadores?id=" . $verificarRel->results[0]->id_usuario_reclutador . "&nameId=id_usuario_reclutador&token=" . $verificarRel->results[0]->token_user . "";
                $method = "PUT";
                $fields = $data;
                $header = array(
                    'Content-Type' =>  'application/x-www-form-urlencoded'
                );
                $datosFinales = CurlController::request($url, $method, $fields, $header);

                if ($datosFinales->status == 200) {
                ?>

                    <script>
                        function modal() {
                            let timerInterval;
                            Swal.fire({
                                title: "Cargando tus datos",
                                html: "Cerraré en <b></b> milisegundos.",
                                timer: 2000,
                                timerProgressBar: true,
                                didOpen: () => {
                                    Swal.showLoading();
                                    const timer = Swal.getPopup().querySelector("b");
                                    timerInterval = setInterval(() => {
                                        timer.textContent = `${Swal.getTimerLeft()}`;

                                    }, 100);
                                },
                                willClose: () => {
                                    clearInterval(timerInterval);
                                }
                            }).then((result) => {
                                /* Read more about handling dismissals below */
                                if (result.dismiss === Swal.DismissReason.timer) {
                                    console.log("I was closed by the timer");
                                }
                            });
                        }
                        modal();
                        fncFormatInputs();

                        setTimeout(() => {
                            let urlEnvio = 'http://prueba_bolsa_de_trabajo.com/';
                            location.href = `${urlEnvio}account&recruiter&dashboard`;
                        }, "2500");
                    </script>
                <?php

                } else {
                    echo '<div class="alert alert-danger">Algo paso vuelva a intentar</div> <script>
                fncFormatInputs()
            </script>';
                }
            }
        }
    }

    public function datosVacante()
    {
        $id_usuario = $_SESSION['rol']->id_usuario;

        $url = CurlController::api() . "relations?rel=reclutadores,usuarios&type=reclutador,usuario&linkTo=id_usuario&equalTo=" . $id_usuario . "";
        $method = "GET";
        $fields = array();
        $header = array();
        $verificarRel = CurlController::request($url, $method, $fields, $header);
        if ($verificarRel->status == 200) {
            if (isset($_POST['datos_vacante'])) {

                $url = CurlController::api() . 'crear_vacantes?datos_vacante=true&token="' . $_SESSION['rol']->token_user . '"';
                $method = 'POST';
                $fields = array(
                    'id_reclutador_vacante' => $verificarRel->results[0]->id_reclutador,
                    'id_usuario_vacante' => $id_usuario,
                    'title_vacante' => $_POST['titleVacante'],
                    'rango_sueldo' => $_POST['sueldoVacante'],
                    'educacion_requerida' => $_POST['educacionRequerida'],
                    'tipo_contratacion' => $_POST['tipoContratacion'],
                    'horario' => $_POST['horarioVacante'],
                    'lugar_de_trabajo' => $_POST['lugarTrabajo'],
                    'descripcion' => $_POST['descripcionVacante']

                );
                $header = array(
                    'Content-Type' =>  'application/x-www-form-urlencoded'
                );

                $datosEmpresa = CurlController::request($url, $method, $fields, $header);

                if ($datosEmpresa->status == 200) {
                ?>

                    <script>
                        function modal() {
                            let timerInterval;
                            Swal.fire({
                                title: "Tu vacante se ha creado con éxito",
                                html: "Cerraré en <b></b> milisegundos.",
                                timer: 2000,
                                timerProgressBar: true,
                                didOpen: () => {
                                    Swal.showLoading();
                                    const timer = Swal.getPopup().querySelector("b");
                                    timerInterval = setInterval(() => {
                                        timer.textContent = `${Swal.getTimerLeft()}`;

                                    }, 100);
                                },
                                willClose: () => {
                                    clearInterval(timerInterval);
                                }
                            }).then((result) => {
                                /* Read more about handling dismissals below */
                                if (result.dismiss === Swal.DismissReason.timer) {
                                    console.log("I was closed by the timer");
                                }
                            });
                        }
                        modal();
                        fncFormatInputs();
                    </script>
<?php
                } else {
                    echo '<div class="alert alert-danger">Algo paso vuelva a intentar</div> <script>
                    fncFormatInputs()
                </script>';
                }
            }
        }
    }
}


?>