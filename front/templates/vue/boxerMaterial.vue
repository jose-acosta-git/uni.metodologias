{literal}
    <section class="container">
        <div class="mx-5 my-3">
            <fieldset class="custom-fieldset fourth-color">
                <legend class="custom-fieldset">Materiales ingresados por  <span id="boxerName"></span></legend>

                <section id="listMat" class="col-12">
                    <ul class="row list-group mt-5">
                        <li  v-for="boxi in lista_provisoria" class="list-group-item d-flex justify-content-between">
                            <div class="font-italic">{{boxi.nombre_material}}</div>
                            <div class="font-italic">{{boxi.peso}}</div>
                            
                           
                        </li>
                    </ul>
                    <order-list></order-list>
                </section>
            </fieldset>
        </div>
    </section>
{/literal}