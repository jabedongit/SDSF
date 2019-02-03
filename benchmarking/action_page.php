<?php
session_start();
require "dbConnect.php";
$conn=database_Connection();
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$username=$_GET['uname'];
$password=$_GET['psw'];


$sql = "SELECT * FROM am_users where username='".$username."' && password='".$password."'";

$result = $conn->query($sql);



if ($result->num_rows > 0) {
    // output data of each row

  $_SESSION['loggedinAM'] = true;
  $_SESSION['dataSubject'] = $username; // $username coming from the form, such as $_POST['username']
	

	if (!isset($_SESSION['dataResource']))
		{ 
		//echo "Not set";
		header("Location: http://localhost/am/dashboard.php"); 
		}
			
	else
	{
	 
	//echo $_SESSION['dataResource'];
    header("Location: http://localhost/am/policy.php");
    } 
}
else {
	 echo "Wrong username and password";
	 echo "<a href='http://localhost/am/login.php'>Try Again</a>";
    
}


$conn->close();



?>