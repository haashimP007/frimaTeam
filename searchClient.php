<!DOCTYPE html>
<html lang="fr">
<head>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
   <meta charset="utf-8">
   <title>Search</title>
   
   <style>
body {
  background-color: powderblue;
}
</style>
</head>
<body>
 <header><h1 align="center">R&Eacute;SULTATS</h1></header>
 <br />
 <br />
 <div class = "table responsive">
 <table class="table">
  <thead class="thead-dark">
   <tr bgcolor="tomato">
    <td>id_client</td>
    <td>nom</td>
	<td>adresse</td>
    <td>email</td>
    <td>telephone</td>
    <td>message</td>
    <td>Options</td>
	</thead>
	</div>
   </tr>
  <?php 
   include ("frimabdconnect.php");
  if (isset($_POST["Search"]))
    $searchval = $_POST["searchval"];
  {
     if(preg_match("/^[  a-zA-Z]+/", $_POST["searchval"])){

  $sql = "SELECT * FROM client WHERE `nom` = '$searchval' OR `adresse` = '$searchval' OR `email` LIKE '$searchval' OR `telephone` LIKE '$searchval' OR `message` LIKE '$searchval' ORDER BY id_client ASC;";
  $result= mysqli_query($bdd, $sql) or die( mysqli_error($bdd));
}
   while ($res = mysqli_fetch_array($result)) {
    echo "<tr>";
    echo "<td>" .$res["id_client"]. "</td>";
    echo "<td>" .$res["nom"]. "</td>";
	echo "<td>" .$res["adresse"]. "</td>";
    echo "<td>" .$res["email"]. "</td>";
    echo "<td>" .$res["telephone"]. "</td>";
    echo "<td>" .$res["message"]. "</td>";
    
    echo "<td> <a href =\" editclient.php? id_client=$res[id_client]\">Mise a Jour</a> |
    <a href = \"deleteclient.php? id_client=$res[id_client] \" onClick= return confirm ('Confirmez la suppression?')\">Supprimer</a> </td>"; 
    echo "</tr>";
   }
 }  
?>
  </table>
  <br />
  <a href="indexclient.php">Acceuil</a>
  <br />    
</body>
</html>