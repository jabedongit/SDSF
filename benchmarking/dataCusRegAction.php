<html>
<head></head>
<body >
<?php
session_start();
require "dbConnect.php";
require "menu.php";
require "helper.php";

if (isset($_SESSION['loggedinAM']) && $_SESSION['loggedinAM'] == true) {
?>
<h2 align="center">Authorization Manager Dashboard</h2>
<table width="60%" align="center">
<tr><td width="20%" valign="top">
<?php 
$menu=menu();
echo $menu;
?>
</td><td width="80%" colspan="3">
<br><br>


<?php

$dataCustodian=$_GET['dataCustodian'];
$granularity=$_GET['granularity'];
$anonymization=$_GET['anonymization'];
$notification=$_GET['notification'];
$accounting=$_GET['accounting'];
$secret = uniqidReal();
//$dataCustodian=$_SESSION['dataResource'];





$conn=database_Connection();
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
else
{
$sql="insert into data_cus_registration values('$dataCustodian','$granularity','$anonymization','$notification','$accounting','$secret');";
$result = mysqli_query($conn,$sql);
echo "Registration Successful.";
}





?>






</td></tr>

</table>
<?php
} else {
   header("Location: http://localhost/am/login.php");
 //  $_SESSION['url'] = $_SERVER['REQUEST_URI']; 
}
?>
</body>
</html>