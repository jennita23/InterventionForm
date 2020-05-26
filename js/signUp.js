function verification() {

	var error = false;

  var nom  = document.getElementById("nom").value;
	var prenom = document.getElementById("prenom").value;
	var email = document.getElementById("email").value;
	var birthday = document.getElementById("birthday").value;
  var password = document.getElementById("password").value;
  var cpassword = document.getElementById("cpassword").value;


	//re intialise les textbox

  $('#nom').css("border-color","#CCC");
	$('#prenom').css("border-color","#CCC");
  $('#email').css("border-color","#CCC");
	$('#birthday').css("border-color","#CCC");
  $('#password').css("border-color","#CCC");
  $('#cpassword').css("border-color","#CCC");

    if ( nom =="" || prenom ==""  || email  ==""  || birthday =="" || password =="" ||  cpassword=="")
       {

             //si le texttbox pour inserer lastname est vide
               if (nom == "")

               {
                   $('#nom').css("border-color","#CF161E");
                    document.getElementById('errorN').innerHTML = "*Vous devez insérer votre nom. ";
                   error = true;
               }

							 if (prenom == "")

               {
                   $('#prenom').css("border-color","#CF161E");
                    document.getElementById('errorP').innerHTML = "*Vous devez insérer votre prénom. ";

               }

							 if (email== "")

							 {
									 $('#email').css("border-color","#CF161E");
										document.getElementById('errorE').innerHTML = "*Vous devez insérer votre adresse Email UDM. ";

							 }

							 if (birthday== "")

							 {
									 $('#birthday').css("border-color","#CF161E");
										document.getElementById('errord').innerHTML = "*Vous devez insérer votre date de naissance.  ";

							 }

               if (password== "")

              {
                  $('#password').css("border-color","#CF161E");
                   document.getElementById('errorpwd').innerHTML = "*Vous devez insérer un mot de passe. ";

              }

							 if (cpassword== "")

							{
									$('#cpassword').css("border-color","#CF161E");
									 document.getElementById('errorCP').innerHTML = "*Vous devez confirmer votre  mot de passe.  ";

							}







          }


					if (!password.match(cpassword)) {
							document.getElementById('errorConfirmPass').innerHTML = "*Le mot de passe ne correspond pas.";
							error = true;
						}


       };
