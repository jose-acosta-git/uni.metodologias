{literal}
<div id="materials" class="container my-5">
    <div class="secretary-materials-table">
        <div class="row d-flex">
            <div class="col-3 col-md-2">Título</div>
            <div class="col-3 col-md-6">Descripción</div>
            <div class="col-3 col-md-2">Imagen</div>
            <div class="col-3 col-md-2">Acciones</div>
        </div>
        <div v-for="material in list" class="row d-block d-md-flex">
            <div class="col-md-2">
                {{material.name}}
            </div>
            <div class="col-md-6">
                {{material.info}}
            </div>
            <div class="col-md-2">
                <img v-if="material.image !== ''" v-bind:src="material.image" class="card-img" alt="...">
                <img v-else src=./front/images/imageEmpty.jpeg class="card-img" alt="...">
            </div>
            <div class="col-md-2">
                <a v-bind:href="'formulario-material-aceptado/'+ material.id">
                    <i class="fas fa-pencil-alt"></i>
                </a>
                <a v-bind:href="'eliminar-material/'+ material.id">
                    <i class="fas fa-trash"></i>
                </a>
            </div>
        </div>
    </div>
</div>
{/literal}