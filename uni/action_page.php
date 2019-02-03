<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "data_sharing_policy";
// Create connection
$conn = mysqli_connect($servername, $username, $password,$dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM data_subject where username='".$_GET['uname']."' && password='".$_GET['psw']."'";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
	 $_SESSION['dataSubject']=$_GET['uname'];
	   $_SESSION['loggedin'] = true;

    header("Location: http://localhost/abc/resources.php");

	
  
   
} else {
	 echo "Wrong username and password";
	 echo "<a href='http://localhost/abc/index.htm'>Try Again</a>";
    
}


$conn->close();



?>