   <?php
    if (isset($_POST['enviaRegistro']) && isset($_POST['regEmail'])) {
        if (
            preg_match("/^[A-Za-zñÑáéíóúÁÉÍÓÚ ]{1,}$/", $_POST['regNombre']) &&
            preg_match("/^[A-Za-zñÑáéíóúÁÉÍÓÚ ]{1,}$/", $_POST['regApellidos']) &&
            preg_match("/^\w+([.-_+]?\w+)*@\w+([.-]?\w+)*(\.\w{2,10})+$/", $_POST['regEmail']) &&
            preg_match("/^(\(\+?\d{2,3}\)[\*|\s|\-|\.]?(([\d][\*|\s|\-|\.]?){6})(([\d][\s|\-|\.]?){2})?|(\+?[\d][\s|\-|\.]?){8}(([\d][\s|\-|\.]?){2}(([\d][\s|\-|\.]?){2})?)?)$/", $_POST['regTelefono']) &&
            preg_match("/^(?=.*\d)(?=.*[a-záéíóúüñ]).*[A-ZÁÉÍÓÚÜÑ].*$/", $_POST['regPassword'])

        ) {

            if (isset($_POST['regPassword']) && $_POST['regPassword'] != null) {
                $crypt = crypt($_POST['regPassword'], '$2a$07$azybxcags23425sdg23sdfhsd$');
                $_POST['regPassword'] = $crypt;


                $email = strtolower($_POST['regEmail']);
                $rol_usuario_id = $_POST['regRol'];
                $nombre = $_POST['regNombre'];
                $apellidos = $_POST['regApellidos'];
                $email = $email;
                $telefono = $_POST['regTelefono'];
                $password = $_POST['regPassword'];
                $method_user = 'directo';
                $created_at = date('Y-m-d');


                $conn = mysqli_connect('localhost', 'root', '', 'bolsa_de_trabajo');
                /* $conn = mysqli_connect('db5015003865.hosting-data.io', 'dbu2212005', '931125hgryyn04', 'dbs12467465');*/

                $sql = "INSERT INTO usuarios ( `rol_usuario_id`, `nombre`,`apellidos`, `email`,`telefono`,`password`,`method_user`,`created_at`)
                 VALUES ('$rol_usuario_id','$nombre','$apellidos','$email','$telefono','$password','$method_user','$created_at')";

                $result = mysqli_query($conn, $sql);
                if (mysqli_affected_rows($conn) != 0) {

                    $name = $_POST['regNombre'];
                    $subject = 'Verifica tu cuenta';
                    $email = $email;
                    $message = 'Debemos verificar tu cuenta para que puedas ingresar a nuestra bolsa de trabajo haz click en el siguiente enlace';
                    $url = TemplateController::path() . "account&login&" . base64_encode($email);
                    $sendEmail = TemplateController::sendEmail($name, $subject, $email, $message, $url);

                    if ($sendEmail == 'ok') { ?>
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
                           setTimeout(() => {
                               let urlEnvio = 'http://prueba_bolsa_de_trabajo.com/';
                               location.href = `${urlEnvio}account&login`;
                           }, "2500");
                       </script>
                   <?php

                    } else {
                    ?>
                       <script>
                           function modal() {

                               Swal.fire({
                                   position: "top",
                                   icon: "error",
                                   title: "No se pudo mandar el correo",
                                   showConfirmButton: false,



                               });
                           }
                           modal();
                           fncFormatInputs();
                       </script>
                   <?php
                    }
                } else {
                    ?>
                   <script>
                       function modal() {

                           Swal.fire({
                               position: "top",
                               icon: "error",
                               title: "No se pudo registrar, vuelvo a intentar",
                               showConfirmButton: false,



                           });
                       }
                       modal();
                       fncFormatInputs();
                   </script>
   <?php

                }
            }
        }
    }
    ?>