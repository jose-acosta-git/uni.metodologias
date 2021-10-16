"use strict";

const listMaterials = new Vue({
    el: "#materials",
    data: {
        list: [],             
    }
}); 

document.addEventListener("DOMContentLoaded", initPage());

function initPage() {
    /* Muestra todos los materiales */
    showMaterials();

    /* Obtiene todos los materiales y los imprime */
    async function showMaterials() {
        let r = await fetch(`api/material` ,{
            "method": "GET"
        });
        let materials = await r.json();
        listMaterials.list = materials;
    }
    


}
let collapseMaterial = document.querySelector("#collapseMaterial"+{$id});
collapseMaterial.addEventListener("click", e=>{
    e.preventDefault();
    console.log("entra")
});
