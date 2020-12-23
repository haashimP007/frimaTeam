<!DOCTYPE HTML>
<html>
<head>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
 <style>
   body {
  background-color: powderblue;
}
</style>
     <title>Page d'Acceuil</title>
</head>
<body>

<?php
include ("frimabdconnect.php");

 $limit = 500;
  if (isset($_GET['page'])) {
      $page = $_GET['page'] -1;
      $offset =  $page * $limit;
  } else {
      $page = 0;
      $offset = 0;
  }
  $sql= "SELECT count(id_client) FROM client" ;
  $result= mysqli_query($bdd, $sql);
  $row = mysqli_fetch_array($result);
  $total_rows = $row[0];
  if ($total_rows > $limit) {
      $num_pages = ceil ($total_rows / $limit);
  } else {
      $page = 1;
      $num_pages = 1;
  }
  $requete = "SELECT * FROM client ORDER BY id_client ASC LIMIT $offset, $limit";
  $result = mysqli_query($bdd,$requete);
  ?>
 <header><h1 align="center">MENU ADMINISTRATEUR Client</h1></header>
 <br />
 <form  method="post" action="searchClient.php"  id="searchform"> 
      <input  type="text" name="searchval" placeholder="Recherche"> 
        <input  type="submit" name="Search" value="Search"> 
 </form> 



   <p><h1 align="center">Administration des donnees pour la page client</p></h1>
   <br />
   <div class = "table responsive">
   <table class="table">
  <thead class="thead-dark">  
   <tr bgcolor = "tomato">
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
   echo mysqli_error($bdd);
   while($res = mysqli_fetch_array($result)) {
      echo "<tr>";
	  echo "<td>".$res['id_client']."</td>";
	  echo "<td>".$res['nom']."</td>";
	  echo "<td>".$res['adresse']."</td>";
	  echo "<td>".$res['email']."</td>";
	  echo "<td>".$res['telephone']."</td>";
	  echo "<td>".$res['message']."</td>";
	  echo "<td> <a href=\"editclient.php? id_client=$res[id_client]\">Mise a jour</a> | <a href=\"index.html? id_client=$res[id_client]\">Ajouter un nouveau client</a> |   
                     <a href=\"deleteclient.php? id_client=$res[id_client]\" onClick=\"return confirm('Confirmez la suppression ???')\">Supprimer</a></td>";
	  echo "</tr>";
	  }
	  ?>
	  
</table>
</body>
</html>