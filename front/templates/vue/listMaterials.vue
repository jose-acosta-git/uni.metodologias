{literal}
  <div class="row m-0">
    <div class="material-accept-list mx-4 mx-md-auto my-4 col-md-8 p-0">
        <div id="materials">
            <h3 class="materials-title mt-3 ml-3">En este momento se aceptan:</h3>
            <div v-for="material in list">        
              <div class="card mb-3 mx-3">
                  <div class="row g-0">
                    <div class="col-6 col-md-5 col-lg-4 col-xl-3">
                      <img v-if="material.image !== ''" v-bind:src=material.image width="100px" height="150" class="card-img" alt="...">
                      <img v-else src=./front/images/imageEmpty.jpeg width="150px" height="100" class="card-img" alt="...">
                    </div>
                    <div class="col-6 col-md-7 col-lg-8 col-xl-9" >
                      <div class="card-body">
                        <h5 class="card-title">{{material.name}}</h5>
                        <button-material v-bind:id='material.name'></button-material>
                        <div  name='material.name'>
                          <div id='material.name'>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>                                  
            </div>
        </div>  
    </div> 
  </div> 
{/literal}