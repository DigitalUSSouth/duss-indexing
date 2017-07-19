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

	var itemMarkers =  L.markerClusterGroup();
  console.log('created layers')
	var counter = 1;
	$.each(itemLocations,function (location,mkr){
		//if (counter++ > 100) return;
		//console.log(mkr);
		if (mkr.latlng[0]== null || mkr.latlng[1]== null) return; //if key is blank then it's an invalid marker so we just return
		//console.log(mkr);
		//var marker = new L.marker(mkr.latlng).addTo(mainMap).bindPopup(mkr.title);//.addTo(mainMap
		var marker = L.marker(mkr.latlng,{title:location});
		
		var popup = "<h1>"+location+"</h1>";

		//console.log(mkr);
		mkr.items.forEach(function(item){
			popup = popup+"<p><big><a href=\""+item.url+"\" targe=\"_blank\"><strong>"+item.title+"</strong></a></big><br><em>"+item.archive+"</em><br><small>"+item.description.substr(0,45)+"</small></p>";
		});

		//.bindPopup("<h1>"+mkr.title+"</h1><p><a target=\"_blank\" href=\""+mkr.url+"\">Click here to view</a><br>"+mkr.description+"</p>")//.addTo(mainMap);
		//console.log(marker);
		marker.bindPopup(popup);
		itemMarkers.addLayer(marker);
		console.log(popup);
	});
	mainMap.addLayer(itemMarkers);

});