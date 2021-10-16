{literal}
    <div class="material-accept-list">
        <ul id="materials">
            <h2 class="materials-title">En este momento se aceptan:</h2>
            <div v-for="material in list">        
                <li >
                    <div class="card mb-3" style="max-width: 540px;">
                        <div class="row g-0">
                          <div class="col-md-4">
                            <img v-if="material.image !== ''" v-bind:src=material.image width="150" height="150" class="card-img" alt="...">
                            <img v-else src=./front/images/imageEmpty.jpeg width="150" height="150" class="card-img" alt="...">
                          </div>
                          <div class="col-md-8">
                            <div class="card-body">
                              <h5 class="card-title">{{material.name}}</h5>
                              
                              <p>                             
                                <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                                    Condiciones de Entrega
                                </button>
                                </p>
                                <div class="collapse" id="collapseMaterial" v-bind:id='material.name'>
                                    <div class="card card-body">
                                      {{material.condition}}
                                    </div>
                                  </div> 
                            </div>
                          </div>
                        </div>
                      </div>
                     
                </li>              
            </div>
        </ul>

        

    </div>
    
{/literal}