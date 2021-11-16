{literal}
    <section class="container">
        <div class="mx-5 my-3">
            <fieldset class="custom-fieldset fourth-color">
                <legend class="custom-fieldset">Materiales ingresados por  <span id="boxerName"></span></legend>

                <section id="boxersList" class="col-12">
                    <ul class="row list-group mt-5">
                        <li v-for="box in list" class="list-group-item d-flex justify-content-between">
                            <div class="font-italic">{{ order.apellido }} {{ order.nombre }}</div>
                            <div class="font-italic">{{ order.direccion }}</div>
                           
                        </li>
                    </ul>
                </section>
            </fieldset>
        </div>
    </section>
{/literal}