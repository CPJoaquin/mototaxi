const tilesPrivider = 'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png';
let myMap = L.map('myMap').setView([51.505, -0.09], 13)
L.tileLayer(tilesPrivider,{
	maxZoom: 18,
}).addTo(myMap);
var lt = 51.505;
var lg = -0.09;
let marker = L.marker([lt, lg]).addTo(myMap);
let iconMarker = L.icon({
	iconUrl: 'marker.png',
	iconSize: [60, 60],
	iconAnchor: [30, 60],
})
let marker2 = L.marker([51.51, -0.09], {
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