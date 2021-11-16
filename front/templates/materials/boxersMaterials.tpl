  <section class="container">
    <h3 class="nombre_cartonero"></h3>
    <div class="row m-0 p-5 justify-content-between">
      <div class="form-group">
        {include file='../vue/boxers.vue'}
      </div>
      <div class="form-group mr-3">
        {include file='../vue/registerMaterials.vue'} 
      </div>
      <div class="form-group">
        <div class="input-group">
          <span class="input-group-text mr-1" id="weight_label">Peso</span>
          <input type="number" aria-label="Weight" class="form-control" id="weight_input">
        </div>
       <div class="form-group mt-3 justify-content-center">
          <table class="table">
            <thead>
              <tr>
                <th scope="col">Material</th>
                <th scope="col">Kilos</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>Otto</td>
                <td>@mdo</td>
              </tr>
            </tbody>
          </table>
       </div>

      </div>
       <div class="form-group mt-4">
          <input class="btn" type="submit" value="Agregar" id="btn_add_box">
        </div>
    </div>             
                  
  </section>