<div class="mx-4">
    <div class="row">
        <div class="col-lg-5 col-xl-4 carga_elem_recicables">
            <fieldset class="custom-fieldset">
                <legend class="custom-fieldset">Tengo elementos reciclables</legend>
                <form>
                    <div class="form-group">
                        <label for="name">Nombre</label>
                        <input id="name" type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="surname">Apellido</label>
                        <input id="surname" type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="address">Dirección</label>
                        <input id="address" type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="phone">Teléfono</label>
                        <input id="phone" type="text" class="form-control">
                    </div>
                    {literal}
                    <div id="tripType">
                        <div class="form-group">
                            <label for="trip-type">Tipo de viaje</label>
                            <select id="trip-type" class="form-control" v-on:change="onTripTypeChange($event)">
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


