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

//myMap.doubleClickZoom.disable();
var x = parseFloat(document.getElementById("latitud").value);
var y = parseFloat(document.getElementById("longitud").value);
let marker2 = L.marker([x, y], {
	icon: iconMarker,
}).addTo(myMap);
