"use strict";


/////CARTE POUR VALIDATION DANS ADMIN AVEC API LEATFLET////

if(result != null) {
   var options = {
      center: [result.latitude, result.longitude],
      zoom: 8
    }
} else {
  var result = {};
  result.latitude = -21.02317;
  result.longitude = 55.23218; 
   var options = {
      center: [result.latitude, result.longitude],
      zoom: 8
    }
}
    
    var map = L.map('map', options);

    L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {attribution: 'OSM'})
    .addTo(map);

    var myMarker = L.marker([result.latitude, result.longitude], {title: "MyPoint", alt: "The Big I", draggable: true})
    .addTo(map)
    .on('dragend', function() {
      var coord = String(myMarker.getLatLng()).split(',');
      console.log(coord);
      var lat = coord[0].split('(');
      console.log(lat);
      var lng = coord[1].split(')');
      console.log(lng);
      myMarker.bindPopup("Moved to: " + lat[1] + ", " + lng[0] + ".");
   		var html1 = "<input type='hidden' name='lat' value='" + lat[1] + "'>";
      	var html2 = "<input type='hidden' name='long' value='" + lng[0] + "'>";
      $('#lat').html(html1);
      $('#long').html(html2);
    });