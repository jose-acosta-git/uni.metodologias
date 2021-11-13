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
                        listOrders.list = orders;
                    }
                } catch (e) {
                    console.log(e);
                }
            },
         
        }
    });
    listOrders.showList_of_Orders();
    
    const form = new Vue({
        el: "#form",
        data: {
            list: [],

        },
        methods: {
            /** Obtiene todos los pedidos de retiro y los imprime */
            filtrar: function() {
        let formData = new FormData(this.$refs.form);

        let fechaDesde = formData.get('fecha-desde');
        let fechaHasta = formData.get('fecha-hasta');
        console.log(fechaDesde)
        console.log(fechaHasta)
        this.showList_of_Orders_Filter(fechaDesde, fechaHasta);
            },
                showList_of_Orders_Filter: async function(fechaDesde, fechaHasta) {
                try {
                    const r = await fetch(`api/orders/${fechaDesde}/${fechaHasta}`, {
                        "method": "GET",
                    });
                    const orders = await r.json();
                    if (r.ok) {
                        console.log(orders)
                        listOrders.list = orders;
                    }
                } catch (e) {
                    console.log(e);
                }
            }
        }
    });


}

