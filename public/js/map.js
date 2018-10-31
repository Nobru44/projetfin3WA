"use strict";



/////CARTE FORMULAIRE AVEC API LEATFLET /////


   var options = {
      center: [-21.02317, 55.23218],
      zoom: 8
    }
    
    var map = L.map('map', options);

    L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {attribution: 'OSM'})
    .addTo(map);

    var myMarker = L.marker([-21.02317, 55.23218], {title: "MyPoint", alt: "The Big I", draggable: true})
    .addTo(map)
    .on('dragend', function() {
      var coord = String(myMarker.getLatLng()).split(',');
      var lat = coord[0].split('(');
      var lng = coord[1].split(')');
      myMarker.bindPopup("Moved to: " + lat[1] + ", " + lng[0] + ".");
      var html1 = "<input id='cool' type='hidden' name='lat' value='" + lat[1] + "'>";
      var html2 = "<input id='cool2' type='hidden' name='long' value='" + lng[0] + "'>";
      $('#lat').html(html1);
      $('#long').html(html2);
    });