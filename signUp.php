
<?php include("config/config.php");?>
<!DOCTYPE html>
<html lang="en">

<head>
  <?php include("layout/header.php");?>
  <link href="css/signUp.css" rel="stylesheet" type="text/css" />
   <script src="js/src/signUp.js"></script>
</head>

<body id="page-top" data-spy="scroll" data-target=".navbar-custom">
  <div id="wrapper"></div>


  <div class="login_wrapper">
      <div id="message" > </div>
      <h3 align="center" > S'inscrire </h3>

      <!-- form to register new user -->

      <form id='form_user'>
        <div class="input-container">
          <i class="fa fa-user icon"></i>
          <input  class="input-field" type="text" id="fname" placeholder="Nom" name="fname">
          <span class="display_error_msg" id="errorFname"></span >
        </div>


        <div class="input-container">
          <i class="fa fa-user icon"></i>
          <input  class="input-field" type="text"  id="lname" placeholder="Prénom" name="lname">
          <span class="display_error_msg"  id="errorLname"></span >
        </div>



        <div class="input-container signup_gender">
          <span>Gender</span>
          <input type="radio" name="gender" value="M"> Male
          <input type="radio"  name="gender" value="F"> Female
          <span class="display_error_msg" id="errorGender"></span >
        </div>

        <div class="input-container">
            Birth Date : <input type="date"  id="birthday"  name="birthday">
              <span class="display_error_msg" id="errorBirthday"></span >
        </div>

        <div class="input-container">
          <i class="fa fa-user icon"></i>
          <input  class="input-field" type="text" id="phone" placeholder="Phone Number" name="phone">
          <span class="display_error_msg"  id="errorPhone"></span >
        </div>

        <div class="input-container">
          <i class="fa fa-envelope icon"></i>
          <input  class="input-field"  id="email" type="text" placeholder="Adresse Email" name="email">
          <span class="display_error_msg" id="erroremail"></span >
        </div>

        <div class="input-container">
          <i class="fa fa-key icon"></i>
          <input  class="input-field" type="password"  id="password" placeholder="Mot de passe " name="password">
          <span class="display_error_msg" id="errorPass"></span >
        </div>

        <div class="input-container">
          <i class="fa fa-key icon"></i>
          <input class="input-field" type="password"  id="confirm_password" placeholder="Confirmer mot de passe" name="confirm_password">
          <span class="display_error_msg" id="errorConfirmPass"></span >
        </div>

        <div>
          <p id="text" style="color:#228B22;display:none" >You have agreed to the terms and conditions  !</p>
          <a href="#">Terms and Conditions  </a>
          <label><input type="checkbox" id="myCheck"  onclick="myFunction()"/> </label>
          <span class="display_error_msg"  id="errorBox"></span >
        </div>
         <button type="button" class="btn_sign_up" onClick="verification()" id="ok"> S'incrire</button>
      </div>

    </form>
<br>
<br>

  <!-- Modal -->
   <div class="modal fade" id="modalUserregistraion" role="dialog">
     <div class="modal-dialog">

       <!-- Modal content-->
       <div class="modal-content">
         <div class="modal-header">
           <button type="button" class="close" data-dismiss="modal">&times;</button>
           <h4 class="modal-title">User registration</h4>
         </div>
         <div class="modal-body">
           <p>Account created successfully.<br/> Please check your email address: rishan@test.com to activate your account.</p>
         </div>
         <div class="modal-footer">
           <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
         </div>
       </div>

     </div>
   </div>

   <!-- Modal -->
    <div class="modal fade" id="modalUserregistraionError" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">User registration</h4>
          </div>
          <div class="modal-body">
            <p style="color: red;">An error occured please try again.</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>

      </div>
    </div>

  <?php include("layout/footer.php");?>
</body>
</html>
