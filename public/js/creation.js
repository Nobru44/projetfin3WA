"use strict";

////CONTROLE CREATION DE COMPTE////



/////CONTROLE NOM ET PRENOM/////



var firstname = document.querySelector("#firstname");
firstname.addEventListener("keyup", verifFirst); 


var lastname = document.querySelector("#lastname");
lastname.addEventListener("keyup", verifLast); 



//////CONTRÔLE DE LA FORME DU MAIL///////


$("#mail").on('keyup', verifMailBis);



/////////CONTRÔLE SI LE MAIL EXISTE DANS LA BASE EN AJAX//////////


$("#mail").on('focusout', verifMailExist);

/////LE PASSWORD//////////

var nodePass = document.querySelector("#password");
nodePass.addEventListener("input", function (event) {
    var password = event.target.value; 
    var longueur = "faible";
    var couleurMsg = "red";
    if (password.length <= 30 && password.length >= 8) {
      longueur = "suffisante"
      couleurMsg = "green";
    } else if (password.length <=30 && password.length >= 6) {
       longueur = "moyenne";
       couleurMsg = "orange";
    } else if (password.length > 30) {
      longueur = "trop longue"; 
      couleurMsg = "red";
    } else if (password.length < 6) {
      longueur = "trop courte"; 
      couleurMsg = "red";
    }
    var aidePassword = document.querySelector("#aidePassword");
    aidePassword.textContent = "Longueur : " + longueur;
    aidePassword.style.color = couleurMsg;
});


///////LA CONFIRMATION DU PASSWORD//////////

$("#confirmation").keyup(confirmationValid);



//////////SUPER VERIF AVANT ENVOI/////////////////


$("#btn-create").on('click', function(event) {
    if(!regexNom.test($("#firstname").val())) {
      $("#aidefirstname").html("Saisie invalide");
      $("#aidefirstname").css('color', 'red');
      event.preventDefault();
    } 
    if(!regexNom.test($("#lastname").val())) {
      $("#aidelastname").html("Saisie invalide");
      $("#aidelastname").css('color', 'red');
      event.preventDefault();
    }
    var result = document.querySelector("#aideMail");
    if(result.textContent !=  "Mail valide" || result.textContent == null) {
      $("#aideMail").html('Mail invalide');
      $("#aideMail").css('color', 'red');
      event.preventDefault();
    }
    verifMailBis(event);
    confirmationValid(event);
    var result = document.querySelector("#aideMail");  
  }
);