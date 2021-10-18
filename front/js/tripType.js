"use strict";

let app = new Vue({
    el: "#tripType",
    data: {
        tripTypeValue: "another"
    },
    methods: {
        onTripTypeChange: function (event) {
            this.tripTypeValue = event.target.value;
        },
    }
});