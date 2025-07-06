



<?php
$host = "localhost";
$user = "root";
$pass = ""; // or "" if no password
$dbname = "crudoperation";
$port = 3307; // <--- important!

$conn = new mysqli($host, $user, $pass, $dbname, $port);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>

 