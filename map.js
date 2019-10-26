'use strict';

var markerGroup;

var map = L.map('map', { zoomControl:false }).setView([48.866667, 2.333333], 5);
//map.dragging.disable();
//map.touchZoom.disable();
//map.doubleClickZoom.disable();
//map.scrollWheelZoom.disable();

L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors',
	maxZoom: 18
	}).addTo(map);

/*function layerRemoveMarkers(map)
{
	removeMarker(map);
}*/

$('#city').on('change', function()
{	
	if(markerGroup) {
		markerGroup.clearLayers();
	}
	markerGroup = L.layerGroup().addTo(map);
	//markerGroup.removeLayer(markerGroup._leaflet_id);
	var latitude = $(this.options[this.selectedIndex]).data('lat');
	var longitude = $(this.options[this.selectedIndex]).data('lng');

	L.marker([latitude, longitude]).addTo(markerGroup).bindPopup("<b>Je suis là !</b>");
	map.setView([latitude, longitude], 7);
});
