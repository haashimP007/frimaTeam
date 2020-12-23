<?php
include ("frimabdconnect.php");

$id_client = $_GET['id_client'];

$result = mysqli_query($bdd, "DELETE FROM client WHERE id_client = $id_client");

header("Location:indexclient.php");

?>