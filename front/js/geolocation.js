"use strict" ;

function getKilometros(lat1,lon1,lat2,lon2) {
    let rad = function(x) {return x*Math.PI/180;}
    let R = 6378.137; //Radio de la tierra en km
    let dLat = rad( lat2 - lat1 );
    let dLong = rad( lon2 - lon1 );
    let a = Math.sin(dLat/2) * Math.sin(dLat/2) + Math.cos(rad(lat1)) * Math.cos(rad(lat2)) * Math.sin(dLong/2) * Math.sin(dLong/2);
    let c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1-a));
    let d = R * c;
    return d.toFixed(3); //Retorna tres decimales
}

async function getCoords(address) {
        // Creamos el objeto geodecoder
        var geocoder = new google.maps.Geocoder();
        if(address!='') {
            // Llamamos a la función geodecode pasandole la dirección que hemos introducido en la caja de texto.
            let direccion = await geocoder.geocode({ 'address': `${address}, Tandil, Buenos Aires`});
            let basurero = await geocoder.geocode({ 'address': 'UNICEN Campus Universitario, Tandil, Buenos Aires'});
            let lat1 = direccion.results[0].geometry.location.lat();
            let lng1 = direccion.results[0].geometry.location.lng();
            let lat2 = basurero.results[0].geometry.location.lat();
            let lng2 = basurero.results[0].geometry.location.lng();
            return (getKilometros(lat1, lng1, lat2, lng2));
            /*
            geocoder.geocode({ 'address': `${address}, Tandil, Buenos Aires`}, function(results, status) {
                if (status == 'OK') {
                    lat1 = results[0].geometry.location.lat();
                    lng1 = results[0].geometry.location.lng();
                } 
            });
            
            geocoder.geocode({ 'address': 'UNICEN Campus Universitario, Tandil, Buenos Aires'}, function(results, status) {
                if (status == 'OK') {
                    lat2 = results[0].geometry.location.lat();
                    lng2 = results[0].geometry.location.lng();
                } 
                let km = getKilometros(lat1,lng1,lat2,lng2);
                return km;
            });
            */ 
        }
    
}

document.querySelector("#form-ciudadano").addEventListener("submit", async (event) => {
    event.preventDefault();
    let address = document.getElementById('address').value;
    let r = await getCoords(address);
    console.log(r);
    if (r){
        if (isNaN(r)){
            console.log('Domicilio invalido');
        }
        else if (r > 6) {
            console.log('La distancia es mayor a 6');
        } else {
            console.log('Domicilio valida');
        }
    }
});

