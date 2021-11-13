<div class="container my-5 mx-auto" style="max-width:600px;">
    {if isset($material)}
    <form action="editar-material" method="post" enctype="multipart/form-data">
    {else}
    <form action="insertar-material" method="post" enctype="multipart/form-data">
    {/if}
        {if isset($material)}
        <h1 class="text-center">Editar material</h1>
        {else}
        <h1 class="text-center">Añadir material</h1>
        {/if}
        <div class="form-group">
            <label for="name">Nombre</label>
            {if isset($material)}
            <input id="name" value="{$material->nombre_material}" type="text" name="name" class="form-control" required>
            {else}
            <input id="name" type="text" name="name" class="form-control">
            {/if}
        </div>
        <div class="form-group">
            <label for="condition">Condiciones de entrega</label>
            {if isset($material)}
            <input id="condition" value="{$material->condicion_entrega}" type="text" name="condition" class="form-control" required>
            {else}
            <input id="condition" type="text" name="condition" class="form-control">
            {/if}
        </div>
        <div class="form-group">
            <label for="surname">Archivo</label>
            <div class="custom-file">
                <input id="image" type="file" name="image" class="custom-file-input">
                <label for="image" class="custom-file-label">Elegir imagen</label>
            </div>
            {if isset($material)}
                <img src="{$material->imagen_material}" class="w-100 mt-2">
            {/if}
        </div>
        <div class="text-right">
            <a href="materiales-aceptados-secretaria" class="btn btn-primary custom-button">Volver</a>
            <button type="submit" class="btn btn-primary text-end text-right custom-button">Cargar</button>
        </div>
    </form>
</div>