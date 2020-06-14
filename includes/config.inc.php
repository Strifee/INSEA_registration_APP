<?php

$dbhost = "localhost";
$db = "useraccounts";
$dbuser = "root";
$dbpass = "";
$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $db);
if (!$conn) {
    die("Connection failed: ". mysqli_connect_error());
}

?>