<?php

include ("frimabdconnect.php");

$id_client="";
$nom = "";
$adresse = "";
$email = "";
$telephone = "";
$message = "";

if (isset($_POST['update']))
{ 
  $id_client = $_POST["id_client"];
  $nom = $_POST["nom"];
  $adresse = $_POST["adresse"];
  $email = $_POST["email"];
  $telephone = $_POST["telephone"];
  $message = $_POST["message"];
  
  if(empty($nom) || empty($email) || empty($telephone) || empty($message))
  {
	  
  if(empty($nom))
  {
  echo "<font color='red'>Champ nom est vide.</font></br>";
  }
  
  if(empty($email))
  {
  echo "<font color='red'>Champ email est vide.</font></br>";
  }
  
  if(empty($telephone))
  {
  echo "<font color='red'>Champ telephone est vide.</font></br>";
  }
  
  if(empty($message))
  {
  "<font color='red'>Champ message est vide.</font></br>";
  }
  
  }
  
  else {
  $result = mysqli_query($bdd, "UPDATE client SET nom = '$nom',adresse = '$adresse', email = '$email', telephone = '$telephone', message = '$message' WHERE id_client = $id_client");
  
   echo ("<script LANGUAGE = 'Javascript'>
    window.alert('Mise a jour termine');
    window.location.href='indexclient.php;
    </script>");
	
	}
}
?>

<?php

if(isset($_GET["id_client"])) {

$id_client = $_GET['id_client'];
 
$result = mysqli_query($bdd, "SELECT * FROM client WHERE id_client = $id_client");

echo mysqli_error($bdd);

  while($res=mysqli_fetch_array($result))
  {
	 $nom = $res['nom'];
	 $adresse = $res['adresse'];
	 $email = $res['email'];
	 $telephone = $res['telephone'];
	 $message = $res['message'];
  }
}
?>

<!DOCTYPE HTML>
<html>
<head>
<style>
.center {
  margin-left: auto;
  margin-right: auto;
}

body {
  background-color: powderblue;
}
</style>
      <title>Mise a jour des donnees de la page client</title>
</head>

<body>
<br /><br />

<h4 align = "center"><a href = "indexclient.php">Acceuil</a></h4>

<form name="form1" method="post" action="editclient.php">

<table class="center">

            <tr>
                <td>nom</td>
                <td><input type="text" name="nom" placeholder="nom" value="<?php echo $nom;?>"></td>
            </tr>
			
			<tr>
                <td>adresse</td>
                <td><input type="text" name="adresse" placeholder="adresse" value="<?php echo $adresse;?>"></td>
            </tr>
			
			<tr>
                <td>Email</td>
                <td><input type="email" name="email" placeholder="email" value="<?php echo $email;?>"></td>
            </tr>

            <tr>
                <td>telephone</td>
                <td><input type="numeric" name="telephone" placeholder="telephone" value="<?php echo $telephone;?>"></td>
            </tr>

            <tr>
                <td>message</td>
                <td><textarea cols= "50" rows="20" name="message" placeholder="message" value="<?php echo $message;?>"></textarea></td>
            </tr>

            <tr>
            <td><input type="hidden" name="id_client" value='<?php echo $id_client; $_GET["id_client"];?>'/></td>
            <td><input type="submit" name="update" value="update"></td>
            </tr>
			
</table>
</form> 

<form method="post" action="indexclient.php">
        <h4 align="center"><input type="submit" value="Retour acceuil admin"></h4>
    </form>
</body>
</html>