<?php

$hostname = "localhost";
$dbuser = "root";
$dbPassword = "";
$dbname = "ball";
$conn = mysqli_connect ($hostname,$dbuser,$dbPassword,$dbname);
 if (!$conn) {
    die ("something wentwrong:");
 }
 echo "done!";
 ?>