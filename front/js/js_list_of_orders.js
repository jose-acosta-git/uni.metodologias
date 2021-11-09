"use strict";

document.addEventListener('DOMContentLoaded', initpage());

function initpage() {

    const listOrders = new Vue({
        el: "#listOrders",
        data: {
            list: [],

        },
        methods: {
            /** Obtiene todos los pedidos de retiro y los imprime */
            showList_of_Orders: async function() {
                try {
                    const r = await fetch(`api/orders`, {
                        "method": "GET"
                    });
                    const orders = await r.json();
                    if (r.ok) {
                        list_of_Orders.list = orders;
                    }
                } catch (e) {
                    console.log(e);
                }
            }
        }
    });
}