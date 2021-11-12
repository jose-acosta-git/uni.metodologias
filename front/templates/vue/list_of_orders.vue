{literal}
<section class="container">
    <div class="mx-5 my-3">
        <fieldset class="custom-fieldset fourth-color">
            <legend class="custom-fieldset">Lista de pedidos por retirar</legend>
            <section id="listOrders" class="col-12">
                <ul class="row list-group mt-5">
                    <li v-for="order in list" class="list-group-item d-flex justify-content-between">
                        <div class="font-italic">Apellido: {{ order.apellido }}</div>
                        <div class="font-italic">Domicilio: {{ order.domicilio }}</div>
                        <div class="font-italic">Fecha Pedido: {{ order.fecha_pedido }}</div>
                        <!-- <div class="font-italic ml-1">: <span class="text-primary font-weight-bolder">{{ order.CAMPO2 }}</span></div>
                        <div class="font-italic text-capitalize text-break flex-grow-1 ml-2">CAMPO3: {{ order.CAMPO3 }}</div> -->
                    </li>
                </ul>
            </section>
        </fieldset>
    </div>
</section>
{/literal}