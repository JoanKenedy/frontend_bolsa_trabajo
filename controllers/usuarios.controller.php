<?php

class UsersController
{

    public function register()
    {

        if (isset($_POST['regEmail'])) {
            if (
                preg_match("/^[A-Za-zñÑáéíóúÁÉÍÓÚ ]{1,}$/", $_POST['regNombre']) &&
                preg_match("/^[A-Za-zñÑáéíóúÁÉÍÓÚ ]{1,}$/", $_POST['regApellidos']) &&
                preg_match("/^\w+([.-_+]?\w+)*@\w+([.-]?\w+)*(\.\w{2,10})+$/", $_POST['regEmail']) &&
                preg_match("/^(\(\+?\d{2,3}\)[\*|\s|\-|\.]?(([\d][\*|\s|\-|\.]?){6})(([\d][\s|\-|\.]?){2})?|(\+?[\d][\s|\-|\.]?){8}(([\d][\s|\-|\.]?){2}(([\d][\s|\-|\.]?){2})?)?)$/", $_POST['regTelefono']) &&
                preg_match("/^(?=.*\d)(?=.*[a-záéíóúüñ]).*[A-ZÁÉÍÓÚÜÑ].*$/", $_POST['regPassword'])

            ) {

                $email = strtolower($_POST['regEmail']);
                $verify_code = substr(number_format(time() * rand(), 0, '', ''), 0, 6);


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
                    "verify_code" => $verify_code,
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
                    $message = 'Debemos verificar tu cuenta para que puedas ingresar a nuestra bolsa de trabajo aqui te enviamos tu codigo de verificación ' . $verify_code;
                    $url = TemplateController::path() . "login.php";
                    $sendEmail = TemplateController::sendEmail($name, $subject, $email, $message, $url);
                    $url2 = TemplateController::path() . "verificar_cuenta.php";

                    if ($sendEmail == 'ok') {
                        echo '<script type="text/javascript">
                         alert("Se ha registrado con exito, se le ha enviado un correo para verificar la cuenta");
                            window.location.href="' . $url2 . '";
                         </script>';
                    } else {
                        echo '<div class="alert alert-danger">
                        ' . $sendEmail . '
                    </div>';
                    }
                }
            } else {
                echo '<div class="alert alert-danger">
                Error de sintaxis en alguno de los campos
            </div>';
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
                $url2 = TemplateController::path() . "verificacion_cuenta.php";
                if ($login->status == 200) {
                    if ($login->results[0]->verificacion_email == 1) {
                        echo '<div class="alert alert-success">Su cuenta esta verificada y ha iniciado sesión.</div>';
                    } else {
                        echo '<div class="alert alert-warning">
                        Su cuenta no esta verificada , vamos a verificar , antes ve a tu correo y busca tu codigo de verificación.
                        <script>            
                             setTimeout ("window.location=' . $url2 . '", 3000);        
                            </script>
                        </div>';
                    }
                } else {
                    echo '<div class="alert alert-danger">Esta cuenta de email no existe en nuestro sistema.</div>';
                }
            } else {
                echo '<div class="alert alert-danger">
                Error de sintaxis en alguno de los campos
            </div>';
            }
        }
    }
}
