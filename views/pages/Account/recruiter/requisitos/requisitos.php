       <?php 
       $addRequisitos = new RecruitersController();
       $addRequisitos->addRequisitos();

      ?>
       <div class="ps-my-account">
           <div class="container">
               <form class="custom-form hero-form  " novalidate method="post" role="form">
                   <p class=" text-center text-white">
                       Los datos necesarios para que se puedan postular a tu vacante.
                   </p>

                   <input type="hidden" value="<?php echo CurlController::api() ?>" id="urlApi">
                   <div class="row ">
                       <div class="col-lg-8 col-md-8 col-12">
                           <div class="input-control">

                               <p class="text-label">Requisito:</p>
                               <input type="text" name="requisito" class="form-control input-group datoInput"
                                   placeholder="Atención al detalle" required id="requisito">
                           </div>
                       </div>
                       <div class="col-lg-4 col-md-4 col-12 ">
                           <div class="input-control">
                               <button type="button" class="form-control mt-4" onclick="addRequisito()" id="btn-datos">
                                   Agregar requisito
                               </button>


                           </div>
                       </div>
                       <div class="datos-array text-white" id="datos-array">

                       </div>







                       <div class="col-lg-12 col-12 m-auto">
                           <button type="submit" class="form-control" id="btn-register" name="datos_requisitos">
                               Enviar mis requisitos
                           </button>
                       </div>


                   </div>

               </form>
           </div>
       </div>


       </div>

       <script>
function addRequisito() {
    let arrayInput = new Array();
    let inputsValues = document.getElementsByClassName('datoInput');
    let cajaDatos = document.getElementById('datos-array');
    let btnDatos = document.getElementById('btn-datos');
    namesValues = [].map.call(inputsValues, function(datoInput) {
        arrayInput.push(datoInput.value)
    });
    arrayInput.forEach(function(inputsValuesData) {
        console.log("El datos es:" + inputsValuesData)
        // crea un nuevo div
        // y añade contenido
        var newDiv = document.createElement("p");
        var newContent = document.createTextNode(inputsValuesData);
        newDiv.appendChild(newContent); //añade texto al div creado.

        // añade el elemento creado y su contenido al DOM
        var currentDiv = document.getElementById("div1");
        cajaDatos.insertBefore(newDiv, currentDiv);
    })




}
       </script>