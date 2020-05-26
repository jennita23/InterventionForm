
  function verification()
  {
    var error=false;
  var password =document.getElementById("password").value;
  var email =document.getElementById("email").value; //email adress


  //re intialise les textbox
  $('#email').css("border-color","#CCC");
    $('#password').css("border-color","#CCC");


    if (  password == ""  || email =="" )
     {
         error=true;
   //si un textbox est vide
           if (password == "")
           {
               $('#password').css("border-color","#CF161E");
                 document.getElementById('errorE').innerHTML = "* Vous devez insérer votre Adresse Email. ";

               error = true;
           }

           //si le texttbox pour inserer lastname est vide
             if (email == "")

             {
                 $('#email ').css("border-color","#CF161E");
                  document.getElementById('errorpass').innerHTML = "* Vous devez insérer votre mot de passe. ";
             }

           }
     };
