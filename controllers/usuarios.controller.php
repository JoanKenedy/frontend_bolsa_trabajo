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
                    $message = 'Debemos verificar tu cuenta para que puedas ingresar a nuestra bolsa de trabajo aqui te enviamos tu codigo de verificación CODIGO ' . $verify_code;
                    $url = TemplateController::path() . "verificar_cuenta.php";
                    $sendEmail = TemplateController::sendEmail($name, $subject, $email, $message, $url);
                   

                    if ($sendEmail == 'ok') {
                        echo '<div class="alert alert-success">
                               Se ha registrado con éxito, se ha enviado un codigo de verificacion a su correo ingresado.
                               Cheque tambien en la bandeja de spam.
                            
                             </div>
                             <script>
                             fncFormatInputs()
                             </script>
                             
                             ';
                    } else {
                        echo '<div class="alert alert-danger">
                        ' . $sendEmail . '
                    </div>
                     <script>
                             fncFormatInputs()
                             </script>
                    
                    
                    '
                    
                    ;
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
                        echo '<div class="alert alert-success"> Ha iniciado sesión con éxito.</div>
                             <script>
                            fncFormatInputs()
                            </script>
                        
                        
                        ';
                    } else {
                        echo '<div class="alert alert-warning">
                        Su cuenta no esta verificada , tiene que ir a su correo, ahi viene su codigo y de click en el enlace del correo .
                     
                        </div>
                        <script>
                    fncFormatInputs()
                </script>
                        
                        ';
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
}