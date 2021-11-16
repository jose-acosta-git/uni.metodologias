{literal}
<section class="container">
    <div class="mx-5 my-3">
        <fieldset class="custom-fieldset fourth-color">
            <legend class="custom-fieldset">Lista de pedidos por retirar</legend>
            <section id="listOrders" class="col-12">
                <ul class="row list-group mt-5">
                    <li v-for="order in list" class="list-group-item d-flex justify-content-between">
                        <div class="font-italic">{{ order.apellido }} {{ order.nombre }}</div>
                        <div class="font-italic">{{ order.direccion }}</div>
                        <div class="font-italic">{{ order.fecha_pedido }}</div>
                    </li>
                </ul>
            </section>
        </fieldset>
    </div>
</section>
{/literal}