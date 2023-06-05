<?php
$servername = "localhost";
$username   = "root";
$password   = "Nishant@12345";
$db_name    = "dbtechneo";
$conn       = new mysqli($servername, $username, $password, $db_name);
if ($conn->connect_error) {
     die("Connection failed" . $conn->connect_error);
}
echo "";

?>