function verification() {

	var error = false;

	var sicStudent = document.getElementById("sicStudent").value;
  var nom  = document.getElementById("nom").value;

  //re intialise les textbox
  //$('#sicStudent').css("border-color","#CCC");
  //$('#nom').css("border-color","#CCC");

    if (  sicStudent == ""  || nom =="" )
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
                    document.getElementById('errorn').innerHTML = "*Vous devez insérer votre nom ";
                    //alert("required");
                     //error = true;
               }

          }
       };
