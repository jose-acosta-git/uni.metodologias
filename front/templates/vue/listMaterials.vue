{literal}
  <div class="row m-0">
    <div class="material-accept-list mx-4 mx-md-auto my-4 col-md-8 p-0">
        <div id="materials">
            <h3 class="materials-title mt-3 ml-3">En este momento se aceptan:</h3>
            <div v-for="material in list">        
              <div class="card mb-3 mx-3">
                  <div class="row g-0 card-img">
                    <div class="  col-xl-3 ">
                      <img v-if="material.image !== ''" v-bind:src=material.image class="card-img" alt="...">
                      <img v-else src=./front/images/imageEmpty.jpeg  class="card-img" alt="...">
                    </div>
                    <div class="col-8">
                        <h5 class="card-title">{{material.name}}</h5>
                        <div class="material-info">{{material.info}}</div>                      
                    </div>
                  </div>
                </div>                                  
            </div>
        </div>  
    </div> 
  </div> 
{/literal}