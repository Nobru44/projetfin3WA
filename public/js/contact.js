"use strict";

/////CONTROLE NOM, MESSAGE ET MAIL/////



var firstname = document.querySelector("#firstname");
firstname.addEventListener("keyup", verifFirst); 


$("#mail").on('keyup', verifMailBis);

//////CONTRÔLE AVANT ENVOI///////


$(".btn-submit").on('click', function(event) {
    if(!regexNom.test($("#firstname").val())) {
      $("#aidefirstname").html("Saisie invalide");
      $("#aidefirstname").css('color', 'red');
      event.preventDefault();
    }
    verifMailBis(event);
  }
);