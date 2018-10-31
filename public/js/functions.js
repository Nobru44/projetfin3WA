"use strict";





////////////CREATE USER /////////////////////

function surligne(champ, erreur) {
   if(erreur) {
      champ.style.backgroundColor = "#fba";
   } else {
      champ.style.backgroundColor = "";
      $("#aideMail").html('');
    }
}


function verifMailBis(event) {
   if(!regexMail.test($("#mail").val()))

   {
      var html ="Mail invalide";
      $("#aideMail").html(html);
      $("#aideMail").css('color','red');
      event.preventDefault();
   } else {
      var html = "Mail valide"; 
      $("#aideMail").html(html);
      $("#aideMail").css('color','green');
   }
 
}

/////LOGIN////////

function verifMail(event) {
   if(!regexMail.test($("#mailLogin").val()))

   {
      var html ="Mail invalide";
      $("#aideMail").html(html);
      $("#aideMail").css('color','red');
      event.preventDefault();
   } else {
      var html = "Mail valide"; 
      $("#aideMail").html(html);
      $("#aideMail").css('color','green');
   }
 
}

function verifMailExistLog(event) {
  var mail = $("#mailLogin").val();
  $.post(
    'mailVerif.php',
    {
      mail : mail
    },
    function(html) {
     
      $("#aideMail").html(html);
      
      if(html == "Ce mail existe déjà") {
        var html = "Mail valide";
        $("#aideMail").html(html);
        $("#aideMail").css('color', 'green');
      } else {
        var html = "Mail invalide";
        $("#aideMail").html(html);
        $("#aideMail").css('color', 'red');
        event.preventDefault();
      }
    },
    "html"
    );
}

function validationLogin(event) {
    var nodeMail = document.querySelector("#mailLogin");
    var nodePassword = document.querySelector("#password-login");
    verifMailExistLog(event);
    var result = document.querySelector("#aideMail");
    if(result.textContent ==  "Mail invalide" || result.textContent == null) {
      $("#aideMail").html('Mail invalide');
      $("#aideMail").css('color', 'red');
      event.preventDefault();
    }
    var nodePasswordVal = document.querySelector("#password-login").value;
    if (nodePasswordVal == "") {
      event.preventDefault();
      surligne(nodePassword, true);
      var message = "Saisie incorrecte";
      $("#aidePassword").html(message);
      $("#aidePassword").css("color", "red");
    } else {
      surligne(nodePassword, false);
      var html = "";
      $("#aidePassword").html(html);
    }
}

function verifMailExist(event) {
  
  var mail = $("#mail").val();
  $.post(
    'mailVerif.php',
    {
      mail : mail
    },
    function(html) {
       $("#aideMail").html(html);     
      if(html == "Ce mail existe déjà" || html == "Mail invalide") {
        $("#aideMail").html(html);
        $("#aideMail").css('color', 'red');
      } else {
        $("#aideMail").html("Mail valide");
        $("#aideMail").css('color', 'green');
      }
    },
    "html"
    );
}

function verifFirst(champ) {
  if(!regexNom.test(this.value)) {
      var html ="Saisie incorrecte";
      $("#aidefirstname").html(html);
      $("#aidefirstname").css('color','red');
   } else {
    var html = "";
    $("#aidefirstname").html(html);
   }
}

function verifLast(champ) {
  if(!regexNom.test(this.value) || this.value === "")
   {
      var html ="Saisie incorrecte";
      $("#aidelastname").html(html);
      $("#aidelastname").css('color','red');
   } else {
    var html = "";
      $("#aidelastname").html(html);
   }
}

function verifMessage(champ) {
  if(!regexNom.test(this.value)) {
      var html ="Saisie incorrecte";
      $("#aideMessage").html(html);
      $("#aideMessage").css('color','red');
   } else {
    var html = "";
    $("#aideMessage").html(html);
   }
}

function confirmationValid(event) {
  if($("#confirmation").val() != $("#password").val()) {
    var html = "Mots de passe différents";
    $("#aideConfirmation").html(html);
    $("#aideConfirmation").css('color', 'red');
    event.preventDefault();
  } else {
    var html = "Mots de passe identiques";
    $("#aideConfirmation").html(html);
    $("#aideConfirmation").css('color', 'green');
  }
}

///////////////////////////////////////////////////
///////////FORMULAIRE SOUMISSION ALGUE////////////// 
////////////////////////////////////////////////////

///CONTROLE COORDONNEES/////
function isNumber(value)
{
    if(isNaN(value) == true) {
        return false;
    } else {
    return true;
  }
}


function verifCoord (event) {

  $("#previewCoord").html("");
  var latMin = -21.606365;
  var latMax = -20.670051;
  var longMin = 54.997705;
  var longMax = 56.057513;
  if($("input[name=long]").val() === undefined || $("input[name=lat]").val() === undefined) {
      var message = "Veuillez renseigner le lieu de l'observation";
      $("#previewCoord").html(message);
      $("#previewCoord").css("color", "red");
      return false;
    } 
    else if (isNumber($("input[name=lat]").val()) === false || isNumber($("input[name=long]").val()) === false) {
      var message = "Veuillez renseigner le lieu de l'observation";
      $("#previewCoord").html(message);
      $("#previewCoord").css("color", "red");
      return false;
    } 

    else if($("input[name=lat]").val() >  latMax || $("input[name=lat]").val() < latMin  || $("input[name=long]").val() < longMin || $("input[name=long]").val() > longMax) {
      var message = "Ce lieu ne se trouve pas à La Réunion.";
      $("#previewCoord").html(message);
      $("#previewCoord").css("color", "red");
      return false;
  } else {
      $("#previewCoord").html("");
      return true;
  }
}

//////CHECK DATE////////

function checkDate(date) {
    var errors = 0;
    var dateInput = new Date(date);
    if (dateInput.getFullYear() > 2020 || dateInput.getFullYear() < 1999) {
      var html = "Erreur dans la date";
      $("#error_date").html(html);
      $("#error_date").css("color", "red");
      errors++;
    }
    var options = [
      undefined,
      0, 
      "",
      false,
      null  
    ];
    for (var i = 0; i < options.length; i++) {

      if(date ===  options[i]) {
        var html = "Erreur dans la date";
        $("#error_date").html(html);
        $("#error_date").css("color", "red");
        errors ++;
        return errors;
      }
      i++;
    }
    if(errors != 0) {
      return false;
    } else {
      var html = "";
      $("#error_date").html(html);
      return true;
    }
}


//////////VALIDATION TITRE PHOTO /////////////

function surligne(champ, erreur) {
  if(erreur)
    champ.style.backgroundColor = "#fba";
  else
    champ.style.backgroundColor = "";
}


function verifTitlePhoto(champ) {

   var regex = /^[a-zA-Z0-9._-]{1,60}$/;
   if(regex.test(champ.value)) {
      surligne(champ, false);
      return true;
   } else {
      surligne(champ, true);
      return false;
   }
}



function valideTitlePhoto(event) {
  $("#previewTitlePhoto").html("");
  var nodeTitlePhoto = document.querySelector("#title_photo");
  if (nodeTitlePhoto == "" || verifTitlePhoto(nodeTitlePhoto) != true) {      
    var message = "Titre incorrect.";
    $("#previewTitlePhoto").html(message);
    $("#previewTitlePhoto").css("color", "red");
    return false;
  } else if (nodeTitlePhoto.value.length > 50) {
    var message = "Titre trop long.";
    $("#previewTitlePhoto").html(message);
    $("#previewTitlePhoto").css("color", "#red");
    return false;
  } else {
    var message = "";
    $("#previewTitlePhoto").html(message);
    return true;
  }
}


//////VALIDER LE UPLOAD D'IMAGE/////
///le type///

function validFileType(file) {
  for(var i = 0; i < fileTypes.length; i++) {
    if(file.type === fileTypes[i]) {
      return true;
    } else {
      return false;
    }
  }
}


////la taille////

function returnFileSize(number) {
  if(number < 1024) {
    return number + ' octets';
  } else if(number >= 1024 && number < 1048576) {
    return (number/1024).toFixed(1) + ' Ko';
  } else if(number >= 1048576) {
    return (number/1048576).toFixed(1) + ' Mo';
  }
}


////AFFICHER INFOS PHOTO ET VERIF SA VALIDITE/////


function updateImageDisplay() {
 while(preview.firstChild) {
  preview.removeChild(preview.firstChild);
  } 

  var curFiles = input.files;

  if(curFiles.length === 0) {
    var para = document.createElement('p');
    para.textContent = 'Pas de photo sélectionnée.';
    para.style.color = "red";
    preview.appendChild(para);
    return false;
  }  else {
    
    var para = document.createElement('p');
    
    for(var i = 0; i < curFiles.length; i++) {
      if(validFileType(curFiles[i]) != false && (curFiles[i].size < 1048576)) {
        para.textContent = 'Nom du fichier ' + curFiles[i].name + ' taille ' + returnFileSize(curFiles[i].size);
       
        preview.appendChild(para);

      }  
      else {
        para.textContent = 'Nom du fichier ' + curFiles[i].name + ', format et/ou taille invalide(s).';
        para.style.color = "red";
        preview.appendChild(para);
        return false;
      }
    }
  }
 }
