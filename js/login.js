
  function verification()
  {
    var error=false;
  var password =document.getElementById("password").value;
  var icPatient =document.getElementById("icPatient").value; //username
  //var fname =document.getElementById("fname").value;
  //re intialise les textbox
  $('icPatient').css("border-color","#CCC");
    $('#password').css("border-color","#CCC");


    if (  password == ""  || icPatient=="" )
     {
         error=true;
   //si un textbox est vide
           if (password == "")
           {
               $('#password').css("border-color","#CF161E");
                 document.getElementById('erroru').innerHTML = "* Please provide a  username ";

               error = true;
           }

           //si le texttbox pour inserer lastname est vide
             if (icPatient == "")

             {
                 $('#icPatient').css("border-color","#CF161E");
                  document.getElementById('errorpass').innerHTML = "* Please provide a  password ";
             }

           }
     };
