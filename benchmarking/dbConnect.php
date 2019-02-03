<?php
function database_Connection()
{
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "am";
// Create connection
$conn = mysqli_connect($servername, $username, $password,$dbname);

return $conn;
}


?>