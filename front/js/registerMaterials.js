"use strict";

const listMaterialsRegister = new Vue({
    el: "#listMaterialsRegister",
    data: {
        list: [],
                   
    },
    methods: {
        
    }
}); 

const listBoxers = new Vue ({
    el: "#listBoxers",
    data: {
        boxersList:[],
    },
    methods:{
        selectBoxer: async function(e) {
            let id = e.target.id;
            let title=document.querySelector(".nombre_cartonero");
            console.log(id);
            title.innerHTML=e.target.name;
            
            
            
        }
    }

    
});

document.addEventListener("DOMContentLoaded", initPage());

function initPage() {
    /**  Muestra todos los materiales */
    showMaterials();
    showBoxers();
    console.log(listBoxers.boxersList)
    /** Obtiene todos los materiales y los imprime */
    async function showMaterials() {
        let r = await fetch(`api/material` ,{
            "method": "GET"
        });
        let materials = await r.json();
        listMaterialsRegister.list = materials; 
        console.log(listMaterialsRegister.list);
    };
    
    /** Obtiene todos los materiales y los imprime */
    async function showBoxers() {
        let r = await fetch(`api/boxers` ,{
            "method": "GET"
        });
        let boxers = await r.json();
        listBoxers.boxersList= boxers; 
        console.log(listBoxers.boxersList);        
    };   



        
}
