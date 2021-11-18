"use strict";


const listMaterialsRegister = new Vue({
    el: "#listMaterialsRegister",
    data: {
        materialSelected: "",
        list: [],
    },

});

const listMate = new Vue({
    el: "#listMat",
    data: {
        lista_provisoria: [],
    }
});

const listBoxers = new Vue({
    el: "#listBoxers",
    data: {
        boxerSelected: "",
        boxersList: [],
    },
    methods: {
        selectBoxer: async function(e) {
            let id = e.target.id;
            let title = document.querySelector("#boxerName");
            title.innerHTML = e.target.name;
            this.boxerSelected = id;
            this.loadBoxers(id);
        },
        loadBoxers: async function(id) {
            let r = await fetch(`api/material/${id}`, {
                "method": "GET"
            });
            if (r.ok) {
                let materials = await r.json();
                listMate.lista_provisoria = materials;
            } else {
                listMate.lista_provisoria = [];
            }
        }
    }


});

document.addEventListener("DOMContentLoaded", initPage());

function initPage() {
    /**  Muestra todos los materiales */
    showMaterials();
    showBoxers();
    /** Obtiene todos los materiales y los imprime */
    async function showMaterials() {
        let r = await fetch(`api/material`, {
            "method": "GET"
        });
        let materials = await r.json();
        listMaterialsRegister.list = materials;
    };

    /** Obtiene todos los materiales y los imprime */
    async function showBoxers() {
        let r = await fetch(`api/boxers`, {
            "method": "GET"
        });
        let boxers = await r.json();
        listBoxers.boxersList = boxers;
    };

    document.querySelector("#btn-material-boxer").addEventListener("click", function(e) {
        e.preventDefault();
        let weight = document.querySelector("#weight_input").value;
        addMaterialBoxer(listBoxers.boxerSelected, listMaterialsRegister.materialSelected, weight);
    });

    async function addMaterialBoxer(boxerId, materialId, weight) {
        let data = {
            "boxerId": boxerId,
            "materialId": materialId,
            "weight": weight
        }
        let r = await fetch(`api/material`, {
            "method": "POST",
            "headers": { "Content-Type": "application/json" },
            "body": JSON.stringify(data)
        });
        if (r.ok) {
            let material = await r.json();
            listBoxers.loadBoxers(material.dni_cartonero);
        }
    }


}