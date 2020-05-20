function verification() {

	var error = false;

  var nom  = document.getElementById("nom").value;
	var prenom = document.getElementById("prenom").value;
	var email = document.getElementById("email").value;
	var date = document.getElementById("date").value;
  var localisation = document.getElementById("localisation").value;
	var comment = document.getElementById("comment").value;

  //re intialise les textbox
  //$('#sicStudent').css("border-color","#CCC");
  //$('#nom').css("border-color","#CCC");

    if ( nom =="" || prenom ==""  || email  ==""  || date =="" || localisation =="" ||  comment ==""  )
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

							 if (date== "")

							 {
									 $('#date').css("border-color","#CF161E");
										document.getElementById('errord').innerHTML = "*Vous devez insérer la date.  ";

							 }

               if (localisation== "")

              {
                  $('#localisation').css("border-color","#CF161E");
                   document.getElementById('errorL').innerHTML = "*Vous devez insérer No Classe/Bureau concerné. ";

              }

							 if (comment== "")

							{
									$('#comment').css("border-color","#CF161E");
									 document.getElementById('errorr').innerHTML = "*Vous devez énoncer brièvement le problème. ";

							}


          }
       };
