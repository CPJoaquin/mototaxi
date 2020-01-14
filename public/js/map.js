const tilesProvider = 'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png';
let myMap = L.map('myMap').setView([-17.97856, -67.10539], 13)
L.tileLayer(tilesProvider,{
	maxZoom: 18,
}).addTo(myMap);
var lt = -17.97856; 
var lg = -67.10539;
let marker = L.marker([lt, lg]).addTo(myMap);
let iconMarker = L.icon({
	iconUrl: '../images/marker.png',
	iconSize: [60, 60],
	iconAnchor: [30, 60],
})
let marker2 = L.marker([-17.98450, -67.10395], {
	icon: iconMarker,
}).addTo(myMap);
myMap.doubleClickZoom.disable();
myMap.on('dblclick', e => {
  let latLng = myMap.mouseEventToLatLng(e.originalEvent);

  L.marker([latLng.lat, latLng.lng], { icon: iconMarker }).addTo(myMap)
  document.getElementById("latitud").value = latLng.lat;
  document.getElementById("longitud").value = latLng.lng;
})
navigator.geolocation.getCurrentPosition(
  (pos) => {
    const { coords } = pos
    const { latitude, longitude } = coords
    //L.marker([latitude, longitude], { icon: iconMarker }).addTo(myMap)

    setTimeout(() => {
      myMap.panTo(new L.LatLng(latitude, longitude))
    }, 5000)
  },
  (error) => {
    console.log(error)
  },
  {
    enableHighAccuracy: true,
    timeout: 5000,
    maximumAge: 0
  })