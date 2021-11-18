{literal}
  <div class="container">
    <div class="" id="listMaterialsRegister" >
         
      <select id="material-select" class="form-select btn" v-model="materialSelected" required>
        <option disabled value="">Material</option>
        <option v-for="material in list" v-bind:id="material.id_material" v-bind:value="material.id_material">{{material.nombre_material}}</option>      
      </select>

    </div> 
  </div>
{/literal}