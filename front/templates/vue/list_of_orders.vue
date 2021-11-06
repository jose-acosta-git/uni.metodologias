{literal}
<section id="listOrders" class="col-12">

    <div class="row">
        <h4 class="ml-2">Lista de pedidos por retirar:</h4>
    </div>

    <ul v-else class="row list-group mt-5">
        <li v-for="order in list" class="list-group-item d-flex justify-content-between">
            <div class="font-italic">CAMPO1: {{ order.CAMPO1 }}</div>
            <div class="font-italic ml-1">CAMPO2: <span class="text-primary font-weight-bolder">{{ order.CAMPO2 }}</span></div>
            <div class="font-italic text-capitalize text-break flex-grow-1 ml-2">CAMPO3: {{ order.CAMPO3 }}</div>
        </li>
    </ul>

</section>
{/literal}