<?php
include_once 'conn/dbconnect.php';

?>

<!-- register user -->
<?php
if (isset($_POST['signup'])) {
$nom = mysqli_real_escape_string($con,$_POST['nom']);
$prenom= mysqli_real_escape_string($con,$_POST['prenom']);
$email = mysqli_real_escape_string($con,$_POST['email']);
$password = mysqli_real_escape_string($con,$_POST['password']);
$birthday = mysqli_real_escape_string($con,$_POST['birthday']);

//INSERT Query
$query = " INSERT INTO user (nom,prenom,email,password,birthday)
VALUES ('$nom', '$prenom', '$email', '$password', '$birthday' ) ";
$result = mysqli_query($con, $query);
// echo $result;
if( $result )
{
?>
<script type="text/javascript">
alert('Votre compte a ete creer avec succes !');

</script>
<?php
}
else
{
?>
<script type="text/javascript">
alert('Compte utilisateur existe deja.Veuillez creer un nouveau compte!');
</script>
<?php
}

}
?>
