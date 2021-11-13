<section class="container">
  <div class="mx-5 my-3">
    <fieldset class="custom-fieldset fourth-color">
      <legend class="custom-fieldset">Filtrar pedidos</legend>
      <form class="row py-0"  action="pedidos-filtrados" method="POST" id="form" ref="form">
        <div class="form-group col-sm-5">
          <label for="fecha-desde">Desde</label>
          <input type="date" name="fecha-desde" class="form-control">
        </div>
        <div class="form-group col-sm-5">
          <label for="fecha-hasta">Hasta</label>
          <input type="date" name="fecha-hasta" class="form-control">
        </div>
        <div class="d-flex col-sm justify-content-center align-items-center">
          <button type="button" v-on:click="filtrar"  class="btn btn-primary custom-button">Cargar</button>
        </div>
      </form>
    </fieldset>
  </div>
</section>