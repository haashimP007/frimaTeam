<?php

$host = "localhost";
$login = "root";
$pass = "";
$dbname = "stagefrima";


$bdd = mysqli_connect($host, $login, $pass, $dbname);


if (!$bdd)
{
    echo "Connexion non-reussi a MySQL : " .mysqli_connect();
}

else
{
    echo "Connexion reussi a MySQL";
}


mysqli_set_charset($bdd,"utf8");

?>