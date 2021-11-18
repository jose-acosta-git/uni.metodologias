<section class="container">
    <h3 class="nombre_cartonero"></h3>
    <div class="row m-0 p-5 justify-content-between">
      <div class="form-group">
        {include file='../vue/boxers.vue'}
      </div>
      <div class="form-group">
        {include file='../vue/registerMaterials.vue'} 
      </div>
      <div class="form-group">
        <div class="input-group">
          <span class="input-group-text mx-1" id="weight_label">Peso</span>
          <input type="number" aria-label="Weight" class="form-control" id="weight_input">
        </div>

      </div>
    </div>             
      
        <div class="input-group justify-content-center">
          <button id="btn-material-boxer" class="btn" type="submit">Agregar</button>
        </div> 
        
      <div class="form-group col-12">  
        {include file='../vue/boxerMaterial.vue'}
      </div>

</select>
                  
  </section>