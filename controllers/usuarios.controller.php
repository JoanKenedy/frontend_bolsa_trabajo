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
            } /* else {
                echo '<div class="alert alert-danger">
                Error de sintaxis en alguno de los campos
                  </div>
                <script>
                    fncFormatInputs()
                </script>
            
            ';
            }*/
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

 
}