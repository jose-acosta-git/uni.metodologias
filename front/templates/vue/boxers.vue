{literal}
 <div class="container">
  <div class="" id="listBoxers" >
    <div class="dropdown">
      <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >
        Cartoneros
      </button>
      <div  class="dropdown-menu" aria-labelledby="dropdownMenuButton">
        <a v-for="box in boxersList" class="dropdown-item" v-on:click="selectBoxer" v-bind:id="box.dni" v-bind:name="box.apellido+' '+box.nombre ">{{box.nombre}} {{box.apellido}}</a>
       
      </div>
    </div>
  </div> 
  
  </div>
{/literal}