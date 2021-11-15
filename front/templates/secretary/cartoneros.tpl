<div class="container my-5 mx-auto" style="max-width: 800px;">
    <h1 class="my-5 text-center">Cartoneros</h3>
        {if $cartoneros|count == 0}
            <p class="mt-5">No se encontraron cartoneros</p>
        {else if}
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">DNI</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Apellido</th>
                        <th scope="col">Direccion</th>
                        <th scope="col">Fecha nacimiento</th>
                    </tr>
                </thead>
                <tbody>
                    {foreach from=$cartoneros item=cartonero}
                        <tr>
                            <th scope="row">{$cartonero.dni}</th>
                            <td>{$cartonero.nombre}</td>
                            <td>{$cartonero.apellido}</td>
                            <td>{$cartonero.direccion}</td>
                            <td>{$cartonero.fecha_nacimiento}</td>
                        </tr>
                    {/foreach}
                </tbody>
            </table>
        {/if}
</div>