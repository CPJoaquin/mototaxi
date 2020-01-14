const tilesPrivider = 'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png';
var lt = -17.97856;
var lg = -67.10539;
let myMap = L.map('myMap').setView([lt, lg], 13)
L.tileLayer(tilesPrivider,{
	maxZoom: 18,
}).addTo(myMap);

let marker = L.marker([lt, lg]).addTo(myMap);
let iconMarker = L.icon({
	iconUrl: 'marker.png',
	iconSize: [60, 60],
	iconAnchor: [30, 60],
})
let marker2 = L.marker([lt, lg], {
	icon: iconMarker,
}).addTo(myMap);
myMap.doubleClickZoom.disable();
myMap.on('dblclick', e => {
  let latLng = myMap.mouseEventToLatLng(e.originalEvent);

  L.marker([latLng.lat, latLng.lng], { icon: iconMarker }).addTo(myMap)
})
/*
navigator.getlocation.getCurrentPosition(
	(pos) => {
		const { coords } = pos
		L.marker([coords.latitude, coords.longitude], { icon: iconMarker }).addTo(myMap)
	},
	(error) => {
		console.log(error)
	},
	{
		enableHighAccuracy: true,
		timeout: 5000,
		maximumAge: 0
	}
)*/
navigator.geolocation.getCurrentPosition(
  (pos) => {
    const { coords } = pos
    const { latitude, longitude } = coords
    L.marker([latitude, longitude], { icon: iconMarker }).addTo(myMap)

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