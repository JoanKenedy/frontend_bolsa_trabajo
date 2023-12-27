    <?php
/* Verificamos que el usuario exista */
$data = $_SESSION['rol']->id_usuario;

$url = CurlController::api() . "relations?rel=trabajos,curriculums,usuarios&type=trabajo,curriculum,usuario&linkTo=id_usuario&equalTo=" . $data . "";
$method = "GET";
$fields = array();
$header = array();
$verificarRel = CurlController::request($url, $method, $fields, $header);


if ($verificarRel->status == 200) {

    header('location:account&candidate&dashboard');
};

?>
    <div class="container my-5">
        <?php
    $id_usuario = $_SESSION['rol']->id_usuario;
    $conn = mysqli_connect('localhost', 'root', '', 'bolsa_de_trabajo');

    $sql = "SELECT id_curriculum FROM curriculums WHERE id_usuario_curriculum = $id_usuario";
    $result = mysqli_query($conn, $sql);
    $arrayDatos = mysqli_fetch_array($result);
    $id_curriculum_trabajo = $arrayDatos[0];
    ?>
        <?php
    if (isset($_POST['datos_trabajo'])) {
        $id_usuario = $_SESSION['rol']->id_usuario;


        $nombreEmpresa = $_POST['nombreEmpresa'];
        $puestoTrabajo = $_POST['puestoTrabajo'];
        $fechaInicio = $_POST['inicioTrabajo'];
        $fechaTermino = $_POST['finalTrabajo'];
        $descripcionTrabajo = $_POST['descripcionTrabajo'];

        $conn = mysqli_connect('localhost', 'root', '', 'bolsa_de_trabajo');

        $sql = "INSERT INTO  trabajos (`id_usuario_trabajo`, `id_curriculum_trabajo`, `nombre_empresa`, `puesto_de_trabajo`, `fecha_inicio`, `fecha_termino`, `descripcion_trabajo`)
        VALUES ('$id_usuario','$id_curriculum_trabajo','$nombreEmpresa','$puestoTrabajo','$fechaInicio','$fechaTermino','$descripcionTrabajo')";

        $result = mysqli_query($conn, $sql);

        if (mysqli_affected_rows($conn) == 0) { ?>
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
                title: "Cargando tus datos de tu experincia laboral",
                html: "Ya iremos a tu CV",
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
            location.href = `${urlEnvio}account&candidate&curriculum`;
        }, "2500");
        </script>
        <?php

        }
    }
    ?>

        <div class="ps-my-account">
            <div class="container">
                <form class="custom-form hero-form form-login requires-validation" novalidate method="post" role="form">
                    <p class=" text-center text-white">
                        Cuéntanos tu experiencia laboral
                    </p>

                    <input type="hidden" value="<?php echo CurlController::api() ?>" id="urlApi">
                    <div class="row ">
                        <div class="col-lg-6 col-md-6 col-12">
                            <div class="input-control">

                                <p class="text-label">Nombre de la empresa o negocio:</p>
                                <input type="text" name="nombreEmpresa" class="form-control input-group"
                                    placeholder="Bimbo" required>


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

                                <p class="text-label">Puesto desempeñado:</p>
                                <input type="text" name="puestoTrabajo" class="form-control input-group"
                                    placeholder="Administración de empresas" required>

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

                                <p class="text-label">Año de incio:</p>
                                <input type="text" name="inicioTrabajo" class="form-control input-group"
                                    placeholder="Año de inicio" required>


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

                                <p class="text-label">Ultimo año:</p>
                                <input type="text" name="finalTrabajo" class="form-control input-group"
                                    placeholder="Ultimo año" required>

                                <div class="valid-feedback">
                                    Válido
                                </div>
                                <div class="invalid-feedback">
                                    ¡Correo es requerido!
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-12 mb-2">
                            <div class="input-control">

                                <p class="text-label">Actividades desempeñadas en tu puesto:</p>
                                <div class="text-center">
                                    <textarea id="myTextArea" name="descripcionTrabajo" rows="5">

                            </textarea>
                                </div>




                            </div>
                        </div>



                        <div class="col-lg-12 col-12 m-auto">
                            <button type="submit" class="form-control" id="btn-register" name="datos_trabajo">
                                Guardar y continuar
                            </button>
                        </div>


                    </div>

                </form>
            </div>
        </div>


    </div>