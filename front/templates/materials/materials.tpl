<div class="container my-5 mx-auto" style="max-width: 800px;">
    <h1 class="my-5 text-center">Materiales aceptados</h3>
    {if $materials|count == 0}
        <p class="mt-5">No se encontraron materiales</p>
    {else if}
        {foreach from=$materials item=material}
            <div class="material-collapse">
                {if $material@first}
                <div type="button" class="row collapse-title" data-toggle="collapse" data-target="#{$material->id_material}" aria-controls="{$material->id_material}">
                {else if}
                <div type="button" class="row collapse-title" data-toggle="collapse" data-target="#{$material->id_material}" aria-controls="{$material->id_material}">
                {/if}
                    <div class="col-4">
                        {if $material->imagen_material !== ''}
                            <img src="{$material->imagen_material}" alt="...">
                        {else if}
                            <img src=./back/images/imageEmpty.jpeg alt="...">
                        {/if}
                    </div>
                    <div class="col-6 col-sm-7 my-auto">
                        <span>{$material->nombre_material}</span>
                    </div>
                    <div class="col-2 col-sm-1 my-auto">
                        <i class="fas fa-arrow-circle-down"></i>
                    </div>
                </div>
                <div class="collapse" id="{$material->id_material}">
                    <div class="collapse-body">
                        <span class="ml-3">{$material->condicion_entrega}</span>
                    </div>
                </div>
            </div>
        {/foreach}
    {/if}
</div>
