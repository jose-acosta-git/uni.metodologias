"use strict";

window.addEventListener("DOMContentLoaded", initPage());

function initPage() {
       
    const materials = document.querySelector("#materials");
    
    /* Muestra todos los materiales */
    showMaterials();

    /* Obtiene todos los materiales y los imprime */
    async function showMaterials() {
        let r = await fetch(`api/material` ,{
            "method": "GET"
        });
        let listMaterials = await r.json();
        listMaterials.forEach( m => {
            materials.innerHTML += `<li>${m.name}</li>`;
        });
    }
}