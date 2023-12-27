<div class="container my-5">
    <?php
    $id_usuario = $_SESSION['rol']->id_usuario;
    $conn = mysqli_connect('localhost', 'root', '', 'bolsa_de_trabajo');

    $sql = "SELECT id_curriculum FROM curriculums WHERE id_usuario_curriculum = $id_usuario";
    $result = mysqli_query($conn, $sql);
    $arrayDatos = mysqli_fetch_array($result);
    $id_curriculum_estudio = $arrayDatos[0];
    ?>
    <?php
    if (isset($_POST['datos_estudio'])) {
        $id_usuario = $_SESSION['rol']->id_usuario;
        $nivel = $_POST['nivelAcademico'];
        $carrera = $_POST['carrera'];
        $escuela = $_POST['escuela'];
        $fechaInicio = $_POST['fechaInicio'];
        $fechaTermino = $_POST['fechaFinal'];

        $conn = mysqli_connect('localhost', 'root', '', 'bolsa_de_trabajo');

        $sql = "INSERT INTO estudios ( `id_usuario_estudio`, `id_curriculum_estudio`,`nivel_academico`, `title_carrera`, `nombre_escuela`, `fecha_inicio`, `fecha_termino`)
        VALUES ('$id_usuario','$id_curriculum_estudio','$nivel','$carrera','$escuela','$fechaInicio','$fechaTermino')";

        $result = mysqli_query($conn, $sql);

        if (mysqli_affected_rows($conn) == 0) { ?>
    <script>
    function modal() {
        Swal.fire({
            position: "top",
            icon: "error",
            title: "Algo salio mal, verifica tu email o codigo",
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
            title: "Cargando tus datos de tus estudios",
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
        location.href = `${urlEnvio}account&candidate&work_experiencie`;
    }, "2500");
    </script>
    <?php

        }
    }
    ?>
    <?php
/* Verificamos que el usuario exista */
$data = $_SESSION['rol']->id_usuario;

$url = CurlController::api() . "relations?rel=estudios,curriculums,usuarios&type=estudio,curriculum,usuario&linkTo=id_usuario&equalTo=" . $data . "";
$method = "GET";
$fields = array();
$header = array();
$verificarRel = CurlController::request($url, $method, $fields, $header);


if ($verificarRel->status == 200) {

    header('location:account&candidate&dashboard');
};

?>
    <div class="ps-my-account">
        <div class="container">
            <form class="custom-form hero-form form-login requires-validation" novalidate method="post" role="form">
                <p class=" text-center text-white">
                    Cuéntanos sobre tu ultimo nivel academico para estes listo para postular
                </p>

                <input type="hidden" value="<?php echo CurlController::api() ?>" id="urlApi">
                <div class="row ">
                    <div class="col-lg-6 col-md-6 col-12">
                        <div class="input-control">

                            <p class="text-label">Nivel academico:</p>

                            <select name="nivelAcademico" class=" input-group select">
                                <option value="Primaria">Primaria</option>
                                <option value="Secundaria">Secundaria</option>
                                <option value="Preparatoria">Preparatoria</option>
                                <option value="Universidad trunca">Universidad trunca</option>
                                <option value="Universidad concluida">Universidad concluida</option>
                                <option value="Maestria">Maestria</option>
                                <option value="Doctorado">Doctorado</option>


                            </select>

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

                            <p class="text-label">Titulo o carrera:</p>
                            <input type="text" name="carrera" class="form-control input-group"
                                placeholder="Administración de empresas" required>

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

                            <p class="text-label">Institución:</p>
                            <input type="text" name="escuela" class="form-control input-group" placeholder="Unam"
                                required>


                        </div>
                    </div>


                    <div class="col-lg-6 col-md-6 col-12">
                        <div class="input-control">

                            <p class="text-label">Año de incio:</p>
                            <input type="text" name="fechaInicio" class="form-control input-group"
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
                            <input type="text" name="fechaFinal" class="form-control input-group"
                                placeholder="Ultimo año" required>

                            <div class="valid-feedback">
                                Válido
                            </div>
                            <div class="invalid-feedback">
                                ¡Correo es requerido!
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 col-12 m-auto">
                        <button type="submit" class="form-control" id="btn-register" name="datos_estudio">
                            Guardar y continuar
                        </button>
                    </div>


                </div>

            </form>
        </div>
    </div>


</div>