"use strict"


////////CARTE POUR EXTRAIRE COORDONNEES D'UNE ALGUE SOUMISE AVEC API LEATFLET///////

var coordList = [];

if(result != null) {
  for(var i = 0; i < result.length; i++) {
    var coord = [];
    coord.push(result[i].latitude);
    coord.push(result[i].longitude);
    coordList.push(coord);
    var options = [
      coordList[0]
    ];
  }

  var map = L.map('map').setView(options[0], 9);
  L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {attribution: 'OSM'})
    .addTo(map);

  for(var i = 0; i < coordList.length; i++) {
    var circle = L.circle(coordList[i], {
    color: 'red',
    fillColor: '#f03',
    fillOpacity: 0.5,
    radius: 500
    }).addTo(map);
  }

} else {
    var coord = [];
    latitude = +'-21.02317';
    coord.push(latitude);
    longitude = +'55.23218'
    coord.push(longitude);
    coordList.push(coord);
    var options = [
      coordList[0]
    ];
}