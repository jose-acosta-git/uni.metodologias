{literal}
    
    <div class="" >

      <div class="list-group " id="listBoxers">
        <button type="button" class="list-group-item list-group-item-action active">
          Cartoneros
        </button>
        <button v-for="boxPerson in boxersList" type="button" class="list-group-item list-group-item-action"v-on:click="selectBoxer" v-bind:id="boxPerson.dni" v-bind:name="boxPerson.apellido+' '+boxPerson.nombre ">{{boxPerson.apellido}} {{boxPerson.nombre}}</button>
        
      </div>
        
       
     
  </div> 


{/literal}