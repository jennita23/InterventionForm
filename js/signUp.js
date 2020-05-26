$(function () {
	console.log("ready!");
});


function resetErrorMessage(){
	$('.display_error_msg').each(function(){
		$(this).text('');
	});
}

function verification() {
	resetErrorMessage();
	var error = false;

	var fname = document.getElementById("patientFirstName").value;
	var lname = document.getElementById("patientLastName").value;
	//var email = document.getElementById("patientEmail").value;
	//var password = document.getElementById("password").value;
	//var confirm_password = document.getElementById("confirm_password").value;
//	var checkbox = document.getElementById("myCheck").value;
//	var username = document.getElementById("icPatient").value;
	//var phone = document.getElementById("phone").value;
	//var birthday = document.getElementById("birthday").value;



	//initialising regular expressions
	var email_regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
	var name_regex = /^[a-zA-Z]{3,20}$/; //it will accepts both lowercase uppercase character only 5 characters to 20
	var lname_regex = /^[a-zA-Z]{3,20}$/; //it will accepts both lowercase uppercase character only 5 characters to 20
	//var password_regex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,10}$/; // Minimum eight and maximum 10 characters, at least one uppercase letter, one lowercase letter, one number and one special character cannotcontain underscore or dot at start and end
  var phone_regex = /^(\(?\+?[0-9]*\)?)?[0-9_\- \(\)]*$/; //accept only numbers

	if (!email_regex.test(email)) {
		document.getElementById('erroremail').innerHTML = "*Please provide a valid email address* ";
		error = true;
	}



	if (username=="")
	{
		document.getElementById('errorUsername').innerHTML = "*This is a required field*";
		error = true;
	}

	if (!name_regex.test(fname)) {
		document.getElementById('errorFname').innerHTML = "*Please provide a valid name*";
		error = true;
	}

	if (!lname_regex.test(lname)) {
		document.getElementById('errorLname').innerHTML = "*Please provide a valid name*";
		error = true;
	}



	if (password == ""){
		document.getElementById('errorPass').innerHTML = "*Minimum eight and maximum 10 characters, at least one uppercase, lowercase,number and one special character* ";
		error = true;
	}

	if (!password.match(confirm_password)) {
		document.getElementById('errorConfirmPass').innerHTML = "*Password is not matching*";
		error = true;
	}





	if(!error){
		registerUser();
	}
}
/*
function registerUser() {

	var req = new XMLHttpRequest();

	var fname = document.getElementById("fname").value;
	var lname = document.getElementById("lname").value;
	var email = document.getElementById("email").value;
	var password = document.getElementById("password").value;
	var username = document.getElementById("username").value;
	var gender = document.getElementById("gender").value;
	var phone = document.getElementById("phone").value;
	var birthday = document.getElementById("birthday").value;
	var data = "username=" + username+"&email=" + email + "&fname=" + fname + "&lname=" + lname +"&birthday=" + birthday +  "&gender="+ gender+ "&phone=" + phone + "&password=" + password ;

	req.onreadystatechange = function () {

		if ((req.readyState == 4) && (req.status == 200)) {


			document.getElementById("message").innerHTML = req.responseText;

		}
	};

	req.open("POST", "controller/insertuser.php", true); <!--open connection-->


	req.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

	req.send(data); <!--Envoyer-->
*/
console.log($('#form_user').serialize());
$.post("controller/register.php",
  	$('#form_user').serialize(),
  function(response){

		if(response.status == 'error'){
			//loop to display each error in specific error box
			$.each( response.error_messages, function( key, value ) {
				if(value.placeholder == 'generalError'){
					$('#modalUserregistraionError').modal('show');
				}else{
					$('#'+value.placeholder).text(value.message);
				}

			});
		}
		else{
			$('#modalUserregistraion').modal('show');
		}
  });
