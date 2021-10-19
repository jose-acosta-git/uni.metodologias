<div class="mx-4">
    <div class="row">
        <div class="col-lg-5 col-xl-4 carga_elem_recicables">
            <fieldset class="custom-fieldset">
                <legend class="custom-fieldset">Tengo elementos reciclables</legend>
                <form action="solicitud-ciudadano" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="name">Nombre</label>
                        <input id="name" type="text" name="name" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="surname">Apellido</label>
                        <input id="surname" type="text" name="surname" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="address">Dirección</label>
                        <input id="address" type="text" name="address" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="phone">Teléfono</label>
                        <input id="phone" type="text" name ="phone" class="form-control">
                    </div>
                    {literal}
                    <div id="tripType">
                        <div class="form-group">
                            <label for="trip-type">Tipo de viaje</label>
                            <select id="trip-type" name="trip-type" class="form-control" v-on:change="onTripTypeChange($event)">
                                <option value="another">Quiero que lo retiren</option>
                                <option value="me">Lo voy a llevar</option>
                            </select>
                        </div>
                        <div v-if="tripTypeValue == 'me'">
                    {/literal}
                            {include file='./tripTypeMe.tpl'}
                    {literal}
                        </div>
                        <div v-else-if="tripTypeValue == 'another'">
                    {/literal}
                            {include file='./tripTypeAnother.tpl'}
                    {literal}
                        </div>
                    </div>
                    {/literal}
                                <input type="file" name="imageUpload" id="imageToUpload" class="mt-2 mb-2">

                    <div class="text-right">
                        <button type="submit" class="btn btn-primary text-end text-right">Cargar</button>
                    </div>
                </form>
            </fieldset>
        </div>
        <div class="col-lg-7 col-xl-8 cartelera">
            <fieldset class="custom-fieldset">
                <legend class="custom-fieldset">Cartelera</legend>
                <p>Sin implementar</p>
            </fieldset>
        </div>
    </div>
</div>


