<?php
class RecruitersController
{

    public function datosEmpresa()
    {
        $id_usuario = $_SESSION['rol']->id_usuario;
        if (isset($_POST['datos_empresa'])) {

            $id_usuario_reclutador = $id_usuario;

            $email_empresa = $_POST['emailContacto'];
            $telefono_empresa = $_POST['telContacto'];
            $name_empresa = $_POST['nameEmpresa'];
            $pais = $_POST['paisEmpresa'];
            $estado = $_POST['estadoEmpresa'];
            $direccion = $_POST['direccionEmpresa'];
            $codigo_postal = $_POST['postalEmpresa'];

            // $conn = mysqli_connect('db5015003865.hosting-data.io', 'dbu2212005', '931125hgryyn04', 'dbs12467465');
            $conn = mysqli_connect('localhost', 'root', '', 'bolsa_de_trabajo');

            $sql = "INSERT INTO reclutadores ( `id_usuario_reclutador`, `email_empresa`, `telefono_empresa`, `name_empresa`, `pais`, `estado`, `direccion`,`codigo_postal`)
                         VALUES ('$id_usuario_reclutador','$email_empresa','$telefono_empresa','$name_empresa','$pais','$estado','$direccion','$codigo_postal')";
            $result = mysqli_query($conn, $sql);
            if (mysqli_affected_rows($conn) == 0) {
?>
                <script>
                    function modal() {
                        Swal.fire({
                            position: "top",
                            icon: "error",
                            title: "Algo salio mal, verifiquemos que fue",
                            showConfirmButton: false,
                            timer: 1500,


                        });
                    }
                    modal();
                </script>
            <?php } else { ?>

                <script>
                    function modal() {
                        let timerInterval;
                        Swal.fire({
                            title: "Guardando tus datos de reclutador",
                            html: "Vamos a datos finales",
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
                        location.href = `${urlEnvio}cuenta&reclutador&datos_finales`;
                    }, "2500");
                </script>
                <?php



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
                            location.href = `${urlEnvio}cuenta&reclutador&panel`;
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


            if (isset($_FILES['fotoVacante'])) {

                $requisito = $_POST['requisito'];
                $jsonString = json_encode($requisito);
                $beneficio = $_POST['beneficio'];
                $jsonBeneficio = json_encode($beneficio);
                $id_reclutador_vacante = $verificarRel->results[0]->id_reclutador;
                $id_usuario_vacante =  $id_usuario;
                $title_vacante = $_POST['titleVacante'];
                $rango_sueldo = $_POST['sueldoVacante'];
                $fecha_publicacion = date('Y-m-d');
                $educacion_requerida = $_POST['educacionRequerida'];
                $tipo_contratacion = $_POST['tipoContratacion'];
                $horario = $_POST['horarioVacante'];
                $lugar_de_trabajo = $_POST['lugarTrabajo'];
                $requisitos = $jsonString;
                $beneficios = $jsonBeneficio;
                $descripcion = $_POST['descripcionVacante'];
                $carpeta_fin = "views/images/descargas/";
                $nombre_docu = basename($_FILES['fotoVacante']['name']);
                $extensiones = strtolower(pathinfo($nombre_docu, PATHINFO_EXTENSION));
                if ($extensiones == "png" || $extensiones == "jpg" || $extensiones == 'jpeg') {
                    if (move_uploaded_file($_FILES['fotoVacante']['tmp_name'], $carpeta_fin . $nombre_docu)) {
                        //  $conn = mysqli_connect('db5015003865.hosting-data.io', 'dbu2212005', '931125hgryyn04', 'dbs12467465');
                        $conn = mysqli_connect('localhost', 'root', '', 'bolsa_de_trabajo');

                        $sql = "INSERT INTO crear_vacantes ( `title_vacante`, `foto_vacante`, `rango_sueldo`, `fecha_de_publicacion`, `educacion_requerida`, `tipo_contratacion`, `horario`,`lugar_de_trabajo`, `requisitos`,`beneficios`,`descripcion`,`id_reclutador_vacante`,`id_usuario_vacante`)
                         VALUES ('$title_vacante','$nombre_docu','$rango_sueldo','$fecha_publicacion','$educacion_requerida','$tipo_contratacion','$horario','$lugar_de_trabajo','$requisitos','$beneficios','$descripcion','$id_reclutador_vacante','$id_usuario_vacante')";

                        $result = mysqli_query($conn, $sql);
                        if (mysqli_affected_rows($conn) == 0) {
                    ?>
                            <script>
                                function modal() {
                                    Swal.fire({
                                        position: "top",
                                        icon: "error",
                                        title: "Algo salio mal, verifiquemos que fue",
                                        showConfirmButton: false,
                                        timer: 1500,


                                    });
                                }
                                modal();
                            </script>
                        <?php } else { ?>

                            <script>
                                function modal() {
                                    let timerInterval;
                                    Swal.fire({
                                        title: "Subiendo tu los datos de tu vacante",
                                        html: "Iremos a tu perfil",
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
                                    location.href = `${urlEnvio}cuenta&reclutador&panel`;
                                }, "2500");
                            </script>
                        <?php



                        }
                    }
                }
            }
        }
    }


    public function editarEmpresaPerfil1()
    {
        if (isset($_FILES['fotoEditEmpresa'])) {
            $id_user = $_SESSION['rol']->id_usuario;
            $nombre = $_POST['nameEditEmpresa'];
            $tel = $_POST['telEditContacto'];
            $correo = $_POST['emailEditContacto'];


            $carpeta_fin = "views/images/descargas/";
            $nombre_docu = basename($_FILES['fotoEditEmpresa']['name']);
            $extensiones = strtolower(pathinfo($nombre_docu, PATHINFO_EXTENSION));
            if ($extensiones == "png" || $extensiones == "jpg" || $extensiones == 'jpeg') {

                if (move_uploaded_file($_FILES['fotoEditEmpresa']['tmp_name'], $carpeta_fin . $nombre_docu)) {
                    //$conn = mysqli_connect('db5015003865.hosting-data.io', 'dbu2212005', '931125hgryyn04', 'dbs12467465');
                    $conn = mysqli_connect('localhost', 'root', '', 'bolsa_de_trabajo');

                    $sql = "UPDATE reclutadores SET logo_empresa='" . $nombre_docu . "',email_empresa='" . $correo . "',telefono_empresa='" . $tel . "', name_empresa='" . $nombre . "' WHERE id_usuario_reclutador = '" . $id_user . "'";

                    $result = mysqli_query($conn, $sql);
                    if (mysqli_affected_rows($conn) == 0) {
                        ?>
                        <script>
                            function modal() {
                                Swal.fire({
                                    position: "top",
                                    icon: "error",
                                    title: "Algo salio mal, verifiquemos que fue",
                                    showConfirmButton: false,
                                    timer: 1500,


                                });
                            }
                            modal();
                        </script>
                    <?php } else { ?>

                        <script>
                            function modal() {
                                let timerInterval;
                                Swal.fire({
                                    title: "Actualizando datos de tu perfil de empresa",
                                    html: "Iremos a tu cv",
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
                                location.href = `${urlEnvio}cuenta&reclutador&perfil-empresa`;
                            }, "2500");
                        </script>
                <?php



                    }
                }
            }
        }
    }


    public function editarEmpresaPerfil2()
    {
        if (isset($_POST['datos_edit_empresa2'])) {
            $id_user = $_SESSION['rol']->id_usuario;
            $country = $_POST['paisEditEmpresa'];
            $stado = $_POST['estadoEditEmpresa'];
            $postal = $_POST['postalEditEmpresa'];
            $direc = $_POST['direccionEditEmpresa'];

            //$conn = mysqli_connect('db5015003865.hosting-data.io', 'dbu2212005', '931125hgryyn04', 'dbs12467465');
            $conn = mysqli_connect('localhost', 'root', '', 'bolsa_de_trabajo');

            $sql = "UPDATE reclutadores SET pais='" . $country . "',estado='" . $stado . "',direccion='" . $direc . "',codigo_postal='" . $postal . "' WHERE id_usuario_reclutador = '" . $id_user . "'";

            $result = mysqli_query($conn, $sql);
            if (mysqli_affected_rows($conn) == 0) {
                ?>
                <script>
                    function modal() {
                        Swal.fire({
                            position: "top",
                            icon: "error",
                            title: "Algo salio mal, verifiquemos que fue",
                            showConfirmButton: false,
                            timer: 1500,


                        });
                    }
                    modal();
                </script>
            <?php } else { ?>

                <script>
                    function modal() {
                        let timerInterval;
                        Swal.fire({
                            title: "Actualizando datos de tu perfil de empresa",
                            html: "Iremos a tu cv",
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
                        let urlEnvio = 'https://prueba_bolsa_de_trabajo.com/';
                        location.href = `${urlEnvio}cuenta&reclutador&perfil-empresa`;
                    }, "2500");
                </script>
            <?php   }
        }
    }

    public function editarEmpresaPerfil3()
    {
        if (isset($_POST['datos_edit_empresa3'])) {
            $id_user = $_SESSION['rol']->id_usuario;
            $giro = $_POST['giroEditEmpresa'];
            $empleados = $_POST['numEditEmpleado'];
            $text = $_POST['descripcionEditR'];

            // $conn = mysqli_connect('db5015003865.hosting-data.io', 'dbu2212005', '931125hgryyn04', 'dbs12467465');
            $conn = mysqli_connect('localhost', 'root', '', 'bolsa_de_trabajo');

            $sql = "UPDATE reclutadores SET giro_empresa='" . $giro . "',num_trabajadores='" . $empleados . "',descripcion='" . $text . "' WHERE id_usuario_reclutador = '" . $id_user . "'";

            $result = mysqli_query($conn, $sql);
            if (mysqli_affected_rows($conn) == 0) {
            ?>
                <script>
                    function modal() {
                        Swal.fire({
                            position: "top",
                            icon: "error",
                            title: "Algo salio mal, verifiquemos que fue",
                            showConfirmButton: false,
                            timer: 1500,


                        });
                    }
                    modal();
                </script>
            <?php } else { ?>

                <script>
                    function modal() {
                        let timerInterval;
                        Swal.fire({
                            title: "Actualizando datos de tu perfil de empresa",
                            html: "Iremos a tu cv",
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
                        location.href = `${urlEnvio}cuenta&reclutador&perfil-empresa`;
                    }, "2500");
                </script>
            <?php   }
        }
    }

    public function editarEmpresaPerfil4()
    {
        if (isset($_POST['datos_edit_empresa4'])) {
            $id_user = $_SESSION['rol']->id_usuario;
            $razon = $_POST['razonEditEmpresa'];
            $rfc = $_POST['rfcEditContacto'];

            //$conn = mysqli_connect('db5015003865.hosting-data.io', 'dbu2212005', '931125hgryyn04', 'dbs12467465');
            $conn = mysqli_connect('localhost', 'root', '', 'bolsa_de_trabajo');

            $sql = "UPDATE reclutadores SET razon_social='" . $razon . "',rfc='" . $rfc . "' WHERE id_usuario_reclutador = '" . $id_user . "'";

            $result = mysqli_query($conn, $sql);
            if (mysqli_affected_rows($conn) == 0) {
            ?>
                <script>
                    function modal() {
                        Swal.fire({
                            position: "top",
                            icon: "error",
                            title: "Algo salio mal, verifiquemos que fue",
                            showConfirmButton: false,
                            timer: 1500,


                        });
                    }
                    modal();
                </script>
            <?php } else { ?>

                <script>
                    function modal() {
                        let timerInterval;
                        Swal.fire({
                            title: "Actualizando datos de tu perfil de empresa",
                            html: "Iremos a tu cv",
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
                        location.href = `${urlEnvio}cuenta&reclutador&perfil-empresa`;
                    }, "2500");
                </script>
            <?php   }
        }
    }

    public function editVacanteRecruiterPerfil($verificarEditarVacante)
    {

        if (isset($_POST['datos_edit_vacante'])) {
            $requisito = $_POST['editrequisito'];
            $jsonString = json_encode($requisito);
            $beneficio = $_POST['editbeneficio'];
            $jsonBeneficio = json_encode($beneficio);
            $id_vacante = $verificarEditarVacante->results[0]->id_vacante;
            $title_vacante = $_POST['titleEditVacante'];
            $sueldo = $_POST['sueldoEditVacante'];
            $edu = $_POST['educacionEditRequerida'];
            $contratacion = $_POST['tipoEditContratacion'];
            $horario = $_POST['horarioEditVacante'];
            $lugar_trabajo = $_POST['lugarEditTrabajo'];
            $requisitos = $jsonString;
            $beneficios = $jsonBeneficio;
            $desc = $_POST['descripcionEditVacante'];

            // $conn = mysqli_connect('db5015003865.hosting-data.io', 'dbu2212005', '931125hgryyn04', 'dbs12467465');
            $conn = mysqli_connect('localhost', 'root', '', 'bolsa_de_trabajo');

            $sql = "UPDATE crear_vacantes SET title_vacante='" . $title_vacante . "',rango_sueldo='" . $sueldo . "',educacion_requerida='" . $edu . "',tipo_contratacion='" . $contratacion . "',horario='" . $horario . "',lugar_de_trabajo='" . $lugar_trabajo . "',requisitos='" . $requisitos . "',beneficios='" . $beneficios . "',descripcion='" . $desc . "' WHERE id_vacante = '" . $id_vacante . "'";

            $result = mysqli_query($conn, $sql);
            if (mysqli_affected_rows($conn) == 0) {
            ?>
                <script>
                    function modal() {
                        Swal.fire({
                            position: "top",
                            icon: "error",
                            title: "Algo salio mal, verifiquemos que fue",
                            showConfirmButton: false,
                            timer: 1500,


                        });
                    }
                    modal();
                </script>
            <?php } else { ?>

                <script>
                    function modal() {
                        let timerInterval;
                        Swal.fire({
                            title: "Actualizando datos de tu vacante",
                            html: "Iremos a tu cv",
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
                        location.href = `${urlEnvio}cuenta&reclutador&panel`;
                    }, "2500");
                </script>
<?php   }
        }
    }
}



?>