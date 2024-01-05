<div class="col-lg-12 col-12 mt-3">
    <div class="row">
        <div class="col-lg-7 col-8">
            <p class="text-requisito">Escribi los beneficios que ofreces:</p>
        </div>
        <div class="col-lg-5 col-4">
            <button type="button" id="beneficio">Agregar</button>
        </div>
    </div>
</div>
<div id="beneficios" class="col-lg-12 col-12">

</div>


<script>
    const contenedorBeneficio = document.querySelector('#beneficios');
    const btnBeneficio = document.querySelector('#beneficio');

    let count = 1;

    btnBeneficio.addEventListener('click', e => {
        let caja = document.createElement('div');
        caja.innerHTML = `
                                   <input type="text" name="beneficio[]" class="form-control input-group"
                                    placeholder="Beneficio ${count++}:" required>
                               </div>
                              
                           <button  class="form-control" onclick="eliminar2(this)" >
                              Eliminar
                           </button>
                       
                               
                       `;
        contenedorBeneficio.appendChild(caja);
    })




    const eliminar2 = (e) => {
        const divPadre2 = e.parentNode;
        contenedorBeneficio.removeChild(divPadre2);
        actualizarContador2();
    }


    const actualizarContador2 = () => {
        let divs2 = contenedorBeneficio.children;
        count = 1;
        for (let i = 0; i < divs2.length; i++) {
            div2[i].children[0].innerHTML = count++;
        }
    }
</script>