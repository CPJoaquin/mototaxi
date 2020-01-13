// [-17.97856, -67.10539]

$(document).ready(function () {
    //Click al boton para pedir permisos
   // $("#pedirvan").click(function () {
        //Si el navegador soporta geolocalizacion
        if (!!navigator.geolocation) {
            //Pedimos los datos de geolocalizacion al navegador
            navigator.geolocation.getCurrentPosition(
                    //Si el navegador entrega los datos de geolocalizacion los imprimimos
                    function (position) {
                        //window.alert("El transporte ira a su ubicacion actual.");
                        $("#nlat").text(position.coords.latitude);
                        $("#nlon").text(position.coords.longitude);
                        let myMap = L.map('myMap').setView([-17.97856, -67.10539], 15)
                        var long = document.getElementById('nlon').value;
                        alert(long);
                        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                          maxZoom: 18,
                        }).addTo(myMap);
                      
                        let marker = L.marker([-17.97856, -67.10539]).addTo(myMap)
                        let marker1 = L.marker([position.coords.latitude, position.coords.longitude]).addTo(myMap)
                    },
                    //Si no los entrega manda un alerta de error
                    function () {
                        window.alert("nav no permitido");
                    }
            );
        }
   // });
  
  });
  
  
  /*
  let myMap = L.map('myMap').setView([-17.97856, -67.10539], 15)
  
  L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
      maxZoom: 18,
  }).addTo(myMap);
  
  let marker = L.marker([-17.97856, -67.10539]).addTo(myMap)
  
  let iconMarker = L.icon({
      iconUrl: 'marker.png',
      iconSize: [60, 60],
      iconAnchor: [30, 60]
  })
  
  let marker2 = L.marker([-17.98567, -67.10239], { icon: iconMarker }).addTo(myMap)
  
  myMap.doubleClickZoom.disable()
  myMap.on('dblclick', e => {
    let latLng = myMap.mouseEventToLatLng(e.originalEvent);
  
    L.marker([latLng.lat, latLng.lng], { icon: iconMarker }).addTo(myMap)
  })
  
  navigator.geolocation.getCurrentPosition(
    (pos) => {
      const { coords } = pos
      const { latitude, longitude } = coords
      L.marker([coords.latitude, coords.longitude]).addTo(myMap)
    },
    (error) => {
      console.log(error)
    },
    {
      enableHighAccuracy: true,
      timeout: 5000,
      maximumAge: 0
    }) */
  