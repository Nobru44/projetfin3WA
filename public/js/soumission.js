"use strict";



/////FICHIER A CHARGER/////
  
var input = document.querySelector('#mon_fichier');
var preview = document.querySelector('.preview');
input.style.opacity = 0;
input.addEventListener('change', updateImageDisplay);




$("#title_photo").on("blur", valideTitlePhoto);





///////SOUMISSION DE L'ALGUE///////


$("#subalgues").on('click', function(event) {
    if(updateImageDisplay() == false) {
      event.preventDefault();
    }
    if(valideTitlePhoto(event) == false) {
      event.preventDefault();
    }
    if(verifCoord(event) == false) {
      event.preventDefault();
    };
    var date = $("#date").val();
    if(checkDate(date) === false) {
      event.preventDefault();
    }

})