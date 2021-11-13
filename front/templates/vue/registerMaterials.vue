{literal}
 <div class="container">
  <div class="" id="listMaterialsRegister" >
    <div class="dropdown">
      <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Material
      </button>
      <div  class="dropdown-menu" aria-labelledby="dropdownMenuButton">
        <a v-for="material in list" class="dropdown-item">{{material.name}} </a>
       
      </div>
    </div>
  </div> 
  
  </div>
{/literal}
