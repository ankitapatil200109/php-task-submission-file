



<?php
$host = "localhost";
$user = "root";
$pass = ""; 
$dbname = "crudoperation";
$port = 3307; // 

$conn = new mysqli($host, $user, $pass, $dbname, $port);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>

 