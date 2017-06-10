$(document).ready(function(e){
  var mainMap = new L.map('mainMap');
  
  // create the tile layer with correct attribution
	var osmUrl='http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png';
	var osmAttrib='Map data © <a href="http://openstreetmap.org">OpenStreetMap</a> contributors';
	var osm = new L.TileLayer(osmUrl, {minZoom: 2, maxZoom: 12, attribution: osmAttrib});
	//var basemapLayer = new L.TileLayer('http://{s}.tiles.mapbox.com/v3/github.map-xgq2svrz/{z}/{x}/{y}.png');

  // start the map in United Sates
	mainMap.setView(new L.LatLng(39.57182, -97.60254),4);
	mainMap.addLayer(osm);


});