"use strict";

const listMaterials = new Vue({
    el: "#materials",
    data: {
        list: [],
                   
    },
    methods: {
        
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



