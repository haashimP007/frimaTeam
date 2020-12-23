<!DOCTYPE HTML>
<html>
<head>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
 <style>
   body {
  background-color: powderblue;
}
</style>
     <meta charset = "utf8" />	
</head>
<body>

<?php

include ("frimabdconnect.php");

$sql = "SELECT * FROM client" ;
$curseur = mysqli_query($bdd,$sql);

echo ("<H2>Visualiser vos donnees!</H2>");

while ($row = mysqli_fetch_assoc($curseur))
{
  	$id_client = $row["id_client"];   echo "<b>id_client :</b>   $id_client <br />";
	$nom = $row["nom"];   echo "<b>nom :</b>   $nom :<br />";
	$adresse = $row["adresse"];   echo "<b>adresse :</b>   $adresse :<br />";
	$email = $row["email"];   echo "<b>email :</b>   $email :<br />";
	$telephone = $row["telephone"];   echo "<b>telephone :</b>   $telephone :<br />";
	$message = $row["message"];   echo "<b>message :</b>   $message :<br />";
}

mysqli_free_result($curseur);
mysqli_close($bdd);
?>

<p>
<h1 align = "center"><a href = "index.html">Retour au formulaire client</a></h1>
</p>
</body>
</html>