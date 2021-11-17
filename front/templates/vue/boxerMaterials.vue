{literal}
    <section class="container">
        <div class="mx-5 my-3">
            <fieldset class="custom-fieldset fourth-color">
                <legend class="custom-fieldset">Materiales ingresados por  <span id="boxerName"></span></legend>

                <section id="listMaterialsRegister" class="col-12">
                    <ul class="row list-group mt-5">
                        <li v-for="box in lista_provisoria" class="list-group-item d-flex justify-content-between">
                            <div class="font-italic">{{ box.material }}</div>
                            
                           
                        </li>
                    </ul>
                </section>
            </fieldset>
        </div>
    </section>
{/literal}