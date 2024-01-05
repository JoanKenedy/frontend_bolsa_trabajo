<div class="modal-dialog">
    <div class="modal-content px-3 py-3">
        <form class="" novalidate method="post" role="form">
            <?php
            $id_data = $_GET['vacante'];
            $data = $_SESSION['rol']->id_usuario;
            ?>

            <input type="hidden" value="<?php echo CurlController::api() ?>" id="urlApi">
            <input type="hidden" value="<?php echo $id_data ?>" name="id_vacante">

            <div class="row ">
                <h6 class="text-center text-dorado">Da click en enviar cv y ya estaras correctamente postulado.</h6>
                <p class="text-center">Al reclutador le llegara tu cv y se pondra en contacto contigo</p>

                <div class="col-lg-12 col-12 my-3  ">
                    <button type="submit" class="form-control" id="btn-register" name="btn_postular">
                        Enviar mi Cv
                    </button>
                </div>


            </div>

        </form>
    </div>
</div>