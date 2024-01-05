    <div class="col-lg-12 col-12 mt-3">
        <div class="row">
            <div class="col-lg-7 col-8">
                <p class="text-requisito">Escribi los requisitos que solicitas:</p>
            </div>
            <div class="col-lg-5 col-4">
                <button type="button" id="agregar">Agregar</button>
            </div>
        </div>
    </div>
    <div id="dinamic" class="col-lg-12 col-12">

    </div>
    <script>
        const contenedor = document.querySelector('#dinamic');
        const btnAgregar = document.querySelector('#agregar');

        let total = 1;

        btnAgregar.addEventListener('click', e => {
            let div = document.createElement('div');
            div.innerHTML = `
                                   <input type="text" name="requisito[]" class="form-control input-group"
                                    placeholder="Requisito ${total++}:" required>
                               </div>
                              
                           <button  class="form-control" onclick="eliminar(this)" >
                              Eliminar
                           </button>
                       
                               
                       `;
            contenedor.appendChild(div);
        })




        const eliminar = (e) => {
            const divPadre = e.parentNode;
            contenedor.removeChild(divPadre);
            actualizarContador();
        }


        const actualizarContador = () => {
            let divs = contenedor.children;
            total = 1;
            for (let i = 0; i < divs.length; i++) {
                div[i].children[0].innerHTML = total++;
            }
        }
    </script>