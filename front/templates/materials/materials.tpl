<div class="row m-0">
    <div class="material-accept-list mx-4 mx-md-auto my-4 col-md-8 p-0">
        <div id="materials">
            <h3 class="materials-title mt-3 ml-3">En este momento se aceptan:</h3>
            {if $materials|count == 0}
                <p class="mt-5">No se encontraron materiales</p>
            {else if}
                {foreach from=$materials item=material}
                    <div class="card mb-3 mx-3">
                        <div class="row g-0 card-img">
                            <div class="col-xl-3">
                                {if $material->imagen_material !== ''}
                                    <img src="{$material->imagen_material}" class="card-img" alt="...">
                                {else if}
                                    <img src=./front/images/imageEmpty.jpeg class="card-img" alt="...">
                                {/if}
                            </div>
                            <div class="col-8">
                                <h5 class="card-title">{$material->nombre_material}</h5>
                                <div class="material-info">{$material->condicion_entrega}</div>
                            </div>
                        </div>
                    </div>
                {/foreach}
            {/if}
        </div>
    </div> 
</div> 