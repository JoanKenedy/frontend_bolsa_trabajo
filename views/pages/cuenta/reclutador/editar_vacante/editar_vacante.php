     <div class="container-editar">
         <div class="modal-dialog">
             <div class="modal-content px-3 py-3">
                 <form class="" novalidate method="post" role="form">
                     <?php
                        $id_data = $_GET['editar'];
                        $data = $_SESSION['rol']->id_usuario;
                        $url = CurlController::api() . "crear_vacantes?linkTo=id_vacante&equalTo=" . $id_data . "&token=no";
                        $method = "GET";
                        $fields = array();
                        $header = array();
                        $verificarEditarVacante = CurlController::request($url, $method, $fields, $header);
                        $editVacanteRecruiterPerfil = new RecruitersController();
                        $editVacanteRecruiterPerfil->editVacanteRecruiterPerfil($verificarEditarVacante);


                        ?>

                     <h3 class="text-dorado">Edita tu vacante, ten cuidado y edita los campos necesarios.</h3>
                     <input type="hidden" value="<?php echo CurlController::api() ?>" id="urlApi">
                     <div class="row ">
                         <div class="col-lg-6 col-md-6 col-12">
                             <div class="input-control">

                                 <p class="text-label2">Título de vacante:</p>
                                 <input type="text" name="titleEditVacante" class="form-control input-group" placeholder="ej:Diseñador Jr" required value="<?php echo $verificarEditarVacante->results[0]->title_vacante ?>">

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

                                 <p class="text-label2">Rango de sueldo:</p>
                                 <input type="text" name="sueldoEditVacante" class="form-control input-group" placeholder="10,000 a 12,000" required value="<?php echo $verificarEditarVacante->results[0]->rango_sueldo ?>">

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

                                 <p class="text-label2">Educación requerida:</p>
                                 <input type="text" name="educacionEditRequerida" class="form-control input-group" placeholder="Preparatoria Concluida " required value="<?php echo $verificarEditarVacante->results[0]->educacion_requerida ?>">

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

                                 <p class="text-label2">Tipo de contratación:</p>
                                 <input type="text" name="tipoEditContratacion" class="form-control input-group" placeholder="Temporal " required value="<?php echo $verificarEditarVacante->results[0]->tipo_contratacion ?>">

                             </div>
                         </div>


                         <div class="col-lg-6 col-md-6 col-12">
                             <div class="input-control">

                                 <p class="text-label2">Horario:</p>
                                 <input type="text" name="horarioEditVacante" class="form-control input-group" placeholder="9:00am a 18:00pm" required value="<?php echo $verificarEditarVacante->results[0]->horario ?>">

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

                                 <p class="text-label2">Lugar de trabajo:</p>
                                 <input type="text" name="lugarEditTrabajo" class="form-control input-group" placeholder="Cdmx Colonia Centro #12" required value="<?php echo $verificarEditarVacante->results[0]->lugar_de_trabajo ?>">

                                 <div class="valid-feedback">
                                     Válido
                                 </div>
                                 <div class="invalid-feedback">
                                     ¡Correo es requerido!
                                 </div>
                             </div>
                         </div>
                         <?php include "views/pages/cuenta/reclutador/requisitos/requisitos.php"; ?>
                         <div class="col-lg-12 col-md-12 col-12">
                             <?php
                                $requisitos = json_decode($verificarEditarVacante->results[0]->requisitos);

                                ?>
                             <?php foreach ($requisitos as $requisito) : ?>

                                 <div class="edit-requisito">
                                     <input type="text" name="editrequisito[]" class="form-control input-group" placeholder="Requisito:" required value="<?php echo $requisito ?>">


                                     <button class="form-control" onclick="eliminar(this)">
                                         Eliminar
                                     </button>
                                 </div>
                             <?php endforeach; ?>
                         </div>
                         <?php include "views/pages/cuenta/reclutador/beneficios/beneficios.php"; ?>
                         <div class="col-lg-12 col-md-12 col-12">
                             <?php
                                $beneficios = json_decode($verificarEditarVacante->results[0]->beneficios);

                                ?>
                             <?php foreach ($beneficios as $beneficio) : ?>

                                 <div class="edit-requisito">
                                     <input type="text" name="editbeneficio[]" class="form-control input-group" placeholder="Requisito:" required value="<?php echo $beneficio ?>">


                                     <button class="form-control" onclick="eliminar2(this)">
                                         Eliminar
                                     </button>
                                 </div>
                             <?php endforeach; ?>
                         </div>


                         <div class="col-lg-12 col-md-12 col-12">

                             <div class="col-lg-12 col-md-12 col-12">
                                 <div class="input-control">

                                     <p class="text-label2">Descripción de actividades a desempeñar :</p>
                                     <div class="text-center">
                                         <textarea id="myTextArea" name="descripcionEditVacante" rows="5">
                                            <?php echo $verificarEditarVacante->results[0]->descripcion ?>

</textarea>
                                     </div>




                                 </div>
                             </div>
                         </div>




                         <div class="col-lg-12 col-12 my-3  ">
                             <button type="submit" class="form-control" id="btn-register" name="datos_edit_vacante">
                                 Guardar y continuar
                             </button>
                         </div>


                     </div>

                 </form>
             </div>
         </div>

     </div>