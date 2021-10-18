"use strict";

const listMaterials = new Vue({
    el: "#materials",
    data: {
        list: [],
                   
    },
    methods: {
        /** inicia la carga de los datos en el componente vue */
        chargeData() {
            
        }
    }
}); 

document.addEventListener("DOMContentLoaded", initPage());

function initPage() {
    /**  Muestra todos los materiales */
    showMaterials();

    /** Obtiene todos los materiales y los imprime */
    async function showMaterials() {
        let r = await fetch(`api/material` ,{
            "method": "GET"
        });
        let materials = await r.json();
        listMaterials.list = materials; 
       
        
    };
    
        
}


/** Componente vue que maneja los botones y el cuadro de texto
 * que muestran la informacion acerca de como deben ser entregados 
 * los materiales */
Vue.component('button-material', {
    data: function() {
        return {            
            name: '',
            info: '',
        }
    },
    /** Template del boton y la caja de texto */
    template: `
    <p>
    <button class="btn btn-success " type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample" id="btnMaterial" v-on:click='chargeData()' >
      Ver condiciones de entrega
    </button>
    </p>
    
    `,
    methods: {
        /** Esta funcion carga en cada cuadro de texto la 
         * informacion de como deben ser entregados los materiales */
        chargeData: function() {           
            this.count=this.$el.id;            
            listMaterials.list.forEach(element => {
                if (this.$el.id == element.name) {
                    this.name=element.name;
                    this.info=element.info;                    
                    let texto=document.getElementsByName(this.name);                    
                    texto.innerHTML=this.info;
                    document.getElementById(this.name).innerHTML=texto.innerHTML;                                        
                };
            });             
        },
        
    }
});


