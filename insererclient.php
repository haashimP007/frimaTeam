<?php

include ("frimabdconnect.php");

$nom =isset($_POST["nom"]) ? $_POST["nom"] : '';
$adresse =isset($_POST["adresse"]) ? $_POST["adresse"] : '';
$email =isset($_POST["email"]) ? $_POST["email"] : '';
$telephone =isset($_POST["telephone"]) ? $_POST["telephone"] : '';
$message =isset($_POST["message"]) ? $_POST["message"] : '';

if(mysqli_query($bdd, "INSERT INTO client (nom,adresse,email,telephone,message) VALUES ('$nom','$adresse','$email','$telephone','$message')"))

  {
					
      echo "Sucessfully inserted";
  }else { 
      echo "Insertion failed";	   
  }

?>

<!DOCTYPE HTML>
<html lang=fr>
<head>
<head>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
 <style>
   body {
  background-color: powderblue;
}
</style>
<meta charset = "utf8"/>
</head>
   <body>
<p>
<h2 align = "center"> Merci.Vos donnees sont bien inseres !!!</h2>
 <p> <h2 align = "center"><a href = 'visualiserclient.php'>Visualiser vos donnees</a></p>
</p>	
</body>
</html>
