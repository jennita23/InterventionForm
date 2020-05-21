
  function verification()
  {
    var error=false;
  var password =document.getElementById("password").value;
  var email_tech =document.getElementById("email_tech").value; //email adress


  //re intialise les textbox
  $('#email_tech').css("border-color","#CCC");
    $('#password').css("border-color","#CCC");


    if (  password == ""  || email_tech =="" )
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
             if (email_tech == "")

             {
                 $('#email_tech ').css("border-color","#CF161E");
                  document.getElementById('errorpass').innerHTML = "* Vous devez insérer votre mot de passe. ";
             }

           }
     };
