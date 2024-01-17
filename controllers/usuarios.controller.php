<?php
ob_start();
class UsersController
{

    public function register()
    {

        if (isset($_POST['enviaRegistro']) && isset($_POST['regEmail'])) {
            if (
                preg_match("/^[A-Za-zñÑáéíóúÁÉÍÓÚ ]{1,}$/", $_POST['regNombre']) &&
                preg_match("/^[A-Za-zñÑáéíóúÁÉÍÓÚ ]{1,}$/", $_POST['regApellidos']) &&
                preg_match("/^\w+([.-_+]?\w+)*@\w+([.-]?\w+)*(\.\w{2,10})+$/", $_POST['regEmail']) &&
                preg_match("/^(\(\+?\d{2,3}\)[\*|\s|\-|\.]?(([\d][\*|\s|\-|\.]?){6})(([\d][\s|\-|\.]?){2})?|(\+?[\d][\s|\-|\.]?){8}(([\d][\s|\-|\.]?){2}(([\d][\s|\-|\.]?){2})?)?)$/", $_POST['regTelefono']) &&
                preg_match("/^(?=.*\d)(?=.*[a-záéíóúüñ]).*[A-ZÁÉÍÓÚÜÑ].*$/", $_POST['regPassword'])

            ) {

                $email = strtolower($_POST['regEmail']);
                $url = CurlController::api() . 'usuarios?register=true';
                $method = "POST";
                $fields = array(
                    "rol_usuario_id" => $_POST['regRol'],
                    "nombre" => $_POST['regNombre'],
                    "apellidos" => $_POST['regApellidos'],
                    "email" => $email,
                    "telefono" => $_POST['regTelefono'],
                    "password" => $_POST['regPassword'],
                    "method_user" => 'directo',
                    "created_at" => date('Y-m-d')
                );


                $header = array(
                    'Content-Type' =>  'application/x-www-form-urlencoded'
                );

                $register = CurlController::request($url, $method, $fields, $header);

                if ($register->status == 200) {

                    $name = $_POST['regNombre'];
                    $subject = 'Verifica tu cuenta';
                    $email = $email;
                    $message = 'Debemos verificar tu cuenta para que puedas ingresar a nuestra bolsa de trabajo haz click en el siguiente enlace';
                    $url = TemplateController::path() . "account&login&" . base64_encode($email);
                    $sendEmail = TemplateController::sendEmail($name, $subject, $email, $message, $url);


                    if ($sendEmail == 'ok') {
?>
                        <script>
                            function modal() {

                                Swal.fire({
                                    position: "top",
                                    icon: "success",
                                    title: " Se ha registrado con éxito, se te ha enviado un correo al que ingresaste , verifica tu cuenta solo dando click a el enlace.",
                                    showConfirmButton: false,



                                });
                            }
                            modal();
                            fncFormatInputs();
                        </script>
                    <?php

                    } else {
                        echo '<div class="alert alert-danger">
                        ' . $sendEmail . '
                    </div>
                     <script>
                             fncFormatInputs()
                             </script>
                    
                    
                    ';
                    }
                }
            } else {
                echo '<div class="alert alert-danger">
                Error de sintaxis en alguno de los campos
                  </div>
                <script>
                    fncFormatInputs()
                </script>
            
            ';
            }
        }
    }

    public function login()
    {
        if (isset($_POST['loginEmail'])) {
            if (
                preg_match("/^\w+([.-_+]?\w+)*@\w+([.-]?\w+)*(\.\w{2,10})+$/", $_POST['loginEmail']) &&
                preg_match("/^(?=.*\d)(?=.*[a-záéíóúüñ]).*[A-ZÁÉÍÓÚÜÑ].*$/", $_POST['loginPassword'])
            ) {




                $url = CurlController::api() . 'usuarios?login=true';
                $method = "POST";
                $fields = array(
                    "email" =>  $_POST['loginEmail'],
                    "password" => $_POST['loginPassword'],

                );


                $header = array(
                    'Content-Type' =>  'application/x-www-form-urlencoded'
                );

                $login = CurlController::request($url, $method, $fields, $header);

                if ($login->status == 200) {
                    if ($login->results[0]->verificacion_email == 1) {

                        $rol = $login->results[0];
                        $_SESSION['rol'] = $rol;
                        if ($_SESSION['rol']->rol_usuario_id == 1) {
                            header('Location:account&candidate&dashboard');
                            return;
                        } elseif ($_SESSION['rol']->rol_usuario_id == 2) {
                            header('Location:account&recruiter&dashboard');
                            return;
                        } else {
                            header('Location:account&login');
                            return;
                        }
                    } else {
                    ?>
                        <script>
                            function modal() {
                                Swal.fire({
                                    position: "top",
                                    icon: "error",
                                    title: "Tu cuenta aun no esta verificada, es importante que vallas a tu correo y confirmes con un click",
                                    showConfirmButton: false,



                                });
                            }
                            modal();
                            fncFormatInputs();
                        </script>
                <?php
                    }
                } else {
                    echo '<div class="alert alert-danger">Esta cuenta de email no existe en nuestro sistema.</div> <script>
                    fncFormatInputs()
                </script>';
                }
            } else {
                echo '<div class="alert alert-danger">
                Error de sintaxis en alguno de los campos
            </div>
            <script>
                    fncFormatInputs()
                </script>';
            }
        }
    }

    public function datosContacto()
    {

        $id_usuario = $_SESSION['rol']->id_usuario;



        if (isset($_POST['datos_contacto'])) {
            $fecha_nacimiento = intval($_POST['regNacimiento']);
            $url = CurlController::api() . 'curriculums?datos_contacto=true&token="' . $_SESSION['rol']->token_user . '"';
            $method = 'POST';
            $fields = array(
                'id_usuario_curriculum' => $id_usuario,
                'puesto' => $_POST['regPuesto'],
                'sueldo_aprox' => $_POST['regSueldo'],
                'pais' => $_POST['regPais'],
                'estado' => $_POST['regEstado'],
                'sexo' => $_POST['regGenero'],
                'fecha_nacimiento' =>  date('Y-m-d', strtotime($fecha_nacimiento))

            );
            $header = array(
                'Content-Type' =>  'application/x-www-form-urlencoded'
            );

            $datosContacto = CurlController::request($url, $method, $fields, $header);
            if ($datosContacto->status == 200) {

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
                        location.href = `${urlEnvio}account&candidate&profesion`;
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
    public function datosIdioma()
    {
        $id_usuario = $_SESSION['rol']->id_usuario;
        $url = CurlController::api() . 'relations?rel=curriculums,usuarios&type=curriculum,usuario&linkTo=id_usuario&equalTo=' . $id_usuario . '';
        $method = 'GET';
        $fields = array();
        $header = array();
        $datosIdioma = CurlController::request($url, $method, $fields, $header);
        $id_curriculum_idioma = $datosIdioma->results[0]->id_curriculum;
        if ($datosIdioma->status == 200) {
            if (isset($_POST['datos_idioma'])) {

                $id_user = $_SESSION['rol']->id_usuario;
                $id_usuario_idioma = $id_user;
                $id_curriculum_idioma = $id_curriculum_idioma;
                $title_idioma = $_POST['title_idioma'];
                $nivel_idioma = $_POST['nivel_idioma'];


                $conn = mysqli_connect('localhost', 'root', '', 'bolsa_de_trabajo');

                $sql = "INSERT INTO idiomas ( `id_usuario_idioma`, `id_curriculum_idioma`,`title_idioma`, `nivel_idioma`)
                 VALUES ('$id_usuario_idioma','$id_curriculum_idioma','$title_idioma','$nivel_idioma')";

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
                                title: "Cargando tus datos de idiomas",
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
        }
    }
    public function datosHabilidad()
    {
        $id_usuario = $_SESSION['rol']->id_usuario;
        $url = CurlController::api() . 'relations?rel=curriculums,usuarios&type=curriculum,usuario&linkTo=id_usuario&equalTo=' . $id_usuario . '';
        $method = 'GET';
        $fields = array();
        $header = array();
        $datosHabilidad = CurlController::request($url, $method, $fields, $header);
        $id_curriculum_habilidad = $datosHabilidad->results[0]->id_curriculum;
        if ($datosHabilidad->status == 200) {
            if (isset($_POST['datos_habilidad'])) {

                $id_user = $_SESSION['rol']->id_usuario;
                $id_usuario_habilidad = $id_user;
                $id_curriculum_habilidad = $id_curriculum_habilidad;
                $title_habilidad = $_POST['title_habilidad'];


                $conn = mysqli_connect('localhost', 'root', '', 'bolsa_de_trabajo');

                $sql = "INSERT INTO habilidades ( `id_usuario_habilidad`, `id_curriculum_habilidad`,`title_habilidad`)
                 VALUES ('$id_usuario_habilidad','$id_curriculum_habilidad','$title_habilidad')";

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
                                title: "Cargando tus habilidades",
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
        }
    }
    public function datosEspecialidad()
    {
        $id_usuario = $_SESSION['rol']->id_usuario;
        $url = CurlController::api() . 'relations?rel=curriculums,usuarios&type=curriculum,usuario&linkTo=id_usuario&equalTo=' . $id_usuario . '';
        $method = 'GET';
        $fields = array();
        $header = array();
        $datosEspecialidad = CurlController::request($url, $method, $fields, $header);
        $id_curriculum_especialidad = $datosEspecialidad->results[0]->id_curriculum;
        if ($datosEspecialidad->status == 200) {
            if (isset($_POST['datos_especialidad'])) {

                $id_user = $_SESSION['rol']->id_usuario;
                $id_usuario_especialidad = $id_user;
                $id_curriculum_especialidad = $id_curriculum_especialidad;
                $title_especialidad = $_POST['title_especialidad'];


                $conn = mysqli_connect('localhost', 'root', '', 'bolsa_de_trabajo');

                $sql = "INSERT INTO especialidades ( `id_usuario_especialidad`, `id_curriculum_especialidad`, `title_especialidad`)
                 VALUES ('$id_usuario_especialidad','$id_curriculum_especialidad','$title_especialidad')";

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
                                title: "Cargando tus especialidades",
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
        }
    }

    public function enviarArchivoCurriculum()
    {
        $id_usuario = $_SESSION['rol']->id_usuario;
        $url = CurlController::api() . 'relations?rel=curriculums,usuarios&type=curriculum,usuario&linkTo=id_usuario&equalTo=' . $id_usuario . '';
        $method = 'GET';
        $fields = array();
        $header = array();
        $datosFile = CurlController::request($url, $method, $fields, $header);
        $id_curriculum_archivo = $datosFile->results[0]->id_curriculum;
        if ($datosFile->status == 200) {
            if (isset($_FILES['archivo_file'])) {

                $id_user = $_SESSION['rol']->id_usuario;
                $id_usuario_archivo = $id_user;
                $id_curriculum_archivo = $id_curriculum_archivo;
                $title_archivo = $_POST['title_archivo'];

                $carpeta_destino = "views/images/descargas/";
                $nombre_archivo = basename($_FILES['archivo_file']['name']);
                $extension = strtolower(pathinfo($nombre_archivo, PATHINFO_EXTENSION));

                if ($extension == "pdf" || $extension == "doc" || $extension == 'docx') {

                    if (move_uploaded_file($_FILES['archivo_file']['tmp_name'], $carpeta_destino . $nombre_archivo)) {

                        $conn = mysqli_connect('localhost', 'root', '', 'bolsa_de_trabajo');

                        $sql = "INSERT INTO archivos ( `id_usuario_archivo`, `id_curriculum_archivo`, `link_archivo`,`title_archivo` )
                 VALUES ('$id_usuario_archivo','$id_curriculum_archivo','$nombre_archivo', '$title_archivo')";

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
                                        title: "Cargando tu documento",
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
                                    location.href = `${urlEnvio}account&candidate&curriculum`;
                                }, "2500");
                            </script>
                        <?php

                        }
                    }
                }
            }
        }
    }

    public function datosCertificacion()
    {

        $id_usuario = $_SESSION['rol']->id_usuario;
        $url = CurlController::api() . 'relations?rel=curriculums,usuarios&type=curriculum,usuario&linkTo=id_usuario&equalTo=' . $id_usuario . '';
        $method = 'GET';
        $fields = array();
        $header = array();
        $datosFile2 = CurlController::request($url, $method, $fields, $header);
        $id_curriculum_certificacion = $datosFile2->results[0]->id_curriculum;
        if ($datosFile2->status == 200) {
            if (isset($_FILES['doc_file'])) {
                $id_user = $_SESSION['rol']->id_usuario;
                $id_usuario_certificacion = $id_user;
                $id_curriculum_certificacion = $id_curriculum_certificacion;
                $nombre_certificacion = $_POST['title_certificacion'];


                $carpeta_final = "views/images/descargas/";
                $nombre_documento = basename($_FILES['doc_file']['name']);
                $extensions = strtolower(pathinfo($nombre_documento, PATHINFO_EXTENSION));
                if ($extensions == "pdf" || $extensions == "doc" || $extensions == 'docx') {

                    if (move_uploaded_file($_FILES['doc_file']['tmp_name'], $carpeta_final . $nombre_documento)) {

                        $conn = mysqli_connect('localhost', 'root', '', 'bolsa_de_trabajo');

                        $sql = "INSERT INTO cursos_certificaciones ( `id_usuario_certificacion`, `id_curriculum_certificacion`, `nombre_certificacion`, `enlace` )
                 VALUES ('$id_usuario_certificacion','$id_curriculum_certificacion','$nombre_certificacion', '$nombre_documento')";

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
                                        title: "Cargando tu documento",
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
                                    location.href = `${urlEnvio}account&candidate&curriculum`;
                                }, "2500");
                            </script>
                        <?php



                        }
                    }
                }
            }
        }
    }

    public function editarUsuarioPerfil()
    {
        if (isset($_FILES['foto_perfil_editar'])) {
            $id_user = $_SESSION['rol']->id_usuario;
            $nombre = $_POST['nombreEditar'];
            $apellidos = $_POST['apellidoEditar'];
            $telefono = $_POST['telefonoEditar'];

            $carpeta_fin = "views/images/descargas/";
            $nombre_docu = basename($_FILES['foto_perfil_editar']['name']);
            $extensiones = strtolower(pathinfo($nombre_docu, PATHINFO_EXTENSION));
            if ($extensiones == "png" || $extensiones == "jpg" || $extensiones == 'jpeg') {

                if (move_uploaded_file($_FILES['foto_perfil_editar']['tmp_name'], $carpeta_fin . $nombre_docu)) {
                    $conn = mysqli_connect('localhost', 'root', '', 'bolsa_de_trabajo');

                    $sql = "UPDATE usuarios SET foto_perfil='" . $nombre_docu . "',nombre='" . $nombre . "',apellidos='" . $apellidos . "', telefono='" . $telefono . "' WHERE id_usuario = '" . $id_user . "'";

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
                                    title: "Actualizando datos de perfil",
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
                                location.href = `${urlEnvio}account&candidate&curriculum`;
                            }, "2500");
                        </script>
                    <?php



                    }
                }
            }
        }
    }

    public function editarCurriculumPerfil($verificarCv3)
    {

        if ($verificarCv3->status == 200) {
            if (isset($_POST['datos_edit_contacto'])) {
                $genero = $_POST['regEditGenero'];
                $pais = $_POST['regEditPais'];
                $estado = $_POST['regEditEstado'];
                $puesto = $_POST['regEditPuesto'];
                $sueldo = $_POST['regEditSueldo'];
                $fecha_nacimiento = intval($_POST['regEditNacimiento']);
                $fecha = date('Y-m-d', strtotime($fecha_nacimiento));


                $conn = mysqli_connect('localhost', 'root', '', 'bolsa_de_trabajo');

                $sql = "UPDATE curriculums SET sexo='" . $genero . "',fecha_nacimiento='" . $fecha . "',pais='" . $pais . "',estado='" . $estado . "', puesto='" . $puesto . "', sueldo_aprox='" . $sueldo . "' WHERE id_curriculum = '" . $verificarCv3->results[0]->id_curriculum . "'";

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
                                title: "Actualizando datos de perfil",
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
                            location.href = `${urlEnvio}account&candidate&curriculum`;
                        }, "2500");
                    </script>
                <?php



                }
            }
        }
    }
    public function editarEstudioPerfil($verificarCv4)
    {
        if ($verificarCv4->status == 200) {
            if (isset($_POST['datos_edit_estudio'])) {
                $nivel_academico = $_POST['nivelEditAcademico'];
                $title_carrera = $_POST['editCarrera'];
                $escuela = $_POST['editEscuela'];
                $fecha1 = $_POST['fechaEditInicio'];
                $fecha2 = $_POST['fechaEditFinal'];



                $conn = mysqli_connect('localhost', 'root', '', 'bolsa_de_trabajo');

                $sql = "UPDATE estudios SET nivel_academico='" . $nivel_academico . "',title_carrera='" . $title_carrera . "',nombre_escuela='" . $escuela . "',fecha_inicio='" . $fecha1 . "', fecha_termino='" . $fecha2 . "' WHERE id_estudio = '" . $verificarCv4->results[0]->id_estudio . "'";

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
                                title: "Actualizando datos de tus estudios",
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
                            location.href = `${urlEnvio}account&candidate&curriculum`;
                        }, "2500");
                    </script>
                <?php



                }
            }
        }
    }
    public function editarTrabajoPerfil($verificarCv5)
    {
        if ($verificarCv5->status == 200) {
            if (isset($_POST['datos_edit_trabajo'])) {
                $name_empresa = $_POST['nombreEditEmpresa'];
                $puesto_trabajo = $_POST['puestoEditTrabajo'];
                $incio = $_POST['inicioEditTrabajo'];
                $termino = $_POST['finalEditTrabajo'];
                $texto = $_POST['descripcionEditTrabajo'];
                $conn = mysqli_connect('localhost', 'root', '', 'bolsa_de_trabajo');

                $sql = "UPDATE trabajos SET nombre_empresa='" . $name_empresa . "',puesto_de_trabajo='" . $puesto_trabajo . "',fecha_inicio='" . $incio . "',fecha_termino='" . $termino . "', descripcion_trabajo='" . $texto . "' WHERE id_trabajo = '" . $verificarCv5->results[0]->id_trabajo . "'";

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
                                title: "Actualizando datos de tu trabajo",
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
                            location.href = `${urlEnvio}account&candidate&curriculum`;
                        }, "2500");
                    </script>
                <?php



                }
            }
        }
    }

    public function editEspecialidadPerfil($verificarEspecialidad)
    {
        if ($verificarEspecialidad->status == 200) {
            if (isset($_POST['datos_edit_especialidad'])) {
                $title = $_POST['title_edit_especialidad'];
                $conn = mysqli_connect('localhost', 'root', '', 'bolsa_de_trabajo');

                $sql = "UPDATE especialidades SET title_especialidad='" . $title . "' WHERE id_especialidad = '" . $verificarEspecialidad->results[0]->id_especialidad . "'";

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
                                title: "Actualizando tu especialidad",
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
                            location.href = `${urlEnvio}account&candidate&curriculum`;
                        }, "2500");
                    </script>
                <?php



                }
            }
        }
    }
    public function editHabilidadPerfil($verificarHabilidad)
    {
        if ($verificarHabilidad->status == 200) {
            if (isset($_POST['datos_edit_habilidad'])) {
                $title = $_POST['title_edit_habilidad'];
                $conn = mysqli_connect('localhost', 'root', '', 'bolsa_de_trabajo');

                $sql = "UPDATE habilidades SET title_habilidad='" . $title . "' WHERE id_habilidad = '" . $verificarHabilidad->results[0]->id_habilidad . "'";

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
                                title: "Actualizando tu habilidad",
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
                            location.href = `${urlEnvio}account&candidate&curriculum`;
                        }, "2500");
                    </script>
                <?php



                }
            }
        }
    }

    public function editIdiomaPerfil($verificarIdioma)
    {
        if ($verificarIdioma->status == 200) {
            if (isset($_POST['datos_edit_idioma'])) {
                $title = $_POST['title_edit_idioma'];
                $nivel = $_POST['nivel_edit_idioma'];
                $conn = mysqli_connect('localhost', 'root', '', 'bolsa_de_trabajo');

                $sql = "UPDATE idiomas SET title_idioma='" . $title . "',nivel_idioma='" . $nivel . "' WHERE id_idioma = '" . $verificarIdioma->results[0]->id_idioma . "'";

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
                                title: "Actualizando tu idioma",
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
                            location.href = `${urlEnvio}account&candidate&curriculum`;
                        }, "2500");
                    </script>
                    <?php



                }
            }
        }
    }
    public function editCertificacionPerfil($verificarCertificacion)
    {
        if ($verificarCertificacion->status == 200) {
            if (isset($_FILES['doc_edit_file'])) {
                $nombre = $_POST['title_edit_certificacion'];
                $carpeta_fin = "views/images/descargas/";
                $nombre_docu = basename($_FILES['doc_edit_file']['name']);
                $extensions = strtolower(pathinfo($nombre_docu, PATHINFO_EXTENSION));
                if ($extensions == "pdf" || $extensions == "doc" || $extensions == 'docx') {

                    if (move_uploaded_file($_FILES['doc_edit_file']['tmp_name'], $carpeta_fin . $nombre_docu)) {
                        $conn = mysqli_connect('localhost', 'root', '', 'bolsa_de_trabajo');

                        $sql = "UPDATE cursos_certificaciones SET nombre_certificacion='" . $nombre . "',enlace='" . $nombre_docu . "' WHERE id_certificacion = '" . $verificarCertificacion->results[0]->id_certificacion . "' ";

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
                                        title: "Actualizando tu certifiacion",
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
                                    location.href = `${urlEnvio}account&candidate&curriculum`;
                                }, "2500");
                            </script>
                <?php



                        }
                    }
                }
            }
        }
    }

    public function postularmeVacante()
    {
        if (isset($_POST['btn_postular'])) {
            $id_vacante = $_POST['id_vacante'];
            $id_user = $_SESSION['rol']->id_usuario;

            $conn = mysqli_connect('localhost', 'root', '', 'bolsa_de_trabajo');

            $sql = "INSERT INTO postulaciones ( `id_vacante_postulacion`, `id_usuario_postulacion` )
                 VALUES ('$id_vacante','$id_user')";

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
                            title: "Estamos enviando tu postulacion y tu Cv.",
                            html: "Gracias",
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
                        location.href = `${urlEnvio}account&candidate&dashboard`;
                    }, "2500");
                </script>
<?php



            }
        }
    }
}
