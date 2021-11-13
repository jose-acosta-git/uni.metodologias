{literal}
    
    <div class="" >
      <div class="list-group " id="listBoxers">
        <button type="button" class="list-group-item list-group-item-action active">
          Cartoneros
        </button>
        <button v-for="boxPerson in boxersList" type="button" class="list-group-item list-group-item-action">{{boxPerson.apellidoYnombre}}</button>
        
      </div>
        
       
     
  </div> 


{/literal}