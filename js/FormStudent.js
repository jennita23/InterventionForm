function verification() {

	var error = false;

	var sicStudent = document.getElementById("sicStudent").value;
  var nom  = document.getElementById("nom").value;
	var prenom = document.getElementById("prenom").value;
	var email = document.getElementById("email").value;
	var date = document.getElementById("date").value;
	var comment = document.getElementById("comment").value;
	var equipment = document.getElementById("equipment").value;
	var lab =  document.getElementById("lab").value;
  var dept = document.getElementById("dept").value;


  //re intialise les textbox
  //$('#sicStudent').css("border-color","#CCC");
  //$('#nom').css("border-color","#CCC");

    if (  sicStudent == ""  || nom =="" || prenom ==""  || email  ==""  || date =="" || comment =="" || equipment  =="" || lab =="" || dept ==""  )
       {
           error=true;
     //si un textbox est vide
             if ( sicStudent == "")
             {
                 $('#sicStudent').css("border-color","#CF161E");
                   document.getElementById('errors').innerHTML = "*Vous devez insérer votre SIC No ";
                  // alert("required");

                 error = true;
             }

             //si le texttbox pour inserer lastname est vide
               if (sicStudent == "")

               {
                   $('#nom').css("border-color","#CF161E");
                    document.getElementById('errorn').innerHTML = "*Vous devez insérer votre nom. ";

               }

							 if (prenom == "")

               {
                   $('#prenom').css("border-color","#CF161E");
                    document.getElementById('errorp').innerHTML = "*Vous devez insérer votre prénom. ";

               }

							 if (email== "")

							 {
									 $('#email').css("border-color","#CF161E");
										document.getElementById('errore').innerHTML = "*Vous devez insérer votre adresse Email UDM. ";

							 }

							 if (date== "")

							 {
									 $('#date').css("border-color","#CF161E");
										document.getElementById('errord').innerHTML = "*Vous devez insérer la date.  ";

							 }

							 if (equipment== "")

							 {
									 $('#equipment').css("border-color","#CF161E");


							 }

							 if (lab== "")

							 {
									 $('#lab').css("border-color","#CF161E");


							 }

							 if (dept== "")

							{
									$('#dept').css("border-color","#CF161E");
									

							}

							 if (comment== "")

							{
									$('#comment').css("border-color","#CF161E");
									 document.getElementById('errorr').innerHTML = "*Vous devez énoncer brièvement le problème. ";

							}


          }
       };
