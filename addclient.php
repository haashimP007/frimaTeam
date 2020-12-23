<?php

 include ("frimabdconnect.php");
 
 $nom =$_POST["nom"];
 $adresse =$_POST["adresse"];
 $email =$_POST["email"];
 $telephone =$_POST["telephone"];
 $message =$_POST["message"];

 $ajouter = "insert into client (nom, adresse, email, telephone, message) values 
              ('$nom', '$adresse', '$email', '$telephone', '$message')";
 mysqli_query($bdd, $ajouter);
 mysqli_close($bdd);
?>            

<!DOCTYPE html>
<html lang ="fr">
<head>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
 <style>
   body {
  background-color: powderblue;
}
</style>
   <meta charset="utf-8">
</head>
<body>
 <p>
  <h2 align="center">Merci. Vos donn&eacute;es sont bien ins&eacute;r&eacute;es!!! </h2>
  <h2 align="center"><a href="visualiserclient.php">Veuillez consulter les donnees!! </a></h2>
  <h2 align="center"><a href="indexclient.php">Admin</a></h2>	
 </p>      
</body>
</html>