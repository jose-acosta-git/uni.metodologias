"use strict";

    let alerta = document.getElementById("alertDirection");
    document.getElementById("address").addEventListener("focus", function () {
        alerta.remove();
    });
