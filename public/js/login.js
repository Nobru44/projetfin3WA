"use strict";



/////////VALIDATION LOGIN////////////

$("#mailLogin").on('keyup', verifMail);

$("#mailLogin").on('keyup', verifMailExistLog);


$("#loginSubmit").on('click', validationLogin);
